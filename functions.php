<?php

/**
 * Lieux Fauves functions and definitions
 *
 *
 */


add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

function lct_register_assets()
{
	// Déclarer jQuery
	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'menu',
		get_template_directory_uri() . '/src/js/menu.js',
		array('jquery'),
		'1.0',
		true
	);

	wp_enqueue_script(
		'popUp',
		get_template_directory_uri() . '/src/js/loader.js',
		array('jquery'),
		'1.0',
		false
	);


	wp_enqueue_script(
		'popUp',
		get_template_directory_uri() . '/src/js/popUp.js',
		array('jquery'),
		'1.0',
		true
	);

	wp_enqueue_script(
		'chap',
		get_template_directory_uri() . '/src/js/chap.js',
		array('jquery'),
		'1.0',
		true
	);

	wp_enqueue_script(
		'chapAgence',
		get_template_directory_uri() . '/src/js/chapAgence.js',
		array('chap'),
		'1.0',
		true
	);

	wp_enqueue_script(
		'devise',
		get_template_directory_uri() . '/src/js/devise.js',
		array(),
		'1.0',
		true
	);

	wp_enqueue_script(
		'swiper',
		get_template_directory_uri() . '/src/js/swiper.js',
		array(),
		'1.0',
		true
	);


	wp_enqueue_script(
		'popup',
		get_template_directory_uri() . '/src/js/popup.js',
		array(),
		'1.0',
		true
	);

	wp_enqueue_script(
		'ficheTechnique',
		get_template_directory_uri() . '/src/js/ficheTechnique.js',
		array(),
		'1.0',
		true
	);


	wp_enqueue_script(
		'headerPicto',
		get_template_directory_uri() . '/src/js/headerPicto.js',
		array(),
		'1.0',
		true
	);











	// Charger notre script
	wp_enqueue_script('ajax', get_template_directory_uri() . '/src/js/script.js', array('jquery'), '1.0', true);
	wp_enqueue_script('archive', get_template_directory_uri() . '/src/js/archiveAjax.js', array('jquery'), '1.0', true);
	wp_enqueue_script('loadmore', get_template_directory_uri() . '/src/js/loadMoreAjax.js', array('jquery'), '1.0', true);


	// Envoyer une variable de PHP à JS proprement
	wp_localize_script('ajax', 'ajaxurl', admin_url('admin-ajax.php'));
	wp_localize_script('archive', 'ajaxurl', admin_url('admin-ajax.php'));


	wp_enqueue_style("main-style", get_template_directory_uri() . "/src/style/main.css");
}
add_action('wp_enqueue_scripts', 'lct_register_assets');



// CPT Projets
function lf_projets_rpt()
{

	$labels = array(
		// Le nom au pluriel
		'name'                => _x('Projet', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x('Projet', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __('Projets'),
		// Les différents libellés de l'administration
		'all_items'           => __('Tous les projets'),
		'view_item'           => __('Voir les projets'),
		'add_new_item'        => __('Ajouter un nouveau projet'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer le projet'),
		'update_item'         => __('Modifier le projet'),
		'search_items'        => __('Rechercher un projet'),
		'not_found'           => __('Non trouvé'),
		'not_found_in_trash'  => __('Non trouvé dans la corbeille'),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes',),
		'menu_position' => 3,
		'menu_icon' => 'dashicons-admin-customizer',
	);

	// On enregistre notre custom post type
	register_post_type('projets', $args);
}

add_action('init', 'lf_projets_rpt'); // Le hook init lance la fonction



// CPT Explorations
function cpt_explorations()
{

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x('Explorations', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x('Exploration', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __('Explorations'),
		// Les différents libellés de l'administration
		'all_items'           => __('Toutes les explorations'),
		'view_item'           => __('Voir les expliorations'),
		'add_new_item'        => __('Ajouter une nouvelle exploration'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer l exploration'),
		'update_item'         => __('Modifier l exploration'),
		'search_items'        => __('Rechercher'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
	);

	// On peut définir ici d'autres options pour notre custom post type

	$args = array(
		'label'               => __('Explorations'),
		'description'         => __('Explorations'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes',),

		'menu_position' => 5,
		'menu_icon' => 'dashicons-location-alt',
		'show_in_rest' => true,
		'show_in_menu' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'explorations'),

	);

	register_post_type('explorations', $args);
}

add_action('init', 'cpt_explorations', 0);



// CPT Jobs
function cpt_jobs()
{

	$labels = array(
		'name'                => _x('Annonces', 'Post Type General Name'),
		'singular_name'       => _x('Annonce', 'Post Type Singular Name'),
		'menu_name'           => __('Annonces'),
		'all_items'           => __('Toutes les annonces'),
		'view_item'           => __('Voir les annonces'),
		'add_new_item'        => __('Ajouter une nouvelle annonce'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer'),
		'update_item'         => __('Modifier'),
		'search_items'        => __('Rechercher une annonce'),
		'not_found'           => __('Non trouvé'),
		'not_found_in_trash'  => __('Non trouvé dans la corbeille'),
	);

	$args = array(
		'label'               => __('Annonces'),
		'description'         => __('Annonces'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes',),

		'menu_position' => 5,
		'show_in_rest' => true,
		'show_in_menu' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'annonces'),

	);

	register_post_type('annonces', $args);
}

add_action('init', 'cpt_jobs', 0);



// CPT Projets
function lf_actualites_rpt()
{

	$labels = array(
		// Le nom au pluriel
		'name'                => _x('Actualités', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x('Actualité', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __('Actualités'),
		// Les différents libellés de l'administration
		'all_items'           => __('Toutes les actualités'),
		'view_item'           => __('Voir les actualités'),
		'add_new_item'        => __('Ajouter une nouvelle actualité'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer'),
		'update_item'         => __('Modifier'),
		'search_items'        => __('Rechercher'),
		'not_found'           => __('Non trouvé'),
		'not_found_in_trash'  => __('Non trouvé dans la corbeille'),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'show_in_menu' => false,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes',),
		'menu_position' => 3,
		'menu_icon' => 'dashicons-admin-customizer',
	);

	// On enregistre notre custom post type
	register_post_type('actualites', $args);
}

add_action('init', 'lf_actualites_rpt'); // Le hook init lance la fonction




// TAXONOMIES

function wpm_add_taxonomies()
{

	// Taxonomie Thématique

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_vivant = array(
		'name'              			=> _x('Thématiques', 'taxonomy general name'),
		'singular_name'     			=> _x('Thématique', 'taxonomy singular name'),
		'search_items'      			=> __('Chercher une thématique'),
		'all_items'        				=> __('Toutes les thématiques'),
		'edit_item'         			=> __('Editer la thématique'),
		'update_item'       			=> __('Mettre à jour la thématique'),
		'add_new_item'     				=> __('Ajouter une nouvelle thématique'),
		'new_item_name'     			=> __('Valeur de la nouvelle thématique'),
		'separate_items_with_commas'	=> __('Séparer les thématiques avec une virgule'),
		'menu_name'         => __('Thématiques'),
	);

	$args_annee = array(
		'hierarchical'      => true,
		'labels'            => $labels_vivant,
		'show_ui'           => true,
		'show_in_rest' => true,
		'show_in_menu' => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'vivant'),
	);

	register_taxonomy('thematique',  array('projets', 'explorations'), $args_annee);

	// Taxonomie Catégories

	$labels_cat = array(
		'name'                       => _x('Catégories du projet', 'taxonomy general name'),
		'singular_name'              => _x('Catégorie du projet', 'taxonomy singular name'),
		'search_items'               => __('Rechercher une catégorie'),
		'popular_items'              => __('Catégories populaires'),
		'all_items'                  => __('Toutes les catégories'),
		'edit_item'                  => __('Editer une catégorie'),
		'update_item'                => __('Mettre à jour une catégorie'),
		'add_new_item'               => __('Ajouter une nouvelle catégorie'),
		'new_item_name'              => __('Nom de la catégorie'),
		'separate_items_with_commas' => __('Séparer les catégories avec une virgule'),
		'add_or_remove_items'        => __('Ajouter ou supprimer une catégorie'),
		'choose_from_most_used'      => __('Choisir parmi les plus utilisés'),
		'not_found'                  => __('Pas de catégories trouvées'),
		'menu_name'                  => __('Catégories du projet'),
	);

	$args_cat = array(
		'hierarchical'          => true,
		'labels'                => $labels_cat,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'show_in_menu' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array('slug' => 'categories-projet'),
	);

	register_taxonomy('categories-projet',  array('projets', 'explorations'), $args_cat);

	// Taxonomie Lieux

	$labels_cat = array(
		'name'                       => _x('Lieux', 'taxonomy general name'),
		'singular_name'              => _x('Lieu', 'taxonomy singular name'),
		'search_items'               => __('Rechercher un lieu'),
		'popular_items'              => __('Lieux populaires'),
		'all_items'                  => __('Tous les lieux'),
		'edit_item'                  => __('Editer le lieu'),
		'update_item'                => __('Mettre à jour le lieu'),
		'add_new_item'               => __('Ajouter un nouveau lieu'),
		'new_item_name'              => __('Nom du lieu'),
		'separate_items_with_commas' => __('Séparer les lieux avec une virgule'),
		'add_or_remove_items'        => __('Ajouter ou supprimer un lieu'),
		'choose_from_most_used'      => __('Choisir parmi les plus utilisés'),
		'not_found'                  => __('Pas de lieux trouvés'),
		'menu_name'                  => __('Lieux'),
	);

	$args_cat = array(
		'hierarchical'          => true,
		'labels'                => $labels_cat,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_in_menu' => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array('slug' => 'lieux'),
	);

	register_taxonomy('lieux',  array('projets', 'explorations'), $args_cat);
}

add_action('init', 'wpm_add_taxonomies', 0);




if (function_exists('get_field')) {
	function get_group_field(string $group, string $field, $post_id = 0)
	{
		$group_data = get_field($group, $post_id);
		if (is_array($group_data) && array_key_exists($field, $group_data)) {
			return $group_data[$field];
		}
		return null;
	}
}

register_nav_menus(array(
	'main-nav' => 'Menu Side Nav',
	'full-page' => 'Menu Full Page',


));


/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function wpdocs_custom_taxonomies_terms_links()
{
	// Get post by post ID.
	if (!$post = get_post()) {
		return '';
	}

	// Get post type by post.
	$post_type = $post->post_type;

	// Get post type taxonomies.
	$taxonomies = get_object_taxonomies($post_type, 'objects');

	$out = array();

	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {

		// Get the terms related to post.
		$terms = get_the_terms($post->ID, $taxonomy_slug);

		if (!empty($terms)) {

			foreach ($terms as $term) {
				$out[] = sprintf(
					'<a href="%1$s"><span="taxNames fauveUnderlineSmall">%2$s</span></a><span class="barre-nobold">&nbsp;|&nbsp;</span>',
					esc_url(get_term_link($term->slug, $taxonomy_slug)),
					esc_html($term->name)
				);
			}
			$out[] = "\n</ul>\n";
		}
	}
	return implode('', $out);
}

function wpdocs_custom_taxonomies_terms_links_2()
{
	// Get post by post ID.
	if (!$post = get_post()) {
		return '';
	}

	// Get post type by post.
	$post_type = $post->post_type;

	// Get post type taxonomies.
	$taxonomies = get_object_taxonomies($post_type, 'objects');

	$out = array();

	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {

		// Get the terms related to post.
		$terms = get_the_terms($post->ID, $taxonomy_slug);

		if (!empty($terms)) {

			foreach ($terms as $term) {
				$out[] = sprintf(
					'<a href="%1$s"><span="taxNames">%2$s </span><span class="barre-nobold">&nbsp;|&nbsp;</span></a>',
					esc_url(get_term_link($term->slug, $taxonomy_slug)),
					esc_html($term->name)
				);
			}
			$out[] = "\n</ul>\n";
		}
	}
	return implode('', $out);
}





add_action('wp_ajax_ajax_projets', 'projet_ajax_projets');
add_action('wp_ajax_nopriv_ajax_projets', 'projet_ajax_projets');

function projet_ajax_projets()
{
	if ($_GET["lieu"] != NULL && !in_array("tous", $_GET["lieu"])) {
		$lieu = array(
			'taxonomy' => 'lieux',
			'field' => 'slug',
			'terms' => $_GET['lieu'],
			'operator'      => 'AND'
		);
	}
	if ($_GET["categories"] != NULL && !in_array("tous", $_GET["categories"])) {
		$categories = array(
			'taxonomy' => 'categories-projet',
			'field' => 'slug',
			'terms' => $_GET['categories'],
			'operator'      => 'AND'
		);
	}
	if ($_GET["thematique"] != NULL && !in_array("tous", $_GET["thematique"])) {
		$thematique = array(
			'taxonomy' => 'thematique',
			'field' => 'slug',
			'terms' => $_GET['thematique'],
			'operator'      => 'AND'
		);
	}

	$args = array(
		'post_type' => 'projets',
		'tax_query' => array(
			'relation' => 'AND',
			$lieu,
			$categories,
			$thematique
		),
		'post_status' => "publish",
		'posts_per_page' => -1
	);
	//echo '<pre>'; var_dump($args); echo '</pre>';
	$post_update = new WP_Query($args); ?>
	<?php while ($post_update->have_posts()) : $post_update->the_post(); ?>
		<div class="cardProjet">
			<div class="thumbnailProjet"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
			<div class="titleProjet"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		</div>
	<?php endwhile;

	if ($post_update->post_count == 0) { ?>
		<div class="no-result"></div>
	<?php } ?>

	<?php wp_reset_postdata();
	wp_die();
}

add_action('wp_ajax_ajax_archive_list', 'archive_list');
add_action('wp_ajax_nopriv_ajax_archive_list', 'archive_list');

function archive_list()
{

	$posts_per_page = $_GET['posts_per_page'] ?? 20;
	$post_type =  $_GET["type"] ?? 'explorations';
	$paged =  $_GET["paged"] ?? 1;
	$args = array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
	);

	if($post_type!=="post"){
		$tax_query = array(
			'relation' => 'AND'
		);
		if (isset($_GET['taxonomy'])) {
			foreach ($_GET['taxonomy'] as $taxonomyName => $taxonomyTerms) {
				if(strpos($taxonomyName, "==OR")===strlen($taxonomyName)-4){
					array_push($tax_query, array(
						'taxonomy' => substr($taxonomyName, 0, strlen($taxonomyName)-4),
						'field' => "slug",
						'operator' => "IN",
						'terms' => $taxonomyTerms
					));
				}else{
					array_push($tax_query, array(
						'taxonomy' => $taxonomyName,
						'field' => "slug",
						'operator' => "AND",
						'terms' => $taxonomyTerms
					));
				}
			}
		}
		$args['tax_query'] = $tax_query;
	}

	$my_query = new WP_Query($args);
	if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
			if ($post_type === "explorations") : ?>
				<div class="preExplorationWrapper">
					<div class="explorationWrapper">
						<div class="taxThumbnailWrapper">
							<div class="taxExplo">
								<?php
								$taxonomies = get_object_taxonomies("explorations");
								foreach ($taxonomies as $taxonomy) :
									$terms = get_the_terms($my_query->get_the_ID(), $taxonomy);
									if ($terms && sizeof($terms)) :
										foreach ($terms as $term) : ?>
											<a href="<?= get_post_type_archive_link("explorations") ?>?<?= $taxonomy ?>=<?= $term->slug ?>">
												<span class="taxname">
													<?= $term->name ?>
													<span class="barre-nobold"> | </span>
												</span>
											</a>
								<?php
										endforeach;
									endif;
								endforeach;
								?>
							</div>
							<a href="<?php the_permalink(); ?>">
								<div class="imageExplo"><?php the_post_thumbnail(); ?></div>
							</a>
						</div>
						<div class="wrapperExplo">
							<div class="contentWrapperExploration">
								<div class="titleExplo"> <?php the_title(); ?></div>
								<div class="excerptExplo"><?php echo post_excerpt(60, '...'); ?>
									<a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>
								</div>
							</div>
							<div class="boutonWrapperExploration">
								<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> &nbsp; Partager</button>
								<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> &nbsp; <?php the_field('document_a_telecharger'); ?></button>
								<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> &nbsp; <?php the_field('lien_externe'); ?></button>
							</div>
						</div>
					</div>
				</div>
			<?php elseif($post_type === "projets") : ?>
				<div class="cardProjet">
					<div class="thumbnailProjet"> <a href="<?= the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
					<div class="titleProjet"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<p class="projectLoopLieu"><?php the_field('lieu', get_the_ID()); ?></p>
				</div>
			<?php else: ?>
				<div class="archive-actu-container" data-aos="fade-up">
					<div class="archive-actu-wrapper">
						<div class="archive-article-thumbnail"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
							<div class="archive-article-content-wrapper">
								<div class="archive-article-date"><?php the_date('j—n—Y'); ?></div>
								<div class="archive-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<div class="archive-article-excerpt"><a href="<?php the_permalink(); ?>"><?php echo post_excerpt(60, ' ... '); ?></a></div>
								<a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>
							</div>
							<div class="wrapperLinkArticle">
							<span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> Partager Fb-Ig-Tt</span>
							<span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> Télécharger document divers</span>
							<span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> Liens externes</span>
						</div>
					</div>
					<div class="boutonWrapperArchiveActu">
						<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> &nbsp; Partager</button>
						<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> &nbsp; Lien Interne / externe / site Web<?php the_field('document_a_telecharger'); ?></button>
						<button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> &nbsp; Partager <?php the_field('lien_externe'); ?></button>
					</div>
				</div>
			<?php endif;?>
		<?php
		endwhile;
	endif;
	wp_reset_query();
	wp_die();
}

add_action('wp_ajax_ajax_term_list', 'term_list');
add_action('wp_ajax_nopriv_ajax_term_list', 'term_list');
function term_list(){
	$returnedJsonObject = new StdClass();
	$returnedJsonObject->childs_active_terms = array();
	$post_type =  $_GET["type"] ?? 'explorations';
	$taxonomies = get_object_taxonomies($post_type); 
	$argsActiveTerms = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
		'post_status' => "publish"
	);
	$tax_query = array(
		'relation' => 'AND'
	);
	if (isset($_GET['taxonomy'])) {
		foreach ($_GET['taxonomy'] as $taxonomyName => $taxonomyTerms) {
			if(strpos($taxonomyName, "==OR")===strlen($taxonomyName)-4){
				array_push($tax_query, array(
					'taxonomy' => substr($taxonomyName, 0, strlen($taxonomyName)-4),
					'field' => "slug",
					'terms' => $taxonomyTerms,
					'operator' => "IN",
				));
			}else{
				array_push($tax_query, array(
					'taxonomy' => $taxonomyName,
					'field' => "slug",
					'terms' => $taxonomyTerms
				));
			}
		}
	}
	$argsActiveTerms['tax_query'] = $tax_query;
	$queryActiveTerms = new WP_Query($argsActiveTerms);
	if($queryActiveTerms->have_posts()): while($queryActiveTerms->have_posts()): 
		$queryActiveTerms->the_post();
		foreach($taxonomies as $taxonomy){
			$activeCurrentTerms = get_the_terms( get_the_ID(), $taxonomy );
			if(is_array($activeCurrentTerms) && sizeof($activeCurrentTerms)) foreach($activeCurrentTerms as $activeTerm) if(!array_search($activeTerm, $returnedJsonObject->childs_active_terms)) array_push($returnedJsonObject->childs_active_terms, $activeTerm);
		}
	endwhile; endif;
	wp_reset_query();
	echo wp_send_json($returnedJsonObject);
	wp_die();
}


function my_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
 <div>
 <input type="text" placeholder="Chercher..." value="' . get_search_query() . '" name="s" id="s" />

<button type="submit" id="searchsubmit" class="glyphicon glyphicon-search"></button>
 </div>
 </form>';

	return $form;
}
add_filter('get_search_form', 'my_search_form');

// search filter
function my_search_filter($query)
{
	if (!is_admin()) {
		if ($query->is_search) {
			$query->set('post_type', 'post'); //pour exclure les pages
			$query->set('category__not_in', array(37));
		}
		return $query;
	}
}
add_filter('pre_get_posts', 'my_search_filter');

add_action('wp_ajax_get_search_ajax', 'get_search_ajax');
add_action('wp_ajax_nopriv_get_search_ajax', 'get_search_ajax');
function get_search_ajax()
{

	$data = "";


	$posts_type = ["Actualité" => "post", "Actualité" => "actualites", "Explorations" => "explorations", "Projets" => "projets",];
	$post = 0;
	$actualites = 0;
	$projets = 0;
	$explorations = 0;

	foreach ($posts_type as $k => $post) {
		$the_query = new WP_Query(array('s' => $_GET["search"], "post_type" => $post));

		// The Loop
		if ($the_query->have_posts()) {
			$data .= "<h3>";
			$data .= $k;
			$data .= "</h3>";
			$data .= '<ul>';
			while ($the_query->have_posts()) {

				$$post++;
				$the_query->the_post();
				$data .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}
			$data .= '</ul>';
		}
	}

	echo "<div id='all_results'>";
	$total = 0;

	
	foreach ($posts_type as $k => $post) {
		echo "<div>" . $post . " [<span>" . $$post . "</span>] </div>";
		$total += $$post;
	}

	echo "Tout [";
	echo $total;
	echo "]";


	echo "</div>";


	echo "<div id=\"total_result\">Résultats <span>[</span><span class='jungleNumber'>$total</span><span>]</span></div>";

	echo $data;


	/* Restore original Post Data */
	wp_reset_postdata();
	wp_die();
}




// Cacher la barre WP

function wpc_show_admin_bar() {
	return false;
}
add_filter('show_admin_bar' , 'wpc_show_admin_bar');




// Function pour partager les boutons 

function my_sharing_buttons($content) {
    global $post;
    if(is_singular() || is_home()){
 
        // Récuperer URL de la page en cours 
        $myCurrentURL = urlencode(get_permalink());
 
        // Récuperer TITRE de la page en cours
        $myCurrentTitle = urlencode(get_the_title()); 
 
        // Récuperer MINIATURE si l'image à la une existe
        if(has_post_thumbnail($post->ID)) {
            $myCurrentThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full'); 
        }
        
        $linkedInURL = esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url='.$myCurrentURL.'&amp;title='.$myCurrentTitle );
   
        $content .= '<a class="msb-link msb-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
        }
        
        // si ce n'est pas un article ou une page, ne pas inclure les boutons de partages
        return $content; // correction du 9 février 2017
};

add_filter( 'the_content', 'my_sharing_buttons');


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 5;
}
add_filter('show_admin_bar' , 'wpc_show_admin_bar');



function post_excerpt($length=60, $after=" ... ") {
	$actualLength = 0;
	$the_post = get_post(); //Gets post ID
	$the_excerpt = (has_excerpt() ? get_the_excerpt() : $the_post->post_content ); // Gets post_content to be used as a basis for the excerpt
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); // Strips tags and images
	$words = explode(' ', $the_excerpt, $length + 1);
	$newExcerpt = array();

	foreach($words as $word){
		if($actualLength < $length){
			$actualLength += strlen($word);
			array_push($newExcerpt, $word);
		}
	}
	$the_excerpt = implode(' ', $newExcerpt);
	return $the_excerpt.($actualLength > $length ? $after : "");
}
