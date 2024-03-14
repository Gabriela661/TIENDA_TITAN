$(document).ready(function () {
  var funcion;
  var funcion = '';

  //listar
  roles();
  function roles(consulta) {
    funcion = 'roles';
    $.post(
      '../controlador/rolControlador.php',
      { consulta, funcion },
      (response) => {
        const roles = JSON.parse(response);
        console.log(roles)
        let template = '';
        let contador = 0; // Inicializamos el contador
        roles.forEach((rol) => {
          contador++; // Incrementamos el contador en cada iteración
          template += `
                <tr data-id="${rol.id_usuario}">
                  <th scope="row">${contador}</th>
                  <th scope="row">${rol.nombre_usuario}</th>
                  <th scope="row">${rol.apellido_usuario}</th>
                  <th scope="row">${rol.nombre_rol}</th>
                  <th scope="row"><button id="btn_editar" data-id_rol="${rol.id_usuario} type="button" class="btn btn-warning">
                        Editar rol
                     </button>
                    </th>           
                </tr>`;
        });
        $('#roles').html(template);

        // Inicializar DataTables después de cargar los datos en la tabla
        $('#rolesTable').DataTable({
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

  listar_roles();
  function listar_roles(consulta) {
    funcion = 'listar_roles';
    $.post(
      '../controlador/rolControlador.php',
      { consulta, funcion },
      (response) => {
        const roles = JSON.parse(response);
        console.log(roles);
        let options = '';
        let todosAgregado = false;

        roles.forEach((rol) => {
          if (!todosAgregado && rol.id_rol !== 0) {
            options += `<option value="0">Seleccione</option>`;
            todosAgregado = true; // Actualiza el estado de la variable
          }
          options += `<option value="${rol.id_rol}">${rol.nombre_rol}</option>`;
        });
        $('#rol_usuario').html(options);
      }
    );
  }

  //enviar dartos
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

  // Cargar para editar
  $(document).on('click', '#btn_editar', (e) => {
    funcion = 'cargar_rol';
    const id_rol = $(e.currentTarget).data('id_rol');
    $.post(
      '../controlador/rolControlador.php',
      { funcion, id_rol },
      (response) => {
        const rolEdit = JSON.parse(response);
        console.log(rolEdit);
        // Llenar el formulario con los datos de la empresa
        $('#nombre_user').val(rolEdit.nombre_usuario);
        $('#id_usuario').val(rolEdit.id_usuario);
        $('#rol_actual').val(rolEdit.nombre_rol);
        $('#id_rol').val(rolEdit.id_rol);
        // Mostrar el modal de edición
        $('#editarRol').modal('show');
      }
    );
  });
  //Editar
  $('#form_editar_rol').submit((e) => {
    e.preventDefault();
    const rol_usuario = $('#rol_usuario').val();
    const id_usuario = $('#id_usuario').val();
    const formData = new FormData();

    formData.append('funcion', 'editar_rol');
    formData.append('nuevo_id_rol', rol_usuario);
    formData.append('id_usuario', id_usuario);
    enviarDatos(
      '../controlador/rolControlador.php',
      formData,
      function (response) {
        console.log(response);
        if (response.trim() === 'edits') {
          Swal.fire({
            icon: 'success',
            title: 'Edición exitosa',
            text: 'El rol ha sido modificada con éxito.',
          }).then(() => {
            $('#form_editar_rol').trigger('reset');
            window.location.href = 'roles.php';
            $('#form_editar_rol').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Edicion Incorrecta del rol.',
          });
        }
      },
      function (error) {
        mostrarMensaje('noadd', 'Error en la solicitud AJAX');
      }
    );
  });
});
