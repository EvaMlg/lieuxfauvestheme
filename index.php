<?php
// Silence is golden.

get_header(); ?>
<div class="projetsContainer">
	<h2>
		Résultats pour "<?= $_GET["s"] ?>"
	</h2>
<div class="projetsGrid">
<?php if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<div class="cardProjet">
					<div class="thumbnailProjet"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
					<div class="titleProjet"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				</div>
	<?php } 
}  ?>
	</div>
	</div>
<?php get_footer();