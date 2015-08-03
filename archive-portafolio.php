<?php get_header(); ?>
<h1 class="titulo-archivo">PORTAFOLIO</h1>
<div id="content">
  <div class="portafolio-archive-item">
    <table>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <tr>
          <td><?php the_title(); ?></td>
          <td><?php echo get_the_date(); ?></td>
          <td><a target="_blank" href="<?php if( get_field( 'archivo' ) ){ the_field( 'archivo' ); } ?>">Ver Archivo</a></td>
        </tr>
  <?php endwhile; ?>
  <?php next_posts_link('Anteriores'); ?>
  <?php previous_posts_link('Siguientes'); ?>
  <?php else: ?>
    <p>Nada que mostrar</p>
  <?php endif; ?>
    </table>
  </div>
</div>
<?php get_footer(); ?>
