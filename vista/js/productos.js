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
  //listar inventario en una tabla
  ListarMasVendidos();
  function ListarMasVendidos(consulta) {
    funcion = "ListarMasVendidos";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        console.log(response);
        const inventarios = JSON.parse(response);
        let template = "";
        let contador = 0; // Inicializamos el contador
        inventarios.forEach((inventario) => {
          let imagenStyle = `width: 50px; height: 50px;`;
          contador++; // Incrementamos el contador en cada iteración
          template += `
                    <tr data-id="${inventario.id_producto}">
                    <th scope="row">${contador}</th>
                        <th scope="row">${inventario.nombre}</th>
                        <th scope="row">${inventario.marca_producto}</th>
                        <th scope="row">${inventario.descripcion_producto}</th>
                        <th scope="row">${inventario.cantidad}</th>
                        <th scope="row">${inventario.precio}</th>
                        
                        <th scope="row"><div class="text-center">
                        <img src="${inventario.imagen_producto}" style="${imagenStyle}"  class="img-circle" alt="...">
                      </div></th>
                        <th scope="row"><button id="btn_editar" data-id_inventario="${inventario.id_producto} type="button" class="btn btn-info">
                        Editar
                     </button></th>
                        <th scope="row"> <button id="btn_eliminar" class="btn btn-danger" data-id="${inventario.id_producto}">Eliminar</button>
                        </th>
                        `;
        });
        $("#inventario").html(template);
      }
    );
  }
});
