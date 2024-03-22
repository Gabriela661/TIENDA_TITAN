import { generarPDF } from './generarPDF.js';

$(document).ready(function () {
  var contador = 0;
  var funcion = '';
  var tipo_cliente = '';
  var datetime = new Date();
  console.log(datetime);
  //mostrar reporte de usuarios
  reporte_facturas();
  function reporte_facturas(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'reporte_facturas';
    $.post(
      '../controlador/reporteFacturasControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        let template = '';
        contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          // Asignar tipo_cliente en comparación de usuario
          // Usuarios = (cliente online)
          // Usuarios != (cliente presencial), porque el id_usuario
          if (reporte.id_usuario == reporte.id_cliente) {
            tipo_cliente = 'Online';
          } else {
            tipo_cliente = 'Presencial';
          }
          contador++; // Incrementamos el contador en cada iteración
          template += `
          <tr> 
          <td scope="row">${reporte.id_venta}</td>
            <td scope="row">${reporte.fecha}</td>          
            <td scope="row">${reporte.nombre_cliente}</td>          
            <td scope="row">${reporte.nombre_tipo_pago}</td>
            <td scope="row">${tipo_cliente}</td>
            <td scope="row">${reporte.total_venta}</td>
          </tr>`;
        });
        $('#reporte_facturas_lista').html(template);

        // Destruir la instancia anterior de DataTables
        $('#reporte_facturas').DataTable().destroy();
        $('#totalVentarep').text(contador);
        // Inicializar DataTables después de cargar los datos en la tabla
        $('#reporte_facturas').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
          columnDefs: [{ className: 'text-center', targets: '_all' }],
        });
      }
    );
  }

  $(document).on('click', '#diaFactura', function () {
    //mostrar reporte de usuarios
    dia_facturas();
    function dia_facturas(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'dia_facturas';
      $.post(
        '../controlador/reporteFacturasControlador.php',
        { consulta, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `
          <tr>
            <th>N° FACTURA</th>
            <th>FECHA</th>
            <th>CLIENTE</th>
            <th>TIPO DE PAGO</th>
            <th>TIPO DE VENTA</th>
            <th>MONTO TOTAL</th>
          </tr>`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            if (reporte.id_usuario == reporte.id_cliente) {
              tipo_cliente = 'Online';
            } else {
              tipo_cliente = 'Presencial';
            }
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr>
          <td scope="row">${reporte.id_venta}</td>
          <td scope="row">${reporte.fecha}</td>          
          <td scope="row">${reporte.nombre_cliente}</td>          
          <td scope="row">${reporte.nombre_tipo_pago}</td>
          <td scope="row">${tipo_cliente}</td>
          <td scope="row">${reporte.total_venta}</td>
          </tr>`;
          });
          $('#totalVentarep').text(contador);
          // Destruir la instancia anterior de DataTables
          $('#reporte_facturas').DataTable().destroy();

          $('#reporte_facturas_lista').html('');
          $('#facturas_lista_head').html('');

          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);

          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_facturas').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
              url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
            },
            columnDefs: [{ className: 'text-center', targets: '_all' }],
          });
        }
      );
    }
  });

  $(document).on('click', '#mesFactura', function () {
    //mostrar reporte de usuarios
    mes_facturas();
    function mes_facturas(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'mes_facturas';
      $.post(
        '../controlador/reporteFacturasControlador.php',
        { consulta, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `
          <tr>
          <th>N° FACTURA</th>
          <th>FECHA</th>
          <th>CLIENTE</th>
          <th>TIPO DE PAGO</th>
          <th>TIPO DE VENTA</th>
          <th>MONTO TOTAL</th>
        </tr`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            contador++;
            if (reporte.id_usuario == reporte.id_cliente) {
              tipo_cliente = 'Online';
            } else {
              tipo_cliente = 'Presencial';
            }
            template += `
            <tr>
            <td scope="row">${reporte.id_venta}</td>
            <td scope="row">${reporte.fecha}</td>          
            <td scope="row">${reporte.nombre_cliente}</td>          
            <td scope="row">${reporte.nombre_tipo_pago}</td>
            <td scope="row">${tipo_cliente}</td>
            <td scope="row">${reporte.total_venta}</td>
            </tr>`;
          });
          $('#totalVentarep').text(contador);
          // Destruir la instancia anterior de DataTables
          $('#reporte_facturas').DataTable().destroy();

          $('#reporte_facturas_lista').html('');
          $('#facturas_lista_head').html('');

          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);

          // Verificar si la instancia de DataTables existe
          if ($.fn.DataTable.isDataTable('#reporte_facturas')) {
            // Destruir la instancia anterior de DataTables
            $('#reporte_facturas').DataTable().destroy();
          }
          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_facturas').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
              url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
            },
            columnDefs: [{ className: 'text-center', targets: '_all' }],
          });
        }
      );
    }
  });

  $(document).on('click', '#fechasFactura', function () {
    //mostrar reporte de usuarios
    fechas_facturas();
    function fechas_facturas(consulta) {
      const fechaInicio = $('#fecha_inicio').val();
      const fechaFin = $('#fecha_fin').val();
      // Se define la función a ejecutar en el controlador
      funcion = 'fechas_facturas';
      $.post(
        '../controlador/reporteFacturasControlador.php',
        { consulta, fechaInicio, fechaFin, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
          <th>FACTURA</th>
          <th>FECHA</th>
          <th>CLIENTE</th>
          <th>TIPO DE PAGO</th>
          <th>TIPO DE VENTA</th>
          <th>MONTO TOTAL</th>
        </tr`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            if (reporte.id_usuario == reporte.id_cliente) {
              tipo_cliente = 'Online';
            } else {
              tipo_cliente = 'Presencial';
            }
            contador++; // Incrementamos el contador en cada iteración
            template += `
            <tr>
            <td scope="row">${reporte.id_venta}</td>
            <td scope="row">${reporte.fecha}</td>          
            <td scope="row">${reporte.nombre_cliente}</td>          
            <td scope="row">${reporte.nombre_tipo_pago}</td>
            <td scope="row">${tipo_cliente}</td>
            <td scope="row">${reporte.total_venta}</td>
            </tr>`;
          });
          $('#totalVentarep').text(contador);
          // Destruir la instancia anterior de DataTables
          $('#reporte_facturas').DataTable().destroy();

          $('#reporte_facturas_lista').html('');
          $('#facturas_lista_head').html('');

          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);

          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_facturas').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
              url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
            },
            columnDefs: [{ className: 'text-center', targets: '_all' }],
          });
        }
      );
    }
  });

  // Generar PDF
  $(document).on('click', '#generatePDFF', function () {
    generarPDF(
      'logo_titan.png',
      '+51 932 566 922',
      '+51 943 212 297',
      'CARRETERA CENTRAL KM. 412',
      'REF. FRENTE AL GRIFO RACING',
      'Amarilis - Huánuco, Huánuco, Perú',
      'Reporte de Ventas',
      'Reporte de Ventas',
      'TITAN',
      'reporte_facturas',
      { a: 228, b: 85, c: 18 },
      { d: 255, e: 255, f: 255 }
    );
  });
});
