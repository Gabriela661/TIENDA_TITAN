
$(document).ready(function () {
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

  cargarProductosPago(1);

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
        console.log(productosSeleccionados);
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

    var carrito = [
      {
        id_carrito: 2,
        nombre: "Archivador",
        precio: "550.00",
        cantidad: 1,
        imagen_producto:
          "../vista/assets/img/inventario/65e10247d82ef-Archivador.JPG",
        id_producto: 3,
        stock: "2.0000",
      },
      {
        id_carrito: 3,
        nombre: "Armario de melamina",
        precio: "550.00",
        cantidad: 1,
        imagen_producto:
          "../vista/assets/img/inventario/65e1032382736-armario cedro.jpg",
        id_producto: 5,
        stock: "1.0000",
      },
    ];

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

  // $("#venta").click(() => {

  //   const idcliente = document.getElementById("id_usuario").value;
  //   const totalCompra = parseFloat($("#totalCompra").text();
  //   const tipo_pago = 1;

  //     const formData = new FormData();
  //     formData.append("funcion", "crearVenta"); // Añade la función para identificar la acción en el controlador
  //   formData.append("idcliente", idcliente); // Añade el nombre de la categoría al FormData

  //     formData.append("totalCompra", totalCompra); // Añade el nombre de la categoría al FormData
  //     // Envía los datos al controlador utilizando la función enviarDatos
  //     enviarDatos(
  //       "controlador/pagoProductosControlador.php", // URL del controlador
  //       formData, // Datos del formulario
  //       function (response) {
  //         // Condicional de acuerdo a la respuesta del servidor
  //         if (response.trim() === "add_categoria") {
  //           // Muestra un mensaje de éxito utilizando SweetAlert
  //           Swal.fire({
  //             icon: "success",
  //             title: "Creación exitosa",
  //             text: "La categoría ha sido creada con éxito.",
  //           }).then(() => {
  //             // Limpia el formulario, actualiza la lista de categorías
  //             $("#form_categoria").trigger("reset");
  //             location.reload();
  //           });
  //         } else {
  //           // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
  //           Swal.fire({
  //             icon: "error",
  //             title: "Error",
  //             text: "Error al crear la categoría, vuelva a intentarlo",
  //           });
  //         }
  //       },
  //       function (error) {
  //         // Función de error: se ejecuta si hay un problema en la solicitud AJAX
  //         mostrarMensaje("noadd", "Error en la solicitud AJAX");
  //       }
  //     );

  // });

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
});