<?php

  /***************************************
  * Created for use into
  * PROGRAM O
  * Version: 2.4.2
  * www.program-o.com
  * FILE: spell_checker/spell_checker.php
  * AUTHOR: Gabriel Rodrigues
  * DATE: AUG 9TH 2014
  * DETAILS: this file contains the addon library to replace predetermined strings stored in the database table
  ***************************************/

  if (!defined('REPLACER_PATH'))
  {
    $this_folder = dirname( realpath( __FILE__ ) ) . DIRECTORY_SEPARATOR;
    define('REPLACER_PATH', $this_folder);
  }

   /*   if (empty($_SESSION['replacer_common']))
    {
      $_SESSION['replacer_common'] = file(REPLACER_PATH.'replacer_common.dat', FILE_IGNORE_NEW_LINES);
    }*/

    //$replacer_common = $_SESSION['commonStrings'];

  /**
  * function run_replacer_answer()
  * A function to run the replacing of the bot answer
  * @param  string $answer - The user's input
  * @return $answer (replaced)
  **/
  function run_replacer($answer)
  {
	$sentence = $answer;
	return $sentence;
  }

  /**
  * function Replacer_check()
  * Checks the given word if it is replaceable against a list of defined strings in database.
  * @param [type] [variable used]
  * @return [type] [return value]
  **/
  function Replacer_check($word, $bot_id)
  {
	$corrigido = $word;
	return $corrigido;
  }

  /**
  * function load_replacements
  * Gets all code string and their replacements from the DB, loading them into a session variable.
  * @param (none)
  * @return (void)
  **/
  function load_replacements()
  {
	runDebug(__FILE__, __FUNCTION__, __LINE__, 'Loading the replacement list from the DB.', 2);
	global $dbConn, $dbn;
	$_SESSION['replacers'] = array();
	$sql = 'SELECT code, result FROM `'.$dbn.'`.`replacements` where `cidade_id`=99;';
	$sth = $dbConn->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	$num_rows = count($result);
	if ($num_rows > 0) {
		foreach ($result as $row) {
			$code = (IS_MB_ENABLED) ? mb_strtolower($row['code']) : strtolower($row['code']);
			$_SESSION['replacers'][trim($row['code'])] = trim($row['result']);
		}
	}
  }

?>