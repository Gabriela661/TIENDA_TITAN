$(document).ready(function () {
  var funcion;
  var funcion = '';

  //listar inventario en una tabla

  document
    .getElementById('imagen_preview1')
    .addEventListener('click', function () {
      document.getElementById('imagen_principal_producto').click();
    });

  document
    .getElementById('imagen_preview2')
    .addEventListener('click', function () {
      document.getElementById('imagen_secundaria_1_producto').click();
    });

  document
    .getElementById('imagen_preview3')
    .addEventListener('click', function () {
      document.getElementById('imagen_secundaria_2_producto').click();
    });

  document
    .getElementById('imagen_preview4')
    .addEventListener('click', function () {
      document.getElementById('imagen_secundaria_3_producto').click();
    });

  inventario();

  function inventario(consulta) {
    funcion = 'inventario';
    $.post(
      '../controlador/inventarioControlador.php',
      { consulta, funcion },
      (response) => {
        const inventarios = JSON.parse(response);
        let template = '';
        let contador = 0; // Inicializamos el contador
        inventarios.forEach((inventario) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          var carpetaContenedora = inventario.nombre_categoria;
          // Definir url parcial de la carpeta contenedora
          var url_parcial = `../vista/assets/img/${carpetaContenedora.toLowerCase()}`;

          // Separar y guardar urls_imagenes en un array
          var urls_img = inventario['url_imagenes'].split(',');
          console.log(urls_img, inventario.id_producto);
          var ImgName = 'default_producto.png';
          urls_img.map((img) => {
            if (img != 'default_producto.png') {
              ImgName = img;
              return;
            }
          });

          var imagenSrc = url_parcial + '/' + ImgName;

          //Crear componentes img con sus urls imágenes
          /*           urls_img.map((i) => {
            console.log(first)
            componente_imagenes = `<img src="${url_parcial}/${i}" style="${imagenStyle}"  class="img-circle" alt="...">`;
          }); */
          contador++; // Incrementamos el contador en cada iteración
          template += `
                    <tr data-id="${inventario.id_producto}">
                    <td scope="row">${contador}</td>
                        <td scope="row">${inventario.nombre_producto}</td>
                        <td scope="row">${inventario.marca_producto}</td>                        
                        <td scope="row">${inventario.stock_producto}</td>
                        <td scope="row">${inventario.precio_producto}</td>                        
                        <td scope="row"><div class="text-center">
                        <img src="${imagenSrc}" style="${imagenStyle}"  class="img-circle" alt="...">
                      </div></td>                        
                        <td scope="row"><button id="btn_editar" data-id_inventario="${inventario.id_producto}" type="button" class="btn btn-info">
                        Editar
                     </button></td>
                        <td scope="row"> <button id="btn_eliminar" class="btn btn-danger" data-id="${inventario.id_producto}">Eliminar</button>
                        </td>
                        `;
        });
        $('#inventario').html(template);
        // Inicializar DataTables después de cargar los datos en la tabla
        var inventarioTable = $('#inventarioTable').DataTable({
          paging: true,
          searching: false,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
        });
        $('a.toggle-visIn').on('click', function (e) {
          e.preventDefault();

          // Traemos datos de la columna relaciona al botón clicked
          var column = inventarioTable.column($(this).attr('data-column'));

          column.visible(!column.visible());

          // change color
          $(this).toggleClass('btn-success btn-secondary');
        });
      }
    );
  }

  //listar categoria en el select
  listar_categoria();
  function listar_categoria(consulta) {
    funcion = 'listar_categoria';
    $.post(
      '../controlador/inventarioControlador.php',
      { consulta, funcion },
      (response) => {
        const categorias = JSON.parse(response);
        let options = '';
        let todosAgregado = false;

        categorias.forEach((categoria) => {
          if (!todosAgregado && categoria.id_categoria !== 0) {
            options += `<option value="0">Seleccione</option>`;
            todosAgregado = true; // Actualiza el estado de la variable
          }
          options += `<option value="${categoria.id_categoria}">${categoria.nombre_categoria}</option>`;
        });
        $('#categoria_producto').html(options);
      }
    );
  }

  //enviar datos
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
  //enviar formulario para agregar producto
  $('#form_inventario').submit((e) => {
    e.preventDefault();

    const codigo_producto = $('#codigo_producto').val();
    const nombre_producto = $('#nombre_producto').val();
    const precio_producto = $('#precio_producto').val();
    const descripcion_producto = $('#descripcion_producto').val();
    const cantidad_producto = $('#cantidad_producto').val();
    const marca_producto = $('#marca_producto').val();
    const categoria_producto = $('#categoria_producto').val();
    const categoria_text = $('#categoria_producto option:selected').text();
    // Cambiado de file[0] a files[0]
    const imagen_producto_principal = $('#imagen_principal_producto')[0]
      .files[0];
    const imagen_producto_s1 = $('#imagen_secundaria_1_producto')[0].files[0];
    const imagen_producto_s2 = $('#imagen_secundaria_2_producto')[0].files[0];
    const imagen_producto_s3 = $('#imagen_secundaria_3_producto')[0].files[0];
    console.log(imagen_producto_principal);
    console.log(imagen_producto_s1);
    console.log(imagen_producto_s2);
    console.log(imagen_producto_s3);

    const formData = new FormData($('#form_inventario')[0]);
    formData.append('funcion', 'crear_producto');
    formData.append('nombre_producto', nombre_producto);
    formData.append('codigo_producto', codigo_producto);
    formData.append('precio_producto', precio_producto);
    formData.append('descripcion_producto', descripcion_producto);
    formData.append('cantidad_producto', cantidad_producto);
    formData.append('marca_producto', marca_producto);
    formData.append('categoria_producto', categoria_producto);
    formData.append('categoria_text', categoria_text);
    formData.append('imagen_producto_principal', imagen_producto_principal);
    formData.append('imagen_producto_s1', imagen_producto_s1);
    formData.append('imagen_producto_s2', imagen_producto_s2);
    formData.append('imagen_producto_s3', imagen_producto_s3);

    enviarDatos(
      '../controlador/inventarioControlador.php',
      formData,
      function (response) {
        console.log(response);
        if (response.trim() === 'Producto Agregado') {
          Swal.fire({
            icon: 'success',
            title: 'Creación exitosa',
            text: 'El producto se creo con éxito.',
          }).then(() => {
            $('#form_inventario').trigger('reset');
            inventario();
            $('#crearInventario').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            window.location.href = 'inventario.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al crear, intente de nuevo.',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });

  //Previsualicaion de la imagen del producto al momento de registrar
  var id_imagenes = [
    'imagen_principal_producto',
    'imagen_secundaria_1_producto',
    'imagen_secundaria_2_producto',
    'imagen_secundaria_3_producto',
  ];
  previstaproducto(id_imagenes);
  function previstaproducto(id_imagenes) {
    id_imagenes.map((id_imagen, i) => {
      document
        .getElementById(`${id_imagen}`)
        .addEventListener('change', function (event) {
          var file = event.target.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
            var preview = document.getElementById(`imagen_preview${i + 1}`);
            preview.innerHTML =
              '<img src="' +
              e.target.result +
              '" style="max-width: 100px; max-height: 200px;">';
          };
          reader.readAsDataURL(file);
        });
    });
  }

  // Cargar inventario para editar
  $(document).on('click', '#btn_editar', (e) => {
    e.preventDefault();
    funcion = 'cargar_inventario';
    const id_producto = $(e.currentTarget).data('id_inventario');
    console.log($(e.currentTarget));
    $.post(
      '../controlador/inventarioControlador.php',
      { funcion, id_producto },
      (response) => {
        console.log(response);
        const inventarioEdit = JSON.parse(response);
        // Llenar el formulario con los datos de la empresa
        $('#id_editar').val(inventarioEdit.id_producto);
        $('#nombre_editar').val(inventarioEdit.nombre_producto);
        $('#precio_editar').val(inventarioEdit.precio_producto);
        $('#descripcion_editar').val(inventarioEdit.descripcion_producto);
        $('#cantidad_editar').val(inventarioEdit.stock_producto);
        $('#marca_editar').val(inventarioEdit.marca_producto);
        // Mostrar el modal de edición
        $('#editarInventario').modal('show');
      }
    );
  });
  //Editar inventario
  $('#editarInventario').submit((e) => {
    e.preventDefault();
    const id_productoe = $('#id_editar').val();
    const nombre_productoe = $('#nombre_editar').val();
    const precio_productoe = $('#precio_editar').val();
    const descripcion_productoe = $('#descripcion_editar').val();
    const cantidad_productoe = $('#cantidad_editar').val();
    const marca_productoe = $('#marca_editar').val();

    const formData = new FormData();

    formData.append('funcion', 'editar_inventario');

    formData.append('id_productoe', id_productoe);
    formData.append('nombre_productoe', nombre_productoe);
    formData.append('precio_productoe', precio_productoe);
    formData.append('descripcion_productoe', descripcion_productoe);
    formData.append('cantidad_productoe', cantidad_productoe);
    formData.append('marca_productoe', marca_productoe);

    enviarDatos(
      '../controlador/inventarioControlador.php',
      formData,
      function (response) {
        console.log(response);
        if (response.trim() === 'edits') {
          Swal.fire({
            icon: 'success',
            title: 'Edición exitosa',
            text: 'El producto ha sido modificada con éxito.',
          }).then(() => {
            $('#editarInventario').trigger('reset');
            window.location.href = 'inventario.php';
            $('#editarInventario').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Edicion Incorrecta del producto.',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });

  //alerta de eliminar producto
  $(document).on('click', '#btn_eliminar', function () {
    const id_producto_eliminar = $(this).data('id');
    Swal.fire({
      title: '¿Estás seguro?',
      text: '¡No podrás revertir esto!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminarlo',
    }).then((result) => {
      if (result.isConfirmed) {
        eliminarProducto(id_producto_eliminar);
      }
    });
  });
  //funcion eliminar producto
  function eliminarProducto(id_producto_eliminar) {
    const funcion = 'borrar_producto';
    $.post(
      '../controlador/inventarioControlador.php',
      { id_producto_eliminar, funcion },
      function (response) {
        console.log(response);
        if (response.trim() === 'delete') {
          Swal.fire({
            icon: 'success',
            title: 'Eliminación exitosa',
            text: 'El producto ha sido eliminado con éxito.',
          }).then(() => {
            window.location.href = 'inventario.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo eliminar el producto.',
          });
        }
      }
    );
  }
});

$(document).on('click', '#generatePDFInventario', function () {
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
  const reportTitle = 'Reporte de Inventario';

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
  var table = $('#inventarioTable').DataTable();

  // Clonar la tabla
  var $clonedTable = $('#inventarioTable').clone();

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
    '<html><head><title>PDF Reporte de Inventario</title></head><body>'
  );
  pdfWindow.document.write(
    '<embed width="100%" height="100%" src="' +
      doc.output('datauristring') +
      '" type="application/pdf">'
  );
  pdfWindow.document.write('</body></html>');
  pdfWindow.document.close();
});

$(document).ready(function () {
  // Función para filtrar los resultados de la tabla según el texto de búsqueda
  $('#buscar').on('input', function () {
    var searchText = $(this).val().toLowerCase(); // Obtener el texto de búsqueda y convertirlo a minúsculas
    $('#inventario tr').filter(function () {
      // Filtrar las filas de la tabla
      $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1); // Mostrar u ocultar la fila según si contiene el texto de búsqueda
    });
  });
});
