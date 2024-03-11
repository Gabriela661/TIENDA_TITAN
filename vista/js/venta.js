$(document).ready(function () {
  var funcion;
  var funcion = '';

  //mostrar ventas una tabla
  venta();

  function venta(consulta) {
    funcion = 'mostrar_venta';
    $.post(
      '../controlador/ventaControlador.php',
      { consulta, funcion },
      (response) => {
        const ventas = JSON.parse(response);
        let template = '';
        let contador = 0; // Inicializamos el contador
        var tipo_venta = '';
        ventas.forEach((venta) => {
          if (venta.id_usuario != venta.id_cliente) {
            tipo_venta = 'Online';
          } else {
            tipo_venta = 'Presencial';
          }
          contador++; // Incrementamos el contador en cada iteración
          template += `
            <tr data-id="${venta.id_venta}">
            <th scope="row">${contador}</th>
            <th scope="row">${venta.nombre_tipo_pago}</th>                        
            <th scope="row">${venta.nombre_cliente}</th>
            <th scope="row">${tipo_venta}</th>                        
            <th scope="row">${venta.total_venta}</th>
            <th scope="row">${venta.fecha}</th>
            <th scope="row"><button id="btn_visualizar" data-id_venta="${venta.id_venta}" type="button" class="btn btn-info">Ver</button></th>`;
        });
        $('#venta').html(template);
      }
    );
  }

  // generar pdf
  /* $(document).on('click', '#btn_visualizar', function () { */

  $(document).on('click', '#btn_visualizar', function () {
    var idVenta = $(this).data('id_venta');
    console.log('ID de la venta:', idVenta);

    // Realizar solicitud AJAX al script PHP que genera el PDF
    //Ver Factura

    var codCliente = $(this).attr('cl');
    var idVenta = $(this).attr('f');

    generarPDF(codCliente, idVenta);
  });

  function generarPDF(cliente, factura) {
    url = 'assets/reportes/generaFactura.php?cl=' + cliente + '&f=' + factura;
    window.open(url, '_blank');
  }
});

$(document).ready(function () {
  // Función para filtrar los resultados de la tabla según el texto de búsqueda
  $('#buscar').on('input', function () {
    var searchText = $(this).val().toLowerCase(); // Obtener el texto de búsqueda y convertirlo a minúsculas
    $('#venta tr').filter(function () {
      // Filtrar las filas de la tabla
      $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1); // Mostrar u ocultar la fila según si contiene el texto de búsqueda
    });
  });
});
