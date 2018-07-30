<?php
//mi collego al db
include ("dbpdo.php");
$stringa=addslashes($_POST['stringa']); //recupero la variabile per indicare il tipo di ricerca

if (empty($_POST['cerca'])) {echo 'Tramite il menù a tendina indica se stai cercando un periodico o una persona<br />';}
if (empty($_POST['stringa'])){echo'Inserisci il nome della persona o il titolo del periodico da cercare<br />';}

else if ($_POST['cerca']=='per') {
$stmt = $pdo->query("SELECT * FROM ARCHIVIO WHERE TITOLO LIKE '%$stringa%'");


if ($stmt->rowCount() >0) { 

echo ' Risultati per <strong>'.stripslashes($stringa) .'</strong> '.$stmt->rowCount() .' risultati<br />';

//creo la tabella dei periodici
echo "<ul>";


while($row = $stmt->fetch()) {
	echo '<li><a href="index.php?c=scheda&s=' .$row['SCHEDA'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 

echo "</ul>";
 } else {echo 'Nessun periodico trovato<br />'; }

}


else if ($_POST['cerca']=='persone') {
	$bibliografie = $pdo->query("SELECT * FROM PERSONE AS p RIGHT JOIN BIBLIO_EST AS b ON p.codice=b.codice WHERE PERS LIKE '%$stringa%' ORDER BY PERS ASC"); // bibliografie
	$direttore= $pdo->query("SELECT p.PERS, a.TITOLO, a.SCHEDA FROM PERSONE AS p INNER JOIN ARCHIVIO AS a ON p.codice = a.SCHEDA WHERE PERS LIKE '%$stringa%' && RUO !=' '"); // cerco le variazioni del direttore
	$biografie = $pdo->query("SELECT * FROM PERSONA AS p INNER JOIN PERSONE AS pe ON p.PID=pe.ID WHERE NOME LIKE '%$stringa%'"); //cerco le biografie
	
	if ($bibliografie->rowCount() >0) { 

	
	echo 'Risultati tra le bibliografie per <strong>'.$stringa .'</strong> '.$bibliografie->rowCount() .' risultati<br />';
	echo "<ul>";

	while ($row = $bibliografie->fetch()) {
		
		echo '<li>'.$row['PERS'] .' ' .'<a href="index.php?c=bibliografia&s=' .$row['codice'].'">';
		echo $row['TITOLO'];
		echo "</a></li>"; 
	} 

	echo "</ul>";
	 } else {echo 'Non ci sono bibliografie legate alla persona cercata<br />'; }
	
	
	if ($direttore->rowCount() >0){
	echo 'Risultati tra le schede periodici per <strong>'.$stringa .'</strong> '.$direttore->rowCount() .' risultati<br />';
	echo "<ul>";

	while($row = $direttore->fetch()) {
		
		echo '<li>'.$row['PERS'] .' ' .'<a href="index.php?c=scheda&s=' .$row['SCHEDA'].'">';
		echo $row['TITOLO'];
		echo "</a></li>"; 
	} 

	echo "</ul>";
	 } else {echo 'Non ci sono periodici legati alla persona cercata<br />'; } 
	
if ($biografie->rowCount() >0){
	echo 'Risultati tra le biografie per <strong>'.$stringa .'</strong> '.$direttore->rowCount() .' risultati<br />';
	echo "<ul>";

	while($row = $biografie->fetch()) {
		
		echo '<li><a href="index.php?c=biografia&s=' .$row['PID'].'">';
		echo $row['NOME'];
		echo "</a></li>"; 
	} 

	echo "</ul>";
	 } else {echo 'Non ci sono biografie legate alla persona cercata<br />'; }
} 
?>
