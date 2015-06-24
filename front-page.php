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
    //ini_set('display_errors', 'Off'); //colocar en el ini file de php

    $db_con = new mysqli("localhost", "root", "124592159rM");
    //Oficina 
    //$db_con->query("INSERT INTO wordpress351.indicadores_tiempo (tiempo_updated) VALUES (NOW())");
    
    //Casa
    //$db_con->query("INSERT INTO wordpress86.indicadores_tiempo (tiempo_updated) VALUES (NOW())");
    
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
            //$url_commodities = 'http://www.msn.com/en-us/money/markets/commodities';

            //$ch = curl_init($url_commodities);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36');
            //$page_commodities = curl_exec($ch);
            ////$info = curl_getinfo($ch);
            //curl_close($ch);
            ////echo $info['http_code'];
            ////echo $pagec;

            //$dom = new DOMDocument();
            //$dom->loadHTML($page_commodities);

            //$xpath = new DOMXPath($dom);
            //$gold = $xpath->query('//*[@id="metal"]/div/div/div/ul[2]/a/li[2]/span'); //MSN money commodities
            //$crude_oil = $xpath->query('//*[@id="energy"]/div/div/div/ul[2]/a/li[2]/span'); // MSN money commodities
            //$brent_crude = $xpath->query('//*[@id="energy"]/div/div/div/ul[3]/a/li[2]/span'); // MSN money commodities

            //$gold->item(0)->nodeValue;
            //$crude_oil->item(0)->nodeValue;
            //$brent_crude->item(0)->nodeValue;
            ////save to db



            //$url_monedas = 'http://www.xe.com/sitemap.php';
            //
            //$ch = curl_init($url_monedas);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36');
            //$page_monedas = curl_exec($ch);
            //$info = curl_getinfo($ch);
            //curl_close($ch);
            //echo $info['http_code'];
            //echo $page_monedas;

            //$dom = new DOMDocument();
            //$dom->loadHTML($page_monedas);

            //$xpath = new DOMXPath($dom);
            //$euro = $xpath->query('//*[@id="crLive"]/tbody/tr[2]/td[2]'); //
            ////$libra = $xpath->query('//*[@id="i_GBP"]'); //
            ////$franco = $xpath->query('//*[@id="i_CHF"]'); //

            //$euro->item(0)->nodeValue;
            ////$libra->item(0)->nodeValue;
            ////$franco->item(0)->nodeValue;

            //echo $euro;
            ////echo $libra;
            ////echo $franco;

            ////scrape and save to db
            //echo '<br />Han pasado mas de 10 minutos';

            //$db_con->query("INSERT INTO wordpress351.indicadores_tiempo (tiempo_updated) VALUES (NOW())"); //Set last update

            //$url_bonos = 'http://www.bonosvenezolanos.net/bonos/cotizacion_hoy';
            $page_bonos = 'bonos.html'; //Local
            
            $ch = curl_init($url_bonos);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36');
            //$page_bonos = curl_exec($ch);
            //$info = curl_getinfo($ch);
            curl_close($ch);
            //echo $info['http_code'];
            //echo $page_bonos;

            $dom = new DOMDocument();
            $dom->loadHTMLFile($page_bonos); //remove file part on internet

            $nodeList = $dom->getElementsByTagName('td');
            $array = iterator_to_array($nodeList);

            $n=0;
            foreach($array as $key => $item){
              if(is_string($item->nodeValue)){
                  $array_n[$n] = $item->nodeValue;
                  $n++;
              }
            }

            ?>
            
        <?php
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
        }
    }
    else
    {
        echo 'Failed connection';
    }

    $db_con->close();
    
    $url = 'http://www.msn.com/en-us/money/markets/commodities';
    //$url = 'http://www.msn.com/en-us/money/currencyconverter';
    //$url = 'http://www.movatic.com';

    

    //get timestamp of last update
    //if (timestamp > 10min)
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
                  if(isset($euro)){
                    echo $euro;     
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
                if(isset($euro)){
                  echo $euro;     
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
                if(isset($euro)){
                  echo $euro;     
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
        <?php for($i = 0; $i < sizeof($array_n); $i++) : ?>
          <tr>
            <td>
                <?php if(isset($array_n[$i * 4 + 0])){echo $array_n[$i * 4 + 0];} ?>
            </td>
            <td>
                <?php if(isset($array_n[$i * 4 + 0])){echo $array_n[$i * 4 + 1];} ?>
            </td>
            <?php endfor; ?>
          </tr>
      </table>
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