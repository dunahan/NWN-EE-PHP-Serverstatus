<?php
  $url = 'https://api.nwn.beamdog.net/v1/servers/';  // add your kx_pk key after the last slash

  $urlvar = implode('', file($url));
  $urlobj = json_decode($urlvar, true);
  
  $onl = $urlobj['last_advertisement'];
  if ($onl > 1) {
    echo 'Server is Online<br>';
  }
  else {
    echo 'Server is Offline<br>';
  }
  
  echo 'Server Name: '.$urlobj['session_name'].'<br>'; 
  echo 'Players Online: '.$urlobj['current_players'].'/'.$urlobj['max_players'].'<br>';
  echo 'Module Name: '.$urlobj['module_name'].'<br>';
  echo 'Server Host: '.$urlobj['host'].':'.$urlobj['port'].'<br>';
  echo 'Server Country: '.$urlobj['language'].'<br>';                             //uk/de/us
  echo 'Server Description: '.$urlobj['module_description'].'<br>';
  echo 'OS: '.$urlobj['os'].'<br>';                                               //win/lnx/...
  echo 'Player vs Player: '.$urlobj['pvp'].'<br>';                                //party/...
  echo 'Game Category: '.$urlobj['game_type'].'<br>';                             //roleplay/...
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
  if ($plp = 'true') {
    echo 'Players Pause: Yes<br>';
  }
  else {
    echo 'Players Pause: No<br>';
  }

  $ilr = $urlobj['ilr'];
  if ($ilr = 'false') {
    echo 'Item Level Restrictions: No<br>';
  }
  else {
    echo 'Item Level Restrictions: Yes<br>';
  }
  
  $elc = $urlobj['elc'];
  if ($elc = 'false') {
    echo 'Legal Characters: No<br>';
  }
  else {
    echo 'Legal Characters: Yes<br>';
  }
  
  $pwd = $urlobj['passworded'];
  if ($pwd = 'false') {
    echo 'Password: No<br>';
  }
  else {
    echo 'Password: Yes<br>';
  }
  
  echo 'Last check: '.$urlobj['first_seen'].'-'.$urlobj['last_advertisement'].'<br>';   //calc diff
?>
