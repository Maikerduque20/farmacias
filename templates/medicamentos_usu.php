<?php
session_start();
include("../bd/conexion.php");

// Obtener correo desde POST o sesión
$correo =  $_POST['Correo'];

// Validar existencia del correo en la base de datos
$stmtUser = $conexion->prepare("SELECT id, nombre FROM usuarios WHERE correo = ?");
$stmtUser->bind_param("s", $correo);
$stmtUser->execute();
$stmtUser->bind_result($usuario_id, $nombre);

if (!$stmtUser->fetch()) {
  header("Location: personalizacion.php");
  exit();
}

$stmtUser->close();

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Medicamentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body{
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    a {
      text-decoration:none;
    }
    .accordion-button {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <nav style="background-color: #2c3e50;" class="navbar navbar-dark mb-3">
  <div class="container-fluid">
      <a href="personalizacion.php">
        <i style="color: white;" class="fas fa-arrow-left"></i>
        <span style="text-align:center;" class="navbar-brand mb-0 h1">Farmacias Guasdualito</span>
      </a>
    </div>
</nav>
<div class="container py-4">
  <h2 class="text-center mb-4">Medicamentos de <?php echo htmlspecialchars($nombre); ?></h2>


 <?php
    // Suponiendo que ya tienes $conexion y $correo definidos y validados
    $queryTratamientos = "SELECT * FROM medicamentos WHERE correo = ?";
    $stmtTratamientos = $conexion->prepare($queryTratamientos);
    $stmtTratamientos->bind_param("s", $correo);
    $stmtTratamientos->execute();
    $resultTratamientos = $stmtTratamientos->get_result();
?>
  <?php if ($resultTratamientos->num_rows > 0): ?>
    
    <div class="accordion" id="accordionTratamientos">
      <?php foreach ($resultTratamientos as $index => $item): ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?= $index ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>">
              <?= htmlspecialchars($item['nombre']) ?>
            </button>
          </h2>
          <div id="collapse<?= $index ?>" class="accordion-collapse collapse" data-bs-parent="#accordionTratamientos">
            <div class="accordion-body">
              <p><strong>Presentación:</strong> <?= htmlspecialchars($item['presentacion']) ?></p>
              <p><strong>Categoría:</strong> <?= htmlspecialchars($item['categoria']) ?></p>
              <form action="borrar_medicamento.php" method="POST">
                  <div class="input-group">
                      <input type="hidden" name="tratamiento_id" class="form-control" value="<?= htmlspecialchars($item['id']) ?>" required>
                      <button class="btn btn-danger" type="submit" title="Eliminar tratamiento">
                          <i class="fas fa-trash"></i> Borrar
                      </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  
    <?php else: ?>
      <p class="text-center">No tienes Medicamentos registrados. <a href="#" data-bs-toggle="modal" data-bs-target="#modalTratamiento">Agregar uno</a></p>
      <?php endif; ?>
  <div class="text-center mt-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTratamiento">
      <i class="fas fa-plus"></i> Agregar Tratamiento
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTratamiento" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="registro_medicamentos.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Nuevo Tratamiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <input type="hidden" name="id">
          <label class="form-label">Correo del usuario</label>
          <input style="text-align: center;" type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($correo); ?>" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre del Medicamento</label>
          <input type="text" name="medicamento" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Presentación del Medicamento</label>
          <input type="text" name="presentacion" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Categoría del Medicamento</label>
          <input type="text" name="categoria" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function verificarHorarios() {
  const ahora = new Date();
  const horaActual = ahora.toTimeString().slice(0, 5);

  const tarjetas = document.querySelectorAll('.accordion-item');
  tarjetas.forEach(t => {
    const horarios = t.querySelector('.accordion-body p:nth-child(1)');
    if (horarios && horarios.textContent.includes(horaActual)) {
      const nombre = t.querySelector('button').textContent;
      alert(`Es hora de tu tratamiento: ${nombre}`);
    }
  });
}

verificarHorarios();
setInterval(verificarHorarios, 60000);
</script>
</body>
</html>