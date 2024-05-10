<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/homeStyle.css" />
<?php include '../templates/header.php' ?>

<!-- modal -->
<div class="modal fade" id="anuncioModal" tabindex="-1" aria-labelledby="anuncioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anuncioModalLabel">Anuncio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="../imagenes/anuncio.jpg" class="img-fluid" alt="Anuncio">
            </div>
        </div>
    </div>
</div>
<!-- cuerpo main -->
<div class="main">
    
<div class="contenido-img">
    <div class="logotipo-res">
        <h1>Bienvenidos</h1>
        <img src="../imagenes/logotipo.png" class="logotipo" alt="" />

        <div class="wrapper">
            <button id="botonHorario" class="boton-horario">Horario actual

            </button>
        </div>
        </button>
    </div>
</div>
    <div class="seccion2">
        <h1>Conócenos</h1>
        <p>
            En "El Sabor de las Américas", cada plato es una historia que contar.
            Desde nuestros deliciosos desayunos hasta nuestras comidas
            reconfortantes y la atención personalizada para eventos especiales o
            reservaciones, cada visita es una experiencia única y sabrosa. ¡Te
            esperamos!
        </p>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block" src="../imagenes/res1.jpg" alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="../imagenes/re2.jpg" alt="Second slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="../imagenes/res3.jpg" alt="Third slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="../imagenes/res4.jpg" alt="Third slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="../imagenes/res5.jpg" alt="Third slide" />
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="seccion3">
    <h2>Visitanos</h2>
    <img src="../imagenes/Icono-Horario.png" class="time" alt="">
    <div class="horario">
        <p>(De lunes a sabado)</p>
        <p>Desayunos : 8:30am - 1:00p.m.</p>
        <p>Comidas: 1:00p.m - 5:20p.m</p>
    </div>
    <div class="ubicacion">
        <i class="bi bi-geo-alt-fill"></i>
        <a href="#" class="text-foot">  C. Sor Juana I. de La C. Manzana 022, Américas Cárdenas, 50000 Toluca
            de Lerdo, Méx.</a>
    </div>
    <iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.048426144541!2d-99.6482395247895!3d19.280260181966824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd899034940343%3A0x8177ba6227d1bf38!2sEl%20Sabor%20de%20las%20Americas!5e0!3m2!1ses-419!2smx!4v1713414681188!5m2!1ses-419!2smx" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


<?php include '../templates/footer.php' ?>
<script src="../JS/boton.js"></script>
<script src="../JS/modal.js"></script>

</body>

</html>