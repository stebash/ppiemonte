<?php
if (isset($_POST['s'])) {$s=$_POST['s']; }
else if (isset($_GET['s'])) {$s=$_GET['s']; }
$result = $pdo->query("SELECT * FROM PERSONA AS p LEFT JOIN IMMAGINI AS i ON p.PID=i.SCHEDA WHERE p.PID = $s LIMIT 1");
if ($result->rowCount()==0) { 
echo 'Non ci sono biografie con questo numero';
				  } 
else { 

 while($row = $result->fetch()) { 
 $tipo=$row['TIPO'];
$filename='../img/img'.$row['ID'] .'.jpg';
if ($tipo=='B') { 
?>
<p align="right"><img src="<?php echo $filename; ?>" width="150"/></p>
<?php  } ?> 
<ul>


	<li><strong>Scheda</strong>: <?php echo $s; ?></li>
	<li><strong>Nome</strong>: <?php echo $row['NOME']; ?></li>
	<li><strong>Dati biografici</strong>: <?php echo $row['BIO'];?></li>
	
								 <?php } 

echo "</ul>";

				}
?>
