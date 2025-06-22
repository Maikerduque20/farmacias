<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú Principal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    a{
      text-decoration: none;
    }

    .logo {
      border-radius: 100px;
      width: 50px;
      height: auto;
      margin-bottom: 4px;
    }

    .opcion {
      border-radius: 20px;
      padding: 25px;
      color: #fff;
      text-align: center;
      font-weight: bold;
      transition: transform 0.2s;
      min-height: 120px;
    }

    .opcion i {
      font-size: 50px;
      margin-bottom: 10px;
    }

    .opcion:hover {
      transform: scale(1.05);
    }

    .azul { background-color: #4f46e5; }
    .verde { background-color: #10b981; }
    .rojo { background-color: #ef4444; }
    .naranja { background-color: #f97316; }
    .morado { background-color: #8b5cf6; }
    .amarillo { background-color: #eab308; color: #000; }

    .navbar {
      background-color: #2c3e50;
    }

    .navbar-brand {
      color: white;
      font-weight: bold;
      font-size: 1.2rem;
      
    }


    @media (max-width: 576px) {
      .opcion {
        margin-bottom: 15px;
      }
    }
  </style>
</head>
<body>

  <!-- Barra superior -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <img style="margin-left: 10px;" class="logo" src="../static/img/farmacia.jpg">
    <span style="margin-left: 5px;" class="navbar-brand">Farmacias Guasdualito</span>
    <a href="../index.php">
        <i style="color: white; margin-right: 10px;" class="fas fa-arrow-left"></i>
      </a>
  </nav>

  <!-- Contenido principal -->
  <div class="container mt-4">
    <h4 class="text-center mb-4">Opciones</h4>
    <div class="row g-3">

      <div class="col-6 col-md-4">
        <a href="farmacias.php">
          <div class="opcion azul">
            <i class="fas fa-clinic-medical"></i><br>
            Farmacias
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4">
        <a href="medicamentos.php">
          <div class="opcion verde">
            <i class="fas fa-pills"></i><br>
            Medicamentos 
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4">
        <a href="localizacion.php">
          <div class="opcion rojo">
            <i class="fas fa-map-marker-alt"></i><br>
            Localización
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4">
        <a href="personalizar.php">
          <div class="opcion amarillo">
            <i style="color: white;" class="fas fa-user"></i><br>
            <span style="color: white;">Personalizar</span>
          </div>
        </a>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
