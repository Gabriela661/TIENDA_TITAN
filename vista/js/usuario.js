var personal = document.getElementsByClassName("btn-personal");
var cliente = document.getElementsByClassName("btn-cliente");

$(document).ready(function () {
  var funcion;
  var funcion = "";
  /* condicional para listar segun el rol del usuario*/
  if (personal) {
    // Funcion para listar los usuarios de tipo personal
    listar_personal();
    function listar_personal(consulta) {
      funcion = "listar_personal";
      $.post(
        "../controlador/usuarioControlador.php",
        { consulta, funcion },
          (response) => {
              console.log(response);
          const personals = JSON.parse(response);
          let template = "";
          let contador = 0; // Inicializamos el contador
            personals.forEach((personal) => {
              
            let imagenStyle = `width: 50px; height: 50px;`;
            contador++; // Incrementamos el contador en cada iteración
            template += `
                    <tr data-id="${personal.id_usuario}">
                    <th scope="row">${contador}</th>
                        <th scope="row">${personal.nombre_usuario}</th>
                        <th scope="row">${personal.apellido_usuario}</th>
                        <th scope="row">${personal.correo_usuario}</th>                       
                        <th scope="row"><div class="text-center">
                            <img src="${personal.foto_usuario}" style="${imagenStyle}"  class="img-circle" alt="...">
                          </div></th>
                         <th scope="row">${personal.nombre_rol}</th>     
                        <th scope="row"> <button id="btn_editar" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_usuario" data-id_usuario="${personal.id_usuario}">
                                Editar
                            </button></th>
                        <th scope="row"><button class="btn btn-danger borrar_usuario" data-id="${personal.id_usuario}">Eliminar</button></th>
                        `;
          });
          $("#listar_personal").html(template);
        }
      );
    }
  }
  //cliente
  if (cliente) {
    listar_cliente();
    function listar_cliente(consulta) {
      funcion = "listar_cliente";
      $.post(
        "../controlador/usuarioControlador.php",
        { consulta, funcion },
          (response) => {
            console.log(response)
          const clientes = JSON.parse(response);
          let template = "";
          let contador = 0; // Inicializamos el contador
          clientes.forEach((cliente) => {
            let imagenStyle = `width: 50px; height: 50px;`;
            contador++; // Incrementamos el contador en cada iteración
            template += `
                        <tr data-id="${cliente.id_usuario}">
                        <th scope="row">${contador}</th>
                            <th scope="row">${cliente.nombre_usuario}</th>
                            <th scope="row">${cliente.apellido_usuario}</th>
                            <th scope="row">${cliente.correo_usuario}</th>                                                   
                            <th scope="row"><div class="text-center">
                                <img src="${cliente.foto_usuario}" style="${imagenStyle}"  class="img-circle" alt="...">
                              </div></th>
    
                            <th scope="row">  <button id="btn_editar" class="btn btn-warning btn-editarAdm" type="button"
                                  data-toggle="modal" data-target="#editar_usuario" data-id_usuario="${cliente.id_usuario}">
                                Editar
                            </button></th>
                            <th scope="row"><button class="btn btn-danger borrar_usuario" data-id="${cliente.id_usuario}">Eliminar</button></th>
                            `;
          });
          $("#listar_cliente").html(template);
        }
      );
    }
  }
});
