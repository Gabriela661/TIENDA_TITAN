$(document).ready(function () {
  $(document).on('click', '.product-image-thumb', function () {
    
       console.log("brfre");
       var $image_element = $(this).find("img");
       $(".product-image").prop("src", $image_element.attr("src"));
       $(".product-image-thumb.active").removeClass("active");
       $(this).addClass("active");
     });
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

  /*
   * FUNCION PARA DETALLAR UN PRODUCTO
   */
  detalleProducto();

  function detalleProducto() {
    funcion = "detalleProducto";
    const idProducto = $("#id_producto").val();

    $.post(
      "controlador/productosControlador.php",
      { idProducto, funcion },
      (response) => {
        const detalles = JSON.parse(response);
        let template = "";
        detalles.forEach((detalle) => {
          var urls_img = detalle.url_imagenes.split(",");
          var baseUrl =
            "vista/assets/img/" + detalle.categoria_producto.toLowerCase();
          var imgArray = [];
          urls_img.map((url) => {
            imgArray.push(baseUrl + "/" + url);
          });
          template += ` 
                <div class="col-lg-5 mt-4">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="${imgArray[0]}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="${imgArray[1]}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="${imgArray[2]}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="${imgArray[3]}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="${imgArray[0]}" alt="Product Image"></div>

              </div>
            </div>
                <div class="col-lg-7 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">${detalle.nombre_producto}</h1>
                            <p class="h3 py-2">S/. ${detalle.precio_producto}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Puntuación 4.8 | 36 Comentarios</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Categoría:${detalle.categoria_producto}</h6>
                                </li>
                            </ul>
                            <h6>Descripción:</h6>
                            <p>${detalle.descripcion_producto}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Marca:${detalle.marca_producto}</h6>
                                </li>

                            </ul>
                             <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Stock disponible:${detalle.stock_producto}</h6>
                                </li>

                            </ul>

                                <input type="hidden" name="product-title" value="Activewear">
                               <div class="row">
                                    
                                    <div class="col-auto">
                                        <button class="btn btn-success" id="btn-minus">-</button>
                                    </div>
                                    <div class="col-auto">
                                        <input  class="form-control" id="cantidad" value="1" style="border:0; width: 40px;" readonly>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-success" id="btn-plus">+</button>
                                    </div>
                                </div>

                             <div class="row pb-3">
                                <div class="col-lg-6 d-grid">
                                    <button class="btn btn-success text-white mt-2" data-id_producto="${detalle.id_producto}" id="agregarCarritoBtndetalle">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                                <div class="col-lg-6 d-grid">
                                    <a id="verCarrito" class="btn btn-success text-white mt-2" href="#" data-bs-toggle="modal" data-bs-target="#modalCarrito">
                                       <i class="far fa-eye"></i> Ver Carrito
                                    </a>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>`;
        });
        $("#detalle_producto").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA DETALLAR UN PRODUCTO
   */
  /*
   * FUNCION PARA INCREMENTAR Y DECREMENTAR LA CANTIDAD DE PRODUCTOS DEL CARRITO
   */

  $(document).on("click", "#btn-plus", function () {
    var cantidad = parseInt($("#cantidad").val());
    $("#cantidad").val(cantidad + 1);
  });
  $(document).on("click", "#btn-minus", function () {
    var cantidad = parseInt($("#cantidad").val());
    if (cantidad > 1) {
      $("#cantidad").val(cantidad - 1);
    }
  });
  /*
   * FIN FUNCION PARA INCREMENTAR Y DECREMENTAR LA CANTIDAD DE PRODUCTOS DEL CARRITO
   */

  /*
   * MOSTRAR EL CARRITO
   */
  $("#modalCarrito").on("show.bs.modal", function (event) {
    // Lógica para cargar el carrito antes de mostrar el modal
    const id_usuario = document.getElementById("id_usuario").value;
    cargarCarrito(id_usuario);
  });
  /*
   * FIN MOSTRAR EL CARRITO
   */

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
});
