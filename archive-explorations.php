<?php

/**
 *  The template for displaying Archive Exploration
 */
get_header();
?>


<div class="explorationsContainer">
    <div class="headerExploration">
        <div class="logoHeader">
            <a href="<?php echo get_option('home'); ?>/"><img class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_logo_fiches.svg"></a>
            <h1 class="exploPageName">EXPLORATIONS</h1>

            <div class="reponsiveCat">
                <a> <img class=" pictoFiltres responsiveCatLogo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile_picto-filtres.svg" /></a>
            </div>

            <a><img class="pictoValider responsiveCatLogo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile-picto_valider.svg" /></a>
        </div>
        <div class="categoryHeader catHeaderOff">
            <?php
            $current_post_type = get_post_type();
            $taxonomies = get_object_taxonomies($current_post_type);
            foreach (array_reverse($taxonomies) as $taxonomy) :  if ($taxonomy === 'thematique' || $taxonomy === 'lieux') :
                    $childs_active_terms = array();
                    $argsActiveTerms = array(
                        'post_type' => $current_post_type,
                        'posts_per_page' => -1,
                        'post_status' => "publish",
                    );
                    $queryActiveTerms = new WP_Query($argsActiveTerms);
                    if ($queryActiveTerms->have_posts()) : while ($queryActiveTerms->have_posts()) :
                            $queryActiveTerms->the_post();
                            $activeCurrentTerms = get_the_terms(get_the_ID(), $taxonomy);
                            if (is_array($activeCurrentTerms) && sizeof($activeCurrentTerms)) foreach ($activeCurrentTerms as $activeTerm) if (!array_search($activeTerm, $childs_active_terms)) array_push($childs_active_terms, $activeTerm);
                        endwhile;
                    endif;
                    wp_reset_query();
                    $parents_terms = get_terms($taxonomy, array('hide_empty' => false, 'parent' => 0));
                    if ($taxonomy === "lieux") {
                        $fake_taxonomy = new StdClass();
                        $fake_taxonomy->name = "Lieux";
                        $parents_terms = array(
                            $fake_taxonomy
                        );
                    }
                    foreach (array_reverse($parents_terms) as $parent_term) :
                        $order_menu = get_field('order_menu', 'term_'.$parent_term->term_id);
                        $childs_terms = ($taxonomy !== "lieux") ?
                            get_terms($taxonomy, array('hide_empty' => false, 'parent' => $parent_term->term_id))
                            :
                            get_terms($taxonomy, array('hide_empty' => false));

                        $actual_term = isset($_GET[$taxonomy]) ? get_term_by('slug', $_GET[$taxonomy], $taxonomy) : false;
            ?>
                        <div class="catArchi catWrapper" style="order:<?= $order_menu;?>">
                            <span class="catName"><?= $parent_term->name ?></span>
                            <div class="div-to-toggle">
                                <div <?= $parent_term->slug ? 'data-cat="' . $parent_term->slug . '"' : ""; ?> data-id="<?= $taxonomy; ?>" class="subCatName">
                                    <span data-id="tous" <?= ($actual_term && $actual_term->parent && $actual_term->parent === $parent_term->term_id) ? "" : 'class="active"'; ?>>Tous</span>
                                    <?php if ($childs_terms && is_array($childs_terms) && sizeof($childs_terms)) :
                                        foreach ($childs_terms as $child_term) :
                                            echo '<span data-id="' . $child_term->slug . '" class="';
                                            echo (array_search($child_term, $childs_active_terms) === false ? "unclickable" : "") . ($_GET[$taxonomy] === $child_term->slug ? "active" : "");
                                            echo '">';
                                            echo $child_term->name;
                                            echo '</span>';
                                            if($child_term->description):
                                                echo '<div class="subCatDescription">';
                                                echo '<p><b>'.$child_term->name.'</b>'.(function_exists('get_field') && get_field('title_complete', $child_term) ? ",".get_field('title_complete', $child_term) : "").'</p>';
                                                echo '<p>'.$child_term->description.'</p>';
                                                echo '</div>';
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
            <?php endforeach;
                endif;
            endforeach;
            ?>
        </div>
    </div>

    <?php
    $args = array(
        'post_type' => 'explorations',
        'post_status' => 'publish',
        'posts_per_page' => 20,
        'meta_query'	=> array(
			'relation'		=> 'OR',
            array(
                'key'	 	=> 'show_in_non_ajax_result',
				'compare'	=> 'NOT EXISTS'
            ),
			array(
                'key'	 	=> 'show_in_non_ajax_result',
				'value'		=> '1'
            ),
        ),
    );

    $tax_query = array(
        'relation' => 'AND'
    );
    foreach ($taxonomies as $taxonomy) {;
        if (isset($_GET[$taxonomy])) {
            array_push($tax_query, array(
                'taxonomy' => $taxonomy,
                'field' => "slug",
                'terms' => array($_GET[$taxonomy])
            ));
        }
    }
    $args['tax_query'] = $tax_query;

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : ?>
        <div id="explorations-list">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <div class="preExplorationWrapper">
                    <div class="explorationWrapper">
                        <div class="taxThumbnailWrapper">
                            <div class="taxExplo">
                                <?php
                                foreach ($taxonomies as $taxonomy) :
                                    $terms = get_the_terms($my_query->get_the_ID(), $taxonomy);
                                    if ($terms && sizeof($terms)) :
                                        foreach ($terms as $term) : ?>
                                            <a href="<?= get_post_type_archive_link($current_post_type) ?>?<?= $taxonomy ?>=<?= $term->slug ?>">
                                                <span class="taxname">
                                                    <?= $term->name ?> </span>
                                                <span class="barre-nobold">&nbsp;|</span>
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
                                <div class="excerptExplo"><?php echo post_excerpt(60, '...');  ?>
                                    <a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_load.svg"></a>
                                </div>
                            </div>

                            <div class="boutonWrapperExploration">
                                <button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-partager.svg">
                                    &nbsp; Partager | <?php echo my_sharing_buttons($content) ?></button>
                                <?php if (get_field('document_a_telecharger')) : ?>
                                    <?php
                                    $file = get_field('document_a_telecharger'); ?>
                                    <?php
                                        if ($file) : ?>
 <span><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-telecharger.svg"><a class="docDownload" href="<?php echo $file['url']; ?>">Document à télécharger</a>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>


                                <?php if (get_field('lien_externe')) : ?>
                    <span class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-lien.svg">&nbsp; 
                        <?php
                        $link = get_field('lien_externe');
                        if ($link) :
                            $link = get_field('lien_externe');
                            $link_url = $link['url'];
                            $link_title = $link['title']; ?>
                            <a href="<?php echo $link_url; ?>"><?php echo $link_title; ?></a>
                        <?php endif; ?>
                        </span>
                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata();
    ?>
    <div id="load-more-explorations" data-paged="1"><?= file_get_contents(get_template_directory_uri().'/src/assets/img/lf_picto_load.svg');?></div>

</div>


<?php get_footer(); ?>