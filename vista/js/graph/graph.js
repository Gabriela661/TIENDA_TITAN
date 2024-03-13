

$(document).ready(function () {
  var funcion;
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
        console.log(reportes);
        createGrafph2(reportes, 'pie', 'Categorías X Productos');
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
        comparaSemana()
      }
    );
  }


});

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

  // Función para generar colores aleatorios
  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
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
  console.log(data)

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
  console.log(data)

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
function comparaSemana(/* data */) {

  // Extraer categorías y cantidad de ventas del array JSON
/*   var categories = data.map((item) => item.fecha);
  var ventas = data.map((item) => item.monto_total);
  console.log(data) */

  var ventasSemanaActual = [120, 200, 150, 80, 70, 110, 130];
    var ventasSemanaAnterior = [100, 180, 120, 90, 60, 85, 110];
    var dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

  // Configurar opciones del gráfico
  msyChart5 = echarts.init(document.getElementById('graph5'));

  var option = {
      title: {
        text: ''
      },
      tooltip: {
        trigger: 'axis'
      },
      legend: {
        data: ['Semana Actual', 'Semana Anterior']
      },
      xAxis: {
        type: 'category',
        data: dias
      },
      yAxis: {
        type: 'value'
      },
      series: [
        {
          name: 'Semana Actual',
          type: 'line',
          data: ventasSemanaActual
        },
        {
          name: 'Semana Anterior',
          type: 'line',
          data: ventasSemanaAnterior
        }
      ]
    };
  
  // Aplicar opciones al gráfico
  msyChart5.setOption(option);
}