<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio | Farmacias Guasdualito</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .pantalla-inicial {
      text-align: center;
      padding: 30px 20px;
    }
    .logo {
      border-radius: 100px;
      width: 200px;
      height: auto;
      margin-bottom: 20px;
    }
    .titulo {
      font-size: 1.6rem;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .descripcion {
      font-size: 1rem;
      color: #555;
      margin-bottom: 30px;
    }
    .btn-inicio {
      background-color: #254D70;
      color: white;
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: bold;
      text-transform: uppercase;
    }
    .btn-inicio:hover {
      background-color: #8DBCC7;
    }
  </style>
</head>
<body>

  <div class="container pantalla-inicial">
    <!-- Logo o imagen -->
    <img src="static/img/farmacia.jpg" alt="logo medicina" class="logo">

    <!-- Título -->
    <h1 class="titulo">Farmacias en Guasdualito</h1>

    <!-- Descripción -->
    <p class="descripcion">Una herramienta tecnológica de innovación en la atención al cliente en farmacias de Guasdualito</p>

    <!-- Botón -->
    <a href="templates/bienvenida.php" class="btn btn-inicio">Empezar</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
