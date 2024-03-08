$(document).ready(function () {
    var funcion;
    var funcion = "";
  
    /* Se llama a la función categoria() para listar todas las categorías de la base de datos en la tabla    */
    listarIngresos();
  
    /*FUNCION PARA LISTAR LAS CATEGORIAS */
    function listarIngresos(consulta) {
      /*Nombre de la función del controlador categoría */
      funcion = "listarIngresos";
  
      /*SSe envía al controlador la consulta y la función */
      $.post(
        "../controlador/ingresoControlador.php",
        { consulta, funcion },
        /* Función de respuesta: se ejecuta cuando se recibe la respuesta del servidor*/
        (response) => {
          /*Convierte la respuesta del servidor formato JSON, en un objeto JavaScript Y se guarda la respuesta del servidor en la variable categorías */
          const ingreso = JSON.parse(response);
  
          /* Inicialización de variables*/
          let template = ""; // Se utilizará para almacenar el contenido HTML generado dinámicamente
          let contador = 0; // Se utilizará para llevar la cuenta de las iteraciones del bucle
  
          /* Iteración a través de las categorías recibidas del servidor*/
          ingreso.forEach((ingresos) => {
            contador++; // Incrementamos el contador en cada iteración
            /* Se genera dinámicamente una fila de tabla HTML para cada categoría*/
            template += `
                          <tr data-id="${ingresos.id_venta}">
                          <th scope="row">${contador}</th>
                          <td>${ingresos.nombre_cliente}</td>
                          <td>${ingresos.tipo_pago}</td>
                          <td>${ingresos.cantidad_total}</td>
                          <td>${ingresos.fecha}</td>
                          <td>${ingresos.id_usuario}</td>
                          </tr>`;
          });
  
          /* Actualización del contenido HTML de la tabla con las categorías generadas*/
          $("#ingresos_lista").html(template);
        }
      );
    } 
})