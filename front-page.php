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
      <li><a href="#videos">TUTORIALES</a></li>
      <li><a href="#portafolio">PORTAFOLIO</a></li>
      <li><a href="#contacto">CONTACTO</a></li>
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
    if($db_con)
    {
        while($row = mysqli_fetch_array($last_updated)){
            $date = $row[0];
        }
        
        //echo date("Y-m-d H:i:s", time());
        //echo 600 * mt_rand(8333, 12788 ) / 10000;
        $php_date = strtotime($date);
        $diff = time() - $php_date;
        if($diff > ( 600 * ( mt_rand(8333, 12788 ) / 10000 ) )){
            include 'indicadores.php';
        }
        else{
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
        }
    }
    else
    {
        echo 'Failed connection';
        $db_con->close();
    }

    //get timestamp of last update
    //if (timestamp > 60min)
    //  run get script
    //  check validity
    //  if cant get value set NULL in db
    //      print 'No disponible'
    //      send email
    //else 
    // retrieve values from database
    //
    //PRINT to screen
?>
<div id="indicadores">
  <div>
    <div id="monedas">
      <h3>MONEDAS</h3>
      <table>
        <tr>
          <td>Euro (EUR)</td>
          <td>
            <?php 
              if(isset($euro)){
                echo $euro;     
              }else{
                echo 'No disponible';
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>Franco Suizo (CHF)</td>
          <td>
            <?php
                if(isset($franco)){
                    echo $franco;
                }else{
                    echo 'No disponible';
                }
            ?>
          </td>
        </tr>
        <tr>
          <td>Libra Esterlina (GBP)</td>
          <td>
            <?php
                if(isset($libra)){
                    echo $libra;
                }else{
                    echo 'No disponible';
                }
            ?>
          </td>
        </tr>
      </table>
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
                  float: left;
                  margin: 16px 0;
                  margin-right: 20px;
                  margin-bottom: 5px;
              }
          </style>
          <?php the_post_thumbnail('medium'); ?>
      <?php endif; ?>
      <div class="item-wrapper">
          <a href="<?php the_permalink(); ?>"><h1 class="titulo-publicaciones"><?php the_title(); ?></h1></a>   
          <p><?php the_excerpt(); ?></p>
      </div>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Ver más publicaciones</a>
</div>
<div id="videos" class="home-item">
  <h2>VIDEOS</h2>
  <p><?php if( get_field( 'videos' ) ) { the_field( 'videos' ); } ?></p>
  <a href="<?php echo get_post_type_archive_link('videos'); ?>">Ver videos</a>
</div>
<div id="portafolio" class="home-item">
  <h2>PORTAFOLIO</h2>
  <p><?php if( get_field( 'portafolio' ) ) { the_field( 'portafolio' ); } ?></p>
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