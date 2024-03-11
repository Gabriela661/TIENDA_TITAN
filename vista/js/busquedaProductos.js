/*
 * FUNCION DE BUSQUEDA
 */

$(document).ready(function () {
  function busquedaProductos() {
    const consulta = document.getElementById("dropdownInput").value.trim(); // Trim para quitar espacios en blanco al inicio y al final
    const funcion = "busquedaProductos";
    const dropdownMenu = document.getElementById("dropdownMenu");

    // Oculta el dropdown si no hay consulta
    if (consulta === "") {
      dropdownMenu.classList.remove("show");
      return;
    }

    // Realiza la búsqueda y muestra los resultados
    $.post(
      "controlador/productosControlador.php",
      {
        consulta,
        funcion,
      },
      (response) => {
        const busquedaProductos = JSON.parse(response);
        let template = "";

        // Itera sobre los productos y crea el HTML correspondiente
        busquedaProductos.forEach((producto) => {
          let imagenStyle = `max-width: 30px; height: auto; object-fit: cover; `;
          let nombreStyle = `max-width: 350px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;font-size: 10px;`;

          template += `
          <li>
              <a class="dropdown-item" href="detalle.php?id_producto=${producto.id_producto}">
                  <div class="d-flex" style="max-width: 400px; ">
                      <img src="${producto.imagen_producto}" alt="${producto.nombre_producto}" style="${imagenStyle}">
                      <div class="ms-2" style="${nombreStyle}">
                          <p class="mb-0">${producto.nombre_producto}</p>
                          <p class="mb-0">Precio: S/. ${producto.precio_producto}</p>
                      </div>
                  </div>
              </a>
          </li>`;
        });

        // Actualiza el contenido del menú con los resultados
        dropdownMenu.innerHTML = template;

        // Muestra el menú
        dropdownMenu.classList.add("show");
      }
    );
  }

  // Agregar un evento para ejecutar la búsqueda cuando se escriba en el input
  document
    .getElementById("dropdownInput")
    .addEventListener("input", busquedaProductos);
});
