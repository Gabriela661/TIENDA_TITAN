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

  /* FUNCION PARA RESTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO */
  $(document).on("click", ".restarBtn", function () {
    var inputCantidad = $(this).parent().find(".cantidadInput");
    var cantidad = parseInt(inputCantidad.val());
    console.log(cantidad);

    if (cantidad > 1 && !isNaN(cantidad)) {
      cantidad -= 1;
      inputCantidad.val(cantidad);
    }
  });

  /* FUNCION PARA INCREMENTAR LA CANTIDAD DE LOS PRODUCTOS PARA EL CARRITO */
  $(document).on("click", ".sumarBtn", function () {
    var inputCantidad = $(this).parent().find(".cantidadInput");
    var cantidad = parseInt(inputCantidad.val());
    console.log(cantidad);

    if (!isNaN(cantidad)) {
      cantidad += 1;
      inputCantidad.val(cantidad);
    }
  });

  //FUNCION PARA AÑADIR AL CARRITO DESDE DETALLE PRODUCTO
  $(document).on("click", "#agregarCarritoBtndetalle", function () {
    //se obtienen los datos para agregar al carrito
    var id_producto = $(this).data("id_producto");
    const id_usuario = document.getElementById("id_usuario").value;
    var cantidad_carrito = parseInt($("#cantidad").val());
    console.log(id_producto);
    console.log(id_usuario);
    console.log(cantidad_carrito);

    //primero verificamos el stock disponible antes de agregar al carrito
    verificarStock(id_producto, cantidad_carrito, id_usuario);

    function verificarStock(id_producto, cantidad_carrito, id_usuario) {
      funcion = "verificarStock";
      $.post(
        "controlador/carritoControlador.php",
        { id_producto, cantidad_carrito, id_usuario, funcion },
        (response) => {
          var stock_disponible = parseInt(response);
          //obtenemos la cantidad disponble del producto y comparamos con la cantidad que quieren comprar, si hay stock se procede a verificar si ya existencia o no
          if (cantidad_carrito <= stock_disponible) {
            // console.log("si hay stock");
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
                  formDataActualizar.append(
                    "cantidad_carrito",
                    cantidad_carrito
                  );

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
                          text: "El producto seleccionado existe en el carrito, se le sumo la cantidad",
                          timer: 2000, // tiempo en milisegundos (2 segundos)
                          showConfirmButton: false, // oculta el botón de confirmación
                        }).then(() => {
                          $("#cantidad").val(1);
                          const id_usuario =
                            document.getElementById("id_usuario").value;
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
                  const id_usuario =
                    document.getElementById("id_usuario").value;
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
                          $("#cantidad").val(1);
                          document.getElementById("id_usuario").value;
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
          } else {
            // Mensaje de advertencia si no hay stock
            Swal.fire({
              icon: "error",
              title: "Error",
              text:
                stock_disponible +
                " unidades en stock del producto seleccionado",
            });
          }
        }
      );
    }
  });
  //FIN FUNCION PARA AÑADIR AL CARRITO DESDE DETALLE PRODUCTO

  /*FIN FUNCION PARA AÑADIR UN PRODUCTO A CARRITO A LA BASE DE DATOS */
  /*FUNCION PARA AÑADIR UN PRODUCTO A CARRITO A LA BASE DE DATOS */
  $(document).on("click", "#agregarCarritoBtn", function () {
    //se obtienen los datos para agregar al carrito
    var id_producto = $(this).data("id_producto");
    const id_usuario = document.getElementById("id_usuario").value;
    var inputCantidad = $(this).parent().find(".cantidadInput");
    var cantidad_carrito = parseInt(inputCantidad.val());

    //primero verificamos el stock disponible antes de agregar al carrito
    verificarStock(id_producto, cantidad_carrito, id_usuario);

    function verificarStock(id_producto, cantidad_carrito, id_usuario) {
      funcion = "verificarStock";
      $.post(
        "controlador/carritoControlador.php",
        { id_producto, cantidad_carrito, id_usuario, funcion },
        (response) => {
          var stock_disponible = parseInt(response);
          //obtenemos la cantidad disponble del producto y comparamos con la cantidad que quieren comprar, si hay stock se procede a verificar si ya existencia o no
          if (cantidad_carrito <= stock_disponible) {
            // console.log("si hay stock");
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
                  formDataActualizar.append(
                    "cantidad_carrito",
                    cantidad_carrito
                  );

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
                          text: "El producto seleccionado existe en el carrito, se le sumo la cantidad",
                          timer: 2000, // tiempo en milisegundos (2 segundos)
                          showConfirmButton: false, // oculta el botón de confirmación
                        }).then(() => {
                          inputCantidad.val(1);
                          const id_usuario =
                            document.getElementById("id_usuario").value;
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
                  const id_usuario =
                    document.getElementById("id_usuario").value;
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
                          inputCantidad.val(1);
                          document.getElementById("id_usuario").value;
                          cargarCarrito(id_usuario);
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
          } else {
            // Mensaje de advertencia si no hay stock
            Swal.fire({
              icon: "error",
              title: "Error",
              text:
                stock_disponible +
                " unidades en stock del producto seleccionado",
            });
          }
        }
      );
    }
  });
  /*FIN FUNCION PARA AÑADIR UN PRODUCTO A CARRITO A LA BASE DE DATOS */

  /*FUNCION PARA CARGAR LOS PRODUCTOS AL CARRITO*/
  function cargarCarrito(consulta) {
    funcion = "cargarCarrito";
    $.post(
      "controlador/carritoControlador.php",
      { consulta, funcion },
      (response) => {
        const carrito = JSON.parse(response);
        let subtotal = 0;
        let template = "";
        carrito.forEach((producto) => {
          template += `<div class="row">
                        <div class="col-auto">
                            <img src="${producto.imagen_producto}" alt="" style="height: 60px; width: 60px;">
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <div class="col">
                                    <h6 style="color:black" id="nombreProducto" name="nombreProducto" class="h6">${producto.nombre_producto}</h6>
                                </div>
                                <div class="col-auto">
                                    <button data-id_carrito="${producto.id_carrito}" data-id_usuario="1" id="eliminarProducto"type="button" class="btn-close" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label id="cantidad" name="cantidad" class="h6">${producto.cantidad_carrito} x ${producto.precio_con_descuento}</label>
                                </div>
                            </div>
                        </div>
                    </div>`;
          subtotal += producto.total_valor_carrito;
        });
        $("#carrito_contenedor").html(template);
        document.getElementById("subtotal").innerText =
          "Total: S/. " + subtotal.toFixed(2);
      }
    );
  }
  /*FIN FUNCION PARA CARGAR LOS PRODUCTOS AL CARRITO */

  /*FUNCION PARA MOSTRAR UN MENSAJE DE ADVERTENCIA AL QUERER LIMPIAR EL CARRITO*/
  $(document).on("click", "#btnLimpiarCarrito", function () {
    // const id_usuario = $(this).data("id_usuario");
    const id_usuario = document.getElementById("id_usuario").value;
    Swal.fire({
      title: "¿Estás seguro?",
      text: "¡Se eliminaran todos los productos del carrito",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí,quiero limpiar",
    }).then((result) => {
      if (result.isConfirmed) {
        limpiarCarrito(id_usuario);
      }
    });
  });
  /*FIN FUNCION PARA MOSTRAR UN MENSAJE DE ADVERTENCIA AL QUERER LIMPIAR EL CARRITO*/

  /*FUNCION LIMPIAR LOS PRODUCTOS DEL CARRITO*/
  function limpiarCarrito(id_usuario) {
    const funcion = "limpiarCarrito";
    $.post(
      "controlador/carritoControlador.php",
      { id_usuario, funcion },
      function (response) {
        if (response.trim() === "limpiado") {
          Swal.fire({
            icon: "success",
            title: "Limpieza exitosa",
            text: "Se limpiaron todos los productos del carrito",
            timer: 2000, // tiempo en milisegundos (3 segundos)
            showConfirmButton: false, // oculta el botón de confirmación
          }).then(() => {
            cargarCarrito(id_usuario);
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudo limpiar el carrito",
          });
        }
      }
    );
  }
  /*FIN FUNCION PARA LIMPIAR LOS PRODUCTOS DEL CARRITO */

  /*FUNCION PARA ELIMINAR UN PRODUCTO ESPECIFICO DEL CARRITO*/
  $(document).on("click", "#eliminarProducto", function () {
    const id_carrito = $(this).data("id_carrito");
    // const id_usuario = $(this).data("id_usuario");
    const id_usuario = document.getElementById("id_usuario").value;
    const funcion = "limpiarProductoCarrito";
    $.post(
      "controlador/carritoControlador.php",
      { id_carrito, funcion },
      function (response) {
        console.log(response);
        if (response.trim() === "producto_limpiado") {
          cargarCarrito(id_usuario);
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudo eliminar el producto del carrito",
          });
        }
      }
    );
  });
  /*FIN FUNCION PARA MOSTRAR UN MENSAJE DE ADVERTENCIA AL QUERER LIMPIAR EL CARRITO*/

  /*FUNCION PARA CERRAR EL MODAL*/
  // Obtener el botón de cierre del modal por su ID
  const closeButton = document.querySelector("#modalCarrito .btn-close");

  // Agregar un event listener para escuchar el clic en el botón de cierre
  closeButton.addEventListener("click", function () {
    // Cerrar el modal utilizando Bootstrap API
    const modal = document.getElementById("modalCarrito");
    if (modal) {
      const modalInstance = bootstrap.Modal.getInstance(modal);
      if (modalInstance) {
        modalInstance.hide();
      }
    }
  });
  /*FIN FUNCION PARA CERRAR EL MODAL*/
    $(document).on("click", "#ver_carrito", function () {
      // const id_usuario = $(this).data("id_usuario");
      const id_usuario = document.getElementById("id_usuario").value;
      cargarCarrito(id_usuario);
    });
});
