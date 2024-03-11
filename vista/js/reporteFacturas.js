$(document).ready(function () {
  var funcion;
  var funcion = '';

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
        let contador = 0; // Inicializamos el contador
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
          <tr data-id="${reporte.id_cliente}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.nombre_tipo_pago}</th>          
          <th scope="row">${reporte.nombre_cliente}</th>
          <th scope="row">${tipo_cliente}</th>
          <th scope="row">${reporte.total_venta}</th>
          <th scope="row">${reporte.fecha}</th>
          <th scope="row"><a href="${reporte.url_factura}" data-id_factura="${reporte.id_venta}" type="button" class="btn btn-info">
                        Ver
                     </a></th>`;
        });
        $('#reporte_facturas_lista').html(template);
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
          let template2 = `<tr>
            <th>N°</th>
            <th>FECHA</th>
            <th>MONTO TOTAL</th>
            <th>PRODUCTO CANTIDAD</th>
            </tr>`;
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.fecha}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.fecha}</th>          
          <th scope="row">${reporte.monto_total}</th>
          <th scope="row">${reporte.productos_cantidades}</th></tr>`;
          });
          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);
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
          let template2 = `<tr>
            <th>N°</th>
            <th>MES</th>
            <th>MONTO TOTAL</th>
            <th>PRODUCTO CANTIDAD</th>
            </tr>`;
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.mes}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.mes}</th>          
          <th scope="row">${reporte.monto_total}</th>
          <th scope="row">${reporte.productos_cantidades}</th></tr>`;
          });
          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);
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
            <th>N°</th>
            <th>FECHA</th>
            <th>MONTO TOTAL</th>
            <th>PRODUCTO CANTIDAD</th>
            </tr>`;
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.fecha}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.fecha}</th>          
          <th scope="row">${reporte.monto_total}</th>
          <th scope="row">${reporte.productos_cantidades}</th></tr>`;
          });
          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);
        }
      );
    }
  });

  // Generar PDF
  $(document).on('click', '#generatePDFF', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Agregar el logo en la parte superior izquierda
    const imgData = 'assets/img/logo_titan1.png'; // Reemplaza con la cadena base64 de tu logo
    doc.addImage(imgData, 'PNG', 10, 10, 30, 10);

    // Agregar el título centrado
    doc.setFontSize(18);
    doc.setTextColor(0, 0, 0);
    const titleWidth =
      (doc.getStringUnitWidth('TIENDA TITAN') * doc.internal.getFontSize()) /
      doc.internal.scaleFactor;
    const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
    doc.text('TIENDA TITAN', titleX, 30);

    // Agregar el lema debajo del título
    doc.setFontSize(12);
    const lemaText = 'Materiales de construcción de calidad';
    const lemaWidth =
      (doc.getStringUnitWidth(lemaText) * doc.internal.getFontSize()) /
      doc.internal.scaleFactor;
    const lemaX = (doc.internal.pageSize.getWidth() - lemaWidth) / 2;
    doc.text(lemaText, lemaX, 40);

    // Agregar el título de la tabla
    doc.setFontSize(16);
    doc.setTextColor(100, 100, 100);
    doc.text('Reporte de Ventas', 14, 60);

    // Generar la tabla
    doc.autoTable({ html: '#reporte_facturas', startY: 70, theme: 'striped' });

    // Abrir el PDF en una nueva ventana
    var pdfWindow = window.open('', '_blank');
    pdfWindow.document.open();
    pdfWindow.document.write(
      '<html><head><title>PDF Reporte de Ventas</title></head><body>'
    );
    pdfWindow.document.write(
      '<embed width="100%" height="100%" src="' +
        doc.output('datauristring') +
        '" type="application/pdf">'
    );
    pdfWindow.document.write('</body></html>');
    pdfWindow.document.close();
  });
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
