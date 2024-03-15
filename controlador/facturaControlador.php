<?php
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
        $ruc = $data['ruc'];
        //LOGO DE LA TIENDA
        $this->setJPEGQuality(90);
        $this->Image(
            '../assets/img/tienda/logo_factura.png',
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
        $this->Cell(30, 10, 'TIENDA TITAN', 0, false);
        $this->SetXY(10, 35);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(30, 10, 'CARRETERA CENTRAL KM. 412 REF. FRENTE AL', 0, false);
        $this->SetXY(10, 40);
        $this->Cell(30, 10, 'GRIFO RACING AMARILIS - HUÁNUCO - HUÁNUCO', 0, false);
        //Linea de la tabla
        $this->Line(10, 48, 200, 48);

        // Cuadro alrededor de los datos
        $this->SetXY(120, 12);
        $this->Cell(80, 21, '', 1, false, 'C');
        // RUC y número de factura
        $this->SetXY(120, 15);
        $this->Cell(80, 5, 'RUC: ' . $ruc, 0, false, 'C');
        $this->SetXY(130, 20);
        $this->Cell(60, 5, 'FACTURA ELECTRONICA ', 0, false, 'C');
        $this->SetXY(120, 25);
        $this->Cell(80, 5, ' F001-N° 00000001 ', 0, false, 'C');

        // DATOS DEL CLIENTE
        $this->SetFont('helvetica', '', 10);
        $this->SetXY(10, 45);
        $this->Cell(30, 10, 'Fecha de Vencimiento: '. $fecha_formateada_vencimiento, 0, false);
        $this->SetXY(10, 50);
        $this->Cell(30, 10, 'Fecha de Emisión: '. $fecha_formateada_emsion, 0, false);
        $this->SetXY(10, 55);
        $this->Cell(30, 10, 'Señor(es) '.$razonSocial, 0, false);
        $this->SetXY(10, 60);
        $this->Cell(30, 10, 'RUC: ' . $ruc, 0, false);
        $this->SetXY(10, 65);
        $this->Cell(30, 10, 'Dirección del Cliente: ' . $direccion, 0, false);
        $this->SetXY(10, 70);
        $this->Cell(30, 10, 'Tipo de moneda: '. $tipoMoneda, 0, false);
        $this->SetXY(10, 75);
        $this->Cell(30, 10, 'Observaciones: '. $observaciones, 0, false);
        //Linea de la tabla
        $this->Line(10, 83, 200, 83);

        //Encabezado de la tabla
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

    public function Footer()
    {

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

$productos = [];
for ($i = 1; $i <= 180; $i++) {
    $producto = [
        'nombre' => 'Producto ' . $i,
        'cantidad' => rand(1, 10),
        'precio' => rand(10, 100),
    ];
    $productos[] = $producto;
}

//Inicializamos variables para el contador y el total
$subtotal = 0;
$contador = 1;
$totalNeto = 0;
$total = 0;
$impuesto = 0;
$inicio = 0;
$fin = 0;
//SE OBTIENE LOS GRUPOS DE PRODUCTOS PARA CADA PAGINA
$numGrupos = floor(count($productos) / 35) + (count($productos) % 35 == 0 ? 0 : 1);

for ($grupo = 0; $grupo < $numGrupos - 1; $grupo++) {
    // Imprimir los productos del grupo actual en una nueva página
    $pdf->AddPage();
    $currY = 88;

    // Calcular el índice de inicio y fin del grupo actual
    $inicio = $grupo * 35;
    $contador = $inicio + 1;
    $fin = min($inicio + 35, count($productos)); // Corregir este cálculo

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
    $total = $totalNeto + $impuesto;
}
$cont = count($productos);
$rest = ($cont - $fin);
//Imprimir elementos restantes
if ($inicio < $cont) {

    if ($rest <= 26) {
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
        $total = $totalNeto + $impuesto;
        $pdf->Line(
            15,
            $currY + 4,
            195,
            $currY + 4
        );

        // Imprimir los montos finales
        $pdf->CreateTextBox(
            'Total Neto: ',
            20,
            $currY + 5,
            135,
            10,
            10,
            'B',
            'R'
        );
        $pdf->CreateTextBox('S/.' . number_format($totalNeto, 2, '.', ''), 145, $currY + 5, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($impuesto, 2, '.', ''), 145, $currY + 10, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
       
    } else {
        // Imprimir los productos restantes junto con las políticas en una nueva página
        $pdf->AddPage();
        $currY = 83;
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
        $total = $totalNeto + $impuesto;
        $pdf->AddPage();
        $currY = 88;
        // Imprimir los montos finales
        $pdf->CreateTextBox(
            'Total Neto: ',
            20,
            $currY + 5,
            135,
            10,
            10,
            'B',
            'R'
        );
        $pdf->CreateTextBox('S/.' . number_format($totalNeto, 2, '.', ''), 145, $currY + 5, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($impuesto, 2, '.', ''), 145, $currY + 10, 30, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
        $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
        
    }
} else {
    // Si no quedan productos adicionales, imprimir solo las políticas en una nueva página
    $pdf->AddPage();
    $currY = 83;

    // Imprimir los montos finales
    $pdf->CreateTextBox(
        'Total Neto: ',
        20,
        $currY + 5,
        135,
        10,
        10,
        'B',
        'R'
    );
    $pdf->CreateTextBox(
        'S/.' . number_format($totalNeto, 2, '.', ''),
        145,
        $currY + 5,
        30,
        10,
        10,
        'B',
        'R'
    );
    $pdf->CreateTextBox('Impuesto 18% : ', 20, $currY + 10, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox(
        'S/.' . number_format($impuesto, 2, '.', ''),
        145,
        $currY + 10,
        30,
        10,
        10,
        'B',
        'R'
    );
    $pdf->CreateTextBox('Total : ', 20, $currY + 15, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('S/.' . number_format($total, 2, '.', ''), 145, $currY + 15, 30, 10, 10, 'B', 'R');
   
}

//Close and output PDF document
$pdf->Output('PROFORMA.pdf', 'I');
