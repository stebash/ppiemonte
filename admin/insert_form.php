<?php
session_start(); 
if($_SESSION['username']=='admin') {
require_once ('header.php');
if ($_GET['i']=='bio')

{ 

?>
<h1>Inserisci scheda Biografica</h1>
<form method="POST" action ="insert.php" />
	<table>
	<tr><td>Nome:</td><td><input type="text" size="100" name="NOME" /></td></tr>
	<tr><td>Dati biografici:</td><td><input type="text" size="100" name="BIO" /></td></tr>
	</table>
	<input type="hidden" name="t" value="bio" />
	<input type="submit" value="Crea" />
</form>

<?php } 

else if ($_GET['i']=='bib') { ?>
<h1>Inserisci scheda Bibliografica</h1>
<form method="POST" action ="insert.php" />
	<table>
	<tr><td>Titolo:</td><td><input type="text" size="100" name="TITOLO" /></td></tr>
	<tr><td>Autore:</td><td><input type="text" size="100" name="autore" /></td></tr>
	<tr><td>Editore:</td><td><input type="text" size="100" name="editore" /></td></tr>
	<tr><td>Luogo:</td><td><input type="text" size="100" name="luogoEdiz" /></td></tr>
	<tr><td>Tipologia:</td><td><select name="codTipologia"> 
									   <option value="0">Monografia</option>
									   <option value="1">Opera collettiva</option>
									   <option value="2">Tesi</option>
									   <option value="3">Manoscritto</option>
									   <option value="4">Opuscolo</option>
									   <option value="5">Estratto</option>
									   <option value="6">Spoglio bibliografico</option>
									   <option value="7">Citazione bibliografica</option>
									   <option value="8">Altro</option>
									   <option value="9">Cataloghi, repertori, bibliografie</option>
									   <option value="10">Articoli e saggi</option>
								</select> </td></tr>
	<tr><td>Anno:</td><td><input type="text" size="6" name="annoEdiz" /></td></tr>
	<tr><td>Note:</td><td><input type="text" size="6" name="NOTE" /></td></tr>
	</table>
	<input type="hidden" name="t" value="bib">
	<input type="submit" value="Crea">
</form>

<?php } 



else if ($_GET['i']=='per') { ?>
<h1>Inserisci scheda Periodico</h1>
<form method="POST" action ="insert.php" />
	<?php include('insert_form_periodici.php');?>
	<input type="hidden" name="t" value="per" />
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

