<?php
  $img = ImageCreateFromPng("");  // Add the url between the double quotes
  $col = ImageColorAllocate($img, 180, 180, 85);
  $shd = ImageColorAllocate($img, 0, 0, 0); // adds a nice shadow below the text
  $url = 'https://api.nwn.beamdog.net/v1/servers/';  // Add the kx_pk key from your server after the last slash
  
  $urlvar = implode('', file($url));
  $urlobj = json_decode($urlvar, true);
  $reu = 105; // starting location for the text in the right corner
  $lio = 5;   // starting location for the text in the left upper corner
  $spc = 25;  // spacer between texts
  
  Header("Content-type: image/png");  
    ImageString($img, 5, 5+1, $lio+1, "Server Name: ".$urlobj['session_name'], $shd);   // this adds a shadow under the next text
  ImageString($img, 5, 5, $lio, "Server Name: ".$urlobj['session_name'], $col);
  
    ImageString($img, 5, 5+1, $lio+$spc+1, "Modul Name: ".$urlobj['module_name'], $shd);  
  ImageString($img, 5, 5, $lio+$spc, "Modul Name: ".$urlobj['module_name'], $col);
  
    ImageString($img, 5, 5+1, $lio+($spc*2)+1, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $shd);  
  ImageString($img, 5, 5, $lio+($spc*2), "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);
  
    ImageString($img, 5, 960+1, $reu+1, "Server ist Online.", $shd);
  ImageString($img, 5, 960, $reu, "Server ist Online.", $col);
  
    ImageString($img, 5, 960+1, $reu+$spc+1, "IP: ".$urlobj['host'].":".$urlobj['port'], $shd);
  ImageString($img, 5, 960, $reu+$spc, "IP: ".$urlobj['host'].":".$urlobj['port'], $col);
  
  ImagePNG($img);
  ImageDestroy($img);
?>

