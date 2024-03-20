document.getElementById("registro").addEventListener("click", function () {
  document.querySelector(".login").classList.add("hide");
  document.querySelector(".register").classList.remove("hide");
});

document.getElementById("loguear").addEventListener("click", function () {
  document.querySelector(".register").classList.add("hide");
  document.querySelector(".login").classList.remove("hide");
});

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
$("#registrar_cliente").submit((e) => {
  e.preventDefault();

  const nombre_usuario = $("#nombre_usuario").val();
  const apellido_usuario = $("#apellido_usuario").val();
  const telefono_usuario = $("#telefono_usuario").val();
  const dni_usuario = "5";
  const correo_electronico_usuario = $("#correo_electronico_usuario").val();
  const password_usuario = $("#password_usuario").val();
  const direccion_usuario = $("#direccion_usuario").val();
  const foto_usuario = $("#foto_usuario")[0].files[0];
  const rol_usuario = 3;
  const formData = new FormData($("#registrar_cliente")[0]);

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
    "controlador/usuarioControlador.php",
    formData,
    function (response) {
      console.log(response);
      if (response.trim() === "add") {
        Swal.fire({
          icon: "success",
          title: "Creación exitosa",
          text: "El usuario ha sido creado con éxito.",
        }).then(() => {
          $("#registrar_cliente").trigger("reset");
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Creacion Incorrecta de Usuario, ingrese todos los datos del usuario",
        });
      }
    },
    function (error) {
      mostrarMensaje("noadd", "Error en la solicitud AJAX");
    }
  );
});
