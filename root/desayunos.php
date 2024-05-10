<?php include '../templates/encabezado.php' ?>
<link rel="stylesheet" href="../css/desayunosStyle.css" />
<?php include '../templates/header.php' ?>
<div class="menu-comida">
  <div class="logotipo-res">
    <img src="../imagenes/logotipo.png" class="logotipo" alt="" />
  </div>
  <div class="seccion1">
    <h1>DESAYUNOS</h1>
    <p>Incluye: Café o Té, mollete de mantequilla y fruta</p>
    <div class="imagenes">
      <img src="https://www.nutrimarket.com/blog/wp-content/uploads/2021/05/t%C3%A9-vs-caf%C3%A9-300x218.jpg" alt="" class="img" />
      <img src="https://www.gourmet.cl/wp-content/uploads/2014/09/pan-de-ajo.jpg" alt="" class="img" />
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3dloukfx8uZgDLeDSJYJZ3wDQtjQS8WPnAoLY4HyaEA&s" alt="" class="img" />
    </div>
  </div>
  <hr />
  <div class="seccion">
    <div class="menu-platillo">
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<h2>Huevos</h2>';
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
    <div class="menu-platillo">
      <h2>Omelettes</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 2";
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
  <hr />
  <div class="seccion">
    <div class="menu-platillo">
      <h2>Chilaquiles</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 3";
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
    <div class="menu-platillo">
      <h2>Enchiladas</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 4";
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
  <hr />
  <div class="seccion">
    <div class="menu-platillo">
      <h2>Huaraches</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 5";
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
    <div class="menu-platillo">
      <h2>Molletes</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 6";
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
  <hr />
  <div class="seccion4">
    <div class="menu-platillo">
      <h2>Otros</h2>
      <?php
      // Tu consulta SQL para obtener los platillos de la clasificación 1
      include("../modules/Conexion.php");
      $sql = "SELECT `nombre`, `precio` FROM `platillo` WHERE `clasificacion` = 7";
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