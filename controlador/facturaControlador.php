<?php
function convertirMonedaPeruana($monto)
{
    // Separar la parte entera y la parte decimal
    $parte_entera = intval($monto); // Parte entera del monto
    $parte_decimal = round(($monto - $parte_entera) * 100); // Parte decimal del monto

    // Definir los nombres de las unidades, decenas y centenas en arrays
    $unidades = array(0 => "CERO", 1 => "UNO", 2 => "DOS", 3 => "TRES", 4 => "CUATRO", 5 => "CINCO", 6 => "SEIS", 7 => "SIETE", 8 => "OCHO", 9 => "NUEVE");
    $decenas = array(20 => "VEINTE", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA");
    $decenas_especiales = array(11 => "ONCE", 12 => "DOCE", 13 => "TRECE", 14 => "CATORCE", 15 => "QUINCE", 16 => "DIECISÉIS", 17 => "DIECISIETE", 18 => "DIECIOCHO", 19 => "DIECINUEVE", 21 => "VEINTIUNO", 22 => "VEINTIDÓS", 23 => "VEINTITRÉS", 24 => "VEINTICUATRO", 25 => "VEINTICINCO", 26 => "VEINTISÉIS", 27 => "VEINTISIETE", 28 => "VEINTIOCHO", 29 => "VEINTINUEVE");
    $centenas = array(100 => "CIEN", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS");

    // Inicializar la cadena de texto que almacenará la representación en palabras del monto
    $texto = '';

    // Convertir la parte entera a palabras
    if ($parte_entera >= 1000) {
        $mil = floor($parte_entera / 1000); // Extraer los miles
        if ($mil == 1) {
            $texto .= "MIL "; // Si son mil, añadir "MIL"
        } else {
            $texto .= convertirMonedaPeruana($mil) . " MIL "; // Si son más de mil, convertir la parte de los miles y añadir "MIL"
        }
        $parte_entera %= 1000; // Quitar los miles de la parte entera
    }

    // Convertir la parte entera a palabras
    if ($parte_entera >= 100) {
        if ($parte_entera == 100) {
            $texto .= "CIEN "; // Si es cien, añadir "CIEN"
            $parte_entera %= 100; // Quitar los cientos de la parte entera
        } elseif ($parte_entera < 200) {
            $texto .= "CIENTO "; // Si es entre 100 y 199, añadir "CIENTO"
            $parte_entera %= 100; // Quitar los cientos de la parte entera
        } else {
            $texto .= $centenas[$parte_entera - $parte_entera % 100] . " "; // Si son más de 200, convertir la parte de los cientos
            $parte_entera %= 100; // Quitar los cientos de la parte entera
        }
    }

    // Convertir la parte entera a palabras (decenas)
    if ($parte_entera >= 30) {
        $texto .= $decenas[$parte_entera - $parte_entera % 10] . " Y "; // Convertir las decenas mayores a 30
        $parte_entera %= 10; // Quitar las decenas de la parte entera
    } elseif ($parte_entera >= 20) {
        $texto .= $decenas_especiales[$parte_entera] . " "; // Convertir las decenas especiales (del 20 al 29)
        $parte_entera = 0; // Reiniciar la parte entera a cero
    } elseif ($parte_entera >= 10) {
        $texto .= $decenas_especiales[$parte_entera] . " "; // Convertir las decenas especiales (del 10 al 19)
        $parte_entera = 0; // Reiniciar la parte entera a cero
    }

    // Convertir la parte entera a palabras (unidades)
    if ($parte_entera > 0) {
        $texto .= $unidades[$parte_entera] . " "; // Convertir las unidades
    }

    // Convertir la parte decimal a palabras si existe
    if ($parte_decimal > 0) {
        $texto .= "CON $parte_decimal/100 "; // Añadir la parte decimal si existe
    }
    $texto .= "SOLES";
    return $texto; // Devolver el texto generado
}
require_once('../assets/plugin/tcpdf/examples/lang/spa.php');
require_once('../assets/plugin/tcpdf/tcpdf.php');

class MYPDF extends TCPDF
{
    public function Header()
    {
        // Obtener los datos del cuerpo de la solicitud POST
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);
        $fechaEmision = $data['fechaEmision'];
        $fecha_formateada_emsion = date('d/m/Y', strtotime($fechaEmision));
        $fechaVencimiento = $data['fechaVencimiento'];
        $fecha_formateada_vencimiento = date('d/m/Y', strtotime($fechaVencimiento));
        $razonSocial = $data['razonSocial'];
        $direccion = $data['direccion'];
        $tipoMoneda = $data['tipoMoneda'];
        $observaciones = $data['observaciones'];
        $metodo = $data['metodo'];
        $ruc = $data['ruc'];
        $numeroFactura = $data['numeroFactura'];

        //LOGO DE LA TIENDA
        $this->setJPEGQuality(90);
        $this->Image(
            '../assets/img/logo_titan1.png',
            10,
            10,
            45,
            20,
            'PNG',
            'https://titan.com/'
        );

        $this->SetFont('helvetica', 'B', 11);
        // DATOS DE LA EMPRESA
        $this->SetXY(10, 30);
        $this->Cell(30, 10, 'CONSTRU TIENDA S.A.C.', 0, false);
        $this->SetXY(10, 35);
        $this->SetFont('helvetica', '', 9);
        $this->Cell(30, 10, 'JR. BOLIVAR # 495', 0, false);
        $this->SetXY(10, 40);
        $this->Cell(30, 10, 'HUÁNUCO - HUÁNUCO - HUÁNUCO', 0, false);
        //Linea de la tabla
        $this->Line(10, 47, 200, 47);

        // Cuadro alrededor de los datos
        $this->SetXY(120, 12);
        $this->Cell(80, 21, '', 1, false, 'C');
        // RUC y número de factura
        $this->SetXY(120, 15);
        $this->Cell(80, 5, 'RUC: 10321021024', 0, false, 'C');
        $this->SetXY(130, 20);
        $this->Cell(60, 5, 'FACTURA ELECTRONICA ', 0, false, 'C');
        $this->SetXY(120, 25);
        $this->Cell(80, 5, ' F001-N° ' . $numeroFactura, 0, false, 'C');

        // DATOS DEL CLIENTE
        $this->SetFont('helvetica', '', 10);
        $this->SetXY(10, 45);
        $this->Cell(50, 10, 'Fecha de Vencimiento: ' . $fecha_formateada_vencimiento, 0, false);
        $this->SetXY(170, 45);
        $this->Cell(30, 10, 'Forma de pago: ' . $metodo, 0, false, 'R');
        $this->SetXY(10, 50);
        $this->Cell(30, 10, 'Fecha de Emisión: ' . $fecha_formateada_emsion, 0, false);
        $this->SetXY(10, 55);
        $this->Cell(30, 10, 'Señor(es): ' . $razonSocial, 0, false);
        $this->SetXY(10, 60);
        $this->Cell(30, 10, 'RUC: ' . $ruc, 0, false);
        $this->SetXY(10, 65);
        $this->Cell(30, 10, 'Dirección del Cliente: ' . $direccion, 0, false);
        $this->SetXY(10, 70);
        $this->Cell(30, 10, 'Tipo de moneda: ' . $tipoMoneda, 0, false);
        $this->SetXY(10, 75);
        $this->Cell(30, 10, 'Observaciones: ' . $observaciones, 0, false);
        //Linea de la tabla
        $this->Line(10, 83, 200, 83);

        //Encabezado de la tabla
        $this->SetFont('helvetica', 'B', 11);
        $this->SetXY(10, 80);
        $this->Cell(15, 10, 'Item', 0, false, 'C');
        $this->SetXY(30, 80);
        $this->Cell(65, 10, 'Descripción', 0, false, 'C');
        $this->SetXY(95, 80);
        $this->Cell(20, 10, 'cant', 0, false, 'C');
        $this->SetXY(115, 80);
        $this->Cell(20, 10, 'P. unit', 0, false, 'C');
        $this->SetXY(135, 80);
        $this->Cell(20, 10, 'Venta', 0, false, 'C');
        $this->SetXY(155, 80);
        $this->Cell(20, 10, 'Dscto total', 0, false, 'C');
        $this->SetXY(175, 80);
        $this->Cell(20, 10, 'Total', 0, false, 'C');
        //Linea de la tabla
        $this->Line(10, 88, 200, 88);
    }


    public function CreateTextBox($textval, $x = 0, $y = 0, $width = 0, $height = 10, $fontsize = 8, $fontstyle = '', $align = 'L')
    {
        $this->SetXY($x + 20, $y); // 20 = margin left
        $this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
        $this->Cell($width, $height, $textval, 0, false, $align);
    }
}

$pdf = new MYPDF(
    'P', // Orientación de la página (P para vertical, L para horizontal)
    'mm', // Unidad de medida (milímetros)
    'A4', // Tamaño del papel
    true, // Lienzo en color
    'UTF-8', // Codificación de caracteres
    false // Modo de sombreado falso
);

// TITULO AL DOCUMENTO PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('PROFORMA');

//RECEPCION DE LOS PRODUCTOS
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);
$productosJSON = $data['productos'];
$productos = json_decode($productosJSON, true);

// $productos = [];
// for ($i = 1; $i <= 69; $i++) {
//     $producto = [
//         'nombre' => 'Producto ' . $i,
//         'cantidad' => 1,
//         'precio' => 10,
//     ];
//     $productos[] = $producto;
// }



//Inicializamos variables para el contador y el total
$subtotal = 0;
$contador = 1;
$totalNeto = 0;
$total = 0;
$impuesto = 0.18;
$inicio = 0;
$fin = 0;
//SE OBTIENE LOS GRUPOS DE PRODUCTOS PARA CADA PAGINA
$numGrupos = floor(count($productos) / 36) + (count($productos) % 36 == 0 ? 0 : 1);

for ($grupo = 0; $grupo < $numGrupos - 1; $grupo++) {
    // Imprimir los productos del grupo actual en una nueva página
    $pdf->AddPage();
    $currY = 88;

    // Calcular el índice de inicio y fin del grupo actual
    $inicio = $grupo * 36;
    $contador = $inicio + 1;
    $fin = min($inicio + 36, count($productos)); // Corregir este cálculo

    // Imprimir los productos del grupo actual
    foreach (array_slice($productos, $inicio, $fin - $inicio) as $item) {
        $descripcion = $item['nombre'];
        $cantidad = $item['cantidad'];
        $precio = $item['precio'];
        $precio_venta = $item['precio'];
        $descuento = 0.00;
        $subtotal = $cantidad * $precio;
        // $item es un array asociativo con la clave 'producto_nombre'
        $pdf->CreateTextBox($contador, -5, $currY, 15, 10, 10, 8, 'C'); // Cantidad (vacio en este caso)
        $pdf->CreateTextBox($descripcion, 10, $currY, 60, 10, 8, 'L'); // Nombre del producto
        $pdf->CreateTextBox($cantidad, 75, $currY, 20, 10, 10, 8, 'C'); // Precio (en blanco en este caso)
        $pdf->CreateTextBox($precio, 95, $currY, 20, 10, 10, 8, 'C'); // Monto (en blanco en este caso)
        $pdf->CreateTextBox($precio_venta, 115, $currY, 20, 10, 10, 8, 'C');
        $pdf->CreateTextBox($descuento, 135, $currY, 20, 10, 10, 8, 'C');
        $pdf->CreateTextBox($subtotal, 155, $currY, 20, 10, 10, 8, 'C');
        $currY += 5;
        $contador++;
        $subtotal = $precio * $cantidad;
        $totalNeto += $subtotal;
    }
}
$cont = count($productos);
$rest = ($cont - $fin);
//Imprimir elementos restantes
if ($inicio < $cont) {

    if ($rest <= 32) {
        // Imprimir los productos restantes junto con las políticas en una nueva página
        $pdf->AddPage();
        $currY = 88;
        $contador = $fin + 1;
        $inicio = $fin;
        $fin = count($productos);

        // Imprimir los productos restantes del último grupo
        foreach (array_slice($productos, $inicio, $fin - $inicio) as $item) {
            $descripcion = $item['nombre'];
            $cantidad = $item['cantidad'];
            $precio = $item['precio'];
            $precio_venta = $item['precio'];
            $descuento = 0.00;
            $subtotal = $cantidad * $precio;
            // $item es un array asociativo con la clave 'producto_nombre'
            $pdf->CreateTextBox($contador, -5, $currY, 15, 10, 10, 8, 'C'); // Cantidad (vacio en este caso)
            $pdf->CreateTextBox($descripcion, 10, $currY, 60, 10, 8, 'L'); // Nombre del producto
            $pdf->CreateTextBox($cantidad, 75, $currY, 20, 10, 10, 8, 'C'); // Precio (en blanco en este caso)
            $pdf->CreateTextBox($precio, 95, $currY, 20, 10, 10, 8, 'C'); // Monto (en blanco en este caso)
            $pdf->CreateTextBox($precio_venta, 115, $currY, 20, 10, 10, 8, 'C');
            $pdf->CreateTextBox($descuento, 135, $currY, 20, 10, 10, 8, 'C');
            $pdf->CreateTextBox($subtotal, 155, $currY, 20, 10, 10, 8, 'C');
            $currY += 5;
            $contador++;
            $subtotal = $precio * $cantidad;
            $totalNeto += $subtotal;
        }

        $pdf->Line(10, $currY + 4, 200, $currY + 4);

        // Imprimir los montos finales
        $pdf->CreateTextBox('Total Neto: ', 20, $currY + 5, 135, 10, 10, 'B', 'R');
        //Se aplica el igv
        $impuesto = $totalNeto * 0.18;
        $total = $totalNeto + $impuesto;

        $pdf->CreateTextBox('S/.' . number_format($totalNeto, 2, '.', ''), 145, $currY + 5, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($impuesto, 2, '.', ''), 145, $currY + 10, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Condicion de pago: CONTADO', 0, $currY + 10, 0, 10, 10, 'B', 'L');
        $TotalLetras = convertirMonedaPeruana($total);
        $pdf->CreateTextBox('SON: ' . $TotalLetras, 0, $currY + 15, 0, 10, 10, 'B', 'L');
        $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
    } else {
        // Imprimir los productos restantes junto con las políticas en una nueva página
        $pdf->AddPage();
        $currY = 88;
        $contador = $fin + 1;
        $inicio = $fin;
        $fin = count($productos);

        // Imprimir los productos restantes del último grupo
        foreach (array_slice($productos, $inicio, $fin - $inicio) as $item) {
            $descripcion = $item['nombre'];
            $cantidad = $item['cantidad'];
            $precio = $item['precio'];
            $precio_venta = $item['precio'];
            $descuento = 0.00;
            $subtotal = $cantidad * $precio;
            // $item es un array asociativo con la clave 'producto_nombre'
            $pdf->CreateTextBox($contador, -5, $currY, 15, 10, 10, 8, 'C'); // Cantidad (vacio en este caso)
            $pdf->CreateTextBox($descripcion, 10, $currY, 60, 10, 8, 'L'); // Nombre del producto
            $pdf->CreateTextBox($cantidad, 75, $currY, 20, 10, 10, 8, 'C'); // Precio (en blanco en este caso)
            $pdf->CreateTextBox($precio, 95, $currY, 20, 10, 10, 8, 'C'); // Monto (en blanco en este caso)
            $pdf->CreateTextBox($precio_venta, 115, $currY, 20, 10, 10, 8, 'C');
            $pdf->CreateTextBox($descuento, 135, $currY, 20, 10, 10, 8, 'C');
            $pdf->CreateTextBox($subtotal, 155, $currY, 20, 10, 10, 8, 'C');
            $currY += 5;
            $contador++;
            $subtotal = $precio * $cantidad;
            $totalNeto += $subtotal;
        }
        $impuesto = $totalNeto * 0.18;
        $total = $totalNeto + $impuesto;
        $pdf->AddPage();
        $currY = 83;
        // Imprimir los montos finales
        $pdf->CreateTextBox('Total Neto: ', 20, $currY + 5, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($totalNeto, 2, '.', ''), 145, $currY + 5, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($impuesto, 2, '.', ''), 145, $currY + 10, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Condicion de pago: CONTADO', 0, $currY + 10, 0, 10, 10, 'B', 'L');
        $TotalLetras = convertirMonedaPeruana($total);
        $pdf->CreateTextBox('SON: ', 20, $currY + 15, 10, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
    }
} else {
    // Si no quedan productos adicionales, se imprime solo los montos finales
    $pdf->AddPage();
    $currY = 83;
    $impuesto = $totalNeto * 0.18;
    $total = $totalNeto + $impuesto;
    // Imprimir los montos finales
    $pdf->CreateTextBox('Total Neto: ', 20, $currY + 5, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('S/.' . number_format($totalNeto, 2, '.', ''), 145, $currY + 5, 30, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('S/.' . number_format($impuesto, 2, '.', ''), 145, $currY + 10, 30, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('Condicion de pago: CONTADO', 0, $currY + 10, 0, 10, 10, 'B', 'L');
    $TotalLetras = convertirMonedaPeruana($total);
    $pdf->CreateTextBox('SON: ', 20, $currY + 15, 10, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
}

//Close and output PDF document
$pdf->Output('PROFORMA.pdf', 'I');
