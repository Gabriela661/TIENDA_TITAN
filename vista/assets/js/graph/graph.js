$(document).ready(function () {
  var funcion;
  var funcion = '';

  //mostrar reporte de usuarios
  /*  reporte_facturas(); */
  function reporte_facturas(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'reporte_facturas';
    $.post(
      '../controlador/reporteFacturasControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        let template = '';
        let contador = 0; // Inicializamos el contador
        reportes.forEach((reporte) => {
          // Asignar tipo_cliente en comparación de usuario
          // Usuarios = (cliente online)
          // Usuarios != (cliente presencial), porque el id_usuario
          if (reporte.id_usuario == reporte.id_cliente) {
            tipo_cliente = 'Online';
          } else {
            tipo_cliente = 'Presencial';
          }
          contador++; // Incrementamos el contador en cada iteración
          template += `
            <tr data-id="${reporte.id_cliente}">
            <th scope="row">${contador}</th>
            <th scope="row">${reporte.nombre_tipo_pago}</th>          
            <th scope="row">${reporte.nombre_cliente}</th>
            <th scope="row">${tipo_cliente}</th>
            <th scope="row">${reporte.total_venta}</th>
            <th scope="row">${reporte.fecha}</th>
            <th scope="row"><a href="${reporte.url_factura}" data-id_factura="${reporte.id_venta}" type="button" class="btn btn-info">
                          Ver
                       </a></th>`;
        });
        $('#reporte_facturas_lista').html(template);
      }
    );
  }

  $(document).on('click', '#diaFactura', function () {
    //mostrar reporte de usuarios
    dia_facturas();
    function dia_facturas(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'dia_facturas';
      $.post(
        '../controlador/reporteFacturasControlador.php',
        { consulta, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
              <th>N°</th>
              <th>FECHA</th>
              <th>MONTO TOTAL</th>
              <th>PRODUCTO CANTIDAD</th>
              </tr>`;
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            contador++; // Incrementamos el contador en cada iteración
            template += `
            <tr data-id="${reporte.fecha}">
            <th scope="row">${contador}</th>
            <th scope="row">${reporte.fecha}</th>          
            <th scope="row">${reporte.monto_total}</th>
            <th scope="row">${reporte.productos_cantidades}</th></tr>`;
          });
          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);
        }
      );
    }
  });

  $(document).on('click', '#mesFactura', function () {
    //mostrar reporte de usuarios
    mes_facturas();
    function mes_facturas(consulta) {
      // Se define la función a ejecutar en el controlador
      funcion = 'mes_facturas';
      $.post(
        '../controlador/reporteFacturasControlador.php',
        { consulta, funcion },
        (response) => {
          const reportes = JSON.parse(response);
          let template = '';
          let template2 = `<tr>
              <th>N°</th>
              <th>MES</th>
              <th>MONTO TOTAL</th>
              <th>PRODUCTO CANTIDAD</th>
              </tr>`;
          let contador = 0; // Inicializamos el contador
          reportes.forEach((reporte) => {
            // Asignar tipo_cliente en comparación de usuario
            // Usuarios = (cliente online)
            // Usuarios != (cliente presencial), porque el id_usuario
            contador++; // Incrementamos el contador en cada iteración
            template += `
            <tr data-id="${reporte.mes}">
            <th scope="row">${contador}</th>
            <th scope="row">${reporte.mes}</th>          
            <th scope="row">${reporte.monto_total}</th>
            <th scope="row">${reporte.productos_cantidades}</th></tr>`;
          });
          $('#reporte_facturas_lista').html(template);
          $('#facturas_lista_head').html(template2);
        }
      );
    }
  });

  $(document).on('click', '#btnCargarGrap3', function () {
    //mostrar reporte de usuarios
    fechas_graph3();
    function fechas_graph3(consulta) {
      const fechaInicio = $('#fechaInicioG3').val();
      console.log(fechaInicio);
      const fechaFin = $('#fechaFinG3').val();
      console.log(fechaFin);
      // Se define la función a ejecutar en el controlador
      funcion = 'fechas_graph3';
      $.post(
        '../controlador/graphControlador.php',
        { consulta, fechaInicio, fechaFin, funcion },
        (response) => {
            console.log(response);
          const reportes = JSON.parse(response);
          console.log(reportes);
          const resultados = completarFechas(reportes);
          console.log(resultados);
          createGrafph(resultados, 'bar', 'Monto Final');

          let template = '';
          let contador = 0; // Inicializamos el contador
        }
      );
    }
  });
});

function completarFechas(datos) {
  const formatoFecha = /^\d{2}-\d{2}-\d{4}$/; // Expresión regular para validar el formato día-mes-año

  const fechas = new Set(datos.map((item) => item.fecha));
  const primerFecha = new Date(
    Math.min(
      ...datos
        .filter((item) => formatoFecha.test(item.fecha))
        .map((item) => new Date(`${item.fecha.split('-').reverse().join('-')}`))
    )
  );
  const ultimaFecha = new Date(
    Math.max(
      ...datos
        .filter((item) => formatoFecha.test(item.fecha))
        .map((item) => new Date(`${item.fecha.split('-').reverse().join('-')}`))
    )
  );

  const resultado = [...datos]; // Copia del array original

  for (
    let fecha = new Date(primerFecha);
    fecha <= ultimaFecha;
    fecha.setDate(fecha.getDate() + 1)
  ) {
    const fechaString = `${fecha.getDate().toString().padStart(2, '0')}-${(
      fecha.getMonth() + 1
    )
      .toString()
      .padStart(2, '0')}-${fecha.getFullYear()}`;
    if (!fechas.has(fechaString)) {
      resultado.push({ fecha: fechaString, monto_total: 0 });
    }
  }

  return resultado.sort(
    (a, b) =>
      new Date(`${a.fecha.split('-').reverse().join('-')}`) -
      new Date(`${b.fecha.split('-').reverse().join('-')}`)
  );
}

var myChart = null; //
function createGrafph(data, typeGraph, label) {
  var labelX = data.map(function (item) {
    return item.fecha;
  });

  var dataY = data.map(function (item) {
    return item.monto_total;
  });
  // Configurar la gráfica
  var canva = document.getElementById('graph3');
  var ctx = canva.getContext('2d');

  // Limpiar el contenedor del canvas
  

  if (myChart) {
    myChart.destroy();
  }

  /* var Chart = window.Chart(); */
  myChart = new Chart(ctx, {
    type: typeGraph,
    data: {
      labels: labelX,
      datasets: [
        {
          label: label,
          data: dataY,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true, // Hacer que la gráfica sea responsive
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
