<?php 

$citta = 'Roma';
$url = "http://api.openweathermap.org/data/2.5/weather?q=$citta&appid=2732c9ea6b5f3d562d093d2ad6effc52";
$json = file_get_contents($url);
$json = json_decode($json,true);
var_dump($json);

//CAMPI GESTIBILI CON ARRAY:
echo '<br>'.'<br>'."Descrizione meteo: ".$json['weather'][0]['description'];
echo '<br>'."Temperatura: ".(($json['main']['temp'])-273.15).'°C';
echo '<br>'."Umidità: ".$json['main']['humidity']."%";
echo '<br>'."Vento: ".$json['wind']['speed']."m/s";
echo '<br>'."Nuvolosità: ".$json['clouds']['all']."%";
echo '<br>'."Pressione atmosferica: ".$json['main']['pressure']."hPa";
?>