<?php
if (isset($_GET['s'])){ $id= $_GET['s']; }
else if (isset($_POST['s'])){ $id= $_POST['s']; }

include ("dbpdo.php"); //mi collego al db

//estraggo la scheda richiesta

$result = $pdo->query("SELECT DISTINCT * FROM ARCHIVIO AS a
						LEFT JOIN GENERE AS g ON a.GENERE = g.CODICE
						LEFT JOIN PERIOD AS p ON a.PERIODIC = p.CODICE  
						LEFT JOIN BIBLIOT AS b ON a.BIBLIOPRI = b.CODICE
						LEFT JOIN PERSONE AS pe ON a.SCHEDA = pe.codice
						LEFT JOIN MONETA AS m ON a.MONETA= m.CODICE
						LEFT JOIN PROV AS pr ON a.PROVINCIA=pr.PROV
						LEFT JOIN LINGUA AS l ON a.LINGUA=l.CODICE
						LEFT JOIN ESTENS AS e ON a.ESTENSIONE=e.CODICE
						LEFT JOIN MEMO2003 AS me ON a.SCHEDA=me.MEMO
						WHERE a.SCHEDA = '$id' LIMIT 1 "); 

if ($result->rowCount() <=0) { echo "<strong>Attenzione</strong>:</strong> non ci sono schede con quel numero<br />"; } else {

	$result2 = $pdo->query("SELECT DISTINCT * FROM NOTE WHERE SCHEDA = '$id'"); //cerco le note aggiuntive associate alla scheda (variazioni titolo)
	$result3 = $pdo->query("SELECT * FROM IMMAGINI WHERE SCHEDA = '$id' && TIPO='S'"); //cerco le immagini associate alla scheda
	$cerca_bib= $pdo->query("SELECT * FROM BIB_PER LEFT JOIN BIBLIOT ON BIB_PER.BIBLIO =  BIBLIOT.CODICE WHERE SCHEDA='$id'"); //cerca le biblioteche
	$note_agg= $pdo->query("SELECT * FROM MEMO2003 WHERE SCHEDA='$id'"); //cerca le note aggiuntive
	$cerca_per= $pdo->query("SELECT * FROM PERSONE WHERE codice='$id' && RUO !=' '"); //cerca i redattori
	$bibliog= $pdo->query("SELECT * FROM BIBLIOGR_copy WHERE SCHEDA='$id'"); //cerca bibliografia
	$opere= $pdo->query("SELECT * FROM opere WHERE id_periodico='$id'"); // cerca opere (riferimenti bibliografici)
	

while($row = $result->fetch()) { ?>
	<h1><?php echo $row['TITOLO']; ?></h1>
	<h3><?php echo $row['SOTTOTIT_1']. $row['SOTTOTIT_2']. $row['SOTTOTIT_3'];?></h3>
	<div id="scheda">
	<ul>
	<li><strong>Codice Scheda:</strong> <?php echo $id; ?></li>
	<li><strong>Anno di fondazione:</strong> <?php echo $row['ANNO_FOND']; ?></li>
	<li><strong>Anno di cessazione:</strong> <?php echo $row['ANNO_CESS']; ?></li>
	<li><strong>Scheda precedente:</strong> <a href="index.php?c=scheda&s=<?php echo $row['RIF_PREC']; ?>"><?php echo $row['RIF_PREC']; ?></a></li>
	<li><strong>Scheda successiva:</strong> <a href="index.php?c=scheda&s=<?php echo $row['RIF_SUCC']; ?>"><?php echo $row['RIF_SUCC']; ?></a></li>
	<li><strong>Altezza :</strong><?php echo $row['ALTEZZA']; ?></li><li><strong>Base:</strong> <?php echo $row['BASE']; ?></li>
	<li><strong>Pag. arabe:</strong><?php echo $row['PAGINE']; ?></li><li><strong>Da:</strong> </li>
	<li><strong>A:</strong> </li>
	<li><strong>Pag. romane:</strong> <?php echo $row['PAGINE_ROM']; ?></li>
	<li><strong>Genere:</strong> <?php echo $row['DESC_BREVE']; ?></li><li><strong>Altro genere:</strong><?php //echo $row['DESC_BREVE']; ?> </li>
	<li><strong>Periodicità:</strong> <?php echo $row['pe.DESCRIZION']; ?></li>
	<li><strong>Prezzo:</strong> <?php echo $row['PREZZO']; ?></li><li><strong>Moneta:</strong> <?php echo $row['m.DESCRIZION']; ?></li>
	<li><strong>Tiratura:</strong> <?php echo $row['TIRATURA']; ?></li><li><strong>Nell'anno:</strong> <?php echo $row['NELLANNO']; ?></li>
	<li><strong>Area di diffusione:</strong> <?php echo $row['es.DESCRIZION']; ?></li>
	<!--<li><strong>Estensione:</strong> <?php echo $diffusione; ?></li>-->
	<li><strong>Lingua:</strong> <?php echo $row['LDESCRIZION']; ?></li>
	<li><strong>Supplementi:</strong> <?php echo $row['SUPPLEM']; ?></li>
	<!--<li><strong>Supplemento di :</strong></li>-->
	<li><strong>Sito internet:</strong> <?php echo $row['URL']; ?></li>
	<li><strong>Indice:</strong> <?php echo $row['INDICE']; ?></li>
	<li><strong>Editore:</strong> <?php echo $row['EDITORE']; ?></li>
	<li><strong>Luogo di edizione:</strong> <?php echo $row['LUOGO_EDIZ']; ?></li><li><strong>Provincia:</strong> <?php echo $row['NOMEPROV']; ?></li>
	<li><strong>Tipografia :</strong><?php echo $row['TIPOGRAFIA']; ?></li><li><strong>Luogo di stampa:</strong> <?php echo $row['LUOGO_STAM']; ?></li>
	<li><strong>Continua :</strong><?php echo $row['CONTINUA']; ?></li>
<?php if ($cerca_per->rowCount()>0) { ?>
<li><h2>Persone</h2></li>
<?php while ($redattore= $cerca_per->fetch()) {?>
<li><?php echo $redattore['RUO'] .": ". $redattore['PERS'];?></li>
<?php }} 
include ('variazioni.php');

?>


	<li><strong>Biblioteca principale:</strong> <?php echo $row['NOME']; ?></li><li><strong>Inizio:</strong> <?php echo $row['INIPRI']; ?></li><li><strong>Fine:</strong> <?php echo $row['FINEPRI']; ?></li>
	<li><strong>Note:</strong> <?php echo $row['NOTE']; ?></li>
<?php if ($cerca_bib->rowCount()> 0) { ?>
	<li><strong>Altre biblioteche</strong></li>
<?php while ($biblio= $cerca_bib->fetch()) {?>
	<li><strong>Biblioteca:</strong> <?php echo $biblio['NOME']; ?></li><li><strong>Inizio:</strong> <?php echo $biblio['INI']; ?><br /><strong>Fine:</strong> <?php echo $biblio['FINE']; ?></li> 
<?php }} ?>

	<li><strong>Archivio:</strong> <?php echo $row['ARCHIVIO']; ?></li><li><strong>Repertorio:</strong> <?php echo $row['REPERTORIO']; ?></li>
	<li><strong>Fondo privato:</strong> <?php echo $row['FONDOPRIV']; ?></li><li><strong>Microfilm / Scansione:</strong> <?php echo $row['MICROFILM']; ?></li>
<?php  
} // chiude i dati presi dalla tabella ARCHIVIO 
if ($bibliog->rowCount() > 0) { ?>
<li><h2>Bibliografia</h2></li>

<?php while ($cerca_bibliog= $bibliog->fetch()) {?>
	<li><?php echo $cerca_bibliog['TEXT']; ?></li>
<?php }}

if($opere->rowCount() > 0){ ?>
<!--<li><h2>Opere collegate</h2></li>-->
<?php while ($cerca_opere=$opere->fetch()) {?>
	<!--<li><?php echo $cerca_opere['titolo']; ?></li>-->
<?php }}


if ($note_agg->rowCount() > 0) { ?>
	<li><h2>Note aggiuntive</h2></li>
<?php while ($cerca_note_agg=$note_agg->fetch()) {?>
	<li><?php echo stripslashes($cerca_note_agg['MEMO']); ?></li>
<?php }} 


?><li>

<?php while($row = $result3->fetch()) { ?>
	<p><img src="img/img<?php echo $row['ID']; ?>.jpg" height="400" /></p>
<?php } 
}?>
</li></ul>
</div>
