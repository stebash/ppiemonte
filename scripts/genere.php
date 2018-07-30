
<h1>Genere</h1>
<?php
$result = $pdo->query("SELECT DISTINCT CODICE, DESC_BREVE FROM GENERE INNER JOIN ARCHIVIO ON GENERE.CODICE = ARCHIVIO.GENERE WHERE DESC_BREVE != '' ORDER BY DESC_BREVE"); 
if ($result->rowCount()>0) { 
//creo la tabella dei generi
echo "<ul>";

// keeps getting the next row until there are no more to get
while($row = $result->fetch()) {
	// Print out the contents of each row into a table
	echo '<li><a href="index.php?c=genere&v=' .$row['CODICE'].'&d=' .$row['DESC_BREVE'].'">';
	echo $row['DESC_BREVE'];
	echo "</a></li>"; 
} 

echo "</ul>";
 }?>

