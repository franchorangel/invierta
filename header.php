<!doctype html>
<html>
<head>
  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
  <title>Invierta - Asesores de Inversión</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
  <div id="menu-trigger">
    <div id="menu-boton">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </div>
    <p>MENU</p>
  </div>  
  
  <ul>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">PÁGINA PRINCIPAL</a></li>
    <li><a href="<?php echo esc_url( home_url( '/#indicadores' ) ); ?>">INDICADORES</a></li>
    <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">PUBLICACIONES</a></li>
    <li><a href="<?php echo get_post_type_archive_link('videos'); ?>">VIDEOS</a></li>
    <li><a href="<?php echo get_post_type_archive_link('portafolio'); ?>">PORTAFOLIO</a></li>
    <li><a href="<?php $page_contacto = get_page_by_title( 'Contacto' ); echo get_page_link($page_contacto->ID); ?>">CONTACTO</a></li>
  </ul>
</nav>
<script>
  
</script>
