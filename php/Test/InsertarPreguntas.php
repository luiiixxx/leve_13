<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');
require_once ("Conect.php");
$Table = mysql_real_escape_string($_GET['Test']);
$NumQuestion = $_GET['NumQuestion'];
$Question = mysql_real_escape_string($_GET['Question']);
$OpCorrect = mysql_real_escape_string($_GET['OpCorrect']);
$OpIncorrectA = mysql_real_escape_string($_GET['OpIncorrectA']);
$OpIncorrectB = mysql_real_escape_string($_GET['OpIncorrectB']);
$OpIncorrectC = mysql_real_escape_string($_GET['OpIncorrectC']);

$Inserter = mysql_query("INSERT INTO $Table(Question, OpCorrect, OpIncorrectA, OpIncorrectB, OpIncorrectC) VALUES ('$Question', '$OpCorrect', '$OpIncorrectA', '$OpIncorrectB', '$OpIncorrectC')");

if ($Inserter)   {
	
	$fontSize = 20; //Tamaño de la fuente
	$backgroundPath = "../Img/Imagen.png"; //Dirección dondé se encuentra la imagen inicial
	$font = "../Img/arial.ttf"; //La fuente a utilizar para el texto
	$text1 = $Question . ""; //El texto a mostrar
	$text2 = $OpCorrect . ""; //El texto a mostrar
	$text3 = $OpIncorrectA . ""; //El texto a mostrar
	$text4 = $OpIncorrectB . ""; //El texto a mostrar
	$text5 = $OpIncorrectC . ""; //El texto a mostrar
	$padding = 120; //Esta es la margen derecha e izquierda
	$im = imagecreatefrompng($backgroundPath); //Se crea la imagen
	$imageSize = getimagesize($backgroundPath); //Se obtiene las dimesiones de la imagen
	$width = $imageSize[0]; //Se obtiene el ancho de la imagen
	$height = $imageSize[1]; //Se obtiene la altura de la imagen
	$lp = 35; //Line height es la altura de la linea
	$colorBlack = imagecolorallocate($im, 0, 0, 0); //Color de la letra
	$colorWhite = imagecolorallocate($im, 255, 255, 255); //Color borde de la letra

	function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
	    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
	        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
	            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
	   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
	}

	function GetTextWidth($fontSize, $font, $text) {
	    $line_box = imagettfbbox ($fontSize, 0, $font, $text);
	    return ceil($line_box[0]+$line_box[2]); 
	}

	function GetTextHeight($fontSize, $font, $text) {
	    $line_box = imagettfbbox ($fontSize, 0, $font, $text);
	    return ceil($line_box[1]-$line_box[7]); 
	}

	function GetMaxTextHeight($fontSize, $font, $textArray) {
	    $maxHeight = 0;
	    for($i = 0; $i < count($textArray); $i++)
	    {       
	        $height = GetTextHeight($fontSize, $font, $textArray[$i]);
	        if($height > $maxHeight)
	            $maxHeight = $height;
	    }
	    return $maxHeight;
	}

	function GetTextRowsFromText($fontSize, $font, $text, $maxWidth) {   
	    $text = str_replace("\n", "\n ", $text);
	    $text = str_replace("\\n", "\n ", $text);
	    $words = explode(" ", $text);
	    $rows = array();
	    $tmpRow = "";
	    for($i = 0; $i < count($words); $i++) {
	        //last word
	        if($i == count($words) -1) {
	            $rows[] = $tmpRow.$words[$i];
	            break;
	        }
	        if(GetTextWidth($fontSize, $font, $tmpRow.$words[$i]) > $maxWidth) {
	            $rows[] = $tmpRow;
	            $tmpRow = "";
	        }
	        else if(StringEndsWith($tmpRow, "\n ")) {
	            $tmpRow = str_replace("\n ", "", $tmpRow);
	            $rows[] = $tmpRow;
	            $tmpRow = "";
	        }  
	        $tmpRow .= $words[$i]." ";
	    }
	    return $rows;
	}

	function StringEndsWith($haystack, $needle) {
	    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}
	$y = 80;
	$fS1 = 25;
		$textRows = GetTextRowsFromText($fS1, $font, $text1, $width - ($padding * 2));
		for($i = 0; $i < count($textRows); $i++) {
		    $line_box = imagettfbbox ($fS1, 0, $font, $textRows[$i]);
		    $text_width = GetTextWidth($fS1, $font, $textRows[$i]); 
		    $text_height = GetMaxTextHeight($fS1, $font, $textRows) * 3;
		    $position_center = ceil(($width - $text_width) / 2);
		    imagettfstroketext($im, $fS1, 0, $position_center, $y, $colorBlack, $colorWhite, $font, $textRows[$i], 2);
		    $y += $lp;
		}
	$y = 300;
		$textRows = GetTextRowsFromText($fontSize, $font, $text2, $width - ($padding * 2));
		for($i = 0; $i < count($textRows); $i++) {
		    $line_box = imagettfbbox ($fontSize, 0, $font, $textRows[$i]);
		    $text_width = GetTextWidth($fontSize, $font, $textRows[$i]); 
		    $text_height = GetMaxTextHeight($fontSize, $font, $textRows) * 3;
		    $position_center = ceil(($width - $text_width) / 2);
		    imagettfstroketext($im, $fontSize, 0, $position_center, $y, $colorBlack, $colorWhite, $font, $textRows[$i], 2);
		    $y += $lp;
		}
	$y = 400;
		$textRows = GetTextRowsFromText($fontSize, $font, $text3, $width - ($padding * 2));
		for($i = 0; $i < count($textRows); $i++) {
		    $line_box = imagettfbbox ($fontSize, 0, $font, $textRows[$i]);
		    $text_width = GetTextWidth($fontSize, $font, $textRows[$i]); 
		    $text_height = GetMaxTextHeight($fontSize, $font, $textRows) * 3;
		    $position_center = ceil(($width - $text_width) / 2);
		    imagettfstroketext($im, $fontSize, 0, $position_center, $y, $colorBlack, $colorWhite, $font, $textRows[$i], 2);
		    $y += $lp;
		}
	$y = 500;
		$textRows = GetTextRowsFromText($fontSize, $font, $text4, $width - ($padding * 2));
		for($i = 0; $i < count($textRows); $i++) {
		    $line_box = imagettfbbox ($fontSize, 0, $font, $textRows[$i]);
		    $text_width = GetTextWidth($fontSize, $font, $textRows[$i]); 
		    $text_height = GetMaxTextHeight($fontSize, $font, $textRows) * 3;
		    $position_center = ceil(($width - $text_width) / 2);
		    imagettfstroketext($im, $fontSize, 0, $position_center, $y, $colorBlack, $colorWhite, $font, $textRows[$i], 2);
		    $y += $lp;
		}
	$y = 600;
		$textRows = GetTextRowsFromText($fontSize, $font, $text5, $width - ($padding * 2));
		for($i = 0; $i < count($textRows); $i++) {
		    $line_box = imagettfbbox ($fontSize, 0, $font, $textRows[$i]);
		    $text_width = GetTextWidth($fontSize, $font, $textRows[$i]); 
		    $text_height = GetMaxTextHeight($fontSize, $font, $textRows) * 3;
		    $position_center = ceil(($width - $text_width) / 2);
		    imagettfstroketext($im, $fontSize, 0, $position_center, $y, $colorBlack, $colorWhite, $font, $textRows[$i], 2);
		    $y += $lp;
		}
	imagepng($im, "../Img/Tests/". $Table ."/Question". $NumQuestion .".png");
	imagedestroy($im);
}
else echo 'Error al Guardar';
?>
