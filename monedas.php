<script>
    //var directory = "http://invierta-sa.com/wp-content/themes/invierta/"; //colocar url manual
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'https://openexchangerates.org/api/latest.json?app_id=ee8a4a9bee01467c81152d137d57564d',
        timeout: 15000,
        success: function (data) {
            var euro = parseFloat(data.rates.EUR);
            euro = 1 / euro;
            var franco = parseFloat(data.rates.CHF);
            franco = 1 / franco;
            var libra = parseFloat(data.rates.GBP);
            libra = 1 / libra;
            var pesoArgentino = parseFloat(data.rates.ARS);
            var realBrasileno = parseFloat(data.rates.BRL);
            var pesoColombiano = parseFloat(data.rates.COP);
            var pesoMexicano = parseFloat(data.rates.MXN);
            var solPeruano = parseFloat(data.rates.PEN);

            $('#euro').text(euro.toFixed(4));
            $('#franco').text(franco.toFixed(4));
            $('#libra').text(libra.toFixed(4));
            $('#pesoArgentino').text(pesoArgentino.toFixed(4));
            $('#realBrasileno').text(realBrasileno.toFixed(4));
            $('#pesoColombiano').text(pesoColombiano.toFixed(4));
            $('#pesoMexicano').text(pesoMexicano.toFixed(4));
            $('#solPeruano').text(solPeruano.toFixed(4));
            $('#monedas table').fadeIn();

            //a db
            // $.ajax({
            //     type: 'POST',
            //     url: directory + "/guardar_monedas.php",
            //     dataType: 'html',
            //     data: { "euro": euro.toFixed(4), "franco": franco.toFixed(4), "libra": libra.toFixed(4) },
            //     cache: false
            // });
        },
        error: function () {
            $('#euro').text('No disponible');
            $('#franco').text('No disponible');
            $('#libra').text('No disponible');
            $('#pesoArgentino').text('No disponible');
            $('#realBrasileno').text('No disponible');
            $('#pesoColombiano').text('No disponible');
            $('#pesoMexicano').text('No disponible');
            $('#solPeruano').text('No disponible');
            $('#monedas table').fadeIn();
        }
    });
</script>

<table style="display: none; width: 100%;">
  <tr>
    <td style="font-weight: 800;">Euro <span style="color: rgb(170,170,170); font-weight: 400;">( EUR/USD )</span></td>
    <td id="euro" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Franco Suizo <span style="color: rgb(170,170,170); font-weight: 400;">( CHF/USD )</span></td>
    <td id="franco" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Libra Esterlina <span style="color: rgb(170,170,170); font-weight: 400;">( GBP/USD )</span></td>
    <td id="libra" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Argentino <span style="color: rgb(170,170,170); font-weight: 400;">( USD/ARS )</span></td>
    <td id="pesoArgentino" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Real Brasileño <span style="color: rgb(170,170,170); font-weight: 400;">( USD/BRL )</span></td>
    <td id="realBrasileno" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Colombiano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/COP )</span></td>
    <td id="pesoColombiano" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Peso Mexicano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/MXN )</span></td>
    <td id="pesoMexicano" style="padding-right:8%">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Sol Peruano <span style="color: rgb(170,170,170); font-weight: 400;">( USD/PEN )</span></td>
    <td id="solPeruano" style="padding-right:8%">
    </td>
</tr>
</table>
