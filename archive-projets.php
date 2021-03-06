<?php

/**
 *  The template for displaying Archive Projet
 * 
 * 
 */
get_header();

?>

<div class="projetsContainer">
	<div class="headerProjets">

		<div class="logoHeader" data-aos="zoom-in" data-aos-duration="1000">
			<a href="<?php echo get_option('home'); ?>/"><img class="logoArchiveExplo" src="<?php echo get_template_directory_uri();?>/src/assets/img/lf_logo_fiches.svg"></a>
			<h1 class="projPageName">PROJETS</h1>
			<h1 class="projPageNameResponsive">PROJETS</h1>
		</div>

		<div class="reponsiveCat">
			<a> <img class=" pictoFiltres responsiveCatLogo" src="<?php echo get_template_directory_uri();?>/src/assets/img/lf_mobile_picto-filtres.svg" /></a>
		</div>

		<a><img class="pictoValider responsiveCatLogo" src="<?php echo get_template_directory_uri();?>/src/assets/img/lf_mobile-picto_valider.svg" /></a>

		
		<div class="subheaderCat">
			<div class="parprogrammes"> Par programmes </div>
			<div class="parthematiques"> Par Thématiques </div>
		</div>
	

		<div class="categoryHeader catHeaderOff">

	

			<?php
			$current_post_type = get_post_type();
			$taxonomies = get_object_taxonomies($current_post_type);
			$getFilterTerm = false;
			$childs_active_terms = array();
			$argsActiveTerms = array(
				'post_type' => $current_post_type,
				'posts_per_page' => -1,
				'post_status' => "publish"
			);
			$tax_query = array(
				'relation' => 'AND'
			);
			foreach ($taxonomies as $taxonomy) {
				if (isset($_GET[$taxonomy])) {
					$getFilterTerm = $_GET[$taxonomy];
					array_push($tax_query, array(
						'taxonomy' => $taxonomy,
						'field' => "slug",
						'terms' => array($_GET[$taxonomy])
					));
				}
			}
			$argsActiveTerms['tax_query'] = $tax_query;
			$queryActiveTerms = new WP_Query($argsActiveTerms);
			if ($queryActiveTerms->have_posts()) : while ($queryActiveTerms->have_posts()) :
					$queryActiveTerms->the_post();
					foreach ($taxonomies as $taxonomy) {
						$activeCurrentTerms = get_the_terms(get_the_ID(), $taxonomy);
						if (is_array($activeCurrentTerms) && sizeof($activeCurrentTerms)) foreach ($activeCurrentTerms as $activeTerm) if (!array_search($activeTerm, $childs_active_terms)) array_push($childs_active_terms, $activeTerm);
					}
				endwhile;
			endif;
			wp_reset_query();
			foreach (array_reverse($taxonomies) as $taxonomy) :
				$parents_terms = get_terms($taxonomy, array('hide_empty' => false, 'parent' => 0));
				if ($taxonomy === "lieux") {
					$fake_taxonomy = new StdClass();
					$fake_taxonomy->name = "Lieux";
					$parents_terms = array(
						$fake_taxonomy
					);
				}
				foreach (array_reverse($parents_terms) as $parent_term) :
					$order_menu = get_field('order_menu', 'term_' . $parent_term->term_id);
					$childs_terms = ($taxonomy !== "lieux") ?
						get_terms($taxonomy, array('hide_empty' => false, 'parent' => $parent_term->term_id))
						:
						get_terms($taxonomy, array('hide_empty' => false));
					$activeTax = false;
					foreach ($childs_terms as $child_term) if($child_term->slug==$getFilterTerm) $activeTax = true;
					if(isset($_GET['tax']) && $_GET['tax']===$parent_term->slug) $activeTax=true;

			?>
					<div class="catArchi catWrapper <?= ($activeTax) ? 'opened' : "" ?>" style="order:<?= $order_menu ?: "0" ?>">
						<span class="catName <?= ($activeTax) ? 'active' : "" ?>"><?= $parent_term->name ?></span>
						<div class="div-to-toggle">
							<div <?= $parent_term->slug ? 'data-cat="' . $parent_term->slug . '"' : ""; ?> data-id="<?= $taxonomy; ?>" class="subCatName">
								<span data-id="tous" <?= isset($_GET[$taxonomy]) ? "" : 'class="active"'; ?>>Tous</span>
								<?php if ($childs_terms && is_array($childs_terms) && sizeof($childs_terms)) :
									foreach ($childs_terms as $child_term) :
										echo '<span data-id="' . $child_term->slug . '" class="';
										echo (array_search($child_term, $childs_active_terms) === false ? "unclickable" : "") . ($getFilterTerm === $child_term->slug ? "active" : "");
										echo '">';
										echo $child_term->name;
										echo '</span>';
										if($child_term->description):
											echo '<div class="subCatDescription">';
											echo '<p><b>' . $child_term->name . '</b></p>';
											echo '<p>' . $child_term->description . '</p>';
											echo '</div>';
										endif;
									endforeach;
								endif;
								?>
							</div>
						</div>
					</div>
			<?php endforeach;
			endforeach;
			?>

		</div>

	</div>


	<?php
	$args = array(
		'post_type' => 'projets',
		'post_status' => 'publish',
		'posts_per_page' => 20,
		'paged' => 1,
	);


	$tax_query = array(
		'relation' => 'AND'
	);
	$prefiltered = false;
	foreach ($taxonomies as $taxonomy) {;
		if (isset($_GET[$taxonomy])) {
			$prefiltered = true;
			array_push($tax_query, array(
				'taxonomy' => $taxonomy,
				'field' => "slug",
				'terms' => array($_GET[$taxonomy])
			));
		}
	}
	$args['tax_query'] = $tax_query;
	$args['meta_query'] = array(
		'relation'		=> 'OR',	
	);
	if($prefiltered){
		$args['meta_query'][] = array(
			'key'	 	=> 'show_in_ajax_result',
			'value'		=> 1
		);
		$args['meta_query'][] = array(
			'key'	 	=> 'show_in_ajax_result',
			'compare'	=> 'NOT EXISTS'
		);
	}else{
		$args['meta_query'][] = array(
			'key'	 	=> 'show_in_non_ajax_result',
			'value'		=> 1
		);
		$args['meta_query'][] = array(
			'key'	 	=> 'show_in_non_ajax_result',
			'compare'	=> 'NOT EXISTS'
		);
	}

	$my_query = new WP_Query($args);
	if ($my_query->have_posts()) : ?>
		<div id="projets-list" class="projetsGrid">
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="cardProjet">
					<div class="thumbnailProjet"> <a href="<?= the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
					<div class="titleProjet"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<p class="projectLoopLieu"><?php the_field('lieu', get_the_ID()); ?></p>
				</div>

			<?php endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata(); ?>
	<div id="load-more-projets" data-paged="1"><img style="width:60px" src="<?php echo get_template_directory_uri();?>/src/assets/img/lf_picto_load.svg'"></div>

</div>


<?php get_footer(); ?>