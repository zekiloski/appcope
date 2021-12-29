<?php 
	session_start();
	include_once 'dbconnect.php';
	
if (isset($_SESSION['usr_id']))
    {
	// Si está logueado se realiza la acción


$id=$_GET["id"];
$usuario=$_SESSION['email'];
//Conexión a la base de datos 
$con = mysqli_connect("localhost","root","") or die (mysqli_error()); 
mysqli_select_db("factura", $con) or die (mysqli_error()); 

 
$_pagi_sql= "SELECT email, factura, entrega FROM users2 WHERE id='$id' and email='$usuario'";

//cantidad de resultados por página (opcional, por defecto 20) 
$_pagi_cuantos = 1; 

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("paginator.inc.php"); 
 
$row = mysqli_fetch_array($_pagi_result);

$factura = $row["factura"];
$entre = $row["entrega"];


// Le quito los espacios
$formateada = trim($factura);
$entrega = trim($entre);

//$formateada = trim($_SESSION['factura']);

$descarga = $formateada;
$rest = substr($descarga, 0, -4);
$filefinal = $rest .".pdf";
$extension = substr($descarga, -3);

// SI LA FACTURA ES UN JPG

if($extension!='pdf')
{

function puntos_cm ($medida, $resolucion=72)
{
   //// 2.54 cm / pulgada
   return ($medida/(2.54))*$resolucion;
}

include('class.ezpdf.php');
$pdf = new Cezpdf('a4','Portrait');
$pdf->selectFont('fonts/Courier-Bold.afm');
//$pdf->ezText("<b>PDF con Imagenes en PHP</b>\n",20);
//$pdf->ezText("Ejemplo de inclusión de imagenes en pdf\n\n",12);

$pdf->ezImage("facturas/$descarga", 0, 540, 540, 'rigth');

//$ezOutput = $pdf->ezStream(array("Content-Disposition"=>"factura.pdf"));
$ezOutput = $pdf->ezStream(array("Content-Disposition"=>$filefinal));
//$pdf->ezStream();

// FIN SI LA FACTURA ES UN JPG
}
else
{
// SI LA FACTURA ES UN PDF
$archivo = $descarga;
$directorio = "/home/cesopol/domains/factura.cesopol.com.ar/public_html/login2/2354568413698721354978212318756468754697898123/facturas/"; 
$archivo = $directorio.$archivo; 
header('Content-Disposition: attachment; filename="'.basename($archivo).'"'); 
readfile($archivo); 

}

mysqli_free_result($_pagi_sql);

    }
    else
    {
    header("Location: http://factura.cesopol.com.ar/login2");
    }
?>   


