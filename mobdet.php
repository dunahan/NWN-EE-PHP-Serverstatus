<?php
    function url_check($url) {
        $hdrs = @get_headers($url);
        return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
    };
    
  $img = ImageCreateFromPng("");  // add URL to pic here
  $col = ImageColorAllocate($img, 180, 180, 85);
  $red = ImageColorAllocate($img, 255, 0, 0);
  $grn = ImageColorAllocate($img, 35, 175, 75);
  $shd = ImageColorAllocate($img, 0, 0, 0);
  $url = 'https://api.nwn.beamdog.net/v1/servers/'; // add your kx_pk key after the last slash
  
  Header("Content-type: image/png");
  if(url_check($url))
  {
    $urlvar = implode('', file($url));
    $urlobj = json_decode($urlvar, true);
   
    $beg = 55;
    $spc = 25;
   
      ImageString($img, 5, 35+1, $beg+1, "Server Name: ".$urlobj['session_name'], $shd);  
    ImageString($img, 5, 35, $beg, "Server Name: ".$urlobj['session_name'], $col);
      ImageString($img, 5, 35+1, $beg+$spc+1, "Modul Name: ".$urlobj['module_name'], $shd);
    ImageString($img, 5, 35, $beg+$spc, "Modul Name: ".$urlobj['module_name'], $col);
      ImageString($img, 5, 35+1, $beg+($spc*2)+1, "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $shd);
    ImageString($img, 5, 35, $beg+($spc*2), "Spieler: ".$urlobj['current_players']."/".$urlobj['max_players'], $col);
      ImageString($img, 5, 35+1, $beg+($spc*3)+1, "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $shd);
    ImageString($img, 5, 35, $beg+($spc*3), "IP:Port: ".$urlobj['host'].":".$urlobj['port'], $col);
    
      ImageString($img, 5, 35+1, $beg+($spc*4)+1, "Details:", $shd);
    ImageString($img, 5, 35, $beg+($spc*4), "Details:", $col);
      ImageString($img, 5, 35+1, $beg+($spc*5)+1, "Level range: ".$urlobj['min_level']."-".$urlobj['max_level'], $shd);
    ImageString($img, 5, 35, $beg+($spc*5), "Level range: ".$urlobj['min_level']."-".$urlobj['max_level'], $col);
    
    $vlt = $urlobj['servervault'];
    if ($vlt = 'true')
    {
        ImageString($img, 5, 35+1, $beg+($spc*6)+1, "Vault: Server", $shd);
      ImageString($img, 5, 35, $beg+($spc*6), "Vault: Server", $col);
    }
    else
    {
        ImageString($img, 5, 35+1, $beg+($spc*6)+1, "Vault: Local", $shd);
      ImageString($img, 5, 35, $beg+($spc*6), "Vault: Local", $col);
    }
    
      ImageString($img, 5, 35+1, $beg+($spc*7)+1, "Password: ", $shd);
    ImageString($img, 5, 35, $beg+($spc*7), "Password: ", $col);
    
    $pwd = $urlobj['passworded'];
    if ($pwd = 'false')
    {
        ImageString($img, 5, 125+1, $beg+($spc*7)+1, "No", $shd);
      ImageString($img, 5, 125, $beg+($spc*7), "No", $grn);
    }
    else
    {
        ImageString($img, 5, 125+1, $beg+($spc*7)+1, "Yes", $shd);
      ImageString($img, 5, 125, $beg+($spc*7), "Yes", $red);
    }
    
      ImageString($img, 5, 35+1, $beg+($spc*8)+1, "Server Version: ".$urlobj['build'].".".$urlobj['rev'], $shd);
    ImageString($img, 5, 35, $beg+($spc*8), "Server Version: ".$urlobj['build'].".".$urlobj['rev'], $col);
      ImageString($img, 5, 35+1, $beg+($spc*9)+1, "Ping: ".$urlobj['latency'], $shd);  
    ImageString($img, 5, 35, $beg+($spc*9), "Ping: ".$urlobj['latency'], $col);
  }
  else {
      ImageString($img, 5, 35+1, $beg+1, "Server currently offline", $shd);  
    ImageString($img, 5, 35, $beg, "Server currently offline", $col);
  }
  
  ImagePNG($img);
  ImageDestroy($img);
?>
