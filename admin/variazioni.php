<?php
include ("../scripts/dbpdo.php"); //mi collego al db
$cerca_periodo = $pdo->query("SELECT DISTINCT * FROM PERIOD");
$cerca_mon = $pdo->query("SELECT DISTINCT * FROM MONETA");

?>
<p>Clicca sul tipo di variazione che vuoi inserire</p>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<div class="buttons">

 
  <a class="showSingle" target="1">Titolo</a> -
  <a class="showSingle" target="2">Sottotitolo</a> -
  <a class="showSingle" target="3">Direttore</a> -
  <a class="showSingle" target="4">Editore e luogo di edizione</a> -
  <a class="showSingle" target="5">Formato</a> -
  <a class="showSingle" target="6">Numero di pagine</a> -
  <a class="showSingle" target="7">Frequenza</a> -
  <a class="showSingle" target="8">Prezzo</a> -
  <a class="showSingle" target="9">Tipografia</a> -
  <a class="showSingle" target="10">Tiratura</a>
</div>

<script type="text/javascript">
$( document ).ready(function() {
    jQuery('.targetDiv').hide();
});

</script>
<div id="div1" class="targetDiv">
<h4>Variazioni del Titolo</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci il primo titolo: <input type="text" name="tit_1"><br />
		Inserisci il secondo titolo: <input type="text" name="tit_2"></p>
		<input type="hidden" name="t" value="1">
		<input type="submit" value="Inserisci">
	</form>		
</div>
<div id="div2" class="targetDiv">
<h4>Variazioni del Sottotitolo</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci il primo sottotitolo: <input type="text" name="sot_1"><br />
		Inserisci il secondo sottotitolo: <input type="text" name="sot_2"><br />
		Inserisci il terzo sottotitolo: <input type="text" name="sot_3"></p>
		<input type="hidden" name="t" value="2">
		<input type="submit" value="Inserisci">
	</form>
</div>
<div id="div3" class="targetDiv">
<h4>Variazioni del Direttore</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci il primo direttore: <input type="text" name="dir_1"><br />
		Inserisci il secondo direttore: <input type="text" name="dir_2"><br />
		Inserisci il terzo direttore: <input type="text" name="dir_3"></p>
		<input type="hidden" name="t" value="3">
		<input type="submit" value="Inserisci">
	</form>
</div>
<div id="div4" class="targetDiv">
<h4>Variazioni dell'Editore e luogo di Edizione</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci l'editore: <input type="text" name="editore"><br />
		Inserisci il luogo di edizione: <input type="text" name="luogo_ediz"></p>
		<input type="hidden" name="t" value="4">
		<input type="submit" value="Inserisci">
	</form>	
</div>

<div id="div5" class="targetDiv">
<h4>Variazioni del Formato</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci l'altezza: <input type="text" name="altezza"><br />
		Inserisci la base: <input type="text" name="base"></p>
		<input type="hidden" name="t" value="5">
		<input type="submit" value="Inserisci">
	</form>	
</div>

<div id="div6" class="targetDiv">
<h4>Variazioni del Numero di pagine</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci il numero di pagine: <input type="text" name="pagine"><br />
		Inserisci il numero di pagine arabe: <input type="text" name="pagine_a"></p>
		<input type="hidden" name="t" value="6">
		<input type="submit" value="Inserisci">
	</form>	
</div>

<div id="div7" class="targetDiv">
<h4>Variazioni della frequenza di pubblicazione (Periodicità) </h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Seleziona la frequenza di pubblicazione: <select name="periodic">
									<?php while ($cperiodo = $cerca_periodo->fetch()) { ?>
									<option value="<?php echo $cperiodo['CODICE'];?>"><?php echo $cperiodo['pe.DESCRIZION'];?></option>
									<?php } ?>
									</select></p>
		<input type="hidden" name="t" value="7">
		<input type="submit" value="Inserisci">
	</form>	
</div>

<div id="div8" class="targetDiv">
<h4>Variazioni del Prezzo</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci prezzo: <input type="text" name="prezzo"><br />
		Seleziona la moneta: <select name="moneta">
								<?php while ($cmon = $cerca_mon->fetch()) { ?>
								<option value="<?php echo $cmon['m.DESCRIZION'];?>"><?php echo $cmon['m.DESCRIZION'];?></option>
								<?php } ?>
								</select></p>
		<input type="hidden" name="t" value="8">
		<input type="submit" value="Inserisci">
	</form>	
</div>

<div id="div9" class="targetDiv">
<h4>Variazioni della tipografia e del luogo di stampa</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci la tipografia: <input type="text" name="tipografia"><br />
		Inserisci il luogo di stampa: <input type="text" name="luogo_stampa"></p>
		<input type="hidden" name="t" value="9">
		<input type="submit" value="Inserisci">
	</form>	
</div>
<div id="div10" class="targetDiv">
<h4>Variazioni della tiratura di stampa</h4>
	<form method="POST" action="insert_var.php">
		<p>Inserisci il numero della scheda: <input type="text" name="s"><br />
		Inserisci mese e giorno della variazione: <input type="text" name="datav"><br />
		Inserisci l'anno della variazione: <input type="text" name="annov"><br />
		Inserisci la tiratura: <input type="text" name="tiratura"></p>
		<input type="hidden" name="t" value="9">
		<input type="submit" value="Inserisci">
	</form>	
</div>
    <script type="text/javascript">
        jQuery(function() {
   jQuery('.showSingle').click(function() {
    jQuery('.targetDiv').hide();
    jQuery('#div' + $(this).attr('target')).show();
  });
});
</script>