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

        /* Inicialización de variables*/
        let template = ""; // Se utilizará para almacenar el contenido HTML generado dinámicamente
        let contador = 0; // Se utilizará para llevar la cuenta de las iteraciones del bucle

        /* Iteración a través de las categorías recibidas del servidor*/
        categorias.forEach((categoria) => {
          contador++; // Incrementamos el contador en cada iteración
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
          let imagenStyle = `width: 50px; height: 50px;`;
          contador++; // Incrementamos el contador en cada iteración
          template += `
    <div class="col-md-4 col-lg-3 mb-4">
    <div class="card shadow position-relative" style="margin: 10px;">
        <!-- Ribbon inclinado utilizando clases de Bootstrap -->
        <div class="ribbon ribbon-danger">
            <span class="ribbon-text">Más Vendido</span>
        </div>

        <img src="${productoMV.imagen_producto}" alt="Producto" class="card-img-top">
        <div class="card-body text-dark">
            <h5 class="card-title">Nombre del Producto: ${productoMV.nombre_producto}</h5>
           
            <p class="card-text">Marca: ${productoMV.marca_producto}</p>
            <p class="card-text">Precio: ${productoMV.precio_producto}</p>
            <p class="card-text">Stock: ${productoMV.stock_producto}</p>
            <span class="badge bg-primary">En Stock</span>
            <a href="#" class="btn btn-primary">Ver Detalles</a>
        </div>
    </div>
    </div>                 `;
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
        console.log(response);
        const productosTienda = JSON.parse(response);
        let template = "";
        let contador = 0; // Inicializamos el contador
        productosTienda.forEach((productoTienda) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          template += `  <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/fierros.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Barras de acero'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Barras de Acero 3/8'; ?>&img=<?php echo 'fierros.png'; ?>"><i class="far fa-eye"></i></a></li>
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
});
