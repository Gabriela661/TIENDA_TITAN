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
          });
        }
      );
    }
  });

  // Generar PDF
  $(document).on('click', '#generatePDFFF', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const imgWidth = 100; // Ancho de la imagen
    const imgHeight = 50; // Altura de la imagen
    const pdfWidth = doc.internal.pageSize.getWidth();
    const pdfHeight = doc.internal.pageSize.getHeight();
    const xPos = (pdfWidth - imgWidth) / 2; // Centrar horizontalmente
    const yPos = (pdfHeight - imgHeight) / 2; // Centrar verticalmente

    // Variables para el diseño del encabezado y la tabla
    const imgData = 'assets/img/logo_titan.png'; // Ruta de tu logo
    const watermarkImg = 'assets/img/watermark.png';
    const telefono = 'Teléfono:';
    const contactNumbers = '943212297 - 932566922';
    const direccion = 'Ubicación:';
    const address1 = 'Carretera Central Km 412';
    const address2 = 'CPM Llicua - Amarilis - Huánuco';
    const reportTitle = 'Reporte Productos';

    /* footer */
    const reportFooter = 'TITAN';
    const currentDate = new Date().toLocaleDateString();

    // Función para dibujar el encabezado en cada página
    const drawHeader = () => {
      doc.addImage(imgData, 'PNG', 10, 10, 30, 15);
      doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);
      doc.setFontSize(10);
      doc.setTextColor(150, 150, 150);
      doc.text(telefono, doc.internal.pageSize.getWidth() - 60, 10);
      doc.text(contactNumbers, doc.internal.pageSize.getWidth() - 60, 15);
      doc.text(direccion, doc.internal.pageSize.getWidth() - 60, 22);
      doc.text(address1, doc.internal.pageSize.getWidth() - 60, 27);
      doc.text(address2, doc.internal.pageSize.getWidth() - 60, 32);
      doc.setFontSize(22);
      doc.setTextColor(19, 19, 19);
      doc.text(reportTitle, doc.internal.pageSize.getWidth() - 140, 42);
    };
    // Función para dibujar el pie de página en cada página
    const drawFooter = () => {
      const totalPages = doc.internal.getNumberOfPages();
      for (let i = 1; i <= totalPages; i++) {
        doc.setPage(i);
        doc.setFontSize(12);

        // Fondo verde al pie de página
        doc.setFillColor(228, 85, 18);
        doc.rect(0, pdfHeight - 20, pdfWidth, 20, 'F');

        // Texto centrado
        doc.setTextColor(255, 255, 255);
        doc.text(reportFooter + ' (' + currentDate + ')', 10, pdfHeight - 10, {
          align: 'left',
        });

        // Fecha y paginación a la derecha
        doc.text(
          ' Página ' + i + ' de ' + totalPages,
          pdfWidth - 12,
          pdfHeight - 10,
          { align: 'right' }
        );
      }
    };
    // Evento para dibujar el encabezado en cada página
    doc.autoTable({
      html: '#reporte_productos',
      startY: 50,
      theme: 'striped',
      headStyles: {
        fillColor: [228, 85, 18], // Cambiar a color naranja
        textColor: [255, 255, 255], // Cambiar el color del texto del encabezado
      },
      didDrawPage: () => {
        drawHeader();
        drawFooter();
      },
    });

    // Abrir el PDF en una nueva ventana
    var pdfWindow = window.open('', '_blank');
    pdfWindow.document.open();
    pdfWindow.document.write(
      '<html><head><title>PDF Reporte de Productos</title></head><body>'
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
