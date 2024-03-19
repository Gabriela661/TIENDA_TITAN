$(document).ready(function () {
  var funcion = '';

  /* Pide datos de categorías X productos al controlador */
  venta_producto_categorias();
  function venta_producto_categorias(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'venta_producto_categorias';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        createGrafph2(reportes, 'pie', 'Categorías X Productos');
      }
    );
  }

  /* Pide datos de categorías X productos al controlador */
  usuariosTotal();
  function usuariosTotal(consulta) {
    // Se define la función a ejecutar en el controlador
    funcion = 'usuarioTotal';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        $('#usuariosTotalP').text(reportes[0].totaluser);
      }
    );
  }

  productoTotal();
  function productoTotal(consulta) {
    funcion = 'productoTotal';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        $('#productosTotalP').text(reportes[0].productot);
      }
    );
  }

  categoriasTotal();
  function categoriasTotal(consulta) {
    funcion = 'categoriasTotal';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        $('#categoriaTotalP').text(reportes[0].cateffa);
      }
    );
  }

  ingresosTotal();
  function ingresosTotal(consulta) {
    funcion = 'ingresosTotal';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        const reportes = JSON.parse(response);
        $('#ingresosTotalP').text(reportes[0].ingrestot);
      }
    );
  }

  semanaComparar();
  function semanaComparar(consulta) {
    funcion = 'semanaComparar';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        /* console.log(response); */
        const reportes = JSON.parse(response);
        const resultados = completarFechas(reportes);
        console.log('array comparar', resultados);
        comparaSemana(resultados);
      }
    );
  }

  usuario_venta();
  function usuario_venta(consulta) {
    funcion = 'usuario_venta';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, funcion },
      (response) => {
        /* console.log(response) */
        const reportes = JSON.parse(response);
        console.log(reportes);
        createGrafph6(reportes);
      }
    );
  }

  /* Llama a la función que devuelve gráfica en rango a dos fechas al cargar la pág */
  fechas_graph3();

  $(document).on('click', '#btnCargarGrap3', function () {
    /* Llama a la función que devuelve gráfica en rango a dos fechas al click on btn*/
    fechas_graph3();
  });

  /* Envía función al controlar para pedir datos && ejecuta la función graph2 */
  function fechas_graph3(consulta) {
    const fechaInicio = $('#fechaInicioG3').val();
    const fechaFin = $('#fechaFinG3').val();
    // Se define la función a ejecutar en el controlador
    funcion = 'fechas_graph3';
    $.post(
      '../controlador/graphControlador.php',
      { consulta, fechaInicio, fechaFin, funcion },
      /* graphController => response.json() => [{}, {}]  */
      (response) => {
        const reportes = JSON.parse(response);
        //ejecuta función completarFechas => [{}, {}, {}]
        const resultados = completarFechas(reportes);
        createGrafph(resultados, 'bar', 'Monto Final');
        pieChartCategoriaProducto(resultados);
        pieChartCategoriaProducto2(resultados);
        //comparaSemana();
      }
    );
  }
});

// Función para generar colores aleatorios
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

// Completa los días que no hay ventas  [{"fecha":"-", "monto_total":0}]
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

/* Genererar bar graph */
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
  ctx.clearRect(0, 0, canva.width, canva.height);

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

/* Genererar bar graph */
var myChart2 = null; //
function createGrafph2(data, typeGraph, label) {
  var labelX = data.map(function (item) {
    return item.categoria;
  });

  var dataY = data.map(function (item) {
    return item.cantidad_ventas;
  });

  // Configurar la gráfica
  var canva = document.getElementById('barChart');
  var ctx = canva.getContext('2d');

  // Limpiar el contenedor del canvas
  ctx.clearRect(0, 0, canva.width, canva.height);

  if (myChart2) {
    myChart2.destroy();
  }

  // Generar colores aleatorios para cada dato
  var backgroundColors = [];
  for (var i = 0; i < dataY.length; i++) {
    backgroundColors.push(getRandomColor());
  }

  // Crear el gráfico de barras con los colores generados
  myChart2 = new Chart(ctx, {
    type: typeGraph,
    data: {
      labels: labelX,
      datasets: [
        {
          label: label,
          data: dataY,
          backgroundColor: backgroundColors, // Usar los colores generados aleatoriamente
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true, // Hacer que la gráfica sea responsive
    },
  });
}

var msyChart3 = null;
function pieChartCategoriaProducto(data) {
  msyChart3 = echarts.init(document.getElementById('revenue-chart-canvas'));

  // Extraer categorías y cantidad de ventas del array JSON
  var categories = data.map((item) => item.fecha);
  var ventas = data.map((item) => item.monto_total);
  console.log(data);

  // Configurar opciones del gráfico
  var options = {
    title: {
      text: '',
    },
    tooltip: {},
    legend: {
      data: ['Cantidad de Ventas'],
    },
    xAxis: {
      data: categories,
    },
    yAxis: {},
    series: [
      {
        name: 'Cantidad de Ventas',
        type: 'line',
        data: ventas,
      },
    ],
  };

  // Aplicar opciones al gráfico
  msyChart3.setOption(options);
}

//circular chart for categories x products
var msyChart4 = null;
function pieChartCategoriaProducto2(data) {
  msyChart4 = echarts.init(document.getElementById('sales-chart-canvas'));

  // Extraer categorías y cantidad de ventas del array JSON
  var categories = data.map((item) => item.fecha);
  var ventas = data.map((item) => item.monto_total);
  console.log(data);

  // Configurar opciones del gráfico
  var options = {
    title: {
      text: '',
    },
    tooltip: {},
    legend: {
      data: ['Cantidad de Ventas'],
    },
    xAxis: {
      data: categories,
    },
    yAxis: {},
    series: [
      {
        name: 'Cantidad de Ventas',
        type: 'bar',
        data: ventas,
      },
    ],
  };

  // Aplicar opciones al gráfico
  msyChart4.setOption(options);
}

//chart last week vs current week
var msyChart5 = null;
function comparaSemana(data) {
  var ventasSemanaActual = [];
  var ventasSemanaAnterior = [];
  // Extraer categorías y cantidad de ventas del array JSON
  data.map((item, i) => {
    if (i < 7) {
      ventasSemanaAnterior.push(item.monto_total);
    }
  });
  data.map((item, i) => {
    if (i >= 7) {
      ventasSemanaActual.push(item.monto_total);
    }
  });

  var fechaInput = data[0].fecha;
  console.log(fechaInput)
  var fecha = new Date(fechaInput);
  var diasSemana = [
    'Domingo',
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado',
  ];

  var nombresDias = [];
  for (var i = 0; i < 7; i++) {
    fecha.setDate(fecha.getDate() + 1);
    nombresDias.push(diasSemana[fecha.getDay()]);
  }

  var dias = nombresDias;

  // Configurar opciones del gráfico
  msyChart5 = echarts.init(document.getElementById('graph5'));

  var option = {
    title: {
      text: '',
    },
    tooltip: {
      trigger: 'axis',
    },
    legend: {
      data: ['Semana Actual', 'Semana Anterior'],
    },
    xAxis: {
      type: 'category',
      data: dias,
    },
    yAxis: {
      type: 'value',
    },
    series: [
      {
        name: 'Semana Actual',
        type: 'line',
        data: ventasSemanaActual,
      },
      {
        name: 'Semana Anterior',
        type: 'line',
        data: ventasSemanaAnterior,
      },
    ],
  };

  // Aplicar opciones al gráfico
  msyChart5.setOption(option);
}

//circular chart for categories x products
var msyChart6 = null;

function createGrafph6(data) {
  msyChart6 = echarts.init(document.getElementById('graph6'));

  // Extraer categorías y cantidad de ventas del array JSON
  var cliente = data.map((item) => item.nombre_usuario);
  var ventas = data.map((item) => item.total);

  // Generar colores aleatorios para cada barra
  var colors = [];
  for (var i = 0; i < ventas.length; i++) {
    colors.push(getRandomColor());
  }

  // Configurar opciones del gráfico
  var options = {
    title: {
      text: '',
    },
    tooltip: {},
    legend: {
      data: ['Cantidad de Ventas'],
    },
    yAxis: {
      data: cliente, // Cambiamos a eje Y y establecemos las categorías
    },
    xAxis: {}, // No necesitamos el eje X para este tipo de gráfico
    series: [
      {
        name: 'Cantidad de Ventas',
        type: 'bar',
        data: ventas,
        yAxisIndex: 0,
        itemStyle: {
          // Configurar colores para cada barra
          color: function (params) {
            return colors[params.dataIndex];
          },
        }, // Asociamos esta serie al eje Y
      },
    ],
  };

  // Aplicar opciones al gráfico
  msyChart6.setOption(options);
}
