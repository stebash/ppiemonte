<?php
/*
$root = '';
$path = 'img/';

function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    $num = array_rand($ar);
    return $ar[$num];
}

$imgList = getImagesFromDir($root . $path);
$img = getRandomFromArray($imgList);
*/
?>

<!--<div id="rm-image">
<h1>Immagini</h1>
<img src="<?php echo $path . $img ?>" width="200" alt="" />
</div> -->

<?php require_once ("html/cerca.html"); ?>

<h1>Biblioteche</h1>

<ul>
<li><a href="index.php?c=biblioteca&v=3&d=Alessandria">Provincia Alessandria</a></li>
<li><a href="index.php?c=biblioteca&v=9&d=Aosta">Provincia Aosta</a></li>
<li><a href="index.php?c=biblioteca&v=2&d=Asti">Provincia Asti</a></li>
<li><a href="index.php?c=biblioteca&v=4&d=Biella">Provincia Biella</a></li>
<li><a href="index.php?c=biblioteca&v=5&d=Cuneo">Provincia Cuneo</a></li>
<li><a href="index.php?c=biblioteca&v=6&d=Novara">Provincia Novara</a></li>
<li><a href="index.php?c=biblioteca&v=1&d=Torino">Provincia Torino</a></li>
<li><a href="index.php?c=biblioteca&v=7&d=Verbania">Provincia Verbania</a></li>
<li><a href="index.php?c=biblioteca&v=8&d=Vercelli">Provincia Vercelli</a></li>

</ul>

<h1>Cerca per provincia</h1>

<ul>
<li><a href="index.php?c=provincia&v=AL&d=Alessandria">Provincia Alessandria</a></li>
<li><a href="index.php?c=provincia&v=AO&d=Aosta">Provincia Aosta</a></li>
<li><a href="index.php?c=provincia&v=AT&d=Asti">Provincia Asti</a></li>
<li><a href="index.php?c=provincia&v=BI&d=Biella">Provincia Biella</a></li>
<li><a href="index.php?c=provincia&v=CN&d=Cuneo">Provincia Cuneo</a></li>
<li><a href="index.php?c=provincia&v=NO&d=Novara">Provincia Novara</a></li>
<li><a href="index.php?c=provincia&v=TO&d=Torino">Provincia Torino</a></li>
<li><a href="index.php?c=provincia&v=TO&d=Verbania">Provincia Verbania</a></li>
<li><a href="index.php?c=provincia&v=VC&d=Vercelli">Provincia Vercelli</a></li>

</ul>




		

		

		

		

		

		


		
		

