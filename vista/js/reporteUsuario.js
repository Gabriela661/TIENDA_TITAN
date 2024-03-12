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
          <tr>
          <th scope="row">${contador}</th>
          <th scope="row">${reporte.nombre_cliente}</th>
          <th scope="row">${reporte.apellido_cliente}</th>          
          <th scope="row">${tipo_cliente}</th>
          <th scope="row">${reporte.cantidad_compra}</th>
          <th scope="row">${reporte.total_compra}</th>
          </tr>`;
        });
        $('#reporte_usuario_lista').html(template);

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

  /*  $(document).on('click', '#generatePDF', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Agregar la imagen de marca de agua
    const watermarkImg = 'assets/img/watermark.png'; // Ruta de tu imagen de marca de agua
    const imgWidth = 100; // Ancho de la imagen
    const imgHeight = 50; // Altura de la imagen
    const pdfWidth = doc.internal.pageSize.getWidth();
    const pdfHeight = doc.internal.pageSize.getHeight();
    const xPos = (pdfWidth - imgWidth) / 2; // Centrar horizontalmente
    const yPos = (pdfHeight - imgHeight) / 2; // Centrar verticalmente
    doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);

    // Agregar el logo en la parte superior izquierda
    const imgData = 'assets/img/logo_titan.png'; // Ruta de tu logo
    doc.addImage(imgData, 'PNG', 10, 10, 30, 15);

    // Agregar los números de contacto (WhatsApp) en la parte superior derecha
    doc.setFontSize(8);
    doc.setTextColor(150, 150, 150);
    doc.text('943212297 - 932566922', pdfWidth - 60, 15);

    // Agregar la dirección debajo de los números de contacto
    doc.setFontSize(8);
    doc.text('Carretera Central Km 412', pdfWidth - 60, 25);
    // Agregar la dirección debajo de los números de contacto
    doc.setFontSize(8);
    doc.text('CPM Llicua - Amarilis - Huánuco', pdfWidth - 60, 30);

    // Agregar texto adicional
    doc.setFontSize(18);
    doc.setTextColor(100, 100, 100);
    doc.text('Reporte de Usuarios', pdfWidth - 140, 42);

    // Generar la tabla
    doc.autoTable({ html: '#reporte_usuario', startY: 50, theme: 'striped' });

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
  }); */

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
    const contactNumbers = '943212297 - 932566922';
    const address1 = 'Carretera Central Km 412';
    const address2 = 'CPM Llicua - Amarilis - Huánuco';
    const reportTitle = 'Reporte de Usuarios';

    // Función para dibujar el encabezado en cada página
    const drawHeader = () => {
      doc.addImage(imgData, 'PNG', 10, 10, 30, 15);
      doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);
      doc.setFontSize(10);
      doc.setTextColor(150, 150, 150);
      doc.text(contactNumbers, doc.internal.pageSize.getWidth() - 60, 15);
      doc.text(address1, doc.internal.pageSize.getWidth() - 60, 25);
      doc.text(address2, doc.internal.pageSize.getWidth() - 60, 30);
      doc.setFontSize(20);
      doc.setTextColor(19, 19, 19);
      doc.text(reportTitle, doc.internal.pageSize.getWidth() - 140, 42);
    };

    // Función para generar la tabla
    const generateTable = () => {
      doc.autoTable({
        html: '#reporte_usuario',
        startY: 50,
        theme: 'striped',
        headStyles: {
          fillColor: [228, 85, 18], // Cambiar a color naranja
          textColor: [255, 255, 255], // Cambiar el color del texto del encabezado
        },
      });
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
