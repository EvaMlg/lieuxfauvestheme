<?php

/**
 *  The template for displaying Single 
 * 
 * 
 */
get_header();
?>






<div class="headerArticle">

<a href="<?php echo get_option('home'); ?>/" ><img data-aos="zoom-in" data-aos-duration="1000" class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_logo.svg"></a>

</div>




<div class="mainArticle">


    <div class="leftColumnArticle">

        <span class="mobileLayout dateArticle"><?php the_time('d—m—Y'); ?></span>
        <div class="mobileLayout titleArticleWrapper"><h2 class=titleArticle><?php the_title(); ?></h2></div>

        <div class="article-thumbnail" ><?php the_post_thumbnail(); ?></div>

        <div class="wrapperLinkArticle">
            
            <span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-partager.svg">                
             &nbsp; Partager | <?php echo my_sharing_buttons($content) ?></span>
            <span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-telecharger.svg"> Télécharger document divers</span>
            <span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_fleche-lien.svg"> Liens externes</span>

        </div>

    </div>

    <div class="rightColumnArticle">

        <span class="laptopLayout dateArticle"><?php the_time('d—m—Y'); ?></span>
        <div class="laptopLayout titleArticleWrapper"><h2 class=titleArticle><?php the_title(); ?></h2></div>
        <div class="contentArticle"><p><?php the_field('contenu'); ?></p><div>

        <div class="imagesArticle">
            <?php
            $image = get_field('image');
            if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>

        <div class="legendArticle"><p><?php the_field('legende'); ?></p><div>


    </div>


    <?php get_footer(); ?>