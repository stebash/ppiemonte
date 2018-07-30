<?php 

include ("dbpdo.php");
// conto le schede
$total = $pdo->query("SELECT count(*)from ARCHIVIO")->fetchColumn();

//conto le bibliografie
$totale_biblio = $pdo->query("SELECT count(*) from BIBLIO_EST" )->fetchColumn();

//conto il numero delle immagini
$totale_im = $pdo->query("SELECT count(*) from IMMAGINI")->fetchColumn();


echo "<h1>Contenuti</h1>";
echo '<p>Immagini: '.$totale_im.'<br />';
echo 'Schede: '.$total.'<br />';
echo 'Bibliografie: '. $totale_biblio.'</p>';

?>
