<?php

$elenco_moneta= mysql_query("SELECT * FROM MONETA ORDER BY DESCRIZION") or die(mysql_error());
$elenco_provincia= mysql_query("SELECT * FROM PROV ORDER BY NOMEPROV") or die(mysql_error());
$elenco_genere= mysql_query("SELECT * FROM GENERE ORDER BY DESC_BREVE") or die(mysql_error());
$elenco_lingua= mysql_query("SELECT * FROM LINGUA ORDER BY DESCRIZION") or die(mysql_error());
$elenco_estensione= mysql_query("SELECT * FROM ESTENS ORDER BY DESCRIZION") or die(mysql_error());
$elenco_periodicita= mysql_query("SELECT * FROM PERIOD ORDER BY DESCRIZION") or die(mysql_error());
$elenco_bibliopri= mysql_query("SELECT * FROM BIBLIOT ORDER BY NOME") or die(mysql_error());

$moneta= '<select name="moneta">'; //moneta
while($rs=mysql_fetch_array($elenco_moneta)){
      $moneta.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['MONETA']) $moneta.= 'selected';
		$moneta.=' >'.$rs['m.DESCRIZION'].'</option>';
  }
$moneta.='</select>';

$provincia= '<select name="provincia">'; //provincia
while($rs=mysql_fetch_array($elenco_provincia)){
      $provincia.='<option value="'.$rs['PROV'].'"';
	if ($rs['PROV']==$row['PROVINCIA']) $provincia.= 'selected';
		$provincia.=' >'.$rs['NOMEPROV'].'</option>';
  }
$provincia.='</select>';

$genere= '<select name="genere">'; //genere
while($rs=mysql_fetch_array($elenco_genere)){
      $genere.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['GENERE']) $genere.= 'selected';
		$genere.=' >'.$rs['DESC_BREVE'].'</option>';
  }
$genere.='</select>';

$lingua= '<select name="lingua">'; //lingua
while($rs=mysql_fetch_array($elenco_lingua)){
      $lingua.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['LINGUA']) $lingua.= 'selected';
		$lingua.=' >'.$rs['l.DESCRIZION'].'</option>';
  }
$lingua.='</select>';

$estensione= '<select name="estensione">'; //estensione
while($rs=mysql_fetch_array($elenco_estensione)){
      $estensione.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['ESTENSIONE']) $estensione.= 'selected';
		$estensione.=' >'.$rs['es.DESCRIZION'].'</option>';
  }
$estensione.='</select>';

$periodicita= '<select name="periodicita">'; //periodicita
while($rs=mysql_fetch_array($elenco_periodicita)){
      $periodicita.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['PERIODIC']) $periodicita.= 'selected';
		$periodicita.=' >'.$rs['pe.DESCRIZION'].'</option>';
  }
$periodicita.='</select>';


$bibliopri= '<select name="bibliopri">'; //biblioteca principale
while($rs=mysql_fetch_array($elenco_bibliopri)){
      $bibliopri.='<option value="'.$rs['CODICE'].'"';
	if ($rs['CODICE']==$row['BIBLIOPRI']) $bibliopri.= 'selected';
		$bibliopri.=' >'.$rs['NOME'].'</option>';
  }
$bibliopri.='</select>';
?>
