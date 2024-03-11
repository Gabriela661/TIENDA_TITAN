<?php
// Configurar las cabeceras para indicar que la respuesta es un archivo PDF
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="nombre_del_archivo.pdf"'); // Cambiar 'nombre_del_archivo.pdf' por el nombre que desees para el archivo PDF

require_once('assets/tcpdf/tcpdf.php');

// Crear nueva instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Listado de Ventas');
$pdf->SetSubject('Listado de Ventas');
$pdf->SetKeywords('PDF, ventas, reporte');

// Establecer márgenes
$pdf->SetMargins(10, 10, 10);

// Agregar una nueva página
$pdf->AddPage();

// Contenido HTML
$html = '<section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de ventas</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive"> <!-- Agrega la clase table-responsive al contenedor de la tabla -->
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>TIPO DE PAGO</th>
                                                <th>CLIENTE</th>
                                                <th>TIPO DE VENTA</th>
                                                <th>MONTO TOTAL</th>
                                                <th>FECHA</th>
                                                <th>VER</th>
                                            </tr>
                                        </thead>
                                        <tbody id="venta">
                                            <tr data-id="2">
                                                <th scope="row">1</th>
                                                <th scope="row">efectivo</th>                        
                                                <th scope="row">Eos rerum in vel qui</th>
                                                <th scope="row">Online</th>                        
                                                <th scope="row">1272</th>
                                                <th scope="row">2024-03-09 11:04:54</th>
                                                <th scope="row"><button id="btn_visualizar" data-id_venta="2" type="button" class="btn btn-info">Ver</button></th>
                                            </tr>
                                            <tr data-id="1">
                                                <th scope="row">2</th>
                                                <th scope="row">yape</th>                        
                                                <th scope="row">Juan</th>
                                                <th scope="row">Presencial</th>                        
                                                <th scope="row">570</th>
                                                <th scope="row">2024-03-09 10:56:28</th>
                                                <th scope="row"><button id="btn_visualizar" data-id_venta="1" type="button" class="btn btn-info">Ver</button></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar el PDF
$pdf->Output('listado_ventas.pdf', 'I');
