<?php


$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if($link== 'http://www.periodicipiemonte.it/ricerca-periodico' ||
  ($link== 'http://www.periodicipiemonte.it/ricerca-bibliografie' ||
  ($link== 'http://www.periodicipiemonte.it/ricerca-biografie'))) {

if($link== 'http://www.periodicipiemonte.it/ricerca-periodico') {
$n='del periodico';
$cerca='periodici';
$action='index.php?c=scheda';
															}

elseif ($link== 'http://www.periodicipiemonte.it/ricerca-bibliografie') {
$n='della bibliografia';
$cerca='bibliografia';
$action='index.php?c=bibliografia';										}


elseif ($link== 'http://www.periodicipiemonte.it/ricerca-biografie') {
$n='della biografia';
$cerca='biografia';
$action='index.php?c=biografia';	
																} ?>
						
	<h1>Cerca <?php echo $cerca; ?></h1>
	<p>Inserisci  il numero della scheda <?php echo $n; ?> di tuo interesse</p>
	<form method="POST" action="<?php echo $action; ?>">
		<input type="text" name="s" /><br>
		<input type="submit" name="submit" value="Cerca" /><br>
	</form>

<?php }// chiudo form ricerca per numero di scheda

elseif ($link='http://www.periodicipiemonte.it/ricerca-anno-fondazione'){ ?>

<h1>Cerca per anno di fondazione</h1>
<p>Inserisci l'anno di fondazione</p>
<form method="POST" action="index.php?c=anno-fondazione">
<input type="text" name="af" /><br>
		<input type="submit" name="submit" value="Cerca" /><br>
	</form>

<?php } ?>
