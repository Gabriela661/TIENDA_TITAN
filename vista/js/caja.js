$(document).ready(function () {
  var funcion = '';

  var sumaCantidadTotalI = 0; // Variable para almacenar la suma de cantidad_total Ing
  var sumaCantidadTotalE = 0; // Variable para almacenar la suma de cantidad_total Egre

  listarIngresos();
  listarEgresos();

  function listarIngresos(consulta) {
    funcion = 'listarIngresos';
    var table = document.getElementById('ingresoTable');
    var editDelete = table.classList.contains('editdelete');
    $.post(
      '../controlador/cajaControlador.php',
      { consulta, funcion },
      (response) => {
        const ingresos = JSON.parse(response);
        let template = '';
        let contador = 0;

        ingresos.forEach((ingreso) => {
          contador++;
          template += `<tr data-id="${ingreso.id_caja}">
          <td>${contador}</td>
          <td>${ingreso.concepto}</td>
          <td>${ingreso.accion}</td>
          <td>${ingreso.monto}</td>
          <td>${ingreso.created_at}</td>`;
          if (editDelete) {
            template += `<td scope="row">  <button id="btn_editarCaja" class="btn btn-warning btn-editarAdm" type="button" data-toggle="modal" data-target="#editar_caja" data-id_caja="${ingreso.id_caja}"><i class="fas fa-edit"></i></button></td><td scope="row"><button class="btn btn-danger borrar_caja" data-id="${ingreso.id_caja}"><i class="fas fa-trash"></i></button></td>`;
          }

          template += `</tr>`;

          sumaCantidadTotalI += parseFloat(ingreso.monto); // Suma de cantidad_total
        });
        // Agregar fila con la suma de cantidad_total
        var totalI = `<h4>Ingreso: S/. <strong>${sumaCantidadTotalI}</strong></h4>`;

        $('#ingresoTotal').html(totalI);
        $('#ingresos_lista').html(template);
        var ingresoTable = $('#ingresoTable').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
          columnDefs: [{ className: 'text-center', targets: '_all' }],
        });

        $('a.toggle-visI').on('click', function (e) {
          e.preventDefault();

          // Get the column API object
          var column = ingresoTable.column($(this).attr('data-column'));

          // Toggle the visibility
          column.visible(!column.visible());
          // Cambiar el color del botón según su estado
          $(this).toggleClass('btn-success btn-secondary');
        });
      }
    );
  }

  function listarEgresos(consulta) {
    funcion = 'listarEgresos';
    var table = document.getElementById('egresoTable');
    var editDelete = table.classList.contains('editdelete');
    $.post(
      '../controlador/cajaControlador.php',
      { consulta, funcion },
      (response) => {
        const egresos = JSON.parse(response);
        let template = '';
        let contador = 0;

        egresos.forEach((egreso) => {
          contador++;
          template += `<tr data-id="${egreso.id_caja}">
            <td>${contador}</td>
            <td>${egreso.concepto}</td>
            <td>${egreso.accion}</td>
            <td>${egreso.monto}</td>
            <td>${egreso.created_at}</td>`;
          if (editDelete) {
            template += `<td scope="row">  <button id="btn_editarCaja" class="btn btn-warning btn-editarAdm" type="button"
            data-toggle="modal" data-target="#editar_caja" data-id_caja="${egreso.id_caja}"><i class="fas fa-edit"></i></button></td>
            <td scope="row"><button class="btn btn-danger borrar_caja" data-id="${egreso.id_caja}"><i class="fas fa-trash"></i></button></td>`;
          }

          template += `</tr>`;

          sumaCantidadTotalE += parseFloat(egreso.monto); // Suma de cantidad_total
        });
        // Agregar fila con la suma de cantidad_total
        var totalE = `<h4>Egreso: S/. <strong>${sumaCantidadTotalE}</strong></h4>`;

        $('#egresoTotal').html(totalE);
        $('#egresos_lista').html(template);

        // Inicializar DataTables después de cargar los datos en la tabla
        var egresoTable = $('#egresoTable').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
          columnDefs: [{ className: 'text-center', targets: '_all' }],
        });

        $('a.toggle-visE').on('click', function (e) {
          e.preventDefault();

          // Get the column API object
          var column = egresoTable.column($(this).attr('data-column'));

          // Toggle the visibility
          column.visible(!column.visible());
          // Cambiar el color del botón según su estado
          $(this).toggleClass('btn-success btn-secondary');
        });
      }
    );
  }

  /*
   * Esta función se utiliza para enviar datos al controlador del servidor mediante una solicitud AJAX.
   * Recibe los siguientes parámetros:
   *   - url: la URL a la que se enviarán los datos.
   *   - formData: los datos que se enviarán al servidor, generalmente en formato FormData.
   *   - successCallback: la función que se ejecutará si la solicitud es exitosa.
   *   - errorCallback: la función que se ejecutará si la solicitud produce un error.
   */
  function enviarDatos(url, formData, successCallback, errorCallback) {
    $.ajax({
      url: url,
      type: 'POST',
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      success: successCallback,
      error: errorCallback,
    });
  }
  /*FIN FUNCION PARA ENVIAR DATOS AL CONTROLADOR*/

  /*FUNCION PARA CARGAR DATOS DEL CLIENTE PARA EDITAR EN LA BASE DE DATOS*/
  $(document).on('click', '#btn_editarCaja', (e) => {
    e.preventDefault();
    // Se define la función a ejecutar en el controlador
    funcion = 'listar';
    const id_caja = $(e.currentTarget).data('id_caja');
    // Se realiza una solicitud AJAX para obtener la información de la categoría seleccionada
    $.post(
      '../controlador/cajaControlador.php',
      { funcion, id_caja },
      (response) => {
        const clienteEdit = JSON.parse(response);
        console.log(clienteEdit);
        // Se llena el modal de edicion
        $('#id_cajae').val(clienteEdit.id_caja);
        $('#actione').val(clienteEdit.accion);
        $('#conceptoe').val(clienteEdit.concepto);
        $('#montoe').val(clienteEdit.monto);
        $('#desce').val(clienteEdit.descripcion);
        // Mostrar el modal de edición
        $('#editar_caja').modal('hide');
      }
    );
  });

  /*FUNCION PARA editar UN registro de LA BASE DE DATOS*/
  $('#form_editar_caja').submit((e) => {
    e.preventDefault();
    // Se obtiene los valores del formulario
    const id_cajae = $('#id_cajae').val();
    const actione = $('#actione').val();
    const conceptoe = $('#conceptoe').val();
    const desce = $('#desce').val();
    const id_usuarioCe = $('#id_usuarioCe').val();
    const montoe = $('#montoe').val();

    // Crea un objeto FormData
    const formData = new FormData($('#form_editar_caja')[0]);
    console.log(id_cajae);
    formData.append('funcion', 'editar_caja');
    formData.append('id_cajae', id_cajae);
    formData.append('actione', actione);
    formData.append('conceptoe', conceptoe);
    formData.append('desce', desce);
    formData.append('id_usuarioCe', id_usuarioCe);
    formData.append('montoe', montoe);

    // Envía los datos al controlador utilizando la función enviarDatos
    enviarDatos(
      '../controlador/cajaControlador.php',
      formData,
      function (response) {
        console.log(response);
        // Condicional de acuerdo a la respuesta del servidor
        if (response.trim() === 'edits') {
          Swal.fire({
            icon: 'success',
            title: 'Edición exitosa',
            text: 'El movimiento de caja ha sido editada con éxito.',
          }).then(() => {
            $('#form_editar_caja').trigger('reset');
            window.location.href = 'caja.php';
            $('#form_editar_caja').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Edición Incorrecta de Movimiento',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });

  /*FUNCION PARA AGREGAR*/
  $('#form_caja').submit((e) => {
    e.preventDefault();
    // Se obtiene los valores del formulario
    const action = $('#action').val();
    const concepto = $('#concepto').val();
    const monto = $('#monto').val();
    const desc = $('#desc').val();
    const id_usuarioC = $('#id_usuarioC').val();

    // Crea un objeto FormData
    const formData = new FormData($('#form_caja')[0]);
    formData.append('funcion', 'crear_caja');
    formData.append('action', action);
    formData.append('desc', desc);
    formData.append('concepto', concepto);
    formData.append('monto', monto);
    formData.append('id_usuarioC', id_usuarioC);

    // Envía los datos al controlador utilizando la función enviarDatos
    enviarDatos(
      '../controlador/cajaControlador.php',
      formData,
      function (response) {
        console.log(response);
        // Condicional de acuerdo a la respuesta del servidor
        if (response.trim() === 'add') {
          Swal.fire({
            icon: 'success',
            title: 'Creación exitosa',
            text: 'El movimiento de caja ha sido creada con éxito.',
          }).then(() => {
            $('#form_usuario').trigger('reset');
            window.location.href = 'caja.php';
            $('#form_caja').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Creacion Incorrecta de movimiento caja',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });

  //funcion borrar
  $(document).on('click', '.borrar_caja', function () {
    const id_caja = $(this).data('id');
    Swal.fire({
      title: '¿Estás seguro?',
      text: '¡Se borrarán datos de el movimiento de caja!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminarlo',
    }).then((result) => {
      if (result.isConfirmed) {
        borrar_caja(id_caja);
      }
    });
  });

  // ELiminar datos del cliente
  function borrar_caja(id_caja) {
    const funcion = 'borrar_caja';
    $.post(
      '../controlador/cajaControlador.php',
      { id_caja, funcion },
      function (response) {
        console.log(response);
        if (response.trim() === 'delete') {
          Swal.fire({
            icon: 'success',
            title: 'Eliminación exitosa',
            text: 'El movimiento ha sido eliminado con éxito.',
          }).then(() => {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo eliminar movimiento.',
          });
        }
      }
    );
  }

  // Función para alternar entre mostrar y ocultar el valor
  $('#toggleButton').click(function () {
    var totalCaja = sumaCantidadTotalI - sumaCantidadTotalE;
    var valorMostrado = $('#valorMostrado').text();
    if (valorMostrado === '') {
      $('#valorMostrado').text(totalCaja);
      $('#eyeIcon').toggleClass('fa-eye fa-eye-slash');
      $('#toggleText').text('Ocultar Caja');
    } else {
      $('#valorMostrado').text('');
      $('#eyeIcon').toggleClass('fa-eye fa-eye-slash');
      $('#toggleText').text('Ver Caja');
    }
  });

  $(document).on('click', '#generatePDFIngreso', function () {
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
    const reportTitle = 'Reporte de Ingreso';

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

    // Obtener la tabla DataTable original
    var table = $('#ingresoTable').DataTable();

    // Clonar la tabla
    var $clonedTable = $('#ingresoTable').clone();

    // Obtener los índices de las columnas visibles
    var visibleColumns = table
      .columns()
      .indexes()
      .filter(function (index) {
        return table.column(index).visible();
      })
      .toArray();

    console.log(visibleColumns);

    // Eliminar las columnas no visibles de la tabla clonada
    $clonedTable.find('thead th').each(function (index, th) {
      if (visibleColumns.indexOf(index) === -1) {
        $(th[index]).remove();
      }
    });

    // Eliminar las celdas correspondientes en cada fila del cuerpo de la tabla clonada
    $clonedTable.find('tbody tr').each(function (rowIndex, tr) {
      $(tr)
        .find('td')
        .each(function (cellIndex, td) {
          if (!table.column(cellIndex).visible()) {
            $(td[cellIndex]).remove();
          }
        });
    });

    // Convertir la tabla clonada a una cadena HTML
    var tableHtml = $clonedTable.html();

    // Crear un elemento temporal
    var tempDiv = document.createElement('table');

    // Asignar la cadena HTML a la propiedad innerHTML del elemento temporal
    tempDiv.innerHTML = tableHtml;

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
      html: tempDiv,
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
      '<html><head><title>PDF Reporte de Ingresos</title></head><body>'
    );
    pdfWindow.document.write(
      '<embed width="100%" height="100%" src="' +
        doc.output('datauristring') +
        '" type="application/pdf">'
    );
    pdfWindow.document.write('</body></html>');
    pdfWindow.document.close();
  });

  $(document).on('click', '#generatePDFEgreso', function () {
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
    const reportTitle = 'Reporte de Egresos';

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

    // Obtener la tabla DataTable original
    var table = $('#egresoTable').DataTable();

    // Clonar la tabla
    var $clonedTable = $('#egresoTable').clone();

    // Obtener los índices de las columnas visibles
    var visibleColumns = table
      .columns()
      .indexes()
      .filter(function (index) {
        return table.column(index).visible();
      })
      .toArray();

    console.log(visibleColumns);

    // Eliminar las columnas no visibles de la tabla clonada
    $clonedTable.find('thead th').each(function (index, th) {
      if (visibleColumns.indexOf(index) === -1) {
        $(th[index]).remove();
      }
    });

    // Eliminar las celdas correspondientes en cada fila del cuerpo de la tabla clonada
    $clonedTable.find('tbody tr').each(function (rowIndex, tr) {
      $(tr)
        .find('td')
        .each(function (cellIndex, td) {
          if (!table.column(cellIndex).visible()) {
            $(td[cellIndex]).remove();
          }
        });
    });

    // Convertir la tabla clonada a una cadena HTML
    var tableHtml = $clonedTable.html();

    // Crear un elemento temporal
    var tempDiv = document.createElement('table');

    // Asignar la cadena HTML a la propiedad innerHTML del elemento temporal
    tempDiv.innerHTML = tableHtml;

    // Crear un elemento <div> dentro de tempDiv
    var divElement = document.createElement('div');

    // Agregar texto al elemento <div>
    divElement.textContent = 'Total Egreso: ' + sumaCantidadTotalE;

    // Agregar el elemento <div> al final de tempDiv
    tempDiv.appendChild(divElement);

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
      html: tempDiv,
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
      '<html><head><title>PDF Reporte de Egresos</title></head><body>'
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
