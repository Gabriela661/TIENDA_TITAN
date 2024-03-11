$(document).ready(function () {

  /*FUNCION PARA ENVIAR DATOS AL CONTROLADOR*/
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
    /*FIN FUNCION PARA ENVIAR DATOS AL CONTROLADOR*/
    
  $(document).on("click", "#agregarCarritoBtn", function () {
      var id_producto = $(this).data("id_producto");
       var id_usuario = $(this).data("id_usuario");
    var cantidad_carrito = $("#cantidadProducto").val();


      // Crea un objeto FormData
      const formData = new FormData();
      formData.append("funcion", "añadir_carrito");
      formData.append("id_producto", id_producto); 
      formData.append("cantidad_carrito", cantidad_carrito); 
      formData.append("id_usuario", id_usuario); 

      // Envía los datos al controlador utilizando la función enviarDatos
      enviarDatos(
        "controlador/carritoControlador.php", // URL del controlador
        formData, // Datos del formulario
        function (response) {
          // Condicional de acuerdo a la respuesta del servidor
          if (response.trim() === "add_categoria") {
            // Muestra un mensaje de éxito utilizando SweetAlert
            Swal.fire({
              icon: "success",
              title: "Creación exitosa",
              text: "La categoria ha sido creada con éxito.",
            }).then(() => {
              // Limpia el formulario, actualiza la lista de categorías
              $("#form_categoria").trigger("reset");
              location.reload();
            });
          } else {
            // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Error al crear la categoria, vuelva a intentarlo",
            });
          }
        },
        function (error) {
          // Función de error: se ejecuta si hay un problema en la solicitud AJAX
          mostrarMensaje("noadd", "Error en la solicitud AJAX");
        }
      );
    });
    /*FIN FUNCION PARA AÑADIR UNA NUEVA CATEGORIA A LA BASE DE DATOS */
  });

