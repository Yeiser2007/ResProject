function obtenerHoraActual() {
    const fechaActual = new Date();
    const hora = fechaActual.getHours();
    const minutos = fechaActual.getMinutes();
    const diaSemana = fechaActual.getDay(); // 0 para domingo, 1 para lunes, ..., 6 para sábado
    
    return { hora, minutos, diaSemana };
  }

  // Función para cambiar el color del botón según la hora y asignar el enlace correspondiente
  function actualizarBotonSegunHora() {
    const { hora, minutos, diaSemana } = obtenerHoraActual();
    const boton = document.getElementById('botonHorario');

    // Horario de lunes a sábado: 8:30 a 12:59
    if (diaSemana >= 1 && diaSemana <= 6 && ((hora === 8 && minutos >= 30)) && (hora < 13)) {
      cambiarColoresAnimacion('#15098D', 'rgb(178, 184, 173)');
      boton.textContent = "Desayunos";
      boton.onclick = function() {
        location.href = '/html/desayunos.html';
      };
    } 
    // Horario de lunes a sábado: 13:00 a 17:20
    else if (diaSemana >= 1 && diaSemana <= 6 && (hora > 13 && (hora === 17 && minutos <= 20))) {
      cambiarColoresAnimacion('rgb(255, 195, 0);', 'rgb(178, 184, 173)');
      boton.textContent = "Comida";
      boton.onclick = function() {
        location.href = '/html/comida.html';
      };
    }
    else {
      cambiarColoresAnimacion('red', '#808B96');
      boton.textContent = "Cerrado";
      boton.onclick = null; // Eliminar cualquier enlace si el botón está en gris
    }
  }
  function cambiarColoresAnimacion(colorInicial, colorFinal) {
    document.documentElement.style.setProperty('--color-inicial', colorInicial);
    document.documentElement.style.setProperty('--color-final', colorFinal);
  }
  // Llamar a la función al cargar la página para establecer el color inicial del botón y asignar el enlace correspondiente
  actualizarBotonSegunHora();