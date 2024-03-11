$(document).ready(function () {
  var funcion;
  var funcion = '';
  /* condicional para listar segun el rol del usuario*/
  /* FUNCION PARA LISTAR LOS USUARIOS DE LA BASE DE DATOS*/
  listar_personal();
  function listar_personal(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'listar_personal';
    $.post(
      '../controlador/usuarioControlador.php',
      { consulta, funcion },
      (response) => {
        const personals = JSON.parse(response);
        let template = '';
        let contador = 0; // Inicializamos el contador
        personals.forEach((personal) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          contador++; // Incrementamos el contador en cada iteración
          template += `
                    <tr data-id="${personal.id_usuario}">
                    <th scope="row">${contador}</th>
                        <th scope="row">${personal.nombre_usuario}</th>
                        <th scope="row">${personal.apellido_usuario}</th>
                        <th scope="row">${personal.correo_usuario}</th>                       
                        <th scope="row"><div class="text-center">
                            <img src="${personal.foto_usuario}" style="${imagenStyle}"  class="img-circle" alt="...">
                          </div></th>
                         <th scope="row">${personal.nombre_rol}</th>     
                        <th scope="row"> <button id="btn_editar" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_usuario" data-id_usuario="${personal.id_usuario}">
                                Editar
                            </button></th>
                        <th scope="row"><button class="btn btn-danger borrar_usuario" data-id="${personal.id_usuario}">Eliminar</button></th>
                        `;
        });
        $('#listar_personal').html(template);
      }
    );
  }

  /*FIN FUNCION PARA LISTAR LOS USUARIOS DE LA BASE DE DATOS*/

  /*FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/

  listar_cliente();
  function listar_cliente(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'listar_cliente';
    $.post(
      '../controlador/usuarioControlador.php',
      { consulta, funcion },
      (response) => {
        const clientes = JSON.parse(response);
        let template = '';
        let contador = 0; // Inicializamos el contador
        clientes.forEach((cliente) => {
          // Asignar tipo_cliente en comparación de usuario
          // Usuarios = (cliente online)
          // Usuarios != (cliente presencial), porque el id_usuario
          if (cliente.id_usuario == cliente.id_cliente) {
            tipo_cliente = 'Online';
          } else {
            tipo_cliente = 'Presencial';
          }
          contador++; // Incrementamos el contador en cada iteración
          template += `
                        <tr data-id="${cliente.id_cliente}">
                        <th scope="row">${contador}</th>
                            <th scope="row">${cliente.nombre_cliente}</th>
                            <th scope="row">${cliente.apellido_cliente}</th>
                            <th scope="row">${cliente.correo_cliente}</th>
                            <th scope="row">${tipo_cliente}</th>
                            <th scope="row">  <button id="btn_editarc" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_cliente" data-id_cliente="${cliente.id_cliente}">
                                Editar
                            </button></th>
                            <th scope="row"><button class="btn btn-danger borrar_cliente" data-id="${cliente.id_cliente}">Eliminar</button></th>
                            `;
        });
        $('#listar_clientes').html(template);
      }
    );
  }
  /*FIN FUNCION PARA LISTAR LOS CLIENTES DE LA BASE DE DATOS*/

  /*FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/
  rol_usuario();
  function rol_usuario(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'rol_usuario';
    $.post(
      '../controlador/usuarioControlador.php',
      { consulta, funcion },
      (response) => {
        const rols = JSON.parse(response);
        options = '';
        rols.forEach((rol) => {
          options += `<option value="${rol.id_rol}">${rol.nombre_rol}</option>`;
        });
        $('#rol_usuario').html(options);
      }
    );
  }
  /*FIN FUNCION PARA LISTAR LOS ROLES EN EL MODAL DE AGREGAR PRODUCTOS*/

  /*FUNCION PARA PREVISUALIZAR LA FOTO DE PERFIL DEL USUARIO*/
  previstaproducto();
  function previstaproducto() {
    document
      .getElementById('foto_usuario')
      .addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
          const preview = document.getElementById('imagen_preview');
          preview.innerHTML =
            '<img src="' +
            e.target.result +
            '" style="max-width: 100px; max-height: 200px;">';
        };
        reader.readAsDataURL(file);
      });
  }
  /*FIN FUNCION PARA PREVISUALIZAR LA FOTO DE PERFIL DEL USUARIO*/

  /*FUNCION PARA PREVISUALIZAR LA FOTO ACTUAL DEL PERFIL DEL USUARIO*/
  previstaproducto();
  function previstaproducto() {
    document
      .getElementById('foto_usuario')
      .addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
          const preview = document.getElementById('imagen_preview');
          preview.innerHTML =
            '<img src="' +
            e.target.result +
            '" style="max-width: 100px; max-height: 200px;">';
        };
        reader.readAsDataURL(file);
      });
  }
  /*FIN FUNCION PARA PREVISUALIZAR LA FOTO ACTUAL DEL USUARIO EN EL MODAL*/

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

  /*FUNCION PARA AGREGAR UN USUARIO A LA BASE DE DATOS*/
  $('#form_usuario').submit((e) => {
    e.preventDefault();
    // Se obtiene los valores del formulario
    const nombre_usuario = $('#nombre_usuario').val();
    const apellido_usuario = $('#apellido_usuario').val();
    const correo_electronico_usuario = $('#correo_electronico_usuario').val();
    const password_usuario = $('#password_usuario').val();
    const foto_usuario = $('#foto_usuario')[0].files[0];
    const rol_usuario = $('#rol_usuario').val();

    // Crea un objeto FormData
    const formData = new FormData($('#form_usuario')[0]);
    formData.append('funcion', 'crear_usuario');
    formData.append('nombre_usuario', nombre_usuario);
    formData.append('apellido_usuario', apellido_usuario);
    formData.append('correo_electronico_usuario', correo_electronico_usuario);
    formData.append('password_usuario', password_usuario);
    formData.append('foto_usuario', foto_usuario);
    formData.append('rol_usuario', rol_usuario);

    // Envía los datos al controlador utilizando la función enviarDatos
    enviarDatos(
      '../controlador/usuarioControlador.php',
      formData,
      function (response) {
        // Condicional de acuerdo a la respuesta del servidor
        if (response.trim() === 'add') {
          Swal.fire({
            icon: 'success',
            title: 'Creación exitosa',
            text: 'El usuario ha sido creada con éxito.',
          }).then(() => {
            $('#form_usuario').trigger('reset');
            window.location.href = 'usuarios.php';
            $('#crear_usuario').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Creacion Incorrecta de Usuario',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });
  /*FIN FUNCION PARA AGREGAR UN CLIENTE A LA BASE DE DATOS*/

  /*FUNCION PARA AGREGAR UN CLIENTE A LA BASE DE DATOS*/
  $('#form_cliente').submit((e) => {
    e.preventDefault();
    // Se obtiene los valores del formulario
    const nombre_cliente = $('#nombre_cliente').val();
    const apellido_cliente = $('#apellido_cliente').val();
    const correo_electronico_cliente = $('#correo_electronico_cliente').val();
    const contacto_cliente = $('#contacto_cliente').val();

    // Crea un objeto FormData
    const formData = new FormData($('#form_cliente')[0]);
    formData.append('funcion', 'crear_cliente');
    formData.append('nombre_cliente', nombre_cliente);
    formData.append('apellido_cliente', apellido_cliente);
    formData.append('correo_electronico_cliente', correo_electronico_cliente);
    formData.append('contacto_cliente', contacto_cliente);

    // Envía los datos al controlador utilizando la función enviarDatos
    enviarDatos(
      '../controlador/usuarioControlador.php',
      formData,
      function (response) {
        // Condicional de acuerdo a la respuesta del servidor
        if (response.trim() === 'add cliente') {
          Swal.fire({
            icon: 'success',
            title: 'Creación exitosa',
            text: 'El cliente ha sido creada con éxito.',
          }).then(() => {
            $('#form_cliente').trigger('reset');
            window.location.href = 'usuarios.php';
            $('#crear_cliente').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Creacion Incorrecta de cliente',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });
  /*FIN FUNCION PARA AGREGAR UN USUARIO A LA BASE DE DATOS*/

  /*FUNCION PARA CARGAR DATOS DEL CLIENTE PARA EDITAR EN LA BASE DE DATOS*/
  $(document).on('click', '#btn_editarc', (e) => {
    e.preventDefault();
    // Se define la función a ejecutar en el controlador
    funcion = 'cargar_cliente';
    const id_cliente = $(e.currentTarget).data('id_cliente');
    // Se realiza una solicitud AJAX para obtener la información de la categoría seleccionada
    $.post(
      '../controlador/usuarioControlador.php',
      { funcion, id_cliente },
      (response) => {
        const clienteEdit = JSON.parse(response);
        // Se llena el modal de edicion
        $('#id_clientee').val(clienteEdit.id_cliente);
        $('#nombre_clientee').val(clienteEdit.nombre_cliente);
        $('#apellido_clientee').val(clienteEdit.apellido_cliente);
        $('#correo_clientee').val(clienteEdit.correo_cliente);
      }
    );
  });
  /*FIN FUNCION PARA CARGAR DATOS DEL CLIENTE PARA EDITAR EN LA BASE DE DATOS*/

  //Editar cliente
  $('#form_cliente_editar').submit((e) => {
    e.preventDefault();
    const id_clientee = $('#id_clientee').val();

    const nombrese = $('#nombre_clientee').val();
    const apellidose = $('#apellido_clientee').val();
    const correo_clientee = $('#correo_clientee').val();
    console.log(nombrese);
    const formData = new FormData($('#form_cliente_editar')[0]);

    formData.append('funcion', 'editar_cliente');
    formData.append('id_clientee', id_clientee);

    formData.append('nombrese', nombrese);
    formData.append('apellidose', apellidose);
    formData.append('correo_clientee', correo_clientee);

    enviarDatos(
      '../controlador/usuarioControlador.php',
      formData,
      function (response) {
        console.log(response);
        if (response.trim() === 'edits') {
          Swal.fire({
            icon: 'success',
            title: 'Edición exitosa',
            text: 'Se edito con exito el cliente.',
          }).then(() => {
            $('#form_cliente_editar').trigger('reset');
            window.location.href = 'usuarios.php';
            $('#form_cliente_editar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            // Actualizar la página después de cerrar la alerta
            location.reload();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Edición Incorrecta de cliente.',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });


  /*FUNCION PARA CARGAR DATOS DEL USUARIO PARA EDITAR EN LA BASE DE DATOS*/
  $(document).on('click', '#btn_editar', (e) => {
    e.preventDefault();
    // Se define la función a ejecutar en el controlador
    funcion = 'cargar_usuario';
    const id_usuario = $(e.currentTarget).data('id_usuario');
    // Se realiza una solicitud AJAX para obtener la información de la categoría seleccionada
    $.post(
      '../controlador/usuarioControlador.php',
      { funcion, id_usuario },
      (response) => {
        const usuarioEdit = JSON.parse(response);
        // Se llena el modal de edicion
        $('#id_usuarioe').val(usuarioEdit.id_usuario);
        $('#nombre_usuarioe').val(usuarioEdit.nombre_usuario);
        $('#apellido_usuarioe').val(usuarioEdit.apellido_usuario);
        $('#correo_usuarioe').val(usuarioEdit.correo_usuario);

        // Mostrar el modal de edición
        $('#editar_usuarioe').modal('hide');
      }
    );
  });
  /*FIN FUNCION PARA CARGAR DATOS DEL USUARIO PARA EDITAR EN LA BASE DE DATOS*/

    //Editar usuario
    $('#form_usuario_editar').submit((e) => {
      e.preventDefault();
      const id_usuarioe = $('#id_usuarioe').val();
  
      const nombrese = $('#nombre_usuarioe').val();
      const apellidose = $('#apellido_usuarioe').val();
      const correo_usuarioe = $('#correo_usuarioe').val();
      const formData = new FormData($('#form_usuario_editar')[0]);
  
      formData.append('funcion', 'editar_usuario');
      formData.append('id_usuarioe', id_usuarioe);
  
      formData.append('nombrese', nombrese);
      formData.append('apellidose', apellidose);
      formData.append('correo_electronicoe', correo_usuarioe);
  
      enviarDatos(
        '../controlador/usuarioControlador.php',
        formData,
        function (response) {
          console.log(response);
          if (response.trim() === 'edits') {
            Swal.fire({
              icon: 'success',
              title: 'Edición exitosa',
              text: 'Se edito con exito el usuario.',
            }).then(() => {
              $('#form_usuario_editar').trigger('reset');
              window.location.href = 'usuarios.php';
              $('#form_usuario_editar').modal('hide');
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              // Actualizar la página después de cerrar la alerta
              location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Edición Incorrecta de Usuario.',
            });
          }
        },
        function (error) {
          mostrarMensaje('noadd', 'Error en la solicitud AJAX');
        }
      );
    });

  //funcion advertencia de borrar datos
  $(document).on('click', '.borrar_usuario', function () {
    const id_usuario = $(this).data('id');
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
        eliminarUsuario(id_usuario);
      }
    });
  });

  //funcion borrar
  $(document).on('click', '.borrar_usuario', function () {
    const id_usuario = $(this).data('id');
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
        eliminarUsuario(id_usuario);
      }
    });
  });

  // ELiminar datos del usuario
  function eliminarUsuario(id_usuario) {
    const funcion = 'borrar_usuario';
    $.post(
      '../controlador/usuarioControlador.php',
      { id_usuario, funcion },
      function (response) {
        console.log(response);
        if (response.trim() === 'delete') {
          Swal.fire({
            icon: 'success',
            title: 'Eliminación exitosa',
            text: 'El Usuario ha sido eliminada con éxito.',
          }).then(() => {
            location.reload();
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
