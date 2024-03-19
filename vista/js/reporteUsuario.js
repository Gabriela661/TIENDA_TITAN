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
          <td scope="row">${contador}</td>
          <td scope="row">${reporte.nombre_cliente}</td>
          <td scope="row">${reporte.apellido_cliente}</td>          
          <td scope="row">${tipo_cliente}</td>
          <td scope="row">${reporte.cantidad_compra}</td>
          <td scope="row">${reporte.total_compra}</td>
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

  $(document).on('click', '#generatePDF', function () {
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
    const reportTitle = 'Reporte de Usuarios';

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
      html: '#reporte_usuario',
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
