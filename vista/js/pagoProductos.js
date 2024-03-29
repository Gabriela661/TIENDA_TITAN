
$(document).ready(function () {
    obtenerNumeroFactura();

    /*FUNCION PARA OBTENER EL NUMERO DE FACTURA*/
    function obtenerNumeroFactura() {
      const funcion = "obtenerNumeroFactura";
      $.post(
        "controlador/productosControlador.php",
        { funcion },
        function (response) {
          console.log(response);
          let numeroFactura = parseInt(response.trim()); // Convierte el texto a un número entero
          if (!isNaN(numeroFactura)) {
            // Suma 1 al número de factura
            numeroFactura = numeroFactura + 1;
            $("#numeroFactura").val(numeroFactura);
          } else {
            console.error(
              "La respuesta no contiene un número de factura válido."
            );
          }
        }
      );
    }
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
 const id_usuario = document.getElementById("id_usuario").value;
  cargarProductosPago(id_usuario);

  /*FUNCION PARA CARGAR LOS PRODUCTOS AL PROCESO DE PAGO*/
 let productosSeleccionados = [];
  function cargarProductosPago(consulta) {
    funcion = "cargarProductosPago";
    total = 0;
    $.post(
      "controlador/pagoProductosControlador.php",
      { consulta, funcion },
      (response) => {
        const productos = JSON.parse(response);
        // Define un arreglo para almacenar los productos seleccionados

        // Itera sobre los productos recibidos
        productos.forEach((producto) => {
          // Extrae los campos de precio, cantidad y nombre y guárdalos en un objeto
          let productoSeleccionado = {
            nombre: producto.nombre_producto,
            cantidad: producto.cantidad_carrito,
            precio: producto.precio_producto,
          };

          // Agrega el producto seleccionado al arreglo de productos seleccionados
          productosSeleccionados.push(productoSeleccionado);
        });

        // Convierte el arreglo de productos seleccionados a una cadena JSON
        let productosJSON = JSON.stringify(productosSeleccionados);

        // Asigna la cadena JSON al valor del input
        $("#producto_json").val(productosJSON);

        // Aquí puedes hacer lo que quieras con el arreglo de productos seleccionados

        let template = "";
        productos.forEach((producto) => {
          template += `
          <div class="row">
          <tr>
                        <th>${producto.nombre_producto}</th>
                        <th>${producto.cantidad_carrito}</th>
                        <th>${producto.subtotal}</th>
                        </tr>
                     </div>
            `;
          total += producto.subtotal;
        });
        $("#totalCompra").html(total.toFixed(2));
        $("#productos_carrito").html(template);
      }
    );
  }

  
  $("#venta1").click(function () {
    var fechaEmision = document.getElementById("fecha_emision").value;
    var fechaVencimiento = document.getElementById("fecha_vencimiento").value;
    var razonSocial = document.getElementById("razon_social").value;
    var ruc = document.getElementById("ruc").value;
    var direccion = document.getElementById("direccion").value;
    var tipoMoneda = document.getElementById("tipo_moneda").value;
    var observaciones = document.getElementById("observaciones").value;

    console.log("Fecha de emisión:", fechaEmision);
    console.log("Fecha de vencimiento:", fechaVencimiento);
    console.log("Razón social:", razonSocial);
    console.log("RUC:", ruc);
    console.log("Dirección del cliente:", direccion);
    console.log("Tipo de Moneda:", tipoMoneda);
    console.log("Observaciones:", observaciones);

    console.log("productosSeleccionados")
    // Convertir el carrito a JSON
    var productos = JSON.stringify(productosSeleccionados);
    // Enviar la solicitud POST para generar el PDF
    fetch("controlador/facturaControlador.php", {
      method: "POST",
      body: JSON.stringify({
        productos: productos,
        fechaEmision: fechaEmision,
        fechaVencimiento: fechaVencimiento,
        razonSocial: razonSocial,
        ruc: ruc,
        direccion: direccion,
        tipoMoneda: tipoMoneda,
        observaciones: observaciones,
      }),
    })
      .then((response) => response.blob())
      .then((blob) => {
        const url = window.URL.createObjectURL(blob);

        // Abrir el PDF en otra pestaña
        window.open(url, "_blank");

        // Limpiar la URL creada
        window.URL.revokeObjectURL(url);
      })
      .catch((error) => {
        console.error("Error en la solicitud POST:", error);
      });
  });

  /*FIN FUNCION PARA CARGAR LOS  PRODUCTOS AL PROCESO DE PAGO */

  /*FUNCION LIMPIAR LOS PRODUCTOS DEL CARRITO*/
  function actualizarStock(id_usuario) {
    const funcion = "actualizarStock";
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



  // Obtener referencia al botón y al campo de entrada
  const notificarPagoBtn = document.getElementById("notificar_pago");
  const codigoConfirmacionDiv = document.getElementById("codigo_confirmacion");

  // Escuchar clic en el botón "Notificar pago"
  notificarPagoBtn.addEventListener("click", function () {
    // Mostrar el campo de entrada del código de confirmación
    codigoConfirmacionDiv.style.display = "block";
  });

  // Función para cuando se seleccione Yape
  function image() {
    // Si el checkbox de Yape está seleccionado
    if ($("#imagen").prop("checked")) {
      // Agregar el método Yape al atributo data-metodo del botón notificar_pago
      $("#notificar_pago").data("metodo", "Yape");
    } else {
      // Si no está seleccionado, eliminar el atributo data-metodo
      $("#notificar_pago").removeData("metodo");
    }
  }

  // Utilizar eventos jQuery para detectar cambios en los checkboxes
  $(document).ready(function () {
    // Evento change en el checkbox de Yape
    $("#imagen").change(function () {
      if ($(this).prop("checked")) {
        console.log("Yape seleccionado");
         $("#metodo").val("Yape");
        // Al seleccionar Yape, configurar el atributo data-metodo en el botón
        $("#notificar_pago").data("metodo", "Yape");
        $("#metodo_pago").val("Yape");
      } else {
          $("#metodo").val("");
        console.log("Yape no seleccionado");
        // Si se deselecciona Yape, eliminar el atributo data-metodo del botón
        $("#notificar_pago").removeData("metodo");
        $("#metodo_pago").val("");
      }
    });

    // Evento change en el checkbox de Plin
    $("#imagen1").change(function () {
      if ($(this).prop("checked")) {
        $("#metodo").val("Plin");
        // Al seleccionar Plin, configurar el atributo data-metodo en el botón
        $("#notificar_pago").data("metodo", "Plin");
        $("#metodo_pago").val("Plin");
      } else {
         $("#metodo").val("");
        // Si se deselecciona Plin, eliminar el atributo data-metodo del botón
        $("#notificar_pago").removeData("metodo");
        $("#metodo_pago").val("");
      }
    });

    // Evento click en el botón notificar_pago
    $("#notificar_pago").click(function () {

    var razonSocial = document.getElementById("razon_social").value;
    var ruc = document.getElementById("ruc").value;
    var direccion = document.getElementById("direccion").value;

      var metodo = $(this).data("metodo"); // Obtener el método almacenado en el atributo data-metodo

      var telefono = $("#telefono").val();

      // Verificar si los campos están llenos
      if (razonSocial === "" || ruc === "" || direccion === "" || telefono === "") {
        // Mostrar un mensaje de error con SweetAlert2
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Por favor complete todos los campos de detalle de la factura",
        });
      } else {
        // Comprobar si se ha seleccionado un método de pago
        if (metodo) {
          // Realizar la solicitud al controlador con el método y el teléfono
          $.post(
            "controlador/pagoFacturaControlador.php",
            { telefono: telefono, metodo: metodo },
            function (data, status) {
              console.log(data);
              if (status === "success" && data === "Mensaje enviado") {
                // Mostrar SweetAlert2 como notificación
                Swal.fire({
                  title: "Notificado",
                  text: "El pago ha sido notificado correctamente, espere el código de confirmación de 6 dígitos.",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 4000,
                });
              }
            }
          );
        } else {
          // Mostrar mensaje de error con SweetAlert2 si no se ha seleccionado ningún método de pago
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "No se ha seleccionado ningún método de pago.",
          });
        }
      }
    });
  });
  $("#confirmar_pago").click(function () {
    var codigoConfirmacion = parseInt($("#codigo_input").val());
    $.post(
      "controlador/pagoFacturaControlador.php",
      { codigo: codigoConfirmacion },
      function (data, status) {
        if (status === "success") {
          if (data === "correcto") {
            // Mostrar SweetAlert2 indicando que el código es correcto
            Swal.fire({
              title: "Código correcto",
              text: "El código de confirmación es válido, a continuación se mostrara la factura",
              icon: "success",
              showConfirmButton: false, // No mostrar botón
              timer: 3000, // Cerrar automáticamente después de 3 segundos
            });


            //DATOS DEL CLIENTE
            var metodop = document.getElementById("metodo").value;
            var metodo;

            //Metodos de pago
            // Asignar valor 1 a Yape y 2 a Plin
            if (metodop === "Yape") {
              metodo = 1;
            } else if (metodop === "Plin") {
              metodo = 2;
            }

           
            const id_usuario = document.getElementById("id_usuario").value;
           var nombre_cliente = document.getElementById("razon_social").value;
           var ruc = document.getElementById("ruc").value;
           var direccion = document.getElementById("direccion").value;
           var telefono = document.getElementById("telefono").value;

           const formData = new FormData();
           formData.append("funcion", "registrar_venta");
           formData.append("id_usuario", id_usuario);
           formData.append("nombre_cliente", nombre_cliente);
           formData.append("ruc", ruc);
           formData.append("direccion", direccion);
           formData.append("telefono", telefono);
           formData.append("metodo", metodo);

           // Envía los datos al controlador utilizando la función enviarDatos
           enviarDatos(
             "controlador/pagoProductosControlador.php",
             formData,
             function (response) {
               console.log(response);
               // Condicional de acuerdo a la respuesta del servidor
               if (response.trim() === "vendido") {
                 Swal.fire({
                   icon: "success",
                   title: "Pago verificado",
                   text: "El pago se verificó correctamente, se está generando su factura",
                   showConfirmButton: false, // Oculta el botón de confirmación
                   timer: 2000, // Establece el tiempo de espera antes de que el cuadro de diálogo se cierre automáticamente en milisegundos
                 }).then(() => {
                   //generar la factura

                   var numeroFactura =
                     document.getElementById("numeroFactura").value;
                   var fechaEmision =
                     document.getElementById("fecha_emision").value;
                   var fechaVencimiento =
                     document.getElementById("fecha_vencimiento").value;
                   var razonSocial =
                     document.getElementById("razon_social").value;
                   var ruc = document.getElementById("ruc").value;
                   var direccion = document.getElementById("direccion").value;
                   var tipoMoneda =
                     document.getElementById("tipo_moneda").value;
                   var observaciones =
                     document.getElementById("observaciones").value;
                   var metodo = document.getElementById("metodo").value;
                   // Convertir el carrito a JSON
                   var productos =
                     document.getElementById("producto_json").value;
                   // Enviar la solicitud POST para generar el PDF
                   fetch("controlador/facturaControlador.php", {
                     method: "POST",
                     body: JSON.stringify({
                       productos: productos,
                       fechaEmision: fechaEmision,
                       fechaVencimiento: fechaVencimiento,
                       razonSocial: razonSocial,
                       ruc: ruc,
                       direccion: direccion,
                       tipoMoneda: tipoMoneda,
                       observaciones: observaciones,
                       metodo: metodo,
                       numeroFactura: numeroFactura,
                     }),
                   })
                     .then((response) => response.blob())
                     .then((blob) => {
                       const url = window.URL.createObjectURL(blob);

                       // Abrir el PDF en otra pestaña
                       window.open(url, "_blank");

                       // Limpiar la URL creada
                       window.URL.revokeObjectURL(url);
                     })
                     .catch((error) => {
                       console.error("Error en la solicitud POST:", error);
                     });
                 });
               } else {
                 // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
                 Swal.fire({
                   icon: "error",
                   title: "Error",
                   text: "Error no se pudo generar la factura",
                 });
               }
             },
             function (error) {
               // Función de error: se ejecuta si hay un problema en la solicitud AJAX
               mostrarMensaje("noadd", "Error en la solicitud AJAX");
             }
           );

           
         
          } else {
            // Mostrar SweetAlert2 indicando que el código es incorrecto
            Swal.fire({
              title: "Código incorrecto",
              text: "El código de confirmación es inválido, verifique y vuelva a ingresar.",
              icon: "error",
              showConfirmButton: false, // No mostrar botón
              timer: 3000, // Cerrar automáticamente después de 3 segundos
            });
          }
        }
      }
    );
  });
});

