<!doctype html>
<html>
<head>
  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
  <title>Invierta - Asesores de Inversión</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<div>
<header id="header-home">
  <?php if ( has_post_thumbnail() ) { $thumbnail_id = get_post_thumbnail_id(); } ?>
  <div id="imagenes-header" style="background-image:url(<?php echo wp_get_attachment_url($thumbnail_id) ?>); background-size:cover; background-position-y:-150px;">
  </div>
  <div id="logo-home">
    <div class="logo"></div>
  </div>
</header>
<nav id="menu-home" class="menu">
  <h1>INVIERTA <br />ASESORES <br />DE <br />INVERSIÓN</h1>
    <ul>
      <li><a href="#quienes-somos">QUIÉNES SOMOS</a></li>
      <li><a href="#indicadores">INDICADORES</a></li>
      <li><a href="#publicaciones">PUBLICACIONES</a></li>
      <li><a href="#videos">VIDEOS</a></li>
      <li><a href="#portafolio">PORTAFOLIO</a></li>
      <li><a href="#contacto">CONTACTO</a></li>
    </ul>
</nav>
<div id="quienes-somos">
  <h2>QUIÉNES SOMOS</h2>
  <p><?php if( get_field( 'quienes_somos' ) ) { the_field( 'quienes_somos' ); } ?></p>
</div>
<div id="indicadores">
  <div>
    <div id="monedas">
      <h3>MONEDAS</h3>
      <table>
        <tr>
          <td>Euro (EUR)</td>
          <td>VALOR</td>
        </tr>
        <tr>
          <td>Franco Suizo (CHF)</td>
          <td>VALOR</td>
        </tr>
        <tr>
          <td>Libra Esterlina (GBP)</td>
          <td>VALOR</td>
        </tr>
      </table>
    </div>
    <div id="commodities">
      <h3>COMMODITIES</h3>
        <table>
          <tr>
            <td>Oro</td>
            <td>VALOR</td>
          </tr>
          <tr>
            <td>Petróleo Crudo</td>
            <td>VALOR</td>
          </tr>
          <tr>
            <td>Petróleo Brent</td>
            <td>VALOR</td>
          </tr>
        </table>
      </div>
    </div>
    <div id="bonos">
      <h3>BONOS</h3>
    </div>
  </div>
<div id="publicaciones">
  <h2>PUBLICACIONES</h2>
  <p><?php if( get_field( 'publicaciones' ) ) { the_field( 'publicaciones' ); } ?></p>
  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Ver publicaciones</a>
</div>
<div id="videos">
  <h2>VIDEOS</h2>
  <p><?php if( get_field( 'videos' ) ) { the_field( 'videos' ); } ?></p>
  <a href="<?php echo get_post_type_archive_link('videos'); ?>">Ver videos</a>
</div>
<div id="portafolio">
  <h2>PORTAFOLIO</h2>
  <p><?php if( get_field( 'potafolio' ) ) { the_field( 'portafolio' ); } ?></p>
  <a href="<?php echo get_post_type_archive_link('portafolio'); ?>">Ver portafolio</a>
</div>
<script>
﻿$('a[href*=#]:not([href=#])').click(function () {
if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash) ;
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
        $('html,body').animate({
            scrollTop: target.offset().top - 20
        }, 800);
        return false;
    }
}
});
</script>
<?php get_footer(); ?>