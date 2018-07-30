<html>
<head>
	<title>Periodici Piemonte</title>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"> 
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/menu.css" rel="stylesheet" type="text/css">
	</head>
<body>
<?php include ("scripts/dbpdo.php"); ?>

<div id="pagewrap">

	<header>
		<nav id="primary_nav_wrap">
			<?php require_once('scripts/menu.php'); ?>
</nav>
	</header>
	
	<section id="content">
		<?php require_once('scripts/contatore.php'); ?>
		<?php require_once('scripts/genere.php'); ?>
</section>
	<section id="middle">
	<?php 
	require_once('scripts/get_page.php');
	include $content; ?>
		
	</section>

	<aside id="sidebar">
		
<?php require_once('scripts/provincia.php'); ?>

	</aside>
		<?php require_once('html/footer.html'); ?>

</div>
<?php include_once("analyticstracking.php") ?>
</body>
</html>

