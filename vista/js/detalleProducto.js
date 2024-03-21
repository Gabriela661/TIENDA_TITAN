$(document).ready(function () {
  $(document).on("click", ".product-image-thumb", function () {
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
                <div class="col-lg-5 mt-4 ">
                    <div class="col-12">
                      <img style="height:500px" src="${imgArray[3]}" class="product-image img-fluid" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                      <div class="product-image-thumb active"><img src="${imgArray[1]}" alt="Product Image"></div>
                      <div class="product-image-thumb" ><img src="${imgArray[2]}" alt="Product Image"></div>
                      <div class="product-image-thumb" ><img src="${imgArray[3]}" alt="Product Image"></div>
                      <div class="product-image-thumb" ><img src="${imgArray[0]}" alt="Product Image">
                      </div>
                    </div>
                </div>
                <div  class="col-lg-7 mt-4">
                    <div class="card" style="height:650px">
                        <div class="card-body">
                            <h2 class="h2" style="color:black;font-weight:bold" >${detalle.nombre_producto}</h2>
                            <p style="color:black ;" class="h5 py-1">Precio: S/. ${detalle.precio_producto}</p>
                            <p style="color:black" class="h5 py-1">Categoria: ${detalle.categoria_producto}</p>
                            <p style="color:black" class="h5 py-1">Descripción: ${detalle.descripcion_producto}</p>
                            <p style="color:black" class="h5 py-1">Marca: ${detalle.marca_producto}</p>
                             <p style="color:black" class="h5 py-1">Cantidad Disponible: ${detalle.stock_producto}</p>             

                           <div class="row align-items-center">
      <div class="col-auto mb-2 mb-md-0">
            <button class="btn-add btn h5" id="btn-minus" style="background-color: orangered; color: white;">-</button>
        </div>
        <div class="col-auto mb-2 mb-md-0 ">
            <input id="cantidad" class="h5" value="1" style="border: 0; width: 40px; text-align: center;" readonly>
        </div>
        <div class="col-auto mb-2 mb-md-0 ">
            <button class="btn-add btn h5" id="btn-plus" style="background-color: orangered; color: white;">+</button>
        </div>
      <div class="col-md-4 col-12 mb-2 ">
        <button style="background-color: green; width: 100%;" class="btn text-white" data-id_producto="${detalle.id_producto}" id="agregarCarritoBtndetalle">
            <i class="fas fa-cart-plus"></i> Agregar al carrito 
        </button>
    </div>
    <div class="col-md-4 col-12 mb-2 h5">
        <a style="background-color: orangered; width: 100%;" id="verCarrito" class="btn text-white" href="#" data-bs-toggle="modal" data-bs-target="#modalCarrito">
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
                                    <label id="nombreProducto" name="nombreProducto" class="h5">${producto.nombre_producto}</label>
                                </div>
                                <div class="col-auto">
                                    <button data-id_carrito="${producto.id_carrito}" data-id_usuario="1" id="eliminarProducto"type="button" class="close" >
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
  /*FUNCION PARA CERRAR EL MODAL*/
  // Obtener el botón de cierre del modal por su ID
  const closeButton = document.querySelector("#modalCarrito .close");

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
  productosSimilares(); 
  function productosSimilares() {
    const idProducto = $("#id_producto").val();
    console.log("par "+idProducto);
    funcion = "productosSimilares";
    $.post(
      "controlador/productosControlador.php",
      { idProducto, funcion },
      (response) => {
        console.log(response);
        const productos = JSON.parse(response);
        let productosHtml = "";
        let itemsPerSlide = 4; // Número de productos por slide
        productos.forEach((producto, index) => {
          if (index % itemsPerSlide === 0) {
            productosHtml += `<div class="carousel-item ${
              index === 0 ? "active" : ""
            }"><div class="row justify-content-center">`;
          }
          productosHtml += `
          <div class="showcase" style="background-color: white;">
                                <div class="showcase-banner">

                                    <img src="${producto.imagen_producto}" alt="imagen producto"  class="product-img default p-4">
                                    <img  src="${producto.imagen_producto}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover p-3">

                                    <p class="showcase-badge" >Stock: ${producto.stock_producto}</p>

                                    <div class="showcase-actions">
      

                                        <a href="detalle.php?id_producto=${producto.id_producto}"  class="btn-action">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </a>
                                        <button class="btn-action restarBtn">
                                             <ion-icon name="remove"></ion-icon>
                                        </button>
                                        <button >
                                            <input class="cantidadInput" type="text" value="1" min="0" style="border:0; width: 25px;" readonly>
                                        </button>
                                        <button class="btn-action sumarBtn">
                                        <ion-icon name="add"></ion-icon>                                 
                                        </button>
                                        <button data-id_producto="${producto.id_producto}"  id="agregarCarritoBtn" class="btn-action">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </button>
                                        
                                    </div>
                                </div>
                                <div class=" showcase-content">
                                    <a href="#"  class="showcase-category">Marca: ${producto.marca_producto}</a>
                                    <a href="#">
                                        <h3 class="showcase-title"  style="color: black;">${producto.nombre_producto}</h3>
                                    </a>
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>
                                    <div class="price-box">
                                        <p class="price">S/. ${producto.precio_producto}</p>
                                    </div>
                                </div>
                            </div>
        `;
          if (
            (index + 1) % itemsPerSlide === 0 ||
            index === producto.length - 1
          ) {
            productosHtml += `</div></div>`;
          }
        });

        $("#carouselProductosSimilares .carousel-inner").html(productosHtml);
        $("#carouselProductosSimilares").carousel(0); // Mueve el carrusel al primer producto al terminar de cargar
      }
    );
  }
});
