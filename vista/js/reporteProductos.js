$(document).ready(function () {
  var funcion;
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
        let contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          contador++; // Incrementamos el contador en cada iteración
          template += `
          <tr data-id="${reporte.id_producto}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.nombre_producto}</th>          
          <th scope="row">${reporte.fecha}</th>
          <th scope="row">${reporte.id_venta}</th>
          <th scope="row">${reporte.nombre_cliente}</th>
          <th scope="row">${reporte.cantidad_total}</th>
          <th scope="row">${reporte.precio_producto}</th>
          <th scope="row">${reporte.monto_total}</th>
          </tr>`;
        });
        $('#productos_lista').html(template);
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
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.id_producto}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.nombre_producto}</th>          
          <th scope="row">${reporte.precio_producto}</th>
          <th scope="row">${reporte.total_vendido}</th>
          <th scope="row">${reporte.monto_total}</th>
          </tr>`;
          });
          $('#productos_lista').html('');
          $('#productos_lista').html(template);
          $('#productos_lista_head').html('');
          $('#productos_lista_head').html(template2);
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
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
            <tr data-id="${reporte.id_producto}">
            <th scope="row">${contador}</th>
            <th scope="row">${reporte.nombre_producto}</th>          
            <th scope="row">${reporte.precio_producto}</th>
            <th scope="row">${reporte.total_vendido}</th>
            <th scope="row">${reporte.monto_total}</th>
            </tr>`;
          });
          $('#productos_lista').html('');
          $('#productos_lista').html(template);
          $('#productos_lista_head').html('');
          $('#productos_lista_head').html(template2);
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
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
          <tr data-id="${reporte.id_producto}">
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.nombre_producto}</th>          
          <th scope="row">${reporte.precio_producto}</th>
          <th scope="row">${reporte.total_vendido}</th>
          <th scope="row">${reporte.monto_total}</th></tr>`;
          });
          $('#productos_lista').html('');
          $('#productos_lista').html(template);
          $('#productos_lista_head').html('');
          $('#productos_lista_head').html(template2);
        }
      );
    }
  });

  // Generar PDF
  $(document).on('click', '#generatePDFFF', function () {
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
    doc.text('Reporte de Productos', 14, 60);

    // Generar la tabla
    doc.autoTable({ html: '#reporte_productos', startY: 70, theme: 'striped' });

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
