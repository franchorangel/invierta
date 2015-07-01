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
      <li><a href="<?php $page_contacto = get_page_by_title( 'Contacto' ); echo get_page_link($page_contacto->ID); ?>">CONTACTO</a></li>
    </ul>
</nav>
<div id="quienes-somos">
  <h2>QUIÉNES SOMOS</h2>
  <p><?php if( get_field( 'quienes_somos' ) ) { the_field( 'quienes_somos' ); } ?></p>
</div>
<?php
    date_default_timezone_set("America/Caracas"); //buscar como hacerlo permanente pq agrega 15% de scripting time
    ini_set('display_errors', 'Off'); //colocar en el ini file de php
    $db_con = new mysqli("localhost", "root", "124592159rM");

    $last_updated = $db_con->query("SELECT tiempo_updated FROM wordpress351.indicadores_tiempo ORDER BY tiempo_id DESC LIMIT 1");
    if($db_con) : 

        while($row = mysqli_fetch_array($last_updated)){
            $date = $row[0];
        }

        //echo date("Y-m-d H:i:s", time());
        //echo 600 * mt_rand(8333, 12788 ) / 10000;
        $php_date = strtotime($date);
        $diff = time() - $php_date;
        //if($diff > ( 600 * ( mt_rand(8333, 12788 ) / 10000 ) )) : 
        if(FALSE) :
        ?>

            <?php //load monedas ?>
            <script>
                $(window).load(function () {
                    $.ajax({
                        type: 'GET',
                        url: "<?php bloginfo( 'template_directory' ); ?>/monedas.php",
                        dataType: 'html',
                        cache: false,
                        beforeSend: function() {
                            $('#loader-monedas').fadeIn();
                        },
                        complete: function(){
                            $('#loader-monedas').fadeOut();
                        },
                        success: function (data) {
                            $('#monedas #valores-monedas').html(data);
                        }
                    });
                });
            </script>

       <?php      //include 'indicadores.php';
        else: 
            //get records from database
            $query_valores_monedas = $db_con->query("SELECT monedas_valor FROM wordpress351.indicadores_monedas");
            $valores_monedas = array();
            $index = 0;            

            while($row = mysqli_fetch_array($query_valores_monedas)){
                $valores_monedas[$index] = $row;
                $index++;
            }

            $euro = $valores_monedas[0][0];
            $franco = $valores_monedas[1][0];
            $libra = $valores_monedas[2][0];

            echo '<br />No han pasado 10 minutos todavia';
            $db_con->close();
         endif; ?>
    <?php else: ?>
    <?php
        echo 'Failed connection';
        $db_con->close();
      endif; 

    $v_gold = '1172.10';
    $v_crude = '59.41';
    $v_brent = '63.14';

?>
<div id="indicadores">
  <div>
    <div id="monedas">
      <h3>MONEDAS</h3>
      <div id="loader-monedas" class="loader">
        <div id="bowlG">
            <div id="bowl_ringG">
                <div class="ball_holderG">
                    <div class="ballG">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div id="valores-monedas">
      </div>
    </div>
    <div id="commodities">
      <h3>COMMODITIES</h3>
        <table>
          <tr>
            <td>Oro</td>
            <td>
              <?php
                  if(isset($v_gold)){
                    echo $v_gold;     
                  }else{
                    echo 'No disponible';
                  }
              ?>
            </td>
          </tr>
          <tr>
            <td>Petróleo Crudo</td>
            <td>
              <?php
                if(isset($v_crude)){
                  echo $v_crude;     
                }else{
                  echo 'No disponible';
                }
              ?>
            </td>
          </tr>
          <tr>
            <td>Petróleo Brent</td>
            <td>
              <?php
                if(isset($v_brent)){
                  echo $v_brent;     
                }else{
                  echo 'No disponible';
                }
              ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div id="bonos">
      <h3>BONOS</h3>
      <table>
        <?php if ( isset($array_n) ) : ?>
            <?php for($i = 0; $i < sizeof($array_n); $i++) : ?>
                <?php if ( isset($array_n[$i * 4 + 0]) && isset($array_n[$i * 4 + 0]) ) : ?>
                    <tr>
                    <td>
                        <?php echo $array_n[$i * 4 + 0]; ?>
                    </td>
                    <td>
                        <?php echo $array_n[$i * 4 + 1]; ?>
                    </td>
                    </tr>
                <?php endif; ?>
            <?php endfor; ?>
        <?php endif; ?>
        <tbody><tr>
                    <td>
                        VENZ 2038 (7%)                    </td>
                    <td>
                        36.8780                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2016 (5,75%)                    </td>
                    <td>
                        82.8780                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2016 (5,125%)                    </td>
                    <td>
                        67.5230                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2018-2 (13,625%)                    </td>
                    <td>
                        68.0170                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2017 (8,5%)                    </td>
                    <td>
                        69.8330                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2019 (7,75%)                    </td>
                    <td>
                        40.5030                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2022 (12,75%)                    </td>
                    <td>
                        50.5010                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2022 (12,75%)                    </td>
                    <td>
                        48.8950                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2026 (6%)                    </td>
                    <td>
                        36.2110                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2024 (8,25%)                    </td>
                    <td>
                        38.5000                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2035 (9,75%)                    </td>
                    <td>
                        41.7390                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2026 (11,75%)                    </td>
                    <td>
                        44.6750                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2028 (9,25%)                    </td>
                    <td>
                        40.2350                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2034 (9,375%)                    </td>
                    <td>
                        40.0400                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2015 (5%)                    </td>
                    <td>
                        97.6560                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2018 (13,625%)                    </td>
                    <td>
                        73.2500                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2017 (5,25%)                    </td>
                    <td>
                        50.9520                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2018 (7%)                    </td>
                    <td>
                        46.2500                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2021 (9%)                    </td>
                    <td>
                        42.0780                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2020 (6%)                    </td>
                    <td>
                        39.2500                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2024 (6%)                    </td>
                    <td>
                        37.1970                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2023 (9%)                    </td>
                    <td>
                        40.1280                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        PDVSA 2027 (5,375%)                    </td>
                    <td>
                        35.2380                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2025 (7,65%)                    </td>
                    <td>
                        37.8780                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2027 (9,25%)                    </td>
                    <td>
                        44.0030                    </td>
                    </tr>
                                                                <tr>
                    <td>
                        VENZ 2031 (11,95%)                    </td>
                    <td>
                        44.6150                    </td>
                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </tbody>
      </table>
    </div>
  </div>
<div id="publicaciones" class="home-item">
  <h2>PUBLICACIONES</h2>
  <p><?php if( get_field( 'publicaciones' ) ) { the_field( 'publicaciones' ); } ?></p>
  <?php $query = new WP_Query( array( 'post_type' => 'post', 'showposts' => 1 ) ); ?> 
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="archive-item home-item-post">
      <?php if ( has_post_thumbnail() ) : ?>
          <style>
              img {
                  float: right;
                  margin: 16px 0;
                  margin-left: 20px;
                  margin-bottom: 5px;
              }
              #publicaciones{
                  height: 470px;
                  padding: 65px 20%;
              }
              .home-item-post {
                  min-height:180px !important;
              }
          </style>
          <?php the_post_thumbnail('thumbnail'); ?>
      <?php endif; ?>
      <div class="item-wrapper">
          <a href="<?php the_permalink(); ?>"><h1 class="titulo-publicaciones"><?php the_title(); ?></h1></a>   
          <p><?php the_excerpt(); ?></p>
      </div>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">VER MÁS PUBLICACIONES</a>
</div>
<div id="videos" class="home-item">
  <h2>VIDEOS</h2>
  <p><?php if( get_field( 'videos' ) ) { the_field( 'videos' ); } ?></p>
  <?php $query = new WP_Query( array( 'post_type' => 'videos', 'showposts' => 1 ) ); ?> 
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="archive-item home-item-post">
      <div class="home-video-wrapper">
          <p><?php the_content(); ?></p>
      </div>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
  <a href="<?php echo get_post_type_archive_link('videos'); ?>">VER MÁS VIDEOS</a>
  <div class="fill"></div>
</div>
<div id="portafolio" class="home-item">
  <h2>PORTAFOLIO</h2>
  <p><?php if( get_field( 'portafolio' ) ) { the_field( 'portafolio' ); } ?></p>
  <?php $query = new WP_Query( array( 'post_type' => 'portafolio', 'showposts' => 1 ) ); ?> 
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="portafolio-home-item">
      <table>
        <tr>
          <td><?php the_title(); ?></td>
          <td><a target="_blank" href="<?php if( get_field( 'archivo' ) ){ the_field( 'archivo' ); } ?>">Ver Archivo</a></td>
        </tr>
      </table>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
  <a href="<?php echo get_post_type_archive_link('portafolio'); ?>">VER MÁS</a>
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