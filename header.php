<!doctype html>
<html>
<head>
  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
  <title>Invierta - Asesores de Inversión</title>
</head>
<body>
<div id="main">
<header>
  <a href="<?php echo get_home_url(); ?>">
    <div id="logo-header">
    </div>
  </a>
</header>
<nav class="menu" id="menu">
    <ul>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">PÁGINA PRINCIPAL</a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">QUIÉNES SOMOS</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#indicadores' ) ); ?>">INDICADORES</a></li>
      <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">PUBLICACIONES</a></li>
      <li><a href="<?php echo get_post_type_archive_link('videos'); ?>">VIDEOS</a></li>
      <li><a href="<?php echo get_post_type_archive_link('portafolio'); ?>">PORTAFOLIO</a></li>
      <li><a href="<?php $page_contacto = get_page_by_title( 'Contacto' ); echo get_page_link($page_contacto->ID); ?>">CONTACTO</a></li>
    </ul>
</nav>
