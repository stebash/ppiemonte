<?php 
session_start(); 
if(($_SESSION['username']=='admin')&&($_SESSION['password']))
{ ?>


<body><h1>Inserisci immagine</h1>
<?php
$scheda=$_POST['s'];
include ("database.php"); //mi collego al db
    // Configuration - Your Options
      $allowed_filetypes = array('.jpg'); // These will be the types of file that will pass the validation.
      $max_filesize = 524288; // Maximum filesize in BYTES (currently 0.5MB).
      $upload_path = '../img/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['file']['name']; // Get the name of the file (including file extension).
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
   
   // Check if the filetype is allowed, if not DIE and inform the user.
   //if(!in_array($ext,$allowed_filetypes)){
   //die('The file you attempted to upload is not allowed.'); }
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');

$ins_img="INSERT INTO IMMAGINI SET scheda = '$scheda'";
if (mysqli_query($connessione, $ins_img)) {
    $last_id = mysqli_query($connessione, "SELECT LAST_INSERT_ID()");
}
$filename="'img'.$last_id .'jpg'";
//  $filename='prova.jpg';
  // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path . $filename))
         echo '<p>File caricato correttamente, controlla il <a href="' . $upload_path . $filename . '" title="Your File">file che hai caricato</a></p>'; // It worked.
      else
         echo 'Errore durante il caricamento. Contatta il webmaster'; // It failed :(.
 



?>



<?php 
}else{ 
header("Location: ../login.php"); 
} 
?> 
