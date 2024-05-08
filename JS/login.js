$(document).ready(function() {
    // Manejar clics en el icono de la contraseña para mostrar/ocultar la contraseña
    $('.password-toggle').click(function() {
      var passwordInput = $(this).closest('.input-group').find('input');
      var passwordFieldType = passwordInput.attr('type');
      // Alternar entre tipo de entrada de contraseña y texto
      if (passwordFieldType === 'password') {
        passwordInput.attr('type', 'text');
        $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        passwordInput.attr('type', 'password');
        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });