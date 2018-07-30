<?php //mostra il contenuto principale della pagina

//voci progetto
if ($_GET['c']=='home') {$content= 'html/home.html';} 
else if ($_GET['c']=='origini') {$content='html/origini.html';}
else if ($_GET['c']=='collaboratori') {$content='html/collaboratori.html';}
else if ($_GET['c']=='come-partecipare') {$content='html/come-partecipare.html';}
else if ($_GET['c']=='notizie-eventi') {$content='html/notizie-eventi.html';}

//voci periodici
else if ($_GET['c']=='storia') {$content='html/storia.html';}
else if ($_GET['c']=='cronologia') {$content='html/cronologia.html';}
else if ($_GET['c']=='anno-fondazione') {$content='scripts/cerca.php';}

//voci bibliografie
else if 	($_GET['c']=='monografie' || 
			($_GET['c']=='opere-collettive' ||
			($_GET['c']=='tesi' ||
			($_GET['c']=='manoscritti') ||
			($_GET['c']=='opuscoli' ||
			($_GET['c']=='estratti' ||
			($_GET['c']=='spogli-bibliografici' ||
			($_GET['c']=='citazioni' ||
			($_GET['c']=='cataloghi-repertori' ||
			($_GET['c']=='articoli-saggi'))))))))) {$content='scripts/cerca.php';}


else if ($_GET['c']=='acronimi') {$content='html/acronimi.html';}
else if ($_GET['c']=='media') {$content='html/media.html';}

else if ($_GET['c']=='contatti') {$content='html/contatti.html';}

//barre laterali
else if ($_GET['c']=='genere' || ($_GET['c']=='provincia' || ($_GET['c']=='testate-in-vita' || ($_GET['c']=='biblioteca' || ($_GET['c']=='cerca-biblioteca'))))){$content="scripts/cerca.php";}
else if ($_GET['c']=='scheda') {$content="scripts/scheda.php";}
else if ($_GET['c']=='bibliografia') {$content="scripts/inc_bib.php";}
else if ($_GET['c']=='biografia') {$content="scripts/inc_bio.php";}

//pagine di ricerca
else if ($_GET['c']=='ricerca-periodico' || 
		($_GET['c']=='ricerca-bibliografie' || 
		($_GET['c']=='ricerca-biografie' ||
		($_GET['c']=='ricerca-anno-fondazione')))) {$content='scripts/form_ricerca.php';}

//form laterale dx x ricerca
else if ($_GET['c']=='cerca') {$content='scripts/cerca-stringa.php';}
else if ($_GET['c']=='persona') {$content='scripts/persona.php';}

//area riservata
else if ($_GET['c']=='login') {$content='admin/login.php';}
else if ($_GET['c']=='admin') {$content='admin/admin.php';}
else if ($_GET['c']=='logout') {$content='admin/logout.php';}
?>
