<?php
/***************************************
* www.program-o.com
* PROGRAM O 
* Version: 2.4.2
* FILE: chatbot/addons/load_addons.php
* AUTHOR: Elizabeth Perreau and Dave Morton
* DATE: MAY 17TH 2014
* DETAILS: this file contains the calls to include addon functions
***************************************/

//load the word censor functions
include("custom_tags/custom_tags.php");
include("word_censor/word_censor.php");
include('spell_checker/spell_checker.php');
//include('replacer/replacer.php'); //Um addon/plugin que substitui sentenças automaticamente antes da exibição da resposta
include("parseBBCode/parseBBCode.php"); // A new addon to allow parsing of output that's consistent with BBCode tags
//include("checkForBan/checkForBan.php"); // A new addon for verifying that a user has not been banned by IP address

runDebug( __FILE__, __FUNCTION__, __LINE__, "Loading addons",4);

function run_pre_input_addons(&$convoArr, $say) {
  global $format;
  $say = (USE_SPELL_CHECKER) ? run_spell_checker_say($say) : $say;
  //$convoArr = checkIP($convoArr);
  #if ($format == 'html') $say =  parseInput($say);
  return $say;
}

function run_mid_level_addons($convoArr)
{
  return $convoArr;
}

function run_post_response_useraddons($convoArr) {
  $format = $convoArr['conversation']['format'];
  $response = (isset($convoArr['send_to_user'])) ? $convoArr['send_to_user'] : $convoArr['conversation']['error_response'];
  $curTime = date('H:i:s');
  $response = str_replace('[serverTime]',$curTime, $response);
  if ($convoArr['send_to_user'] != $response) $convoArr['send_to_user'] = $response;
  //$convoArr =  run_censor($convoArr);
  if ($format == 'html') $convoArr =  checkForParsing($convoArr);
  $ip = $convoArr['client_properties']['ip_address'];
  //if ($convoArr['client_properties']['banned'] === true) add_to_ban($ip);
 // $convoArr['send_to_user'] = run_replacer($convoArr['send_to_user']);
  print_r($convoArr['send_to_user']);die();
  return $convoArr;
}
