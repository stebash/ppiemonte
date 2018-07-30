<?php
@$v= $_GET['v']; //recupero l'id del genere o della provincia
$c= $_GET['c']; //identifico la pagina di provenienza
@$b=$_GET['b']; //identifico la biblioteca selezionata
@$d= $_GET['d'];
$x_pag = 20; // Creo una variabile dove imposto il numero di record da mostrare in ogni pagina
$pag = isset($_GET['pag']) ? $_GET['pag'] : 1; // Recupero il numero di pagina corrente. Generalmente si utilizza una querystring

if (!$pag || !is_numeric($pag)) $pag = 1; // Controllo se $pag è valorizzato e se è numerico ...in caso contrario gli assegno valore 1

$first = ($pag - 1) * $x_pag; // Calcolo da quale record iniziare



// Imposto la query in base alla pagina di provenienza 
if ($c=='genere' || ($c=='provincia')) { //se x genere o provincia

		if ($c=='genere') {	$titolo = 'GENERE '; } //cerca per genere
		else if ($c=='provincia') {$titolo = 'PROVINCIA '; } //cerca per provincia
	$conta = $pdo->query("SELECT TITOLO, SCHEDA FROM ARCHIVIO WHERE $titolo = '$v' AND TITOLO != ''");
	$result = $pdo->query("SELECT TITOLO, SCHEDA FROM ARCHIVIO WHERE $titolo = '$v' AND TITOLO != '' ORDER BY SCHEDA LIMIT $first, $x_pag"); 
	
	echo '<h1>'.$titolo . $d. '</h1>';	

echo "<ul>";

while($row = $result->fetch()) {
	echo '<li><a href="index.php?c=scheda&s=' .$row['SCHEDA'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 

echo "</ul>";	
					} //chiudo if genere e provincia

if ($c=='biblioteca') {$titolo='BIBLIOTECA'; //se cerco in base alla biblioteca
$conta=$pdo->query("SELECT * FROM BIBLIOT WHERE COD_PROV = '$v'"); 
$result= $pdo->query("SELECT * FROM BIBLIOT WHERE COD_PROV = '$v' ORDER BY NOME LIMIT $first, $x_pag"); 
echo '<h1>'.$titolo. $d. '</h1>';	

echo "<ul>";

while($row = $result->fetch()) {
	echo '<li><a href="index.php?c=cerca-biblioteca&d='.$d.'&b=' .$row['CODICE'].'">';
	echo $row['NOME'];
	echo "</a></li>"; 
} 

echo "</ul>";

}

if($c=='cerca-biblioteca') { $titolo='Cerca biblioteca di ';
$conta=$pdo->query("SELECT * FROM ARCHIVIO WHERE BIBLIOPRI = '$b'");
$result= $pdo->query("SELECT * FROM ARCHIVIO WHERE BIBLIOPRI = '$b' ORDER BY TITOLO LIMIT $first, $x_pag");
	echo '<h1>'.$titolo . $d. '</h1>';	

echo "<ul>";

while($row = $result->fetch()) {
	echo '<li><a href="index.php?c=scheda&d=$d&s=' .$row['SCHEDA'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 
}

else if ($c=='monografie' || ($c=='opere-collettive' || ($c=='tesi' || ($c=='manoscritti' || ($c=='opuscoli' || ($c=='estratti' || ($c=='spogli-bibliografici' || ($c=='citazioni' || ($c=='cataloghi-repertori' || ($c=='articoli-saggi')))))))))) {

		if ($c=='monografie') {$id='0'; $titolo = 'Monografie';}
		else if ($c=='opere-collettive') {$id='1'; $titolo = 'Opere collettive';}
		else if ($c=='tesi') {$id='2'; $titolo = 'Tesi';}
		else if ($c=='manoscritti') {$id='3'; $titolo = 'Manoscritti';}
		else if ($c=='opuscoli') {$id='4'; $titolo = 'Opuscoli';}
		else if ($c=='estratti') {$id='5'; $titolo = 'Estratti';}
		else if ($c=='spogli-bibliografici') {$id='6'; $titolo = 'Spogli bibliografici';}
		else if ($c=='citazioni') {$id='7'; $titolo = 'Citazioni';}
		else if ($c=='cataloghi-repertori') {$id='9'; $titolo = 'Cataloghi repertori';}
		else if ($c=='articoli-saggi') {$id='10'; $titolo = 'Articoli e Saggi';}
	$conta=$pdo->query("SELECT codice, TITOLO FROM BIBLIO_EST WHERE CodTipologia = '$id'");
	$result = $pdo->query("SELECT DISTINCT codice, TITOLO FROM BIBLIO_EST WHERE CodTipologia = '$id' ORDER BY TITOLO LIMIT $first, $x_pag");
	//$result = $pdo->query("SELECT b.codice, TITOLO FROM BIBLIO_EST AS b JOIN PERSONE AS p ON p.codice=b.codice WHERE CodTipologia = '$id' ORDER BY PERS ASC LIMIT $first, $x_pag"); 
	//$conta = mysql_num_rows($result) or die(mysql_error());

echo '<h1>'.$titolo. $d. '</h1>';	

echo "<ul>";

while($row = $result->fetch()) {
	echo '<li><a href="index.php?c=bibliografia&s=' .$row['codice'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 

echo "</ul>";

					} // chiudo if bibliografie


else if ($c=='testate-in-vita') {$titolo = 'TESTATE IN VITA';
$conta=$pdo->query("SELECT TITOLO, SCHEDA, ANNO_FOND FROM ARCHIVIO WHERE CONTINUA='S'"); 
$result = $pdo->query("SELECT TITOLO, SCHEDA, ANNO_FOND FROM ARCHIVIO WHERE CONTINUA='S' order by TITOLO LIMIT $first, $x_pag"); 
echo '<h1>'.$titolo. $d. '</h1>';	

echo "<ul>";

// keeps getting the next row until there are no more to get
while($row = $result->fetch()) {
	// Print out the contents of each row into a table
	echo '<li><a href="index.php?c=scheda&s=' .$row['SCHEDA'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 

echo "</ul>";

} //chiudo if testate in vita

else if ($c=='anno-fondazione') {$titolo = 'ANNO DI FONDAZIONE ';
$af=$_POST['af'];
$conta=$pdo->query("SELECT TITOLO, SCHEDA FROM ARCHIVIO WHERE ANNO_FOND='$af'");
$result=$pdo->query("SELECT TITOLO, SCHEDA FROM ARCHIVIO WHERE ANNO_FOND='$af' order by TITOLO LIMIT $first, $x_pag");
echo '<h1>'.$titolo . $af. '</h1>';
echo "<ul>";

// keeps getting the next row until there are no more to get
while($row = $result->fetch()) {
	// Print out the contents of each row into a table
	echo '<li><a href="index.php?c=scheda&s=' .$row['SCHEDA'].'">';
	echo $row['TITOLO'];
	echo "</a></li>"; 
} 

echo "</ul>";

} //chiudo if anno di fondazione
$conta2 = $conta->rowCount();
$all_pages = ceil($conta2 / $x_pag); // Definisco il numero totale di pagine

if ($all_pages > 1){
  if ($pag > 1){

    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "&v=" . ($v) . "&c=" .($c) . "&d=" .($d) ."\">";
    echo "Pagina Indietro</a>&nbsp;";
  } 
  if ($all_pages > $pag){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "&v=" . ($v) . "&c=" .($c) . "&d=" .($d) . "\">";
    echo "Pagina Avanti</a>";
  } 
}

?>
