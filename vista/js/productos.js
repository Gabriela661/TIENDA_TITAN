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
        console.log(response);
        const productosMV = JSON.parse(response);
        let template = "";
        let contador = 0; // Inicializamos el contador
        productosMV.forEach((productoMV) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          contador++; // Incrementamos el contador en cada iteración
          template += `
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card h-100 shadow position-relative">
            <!-- Ribbon inclinado utilizando clases de Bootstrap -->
            <div class="ribbon ribbon-danger">
                <span class="ribbon-text">Más Vendido</span>
            </div>

            <img src="assets/img/drywall-sinfondo.png" alt="Producto" class="card-img-top">
            <div class="card-body text-dark">
                <h5 class="card-title">${productoMV.nombre_producto}</h5>
                <p class="card-text">Descripcion:${productoMV.nombre_producto}</p>
                <p class="card-text">Marca: ${productoMV.marca_producto}</p>
                <p class="card-text">Precio: ${productoMV.precio_producto}</p>
                <p class="card-text">Stock: ${productoMV.nombre_producto}</p>
                <span class="badge bg-primary">En Stock</span>
                <a href="#" class="btn btn-primary">Ver Detalles</a>
            </div>
        </div>


</div>


                        `;
        });
        $("#masVendidos").html(template);
      }
    );
  }
});
