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
  
  global $wpdb;
  $euro = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='euro' ORDER BY id DESC LIMIT 1");
  $franco_suizo = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='franco suizo' ORDER BY id DESC LIMIT 1");
  $libra_esterlina = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='libra esterlina' ORDER BY id DESC LIMIT 1");
  $peso_argentino = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='peso argentino' ORDER BY id DESC LIMIT 1");
  $real_brasileno = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='real brasileno' ORDER BY id DESC LIMIT 1");
  $peso_colombiano = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='peso colombiano' ORDER BY id DESC LIMIT 1");
  $peso_mexicano = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='peso mexicano' ORDER BY id DESC LIMIT 1");
  $sol_peruano = $wpdb->get_row("SELECT precio FROM mv_monedas WHERE nombre='sol peruano' ORDER BY id DESC LIMIT 1");

  $venezolano = $wpdb->get_row("SELECT precio FROM mv_commodities WHERE nombre='petroleo venezolano' ORDER BY id DESC LIMIT 1");
  $brent = $wpdb->get_row("SELECT precio FROM mv_commodities WHERE nombre='petroleo brent' ORDER BY id DESC LIMIT 1");
  $oro = $wpdb->get_row("SELECT precio FROM mv_commodities WHERE nombre='oro' ORDER BY id DESC LIMIT 1");
  $cobre = $wpdb->get_row("SELECT precio FROM mv_commodities WHERE nombre='cobre' ORDER BY id DESC LIMIT 1");
  $gas = $wpdb->get_row("SELECT precio FROM mv_commodities WHERE nombre='gas natural' ORDER BY id DESC LIMIT 1");

  $argentina2015 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='argentina 2015' ORDER BY id DESC LIMIT 1");
  $ecuador1520 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='ecuador 15/20' ORDER BY id DESC LIMIT 1");
  $colombia1324 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='colombia 13/24' ORDER BY id DESC LIMIT 1");
  $colombia0424 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='colombia 04/24' ORDER BY id DESC LIMIT 1");
  $peru0525 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='peru 05/25' ORDER BY id DESC LIMIT 1");
  $brasil9727 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='brasil 97/27' ORDER BY id DESC LIMIT 1");
  $mexico0131 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='mexico 01/31' ORDER BY id DESC LIMIT 1");
  $mexico0333 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='mexico 03/33' ORDER BY id DESC LIMIT 1");
  $peru0333 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='peru 03/33' ORDER BY id DESC LIMIT 1");
  $brasil0434 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='brasil 04/34' ORDER BY id DESC LIMIT 1");
  $argentina2038 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='argentina 2038' ORDER BY id DESC LIMIT 1");

  $venezuela1126 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='venezuela 11/26' ORDER BY id DESC LIMIT 1");
  $venezuela9727 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='venezuela 97/27' ORDER BY id DESC LIMIT 1");
  $venezuela0828 = $wpdb->get_row("SELECT precio, cambio, rendimiento FROM mv_bonos WHERE nombre='venezuela 08/28' ORDER BY id DESC LIMIT 1");

  $ultima_actualizacion = $wpdb->get_row("SELECT ultima_actualizacion FROM mv_bonos ORDER BY id DESC LIMIT 1");

  function cargar_bono( $bono )
  {
    if ( empty($bono) )
    {
      echo '<td>No disponible</td>';
      echo '<td>No disponible</td>';
      echo '<td>No disponible</td>';
    }
    else
    {
      echo '<td>'.number_format((float)($bono->precio), 2, ',', '').'</td>';
      echo '<td>'.number_format((float)($bono->cambio), 2, ',', '').'</td>';
      echo '<td>'.number_format((float)($bono->rendimiento), 2, ',', '').'</td>';
    }
  }

?>
<div id="indicadores">
  <div id="wrapper-indicadores">
  <?php if ( empty($ultima_actualizacion) ) : ?>
    <p></p>
  <?php else: ?>
    <p style="text-align:center;margin-top:12px;">Informacion actualizada el <?php echo date("d/m/Y",strtotime($ultima_actualizacion->ultima_actualizacion)).' a las '.date("g:ia e", strtotime("-30 minutes", strtotime($ultima_actualizacion->ultima_actualizacion))).' -04:30 (VET)'; ?></p>
  <?php endif; ?>
    <div id="monedas">
      <h3>MONEDAS</h3>
      <div id="valores-monedas">
          <table>
            <tbody>
              <tr>
                <td style="font-weight: 800;">Euro <span style="color: rgb(170,170,170); font-weight: 400;">( EUR/USD )</span></td>
                <td id="euro"><?php 
                  if ( empty($euro) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  {
                    $euro = 1 / $euro->precio;
                    echo number_format((float)$euro, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Franco Suizo <span style="color: rgb(170,170,170); font-weight: 400;">( CHF/USD )</span></td>
                <td id="franco"><?php 
                  if ( empty($franco_suizo) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  { 
                    $franco_suizo = 1 / $franco_suizo->precio;
                    echo number_format((float)$franco_suizo, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Libra Esterlina <span style="color: rgb(170,170,170); font-weight: 400;">( GBP/USD )</span></td>
                <td id="libra"><?php 
                  if ( empty($libra_esterlina) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  {
                    $libra_esterlina = 1 / $libra_esterlina->precio; 
                    echo number_format((float)$libra_esterlina, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Peso Argentino <span style="color: rgb(170,170,170); font-weight: 400;">( USD/ARS )</span></td>
                <td id="pesoArgentino"><?php 
                  if ( empty($peso_argentino) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  { 
                    $peso_argentino = $peso_argentino->precio;
                    echo number_format((float)$peso_argentino, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Real Brasileño <span style="color: rgb(170,170,170); font-weight: 400;">( USD/BRL )</span></td>
                <td id="realBrasileno"><?php 
                  if ( empty($real_brasileno) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  { 
                    $real_brasileno = $real_brasileno->precio;
                    echo number_format((float)$real_brasileno, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Peso Colombiano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/COP )</span></td>
                <td id="pesoColombiano"><?php 
                  if ( empty($peso_colombiano) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  { 
                    $peso_colombiano = $peso_colombiano->precio;
                    echo number_format((float)$peso_colombiano, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Peso Mexicano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/MXN )</span></td>
                <td id="pesoMexicano"><?php 
                  if ( empty($peso_mexicano) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  {
                    $peso_mexicano = $peso_mexicano->precio; 
                    echo number_format((float)$peso_mexicano, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="font-weight: 800;">Sol Peruano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/PEN )</span></td>
                <td id="solPeruano"><?php 
                  if ( empty($sol_peruano) ) 
                  { 
                    echo 'No disponible'; 
                  } 
                  else 
                  { 
                    $sol_peruano = $sol_peruano->precio;
                    echo number_format((float)$sol_peruano, 2, ',', ''); 
                  } ?>
                </td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
    <div id="commodities">
      <h3>COMMODITIES</h3>
        <table>
          <tbody>
            <tr>
              <td>Petróleo Venezolano</td>
              <td><?php 
                if ( empty($venezolano) ) 
                { 
                  echo 'No disponible'; 
                } 
                else
                {
                  echo number_format((float)($venezolano->precio), 2, ',', '');
                } ?>
              </td>
            </tr>
            <tr>
              <td>Petróleo Brent</td>
              <td><?php 
                if ( empty($brent) ) 
                { 
                  echo 'No disponible'; 
                } 
                else 
                {
                  echo number_format((float)($brent->precio), 2, ',', ''); 
                } ?>
              </td>
            </tr>
            <tr>
              <td>Oro</td>
              <td><?php 
                if ( empty($oro) ) 
                { 
                  echo 'No disponible'; 
                } 
                else 
                { 
                  echo number_format((float)($oro->precio), 2, ',', '');
                } ?>
              </td>
            </tr>
            <tr>
              <td>Cobre</td>
              <td><?php 
                if ( empty($cobre) ) 
                { 
                  echo 'No disponible'; 
                } 
                else 
                {
                  echo number_format((float)($cobre->precio), 2, ',', ''); 
                } ?>
              </td>
            </tr>
            <tr>
              <td>Gas Natural</td>
              <td><?php 
                if ( empty($gas) ) 
                { 
                  echo 'No disponible'; 
                } 
                else 
                {
                  echo number_format((float)($gas->precio), 2, ',', ''); 
                } ?>
              </td>
            </tr>
          </tbody>
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
          <?php cargar_bono($argentina2015); ?>
          <td>03-10-2015</td>
        </tr>
        <tr>
          <td>ECUADOR 15/20 REGS</td>
          <?php cargar_bono($ecuador1520); ?>
          <td>24-03-2020</td>
        </tr>
        <tr>
          <td>COLOMBIA 13/24</td>
          <?php cargar_bono($colombia1324); ?>
          <td>26-02-2024</td>
        </tr>
        <tr>
          <td>COLOMBIA 04/24</td>
          <?php cargar_bono($colombia0424); ?>
          <td>21-05-2024</td>
        </tr>
        <tr>
          <td>PERU 05/25</td>
          <?php cargar_bono($peru0525); ?>
          <td>21-07-2025</td>
        </tr>
        <tr>
          <td>VENEZUELA 11/26 REGS</td>
          <?php cargar_bono($venezuela1126); ?>
          <td>21-10-2026</td>
        </tr>
        <tr>
          <td>BRASIL 97/27</td>
          <?php cargar_bono($brasil9727); ?>
          <td>15-05-2027</td>
        </tr>
        <tr>
          <td>VENEZUELA 97/27</td>
          <?php cargar_bono($venezuela9727); ?>    
          <td>15-09-2027</td>
        </tr>
        <tr>
          <td>VENEZUELA 08/28 REGS</td>
          <?php cargar_bono($venezuela0828); ?>
          <td>07-05-2028</td>
        </tr>
        <tr>
          <td>MEXICO 01/31 MTN</td>
          <?php cargar_bono($mexico0131); ?>
          <td>15-08-2031</td>
        </tr>
        <tr>
          <td>MEXICO 03/33 MTN</td>
          <?php cargar_bono($mexico0333); ?>
          <td>08-04-2033</td>
        </tr>
        <tr>
          <td>PERU 03/33</td>
          <?php cargar_bono($peru0333); ?>
          <td>21-11-2033</td>
        </tr>
        <tr>
          <td>BRASIL 04/34</td>
          <?php cargar_bono($brasil0434); ?>
          <td>20-01-2034</td>
        </tr>
        <tr>
          <td>ARGENTINA 2038 PAR</td>
          <?php cargar_bono($argentina2038); ?>
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
<div id="redes" class="home-item">
  <h2>REDES</h2>
  
  <div>
    <h3><a href="https://twitter.com/InviertaFinance" target="_blank">@InviertaFinance</a></h3>
    <a class="twitter-timeline" href="https://twitter.com/InviertaFinance" data-widget-id="628233714468790272">Tweets by @InviertaFinance</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>

  <div>
    <h3><a href="https://twitter.com/Inviertaworld" target="_blank">@Inviertaworld</a></h3>
    <a class="twitter-timeline" href="https://twitter.com/Inviertaworld" data-widget-id="628281784942350336">Tweets by @Inviertaworld</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>

  <div>  
    <h3><a href="https://twitter.com/InviertaVe" target="_blank">@InviertaVE</a></h3>
    <a class="twitter-timeline" href="https://twitter.com/InviertaVE" data-widget-id="628283831687213056">Tweets por el @InviertaVE.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>

  <div>
    <h3><a href="https://twitter.com/InviertaSports" target="_blank">@InviertaSports</a></h3>
    <a class="twitter-timeline" href="https://twitter.com/InviertaSports" data-widget-id="628250761949016064">Tweets by @InviertaSports</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>

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
