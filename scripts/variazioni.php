<?php 

$variazionitit=$pdo->query("SELECT * FROM VARIA_TI WHERE SCHEDA='$id'"); // cerco le variazioni del titolo
$variazionisot=$pdo->query("SELECT * FROM VARIA_SO WHERE SCHEDA='$id'"); // cerco le variazioni del sottotitolo
$direttore=$pdo->query("SELECT * FROM VARIA_DI WHERE SCHEDA='$id'"); // cerco le variazioni del direttore
$editore=$pdo->query("SELECT * FROM VARIA_ED WHERE SCHEDA='$id'"); // cerco variazione di editore e luogo di edizione
$formato=$pdo->query("SELECT * FROM VARIA_FO WHERE SCHEDA='$id'"); // cerco variazioni di formato
$pagine=$pdo->query("SELECT* FROM VARIA_PA WHERE SCHEDA='$id'"); // variazioni del numero di pagine
$periodicita=$pdo->query("SELECT * FROM VARIA_PE AS v LEFT JOIN PERIOD AS p ON v.PERIODIC=p.CODICE WHERE SCHEDA='$id'"); // variazioni della frequenza
$prezzo=$pdo->query("SELECT * FROM VARIA_PR AS v LEFT JOIN MONETA AS m ON v.MONETA=m.CODICE WHERE SCHEDA='$id'"); // variazioni di prezzo
$tipografia=$pdo->query("SELECT * FROM VARIA_TP WHERE SCHEDA='$id'"); // variazioni di tipografia
$tiratura=$pdo->query("SELECT * FROM VARIA_TR WHERE SCHEDA='$id'"); // variazioni di tiratura

if($variazionitit->rowCount() > 0){ ?>
<li><h2>Variazioni titolo</h2></li>
<?php while ($cerca_variazionitit=$variazionitit->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_variazionitit['DATA_V']. $cerca_variazionitit['ANNO_V'];?></li>
	<li><strong>Titolo:</strong> <?php echo $cerca_variazionitit['TIT_1']. $cerca_variazionitit['TIT_2']; ?></li><br />
<?php }}


if($variazionisot->rowCount() > 0){ ?>
<li><h2>Variazioni sottotitolo</h2></li>
<?php while ($cerca_variazionisot=$variazionisot->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_variazionisot['DATA_V']. $cerca_variazionisot['ANNO_V'];?></li>
	<li><strong>Sottotitolo:</strong> <?php echo $cerca_variazionisot['SOT_1']. $cerca_variazionisot['SOT_2']. $cerca_variazionisot['SOT_3']; ?></li><br />
<?php }}

if($direttore->rowCount() > 0){ ?>
<li><h2>Variazioni direttore</h2></li>
<?php while ($cerca_direttore=$direttore->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_direttore['DATA_V']. $cerca_direttore['ANNO_V'];?></li>
	<li><strong>Direttore:</strong> <?php echo $cerca_direttore['DIR_1']. $cerca_direttore['DIR_2']. $cerca_direttore['DIR_3']; ?></li><br />
<?php }}

if($editore->rowCount() > 0){ ?>
<li><h2>Variazioni editore</h2></li>
<?php while ($cerca_editore=$editore->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_editore['DATA_V']. $cerca_editore['ANNO_V'];?></li>
	<li><strong>Editore:</strong> <?php echo $cerca_editore['EDITORE']; ?>
	<li><strong>Luogo di edizione:</strong> <?php echo $cerca_editore['LUOGEDIZ']; ?></li><br />
<?php }}

if($formato->rowCount() > 0){ ?>
<li><h2>Variazioni formato</h2></li>
<?php while ($cerca_formato=$formato->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_formato['DATA_V']. $cerca_formato['ANNO_V'];?></li>
	<li><strong>Altezza:</strong> <?php echo $cerca_formato['ALTEZZA']; ?>
	<li><strong>Base:</strong> <?php echo $cerca_formato['BASE']; ?></li><br />
<?php }}

if($pagine->rowCount() > 0){ ?>
<li><h2>Variazioni numero di pagine</h2></li>
<?php while ($cerca_pagine=$pagine->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_pagine['DATA_V']. $cerca_pagine['ANNO_V'];?></li>
	<li><strong>Pagine:</strong> <?php echo $cerca_pagine['PAGINE']; ?>
	<li><strong>Pagine arabe:</strong> <?php echo $cerca_pagine['PAGINE_A']; ?></li><br />
<?php }}

if($periodicita->rowCount() > 0){ ?>
<li><h2>Variazioni della frequenza di pubblicazione</h2></li>
<?php while ($cerca_periodicita=$periodicita->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_periodicita['DATA_V']. $cerca_periodicita['ANNO_V'];?></li>
	<li><strong>Frequenza:</strong> <?php echo $cerca_periodicita['pe.DESCRIZION']; ?><br />
<?php }}

if($prezzo->rowCount() > 0){ ?>
<li><h2>Variazioni del prezzo</h2></li>
<?php while ($cerca_prezzo=$prezzo->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_prezzo['DATA_V']. $cerca_prezzo['ANNO_V'];?></li>
	<li><strong>Prezzo:</strong> <?php echo $cerca_prezzo['PREZZO']; ?>
	<li><strong>Moneta:</strong> <?php echo $cerca_prezzo['m.DESCRIZION']; ?><br />
<?php }}

if($tipografia->rowCount() > 0){ ?>
<li><h2>Variazioni della tipografia</h2></li>
<?php while ($cerca_tipografia=$tipografia->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_tipografia['DATA_V']. $cerca_tipografia['ANNO_V'];?></li>
	<li><strong>Tipografo:</strong> <?php echo $cerca_tipografia['TIPOGRAFO']; ?>
	<li><strong>Luogo stampa:</strong> <?php echo $cerca_tipografia['LUOGSTAMPA']; ?><br />
<?php }}

if($tiratura->rowCount() > 0){ ?>
<li><h2>Variazioni della tiratura</h2></li>
<?php while ($cerca_tiratura=$tiratura->fetch()) {?>
	<li><strong>Data variazione: </strong> <?php echo $cerca_tiratura['DATA'];?></li>
	<li><strong>Tiratura:</strong> <?php echo $cerca_tiratura['TIRATURA']; ?><br />
<?php }}
