<?php

/**
 *  The template for displaying Single 
 * 
 * 
 */
get_header();
?>






<div class="headerArticle">

<a href="<?php echo get_option('home'); ?>/" ><img data-aos="zoom-in" data-aos-duration="1000" class="logoArchiveExplo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_logo.svg"></a>

</div>




<div class="mainArticle">


    <div class="leftColumnArticle">

        <span class="mobileLayout dateArticle"><?php the_time('d—m—Y'); ?></span>
        <div class="mobileLayout titleArticleWrapper"><h2 class=titleArticle><?php the_title(); ?></h2></div>

        <div class="article-thumbnail" ><?php the_post_thumbnail(); ?></div>

        <div class="wrapperLinkArticle">
            
            <?php get_template_part('template-parts/share-publication');?>
            <?php if (get_field('document_a_telecharger')) : ?>
                <span><img class="logo-categorie shareLinks logo-explo" src="/wp-content/themes/lieuxfauves/src/assets/img/lf_picto_fleche-telecharger.svg"> &nbsp;
                        <?php
                        $file = get_field('document_a_telecharger');
                        if ($file) : ?>
                            <a class="docDownload" href="<?php echo $file['url']; ?>">Document à télécharger</a>
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