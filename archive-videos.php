<?php get_header(); ?>
<h1 class="titulo-archivo">VIDEOS</h1>
<div id="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="archive-item video-item">
      <h1><?php the_title(); ?></h1>
      <div class="video-wrapper">
        <p><?php the_content(); ?></p>
      </div>
    </div>
    <?php endwhile; ?>
    <?php next_posts_link('Anteriores'); ?>
    <?php previous_posts_link('Siguientes'); ?>
    <?php else: ?>
      <p>Nada que mostrar</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>

