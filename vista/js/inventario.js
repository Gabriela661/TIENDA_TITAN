$(document).ready(function () {
  var funcion;
  var funcion = '';

  //listar inventario en una tabla
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

          // Definir url parcial de la carpeta contenedora
          var url_parcial = `../vista/assets/img/${inventario.nombre_categoria}`;

          // Separar y guardar urls_imagenes en un array
          var urls_img = inventario['url_imagenes'].split(',');

          //Crear componentes img con sus urls imágenes
          var componente_imagenes = '';
          urls_img.map((i) => {
            componente_imagenes = `<img src="${url_parcial}/${i}" style="${imagenStyle}"  class="img-circle" alt="...">`;
          });
          contador++; // Incrementamos el contador en cada iteración
          template += `
                    <tr data-id="${inventario.id_producto}">
                    <th scope="row">${contador}</th>
                        <th scope="row">${inventario.nombre_producto}</th>
                        <th scope="row">${inventario.marca_producto}</th>                        
                        <th scope="row">${inventario.stock_producto}</th>
                        <th scope="row">${inventario.precio_producto}</th>                        
                        <th scope="row"><div class="text-center">
                        <img src="${inventario.imagen_producto}" style="${imagenStyle}"  class="img-circle" alt="...">
                      </div></th>
                        ${componente_imagenes}
                        <th scope="row"><button id="btn_editar" data-id_inventario="${inventario.id_producto}" type="button" class="btn btn-info">
                        Editar
                     </button></th>
                        <th scope="row"> <button id="btn_eliminar" class="btn btn-danger" data-id="${inventario.id_producto}">Eliminar</button>
                        </th>
                        `;
        });
        $('#inventario').html(template);
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
    const imagen_productos_s3 = $('#imagen_secundaria_3_producto')[0].files[0];
    console.log(imagen_producto_principal);

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
    formData.append('imagen_productos_s3', imagen_productos_s3);

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
            text: 'ssss.',
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
    console.log(id_producto);
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
      text: '¡No podrás revertir esto!, la informacion personal del usuario y compras realizadas tambien seran eliminadas',
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
            text: 'El Usuario ha sido eliminada con éxito.',
          }).then(() => {
            window.location.href = 'inventario.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo eliminar al Usuario.',
          });
        }
      }
    );
  }
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
