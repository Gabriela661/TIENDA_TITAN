

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
                                    <label id="nombreProducto" name="nombreProducto" class="h4">${producto.nombre_producto}</label>
                                </div>
                                <div class="col-auto">
                                    <button data-id_carrito="${producto.id_carrito}" data-id_usuario="1" id="eliminarProducto"type="button" class="btn-close" >
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
        subtotal += producto.total_valor_carrito;
      });
      $("#carrito_contenedor").html(template);
      document.getElementById("subtotal").innerText =
        "Total: S/. " + subtotal.toFixed(2);
    }
  );
}
/*FIN FUNCION PARA CARGAR LOS PRODUCTOS AL CARRITO */
