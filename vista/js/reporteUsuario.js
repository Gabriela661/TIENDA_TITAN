import { generarPDF } from './generarPDF.js';

$(document).ready(function () {
  var funcion = '';
  var contador = 0;

  //mostrar reporte de usuarios
  reporte_usuario();
  function reporte_usuario(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'reporte_usuario';
    $.post(
      '../controlador/reporteUsuarioControlador.php',
      { consulta, funcion },
      (response) => {
        console.log(response);
        const reportes = JSON.parse(response);
        let template = '';
        contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          contador++; // Incrementamos el contador en cada iteración
          template += `
          <tr>
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_usuario}</td>
          <td scope="row">${reporte.apellido_usuario}</td>          
          <td scope="row">${reporte.cantidad_venta}</td>
          <td scope="row">${reporte.total_venta}</td>
          </tr>`;
        });
        $('#reporte_usuario_lista').html(template);
        $('#totalUsers').text(contador);

        // Inicializar DataTables después de cargar los datos en la tabla
        $('#reporte_usuario').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
        });
      }
    );
  }

  //mostrar reporte de clientes
  reporte_clientes();
  function reporte_clientes(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'reporte_clientes';
    $.post(
      '../controlador/reporteUsuarioControlador.php',
      { consulta, funcion },
      (response) => {
        console.log(response);
        const reportes = JSON.parse(response);
        let template = '';
        contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          var tipo_cliente = '';
          if (reporte.id_usuario == reporte.id_cliente) {
            tipo_cliente = 'Online';
          } else {
            tipo_cliente = 'Presencial';
          }
          contador++; // Incrementamos el contador en cada iteración
          template += `
          <tr>
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_cliente}</td>
          <td scope="row">${reporte.apellido_cliente}</td>          
          <td scope="row">${tipo_cliente}</td>          
          <td scope="row">${reporte.cantidad_compra}</td>
          <td scope="row">${reporte.total_compra}</td>
          </tr>`;
        });
        $('#reporte_cliente_lista').html(template);
        $('#totalClientes').text(contador);

        // Inicializar DataTables después de cargar los datos en la tabla
        $('#reporte_cliente').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
        });
      }
    );
  }

  // Sellers report
  $(document).on('click', '#generatePDF', function () {
    generarPDF(
      'logo_titan.png',
      '+51 932 566 922',
      '+51 943 212 297',
      'CARRETERA CENTRAL KM. 412',
      'REF. FRENTE AL GRIFO RACING',
      'Amarilis - Huánuco, Huánuco, Perú',
      'Reporte Vendedor',
      'Reporte de vendedor',
      'TITAN',
      'reporte_usuario',
      { a: 228, b: 85, c: 18 },
      { d: 255, e: 255, f: 255 }
    );
  });

  //Customers reports
  $(document).on('click', '#generatePDFCus', function () {
    generarPDF(
      'logo_titan.png',
      '+51 932 566 922',
      '+51 943 212 297',
      'CARRETERA CENTRAL KM. 412',
      'REF. FRENTE AL GRIFO RACING',
      'Amarilis - Huánuco, Huánuco, Perú',
      'Reporte Clientes',
      'Reporte de Clientes',
      'TITAN',
      'reporte_cliente',
      { a: 228, b: 85, c: 18 },
      { d: 255, e: 255, f: 255 }
    );
  });
});

/* $(document).ready(function () {
  // Función para filtrar los resultados de la tabla según el texto de búsqueda
  $('#buscar').on('input', function () {
    var searchText = $(this).val().toLowerCase(); // Obtener el texto de búsqueda y convertirlo a minúsculas
    $('#venta tr').filter(function () {
      // Filtrar las filas de la tabla
      $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1); // Mostrar u ocultar la fila según si contiene el texto de búsqueda
    });
  });
}); */
