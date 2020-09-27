<?php
  $img = ImageCreateFromPng("[ADD_URL_TO_BANNER_BACKGROUND_HERE]");
  $col = ImageColorAllocate($img, 0, 0, 0);
  $url = 'https://api.nwn.beamdog.net/v1/servers/[ADD_NWNEE_PUBLIC_KEY_HERE]';
  
  $urlvar = implode('', file($url));
  $urlobj = json_decode($urlvar, true);
  $a = 
  
  Header("Content-type: image/png");  
  ImageString($img, 5, 5, 5, "Server Name: ".$urlobj['session_name'], $col);
  ImageString($img, 5, 5, 25, "Modul Name: ".$urlobj['module_name'], $col);
  ImageString($img, 5, 5, 45, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);
  ImageString($img, 5, 1010, 128, $urlobj['host'].":".$urlobj['port'], $col);
  
  ImagePNG ($img);
?>

