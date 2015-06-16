<!doctype html>
<html>
<head>
  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
  <title>Invierta - Asesores de Inversión</title>
</head>
<body>
<div id="main">
<header>
    <div id="logo-header">
    </div>
</header>
<nav id="menu">
  <h1>INVIERTA <br />ASESORES <br />DE <br />INVERSIÓN</h1>
    <ul>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">QUIÉNES SOMOS</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#indicadores' ) ); ?>">INDICADORES</a></li>
      <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">PUBLICACIONES</a></li>
      <li><a href="<?php echo get_post_type_archive_link('videos'); ?>">VIDEOS</a></li>
      <li><a href="<?php echo get_post_type_archive_link('portafolio'); ?>">PORTAFOLIO</a></li>
      <li><a href="#">CONTACTO</a></li>
    </ul>
</nav>
