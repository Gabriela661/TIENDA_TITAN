$(document).ready(function () {
  const idCategoria1 = $("#idCategoria").val();

  // Verifica si el valor no está vacío
  if (idCategoria1 != "") {
    // El campo está lleno, realiza la acción que deseas aquí
    productosTienda(idCategoria1);
  } else {
    productosTienda();
  }
  /*
   * FUNCION PARA LISTAR LAS CATEGORIAS EN EL INDEX
   */
  listarCategoriaIndex();

  function listarCategoriaIndex(consulta) {
    funcion = "listarCategoriaIndex";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const categorias = JSON.parse(response);
        let template = "";
        categorias.forEach((categoria) => {
          template += `<a style="background-color: white; padding: 15px; border-radius: 8px; margin: 20px; overflow: hidden; transition: transform 0.3s ease-in-out;" href="tienda.php?id_categoria=${categoria.id_categoria}" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <div class="col-md-4 col-lg-3 pb-5">
                <div>
                    <div>
                        <div class="text-center">
                            <div style="width: 150px; display: flex; align-items: center; justify-content: center; margin: auto;">
                                <h4 class="h5 mt-4 text-center" style="color: black; background-color: white;">${categoria.nombre_categoria}</h4>
                            </div>
                            <div style="width: 150px; height: 150px; display: flex; align-items: center; justify-content: center; margin: auto;">
                                <img src="${categoria.imagen_producto}" style="width:100px;height:100px;">
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </a>
        `;
        });
        $("#categoriaIndex").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA LISTAR LAS CATEGORIAS EN EL INDEX
   */

  /*
   * FUNCION PARA LISTAR LOS PRODUCTOS MÁS VENDIDOS
   */
  ListarMasVendidos();

  function ListarMasVendidos(consulta) {
    funcion = "ListarMasVendidos";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const productosMV = JSON.parse(response);
        let template = "";
        let contador = 0;
        productosMV.forEach((productoMV) => {
          let imagenStyle = `width: 150px; height: 180px;`;
          template += `
                    <div class="col-md-4 col-lg-2 mb-3 mt-3" style="overflow: hidden; transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        <div class="card shadow position-relative" style="transform-origin: center center; overflow: hidden; transition: transform 0.3s ease-in-out;">
                                <div class="ribbon ribbon-danger">
                                    <span class="ribbon-text"></span>
                                </div>
                                <div class="text-center">
                                    <img src="${productoMV.imagen_producto}" alt="Producto" class="card-img-top" style="${imagenStyle}">
                                </div>
                                <div class="card-body text-dark">
                                    <h5 class="card-title" style="font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-height: 3em; line-height: 1.5em;"> ${productoMV.nombre_producto}</h5>
                                    <p class="card-text" style="font-size: 12px;">Precio: S/. ${productoMV.precio_producto}</p>
                                    <a href="detalle.php?id_producto=${productoMV.id_producto}" class="btn btn-primary d-block mx-auto mt-3">Ver Detalles</a>
                                </div>
                            </div>
                        </div>`;
        });
        $("#masVendidos").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA LISTAR LOS PRODUCTOS MÁS VENDIDOS
   */

  /*
   * FUNCION PARA LISTAR LOS PRODUCTOS DE LA TIENDA
   */

  function productosTienda(consulta) {
    funcion = "productosTienda";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const productosTienda = JSON.parse(response);
        let template = "";
        productosTienda.forEach((productoTienda) => {
          let imagenStyle = `width: 80%; height: 150px; object-fit: cover; margin: auto`;
          template += `
        <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-4 pl-5">
    <div class="card shadow product-card">
        <!-- Imagen del producto -->
        <img class="card-img-top img-fluid" src="${productoTienda.imagen_producto}" alt="Producto" style="${imagenStyle}">
        
        <!-- Cinta de precio -->
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-orange">
                <p class="text-center mb-0">S/. ${productoTienda.precio_producto}</p>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Nombre del producto -->
            <h5 class="h5 text-decoration-none d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-height: 1.5em;">${productoTienda.nombre_producto}</h5>
            
            <!-- Marca del producto -->
            <h5><span class="badge badge-warning">Marca: ${productoTienda.marca_producto}</span></h5>
            
            <!-- Botones de agregar al carrito -->
            <div class="input-group">
                <button class="btn border-0 restarBtn" type="button"><i class="fas fa-minus"></i></button>
                <input type="text" class="form-control border-0 text-center cantidadInput" value="1" class="cantidadProducto">
                <button class="btn border-0 sumarBtn" type="button"><i class="fas fa-plus"></i></button>
          
            <button data-id_producto="${productoTienda.id_producto}" data-id_usuario="1" class="col-12 btn btn-primary " id="agregarCarritoBtn"><i class="fa-solid fa-cart-plus"></i> Agregar al carrito</button>
              </div>
        </div>
    </div>
</div>    

`;
        });
        $("#productos_tienda").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA LISTAR LOS PRODUCTOS DE LA TIENDA
   */

  /*
   * FUNCION PARA LISTAR LAS CATEGORIAS EN LA TIENDA
   */
  listarCategoriaTienda();

  function listarCategoriaTienda(consulta) {
    funcion = "listarCategoriaTienda";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const categorias = JSON.parse(response);
        let template = "";
        let contador = 0;
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
           </li>`;
        });
        $("#categoriaMenu").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA LISTAR LAS CATEGORIAS EN LA TIENDA
   */

  $("#categoriaMenu").on("click", "a", function () {
    var idCategoria = $(this).data("id_categoria");
    productosTienda(idCategoria);
  });

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
          template += ` 
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid main-image" src="${detalle.imagen_producto}" alt="Card image cap" id="product-detail" style="width: 100%; height: 500px;">
                    </div>
                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid secondary-image" src="${detalle.imagen_producto}" alt="Product Image 1" style="width: 80px; height: 100px;">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid secondary-image" src="${detalle.imagen_producto}" alt="Product Image 2" style="width: 80px; height: 100px;">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid secondary-image" src="${detalle.imagen_producto}" alt="Product Image 3" style="width: 80px; height: 100px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
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
                                    <h6>Categoría:${detalle.categoria_producto}</h6>
                                </li>
                            </ul>
                            <h6>Descripción:</h6>
                            <p>${detalle.descripcion_producto}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Marca:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>${detalle.marca_producto}</strong></p>
                                </li>
                            </ul>
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
                </div>`;
        });
        $("#detalle_producto").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA DETALLAR UN PRODUCTO
   */

  
});
