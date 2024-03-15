$(document).ready(function () {
  var funcion = '';

  listarEgresos();

  function listarEgresos(consulta) {
    funcion = 'listarEgresos';

    $.post(
      '../controlador/egresoControlador.php',
      { consulta, funcion },
      (response) => {
        const egreso = JSON.parse(response);
        console.log(response);
        let template = '';
        //let contador = 0;
        let sumaCantidadTotal = 0; // Variable para almacenar la suma de cantidad_total

        egreso.forEach((egresos) => {
          template += `
                        <tr data-id="${egresos.codigo_producto}">
                            <td>${egresos.codigo_producto}</td>
                            <td>${egresos.nombre_producto}</td>
                            <td>${egresos.cantidad_carrito}</td>
                            <td>${egresos.id_usuario}</td>
                        </tr>`;
        });
        $('#egresos_lista').html(template);

        // Inicializar DataTables después de cargar los datos en la tabla
        var egresos = $('#egresos').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
          },
        });
      }
    );
  }
});
