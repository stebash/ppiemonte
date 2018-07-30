<?php
//mi collego al db
include ("database.php");
$s=$_GET['s'];

$result = mysql_query("SELECT * FROM PERSONA WHERE ID = '$s'") or die(mysql_error()); //cerco le informazioni legate alla persona
//$result2 = mysql_query("SELECT TITOLO FROM ARCHIVIO WHERE SCHEDA ='$s'") or die(mysql_error()); //
$result3 = mysql_query("SELECT * FROM IMMAGINI WHERE SCHEDA = '$s'") or die(mysql_error()); //cerco le immagini associate alla scheda


while($row = mysql_fetch_array( $result3 )) { ?>


<img src="img/img<?php echo $row['ID']; ?>.jpg" height="200" align="right">
<?php } 

while($row = mysql_fetch_array( $result )) {

$sc=$row['codice'];
	// Print out the contents of each row into a table
	echo '<p><strong>Scheda: </strong>'.$row['ID'].'<br />';
	echo '<strong>Nome:</strong> '.$row['NOME'].'<br /><br />';
	echo '<strong>Dati biografici</strong><br />'.$row['BIO'].'</p>';
}?>

