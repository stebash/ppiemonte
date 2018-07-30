<?php
session_start(); 
if($_SESSION['username']=='admin') {
require_once ('header.php');
if ($_GET['i']=='per') { ?>
<h1>Inserisci una persona</h1>
<form method="POST" action ="insert.php" />
		<table>
		<tr><td>Inserisci il cognome e il nome:</td><td><input type="text" name="cognom" size="30" /></td></tr>
		<tr><td>Inserisci il  ruolo:</td><td><input type="text" name="ruolo" size="30" /></td></tr>
		<tr><td>Inserisci il numero del periodico di riferimento:</td><td><input type="text" name="scheda" size="30" /></td></tr>
		</table>
	<input type="hidden" name="t" value="pers" />
	<input type="submit" value="Crea" />
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

