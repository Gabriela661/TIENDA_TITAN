$(document).ready(function () {
    var funcion = "";

    listarIngresos();

    function listarIngresos(consulta) {
        funcion = "listarIngresos";

        $.post(
            "../controlador/ingresoControlador.php",
            { consulta, funcion },
            (response) => {
                const ingreso = JSON.parse(response);
                let template = "";
                let contador = 0;
                let sumaCantidadTotal = 0; // Variable para almacenar la suma de cantidad_total

                ingreso.forEach((ingresos) => {
                    contador++;
                    template += `
                        <tr data-id="${ingresos.id_venta}">
                            <th scope="row">${contador}</th>
                            <td>${ingresos.nombre_cliente}</td>
                            <td>${ingresos.fecha}</td>
                            <td>${ingresos.nombre_tipo_pago}</td>
                            <td>${ingresos.nombre_usuario}</td>
                            <td>${ingresos.nombre_producto}</td>
                            <td>${ingresos.cantidad}</td>
                            <td>${ingresos.precio_producto}</td>
                            <td>${ingresos.cantidad_total}</td>
                        </tr>`;
                    
                    sumaCantidadTotal += parseFloat(ingresos.cantidad_total); // Suma de cantidad_total
                });
                // Agregar fila con la suma de cantidad_total
                template += `
                    <tr>
                        <td colspan="7"></td>
                        <td><strong>Total:</strong></td>
                        <td>${sumaCantidadTotal}</td>
                    </tr>`;

                $("#ingresos_lista").html(template);
            }
        );
    } 
});
