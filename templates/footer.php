

<footer>
  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="redes-sociales">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <p class="text-foot">Síguenos en redes sociales</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var navbarToggleBtn = document.querySelector('.navbar-toggler');
    var navbarCollapse = document.querySelector('.navbar-collapse');
    var navbar = document.querySelector('.navbar');
    var navbarExpanded = false; // Variable de bandera para seguir el estado del navbar

    navbarToggleBtn.addEventListener('click', function() {
        if (!navbarExpanded) {
            // Expandir el navbar
            navbar.style.backgroundColor = "transparent" 
            navbarToggleBtn.style.position = 'fixed';
            navbarToggleBtn.style.right = '20px';
            navbarToggleBtn.style.top = '30px';
            navbarToggleBtn.style.transform = 'translateY(-50%)';
            navbarToggleBtn.style.width = '40px';
            navbarToggleBtn.style.height = '40px';
            navbarToggleBtn.style.zIndex = '9999';
            navbarCollapse.style.transform = 'translateX(0)';
            navbarExpanded = true; // Actualizar el estado del navbar
        } else {
            // Colapsar el navbar
            navbarCollapse.style.transform = 'translateX(100%)';
            navbarToggleBtn.removeAttribute('style');
            navbar.style.backgroundColor = " var(--color-primario)"; 
            navbarExpanded = false; // Actualizar el estado del navbar
        }
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
