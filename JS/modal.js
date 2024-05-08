$(document).ready(function() {
    // Mostrar el modal de anuncio al cargar la página
    $('#anuncioModal').modal('show');
  
    // Cerrar automáticamente el modal después de 5 segundos
    setTimeout(function() {
      $('#anuncioModal').modal('hide');
    }, 5000);
  });
  