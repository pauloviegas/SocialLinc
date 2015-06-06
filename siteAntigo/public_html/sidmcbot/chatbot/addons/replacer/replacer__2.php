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
    global $bot_id;
    runDebug(__FILE__, __FUNCTION__, __LINE__, 'Starting function and setting timestamp.', 2);
    $sentence = '';
    $wordArr = explode(' ', $answer);
	
    foreach ($wordArr as $index => $word)
    {
		$pos = strpos($word,'#'); //check if the replaceable character exists in the string
		
		if ($pos === false) {
		    
			$sentence.= $word . " "; //if it not exists, just put the word directly back at the sentence.
			} else {
				if ($pos == 0) { //and check if the replaceable character is the first character at the word.
					$pont = strpbrk($word,",.;:");
					
						if ( $pont === true ) {
							$punct = $substr($word, $pont, strlen($word));
							//$word = $substr($word, 0, ($pont-1));
							$word = str_replace(",.;:","",$word);
							$sentence .= Replacer_check($word, $bot_id) . $punct . " ";
						} else {
							$sentence .= Replacer_check($word, $bot_id) . " ";
						}
					
					} else {
				$sentence.= $word . " ";
				}
			}
    }
    return trim($sentence);
  }

  /**
  * function Replacer_check()
  * Checks the given word if it is replaceable against a list of defined strings in database.
  * @param [type] [variable used]
  * @return [type] [return value]
  **/
  function Replacer_check($word, $bot_id)
  {
    runDebug(__FILE__, __FUNCTION__, __LINE__, "Performing replacement on $word.", 2);
    global $dbConn, $dbn, $replacer_common; //get the database connection strings and the common words list
    if (strstr($word, "'")) $word = str_replace("'", ' ', $word);
	if (strstr($word, ",")) $word = str_replace(",", ' ', $word);
    //$test_word = (IS_MB_ENABLED) ? mb_strtolower($word) : strtolower($word);
	$test_word = strtolower($word);
    if (!isset($_SESSION['replacers'])) load_replacements();
    /*if (in_array($test_word, $replacer_common)) {
		runDebug(__FILE__, __FUNCTION__, __LINE__, "The word '$word' is a common word. Returning without checking.", 4);
		return $word;
    }*/
	echo "hhh == " . $test_word;
	die(print_r($_SESSION['replacers']));
	
    if (in_array($test_word, array_keys($_SESSION['replacers']))) {
      $corrected_word = $_SESSION['replacers'][$test_word];
      runDebug(__FILE__, __FUNCTION__, __LINE__, "Replacement found! Replaced $word with $corrected_word.", 4);
      } else {
		runDebug(__FILE__, __FUNCTION__, __LINE__,'Spelling check passed.', 4);
		$corrected_word = $word;
	}
	
	
	if (strstr($word, ",")) $word = str_replace(",", ' ', $word);
	
    if (IS_MB_ENABLED)
    {
      switch ($word){
        case mb_strtolower($word):
        $corrected_word = mb_strtolower($corrected_word);
        break;
        case mb_strtoupper($word):
        $corrected_word = mb_strtoupper($corrected_word);
        break;
        case mb_convert_case($word, MB_CASE_TITLE):
        $corrected_word = mb_convert_case($corrected_word, MB_CASE_TITLE);
        break;
        default:
      }
    }
    else
    {
      switch ($word){
        case strtolower($word):
        $corrected_word = strtolower($corrected_word);
        break;
        case strtoupper($word):
        $corrected_word = strtoupper($corrected_word);
        break;
        case ucfirst($word):
        $corrected_word = ucfirst($corrected_word);
        break;
        default:
      }
    }
  //set in global config file
    return $corrected_word;
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
	if (!empty($_SESSION['cidade'])) {
		$sql = 'SELECT code, result FROM `'.$dbn.'`.`replacements` where `cidade_id`=99 AND cidade_id='.$_SESSION['cidade'].';';
		}
	else {
		$sql = 'SELECT code, result FROM `'.$dbn.'`.`replacements` where `cidade_id`=99;';
		}
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