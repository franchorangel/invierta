<?php
$euro = $_POST['euro'];
$franco = $_POST['franco'];
$libra = $_POST['libra'];

$db = new mysqli("localhost", "root", "124592159rM"); //cambiar credenciales a prod

$db->query("UPDATE wordpress351.indicadores_monedas SET monedas_valor = " . mysqli_real_escape_string($db, $euro) . " WHERE monedas_id = 1;");
$db->query("UPDATE wordpress351.indicadores_monedas SET monedas_valor = " . mysqli_real_escape_string($db, $franco) . " WHERE monedas_id = 2;");
$db->query("UPDATE wordpress351.indicadores_monedas SET monedas_valor = " . mysqli_real_escape_string($db, $libra) . " WHERE monedas_id = 3;");

$db->close();
?>
