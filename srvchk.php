<?php
  $_url = 'https://api.nwn.beamdog.net/v1/servers/[ADD_THE_KX_PK_FROM_NWNEE_SERVER_API_HERE]';    //Query a specific server by their identity, even if they aren't public.

  $_url_var = implode('', file($_url));
  $_url_obj = json_decode($_url_var, true);

  $_ses_nam = $_url_obj['session_name'];
  $_mod_nam = $_url_obj['module_name'];
  $_cur_pla = $_url_obj['current_players'];
  $_max_pla = $_url_obj['max_players'];
  $_host_ip = $_url_obj['host'];
  $_host_po = $_url_obj['port'];

  echo $_ses_nam.'<br>'.$_mod_nam.'<br>Players '.$_cur_pla.' / '.$_max_pla.' Host: '.$_host_ip.' : '.$_host_po.'<br>'
?>
