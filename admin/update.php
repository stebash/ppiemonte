<?php
session_start(); 
if($_SESSION['username']=='admin') {
//CAMPI DA VERIFICARE: VALUTA, estensione, lingua, provincia

require_once ('header.php');
include ("../scripts/dbpdo.php"); //mi collego al db
if ($_POST['t']=='bio') { //aggiorna biografia
$nome=addslashes(strip_tags($_POST['NOME']));
$bio=addslashes(strip_tags($_POST['BIO']));
$result="UPDATE PERSONA SET NOME='$nome', BIO='$bio' WHERE PID='$_POST[ID]'";
try {
		$stmt = $pdo->prepare($result);
$stmt->execute();
}
catch(PDOException $e)
    {
    echo $result . "<br>" . $e->getMessage();
    }
echo "<p align='center'>Biografia aggiornata con successo</p>";

}


else if ($_POST['t']=='bib') { //aggiorna bibliografia
$titolo=addslashes(strip_tags($_POST['TITOLO']));
$note=addslashes(strip_tags($_POST['NOTE']));
$result="UPDATE BIBLIO_EST SET TITOLO='$titolo', editore='$_POST[editore]', luogoEdiz='$_POST[luogoEdiz]', codTipologia='$_POST[tipologia]', annoEdiz='$_POST[annoEdiz]', NOTE='$note' WHERE codice='$_POST[ID]'";
try {
		$stmt = $pdo->prepare($result);
$stmt->execute();
}
catch(PDOException $e)
    {
    echo $result . "<br>" . $e->getMessage();
    }
echo "<p align='center'>Biografia aggiornata con successo</p>";

}

else if ($_POST['t']=='per') { //aggiorna periodici

require_once ('post_periodici.php');


try {
$aggiorna="UPDATE ARCHIVIO SET TITOLO='$titolo', 
										 SOTTOTIT_1='$sottoti1', 
										 SOTTOTIT_2='$sottoti2', 
										 SOTTOTIT_3='$sottoti3', 
										 ANNO_FOND='$anno_fond',
										 ANNO_CESS='$anno_cess',
										 RIF_PREC='$rif_prec',
										 RIF_SUCC='$rif_succ',
										 ALTEZZA='$altezza', 
										 BASE='$base', 
										 PAGINE='$pagine', 
										 PAGINE_ROM='$pagine_rom',
										 GENERE='$genere',
										 PERIODIC='$periodic',
										 PREZZO='$prezzo',
										 MONETA='$moneta',
										 TIRATURA='$tiratura',
										 NELLANNO='$anno',
										 ESTENSIONE='$estensione',
										 SUPPLEM='$supplem',
										 URL='$url',
										 INDICE='$indice',
										 EDITORE='$editore',
										 LUOGO_EDIZ='$luogo_ediz',
										 TIPOGRAFIA='$tipografia',
										 LUOGO_STAM='$luogo_stam',
										 CONTINUA='$continua',
										 INIPRI='$inipri',
										 FINEPRI='$finepri',
										 NOTE='$note',
									 	 ARCHIVIO='$archivio',
										 REPERTORIO='$repertorio',
										 FONDOPRIV='$fondopriv',
										 MICROFILM='$microfilm',
										 PROVINCIA='$provincia',
										 LINGUA='$lingua',
										 ESTENSIONE='$estensione',
										 BIBLIOPRI='$bibliopri'
									WHERE SCHEDA='$_POST[ID]'";
$stmt = $pdo->prepare($aggiorna);
$stmt->execute();
}
catch(PDOException $e)
    {
    echo $aggiorna . "<br>" . $e->getMessage();
    }
echo "<p align='center'>Scheda periodci aggiornata correttamente</p>";
	try {
$res_note_aggiuntive="UPDATE MEMO2003 SET MEMO='$noteagg' WHERE SCHEDA='$_POST[ID]'";
$stmt2 = $pdo->prepare($res_note_aggiuntive);
$stmt2->execute();									

}
catch(PDOException $e)
    {
    echo $res_note_aggiuntive . "<br>" . $e->getMessage();
}
echo "<p align='center'>Nota aggiuntiva aggiornata con successo</p>";
 } ?>
 <a href="index.php">Torna alla pagina di Amministrazione</a>

<?php require_once('../html/footer.html');
}else{ 
header("Location:scripts/messages.php?id=2"); 
} 
?>
 
