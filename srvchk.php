<?php
    function url_check($url) {
        $hdrs = @get_headers($url);
        return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
    };
    
  $img = ImageCreateFromPng("");
  $col = ImageColorAllocate($img, 180, 180, 85);
  $shd = ImageColorAllocate($img, 0, 0, 0);
  $url = 'https://api.nwn.beamdog.net/v1/servers/';  // Add the kx_pk key from your server after the last slash
  
  Header("Content-type: image/png");
  if(url_check($url))
  {
    $urlvar = implode('', file($url));
    $urlobj = json_decode($urlvar, true);
    $reu = 105;
    $lio = 5;
    $spc = 25;
    
      ImageString($img, 5, 5+1, $lio+1, "Server Name: ".$urlobj['session_name'], $shd);
    ImageString($img, 5, 5, $lio, "Server Name: ".$urlobj['session_name'], $col);
    
      ImageString($img, 5, 5+1, $lio+$spc+1, "Modul Name: ".$urlobj['module_name'], $shd);  
    ImageString($img, 5, 5, $lio+$spc, "Modul Name: ".$urlobj['module_name'], $col);
    
      ImageString($img, 5, 5+1, $lio+($spc*2)+1, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $shd);  
    ImageString($img, 5, 5, $lio+($spc*2), "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);
    
      ImageString($img, 5, 960+1, $reu+1, "Server ist Online.", $shd);
    ImageString($img, 5, 960, $reu, "Server ist Online.", $col);
    
      ImageString($img, 5, 960+1, $reu+$spc+1, "IP: ".$urlobj['host'].":".$urlobj['port'], $shd);
    ImageString($img, 5, 960, $reu+$spc, "IP: ".$urlobj['host'].":".$urlobj['port'], $col);
  }
  else {
      ImageString($img, 5, 35+1, $beg+1, "Server currently offline", $shd);  
    ImageString($img, 5, 35, $beg, "Server currently offline", $col);
  }
  
  ImagePNG($img);
  ImageDestroy($img);
?>

