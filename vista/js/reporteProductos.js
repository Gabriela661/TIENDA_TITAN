import { generarPDF } from './generarPDF.js';

$(document).ready(function () {
  var contador = 0;
  var funcion = '';

  //mostrar reporte de usuarios
  reporte_productos();
  function reporte_productos(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'reporte_productos';
    $.post(
      '../controlador/reporteProductosControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        let template = '';
        contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          contador++; // Incrementamos el contador en cada iteración
          template += `
          <tr data-id="${reporte.id_producto}">
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_producto}</td>          
          <td scope="row">${reporte.cantidad_total}</td>
          <td scope="row">${reporte.precio_producto}</td>
          <td scope="row">${reporte.monto_total}</td>
          </tr>`;
        });
        $('#productos_lista').html(template);
        $('#totalProductorep').text(contador);
        // Destruir la instancia anterior de DataTables
        $('#reporte_productos').DataTable().destroy();

        // Inicializar DataTables después de cargar los datos en la tabla
        $('#reporte_productos').DataTable({
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

  $(document).on('click', '#diaProducto', function () {
    //mostrar reporte de usuarios
    dia_producto();
    function dia_producto(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'dia_producto';
      $.post(
        '../controlador/reporteProductosControlador.php',
        { consulta, funcion },
        (response) => {
          console.log(response);
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
            <th>N°</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
            </tr>`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.id_producto}">
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_producto}</td>          
          <td scope="row">${reporte.precio_producto}</td>
          <td scope="row">${reporte.total_vendido}</td>
          <td scope="row">${reporte.monto_total}</td>
          </tr>`;
          });
          $('#totalProductorep').text(contador);
          // Destruir la instancia anterior de DataTables
          $('#reporte_productos').DataTable().destroy();

          $('#productos_lista').html('');
          $('#productos_lista_head').html('');

          $('#productos_lista').html(template);
          $('#productos_lista_head').html(template2);

          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_productos').DataTable({
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

  $(document).on('click', '#mesProducto', function () {
    //mostrar reporte de usuarios
    mes_producto();
    function mes_producto(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'mes_producto';
      $.post(
        '../controlador/reporteProductosControlador.php',
        { consulta, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
          <th>N°</th>
          <th>NOMBRE</th>
          <th>PRECIO</th>
          <th>CANTIDAD</th>
          <th>TOTAL</th>
            </tr>`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
            <tr data-id="${reporte.id_producto}">
            <td scope="row">${contador}</td>
            <td scope="row">${reporte.nombre_producto}</td>          
            <td scope="row">${reporte.precio_producto}</td>
            <td scope="row">${reporte.total_vendido}</td>
            <td scope="row">${reporte.monto_total}</td>
            </tr>`;
          });
          $('#totalProductorep').text(contador);
          // Destruir la instancia anterior de DataTables
          $('#reporte_productos').DataTable().destroy();

          $('#productos_lista').html('');
          $('#productos_lista_head').html('');

          $('#productos_lista').html(template);
          $('#productos_lista_head').html(template2);

          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_productos').DataTable({
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

  $(document).on('click', '#fechasProducto', function () {
    //mostrar reporte de usuarios
    fechas_productos();
    function fechas_productos(consulta) {
      const fechaInicio = $('#fecha_inicioP').val();
      const fechaFin = $('#fecha_finP').val();
      // Se define la función a ejecutar en el controlador
      funcion = 'fechas_productos';
      $.post(
        '../controlador/reporteProductosControlador.php',
        { consulta, fechaInicio, fechaFin, funcion },
        (response) => {
          console.log(response);
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
            <th>N°</th>
            <th>NOMBRE PRODUCTO</th>
            <th>PRECIO PRODUCTO</th>
            <th>CANTIDAD TOTAL</th>
            <th>MONTO TOTAL</th>
            </tr>`;
          contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.id_producto}">
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_producto}</td>          
          <td scope="row">${reporte.precio_producto}</td>
          <td scope="row">${reporte.total_vendido}</td>
          <td scope="row">${reporte.monto_total}</td></tr>`;
          });

          $('#reporte_productos').DataTable().destroy();
          $('#productos_lista').html('');
          $('#productos_lista').html(template);
          $('#productos_lista_head').html('');
          $('#productos_lista_head').html(template2);
          $('#totalProductorep').text(contador);

          // Inicializar DataTables después de cargar los datos en la tabla
          $('#reporte_productos').DataTable({
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
  $(document).on('click', '#generatePDFFF', function () {
    generarPDF(
      'logo_titan.png',
      '+51 932 566 922',
      '+51 943 212 297',
      'CARRETERA CENTRAL KM. 412',
      'REF. FRENTE AL GRIFO RACING',
      'Amarilis - Huánuco, Huánuco, Perú',
      'Reporte de Productos',
      'Reporte de Productos',
      'TITAN',
      'reporte_productos',
      { a: 228, b: 85, c: 18 },
      { d: 255, e: 255, f: 255 }
    );
  });
});
