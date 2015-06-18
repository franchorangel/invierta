<?php get_header(); ?>
<h1 class="titulo-archivo">TUTORIALES</h1>
<div id="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="archive-item">
      <?php if ( has_post_thumbnail() ) : ?>
          <style>
              img {
                  float: left;
                  margin: 16px 0;
                  margin-right: 20px;
                  margin-bottom: 5px;
              }
          </style>
          <?php the_post_thumbnail('medium'); ?>
      <?php endif; ?>
      <div class="item-wrapper">
          <h3><?php echo get_the_date(); ?></h3>
          <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>   
          <p><?php the_excerpt(); ?></p>
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

