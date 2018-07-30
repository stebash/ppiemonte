<h1>Inserisci scheda Biografica</h1>
<form method="POST" action ="insert.php" />
	<table>
	<tr><td>Nome:</td><td><input type="text" name="PERS" /></td></tr>
	<tr><td>Dati biografici:</td><td><input type="text" name="RUO" /></td></tr>
	<tr><td>Rivista:</td><td><input type="text" name="codice" /></td></tr>	
	</table>
	<input type="hidden" name="t" value="bio" />
	<input type="submit" value="Crea" />
</form>
<a href="../admin">Torna alla pagina di Amministrazione</a>
