<?php

$viivakoodi = $_GET['viivakoodi'];
//$viivakoodi = '242453534344';


    	require_once('class/BCGFontFile.php');
    	require_once('class/BCGColor.php');
    	require_once('class/BCGDrawing.php');

    	// Including the barcode technology
	require_once('class/BCGcode128.barcode.php');

	$font = new BCGFontFile('barcode/font/Arial.ttf', 18);
	$color_black = new BCGColor(0, 0, 0);
	$color_white = new BCGColor(255, 255, 255);

	// Barcode Part
        $code = new BCGcode128();
        $code->setScale(2); // Resolution
        $code->setThickness(30); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
	$code->parse($viivakoodi);

	// Drawing Part
	$drawing = new BCGDrawing('', $color_white);
	$drawing->setBarcode($code);
	$drawing->draw();
	
	//header('Content-Type: image/png');
	
	$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);

?>
