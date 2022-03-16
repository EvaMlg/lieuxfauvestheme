<?php

/**
 *  The template for displaying Single Projet
 * 
 * 
 */
get_header();
$current_post_type = get_post_type();
$taxonomies = get_object_taxonomies($current_post_type);

$taxQuery = array(
    'relation' => 'OR',
);
foreach ($taxonomies as $taxonomy) :
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if ($terms && sizeof($terms)) :
        $taxQueryTerm = array();
        foreach ($terms as $term) {
            if (!array_search($term->term_id, $taxQueryTerm)) array_push($taxQueryTerm, $term->term_id);
            if (!array_search($term->parent, $taxQueryTerm)) array_push($taxQueryTerm, $term->parent);
        }
        array_push($taxQuery, array(
            'taxonomy' => $taxonomy,
            'field' => 'id',
            'terms' => $taxQueryTerm
        ));
    endif;
endforeach;
?>


<div class="titleWrapperResponsive">

    <?php the_title('<h1 class="singleProjetTitle">', '</h1>'); ?>
    <h2 class="singleProjetSubTitle"><?php the_field('lieu'); ?></h2>

</div>

<div class="headerProjetWrapper">


    <div class="imageWrapper">

        <div class="imageThumbnailWrapper">


            <?php
            $image = get_field('image');
            if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>

        </div>

        <img class="mobileImgWhiteLayout" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_mobile_projet_logo2.svg">

    </div>

    <div class="navNextPrev">
        <a href="/projets"><img class="close-icon laptopPicto" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_burguer-fermer.svg"></span></a>
        <a href="/projets"><img class="close-icon mobilePicto" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_trait_fermer_gris.svg"></span></a>



        <?php
        $prev_post = get_previous_post();
        $id = $prev_post->ID;
        $permalink = get_permalink($id);
        ?>
        <?php
        $next_post = get_next_post();
        $nid = $next_post->ID;
        $permalink = get_permalink($nid);
        ?>


        <span class="nav-previous"><?php previous_post_link('%link', __('<img STYLE="height:22px;width:22px" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_slide_picto-prev.svg">')); ?>
            <h2><a href="<?php echo $permalink; ?>"></a></h2>
        </span>

        <span class="nav-next"><?php next_post_link('%link', __('<span class="meta-nav"><img STYLE="height:22px;width:22px" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_slide_picto-next.svg">')); ?>
            <h2><a href="<?php echo $permalink; ?>"></a></h2>
        </span>

        <span class="nav-previousMobile"><?php previous_post_link('%link', __('<img STYLE="height:22px;width:22px" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_projet_picto-prev_gris.svg">')); ?>
            <h2><a href="<?php echo $permalink; ?>"></a></h2>
        </span>

        <span class="nav-nextMobile"><?php next_post_link('%link', __('<span class="meta-nav"><img STYLE="height:22px;width:22px" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg">')); ?>
            <h2><a href="<?php echo $permalink; ?>"></a></h2>
        </span>

    </div>



    <div class="whiteLayout">
        <img class="laptopImgWhiteLayout" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_projet_logo.svg">

        <a href="<?php echo get_option('home'); ?>/">
            <div class="zone-cliquable"></div>
        </a>


        <div class="nomenclature">

            <div class="taxNamesProj">

                <?php
                $displayedTerms = array();
                $filteredTaxonomies = array(
                    'thematique'
                );

                foreach (get_taxonomies([], 'objects') as $taxonomy) {
                    if (isset($taxonomy->object_type) && $taxonomy->object_type) {
                        if (array_search($taxonomy->name, $filteredTaxonomies) !== false && array_search(get_post_type(), $taxonomy->object_type) !== false) {
                            $terms = wp_get_post_terms(get_the_ID(), $taxonomy->name);
                            foreach ($terms as $key => $term) {
                                if ($term->parent !== 0) :
                                    if (!$displayedTerms[$term->parent]) {
                                        $displayedTerms[$term->parent] = array(
                                            'term' => get_term($term->parent, $taxonomy->name),
                                            'terms' => array($term),
                                            'taxonomy' => $taxonomy
                                        );
                                    } else {
                                        array_push($displayedTerms[$term->parent]['terms'], $term);
                                    };
                                else :
                                    if (!$displayedTerms[$term->term_id]) {
                                        $displayedTerms[$term->term_id] = array(
                                            'term' => $term,
                                            'terms' => array(),
                                            'taxonomy' => $taxonomy
                                        );
                                    }
                                endif;
                            }
                        }
                    }
                }
                foreach ($displayedTerms as $term) {
                    foreach ($term['terms'] as $child) {
                        echo '<span class="fauveUnderlineSmall"><a href="' . get_post_type_archive_link(get_post_type()) . '?' . $term['taxonomy']->name . '=' . $child->slug . '">';
                        echo $child->name . '</a></span><span class="barre-nobold"> | </span>';
                    }
                }
                ?>
            </div>




            <?php
            $nomenclature = get_field('nomenclature');
            if ($nomenclature) : ?>
                <div class="nomenclature-wrapper">
                    <span>Date&nbsp;:&nbsp;<?php echo $nomenclature['date']; ?></span><br>
                    <span>Prix&nbsp;:&nbsp;<?php echo $nomenclature['prix']; ?></span><br>
                    <span>Maitrîse&nbsp;d'ouvrage&nbsp;:&nbsp;<?php echo $nomenclature['maitrise_douvrage']; ?></span>
                </div>
                </p>
        </div>


    <?php endif; ?>
    </div>

</div>

<div class="ficheTechniqueMobile">

    <div class="cardLinkJungle">
        <p class="cardLink">Fiche technique</p><button class="logoOuvrir logoOuvrirM"><img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg"></button>
    </div>
    <div class="ficheTechnique ficheTechniqueM">
        <div class="FTright columnFT">
            <div class="wrapperItems">

                <?php
                $ficheTechnique = get_field('fiche_technique');
                if ($ficheTechnique) : ?>

                    <h3>Programme</h3>
                    <p><?php echo $ficheTechnique['programme']; ?></p>
            </div>
            <div class="wrapperItems">
                <h3>Maîtrise d’ouvrage</h3>
                <p><?php echo $ficheTechnique['maitrise_d’ouvrage']; ?></p>
            </div>
            <div class="wrapperItems">
                <h3>Maîtrise d’oeuvre</h3>
                <p><?php echo $ficheTechnique['maitrise_d’oeuvre']; ?></p>
            </div>
        </div>
        <div class="FTleft columnFT">
            <div class="wrapperItems">
                <h3>Surface</h3>
                <p><?php echo $ficheTechnique['surface']; ?></p>
            </div>
            <div class="wrapperItems">
                <h3>Coûts</h3>
                <p><?php echo $ficheTechnique['couts']; ?></p>
            </div>
            <div class="wrapperItems">
                <h3>Dates / Livraison</h3>
                <p><?php echo $ficheTechnique['dates__livraison']; ?></p>
            </div>
            <div class="wrapperItems">
                <h3>Performances environnementales</h3>
                <p><?php echo $ficheTechnique['performances_environnementales']; ?></p>
            </div>
        </div>


    <?php endif; ?>
    </div>
</div>



<div class="contentWrapperProjet">


    <div class="titleWrapper">

        <?php the_title('<h1 class="singleProjetTitle">', '</h1>'); ?>
        <h2 class="singleProjetSubTitle"><?php the_field('lieu'); ?></h2>

    </div>



    <div class="galleryWrapper" data-aos="zoom-in" data-aos-duration="1000" >


        <?php $images = get_field('galerie_projet');
        if ($images) : ?>
            <?php foreach ($images as $image) : ?>
                <div class="single-slide-image">
                    <img class="logo-categorie" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <span class="zoom-image"><img class="logo-categorie pictoSlider" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_slide_picto-full.svg"></span>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    <div class="zoom-image-slider">
        <div class="div-zoom">
            <img src="" />
            <span class="close"><i><img class="logo-categorie pictoSlider" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_burguer-fermer.svg"></i></span>
        </div>

    </div>
    <div class="projetWrapper">


        <div class="leftColumn">


            <div class="cardLinkJungle mobileNone">
                <p class="cardLink">Fiche technique</p><button class="logoOuvrir logoOuvrirL"><img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg"></button>
            </div>
            <div class="ficheTechnique mobileNone ficheTechniqueL">
                <div class="FTright columnFT">
                    <div class="wrapperItems">

                        <?php
                        $ficheTechnique = get_field('fiche_technique');
                        if ($ficheTechnique) : ?>

                            <h3>Programme</h3>
                            <p><?php echo $ficheTechnique['programme']; ?></p>
                    </div>
                    <div class="wrapperItems">
                        <h3>Maîtrise d’ouvrage</h3>
                        <p><?php echo $ficheTechnique['maitrise_d’ouvrage']; ?></p>
                    </div>
                    <div class="wrapperItems">
                        <h3>Maîtrise d’oeuvre</h3>
                        <p><?php echo $ficheTechnique['maitrise_d’oeuvre']; ?></p>
                    </div>
                </div>
                <div class="FTleft columnFT">
                    <div class="wrapperItems">
                        <h3>Surface</h3>
                        <p><?php echo $ficheTechnique['surface']; ?></p>
                    </div>
                    <div class="wrapperItems">
                        <h3>Coûts</h3>
                        <p><?php echo $ficheTechnique['couts']; ?></p>
                    </div>
                    <div class="wrapperItems">
                        <h3>Dates / Livraison</h3>
                        <p><?php echo $ficheTechnique['dates__livraison']; ?></p>
                    </div>
                    <div class="wrapperItems">
                        <h3>Performances environnementales</h3>
                        <p><?php echo $ficheTechnique['performances_environnementales']; ?></p>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <div class="boutonWrapperProjet">
                <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> &nbsp; Partager</p>
                 <?php if (get_field('document_a_telecharger')) : ?>
                <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> &nbsp;
                    
                        <a class="docDownload" href="<?php the_field('document_a_telecharger'); ?>">Download File</a>
                </p>
            <?php endif; ?>
            <?php if (get_field('lien_externe')) : ?>
            <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> &nbsp; <?php the_field('lien_externe'); ?></p>
            <?php endif; ?>
            </div>



        </div>


        <div class="rightColumn">

            <h2 data-aos="fade-up"><?php the_field('chapeau'); ?></h2>
            <h3 data-aos="fade-up"> Description </h3>
            <p data-aos="fade-up"><?php the_field('description_projet'); ?></p>

            

        </div>

        <div class="boutonWrapperProjetMobile">
                <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> &nbsp; Partager</p>
                <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> &nbsp;
                    <?php if (get_field('document_a_telecharger')) : ?>
                        <a class="docDownload" href="<?php the_field('document_a_telecharger'); ?>">Download File</a>
                </p>
            <?php endif; ?>
            <p class="cardLink cardLinkLight shareLinks"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> &nbsp; <?php the_field('lien_externe'); ?></p>
        </div>

    </div>

</div>


<div class="projetsLoop">


    <div class="list-link-loop">
        <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">
        <span class="titleListLink">PROJETS</span>
        <?php
        $displayTerms = array();
        foreach ($taxQuery as $tax) {
            if (isset($tax['terms']) && is_array($tax['terms']) && sizeof($tax['terms'])) {
                foreach ($tax['terms'] as $term) {
                    $currentTerm = get_term($term, $tax['taxonomy']);
                    if ($currentTerm->parent === 0 && array_search($tax['taxonomy'], $filteredTaxonomies) !== false && array_search($currentTerm, $displayTerms) === false) array_push($displayTerms, $currentTerm);
                }
            }
        }
        foreach ($displayTerms as $displayTerm) {
            echo '<a href="' . get_post_type_archive_link('projets') . '" class="fauveUnderline">' . $displayTerm->name . '</a>';
        }
        ?>
    </div>


    <div class="loopWrapper">

        <?php
        $postToDisplay = array();
        $postToIgnore = array();

        $args = array(
            'post_type' => 'projets',
            'posts_per_page' => 4,
            'tax_query' => $taxQuery
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) :
            while ($my_query->have_posts()) :
                $my_query->the_post();
                array_push($postToIgnore, get_the_ID());
                $post = array(
                    'permalink' => get_permalink(get_the_ID()),
                    'thumbnail' => get_the_post_thumbnail(get_the_ID()),
                    'title_attribute' => the_title_attribute(array('echo' => false, 'post' => get_the_ID())),
                    'title' => get_the_title(get_the_ID()),
                    'lieu' => get_field('lieu', get_the_ID())
                );
                array_push($postToDisplay, $post);
            endwhile;
        endif;
        wp_reset_query();
        wp_reset_postdata();

        if (sizeof($postToDisplay) < 4) {
            $args = array(
                'post_type' => 'projets',
                'posts_per_page' => (4 - sizeof($postToDisplay)),
                'post__not_in' => $postToIgnore,
                'orderby' => 'rand'
            );
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) :
                while ($my_query->have_posts()) :
                    $my_query->the_post();
                    $post = array(
                        'permalink' => get_permalink(get_the_ID()),
                        'thumbnail' => get_the_post_thumbnail(get_the_ID()),
                        'title_attribute' => the_title_attribute(array('echo' => false, 'post' => get_the_ID())),
                        'title' => get_the_title(get_the_ID()),
                        'lieu' => get_field('lieu', get_the_ID())
                    );
                    array_push($postToDisplay, $post);
                endwhile;
            endif;
            wp_reset_query();
            wp_reset_postdata();
        }



        foreach ($postToDisplay as $post) : ?>
            <div class="projectCard" data-aos="fade-up">
                <a href="<?= $post['permalink']; ?>">
                    <div class="projectThumbnail"><?= $post['thumbnail']; ?></div>
                    <div class="projectTitle" data-aos="fade-up"><a href="<?= $post['permalink']; ?>" title="<?= $post['title_attribute']; ?>"><?= $post['title']; ?></a></div>
                    <p class="projectLoopLieu" data-aos="fade-up"><?= $post['lieu']; ?></p>
                </a>
            </div>

        <? endforeach; ?>


    </div>
</div>


</div>





<?php get_footer(); ?>