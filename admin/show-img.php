<?php

session_start(); 
if($_SESSION['username']=='admin') {
require_once('database.php');
$result = mysql_query("SELECT * FROM IMMAGINI WHERE SCHEDA = $_POST[s]") or die(mysql_error());

$num_rows = mysql_num_rows($result);
if ($num_rows==0) { 
echo 'Non ci sono schede con questo numero';
				  } 
elseif ($num_rows>0) { ?>

<h1>Cancella immagini relativa alla scheda N <?php echo $_POST['s']; ?></h1>

<form method="POST" action ="delete.php" />
<tr><td>
<?php
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) { ?>

<img src="../img/img<?php echo $row['ID']; ?>.jpg" height="200" /></td>
<td><form method="POST" action="delete.php">
<?php echo $row['ID']; ?>
	<input type="hidden" name="id" value="<?php echo $row['ID']; ?>" />
	<input type="hidden" name="t" value="img" />
	<input type="submit" value="Cancella">
	</form>
<?php } 
}?>
</td></tr>

</table>


</form>
<a href="../admin">Torna alla pagina di Amministrazione</a>

<p><a href="logout">Esci</a>
<?php }else{ 
header("Location:scripts/messages.php?id=2"); 
} 
?> 
