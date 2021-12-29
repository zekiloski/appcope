<?php

function puntos_cm ($medida, $resolucion=72)
{
   //// 2.54 cm / pulgada
   return ($medida/(2.54))*$resolucion;
}

include('class.ezpdf.php');
$pdf =& new Cezpdf('a4','Portrait');
$pdf->selectFont('fonts/Courier-Bold.afm');
//$pdf->ezText("<b>PDF con Imagenes en PHP</b>\n",20);
//$pdf->ezText("Ejemplo de inclusión de imagenes en pdf\n\n",12);

$pdf->ezImage("facturas/03-  32987.jpg", 0, 540, 540, 'rigth');

$pdf->ezStream();
?>

