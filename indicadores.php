<?php
    //Oficina 
    //$db_con->query("INSERT INTO wordpress351.indicadores_tiempo (tiempo_updated) VALUES (NOW())");
    
    //Casa
    //$db_con->query("INSERT INTO wordpress86.indicadores_tiempo (tiempo_updated) VALUES (NOW())");

    //$url_commodities = 'http://www.msn.com/en-us/money/markets/commodities';

    //$ch = curl_init($url_commodities);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36');
    //$page_commodities = curl_exec($ch);
    //$info = curl_getinfo($ch);
    //curl_close($ch);

    //echo $info['http_code'];

    //$dom = new DOMDocument();
    //$dom->loadHTML($page_commodities);

    //$xpath = new DOMXPath($dom);
    //$gold = $xpath->query('//*[@id="metal"]/div/div/div/ul[2]/a/li[2]/span'); //MSN money commodities
    //$crude_oil = $xpath->query('//*[@id="energy"]/div/div/div/ul[2]/a/li[2]/span'); // MSN money commodities
    //$brent_crude = $xpath->query('//*[@id="energy"]/div/div/div/ul[3]/a/li[2]/span'); // MSN money commodities

    //$v_gold = $gold->item(0)->nodeValue;
    //$v_crude = $crude_oil->item(0)->nodeValue;
    //$v_brent = $brent_crude->item(0)->nodeValue;

    ////save to db
    //$db_con->query("UPDATE wordpress351.indicadores_commodities SET commodities_valor='" . mysql_real_escape_string($v_gold) . "' WHERE commodities_id=1"); //Oro
    //$db_con->query("UPDATE wordpress351.indicadores_commodities SET commodities_valor='" . mysql_real_escape_string($v_crude) . "' WHERE commodities_id=2;"); //Crudo
    //$db_con->query("UPDATE wordpress351.indicadores_commodities SET commodities_valor='" . mysql_real_escape_string($v_brent) . "' WHERE commodities_id=3;"); //Brent

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



    //$url_bonos = 'http://www.bonosvenezolanos.net/bonos/cotizacion_hoy';
    $page_bonos = 'bonos.html'; //Local
            
    //$ch = curl_init($url_bonos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36');
    //$page_bonos = curl_exec($ch);
    //$info = curl_getinfo($ch);
    curl_close($ch);
    //echo $info['http_code'];

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

            //$db_con->query("INSERT INTO wordpress351.indicadores_tiempo (tiempo_updated) VALUES (NOW())"); //Set last update
      
    $db_con->close();

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