$(document).ready(function () {
  var funcion;
  var funcion = "";

  /* Se llama a la función categoria() para listar todas las categorías de la base de datos en la tabla    */
  listarCategoria();

  /*FUNCION PARA LISTAR LAS CATEGORIAS */
  function listarCategoria(consulta) {
    /*Nombre de la función del controlador categoría */
    funcion = "listarCategoria";

    /*SSe envía al controlador la consulta y la función */
    $.post(
      "../controlador/categoriaControlador.php",
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
          template += `
                        <tr data-id="${categoria.id_categoria}">
                        <th scope="row">${contador}</th>
                        <td>${categoria.nombre_categoria}</td>
                        <td>
                            <button id="btn_editar" data-id_categoria="${categoria.id_categoria}" type="button" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                            Editar Categoría
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger borrar_categoria" data-id="${categoria.id_categoria}">
                            <i class="fas fa-trash-alt"></i>
                            Eliminar
                            </button>
                        </td>
                        </tr>`;
        });

        /* Actualización del contenido HTML de la tabla con las categorías generadas*/
        $("#categoria_lista").html(template);
      }
    );
  }
  /*FIN DE LA FUNCION PARA LISTAR LAS CATEGORIAS */

  /*
   * Esta función se utiliza para enviar datos al controlador del servidor mediante una solicitud AJAX.
   * Recibe los siguientes parámetros:
   *   - url: la URL a la que se enviarán los datos.
   *   - formData: los datos que se enviarán al servidor, generalmente en formato FormData.
   *   - successCallback: la función que se ejecutará si la solicitud es exitosa.
   *   - errorCallback: la función que se ejecutará si la solicitud produce un error.
   */
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


  /*FUNCION PARA AÑADIR UNA NUEVA CATEGORIA A LA BASE DE DATOS */
  $("#form_categoria").submit((e) => {
    e.preventDefault(); 

    // Obtiene el valor del nombre de la categoría del formulario
    const nombre_categoria = $("#nombre_categoria").val();

    // Crea un objeto FormData
    const formData = new FormData($("#form_categoria")[0]);
    formData.append("funcion", "crear_categoria"); // Añade la función para identificar la acción en el controlador
    formData.append("nombre_categoria", nombre_categoria); // Añade el nombre de la categoría al FormData

    // Envía los datos al controlador utilizando la función enviarDatos
    enviarDatos(
      "../controlador/categoriaControlador.php", // URL del controlador
      formData, // Datos del formulario
      function (response) {
        // Condicional de acuerdo a la respuesta del servidor
        if (response.trim() === "add_categoria") {
          // Muestra un mensaje de éxito utilizando SweetAlert
          Swal.fire({
            icon: "success",
            title: "Creación exitosa",
            text: "La categoria ha sido creada con éxito.",
          }).then(() => {
            // Limpia el formulario, actualiza la lista de categorías
            $("#form_categoria").trigger("reset");
            location.reload();
          });
        } else {
          // Muestra un mensaje de error utilizando SweetAlert si la respuesta indica un problema
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error al crear la categoria, vuelva a intentarlo",
          });
        }
      },
      function (error) {
        // Función de error: se ejecuta si hay un problema en la solicitud AJAX
        mostrarMensaje("noadd", "Error en la solicitud AJAX");
      }
    );
  });
  /*FIN FUNCION PARA AÑADIR UNA NUEVA CATEGORIA A LA BASE DE DATOS */


  /*CARGAR LA INFORMACION DE LA CATEGORIA AL MODAL PARA EDITAR*/
  $(document).on("click", "#btn_editar", (e) => {
    // Se define la función a ejecutar en el controlador
    funcion = "cargar_categoria";
    // Se obtiene el ID de la categoría desde el botón de edición
    const id_categoria = $(e.currentTarget).data("id_categoria");
    // Se realiza una solicitud AJAX para obtener la información de la categoría seleccionada
    $.post(
      "../controlador/CategoriaControlador.php",
      { funcion, id_categoria },
      (response) => {
        // Se convierte la respuesta JSON en un objeto JavaScript
        const categoriaEdit = JSON.parse(response);
        // Se llenan el modal de edicion
        $("#nombre_editar_categoria").val(categoriaEdit.nombre_categoria);
        $("#id_categoria").val(categoriaEdit.id_categoria);
        // Se muestra el modal de edición
        $("#editarCategoria").modal("show");
      }
    );
  });
  /*FIN CARGAR LA INFORMACION DE LA CATEGORIA AL MODAL PARA EDITAR*/


  /* FUNCION PARA EDITAR CATEGORIA*/
  $("#form_editar_categoria").submit((e) => {
    e.preventDefault();
    // Se obtienen los datos del formulario de edición
    const nombre_categoriae = $("#nombre_editar_categoria").val();
    const id_categoriae = $("#id_categoria").val();
    const formData = new FormData();

    // Se agregan los datos al objeto FormData
    formData.append("funcion", "editar_categoria");
    formData.append("nombre_categoriae", nombre_categoriae);
    formData.append("id_categoriae", id_categoriae);

    // Se envían los datos al controlador mediante una solicitud AJAX
    enviarDatos(
      "../controlador/categoriaControlador.php",
      formData,
      function (response) {
        console.log(response);
        // Se muestra un mensaje de éxito si la categoría se editó correctamente
        if (response.trim() === "edits") {
          Swal.fire({
            icon: "success",
            title: "Edición exitosa",
            text: "La categoría ha sido modificada con éxito.",
          }).then(() => {
            $("#form_editar_categoria").trigger("reset");
            window.location.href = "categoria.php";
            $("#form_editar_categoria").modal("hide");
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
          });
        } else {
          // Se muestra un mensaje de error si la edición de la categoría falla
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Edición Incorrecta de la categoría.",
          });
        }
      },
      function (error) {
        // Se muestra un mensaje de error si hay un problema con la solicitud AJAX
        mostrarMensaje("noadd", "Error en la solicitud AJAX");
      }
    );
  });
  /* FIN FUNCION PARA EDITAR CATEGORIA*/


  /* FUNCION PARA MOSTRAR UNA ADVERTENCIA ANTES DE BORRAR LA CATEGORIA DE LA BASE DE DATOS*/
  $(document).on("click", ".borrar_categoria", function () {

    // Se obtiene el ID de la categoría a eliminar desde el botón correspondiente
    const id_categoria = $(this).data("id");

    // Se muestra un mensaje de confirmación antes de eliminar la categoría
    Swal.fire({
      title: "¿Estás seguro?",
      text: "¡No podrás revertir esto!, la información personal del usuario y compras realizadas también serán eliminadas",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, eliminarlo",
    }).then((result) => {
      if (result.isConfirmed) {
        // Si el usuario confirma la eliminación, se llama a la función eliminarCategoria
        eliminarCategoria(id_categoria);
      }
    });
  });
  /* FIN FUNCION PARA MOSTRAR UNA ADVERTENCIA ANTES DE BORRAR LA CATEGORIA DE LA BASE DE DATOS*/


  /* FUNCION PARA BORRAR LA CATEGORIA DE LA BASE DE DATOS*/
  function eliminarCategoria(id_categoria) {
    console.log(id_categoria);
    const funcion = "borrar_categoria";
    // Se realiza una solicitud AJAX para eliminar la categoría del servidor
    $.post(
      "../controlador/categoriaControlador.php",
      { id_categoria, funcion },
      function (response) {
        console.log(response);
        // Se muestra un mensaje de éxito si la categoría se elimina correctamente
        if (response.trim() === "delete") {
          Swal.fire({
            icon: "success",
            title: "Eliminación exitosa",
            text: "La categoría ha sido eliminada con éxito.",
          }).then(() => {
            window.location.href = "categoria.php";
          });
        } else {
          // Se muestra un mensaje de error si la eliminación de la categoría falla
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudo eliminar la categoría.",
          });
        }
      }
    );
  }
  /* FIN FUNCION PARA BORRAR LA CATEGORIA DE LA BASE DE DATOS*/
});
