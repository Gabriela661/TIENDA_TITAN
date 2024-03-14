
$(document).ready(function () {
  // Tu código aquí

  cargarProductosPago(1);

  /*FUNCION PARA CARGAR LOS PRODUCTOS AL CARRITO*/

  function cargarProductosPago(consulta) {
      funcion = "cargarProductosPago";
       total=0;
    $.post(
      "controlador/pagoProductosControlador.php",
      { consulta, funcion },
        (response) => {
            console.log("response");
             console.log(response);
        const productos = JSON.parse(response);
       
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
  /*FIN FUNCION PARA CARGAR LOS PRODUCTOS AL CARRITO */
});