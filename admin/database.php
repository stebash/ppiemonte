<?php
mysql_connect("89.46.111.36", "Sql1061224", "4328002f7x") or die(mysql_error());
mysql_select_db("Sql1061224_1") or die(mysql_error());
mysql_query("set names 'utf8'");
$connessione = new mysqli('89.46.111.36', 'Sql1061224', '4328002f7x', 'Sql1061224_1');
//echo "Connected to Database";
?>
