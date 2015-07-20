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
    <p><?php if( get_field( 'quienes_somos' ) ) { the_field( 'quienes_somos' ); } ?></p>
  </div>
</header>
<style>
    #pagina-construccion{
        position:fixed !important;
        top:85px !important;
    }
</style>
<nav id="menu-home" class="menu">
    <ul>
        <!--<li><a href="#quienes-somos">PÁGINA PRINCIPAL</a></li>-->
        <li><a href="#indicadores">INDICADORES</a></li>
        <li><a href="#publicaciones">PUBLICACIONES</a></li>
        <li><a href="#videos">VIDEOS</a></li>
        <li><a href="#portafolio">PORTAFOLIO</a></li>
        <li><a href="<?php $page_contacto = get_page_by_title( 'Contacto' ); echo get_page_link($page_contacto->ID); ?>">CONTACTO</a></li>
    </ul>
</nav>
<div id="quienes-somos">
  <!--<h2>QUIÉNES SOMOS</h2>
  <p><?php //if( get_field( 'quienes_somos' ) ) { the_field( 'quienes_somos' ); } ?></p>-->
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
        if(TRUE) :
        ?>

            <?php //load monedas ?>
            <!--<script>
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
            </script>-->

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

            //echo '<br />No han pasado 10 minutos todavia';
            $db_con->close();
         endif; ?>
    <?php else: ?>
    <?php
        echo 'Failed connection';
        $db_con->close();
      endif; 

    $v_gold = '1105.10';
    $v_crude = '50.71';
    $v_brent = '56.76';
    $v_cobre = '2.48';
    $v_gas = '2.80';

?>
<div id="indicadores">
  <div>
    <div id="monedas">
      <h3>MONEDAS</h3>
      <!--<div id="loader-monedas" class="loader">
        <div id="bowlG">
            <div id="bowl_ringG">
                <div class="ball_holderG">
                    <div class="ballG">
                    </div>
                </div>
            </div>
        </div>
      </div>-->
      <div id="valores-monedas">
          <table style="width: 100%;">
  <tbody><tr>
    <td style="font-weight: 800;">Euro <span style="color: rgb(170,170,170); font-weight: 400;">( EUR/USD )</span></td>
    <td id="euro">1.0855</td>
</tr>
<tr>
    <td style="font-weight: 800;">Franco Suizo <span style="color: rgb(170,170,170); font-weight: 400;">( CHF/USD )</span></td>
    <td id="franco">1.0387</td>
</tr>
<tr>
    <td style="font-weight: 800;">Libra Esterlina <span style="color: rgb(170,170,170); font-weight: 400;">( GBP/USD )</span></td>
    <td id="libra">1.5569</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Argentino <span style="color: rgb(170,170,170); font-weight: 400;">( USD/ARS )</span></td>
    <td id="pesoArgentino">9.1496</td>
</tr>
<tr>
    <td style="font-weight: 800;">Real Brasileño <span style="color: rgb(170,170,170); font-weight: 400;">( USD/BRL )</span></td>
    <td id="realBrasileno">3.2214</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Colombiano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/COP )</span></td>
    <td id="pesoColombiano">2759.5500</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Mexicano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/MXN )</span></td>
    <td id="pesoMexicano">15.9876</td>
</tr>
<tr>
    <td style="font-weight: 800;">Sol Peruano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/PEN )</span></td>
    <td id="solPeruano">3.1850</td>
</tr>
</tbody></table>
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
          <tr>
            <td>Cobre</td>
            <td>
              <?php
                if(isset($v_cobre)){
                  echo $v_cobre;     
                }else{
                  echo 'No disponible';
                }
              ?>
            </td>
          </tr>
          <tr>
            <td>Gas Natural</td>
            <td>
              <?php
                if(isset($v_gas)){
                  echo $v_gas;     
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
      <h3>BONOS LATINOAMERICANOS</h3>
      <table>
        <tr>
            <th>Nombre</th>
            <th>Precio (%)</th>
            <th>Cambio (%)</th>
            <th>Rendimiento (%)</th>
            <th>Vencimiento</th>
        </tr>
        <tr>
            <td>ARGENTINA 2015</td>
            <td>101,77</td>
            <td>0,00</td>
            <td>8.54667</td>
            <td>03-10-2015</td>
        </tr>
        <tr>
            <td>ECUADOR 15/20 REGS</td>
            <td>97,12</td>
            <td>-0,01</td>
            <td>11,62000</td>
            <td>24-03-2020</td>
        </tr>
        <tr>
            <td>COLOMBIA 13/24</td>
            <td>98,75</td>
            <td>0,96</td>
            <td>4,21752</td>
            <td>26-02-2024</td>
        </tr>
        <tr>
            <td>COLOMBIA 04/24</td>
            <td>126,58</td>
            <td>1,20</td>
            <td>4,50025</td>
            <td>21-05-2024</td>
        </tr>
        <tr>
            <td>PERU 05/25</td>
            <td>130,06</td>
            <td>0,29</td>
            <td>3.75617</td>
            <td>21-07-2025</td>
        </tr>
        <tr>
            <td>VENEZUELA 11/26 REGS</td>
            <td>41,00</td>
            <td>-0,30</td>
            <td>32,71972</td>
            <td>21-10-2026</td>
        </tr>
        <tr>
            <td>BRAZIL 97/27</td>
            <td>145,59</td>
            <td>0,89</td>
            <td>5,03531</td>
            <td>15-05-2027</td>
        </tr>       
        <tr>
            <td>VENEZUELA 97/27</td>
            <td>41,90</td>
            <td>3,34</td>
            <td>25.70562</td>
            <td>15-09-2027</td>
        </tr>
        <tr>
            <td>VENEZUELA 08/28 REGS</td>
            <td>36,75</td>
            <td>0,00</td>
            <td>28.79448</td>
            <td>07-05-2028</td>
        </tr>
        <tr>
            <td>MEXICO 02/31 MTN</td>
            <td>147,88</td>
            <td>-0,03</td>
            <td>4,22000</td>
            <td>15-08-2031</td>
        </tr>
        <tr>
            <td>MEXICO 03/33 MTN</td>
            <td>136,94</td>
            <td>0,42</td>
            <td>4,51004</td>
            <td>08-04-2033</td>
        </tr>
        <tr>
            <td>PERU 03/33</td>
            <td>149,50</td>
            <td>0,74</td>
            <td>4.74827</td>
            <td>21-11-2033</td>
        </tr>
        <tr>
            <td>BRAZIL 04/34</td>
            <td>124,03</td>
            <td>0,46</td>
            <td>6,16211</td>
            <td>20-01-2034</td>
        </tr>
        <tr>
            <td>ARGENTINA 2038 PAR</td>
            <td>59,15</td>
            <td>1,44</td>
            <td>5,82120</td>
            <td>31-12-2038</td>
        </tr>
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
            scrollTop: target.offset().top - 85
        }, 800);
        return false;
    }
}
});
</script>
<?php get_footer(); ?>