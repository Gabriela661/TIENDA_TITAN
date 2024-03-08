$(document).ready(function () {
    var funcion = "";

    listarEgresos();

    function listarEgresos(consulta) {
        funcion = "listarEgresos";

        $.post(
            "../controlador/egresoControlador.php",
            { consulta, funcion },
            (response) => {
                const egreso = JSON.parse(response);
                console.log(response)
                let template = "";
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
                    
                    //sumaCantidadTotal += parseFloat(egresos.cantidad_total); // Suma de cantidad_total
                });
                // Agregar fila con la suma de cantidad_total
                // template += `
                //     <tr>
                //         <td colspan="7"></td>
                //         <td><strong>Total:</strong></td>
                //         <td>${sumaCantidadTotal}</td>
                //     </tr>`;

                $("#egresos_lista").html(template);
            }
        );
    } 
});
