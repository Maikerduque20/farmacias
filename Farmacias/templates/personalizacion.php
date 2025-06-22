<?php

session_start();
include("../bd/conexion.php");

$nombre = ''; // Evita el aviso si la consulta falla


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["Correo"]);
    $clave = trim($_POST["Clave"]);

    $stmt = $conexion->prepare("SELECT id, correo, clave FROM usuarios WHERE correo = ? AND clave = ?");
    $stmt->bind_param("ss", $correo, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();


    if ($resultado->num_rows == 1) {
        session_start();
        $usuario = $resultado->fetch_assoc();
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nombre"] = $usuario["nombre"];
        header("Location: personalizacion.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "Correo o contraseña incorrectos.";
            header("Location: personalizar.php");
            exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personalización - Farmacias Guasdualito</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body{
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    a {
      text-decoration:none;
    }

    .btn-custom {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      margin-bottom: 20px;
      width: 100%;
      font-size: 1.25rem;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .btn-custom i {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <nav style="background-color: #2c3e50;" class="navbar navbar-dark mb-3">
  <div class="container-fluid">
      <a href="personalizar.php">
        <i style="color: white;" class="fas fa-arrow-left"></i>
        <span style="text-align:center;" class="navbar-brand mb-0 h1">Farmacias Guasdualito</span>
      </a>
    </div>
</nav>

  <div class="container mt-5">
    <h2 class="text-center mb-4">¡Bienvenido!</h2>
    <p class="text-center">Selecciona una opción para comenzar:</p>
<!------------------------------------------------------------------------------------------------------->
    <button class="btn btn-primary w-100 mb-3 btn-custom" data-bs-toggle="modal" data-bs-target="#Modal1">
        <i class="fas fa-notes-medical"></i>Tratamientos
    </button>

    <!-- Modal Inicio de Sesión -->
    <div class="modal fade" id="Modal1" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
          <div class="modal-header">
            <h5 class="modal-title">Confirma tu correo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Formulario Inicio de Sesión -->
          <form action="tratamiento.php" method="POST">
            <div class="modal-body">
              <div class="mb-3 position-relative">
                <input type="hidden" name="idLogin">
                <i class="fas fa-envelope form-icon"></i>
                <input type="email" class="form-control" name="Correo" placeholder="Correo electrónico" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success w-100">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!------------------------------------------------------------------------------------------------------->
    <button class="btn btn-success w-100 mb-3 btn-custom" data-bs-toggle="modal" data-bs-target="#Modal2">
      <i class="fas fa-pills"></i> Medicamentos Necesarios
    </button>

    <!-- Modal Inicio de Sesión -->
    <div class="modal fade" id="Modal2" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
          <div class="modal-header">
            <h5 class="modal-title">Confirma tu correo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Formulario Inicio de Sesión -->
          <form action="medicamentos_usu.php" method="POST">
            <div class="modal-body">
              <div class="mb-3 position-relative">
                <input type="hidden" name="idLogin">
                <i class="fas fa-envelope form-icon"></i>
                <input type="email" class="form-control" name="Correo" placeholder="Correo electrónico" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success w-100">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!------------------------------------------------------------------------------------------------------->
    <button class="btn btn-warning w-100 mb-3 btn-custom" data-bs-toggle="modal" data-bs-target="#Modal3">
      <i class="fas fa-clinic-medical"></i> Farmacias Recurridas
    </button>
  </div>

  <!-- Modal Inicio de Sesión -->
    <div class="modal fade" id="Modal3" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
          <div class="modal-header">
            <h5 class="modal-title">Confirma tu correo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Formulario Inicio de Sesión -->
          <form action="farmacias_usu.php" method="POST">
            <div class="modal-body">
              <div class="mb-3 position-relative">
                <input type="hidden" name="idLogin">
                <i class="fas fa-envelope form-icon"></i>
                <input type="email" class="form-control" name="Correo" placeholder="Correo electrónico" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success w-100">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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