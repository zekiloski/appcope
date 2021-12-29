<?php 
	session_start();
	include_once 'dbconnect.php';
	
if (isset($_SESSION['usr_id']))
    {
	// Si está logueado se realiza la acción


$id=$_GET["id"];
$usuario=$_SESSION['email'];
//Conexión a la base de datos 
$con = mysql_connect("localhost","root ","") or die (mysql_error()); 
mysql_select_db("factura",$con) or die (mysql_error()); 

 
$_pagi_sql= "SELECT email, factura FROM users2 WHERE id='$id' and email='$usuario'";

//cantidad de resultados por página (opcional, por defecto 20) 
$_pagi_cuantos = 1; 

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("paginator.inc.php"); 
 
$row = mysql_fetch_array($_pagi_result);

$factura = $row["factura"];

// Le quito los espacios
$formateada = trim($factura);

//$formateada = trim($_SESSION['factura']);

$descarga = $formateada;

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

$pdf->ezImage("facturas/$descarga", 0, 540, 540, 'rigth');

$pdf->ezStream();

mysql_free_result($_pagi_sql);

    }
    else
    {
    header("Location: http://factura.cesopol.com.ar/login2");
    }
?>   


