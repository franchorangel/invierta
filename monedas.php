<script>
    var data;
    $.ajax({
        dataType: 'json',
        type: 'GET',
        url: 'https://openexchangerates.org/api/latest.json?app_id=ee8a4a9bee01467c81152d137d57564d',
        timeout: 10000,
        data: data,
        success: function (data) {
            var euro = parseFloat(data.rates.EUR);
            euro = 1 / euro;
            var franco = parseFloat(data.rates.CHF);
            franco = 1 / franco;
            var libra = parseFloat(data.rates.GBP);
            libra = 1 / libra;

            $('#euro').text(euro.toFixed(4));
            $('#franco').text(franco.toFixed(4));
            $('#libra').text(libra.toFixed(4));
            $('#monedas table').fadeIn();

            var arrayMonedas = Array();
            arrayMonedas[0] = euro;
            arrayMonedas[1] = franco;
            arrayMonedas[2] = libra;

            var jarrayMonedas = JSON.stringify(arrayMonedas);

            $.ajax({
                type: 'POST',
                url: "<?php bloginfo('template_directory'); ?>/guardar_monedas.php",
                data: jarrayMonedas,
                success: function(jarrayMonedas){
                    console.log(jarrayMonedas);
                }
            });
        },
        error: function () {
            $('#euro').text('No disponible');
            $('#franco').text('No disponible');
            $('#libra').text('No disponible');
            $('#monedas table').fadeIn();
        }
    });
</script>

<table style="display: none; width: 100%;">
  <tr>
    <td style="font-weight: 800;">Euro <span style="color: rgb(170,170,170); font-weight: 400;">( EUR/USD )</span></td>
    <td id="euro">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Franco Suizo <span style="color: rgb(170,170,170); font-weight: 400;">( CHF/USD )</span></td>
    <td id="franco">
    </td>
</tr>
<tr>
    <td style="font-weight: 800;">Libra Esterlina <span style="color: rgb(170,170,170); font-weight: 400;">( GBP/USD )</span></td>
    <td id="libra">
    </td>
</tr>
</table>