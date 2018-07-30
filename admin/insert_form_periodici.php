<?php
include ("../scripts/dbpdo.php");
//estrazione province
$elenco_province= $pdo->query("SELECT * FROM PROV");
$elenco_period= $pdo->query("SELECT * FROM PERIOD");
$elenco_moneta= $pdo->query("SELECT * FROM MONETA");
$elenco_lingua= $pdo->query("SELECT * FROM LINGUA");
$elenco_biblio= $pdo->query("SELECT * FROM BIBLIOT");
$elenco_areadiff=$pdo->query("SELECT * FROM ESTENS");
$elenco_genere=$pdo->query("SELECT * FROM GENERE");

 while($ris = $elenco_province->fetch()) {
			@$province .= "<option value=\"".$ris['PROV']."\">".$ris['NOMEPROV']."</option>"; } 

while($ris = $elenco_period->fetch()) {
			@$period .= "<option value=\"".$ris['CODICE']."\">".$ris['pe.DESCRIZION']."</option>"; }


while($ris = $elenco_moneta->fetch()) {
			@$moneta .= "<option value=\"".$ris['CODICE']."\">".$ris['m.DESCRIZION']."</option>"; }

while($ris = $elenco_lingua->fetch()) {
			@$lingua .= "<option value=\"".$ris['CODICE']."\">".$ris['LDESCRIZION']."</option>"; }

while($ris = $elenco_biblio->fetch()) {
			@$bibliopri .= "<option value=\"".$ris['CODICE']."\">".$ris['NOME']."</option>"; } 

while($ris = $elenco_areadiff->fetch()) {
			@$areadiff .= "<option value=\"".$ris['CODICE']."\">".$ris['es.DESCRIZION']."</option>"; }
			
while($ris = $elenco_genere->fetch()) {
			@$genere .= "<option value=\"".$ris['CODICE']."\">".$ris['DESC_BREVE']."</option>"; }			
?>
<ul >
	<li><strong>Titolo:  <input type="text" size="60" name="TITOLO"></li>
	
	<li><strong>Sotto titolo 1:</strong><input type="text" size="100" name="SOTTOTIT_1"></li>
	<li><strong>Sotto titolo 2:</strong><input type="text" size="100" name="SOTTOTIT_2"></li>
	<li><strong>Sotto titolo 3:</strong><input type="text" size="100" name="SOTTOTIT_3"></li>
	<li><strong>Altezza:</strong><input type="text" size="6" name="ALTEZZA"></li>
	<li><strong>Base:</strong><input type="text" size="6" name="BASE"></li>
	<li><strong>Pag. arabe:</strong><input type="text" size="6" name="PAGINE"></li><!--<li>Da: </li>-->
	<!--<li><strong>A:</strong><input type="text" name="PAGINE_A" /></li>-->
	<li><strong>Pag. romane:</strong><input type="text" name="PAGINE_ROM"></li>
	<li><strong>Genere:</strong><select name="GENERE"><option value="0">Seleziona un genere</option><?php echo "$genere"; ?></select></li><!--<li>Altro genere: </li>-->
	<li><strong>Periodicit&agrave; : <select name="PERIODIC"><option value="0">Seleziona la periodicit&agrave;</option><?php echo "$period"; ?></select></li>
	<li><strong>Prezzo:</strong><input type="text" name="PREZZO" /></li>
	<li><strong>Moneta: <select name="MONETA"><option value="0">Seleziona la valuta</option><?php echo "$moneta"; ?></select></li>
	<li><strong>Tiratura:</strong><input type="text" name="TIRATURA"></li>
	<li><strong>Nell'anno:</strong><input type="text" name="NELLANNO"></li>
	<li><strong>Area di diffusione:<select name="ESTENSIONE"><option value="0">Seleziona l'area di diffusione</option><?php echo $areadiff; ?></select></li>
	<!--<li><strong>Estensione: <!--<?php //echo $estensione; ?>--></li>
	<li><strong>Lingua: <select name="LINGUA"><option value="0">Seleziona la lingua</option><?php echo "$lingua"; ?></select></li>
	<li><strong>Supplementi:</strong><input type="text" name="SUPPLEM"></li>
	<!--<li><strong>Supplemento di :</li>-->
	<li><strong>Sito internet:</strong><input type="text" name="URL"></li>
	<li><strong>Indice:</strong><input type="text" name="INDICE"></li>
	<li><strong>Editore:</strong><input type="text" name="EDITORE"></li>
	<li><strong>Luogo di edizione:</strong><input type="text" name="LUOGO_EDIZ"></li>
	<li><strong>Provincia: </strong><select name="PROVINCIA"><option value="0">Seleziona una provincia</option><?php echo "$province"; ?></select></li>
	<li><strong>Tipografia:</strong><input type="text" name="TIPOGRAFIA"></li>
	<li><strong>Luogo di stampa:</strong><input type="text" name="LUOGO_STAM"></li>
	<li><strong>Continua:</strong><input type="text" name="CONTINUA"></li>
	<li><strong>Anno di fondazione:</strong><input type="text" name="ANNO_FOND"></li>
	<li><strong>Anno di cessazione:</strong><input type="text" name="ANNO_CESS"></li>
	<li><strong>Biblioteca principale: <select name="BIBLIOPRI"><option value="0">Seleziona una biblioteca</option><?php echo "$bibliopri"; ?></select></li><li>Inizio:</strong><input type="text" name="INIPRI" /></li><li>Fine:</strong><input type="text" name="FINEPRI" /></li>
	<li><strong>Note:</strong><input type="text" name="NOTE"></li>
	<li><strong>Archivio:</strong><input type="text" name="ARCHIVIO"></li>
	<li><strong>Repertorio:</strong><input type="text" name="REPERTORIO"></li>
	<li><strong>Fondo privato:</strong><input type="text" name="FONDOPRIV"></li>
	<li><strong>Microfilm:</strong><input type="text" name="MICROFILM"></li>
	<li><strong>Note aggiuntive:</strong><textarea name="noteagg" rows="4" cols="50"></textarea></li>
</ul>
