const admin = document.getElementsByClassName("btn-admin");
var personal = document.getElementsByClassName("btn-personal");
var cliente = document.getElementsByClassName("btn-cliente");

$(document).ready(function () {
  var funcion;
  var funcion = "";

  //personal
  if (personal) {
    listar_personal();
    function listar_personal(consulta) {
      funcion = "listar_personal";
      $.post(
        "../controlador/usuarioControlador.php",
        { consulta, funcion },
        (response) => {
          const personals = JSON.parse(response);
          let template = "";
          let contador = 0; // Inicializamos el contador
          personals.forEach((personal) => {
            let imagenStyle = `width: 50px; height: 50px;`;
            contador++; // Incrementamos el contador en cada iteración
            template += `
                    <tr data-id="${personal.id_usuario}">
                    <th scope="row">${contador}</th>
                        <th scope="row">${personal.nombres}</th>
                        <th scope="row">${personal.apellidos}</th>
                        <th scope="row">${personal.dni}</th>
                        <th scope="row">${personal.telefono}</th>
                        <th scope="row">${personal.correo_electronico}</th>
                        
                        <th scope="row">${personal.direccion_usuario}</th>
                        
                        <th scope="row"><div class="text-center">
                            <img src="${personal.foto_usuario}" style="${imagenStyle}"  class="img-circle" alt="...">
                          </div></th>
    
    
                        <th scope="row"> <button id="btn_editar" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_usuario" data-id_usuario="${personal.id_usuario}">
                                Editar
                            </button></th>
                        <th scope="row"><button class="btn btn-danger borrar_usuario" data-id="${personal.id_usuario}">Eliminar</button></th>
                        `;
          });
          $("#listar_personal").html(template);
        }
      );
    }
  }
  //cliente
  if (cliente) {
    listar_cliente();
    function listar_cliente(consulta) {
      funcion = "listar_cliente";
      $.post(
        "../controlador/usuarioControlador.php",
        { consulta, funcion },
        (response) => {
          const personals = JSON.parse(response);
          let template = "";
          let contador = 0; // Inicializamos el contador
          personals.forEach((personal) => {
            let imagenStyle = `width: 50px; height: 50px;`;
            contador++; // Incrementamos el contador en cada iteración
            template += `
                        <tr data-id="${personal.id_usuario}">
                        <th scope="row">${contador}</th>
                            <th scope="row">${personal.nombres}</th>
                            <th scope="row">${personal.apellidos}</th>
                            <th scope="row">${personal.dni}</th>
                            <th scope="row">${personal.telefono}</th>
                            <th scope="row">${personal.correo_electronico}</th>
                            
                            <th scope="row">${personal.direccion_usuario}</th>
                            
                            <th scope="row"><div class="text-center">
                                <img src="${personal.foto_usuario}" style="${imagenStyle}"  class="img-circle" alt="...">
                              </div></th>
    
                            <th scope="row">  <button id="btn_editar" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_usuario" data-id_usuario="${personal.id_usuario}">
                                Editar
                            </button></th>
                            <th scope="row"><button class="btn btn-danger borrar_usuario" data-id="${personal.id_usuario}">Eliminar</button></th>
                            `;
          });
          $("#listar_cliente").html(template);
        }
      );
    }
  }
});

//listar rol
rol_usuario();
function rol_usuario(consulta) {
  funcion = "rol_usuario";
  $.post(
    "../controlador/usuarioControlador.php",
    { consulta, funcion },
    (response) => {
      const rols = JSON.parse(response);
      options = "";
      rols.forEach((rol) => {
        options += `<option value="${rol.id_rol}">${rol.nombre_rol}</option>`;
      });
      $("#rol_usuario").html(options);
    }
  );
}

//funcion para enviar datos
function enviarDatos(url, formData, successCallback, errorCallback) {
  $.ajax({
    url: url,
    type: "POST",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: successCallback,
    error: errorCallback,
  });
}

//funcion advertencia de borrar datos
$(document).on("click", ".borrar_usuario", function () {
  const id_usuario = $(this).data("id");
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo",
  }).then((result) => {
    if (result.isConfirmed) {
      eliminarUsuario(id_usuario);
    }
  });
});

// ELiminar datos del usuario
function eliminarUsuario(id_usuario) {
  const funcion = "borrar_usuario";
  $.post(
    "../controlador/usuarioControlador.php",
    { id_usuario, funcion },
    function (response) {
      console.log(response);
      if (response.trim() === "delete") {
        Swal.fire({
          icon: "success",
          title: "Eliminación exitosa",
          text: "El Usuario ha sido eliminada con éxito.",
        }).then(() => {
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se pudo eliminar al Usuario.",
        });
      }
    }
  );
}

//guardar usuario nuevo
$("#form_usuario").submit((e) => {
  e.preventDefault();

  const nombre_usuario = $("#nombre_usuario").val();
  const apellido_usuario = $("#apellido_usuario").val();
  const dni_usuario = $("#dni_usuario").val();
  const telefono_usuario = $("#telefono_usuario").val();
  const correo_electronico_usuario = $("#correo_electronico_usuario").val();
  const password_usuario = $("#password_usuario").val();
  const direccion_usuario = $("#direccion_usuario").val();
  const foto_usuario = $("#foto_usuario")[0].files[0];
  const rol_usuario = $("#rol_usuario").val();
  const formData = new FormData($("#form_usuario")[0]);

  formData.append("funcion", "crear_usuario");

  formData.append("nombre_usuario", nombre_usuario);
  formData.append("apellido_usuario", apellido_usuario);
  formData.append("dni_usuario", dni_usuario);
  formData.append("telefono_usuario", telefono_usuario);
  formData.append("correo_electronico_usuario", correo_electronico_usuario);
  formData.append("password_usuario", password_usuario);
  formData.append("direccion_usuario", direccion_usuario);
  formData.append("foto_usuario", foto_usuario);
  formData.append("rol_usuario", rol_usuario);

  enviarDatos(
    "../controlador/usuarioControlador.php",
    formData,
    function (response) {
      console.log(response);
      if (response.trim() === "add") {
        Swal.fire({
          icon: "success",
          title: "Creación exitosa",
          text: "El usuario ha sido creada con éxito.",
        }).then(() => {
          $("#form_usuario").trigger("reset");
          window.location.href = "usuarios.php";
          $("#crear_usuario").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Creacion Incorrecta de Usuario",
        });
      }
    },
    function (error) {
      mostrarMensaje("noadd", "Error en la solicitud AJAX");
    }
  );
});

//previsalizar la imagen del usuario
previstaproducto();
function previstaproducto() {
  document
    .getElementById("foto_usuario")
    .addEventListener("change", function (event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = function (e) {
        const preview = document.getElementById("imagen_preview");
        preview.innerHTML =
          '<img src="' +
          e.target.result +
          '" style="max-width: 100px; max-height: 200px;">';
      };
      reader.readAsDataURL(file);
    });
}

// Cargar datos del usuario para editar
$(document).on("click", "#btn_editar", (e) => {
  e.preventDefault();
  funcion = "cargar_usuario";
  const id_usuario = $(e.currentTarget).data("id_usuario");
  console.log(id_usuario);
  $.post(
    "../controlador/usuarioControlador.php",
    { funcion, id_usuario },
    (response) => {
      console.log(response);
      const usuarioEdit = JSON.parse(response);
      // Llenar el formulario con los datos de la empresa
      $("#id_usuarioe").val(usuarioEdit.id_usuario);
      $("#nombre_usuarioe").val(usuarioEdit.nombres);
      $("#apellido_usuarioe").val(usuarioEdit.apellidos);
      $("#dni_usuarioe").val(usuarioEdit.dni);
      $("#telefono_usuarioe").val(usuarioEdit.telefono);
      $("#correo_electronico_usuarioe").val(usuarioEdit.correo_electronico);
      $("#direccion_usuarioe").val(usuarioEdit.direccion_usuario);
      // Mostrar el modal de edición
      $("#editar_usuarioe").modal("show");
    }
  );
});

//Editar usuario
$("#form_usuario_editar").submit((e) => {
  e.preventDefault();
  const id_usuarioe = $("#id_usuarioe").val();

  const nombrese = $("#nombre_usuarioe").val();
  const apellidose = $("#apellido_usuarioe").val();
  const dnie = $("#dni_usuarioe").val();
  const telefonoe = $("#telefono_usuarioe").val();
  const correo_electronicoe = $("#correo_electronico_usuarioe").val();
  const direccion_usuarioe = $("#direccion_usuarioe").val();
  console.log(nombrese);
  const formData = new FormData($("#form_usuario_editar")[0]);

  formData.append("funcion", "editar_usuario");
  formData.append("id_usuarioe", id_usuarioe);

  formData.append("nombrese", nombrese);
  formData.append("apellidose", apellidose);
  formData.append("dnie", dnie);
  formData.append("telefonoe", telefonoe);
  formData.append("correo_electronicoe", correo_electronicoe);
  formData.append("direccion_usuarioe", direccion_usuarioe);

  enviarDatos(
    "../controlador/usuarioControlador.php",
    formData,
    function (response) {
      console.log(response);
      if (response.trim() === "edits") {
        Swal.fire({
          icon: "success",
          title: "Edición exitosa",
          text: "Se edito con exito el usuario.",
        }).then(() => {
          $("#form_usuario_editar").trigger("reset");
          $("#editar_usuario").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          // Actualizar la página después de cerrar la alerta
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Creacion Incorrecta de Usuario.",
        });
      }
    },
    function (error) {
      mostrarMensaje("noadd", "Error en la solicitud AJAX");
    }
  );
});
