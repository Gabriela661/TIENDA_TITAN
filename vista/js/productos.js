$(document).ready(function () {
  listarCategoriaIndex();

  /*FUNCION PARA LISTAR LAS CATEGORIAS */
  function listarCategoriaIndex(consulta) {
    /*Nombre de la función del controlador categoría */
    funcion = "listarCategoriaIndex";

    /*SSe envía al controlador la consulta y la función */
    $.post(
      "controlador/categoriaControlador.php",
      { consulta, funcion },
      /* Función de respuesta: se ejecuta cuando se recibe la respuesta del servidor*/
      (response) => {
        /*Convierte la respuesta del servidor formato JSON, en un objeto JavaScript Y se guarda la respuesta del servidor en la variable categorías */
        const categorias = JSON.parse(response);

        let template = "";

        /* Iteración a través de las categorías recibidas del servidor*/
        categorias.forEach((categoria) => {
          /* Se genera dinámicamente una fila de tabla HTML para cada categoría*/
          template += `<a href="productosCategoria.php">
               <div class="col-md-4 col-lg-3 pb-5">
                <div class="py-7 services-icon-wap shadow" style="background-color:white">
                    
                <div class="text-center"><img src="assets/img/tubos_sinfondo.png" style="width:100px;height:100px;"></div>
                   
                <h4 class="h5 mt-4 text-center" style="color:black">${categoria.nombre_categoria}
                </h4>
                </div> 
                 </div>
                </a>
                       `;
        });

        /* Actualización del contenido HTML de la tabla con las categorías generadas*/
        $("#categoriaIndex1").html(template);
      }
    );
  }

  ListarMasVendidos();
  function ListarMasVendidos(consulta) {
    funcion = "ListarMasVendidos";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const productosMV = JSON.parse(response);
        let template = "";
        let contador = 0; // Inicializamos el contador
        productosMV.forEach((productoMV) => {
          let imagenStyle = `width: 150px; height: 150px;`;
          template += `
    <div class="col-md-4 col-lg-3 mb-4">
        <div class="card shadow position-relative" style="margin: 20px;">
            <div class="ribbon ribbon-danger">
                <span class="ribbon-text">Más Vendido</span>
            </div>
            <div class="text-center">
                <img src="${productoMV.imagen_producto}" alt="Producto" class="card-img-top" style="${imagenStyle}">
            </div>
            <div class="card-body text-dark">
                <h5 class="card-title" style="font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-height: 3em; line-height: 1.5em;"> ${productoMV.nombre_producto}</h5>
                <p class="card-text" style="font-size: 12px;">Precio: ${productoMV.precio_producto}</p>
                <a href="detalle.php?id_categoria=${productoMV.id_producto}" class="btn btn-primary d-block mx-auto mt-3">Ver Detalles</a>
            </div>
        </div>
    </div>`;
        });

        $("#masVendidos").html(template);
      }
    );
  }
  productosTienda();
  function productosTienda(consulta) {
    funcion = "productosTienda";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const productosTienda = JSON.parse(response);
        let template = "";
        let contador = 0; // Inicializamos el contador
        productosTienda.forEach((productoTienda) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          template += `  <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="${productoTienda.imagen_producto}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?id_categoria=${productoTienda.id_producto}"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h5 text-decoration-none">${productoTienda.nombre_producto}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Marca: ${productoTienda.marca_producto}</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">S/. ${productoTienda.precio_producto}</p>
                            </div>
                        </div>
                    </div>`;
        });
        $("#productos_tienda").html(template);
      }
    );
  }
  listarCategoriaTienda();
  /*FUNCION PARA LISTAR LAS CATEGORIAS */
  function listarCategoriaTienda(consulta) {
    /*Nombre de la función del controlador categoría */
    funcion = "listarCategoriaTienda";

    /*SSe envía al controlador la consulta y la función */
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      /* Función de respuesta: se ejecuta cuando se recibe la respuesta del servidor*/
      (response) => {
        const categorias = JSON.parse(response);

        /* Inicialización de variables*/
        let template = "";
        let contador = 0;

        /* Iteración a través de las categorías recibidas del servidor*/
        categorias.forEach((categoria) => {
          template += `<li class="pb-1">
            <a id="categoria" data-id_categoria="${categoria.id_categoria}" class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                ${categoria.nombre_categoria}
                <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
            </a>
            <ul class="collapse show list-unstyled pl-3">
                <li><a class="text-decoration-none" href="#">Liso</a></li>
                <li><a class="text-decoration-none" href="#">Corrugado</a></li>
            </ul>
           </li>
                       `;
        });

        /* Actualización del contenido HTML de la tabla con las categorías generadas*/
        $("#categoriaMenu").html(template);
      }
    );
  }
  $("#categoriaMenu").on("click", "a", function () {
    // Obtener el valor del atributo data-id_categoria
    var idCategoria = $(this).data("id_categoria");
    productosTienda(idCategoria);
    // Mostrar el id_categoria por consola
    console.log("ID de la categoría:", idCategoria);
  });

  detalleProducto();
  function detalleProducto() {
    funcion = "detalleProducto";
    const idProducto = $("#id_producto").val();
    $.post(
      "controlador/productosControlador.php",
      { idProducto, funcion },
      (response) => {
        console.log(response);
        const detalles = JSON.parse(response);
        let template = "";
        detalles.forEach((detalle) => {
          //impresion del catalogo de productos
          template += ` <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="${detalle.imagen_producto}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/<?php echo $img; ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <!-- <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3">
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                                <!--/.First slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
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
                                    <h6>Categoría:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>${detalle.categoria_producto}</strong></p>
                                </li>
                            </ul>

                            <h6>Descripción:</h6>
                            <p> ${detalle.descripcion_producto}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Marca:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>${detalle.marca_producto}</strong></p>
                                </li>
                            </ul>

                            <!-- <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul> -->

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">

                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                ${detalle.stock_producto}
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a class="btn btn-success text-white mt-2" href="#" data-bs-toggle="modal" data-bs-target="#modal2"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> `;
        });
        //se muestra en el div de productos
        $("#detalle_producto").html(template);
      }
    );
  }
});
