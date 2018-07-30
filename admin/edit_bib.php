<?php
session_start(); 
if($_SESSION['username']=='admin') { 
require_once ('header.php');
include ("../scripts/dbpdo.php"); //mi collego al db

$result = $pdo->query("SELECT * FROM BIBLIO_EST LEFT JOIN TIPOLOGIA ON BIBLIO_EST.codTipologia=TIPOLOGIA.CODICE WHERE BIBLIO_EST.codice = $_POST[s]");
if ($result->rowCount() ==0) {
echo 'Non ci sono schede bibliografiche con questo numero';
				  } 
else { ?>
<h1>Modifica scheda Bibliografica</h1>
<form method="POST" action ="update.php" />
<?php echo "<table>";

// keeps getting the next row until there are no more to get
while($row = $result->fetch()) {
	// Print out the contents of each row into a table?>
	<tr><td>Scheda</td><td><?php echo $_POST['s']; ?></td></tr>	
	<tr><td>Titolo:</td><td><input type="text" size="100" name="TITOLO" value="<?php echo $row['TITOLO'];?>" /></td></tr>
	<tr><td>Editore:</td><td><input type="text" size="100" name="editore" value="<?php echo $row['editore'];?>" /></td></tr>
	<tr><td>Luogo:</td><td><input type="text" size="100" name="luogoEdiz" value="<?php echo $row['luogoEdiz'];?>" /></td></tr>
	<tr><td>Tipologia:</td><td><select name="tipologia"> 
									   <option <?php if ($row['codTipologia']=='0') echo "selected"; ?> value="0">Monografia</option>
									   <option <?php if ($row['codTipologia']=='1') echo "selected"; ?> value="1">Opera collettiva</option>
									   <option <?php if ($row['codTipologia']=='2') echo "selected"; ?> value="2">Tesi</option>
									   <option <?php if ($row['codTipologia']=='3') echo "selected"; ?> value="3">Manoscritto</option>
									   <option <?php if ($row['codTipologia']=='4') echo "selected"; ?> value="4">Opuscolo</option>
									   <option <?php if ($row['codTipologia']=='5') echo "selected"; ?> value="5">Estratto</option>
									   <option <?php if ($row['codTipologia']=='6') echo "selected"; ?> value="6">Spoglio bibliografico</option>
									   <option <?php if ($row['codTipologia']=='7') echo "selected"; ?> value="7">Citazione bibliografica</option>
									   <option <?php if ($row['codTipologia']=='8') echo "selected"; ?> value="8">Altro</option>
									   <option <?php if ($row['codTipologia']=='9') echo "selected"; ?> value="9">Cataloghi, repertori, bibliografie</option>
									   <option <?php if ($row['codTipologia']=='10') echo "selected"; ?> value="10">Articoli e saggi</option>
								</select> </td></tr>
	<tr><td>Anno:</td><td><input type="text" size="6" name="annoEdiz" value="<?php echo $row['annoEdiz'];?>" /></td></tr>
	<tr><td>Note:</td><td><input type="text" size="100" name="NOTE" value="<?php echo $row['NOTE'];?>" /></td></tr>
<input type="hidden" name="codice" value="<?php echo $row['codTipologia']; ?>" />
								 <?php } 

echo "</table>";

?>

<input type="hidden" name="t" value="bib" />
<input type="hidden" name="ID" value="<?php echo $_POST['s']; ?>" />

<input type="submit" value="Modifica" />
</form>
<?php }// chiudo if  numrows mag zero
?>
<p><a href="index.php">Torna al menù di amministrazione</a>
 
<?php require_once('../html/footer.html');

}else{ 
header("Location:scripts/messages.php?id=2"); 
} 
?> 
