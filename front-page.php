<?php

/**
 *  The template for displaying Front-page
 * 
 * 
 */
get_header();
?>



<div class="front-image">
    <?php
    $image = get_field('front_image');
    if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
</div>

<div class="wrapper-front-page">

    <div class="container-front-page">


        <div class="split-left" id="splitLeft">

            <div class="logoHeader">

            <a class="logoFrontPageA" href="<?php echo get_option('home'); ?>/" ><img class="logoFrontpage" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>



            </div>

            <a href="<?php echo get_option('home'); ?>/" ><img class="logoFrontpageCloned" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>



            <div class="list-chapter">
                <span class="lieuxSpan">Lieux</span><br>
                <a href="#sec-faire"><span>pour</span><span class="catSpan faireSpan"> Faire</span><br></a>
                <a href="#sec-archiurba"><span>une</span><span class="catSpan archiSpan"> Architecture</span><br></a>
                <a href="#sec-archiurba"><span>et un</span><span class="catSpan urbaSpan"> Urbanisme</span><br></a>
                <a href="#sec-ves"><span class="catSpan vivantSpan">Vivant,</span><br></a>
                <a href="#sec-ves"><span class="catSpan ethiqueSpan">Éthique</span><br></a>
                <a href="#sec-ves"><span>et</span><span class="catSpan soutenableSpan"> Soutenable</span><br></a>
            </div>


        </div>


        <div class="split-right">

            <section class="sec-lieux" id="sec-lieux">

                <?php
                $section_lieux = get_field('section_lieux');
                if ($section_lieux) : ?>

                    <div class="image-wrapper">

                        <img src="<?php echo esc_url($section_lieux['image']['url']); ?>" alt="<?php echo esc_attr($hero['image']['alt']); ?>" />
                    </div>

                    <div class="link-bloc-2">

                        <div class="tagline" data-aos="fade-up"s >
                            <p><?php echo $section_lieux['tagline']; ?></p>
                        </div>

                        <div class="list-link" data-aos="fade-up">
                        
                            <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">

    
                            <span class="titleListLink">AGENCE</span>

                            <a href="agence/#sec-agence" class="fauveUnderline">Valeurs</a>
                            <a href="agence/#sec-expertises" class="fauveUnderline">Expertises</a>
                            <a href="agence/#sec-equipe" class="fauveUnderline">Équipe</a>
                        </div>

                    </div>

                    <div class="bloc-haiku haiku-map">
                        <?php $haiku = get_group_field('section_lieux', 'haiku') ?>
                        <!-- <img src="<?php echo esc_url($haiku['image']['url']); ?>" alt="<?php echo esc_attr($haiku['image']['alt']); ?>" /> -->
                        <?php echo '<p data-aos="fade-up">' ?>
                    <?php echo $haiku['texte']; ?>
                    <?php echo '</p>' ?>
                    </div>

                <?php endif; ?>

            </section>


            <section class="sec-faire" id="sec-faire" >

                <div class="actu-bloc">

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'posts_per_page' => 2,


                    );

                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <div class="actu-wrapper" data-aos="fade-up">


                                <a href="<?php the_permalink(); ?>">
                                    <div class="article-thumbnail"><?php the_post_thumbnail(); ?></div>
                                    <div class="article-date"><?php the_date('j—n—Y'); ?></div>
                                    <div class="article-title"><?php the_title(); ?></div>
                                    <a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>
                            </div>

                    <?php

                        endwhile;
                    endif;

                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();

                    ?>




                </div>

                <div class="link-bloc">
                    <div class="list-link" data-aos="fade-up">
                        <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">

                        <span class="titleListLink">ACTUALITÉS</span>


                        <a href="agence/#sec-rejoindre" class="fauveUnderline">Rejoindre Lieux F.AU.VES</a>
                    </div>
                </div>

                <div class="bloc-haiku">
                    <?php
                    $section_faire = get_field('section_faire');
                    if ($section_faire) : ?>
                        <?php $haiku = get_group_field('section_faire', 'haiku') ?>
                        <?php echo '<p data-aos="fade-up">' ?>
                    <?php echo $haiku['texte']; ?>
                    <?php echo '</p>' ?>
                    <?php endif; ?>
                </div>

            </section>

            <section class="sec-archiurba" id="sec-archiurba">

                <div class="projet-bloc">
                    <?php
                    // 1. Arguments 
                    $args = array(
                        'post_type' => 'projets',
                        'category_projet' => 'architecture',
                        'posts_per_page' => 1,

                    );
                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <div class="projet-popup-wrapper">
                           <img class="logo-open" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg">
                                <div class="projet-thumbnail thumbnailPopup" id="thumbnailPopup"><?php the_post_thumbnail(); ?></div>
                                <div class="projet-popup transition contentPopup" id="contentPopup">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?></a>
                                        <p class="projectLoopLieu"><?php the_field('lieu', $post->ID); ?></p>
                                    <?php the_excerpt(); ?>
                                    <div class="logo-wrapper">
                                        <a href="<?php the_permalink(); ?>"><img class="logo-readmore" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>
                                        <button id="logoClose" class="logoClose"><img class="logo-close" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_fermer.svg"></button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;

                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();

                    ?>
               
                    <?php
                    // 1. Arguments 
                    $args = array(
                        'post_type' => 'projets',
                        'category_projet' => 'urbanisme',
                        'posts_per_page' => 1,

                    );
                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <div class="projet-popup-wrapper">
                           <img class="logo-open logo-open-urba" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg">
                                <div class="projet-thumbnail thumbnailPopup" id="thumbnailPopup"><?php the_post_thumbnail(); ?></div>
                                <div class="projet-popup projet-popup-urba transition contentPopup" id="contentPopup">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?></a>
                                        <p class="projectLoopLieu"><?php the_field('lieu', $post->ID); ?></p>
                                    <?php the_excerpt(); ?>
                                    <div class="logo-wrapper">
                                        <a href="<?php the_permalink(); ?>"><img class="logo-readmore" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>
                                        <button id="logoClose" class="logoClose"><img class="logo-close" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_fermer.svg"></button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;

                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();

                    ?>

                </div>

                <div class="link-bloc">
                    <div class="list-link" data-aos="fade-up">

                        <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">
                        <span class="titleListLink">PROJETS</span>
                        <a href="projets?cat=architecture" class="fauveUnderline">Architecture</a>
                        <a href="projets?cat=urbanisme" class="fauveUnderline">Urbanisme</a>
                        <a href="projets?cat=paysage" class="fauveUnderline">Paysage</a>

                    </div>
                </div>

                <div class="bloc-haiku">
                    <?php $haiku = get_group_field('section_archiurba', 'haiku') ?>
                    <img src="<?php echo esc_url($haiku['image']['url']); ?>" alt="<?php echo esc_attr($haiku['image']['alt']); ?>" />
                    <?php echo '<p data-aos="fade-up">' ?>
                    <?php echo $haiku['texte']; ?>
                    <?php echo '</p>' ?>
                    
                </div>


            </section>

            <section class="sec-ves" id="sec-ves">

                <!--  <div class="bloc-image">
                    <?php
                    $section_ves = get_field('section_ves');
                    if ($section_ves) : ?>
                        
                </div> -->

                <div class="bloc-exploration">
                    <?php
                        // 1. Arguments => 
                        $args = array(
                            'post_type' => 'explorations',
                            'category_projet' => 'architecture',
                            'posts_per_page' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            )


                        );

                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                          

                                <div class="preExplorationWrapper">
                                    <div class="explorationWrapper" data-aos="fade-up">
                                    <a href="<?php the_permalink(); ?>">
                                <div class="thumbnailExplo"><?php the_post_thumbnail(); ?></div>
                                        <div class="exploWrapper">
                                       
                                            <div class="titleExplo"><?php the_title(); ?></div>
                                            <div>
                                                <div class="excerptExplo"><?php the_excerpt(); ?></div>
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

                            </a>
                    <?php
                            endwhile;
                        endif;
                    ?>

                    <?php wp_reset_postdata(); ?>



                </div>

                <div class="link-bloc" >
                    <div class="list-link" data-aos="fade-up">
                        <img class="logo-categorie" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo_categories.svg">
                        <span  class="titleListLink">EXPLORATIONS</span>
                        <a href="explorations" class="fauveUnderline">Vivant</a>
                        <a href="explorations" class="fauveUnderline">Éthique</a>
                        <a href="explorations" class="fauveUnderline">Soutenable</a>
                    </div>
                </div>



            </section>
            <section class="sec-footer" id="sec-footer">

            <div class="bloc-haiku">
                    <?php $haiku = get_group_field('section_ves', 'haiku') ?>
                    <?php echo '<p data-aos="fade-up">' ?>
                    <?php echo $haiku['texte']; ?>
                    <?php echo '</p>' ?>

                <?php endif; ?>
                </div>

                <div class="bloc-image">

                    <?php
                    $section_footer = get_field('section_footer');
                    if ($section_footer) : ?>
                        <img class="reveal" src="<?php echo esc_url($section_footer['image']['url']); ?>" alt="<?php echo esc_attr($section_footer['image']['alt']); ?>" />
                    <?php endif; ?>

                </div>

            </section>

        </div>
    </div>
</div>


<?php get_footer(); ?>