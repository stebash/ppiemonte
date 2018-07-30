<?php
include ("../scripts/dbpdo.php");
if ($_POST ['t']=='bio'){

$result =  $pdo->prepare("INSERT INTO PERSONA (NOME, BIO) VALUES (:NOME,:BIO)");
$result->BindParam(':NOME', $_POST[NOME], PDO::PARAM_STR);
$result->BindParam(':BIO', $_POST[BIO], PDO::PARAM_STR);
$result->execute();
	if ($result->rowCount() >0) {
	header("Location:messages.php?id=13");}
										
	else {header("Location:messages.php?id=5"); }
}


else if ($_POST ['t']=='pers'){
	
$result = $pdo->prepare("INSERT INTO PERSONE (codice, PERS, RUO) VALUES (:codice,:PERS,:RUO)");
$result->BindParam(':codice', $_POST[scheda], PDO::PARAM_STR);
$result->BindParam(':PERS', $_POST[cognom], PDO::PARAM_STR);
$result->BindParam(':RUO', $_POST[ruolo], PDO::PARAM_STR);
$result->execute();
	if ($result->rowCount() >0) {
	header("Location:messages.php?id=9");}
	
	else {header("Location:messages.php?id=5"); }
}

else if ($_POST ['t']=='bib'){

$result = $pdo->prepare("INSERT INTO BIBLIO_EST (TITOLO, editore, luogoEdiz, codTipologia, annoEdiz, NOTE) VALUES (:TITOLO,:editore,:luogoEdiz,:codTipologia,:annoEdiz,:NOTE)");
$result->BindParam(':TITOLO', $_POST[TITOLO],PDO::PARAM_STR);
$result->BindParam(':editore', $_POST[editore],PDO::PARAM_STR);
$result->BindParam(':luogoEdiz', $_POST[luogoEdiz],PDO::PARAM_STR);
$result->BindParam(':codTipologia', $_POST[codTipologia],PDO::PARAM_STR);
$result->BindParam(':annoEdiz', $_POST[annoEdiz],PDO::PARAM_STR);
$result->BindParam(':NOTE', $_POST[NOTE],PDO::PARAM_STR);
$result->execute();
 $last_id = $pdo->lastInsertId(); //recupero l'id dell'ultimo record inserito nella tabella BIBLIO_EST
$result2 = $pdo->prepare("INSERT INTO PERSONE (codice, PERS) VALUES (:codice,:PERS)");
$result2->BindParam(':codice', $last_id,PDO::PARAM_STR);
$result2->BindParam(':PERS', $_POST[autore],PDO::PARAM_STR);
$result2->execute();
	if (($result->rowCount() >0) && ($result2->rowCount() >0)){ header("Location:messages.php?id=7"); }
	else {header("Location:scripts/messages.php?id=5");} 

}
else if ($_POST ['t']=='per'){
require_once ('post_periodici.php');
$result = $pdo->prepare("INSERT INTO ARCHIVIO (TITOLO, 
				SOTTOTIT_1, 
				SOTTOTIT_2, 
				SOTTOTIT_3, 
				ALTEZZA, 
				BASE, 
				PAGINE, 
				PAGINE_ROM, 
				GENERE, 
				PERIODIC, 
				PREZZO, 
				MONETA,
				TIRATURA, 
				NELLANNO,
				ESTENSIONE,
				LINGUA,
				SUPPLEM,
				URL,
				INDICE, 
				EDITORE, 
				LUOGO_EDIZ, 
				TIPOGRAFIA, 
				LUOGO_STAM, 
				CONTINUA, 
				ANNO_FOND,
				ANNO_CESS,
				INIPRI,
				FINEPRI,
				BIBLIOPRI,
				NOTE, 
				REPERTORIO, 
				ARCHIVIO, 
				FONDOPRIV, 
				MICROFILM, 
				PROVINCIA) 
VALUES (	
				'$titolo',
				'$sottoti1', 
				'$sottoti2',
				'$sottoti3',
				'$altezza', 
				'$base', 
				'$pagine', 
				'$pagine_rom', 
				'$genere', 
				'$periodic',
				'$prezzo',
				'$moneta',
				'$tiratura',
				'$anno',
				'$estensione',
				'$lingua',
				'$supplem', 
				'$url', 
				'$indice', 
				'$editore', 
				'$luogo_ediz', 
				'$tipografia', 
				'$luogo_stam', 
				'$continua', 
				'$anno_fond', 
				'$anno_cess', 
				'$inipri', 
				'$finepri', 
				'$bibliopri', 
				'$note', 
				'$repertorio', 
				'$archivio', 
				'$fondopriv', 
				'$microfilm', 
				'$provincia')");
	$result->execute();
	$n_scheda = $pdo->lastInsertId();
		//inserisco la nota
	if (!empty($_POST[noteagg])){
		$noteagg=addslashes(strip_tags($_POST[noteagg]));
		$res_note_aggiuntive=$pdo->prepare("INSERT INTO MEMO2003 SET SCHEDA = '$n_scheda', MEMO = '$noteagg'");
		$res_note_aggiuntive->execute();
	}

	$result->execute();
	if ($result->rowCount() >0) {	
	header("Location:messages.php?id=8");}
	if (!empty($_POST[noteagg]) && $res_note_aggiuntive->rowCount() <1) {	
	header("Location:messages.php?id=5");}
} ?>