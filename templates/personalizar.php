<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmacias Guasdualito</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .main-box {
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      padding: 30px;
      max-width: 400px;
      width: 100%;
    }

    .form-icon {
      position: absolute;
      left: 15px;
      top: 10px;
      color: #aaa;
    }

    .form-control {
      padding-left: 35px;
    }

    @media screen and (max-width: 576px) {
      .main-box {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="main-box">
  <h2 class="mb-5">Registrate o Accede para personalizar</h2>
  <button class="btn btn-success w-100 mb-3" data-bs-toggle="modal" data-bs-target="#loginModal">
    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
  </button>
  <button class="btn btn-secondary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#registerModal">
    <i class="fas fa-user-plus me-2"></i>Registrarse
  </button>
  <a href="bienvenida.php" type="button" class="btn btn-danger w-100">
    <i style="color: white;" class="fas fa-arrow-left me-2"></i>Cancelar
  </a>
</div>

<!-- Modal Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title">Iniciar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Formulario Inicio de Sesión -->
      <form action="personalizacion.php" method="POST">
        <div class="modal-body">
          <div class="mb-3 position-relative">
            <input type="hidden" name="idLogin">
            <i class="fas fa-envelope form-icon"></i>
            <input type="email" class="form-control" name="Correo" placeholder="Correo electrónico" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="fas fa-lock form-icon"></i>
            <input type="password" class="form-control" name="Clave" placeholder="Contraseña" id="loginPassword" required>
            <i class="fas fa-eye position-absolute" id="toggleLoginPassword" style="top:10px; right:15px; cursor:pointer;"></i>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success w-100">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title">Registro de Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Formulario Inicio de Sesión -->
      <form action="registro_usuario.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="idRegistro">
          <div class="mb-3 position-relative">
            <i class="fas fa-user form-icon"></i>
            <input type="text" class="form-control" name="Nombre" placeholder="Nombre" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="fas fa-user form-icon"></i>
            <input type="text" class="form-control" name="Apellido" placeholder="Apellido" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="fas fa-envelope form-icon"></i>
            <input type="email" class="form-control" name="Correo" placeholder="Correo" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="fas fa-lock form-icon"></i>
            <input type="password" class="form-control" name="Clave" placeholder="Clave" id="registerPassword" required>
            <i class="fas fa-eye position-absolute" id="toggleRegisterPassword" style="top:10px; right:15px; cursor:pointer;"></i>
          </div>
          <div class="mb-3 position-relative">
            <i class="fas fa-lock form-icon"></i>
            <input type="password" class="form-control" name="ConfirmarClave" placeholder="ConfirmarClave" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success w-100">Registrarse</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Mostrar/Ocultar contraseña -->
<script>
  const toggleLoginPassword = document.getElementById('toggleLoginPassword');
  const loginPassword = document.getElementById('loginPassword');

  toggleLoginPassword.addEventListener('click', function () {
    const isPassword = loginPassword.type === 'password';
    loginPassword.type = isPassword ? 'text' : 'password';
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  });

  const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
  const registerPassword = document.getElementById('registerPassword');

  toggleRegisterPassword.addEventListener('click', function () {
    const isPassword = registerPassword.type === 'password';
    registerPassword.type = isPassword ? 'text' : 'password';
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  });
</script>

<?php if (isset($_SESSION['mensaje'])): ?>
<!-- Modal Bootstrap de mensaje -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100">Información</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p><?= htmlspecialchars($_SESSION['mensaje']) ?></p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script>
  const modal = new bootstrap.Modal(document.getElementById('mensajeModal'));
  window.addEventListener('load', () => modal.show());
</script>
<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

</body>
</html>
