export function generarPDF(
  imgLogo = 'logo.jpg',
  phone1 = '+51 987654321',
  phone2 = '+51 987654321',
  addressa = 'dirección a',
  addressb = 'dirección b',
  addressc = 'dirección c',
  title = 'Reporte Ejemplo',
  pdfTitle = 'Reporte de ejemplo',
  textFooter = 'Pie de página',
  idTable = 'nombreTable',
  { a = 228, b = 85, c = 18 },
  { d = 255, e = 255, f = 255 }
) {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const imgWidth = 100; // Ancho de la imagen
  const imgHeight = 50; // Altura de la imagen
  const pdfWidth = doc.internal.pageSize.getWidth();
  const pdfHeight = doc.internal.pageSize.getHeight();
  const xPos = (pdfWidth - imgWidth) / 2; // Centrar horizontalmente
  const yPos = (pdfHeight - imgHeight) / 2; // Centrar verticalmente

  // Variables para el diseño del encabezado y la tabla
  const imgData = `assets/img/${imgLogo}`; // Ruta de tu logo
  const watermarkImg = 'assets/img/watermark.png';
  const telefono = `Teléfono: ${phone1}`;
  const contactNumbers = `Whatsapp: ${phone2}`;
  const direccion = 'Ubicación:';
  const address1 = addressa;
  const address2 = addressb;
  const address3 = addressc;
  const reportTitle = title;

  /* footer */
  const reportFooter = textFooter;
  const currentDate = new Date().toLocaleDateString();

  // Función para dibujar el encabezado en cada página
  const drawHeader = () => {
    doc.addImage(imgData, 'PNG', 10, 10, 30, 15);
    doc.addImage(watermarkImg, 'PNG', xPos, yPos, imgWidth, imgHeight);
    doc.setFontSize(10);
    doc.setTextColor(150, 150, 150);
    doc.text(telefono, doc.internal.pageSize.getWidth() - 62, 10);
    doc.text(contactNumbers, doc.internal.pageSize.getWidth() - 62, 15);
    doc.text(direccion, doc.internal.pageSize.getWidth() - 62, 22);
    doc.text(address1, doc.internal.pageSize.getWidth() - 62, 27);
    doc.text(address2, doc.internal.pageSize.getWidth() - 62, 32);
    doc.text(address3, doc.internal.pageSize.getWidth() - 62, 37);
    doc.setFontSize(22);
    doc.setTextColor(19, 19, 19);
    doc.text(reportTitle, doc.internal.pageSize.getWidth() - 140, 45);
  };
  // Función para dibujar el pie de página en cada página
  const drawFooter = () => {
    const totalPages = doc.internal.getNumberOfPages();
    for (let i = 1; i <= totalPages; i++) {
      doc.setPage(i);
      doc.setFontSize(12);

      // Fondo verde al pie de página
      doc.setFillColor(a, b, c);
      doc.rect(0, pdfHeight - 20, pdfWidth, 20, 'F');

      // Texto centrado
      doc.setTextColor(d, e, f);
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
    html: `#${idTable}`,
    startY: 50,
    theme: 'striped',
    headStyles: {
      fillColor: [a, b, c], // Cambiar a color naranja
      textColor: [d, e, f], // Cambiar el color del texto del encabezado
    },
    didDrawPage: () => {
      drawHeader();
      drawFooter();
    },
  });

  console.log(doc.output('datauristring'));

  // Abrir el PDF en una nueva ventana
  var pdfWindow = window.open('', '_blank');
  pdfWindow.document.open();
  pdfWindow.document.write(
    `<html><head><title>${pdfTitle}</title></head><body>`
  );
  pdfWindow.document.write(
    '<embed width="100%" height="100%" src="' +
      doc.output('datauristring') +
      '" type="application/pdf">'
  );
  pdfWindow.document.write('</body></html>');
  pdfWindow.document.close();
}

export function test(a) {
  return console.log(a);
}
