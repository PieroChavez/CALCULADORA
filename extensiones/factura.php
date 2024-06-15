<?php
date_default_timezone_set('America/Lima');

require_once "../controladores/presupuesto.controlador.php";
require_once "../modelos/presupuesto.modelo.php";

# Incluyendo librerias necesarias #
require "./code128.php";

function formatearPrecio($pres) {
	return number_format($pres, 2, '.', ',');
}

$idProyecto = isset($_GET['codigo']) ? $_GET['codigo'] : '';

$item = null;
$valor = null;
$presupuesto = ControladorPresupuesto::ctrVerPresupuesto($item, $valor);

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./logo/logo-house.png', 162, 16, 35, 18, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("P HOUSE E.I.R.L.")), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "RUC: 20010100001"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Direccion Lircay, Angaraes"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: 920468502"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email: correo@ejemplo.com"), 0, 0, 'L');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);

// Get the current date and time
$fecha_hora_actual = date('Y-m-d H:i:s');

// Cambiar el símbolo "-" por "/"
$fecha_hora_actual = str_replace('-', '/', $fecha_hora_actual);

// Format the current date and time to show AM or PM
$fecha_hora_actual = date('Y/m/d h:i:s A', strtotime($fecha_hora_actual));

$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", $fecha_hora_actual), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura N°. 000$idProyecto")), 0, 0, 'C');

$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", "Nombre del proyecto:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
foreach ($presupuesto as $key => $value) {
	if ($idProyecto == $value["id_proyecto"]) {
		$pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $value["nombre_proyecto"]), 0, 0, 'L');
	}
}



$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
foreach ($presupuesto as $key => $value) {
	if ($idProyecto == $value["id_proyecto"]) {
		$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $value["nombre_cliente"]), 0, 0, 'L');
	}
}
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "Tel:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
foreach ($presupuesto as $key => $value) {
	if ($idProyecto == $value["id_proyecto"]) {
		$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", $value["telefono_cliente"]), 0, 0, 'L');
	}
}

$pdf->SetTextColor(39, 39, 51);

$pdf->Cell(12, 7, iconv("UTF-8", "ISO-8859-1", "Correo:"), 0, 0, 'L');

$pdf->SetTextColor(97, 97, 97);
foreach ($presupuesto as $key => $value) {
	if ($idProyecto == $value["id_proyecto"]) {
		$pdf->Cell(50, 7, iconv("UTF-8", "ISO-8859-1", $value["correo_cliente"]), 0, 0, 'L'); // Modificado el valor de 60 a 50
	}
}

$pdf->SetTextColor(39, 39, 51);


$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(149, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
$pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);



/*---------- Detalles de la tabla ----------*/
foreach ($presupuesto as $key => $value) {
    if ($idProyecto == $value["id_proyecto"]) {
        // Función para formatear los precios

        $precioMateriales = formatearPrecio($value["suma_costo_total_materiales"]);
        $precioTrabajadores = formatearPrecio($value["suma_costo_total_trabajadores"]);
        $precioTerreno = formatearPrecio($value["suma_total_terreno"]);

        $pdf->Cell(149, 7, iconv("UTF-8", "ISO-8859-1", "Precio total de materiales"), 'L', 0, 0);
        $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "S/ " . $precioMateriales), 'LR', 0, 'C');
        $pdf->Ln(7);
        $pdf->Cell(149, 7, iconv("UTF-8", "ISO-8859-1", "Precio total de trabajadores"), 'L', 0, 0);
        $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "S/ " . $precioTrabajadores), 'LR', 0, 'C');
        $pdf->Ln(7);
        $pdf->Cell(149, 7, iconv("UTF-8", "ISO-8859-1", "Precio de terreno (metros cuadrados)"), 'L', 0, 0);
        $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "S/ " . $precioTerreno), 'LR', 0, 'C');
    }
}



$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/



$pdf->SetFont('Arial', 'B', 9);

# Impuestos & totales #
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');

// Función para separar números, convertir en float y formatear
function separarConvertirFormatear($cadena) {
    // Utilizar expresión regular para extraer solo los dígitos
    preg_match_all('/\d+/', $cadena, $coincidencias);

    // Obtener un solo número uniendo los dígitos encontrados
    $numero = implode('', $coincidencias[0]);

    // Convertir a número flotante y formatear
    return number_format(floatval($numero), 2, '.', ',');
}

// Uso de la función
foreach ($presupuesto as $key => $value) {
    if ($idProyecto == $value["id_proyecto"]) {
        // Obtener, convertir y formatear el número
        $costoParcialFormateado = separarConvertirFormatear($value["costo_parcial"]);

        // Mostrar el número formateado
        $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "S/ " . $costoParcialFormateado), 'T', 0, 'C');
    }
}



$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
foreach ($presupuesto as $key => $value) {
	if ($idProyecto == $value["id_proyecto"]) {
		$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "IVA ".$value["porcentaje_ganancia"]."%"), '', 0, 'C');
	}
}

$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ S/ 0.00"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');


$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
// Función para quitar los dos últimos caracteres, separar números y formatear
function quitarSepararFormatear($cadena) {
    // Quitar los dos últimos caracteres
    $cadenaSinUltimosDos = substr($cadena, 0, -2);

    // Utilizar expresión regular para extraer solo los dígitos
    preg_match_all('/\d+/', $cadenaSinUltimosDos, $coincidencias);

    // Obtener un solo número uniendo los dígitos encontrados
    $numero = implode('', $coincidencias[0]);

    // Devolver el número formateado
    return number_format(floatval($numero), 2, '.', ',');
}

// Uso de la función
foreach ($presupuesto as $key => $value) {
    if ($idProyecto == $value["id_proyecto"]) {
        // Obtener y formatear el número
        $costoFinalFormateado = quitarSepararFormatear($value["costo_final"]);

        // Mostrar el número formateado
        $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "S/ " . $costoFinalFormateado), 'T', 0, 'C');
    }
}





$pdf->Ln(30);

$pdf->SetFont('Arial', '', 9);

$pdf->SetTextColor(39, 39, 51);
$pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

$pdf->Ln(9);

# Codigo de barras #
$pdf->SetFillColor(39, 39, 51);
$pdf->SetDrawColor(23, 83, 201);
$pdf->Code128(72, $pdf->GetY(), "COD000001V0001", 70, 20);
$pdf->SetXY(12, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "COD000001V0001"), 0, 'C', false);

# Nombre del archivo PDF #
$pdf->Output("I", "Factura_Nro_000$idProyecto.pdf", true);
