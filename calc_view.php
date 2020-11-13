
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
	<label for="id_value"> Kwota  kredytu:  </label>
	<input id="id_value" type="text" name="value" value="<?php if (isset($value)) print($value); ?>" />
	<br /><br />
	<label for="id_time"> Okres (w latach): </label>
	<input id="id_time" type="text" name="time" value="<?php if(isset($time)) print($time);?>"/>
	<br /><br />
	<label for="id_interest">Oprocentowanie: </label>
	<input id="id_interest" type="text" name="interest" value="<?php if (isset($interest)) print($interest); ?>" />
	<br /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>