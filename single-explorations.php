<?php

/**
 *  The template for displaying Single Exploration
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

<div class="headerExplo" >

    <a href="<?php echo get_option('home'); ?>/"><img data-aos="zoom-in" data-aos-duration="1000" class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"><a>

</div>




<div class="mainExploration">

    <div class="titleWrapperExplorationResponsive">

        <h1 data-aos="fade-up"><?php the_field('titre'); ?></h1>

    </div>


    <div class="leftColumnExploration">

        <div class="tagsWrapperExploration" data-aos="fade-up">
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
                echo '<a href="' . get_post_type_archive_link(get_post_type()) . '"';
                echo ' class="' . (sizeof($term['terms']) ? "parentTags" : "") . '">' . $term['term']->name . ' </a>';
                foreach ($term['terms'] as $child) {
                    echo '&nbsp; &nbsp;';
                    echo '<a href="' . get_post_type_archive_link(get_post_type()) . '?' . $term['taxonomy']->name . '=' . $child->slug . '">';
                    echo $child->name . '</a>';
                    echo ' <span class="barre-nobold">&nbsp;|&nbsp;</span>';
                    
                }
            }
            ?>

        </div>

        <div data-aos="fade-up" class="article-thumbnail"><?php the_post_thumbnail(); ?></div>

        <div class="boutonWrapperExploration">

            <span class="shareLinks" data-aos="fade-up"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg">
            &nbsp; Partager | <?php echo my_sharing_buttons($content) ?></span>
            <?php if (get_field('document_a_telecharger')) : ?>
            <span class="shareLinks"data-aos="fade-up"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> <?php the_field('document_a_telecharger'); ?></span>
            <?php endif; ?>
            <?php if (get_field('lien_externe')) : ?>
            <span class="shareLinks" data-aos="fade-up"><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> <?php the_field('lien_externe'); ?></span>
            <?php endif; ?>


        </div>

    </div>

    <div class="rightColumnExploration">

        <div class="titleWrapperExploration" data-aos="fade-up">

            <h1><?php the_field('titre'); ?></h1>

        </div>

        <div class="contentWrapperExploration" data-aos="fade-up">

            <div class="chapeauWrapperExploration" data-aos="fade-up">
                <o><?php the_field('chapeau'); ?></p>
            </div>

            <div class="subtitleWrapperExploration" data-aos="fade-up">
                <h3><?php the_field('sous-titre'); ?></h3>
            </div>

            <div class="texteWrapperExploration"data-aos="fade-up">
                <p><?php the_field('contenu'); ?></p>
            </div>

        </div>
    </div>

</div>



<div class="galleryWrapper mainExploration">
    <?php $images = get_field('galerie_exploration');
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
        <span class="close"><i class="fa-solid fa-xmark"></i></span>
    </div>
</div>
</div>


<div class="projetsLoop projetsLoopExplo" data-aos="fade-up">


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

        if (sizeof($postToDisplay)<4) {
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
                <a href="<?= $post['permalink']; ?>" title="<?= $post['title_attribute']; ?>">
                    <div class="projectThumbnail" data-aos="fade-up"><?= $post['thumbnail']; ?></div>
                    <div class="projectTitle" data-aos="fade-up"><?= $post['title']; ?></div>
                    <p class="projectLoopLieu" data-aos="fade-up"><?= $post['lieu'] ?></p>
                </a>
            </div>
        <?php
        endforeach;

        ?>


    </div>



    <div class="projetsLoopActu" data-aos="fade-up">


        <div class="list-link-loop">
            <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">
            <span class="titleListLink">ACTUALITÉS</span>
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
                echo '<a href="' . get_post_type_archive_link('post') . '" class="fauveUnderline">' . $displayTerm->name . '</a>';
            }
            ?>

        </div>

        <div class="loopWrapperActu">

            <?php
            $postToDisplay = array();
            $postToIgnore = array();
            $args = array(
                'post_type' => 'post',
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
                        'date' => get_the_time('d—m—Y')
                    );
                    array_push($postToDisplay, $post);
                endwhile;
            endif;
            wp_reset_query();
            wp_reset_postdata();

            if (sizeof($postToDisplay) < 4) {
                $args = array(
                    'post_type' => 'post',
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
                            'date' => get_the_time('d—m—Y'),
                        );
                        array_push($postToDisplay, $post);
                    endwhile;
                endif;
                wp_reset_query();
                wp_reset_postdata();
            }

            foreach ($postToDisplay as $post) : ?>
                <div class="projectCardActu" data-aos="fade-up">
                    <a href="<?= $post['permalink']; ?>" title="<?= $post['title_attribute']; ?>">
                        <div class="projectThumbnail" data-aos="fade-up"><?= $post['thumbnail']; ?></div>
                        <span class="projectLoopLieu" data-aos="fade-up"><?= $post['date']; ?></span>
                        <div class="projectTitle" data-aos="fade-up"><?= $post['title']; ?></div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>


</div>



</div>

</div>





<?php get_footer(); ?>