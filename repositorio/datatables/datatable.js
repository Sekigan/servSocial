$(document).ready(function() {
  $('#tabla').DataTable( {
      "lengthMenu" : [5, 10, 20, 30],
      "language": {
          "search" : "Buscar",
           "zeroRecords": "Lo sentimos. No se encontraron registros.",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros aún.",
          "infoFiltered": "(filtrados de un total de _MAX_ registros)",
          "LoadingRecords": "Cargando ...",
          "Processing": "Procesando...",
          "SearchPlaceholder": "Comience a teclear...",
          "paginate": {
             "previous": "Anterior",
             "next": "Siguiente",
              }
      },
      "sort": false,
    });
});
