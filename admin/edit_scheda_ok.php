<?php

session_start(); 
if($_SESSION['username']=='admin') 

{ 
if (isset($_GET['s'])){ $id= $_GET['s']; }
else if (isset($_POST['s'])){ $id= $_POST['s']; }
require_once ('header.php');
include ("../scripts/dbpdo.php"); //mi collego al db
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

if ($result->rowCount() <=0) { echo '<strong>Attenzione</strong>:</strong> non ci sono schede con quel numero<br /><a href="index.php">Torna indietro</a>'; } else {

	$result2 = $pdo->query("SELECT DISTINCT * FROM NOTE WHERE SCHEDA = '$id'"); //cerco le note aggiuntive associate alla scheda (variazioni titolo)
	$result3 = $pdo->query("SELECT * FROM IMMAGINI WHERE SCHEDA = '$id'"); //cerco le immagini associate alla scheda
	$cerca_bib= $pdo->query("SELECT * FROM BIB_PER LEFT JOIN BIBLIOT ON BIB_PER.BIBLIO =  BIBLIOT.CODICE WHERE SCHEDA='$id'"); //cerca le biblioteche
	$note_agg=$pdo->query("SELECT * FROM MEMO2003 WHERE SCHEDA='$id'"); //cerca le note aggiuntive
	$cerca_per=$pdo->query("SELECT * FROM PERSONE WHERE codice='$id' && RUO !=' '"); //cerca i redattori
	$bibliog=$pdo->query("SELECT * FROM BIBLIOGR_copy WHERE SCHEDA='$id'"); //cerca bibliografia
	$opere=$pdo->query("SELECT * FROM opere WHERE id_periodico='$id'"); // cerca opere (riferimenti bibliografici)
	
	
	
?>	
<form name="edit_scheda" method="POST" action="update.php">
<?php while($row = $result->fetch()) { 
			$cerca_gen=$pdo->query("SELECT CODICE, DESC_BREVE FROM GENERE");
			$cerca_mon=$pdo->query("SELECT * FROM MONETA") ;
			$cerca_periodo=$pdo->query("SELECT * FROM PERIOD");
			$cerca_lingua=$pdo->query("SELECT * FROM LINGUA"); 
			$cerca_est=$pdo->query("SELECT * FROM ESTENS");
			$cerca_bibliopri=$pdo->query("SELECT * FROM BIBLIOT");
			//$cerca_areadiff=$pdo->query("SELECT DISTINCT AREADIFF FROM ARCHIVIO");
			?>
	<h1><?php echo $row['TITOLO']; ?></h1>
	<h3><?php echo $row['SOTTOTIT_1']. $row['SOTTOTIT_2']. $row['SOTTOTIT_3'];?></h3>
	<div id="scheda">
	<ul>
	<li><strong>Codice Scheda:</strong> <?php echo $id; ?></li>
	<li><strong>Titolo:</strong><input type="text" name="TITOLO" size="60" value="<?php echo $row['TITOLO']; ?>"></li>
	<li><strong>Sotto titolo 1:</strong><input type="text" size="100" name="SOTTOTIT_1" value="<?php echo stripslashes(strip_tags ($row['SOTTOTIT_1'])); ?>"></li>
	<li><strong>Sotto titolo 2:</strong><input type="text" size="100" name="SOTTOTIT_2" value="<?php echo stripslashes(strip_tags ($row['SOTTOTIT_2'])); ?>"></li>
	<li><strong>Sotto titolo 3:</strong><input type="text" size="100" name="SOTTOTIT_3" value="<?php echo stripslashes(strip_tags ($row['SOTTOTIT_3'])); ?>"></li>
	<li><strong>Anno di fondazione:</strong><input type="text" size="6" name="ANNO_FOND" value="<?php echo $row['ANNO_FOND']; ?>"></li>
	<li><strong>Anno di cessazione:</strong><input type="text" size="6" name="ANNO_CESS" value="<?php echo $row['ANNO_CESS']; ?>"></li>
	<li><strong>Scheda precedente:</strong><input type="text" size="6" name="RIF_PREC" value="<?php echo $row['RIF_PREC']; ?>"></li>
	<li><strong>Scheda successiva:</strong><input type="text" size="6" name="RIF_SUCC" value="<?php echo $row['RIF_SUCC']; ?>"></li>
	<li><strong>Altezza :</strong><input type="text" name="ALTEZZA" size="6" value="<?php echo $row['ALTEZZA'];?>"></li>
	<li><strong>Base:</strong><input type="text" name="BASE" size="6" value="<?php echo $row['BASE'];?>"></li>
	<li><strong>Pag. arabe:</strong><input type="text" name="PAGINE" size="6" value="<?php echo $row['PAGINE'];?>"></li>
	<li><strong>Da:</strong></li>
	<li><strong>A:</strong><input type="text" name="PAGINE_A" value="<?php echo $row['PAGINE_A'];?>"></li>
	<li><strong>Pag. romane:</strong><input type="text" name="PAGINE_ROM" value="<?php echo $row['PAGINE_ROM'];?>"></li>
	<li><strong>Genere:</strong><select name="GENERE">
								<?php while($cgen = $cerca_gen->fetch()) { ?>
								<option <?php if ($cgen['CODICE']==$row['GENERE']) { echo 'selected="selected"';}?> value="<?php echo $cgen['CODICE'];?>"><?php echo $cgen['DESC_BREVE'];?></option>
								<?php } ?>
								</select>
					
	</li>
	<li><strong>Altro genere:</strong></li>
	<li><strong>Periodicità:</strong><select name="PERIODIC">
									<?php while ($cperiodo = $cerca_periodo->fetch()) { ?>
									<option <?php if ($cperiodo['CODICE']==$row['PERIODIC']) { echo 'selected="selected"';}?> value="<?php echo $cperiodo['CODICE'];?>"><?php echo $cperiodo['pe.DESCRIZION'];?></option>
									<?php } ?>
									</select>
	</li>
	<li><strong>Prezzo:</strong><input type="text" name="PREZZO" value="<?php echo $row['PREZZO'];?>"></li>
	<li><strong>Moneta:</strong><select name="MONETA">
								<?php while ($cmon = $cerca_mon->fetch()) { ?>
								<option <?php if ($cmon['CODICE']==$row['MONETA']) {echo 'selected="selected"';}?>value="<?php echo $cmon['m.DESCRIZION'];?>"><?php echo $cmon['m.DESCRIZION'];?></option>
								<?php } ?>
								</select>
	</li>
	<li><strong>Tiratura:</strong><input type="text" name="TIRATURA" value="<?php echo $row['TIRATURA'];?>"></li>
	<li><strong>Nell'anno:</strong><input type="text" name="NELLANNO" value="<?php echo $row['NELLANNO'];?>"></li>
	<li><strong>Area di diffusione:</strong><select name="AREADIFF">
								<?php while ($a_diff=$cerca_est->fetch()) {?>
								<option <?php if ($a_diff['CODICE']==$row['AREADIFF']) {echo 'selected="selected"';}?>value="<?php echo $a_diff['CODICE'];?>"><?php echo $a_diff['es.DESCRIZION'];?></option>
								<?php } ?>
								</select>
	</li>
	<li><strong>Lingua:</strong><select name="LINGUA">
								<?php while($lingua = $cerca_lingua->fetch()) { ?>
								<option <?php if ($lingua['CODICE']==$row['LINGUA']) {echo 'selected="selected"';}?>value="<?php echo $lingua['CODICE'];?>"><?php echo $lingua['LDESCRIZION'];?></option>
								<?php } ?>
								</select>
	</li>
	<li><strong>Supplementi:</strong><input type="text" name="SUPPLEM" value="<?php echo $row['SUPPLEM'];?>"></li>
	<li><strong>Sito internet:</strong><input type="text" name="URL" size="100" value="<?php echo $row['URL'];?>"></li>
	<li><strong>Indice:</strong><input type="text" name="INDICE" size="1" value="<?php echo $row['INDICE'];?>"></li>
	<li><strong>Editore:</strong><input type="text" name="EDITORE" size="100" value="<?php echo stripslashes (strip_tags ($row['EDITORE']));?>"></li>
	<li><strong>Luogo di edizione:</strong><input type="text" name="LUOGO_EDIZ" size="100" value="<?php echo stripslashes (strip_tags ($row['LUOGO_EDIZ']));?>"></li>
	<li><strong>Provincia:</strong><input type="text" name="NOMEPROV" value="<?php echo $row['NOMEPROV']; ?>"></li><!-- HKJKJ -->
	<li><strong>Tipografia:</strong><input type="text" name="TIPOGRAFIA" size="100" value="<?php echo stripslashes(strip_tags ($row['TIPOGRAFIA']));?>"></li>
	<li><strong>Luogo di stampa:</strong><input type="text" name="LUOGO_STAM" size="100" value="<?php echo stripslashes (strip_tags ($row['LUOGO_STAM']));?>"></li>
	<li><strong>Continua :</strong><input type="text" name="CONTINUA" size="1" value="<?php echo $row['CONTINUA'];?>"></li>
<?php if ($cerca_per->rowCount()> 0) { ?>
<li><h2>Persone</h2></li>
<?php while ($redattore= $cerca_per->fetch()) {?>
<li><?php echo $redattore['RUO'] .": ". $redattore['PERS'];?></li>
<?php }} 
//	include ('variazioni.php');

?>
	<li><strong>Biblioteca principale:</strong><select name="BIBLIOPRI">
											   <?php while($bibliopri = $cerca_bibliopri->fetch()){?>
											   <option <?php if ($bibliopri['CODICE']==$row['BIBLIOPRI']) {echo 'selected="selected"';}?>value="<?php echo $bibliopri['CODICE'];?>"><?php echo $bibliopri['NOME'];?></option>
								<?php } ?>
								</select></li>
	<li><strong>Inizio:</strong><input type="text" name="INIPRI" value="<?php echo $row['INIPRI'];?>"></li>
	<li><strong>Fine:</strong><input type="text" name="FINEPRI" value="<?php echo $row['FINEPRI'];?>"></li>
	<li><strong>Note:</strong><input type="text" name="NOTE" value="<?php echo stripslashes($row['NOTE']);?>"></li>
<?php if ($cerca_bib->rowCount() > 0) { ?>
	<li><strong>Altre biblioteche</strong></li>
<?php while ($biblio= $cerca_bib->fetch()) {?>
	<li><strong>Biblioteca:</strong> <?php echo $biblio['NOME']; ?></li>
	<li><strong>Inizio:</strong> <?php echo $biblio['INI']; ?><br /><strong>Fine:</strong> <?php echo $biblio['FINE']; ?></li> 
<?php }} ?>

	<li><strong>Archivio:</strong><input type="text" name="ARCHIVIO" value="<?php echo $row['ARCHIVIO'];?>"></li>
	<li><strong>Repertorio:</strong><input type="text" name="REPERTORIO" value="<?php echo $row['REPERTORIO'];?>"></li>
	<li><strong>Fondo privato:</strong><input type="text" name="FONDOPRIV" value="<?php echo $row['FONDOPRIV'];?>"></li>
	<li><strong>Microfilm / Scansione:</strong><input type="text" name="MICROFILM" value="<?php echo $row['MICROFILM'];?>"></li>
<?php  
} // chiude i dati presi dalla tabella ARCHIVIO 
if ($bibliog->rowCount() > 0) { ?>
<li><h2>Bibliografia</h2></li>

<?php while ($cerca_bibliog= $bibliog->fetch()) {?>
	<li><?php echo $cerca_bibliog['TEXT']; ?></li>
<?php }}

if ($opere->rowCount() > 0){ ?>
<!--<li><h2>Opere collegate</h2></li>-->
<?php while ($cerca_opere=$opere->fetch()) {?>
	<!--<li><?php echo $cerca_opere['titolo']; ?></li>-->
<?php }}


if ($note_agg->rowCount() > 0) { ?>
	<li><h2>Note aggiuntive</h2></li>
<?php while ($cerca_note_agg = $note_agg->fetch()) {?>
	<li><textarea name="noteagg" row="3" cols="100"><?php echo stripslashes(strip_tags ($cerca_note_agg['MEMO'])); ?></textarea></li>
<?php }} 


?>

</ul>
<input type="hidden" name="t" value="per">
<input type="hidden" name="ID" value="<?php echo $id; ?>">
<input type="submit" value="Aggiorna">
</form>
<p><a href="index.php">Torna al menù di amministrazione</a>
</div>
<?php require_once('../html/footer.html');?>
<?php 
}
}else{ 
header("Location:scripts/messages.php?id=2"); 
} 
?> 