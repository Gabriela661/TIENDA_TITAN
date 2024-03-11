$(document).ready(function () {
  var funcion;
  var funcion = '';

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
          <th scope="row">${reporte.nombre_cliente}</th>
          <th scope="row">${reporte.apellido_cliente}</th>          
          <th scope="row">${tipo_cliente}</th>
          <th scope="row">${reporte.cantidad_compra}</th>
          <th scope="row">${reporte.total_compra}</th>`;
        });
        $('#reporte_usuario_lista').html(template);
      }
    );
  }

  $(document).on('click', '#generatePDF', function () {
    const { jsPDF } = window.jspdf;

    /*     const pdfContainerHTML = `
    <div class="header">
      <img src="logo.png" alt="Logo" class="logo">
      <h1 class="title">TIENDA TITAN</h1>
      <p class="subtitle">Materiales de construcción de calidad</p>
    </div>
    <h2 class="table-title">Reporte de Usuarios</h2>
  `;

    // Crear un nuevo elemento div temporal
    const tempDiv = $('<div>').append(pdfContainerHTML);

    // Agregar la tabla al elemento temporal
    tempDiv.append($('#reporte_usuario').clone());

    // Configurar evento para generar el PDF
    const pdfContainer = tempDiv;
    const opt = {
      margin: 10,
      filename: 'reporte_usuarios.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'letter', orientation: 'portrait' },
    };
    console.log(html2pdf());
    html2pdf().set(opt).from(pdfContainer).save(); */

    // Crear el PDF a partir de la tabla HTML
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
    doc.text('Reporte de usuarios', 14, 60);

    // Generar la tabla
    doc.autoTable({ html: '#reporte_usuario', startY: 70, theme: 'striped' });

    // Abrir el PDF en una nueva ventana
    var pdfWindow = window.open('', '_blank');
    pdfWindow.document.open();
    pdfWindow.document.write(
      '<html><head><title>PDF Reporte de Usuarios</title></head><body>'
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
