$(document).ready(function () {
  $('#reporte_usuario').DataTable({
    language: {
      decimal: '',
      emptyTable: 'No hay datos',
      info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      infoEmpty: 'Mostrando 0 a 0 de 0 registros',
      infoFiltered: '(Filtro de _MAX_ total registros)',
      infoPostFix: '',
      thousands: ',',
      lengthMenu: 'Mostrar _MENU_ registros',
      loadingRecords: 'Cargando...',
      processing: 'Procesando...',
      search: 'Buscar:',
      zeroRecords: 'No se encontraron coincidencias',
      paginate: {
        first: 'Primero',
        last: 'Ultimo',
        next: 'Siguiente',
        previous: 'Anterior',
      },
      aria: {
        sortAscending: ': Activar orden de columna ascendente',
        sortDescending: ': Activar orden de columna desendente',
      },
    },
  });
  $('#reporte_producto').DataTable({
    language: {
      decimal: '',
      emptyTable: 'No hay datos',
      info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      infoEmpty: 'Mostrando 0 a 0 de 0 registros',
      infoFiltered: '(Filtro de _MAX_ total registros)',
      infoPostFix: '',
      thousands: ',',
      lengthMenu: 'Mostrar _MENU_ registros',
      loadingRecords: 'Cargando...',
      processing: 'Procesando...',
      search: 'Buscar:',
      zeroRecords: 'No se encontraron coincidencias',
      paginate: {
        first: 'Primero',
        last: 'Ultimo',
        next: 'Siguiente',
        previous: 'Anterior',
      },
      aria: {
        sortAscending: ': Activar orden de columna ascendente',
        sortDescending: ': Activar orden de columna desendente',
      },
    },
  });
  $('#reporte_facturas').DataTable({
    language: {
      decimal: '',
      emptyTable: 'No hay datos',
      info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      infoEmpty: 'Mostrando 0 a 0 de 0 registros',
      infoFiltered: '(Filtro de _MAX_ total registros)',
      infoPostFix: '',
      thousands: ',',
      lengthMenu: 'Mostrar _MENU_ registros',
      loadingRecords: 'Cargando...',
      processing: 'Procesando...',
      search: 'Buscar:',
      zeroRecords: 'No se encontraron coincidencias',
      paginate: {
        first: 'Primero',
        last: 'Ultimo',
        next: 'Siguiente',
        previous: 'Anterior',
      },
      aria: {
        sortAscending: ': Activar orden de columna ascendente',
        sortDescending: ': Activar orden de columna desendente',
      },
    },
  });
  /* var dataTable = $('#reporte_usuario').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Establecemos el idioma español
        }, 
        "oLanguage": {
            "sSearch": "Buscar:",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
            "sZeroRecords": "No se encontraron registros",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sLoadingRecords": "Cargando..."
        }
    });

    $('#buscar').on('keyup', function () {
        dataTable.search(this.value).draw();
    });
 //reporte productos facturas
    var dataTable = $('#reporte_facturas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Establecemos el idioma español
        }, 
        "oLanguage": {
            "sSearch": "Buscar:",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
            "sZeroRecords": "No se encontraron registros",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sLoadingRecords": "Cargando..."
        }
    });

    $('#buscar').on('keyup', function () {
        dataTable.search(this.value).draw();
    });
    //reporte productos busqueda
    var dataTable = $('#reporte_productos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Establecemos el idioma español
        }, 
        "oLanguage": {
            "sSearch": "Buscar:",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
            "sZeroRecords": "No se encontraron registros",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sLoadingRecords": "Cargando..."
        }
    });

    $('#buscar').on('keyup', function () {
        dataTable.search(this.value).draw();
    }); */
});
