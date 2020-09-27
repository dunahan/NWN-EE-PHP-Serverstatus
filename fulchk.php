<?php
  $_url = 'https://api.nwn.beamdog.net/v1/servers/[ADD_YOUR_PUBLIC_KEY_HERE]';

  $_url_var = implode('', file($_url));
  $_url_obj = json_decode($_url_var, true);

  echo 'Server is '.'<br>';                                                         //online/offline
  echo 'Server Name: '.$_url_obj['session_name'].'<br>'; 
  echo 'Players Online: '.$_url_obj['current_players'].'/'.$_url_obj['max_players'].'<br>';
  echo 'Module Name: '.$_url_obj['module_name'].'<br>';
  echo 'Server Host: '.$_url_obj['host'].':'.$_url_obj['port'].'<br>';
  echo 'Server Country: '.$_url_obj['language'].'<br>';                             //uk/de/us
  echo 'Server Description: '.$_url_obj['module_description'].'<br>';
  echo 'OS: '.$_url_obj['os'].'<br>';                                               //win/lnx
  echo 'Player vs Player: '.$_url_obj['pvp'].'<br>';                                //party/usw
  echo 'Game Category: '.$_url_obj['game_type'].'<br>';                             //roleplay/usw
  echo 'Level Range: '.$_url_obj['min_level'].'-'.$_url_obj['max_level'].'<br>';
  echo 'Server Version: '.$_url_obj['build'].'.'.$_url_obj['rev'].'<br>';
  echo 'Characters Vault: '.$_url_obj['servervault'].'<br>';                        //server/local
  echo 'Party Type: '.$_url_obj['one_party'].'<br>';                                //type
  echo 'Players Pause: '.$_url_obj['player_pause'].'<br>';                          //yes/no
  echo 'ILR: '.$_url_obj['ilr'].'<br>';                                             //yes/no
  echo 'Legal Characters: '.$_url_obj['elc'].'<br>';                                //yes/no
  echo 'Password: '.$_url_obj['passworded'].'<br>';                                 //yes/no
  echo 'Last check: '.$_url_obj['first_seen'].'-'.$_url_obj['first_seen'].'<br>';   //calc diff
?>
