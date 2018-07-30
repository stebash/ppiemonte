<?php
session_start(); 
if($_SESSION['username']=='admin') 

{ 
include ("../scripts/dbpdo.php");
$s=$_POST['s'];


if ($_POST['t']=='bio') {
$cerca = $pdo->query("SELECT * FROM PERSONA WHERE PID='$s'");
if ($cerca->rowCount() >0) { 
$result = $pdo->prepare("DELETE FROM PERSONA WHERE PID=:s");
							} 
						}

else if ($_POST['t']=='bib') {
$cerca = $pdo->query("SELECT * FROM BIBLIO_EST WHERE codice='$s'");
if ($cerca->rowCount() >0) { 
$result = $pdo->prepare("DELETE FROM BIBLIO_EST WHERE codice=:s");
							} 
							 }

else if ($_POST['t']=='per') {
$cerca = $pdo->query("SELECT * FROM ARCHIVIO WHERE SCHEDA='$s'");
if ($cerca->rowCount() >0) { 
$result = $pdo->prepare("DELETE FROM ARCHIVIO WHERE SCHEDA=:s");
			  } else {header("Location:messages.php?id=4");} 
} 
if ($cerca->rowCount() >0) { 

//parte comune
$result->bindParam(':s', $_POST[s], PDO::PARAM_INT);
$result->execute();
header("Location:messages.php?id=3");
			}   
}
elseif ($cerca->rowCount()<=0) { 
header("Location:messages.php?id=4");
?>
<p><a href="../admin">Torna alla pagina di Amministrazione</a></p>

<?php }else{ 
header("Location:scripts/messages.php?id=2"); 
} 
?> 



