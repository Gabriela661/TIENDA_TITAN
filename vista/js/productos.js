$(document).ready(function () {
  const idCategoria1 = $("#idCategoria").val();
  mostrarOfertas();
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
        let productosHtml = "";
        let itemsPerSlide = 4; // Número de productos por slide
        categorias.forEach((categoria, index) => {
          if (index % itemsPerSlide === 0) {
            productosHtml += `<div class="carousel-item ${
              index === 0 ? "active" : ""
            }"><div class="row justify-content-center">`;
          }
          productosHtml += `
          <div class="d-flex">
    <a style="background-color: white; padding: 15px; border-radius: 8px; margin: 20px; overflow: hidden; transition: transform 0.3s ease-in-out; color: black;" href="tienda.php?id_categoria=${categoria.id_categoria}" onmouseover="this.style.backgroundColor='orange'; this.querySelector('.h5').style.backgroundColor='orange'; this.style.transform='scale(1.05)'" onmouseout="this.style.backgroundColor='white'; this.querySelector('.h5').style.backgroundColor='white'; this.style.transform='scale(1)'">
        <div class="col-md-4 col-lg-3 pb-5">
            <div>
                <div>
                    <div class="text-center">
                        <div style="width: 150px; display: flex; align-items: center; justify-content: center; margin: auto;">
                            <h4 class="h5 mt-4 text-center" style="color: black; background-color: white;">${categoria.nombre_categoria}</h4>
                        </div>
                        <div style="width: 150px; height: 150px; display: flex; align-items: center; justify-content: center; margin: auto;">
                            <img src="${categoria.imagen_producto}" style="width:100px;height:100px;"></img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>


        `;
          if (
            (index + 1) % itemsPerSlide === 0 ||
            index === categorias.length - 1
          ) {
            productosHtml += `</div></div>`;
          }
        });

        $("#carouselProductos .carousel-inner").html(productosHtml);
        $("#carouselProductos").carousel(0); // Mueve el carrusel al primer producto al terminar de cargar
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
      <div class="d-flex" style="transition: transform 0.3s ease-in-out;">
    <div style="background-color: white; border-radius: 8px; margin: 30px; overflow: hidden; color: black;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <div class="col-md-4 col-lg-3 pb-5">
            <div>
                <div>
                
                    <div class="text-center">
                        <div style="width: 150px; height: 150px; display: flex; align-items: center; justify-content: center; margin: auto;">
                            <img src="${productoMV.imagen_producto}" style="width:100px;height:100px;">
                           
                        </div>
                        <div style="width: 150px;">
                            <h5 class="h5 mt-4 text-center" style="color: black; background-color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${productoMV.nombre_producto}</h5>
                            <p class="card-text h5" style=" text-align: left;">Precio: S/. ${productoMV.precio_producto}</p>
                        </div>
                        <div style="width: 150px; display: flex;">
                            <a href="detalle.php?id_producto=${productoMV.id_producto}" class="h5 btn d-block mx-auto mt-3" style="background-color: orangered; border-color: orangered; transition: background-color 0.3s, border-color 0.3s;" onmouseover="this.style.backgroundColor='#6c757d'; this.style.borderColor='#6c757d'" onmouseout="this.style.backgroundColor='orangered'; this.style.borderColor='orangered'">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    `;
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
    // Obtener el valor del input
    let paginaSeleccionada = $("#paginaSeleccionada").val();

    // Verificar si el valor está vacío o no se proporciona
    if (!paginaSeleccionada) {
      // Establecer el valor en 1 por defecto
      paginaSeleccionada = 1;
    }
    // console.log(paginaSeleccionada);
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion, pagina: paginaSeleccionada },
      (response) => {
        const productosTienda = JSON.parse(response);
        let template = "";
        productosTienda.forEach((productoTienda) => {
          template += `
  <div class="showcase" style="background-color: white;">
                                <div class="showcase-banner">

                                    <img src="${productoTienda.imagen_producto}" alt="imagen producto"  class="product-img default p-4">
                                    <img  src="${productoTienda.imagen_producto}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover p-3">

                                    <p class="showcase-badge" >Stock: ${productoTienda.stock_producto}</p>

                                    <div class="showcase-actions">
      

                                        <a href="detalle.php?id_producto=${productoTienda.id_producto}"  class="btn-action">
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
                                        <button data-id_producto="${productoTienda.id_producto}"  id="agregarCarritoBtn" class="btn-action">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </button>
                                        
                                    </div>
                                </div>
                                <div class=" showcase-content">
                                    <a href="#"  class="showcase-category">Marca: ${productoTienda.marca_producto}</a>
                                    <a href="#">
                                        <h3 class="showcase-title"  style="color: black;">${productoTienda.nombre_producto}</h3>
                                    </a>
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>
                                    <div class="price-box">
                                        <p class="price">S/. ${productoTienda.precio_producto}</p>
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
          template += `
           <li class="sidebar-menu-category">
                                <a id="categoria" data-id_categoria="${categoria.id_categoria}" style=" cursor: pointer;"  class="sidebar-accordion-menu" data-accordion-btn>
                                    <div class="menu-title-flex">
                                        <img src="${categoria.imagen_producto}" alt="clothes" width="30" height="30" class="menu-title-img">
                                        <p class="h5">
                                     ${categoria.nombre_categoria}</p>
                                    </div>
                                   
                                </a>
                            </li>
         `;
        });
        $("#categoriaMenu").html(template);
      }
    );
  }
  /*
   * FIN FUNCION PARA LISTAR LAS CATEGORIAS EN LA TIENDA
   */
  /*
   * FUNCION PARA LISTAR LAS CATEGORIAS EN LA TIENDA
   */
  listarCategoriaTiendaheader();

  function listarCategoriaTiendaheader(consulta) {
    funcion = "listarCategoriaTiendaheader";
    $.post(
      "controlador/productosControlador.php",
      { consulta, funcion },
      (response) => {
        const categorias = JSON.parse(response);
        let template = "";
        let contador = 0;
        categorias.forEach((categoria) => {
          template += `     <div style="background-color: white;" class="category-item">
                        <div class="category-img-box">
                            <img src="${categoria.imagen_producto}" alt="dress & frock" width="30">
                        </div>
                        <div class="category-content-box">
                            <div class="category-content-flex">
                                <h3 class="category-item-title">${categoria.nombre_categoria}</h3>

                                <p class="category-item-amount">(${categoria.cantidad_productos}</h3>)</p>
                            </div>
                            <a id="categoria_header" href="tienda.php?id_categoria=${categoria.id_categoria}" data-id_categoria="${categoria.id_categoria}" class="category-btn">Ver todos</a>
                        </div>
                    </div>
         `;
        });
        $("#categoriaMenuHeader").html(template);
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

  CantidadPaginas();
  /*FUNCION OBTENER LA CANTIDAD DE PAGINAS*/
  function CantidadPaginas() {
    const idCategoria = $("#idCategoria").val();
    const funcion = "CantidadPaginas";
    $.post(
      "controlador/productosControlador.php",
      { funcion },
      function (response) {
        const cantidad = parseInt(response.trim()); // Convierte el texto a un número entero

        if (!isNaN(cantidad)) {
          // console.log("Cantidad de productos:", cantidad);

          // Calcular el número de páginas
          const paginas = Math.ceil(cantidad / 12); // Suponiendo que deseas mostrar 12 productos por página

          let paginaActual = parseInt($("#paginaSeleccionada").val());
          let paginacionHTML = `
                <ul class="pagination justify-content-center">
                    <li class="page-item${
                      paginaActual === 1 ? " disabled" : ""
                    }">
                        <a class="page-link" href="${
                          paginaActual !== 1
                            ? `tienda.php?pagina=${paginaActual - 1}${
                                idCategoria
                                  ? `&id_categoria=${idCategoria}`
                                  : ""
                              }`
                            : "#"
                        }" tabindex="-1">Anterior</a>
                    </li>`;

          // Calcular el rango de páginas a mostrar
          const rango = 2; // Número de páginas a mostrar antes y después de la página actual

          for (
            let i = Math.max(1, paginaActual - rango);
            i <= Math.min(paginas, paginaActual + rango);
            i++
          ) {
            paginacionHTML += `<li class="page-item${
              i === paginaActual ? " active" : ""
            }"><a class="page-link" href="tienda.php?pagina=${i}${
              idCategoria ? `&id_categoria=${idCategoria}` : ""
            }">${i}</a></li>`;
          }

          paginacionHTML += `
                    <li class="page-item${
                      paginaActual === paginas ? " disabled" : ""
                    }">
                        <a class="page-link" href="${
                          paginaActual !== paginas
                            ? `tienda.php?pagina=${paginaActual + 1}${
                                idCategoria
                                  ? `&id_categoria=${idCategoria}`
                                  : ""
                              }`
                            : "#"
                        }">Siguiente</a>
                    </li>
                </ul>`;
          $("#paginacion").html(paginacionHTML);
        } else {
          console.error("La respuesta no contiene una cantidad válida.");
        }
      }
    );
  }
  /*FIN FUNCION OBTENER LA CANTIDAD DE PAGINAS*/

  /*FUNCION PARA MOSTRAR LAS OFERTAS*/
  function mostrarOfertas() {
    funcion = "mostrarOfertas";
    $.post("controlador/productosControlador.php", { funcion }, (response) => {
      const productosOferta = JSON.parse(response);
      let productosHtml = "";
      let itemsPerSlide = 4; // Número de productos por slide
      productosOferta.forEach((producto, index) => {
        if (index % itemsPerSlide === 0) {
          productosHtml += `<div class="carousel-item ${
            index === 0 ? "active" : ""
          }"><div class="row justify-content-center ">`;
        }
        productosHtml += `
                              <div class="showcase bg-white mx-3 mb-2 " style="width:200px" >
                                <div class="showcase-banner">
                                    <img style="" src="${producto.imagen_producto}" alt="imagen producto"  class="product-img default p-2">
                                    <img  src="${producto.imagen_producto}" alt="Mens Winter Leathers Jackets" width="200" class="product-img hover p-3">

                                    <p class="showcase-badge" > - ${producto.descuento}% </p>

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
                               <div class="text-center">
                               <div class="btn btn-outline-secondary custom-price-container" style="background-color: orangered; border-color: orangered;">
        <p class="price mb-0 text-white">S/. ${producto.precio_descuento}</p>
    </div>
    </div>
        <p class="price" style="color:black"> Antes: <del>S/. ${producto.precio_producto}</del></p>

    
    <a >
        <h3 class="showcase-title" style="color: black;">${producto.nombre_producto}</h3>
    </a>
    <a  class="showcase-title mt-0" style="color: orangered;">Marca: ${producto.marca_producto}</a>
     <a >
        <h3 class="showcase-title" style="color: black;">Stock disponible: ${producto.stock_producto}</h3>
    </a>
    


                           
                            </div>
                            </div>
        `;
        if (
          (index + 1) % itemsPerSlide === 0 ||
          index === productosOferta.length - 1
        ) {
          productosHtml += `</div></div>`;
        }
      });

      $("#carouselofertas .carousel-inner").html(productosHtml);
      $("#carouselofertas").carousel(0);
    });
  }
  /*FIN DE FUNCION PARA MOSTRAR LAS OFERTAS*/
});
