<?php
session_start(); 
if($_SESSION['username']=='admin') 

{ 

$scheda=$_POST['s'];
$tipo=$_POST['tipo'];
include ("../scripts/database.php"); //mi collego al db

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "application/zip")
|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
|| ($_FILES["file"]["type"] == "application/x-shockwave-flash"))
&& ($_FILES["file"]["size"] < 4000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
	{
	$ins_imm=mysql_query("INSERT INTO IMMAGINI SET scheda='$scheda', TIPO='$tipo'");
	$highest_id = mysql_result(mysql_query("SELECT MAX(id) FROM IMMAGINI"), 0);
	/*
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	*/
    if (file_exists("../img/" . $_FILES["file"]["name"]))
      {
	header("Location:messages.php?id=10");	  
      //echo $_FILES["file"]["name"] . "Upload non eseguito, file esistente. ";
      }
    else
      {
		$temp = explode(".", $_FILES["file"]["name"]);
		$new_name="img" . $highest_id . ".jpg";
		 
      move_uploaded_file($_FILES["file"]["tmp_name"], "../img/" . $new_name);
	  header("Location:messages.php?id=11");
	 // echo"File caricato correttamente";
	 // echo $new_name;
		

      }
    
  }
  }
else
{
	header("Location:messages.php?id=12");
 //echo "Invalid file";
   } ?>

   <p><a href="index.php">Torna indietro</a>
<?php }else{ 
header("Location:../scripts/messages.php?id=2"); 
} 
?> 