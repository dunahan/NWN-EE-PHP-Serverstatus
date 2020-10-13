<?php
  $img = ImageCreateFromPng("");                      // Add your link to the image between the double quotes, works good with a 400x560 pic
  $col = ImageColorAllocate($img, 180, 180, 85);
  $shd = ImageColorAllocate($img, 0, 0, 0);           // a nice shade under the text
  $url = 'https://api.nwn.beamdog.net/v1/servers/';   // add your kx_pk after the last slash
  
  $urlvar = implode('', file($url));
  $urlobj = json_decode($urlvar, true);
  $beg = 105; // where to begin the text
  $spc = 25;  // spacer between the text lines
  
  Header("Content-type: image/png");  

    ImageString($img, 5, 35+1, $beg+1, "Server Name: ".$urlobj['session_name'], $shd);  // adds the shade
  ImageString($img, 5, 35, $beg, "Server Name: ".$urlobj['session_name'], $col);

    ImageString($img, 5, 35+1, $beg+$spc+1, "Modul Name: ".$urlobj['module_name'], $shd);  
  ImageString($img, 5, 35, $beg+$spc, "Modul Name: ".$urlobj['module_name'], $col);

    ImageString($img, 5, 35+1, $beg+($spc*2)+1, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $shd);
  ImageString($img, 5, 35, $beg+($spc*2), "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);

    ImageString($img, 5, 35+1, $beg+($spc*3)+1, "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $shd);
  ImageString($img, 5, 35, $beg+($spc*3), "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $col);
  
  ImagePNG($img);
  ImageDestroy($img);
?>
