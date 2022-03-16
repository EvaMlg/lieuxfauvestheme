<?php

/**
 *  The template for displaying Single 
 * 
 * 
 */
get_header();
?>






<div class="headerArticle">

<a href="<?php echo get_option('home'); ?>/" ><img class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>

</div>

<div class="mainArticle">


    <div class="leftColumnArticle">

        <div class="article-thumbnail" ><?php the_post_thumbnail(); ?></div>

        <div class="wrapperLinkArticle">
            
            <span><img class="logo-categorie shareLinks" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg"> Partager Fb-Ig-Tt</span>
            <span><img class="logo-categorie shareLinks" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> Télécharger document divers</span>
            <span><img class="logo-categorie shareLinks" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> Liens externes</span>

        </div>

    </div>

    <div class="rightColumnArticle">

        <span class="dateArticle"><?php the_time('d—m—Y'); ?></span>
        <h2 class=titleArticle><?php the_title(); ?></h2>
        <div class="contentArticle"><p><?php the_field('contenu'); ?></p><div>

        <div class="imagesArticle">
            <?php
            $image = get_field('image');
            if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>

        <div class="legebdArticle"><p><?php the_field('legende'); ?></p><div>


    </div>


    <?php get_footer(); ?>