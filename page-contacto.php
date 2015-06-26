<?php get_header(); ?>
<h1 class="titulo-archivo">INFORMACIÓN DE CONTACTO</h1>
<style>
    #content p{margin-bottom: 15px;}
</style>
<div id="content">
    <?php if( have_posts() ) : while ( have_posts() ) : the_post() ?>
    <?php the_content(); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>

