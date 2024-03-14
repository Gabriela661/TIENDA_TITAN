function generarPDF(params) {
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
  const reportTitle = 'Reporte de Facturas';

  // Función para dibujar el encabezado en cada página
  const drawHeader = () => {
    doc.addImage(imgData, 'PNG', 10, 10, 30, 15);
    doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);
    doc.setFontSize(10);
    doc.setTextColor(150, 150, 150);
    doc.text(contactNumbers, doc.internal.pageSize.getWidth() - 60, 15);
    doc.text(address1, doc.internal.pageSize.getWidth() - 60, 25);
    doc.text(address2, doc.internal.pageSize.getWidth() - 60, 30);
    doc.setFontSize(22);
    doc.setTextColor(19, 19, 19);
    doc.text(reportTitle, doc.internal.pageSize.getWidth() - 140, 42);
  };

  // Función para generar la tabla
  const generateTable = () => {
    doc.autoTable({
      html: '#reporte_facturas',
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
    html: '#reporte_facturas',
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
    '<html><head><title>PDF Reporte de Ventas</title></head><body>'
  );
  pdfWindow.document.write(
    '<embed width="100%" height="100%" src="' +
      doc.output('datauristring') +
      '" type="application/pdf">'
  );
  pdfWindow.document.write('</body></html>');
  pdfWindow.document.close();
}
