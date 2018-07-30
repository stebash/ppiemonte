<?php
session_start(); 
if($_SESSION['username']=='admin') {
require_once ('header.php');
include ("../scripts/dbpdo.php"); //mi collego al db
if (isset($_POST['s'])) {$s=$_POST['s']; }
$result = $pdo->query("SELECT * FROM PERSONA WHERE PID = $s ");
if ($result->rowCount() ==0) { 
echo 'Non ci sono schede con questo numero';
				  } 
elseif ($result->rowCount() >0) { ?>
<h1>Modifica scheda Biografica</h1>
<form method="POST" action ="update.php" />
<?php echo "<table>";

// keeps getting the next row until there are no more to get
while($row = $result->fetch()) {
	// Print out the contents of each row into a table?>
	<tr><td>Scheda</td><td><?php echo $row['PID']; ?></td></tr>	
	<tr><td>Nome:</td><td><input type="text" name="NOME" value="<?php echo $row['NOME'];?>" /></td></tr>
	<tr><td>Dati biografici:</td><td><textarea name="BIO" rows="4" cols="50"><?php echo $row['BIO'];?> </textarea></td></tr>
	 <?php } 

echo "</table>";

?>

<input type="hidden" name="t" value="bio" />
<input type="hidden" name="ID" value="<?php echo $_POST['s']; ?>" />
<input type="submit" value="Modifica" />
</form>
<?php } ?>
<p><a href="index.php">Torna al menù di amministrazione</a>
 
<?php require_once('../html/footer.html');?>

		</div>
</body>
</html>
<?php }else{ 
header("Location:messages.php?id=2"); 
} 
	
