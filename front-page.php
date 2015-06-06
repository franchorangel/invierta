<!doctype html>
<html>
<head>
  <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
  <title>Invierta - Asesore de Inversión</title>
</head>
<body>
<header>
  <div id="imagenes-header">
    <?php //get fondo header ?>            
      <img src="" alt="" />
    <?php //end get ?>
  </div>
  <div id="logo">
    <?php //get logo ?>
    <img src="" alt="" />
    <?php //end get ?>
  </div>
</header>
<nav id="menu">
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
  <p><?php the_field('quienes_somos'); ?></p>
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
  <p><?php the_field('publicaciones'); ?></p>
</div>
<div id="videos">
  <h2>VIDEOS</h2>
  <p><?php the_field('videos'); ?></p>
</div>
<div id="portafolio">
  <h2>PORTAFOLIO</h2>
  <?php //get texto portafolio ?>
</div>
<footer>
  <?php //get fondo footer ?>
  <img src="" alt="" />
</footer>
</body>
</html>
