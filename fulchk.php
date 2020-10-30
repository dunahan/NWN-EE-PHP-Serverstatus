<?php
      function url_check($url) {
        $hdrs = @get_headers($url);
        return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
    };

  $url = 'https://api.nwn.beamdog.net/v1/servers/';  // add your kx_pk key after the last slash

  if(url_check($url))
  {
    $urlvar = implode('', file($url));
    $urlobj = json_decode($urlvar, true);
    
    echo 'Server is Online<br>';
    
    echo 'Server Name: '.$urlobj['session_name'].'<br>'; 
    echo 'Players Online: '.$urlobj['current_players'].'/'.$urlobj['max_players'].'<br>';
    echo 'Module Name: '.$urlobj['module_name'].'<br>';
    echo 'Server Host: '.$urlobj['host'].':'.$urlobj['port'].'<br>';
    echo 'Server Country: '.$urlobj['language'].'<br>';                             //uk/de/us
    echo 'Server Description: '.$urlobj['module_description'].'<br>';
    echo 'OS: '.$urlobj['os'].'<br>';                                               //win/lnx
    echo 'Player vs Player: '.$urlobj['pvp'].'<br>';                                //party/usw
    echo 'Game Category: '.$urlobj['game_type'].'<br>';                             //roleplay/usw
    echo 'Level Range: '.$urlobj['min_level'].'-'.$urlobj['max_level'].'<br>';
    echo 'Server Version: '.$urlobj['build'].'.'.$urlobj['rev'].'<br>';
    
    $vlt = $urlobj['servervault'];
    if ($vlt = 'true') {
      echo 'Characters Vault: Server<br>';
    }
    else {
      echo 'Characters Vault: Local<br>';
    }
    
    echo 'Party Type: '.$urlobj['one_party'].'<br>';                                //type
    
    $plp = $urlobj['player_pause'];
    if ($plp = 'false') {
      echo 'Players Pause: No<br>';
    }
    else {
      echo 'Players Pause: Yes<br>';
    }

    $ilr = $urlobj['ilr'];
    if ($ilr = 'true') {
      echo 'Item Level Restrictions: Yes<br>';
    }
    else {
      echo 'Item Level Restrictions: No<br>';
    }
    
    $elc = $urlobj['elc'];
    if ($elc = 'true') {
      echo 'Legal Characters: Yes<br>';
    }
    else {
      echo 'Legal Characters: No<br>';
    }
    
    $pwd = $urlobj['passworded'];
    if ($pwd = 'false') {
      echo 'Password: No<br>';
    }
    else {
      echo 'Password: Yes<br>';
    }
    
    
    
    echo '<br><br>Last check: '.$urlobj['first_seen'].'-'.$urlobj['last_advertisement'].'<br>';   //calc diff
  }
  else {
    echo 'Server is Offline<br>';
  }
?>
