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

		<div class="logoHeader">

			<a href="<?php echo get_option('home'); ?>/"><img class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_logo_fiches.svg"></a>

			<h1 class="projPageName">PROJETS</h1>

		</div>

		<div class="categoryHeader">
			<?php

			$lieux = get_terms(array('taxonomy' => 'lieux', 'hide_empty' => false)); ?>
			<div class="catLieux catWrapper">
				<span class="catName">Lieux</span>
				<div class="div-to-toggle">
					<div data-id="lieux" class="subCatName">
						<span data-id="tous">Tous</span>
						<?php foreach ($lieux as $lieu) : ?>
							<span data-id="<?= $lieu->slug ?>"><?= $lieu->name ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php foreach (get_terms('categories-projet', array('hide_empty' => false, 'parent' => 0)) as $parent_term) { ?>
				<div class="catArchi catWrapper">
					<span class="catName"><?= $parent_term->name ?></span>
					<div class="div-to-toggle">
						<div data-cat="<?= $parent_term->slug ?>" data-id="categories-projet" class="subCatName">
							<span data-id="tous">Tous</span>
							<?php foreach (get_terms('categories-projet', array('hide_empty' => false, 'parent' => $parent_term->term_id)) as $child_term) { ?>
								<span data-id="<?= $child_term->slug ?>"><?= $child_term->name ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php foreach (get_terms('thematique', array('hide_empty' => false, 'parent' => 0)) as $parent_term) { ?>
				<div class="catArchi catWrapper">
					<span class="catName"><?= $parent_term->name ?></span>
					<div class="div-to-toggle">
						<div data-cat="<?= $parent_term->slug ?>" data-id="thematique" class="subCatName">
							<span data-id="tous">Tous</span>
							<?php foreach (get_terms('thematique', array('hide_empty' => false, 'parent' => $parent_term->term_id)) as $child_term) { ?>
								<span data-id="<?= $child_term->slug ?>"><?= $child_term->name ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>

	</div>
	<!-- <img src="/wp-content/uploads/2022/02/loader.gif" class="loader" /> -->
	<div class="projetsGrid">

		<?php
		$args = array(
			'post_type' => 'projets', 'post_status' => 'publish', 'posts_per_page' => -1
		);

		$my_query = new WP_Query($args);
		if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="cardProjet">
					<div class="thumbnailProjet"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
					<div class="titleProjet"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				</div>

		<?php endwhile;
		endif;
		wp_reset_postdata();

		?>

	</div>

</div>


<?php get_footer(); ?>