<?php
require_once dirname(__FILE__).'/../config.php';


$value = $_REQUEST ['value'];
$time = $_REQUEST ['time'];
$interest = $_REQUEST ['interest'];

if ( ! (isset($value) && isset($time) && isset($interest))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $value == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $time == "") {
	$messages [] = 'Nie podano czasu kredytowania';
}
if ( $interest == "") {
	$messages [] = 'Nie podano oprocentowania';
}


if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $value )) {
		$messages [] = 'Kwota kredytu nie jest liczbą';
	}
	
	if (! is_numeric( $time )) {
		$messages [] = 'Okres kredytowania nie jest liczbą';
	}	
	
	if (! is_numeric( $interest )) {
		$messages [] = 'Oprocentowanie nie jest liczbą';
	}	

}


if (empty ( $messages )) { 
	
	//konwersja parametrów na float
	$value = floatval($value);
	$time = floatval($time);
	$interest = floatval($interest);
	
	
	//wykonanie operacji
	$result = (($value*(100+$interest))/100)/($time*12);
	}

include 'calc_view.php';