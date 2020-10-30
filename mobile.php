<?php
    function url_check($url) {
        $hdrs = @get_headers($url);
        return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
    };
    
  $img = ImageCreateFromPng("https://www.schwerterkueste.de/online/images/Alyn_Spiller_Bridge-400x560.png");
  $col = ImageColorAllocate($img, 180, 180, 85);
  $shd = ImageColorAllocate($img, 0, 0, 0);
  $url = 'https://api.nwn.beamdog.net/v1/servers/';   // add your kx_pk after the last slash
  
  Header("Content-type: image/png");
  if(url_check($url))
  {
    $urlvar = implode('', file($url));
    $urlobj = json_decode($urlvar, true);
    $beg = 105;
    $spc = 25;
    
      ImageString($img, 5, 35+1, $beg+1, "Server Name: ".$urlobj['session_name'], $shd);  
    ImageString($img, 5, 35, $beg, "Server Name: ".$urlobj['session_name'], $col);

      ImageString($img, 5, 35+1, $beg+$spc+1, "Modul Name: ".$urlobj['module_name'], $shd);  
    ImageString($img, 5, 35, $beg+$spc, "Modul Name: ".$urlobj['module_name'], $col);

      ImageString($img, 5, 35+1, $beg+($spc*2)+1, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $shd);
    ImageString($img, 5, 35, $beg+($spc*2), "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);

      ImageString($img, 5, 35+1, $beg+($spc*3)+1, "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $shd);
    ImageString($img, 5, 35, $beg+($spc*3), "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $col);
  }
  else {
      ImageString($img, 5, 35+1, $beg+1, "Server currently offline", $shd);  
    ImageString($img, 5, 35, $beg, "Server currently offline", $col);
  }
  
  ImagePNG($img);
  ImageDestroy($img);
?>
