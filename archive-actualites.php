<?php

/**
 *    The template for displaying Archive Actualités
 * 
 * 
 */
get_header();
?>


<div class="projetsContainer">

    <div class="headerProjets">

        <div class="logoHeader" data-aos="zoom-in" data-aos-duration="1000">

            <a href="<?php echo get_option('home'); ?>/"><img class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_logo_fiches.svg"></a>

            <h1 class="projPageName">ACTUALITÉS</h1>

        </div>

    </div>

    <div class="contentActualites">


        <div class="archive-actu-bloc" id="post-list">


            <?php
            $args = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'posts_per_page' => 20,
            );

            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="archive-actu-container" data-aos="fade-up">

                        <div class="archive-actu-wrapper">

                            <div class="archive-article-thumbnail"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                            <div class="archive-article-content-wrapper">

                                <div class="archive-article-date"><?php the_date('j—n—Y'); ?></div>
                                <div class="archive-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                <div class="archive-article-excerpt"><a href="<?php the_permalink(); ?>"><?php echo post_excerpt(60, ' ... '); ?></a></div>
                                <a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_load.svg"></a>
                            </div>

                            <div class="wrapperLinkArticle">
                                <span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-partager.svg">
                                    &nbsp; Partager <?php echo my_sharing_buttons($content) ?></span>
                                <?php if (get_field('document_a_telecharger')) : ?>

                                <?php endif; ?>
                            </div>

                        </div>

                        <div class="boutonWrapperArchiveActu">
                            <button><img class="logo-categorie logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-partager.svg">
                                &nbsp; Partager <?php echo my_sharing_buttons($content) ?></button>
                            
                        </div>





                    </div>




            <?php
                endwhile;
            endif;

            wp_reset_postdata();

            ?>


        </div>
        <div id="load-more-post" data-paged="1"><?= file_get_contents(get_template_directory_uri().'/src/assets/img/lf_picto_load.svg');?></div>
    </div>










    <?php get_footer(); ?>