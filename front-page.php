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
<div id="quienes-somos"></div>
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

    $v_gold = '1085.30';
    $v_crude = '45.30';
    $v_brent = '49.65';
    $v_cobre = '2.34';
    $v_gas = '2.75';

?>
<div id="indicadores">
  <div id="wrapper-indicadores">
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
    <td id="euro">1.09</td>
</tr>
<tr>
    <td style="font-weight: 800;">Franco Suizo <span style="color: rgb(170,170,170); font-weight: 400;">( CHF/USD )</span></td>
    <td id="franco">1.03</td>
</tr>
<tr>
    <td style="font-weight: 800;">Libra Esterlina <span style="color: rgb(170,170,170); font-weight: 400;">( GBP/USD )</span></td>
    <td id="libra">1.56</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Argentino <span style="color: rgb(170,170,170); font-weight: 400;">( USD/ARS )</span></td>
    <td id="pesoArgentino">9.21</td>
</tr>
<tr>
    <td style="font-weight: 800;">Real Brasileño <span style="color: rgb(170,170,170); font-weight: 400;">( USD/BRL )</span></td>
    <td id="realBrasileno">3.45</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Colombiano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/COP )</span></td>
    <td id="pesoColombiano">2918.00</td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Mexicano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/MXN )</span></td>
    <td id="pesoMexicano">16.17</td>
</tr>
<tr>
    <td style="font-weight: 800;">Sol Peruano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/PEN )</span></td>
    <td id="solPeruano">3.19</td>
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
            <td>101,42</td>
            <td>0,41</td>
            <td>12.74612</td>
            <td>03-10-2015</td>
        </tr>
        <tr>
            <td>ECUADOR 15/20 REGS</td>
            <td>95,05</td>
            <td>-0,15</td>
            <td>12,22000</td>
            <td>24-03-2020</td>
        </tr>
        <tr>
            <td>COLOMBIA 13/24</td>
            <td>97,90</td>
            <td>1,36</td>
            <td>4,34148</td>
            <td>26-02-2024</td>
        </tr>
        <tr>
            <td>COLOMBIA 04/24</td>
            <td>126,63</td>
            <td>1,04</td>
            <td>4,48245</td>
            <td>21-05-2024</td>
        </tr>
        <tr>
            <td>PERU 05/25</td>
            <td>129,80</td>
            <td>0,62</td>
            <td>3.77319</td>
            <td>21-07-2025</td>
        </tr>
        <tr>
            <td>VENEZUELA 11/26 REGS</td>
            <td>41,75</td>
            <td>-0,85</td>
            <td>32,16682</td>
            <td>21-10-2026</td>
        </tr>
        <tr>
            <td>BRAZIL 97/27</td>
            <td>142,39</td>
            <td>1,02</td>
            <td>5,31945</td>
            <td>15-05-2027</td>
        </tr>
        <tr>
            <td>VENEZUELA 97/27</td>
            <td>41,49</td>
            <td>-0,96</td>
            <td>26.43009</td>
            <td>15-09-2027</td>
        </tr>
        <tr>
            <td>VENEZUELA 08/28 REGS</td>
            <td>36,70</td>
            <td>2,62</td>
            <td>28.84846</td>
            <td>07-05-2028</td>
        </tr>
        <tr>
            <td>MEXICO 01/31 MTN</td>
            <td>145,95</td>
            <td>0,03</td>
            <td>4,35000</td>
            <td>15-08-2031</td>
        </tr>
        <tr>
            <td>MEXICO 03/33 MTN</td>
            <td>137,30</td>
            <td>0,07</td>
            <td>4,48204</td>
            <td>08-04-2033</td>
        </tr>
        <tr>
            <td>PERU 03/33</td>
            <td>150,23</td>
            <td>0,88</td>
            <td>4.69786</td>
            <td>21-11-2033</td>
        </tr>
        <tr>
            <td>BRAZIL 04/34</td>
            <td>119,85</td>
            <td>-0,64</td>
            <td>6,50352</td>
            <td>20-01-2034</td>
        </tr>
        <tr>
            <td>ARGENTINA 2038 PAR</td>
            <td>58,10</td>
            <td>1,06</td>
            <td>5,95765</td>
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
  <?php $query = new WP_Query( array( 'post_type' => 'videos', 'showposts' => 4 ) ); ?> 
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
  <?php $query = new WP_Query( array( 'post_type' => 'portafolio', 'showposts' => 4 ) ); ?> 
    <div class="portafolio-home-item">
    <table>
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <tr>
          <td><?php the_title(); ?></td>
          <td><a target="_blank" href="<?php if( get_field( 'archivo' ) ){ the_field( 'archivo' ); } ?>">Ver Archivo</a></td>
        </tr>
  <?php endwhile; endif; ?>
    </table>
    </div>
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
