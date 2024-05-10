<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/comida.css">
<?php include '../templates/header.php' ?>

<div class="menu-comida">
    <div class="logotipo-res">
        <img src="imagenes/logotipo.png" class="logotipo" alt="">
    </div>
    <div class="seccion1">
        <div class="tit">
            <img src="https://cdn-icons-png.flaticon.com/512/45/45243.png" class="log" alt="">
            <h1>COMIDAS</h1>
            <img src="https://cdn-icons-png.flaticon.com/512/45/45243.png" class="log" alt="">
        </div>

        <p class="descripcion">Incluye: Agua del dia, 2 entradas , fuerte del dia Postre</p>
        <div class="imagenes">
            <img src="https://img.freepik.com/fotos-premium/ensalada-aislado-sobre-fondo-blanco_87394-17796.jpg" alt=""
                class="img">
            <img src="https://img.freepik.com/fotos-premium/plato-caldo-aislado-sobre-fondo-blanco_185193-73905.jpg"
                alt="" class="img">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlvHcZE_BIowOS3chPG6VjDqD4mquai8ArPP1O_r5-Sw&s"
                alt="" class="img">
        </div>
    </div>
    <hr>
    <?php
    include ("../modules/Conexion.php");

    // Preparar la consulta SQL para obtener el último registro
    $sql = "SELECT * FROM `menu` ORDER BY `id_menu` DESC LIMIT 1";

    // Ejecutar la consulta
    $resultado = $conn->query($sql);

    if ($resultado) {
        // Obtener el registro como un array asociativo
        $ultimo_registro = $resultado->fetch_assoc();
        ?>
        <div class="seccion2">
            <h2>MENU DEL DIA</h2>
            <h3>Fecha: <?php echo $ultimo_registro['fecha']; ?></h3>
            <div class="subseccion2">
                <div class="subsecc21">
                    <h3>Ensaladas:</h3>
                    <ul class="list 1entradas">
                        <li><?php echo $ultimo_registro['entrada1']; ?></li>
                        <li><?php echo $ultimo_registro['entrada12']; ?></li>
                    </ul>
                    <h3>Sopas:</h3>
                    <ul class="list 2entradas">
                        <li><?php echo $ultimo_registro['entrada21']; ?></li>
                        <li><?php echo $ultimo_registro['entrada22']; ?></li>
                    </ul>
                    <h3>Fuertes:</h3>
                    <ul class="list fuertes">
                        <li><?php echo $ultimo_registro['fuerte1']; ?></li>
                        <li><?php echo $ultimo_registro['fuerte2']; ?></li>
                    </ul>
                </div>
                <div class="subsec22">
                    <div class="circle">
                        <h1 class="precio">$<?php echo $ultimo_registro['precio']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        // Mostrar un mensaje de error si la consulta falla
        echo "Error al ejecutar la consulta: " . $conn->error;
    }
    ?>

    <hr>
    <div class="seccion3">
        <h2>MENU PLATILLO</h2>
        <div class="menu-platillo1">
            <h2>Con guarniciones</h2>
            <p>(verduras, chilaquiles, nopales)</p>
            <?php
            // Tu consulta SQL para obtener los platillos de la clasificación 1
            include ("../modules/Conexion.php");
            $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 8";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="platillos">';
                echo '<ul class="list">';
                while ($row = $result->fetch_assoc()) {
                    // Imprimir cada nombre de platillo en la lista
                    echo '<li>' . $row["nombre"] . '</li>';
                }
                echo '</ul>'; // Cerrar la lista de platillos
                echo '<div class="precios">';
                echo '<ul class="list2">';
                // Resetear el puntero del resultado para volver a iterar
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    // Imprimir cada precio de platillo en la lista2
                    echo '<li>$' . $row["precio"] . '</li>';
                }
                echo '</ul>'; // Cerrar la lista2 de precios
                echo '</div>'; // Cerrar el div de precios
                echo '</div>'; // Cerrar el div de platillos
            } else {
                echo "No se encontraron platillos de la clasificación 1.";
            }
            $conn->close();
            ?>

        </div>
        <div class="menu-platillo2">

            <h2>Para preparar</h2>
            <?php
            // Tu consulta SQL para obtener los platillos de la clasificación 1
            include ("../modules/Conexion.php");
            $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 9";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="platillos">';
                echo '<ul class="list">';
                while ($row = $result->fetch_assoc()) {
                    // Imprimir cada nombre de platillo en la lista
                    echo '<li>' . $row["nombre"] . '</li>';
                }
                echo '</ul>'; // Cerrar la lista de platillos
                echo '<div class="precios">';
                echo '<ul class="list2">';
                // Resetear el puntero del resultado para volver a iterar
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    // Imprimir cada precio de platillo en la lista2
                    echo '<li>$' . $row["precio"] . '</li>';
                }
                echo '</ul>'; // Cerrar la lista2 de precios
                echo '</div>'; // Cerrar el div de precios
                echo '</div>'; // Cerrar el div de platillos
            } else {
                echo "No se encontraron platillos de la clasificación 1.";
            }
            $conn->close();
            ?>

        </div>
    </div>
</div>

<?php include '../templates/footer.php' ?>
</body>

</html>