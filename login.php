<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap 4 CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>

  <div class="container">
    <div class="card" style="width: 18rem;">
      <img src="imagenes/logotipo.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Administrador</h5>
        <form action="root/val_login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <div class="input-group">
              <input type="text" class="form-control" id="exampleInputEmail1" name="user" required aria-describedby="emailHelp" placeholder="Enter email">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="exampleInputPassword1" required name="passw" placeholder="Password">
              <div class="input-group-append">
                <span class="input-group-text password-toggle"><i class="fas fa-eye"></i></span>
              </div>
            </div>
          </div>
          <div class="send">
            <button type="submit" name="login" class="btn btn-primary">Iniciar sesión</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap 4 JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Tu script personalizado -->
  <script src="JS/login.js"></script>
</body>
</html>

