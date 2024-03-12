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

  /*FUNCION PARA AÑADIR UN PRODUCTO A CARRITO A LA BASE DE DATOS */
  $(document).on("click", "#agregarCarritoBtn", function () {
    var id_producto = $(this).data("id_producto");
    var id_usuario = $(this).data("id_usuario");
    var cantidad_carrito = $("#cantidadProducto").val();
   

  funcion = "verificar_existencia_carrito";
      $.post(
        "controlador/carritoControlador.php",
        { id_usuario, id_producto, funcion },
          (response) => {
              const existencia = JSON.parse(response);

              // Verificar si existencia es un array y tiene al menos un elemento
              if (Array.isArray(existencia) && existencia.length > 0) {
                  const cantidadEnCarrito = existencia[0].cantidad;
                  const id_carrito = existencia[0].id_carrito;
                  const formDataActualizar = new FormData();
                  formDataActualizar.append("funcion", "actualizar_carrito");
                  formDataActualizar.append("id_carrito", id_carrito);
                  formDataActualizar.append("cantidad_carrito", cantidad_carrito);

                  // Envía los datos al controlador utilizando la función enviarDatos
                  enviarDatos(
                    "controlador/carritoControlador.php",
                    formDataActualizar,
                    function (response) {
                      // Condicional de acuerdo a la respuesta del servidor
                      if (response.trim() === "Update_carrito") {
                        Swal.fire({
                          icon: "success",
                          title: "Producto añadido ",
                          text: "El producto se ha agregado al carrito",
                        }).then(() => {
                          cargarCarrito(id_usuario);
                          $("#modalCarrito").modal("show");
                        });
                      } else {
                        // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
                        Swal.fire({
                          icon: "error",
                          title: "Error",
                          text: "Error no se pudo agregar el producto al carrito de compras",
                        });
                      }
                    },
                    function (error) {
                      // Función de error: se ejecuta si hay un problema en la solicitud AJAX
                      mostrarMensaje("noadd", "Error en la solicitud AJAX");
                    }
                  );

              } else {
                  // Si no se encuentra nada, asignar cero a la cantidad
                  const cantidadEnCarrito = 0;
                  // Crea un objeto FormData
                  const formData = new FormData();
                  formData.append("funcion", "añadir_carrito");
                  formData.append("id_producto", id_producto);
                  formData.append("cantidad_carrito", cantidad_carrito);
                  formData.append("id_usuario", id_usuario);

                  // Envía los datos al controlador utilizando la función enviarDatos
                  enviarDatos(
                      "controlador/carritoControlador.php",
                      formData,
                      function (response) {
                          // Condicional de acuerdo a la respuesta del servidor
                          if (response.trim() === "add_carrito") {
                              Swal.fire({
                                  icon: "success",
                                  title: "Producto añadido ",
                                  text: "El producto se ha agregado al carrito",
                              }).then(() => {
                                  cargarCarrito(id_usuario);
                                  $("#modalCarrito").modal("show");
                              });
                          } else {
                              // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
                              Swal.fire({
                                  icon: "error",
                                  title: "Error",
                                  text: "Error no se pudo agregar el producto al carrito de compras",
                              });
                          }
                      },
                      function (error) {
                          // Función de error: se ejecuta si hay un problema en la solicitud AJAX
                          mostrarMensaje("noadd", "Error en la solicitud AJAX");
                      }
                  );
              }
          }

      );

  });
  /*FIN FUNCION PARA AÑADIR UN PRODUCTO A CARRITO A LA BASE DE DATOS */

  /*FUNCION PARA RESTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO */
  $(document).on("click", "#restarBtn", function () {
    var inputCantidad = $(this).next(".cantidadInput");
    var cantidad = parseInt(inputCantidad.val());

    if (cantidad > 1) {
      cantidad -= 1;
      inputCantidad.val(cantidad);
    }
  });
  /*FIN FUNCION PARA RESTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO */

  /*FUNCION PARA INCREMENTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO */
  $(document).on("click", "#sumarBtn", function () {
    var inputCantidad = $(this).prev(".cantidadInput");
    var cantidad = parseInt(inputCantidad.val());

    cantidad += 1;
    inputCantidad.val(cantidad);
  });
  /*FIN FUNCION PARA INCREMENTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO*/


  function cargarCarrito(consulta) {
    funcion = "cargarCarrito";
    $.post(
      "controlador/carritoControlador.php",
      { consulta, funcion },
      (response) => {
        console.log(response);
        const carrito = JSON.parse(response);
        let template = "";
        carrito.forEach((producto) => {
          template += `<div class="row">
                        <div class="col-auto">
                            <img src="${producto.imagen_producto}" alt="" style="height: 60px; width: 60px;">
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <div class="col">
                                    <label id="nombreProducto" name="nombreProducto" class="h4">${producto.nombre_producto}</label>
                                </div>
                                <div class="col-auto">
                                    <button data-id_carrito="${producto.id_carrito}" id="eliminarProducto"type="button" class="close" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label id="cantidad" name="cantidad" class="h5">${producto.cantidad_carrito} x ${producto.precio_producto}</label>
                                </div>
                            </div>
                        </div>
                    </div>`;
        });
        $("#carrito_contenedor").html(template);
        document.getElementById("subtotal").innerText =
          "Total: S/. " + producto.total_valor_carrito.toFixed(2);
      }
    );
  }
});
