<?php

/**
 * Template Name: Agence
 * 
 * 
 */
get_header();
?>

<div class="container-front-page">



    <div class="logoHeader">

        <a href="<?php echo get_option('home'); ?>/"><img class="logoFrontpage" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>

    </div>

    <a href="<?php echo get_option('home'); ?>/"><img class="logoFrontpageCloned" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>




    <div class="split-left">

        <div class="list-chapter-agence" data-aos="fade-up">
            <div class="list-chapter-agence-title">
                <a href="#sec-agence"><span class="spanAgence">Agence</span></a><br>
            </div>
            <a href="#sec-valeurs"> <span class="spanValeurs">Valeurs</span></a><br>
            <a href="#sec-expertises"> <span class="spanExpertises">Expertises</span></a><br>
            <a href="#sec-equipe"> <span class="spanEquipe">Équipe</span></a><br>
        </div>


    </div>


    <div class="split-right">

        <section class="sec-agence" id="sec-agence">

            <?php
            $section_agence = get_field('section_agence');
            if ($section_agence) : ?>

                <div class="imageWrapperAgence" style="background-color : rgb(0,83,78);"><img data-aos="zoom-out" data-aos-duration="3000" src="<?php echo esc_url($section_agence['image']['url']); ?>" alt="<?php echo esc_attr($hero['image']['alt']); ?>" /></div>
                <p class="bloc-haiku">





                    <?php echo $section_agence['tagline']; ?>



                <?php endif; ?>

        </section>

        <section class="sec-valeurs" id="sec-valeurs">

            <?php
            $section_valeurs = get_field('section_valeurs');
            if ($section_valeurs) : ?>

                <div class="contentAgenceBold"><?php echo $section_valeurs['chapeau']; ?></div>

                <?php $sur_les_traces = get_group_field('section_valeurs', 'sur_les_traces') ?>
                <h3 class="titleAgence" data-aos="fade-up"><?php echo $sur_les_traces['titre']; ?></h3>
                <p class="contentAgence" data-aos="fade-up"><?php echo $sur_les_traces['texte']; ?></p>

                <?php $demarche = get_group_field('section_valeurs', 'notre_demarche') ?>
                <h3 class="titleAgence" data-aos="fade-up"><?php echo $demarche['titre']; ?></h3>
                <div class="contentAgence jungleBold" data-aos="fade-up"><?php echo $demarche['texte']; ?><div>


                    <?php endif; ?>

        </section>

        <section class="sec-expertises" id="sec-expertises">

            <?php
            $section_expertises = get_field('section_expertises');
            if ($section_expertises) : ?>

                <div class="imageWrapperAgence"><img data-aos="zoom-out" data-aos-duration="2000" src="<?php echo esc_url($section_expertises['image']['url']); ?>" alt="<?php echo esc_attr($hero['image']['alt']); ?>" /></div>
                <p class="tagline taglinegrey"><?php echo $section_expertises['chapeau']; ?></p>
                <p class="bloc-haiku"><?php echo $section_expertises['tagline']; ?></p>

                <div class="columsWrapperAgence">
                    <div class="rightColumnAgence">
                        <?php $domaines_dinterventions = get_group_field('section_expertises', 'domaines_dinterventions') ?>
                        <h3 class="titleAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['titre']; ?></h3>
                        <h4 class="subtitleAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['sous-titre_1']; ?></h4>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['contenu_1']; ?></p>
                        <h4 class="subtitleAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['sous-titre_2']; ?></h4>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['contenu_2']; ?></p>
                        <h4 class="subtitleAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['sous-titre_3']; ?></h4>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['contenu_3']; ?></p>
                        <h4 class="subtitleAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['sous-titre_4']; ?></h4>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $domaines_dinterventions['contenu_4']; ?></p>
                    </div>

                    <div class="leftColumnAgence">
                        <?php $competences_integrees = get_group_field('section_expertises', 'competences_integrees') ?>
                        <h3 class="titleAgence" data-aos="fade-up"><?php echo $competences_integrees['titre']; ?></h3>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $competences_integrees['contenu']; ?></p>

                        <?php $reseaux_engages = get_group_field('section_expertises', 'reseaux_engages') ?>
                        <h3 class="titleAgence" data-aos="fade-up"><?php echo $reseaux_engages['titre']; ?></h3>
                        <p class="contentAgence" data-aos="fade-up"><?php echo $reseaux_engages['contenu']; ?></p>
                    </div>
                </div>

                <div class="distinctionsWrapperAgence">


                    <h3 class="titleAgence">DISTINCTIONS</h3>

                    <?php $urbanisme = get_group_field('section_expertises', 'distinctions_urbanisme') ?>
                    <div class="distinctionsTitleWrapper">
                        <h3 class="subtitleAgence distinctionsTitle" data-aos="fade-up">Urbanisme</h3>
                        <img class="logo-categorie logoDistinctions" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir_gris.svg">
                    </div>
                    <div class="distinctionsToggleWrapper">
                        <p data-aos="fade-up"><?php echo $urbanisme; ?></p>
                    </div>

                    <?php $architecture = get_group_field('section_expertises', 'distinctions_archi') ?>
                    <div class="distinctionsTitleWrapper">
                        <h3 class="subtitleAgence distinctionsTitle" data-aos="fade-up">Architecture</h3>
                        <img class="logo-categorie logoDistinctions logoDistinctionsClone" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir_gris.svg">

                    </div>
                    <div class="distinctionsToggleWrapperClone distinctionsToggleWrapper">
                        <p><?php echo $architecture; ?></p>
                    </div>


                </div>



            <?php endif; ?>

        </section>


        <section class="sec-equipe" id="sec-equipe">


            <div class="galleryWrapper galleryWrapperAgence">


                <?php $images = get_field('galerie_agence');
                if ($images) : ?>
                    <?php foreach ($images as $image) : ?>
                        <div class="single-slide-image">
                            <img class="logo-categorie" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <div class="contentAgenceLegende">
                <p>L’album de l’agence :<br>
                    Légende photo, noms, situation, histoire, anecdote....<br>
                    sur trois lignes.</p>
            </div>





            <div class="equipeWrapper">

                <?php $associes = get_group_field('section_equipe', 'associes') ?>
                <h3 class="titleAgence"><?php echo $associes['titre']; ?></h3>
                <div class="contentAgence"><?php echo $associes['contenu']; ?></div>

                <?php $collaborateurs = get_group_field('section_equipe', 'collaborateurs') ?>
                <h3 class="titleAgence"><?php echo $collaborateurs['titre']; ?></h3>
                <div class="contentAgence"><?php echo $collaborateurs['contenu']; ?></div>
            </div>

        </section>

        <section class="sec-rejoindre" id="sec-rejoindre">



            <div class="rejoindreWrapper">

                <?php $rejoindre = get_group_field('section_equipe', 'rejoindre_lieux_fauves') ?>
                <h3 class="titleAgence" data-aos="fade-up"><?php echo $rejoindre['titre']; ?></h3>

                <?php
                // 1. Arguments => 
                $args = array(
                    'post_type' => 'annonces',
                    'orderby'   => array(
                        'date' => 'DESC',
                    )


                );

                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                ?> <div class="annonceWrapper"> <?php ?>

                            <div class="titleAnnonce"><?php the_title(); ?></div>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>"><img class="logo-load" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_load.svg"></a>



                        </div>
                <?php
                    endwhile;
                endif;


                wp_reset_postdata();

                ?>




            </div>


        </section>

    </div>

</div>










<?php get_footer(); ?>