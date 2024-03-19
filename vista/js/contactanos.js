$(document).ready(function () {
  // Manejar el envío del formulario
  $("form").submit(function (event) {
    // Evitar el comportamiento predeterminado del formulario
    event.preventDefault();

    // Obtener los datos del formulario
    var formData = {
      nombre: $("#nombres").val(),
      email: $("#email").val(),
      celular: $("#telefono").val(),

    };
    // Enviar los datos mediante AJAX
    $.ajax({
      type: "POST",
      url: "controlador/contactenosControlador.php",
      data: formData,
      success: function (response) {
        console.log(response);
        // Manejar la respuesta del servidor
        if (response === "enviado") {
          // Mostrar mensaje de éxito
          Swal.fire({
            title: "¡Mensaje enviado!",
            text: "¡Tu mensaje ha sido enviado correctamente, nos pondremos en contacto contigo muy pronto!",
            icon: "success",
            showConfirmButton: false, 
            timer: 3000, // Cerrar automáticamente después de 3 segundos
          });
        } else {
          // Mostrar mensaje de error si la respuesta no es la esperada
          Swal.fire({
            title: "Error",
            text: "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.",
            icon: "error",
            showConfirmButton: false, 
            timer: 3000, // Cerrar automáticamente después de 3 segundos
          });
        }
      },
    });
  });
});
