<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Farmacias | Guasdualito</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style type="text/css">
    body{
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    a {
      text-decoration:none;
    }
  </style>
</head>
<body>

  <nav style="background-color: #2c3e50;" class="navbar navbar-dark mb-3">
    <div class="container-fluid">
      <a href="bienvenida.php">
        <i style="color: white;" class="fas fa-arrow-left"></i>
        <span style="text-align:center;" class="navbar-brand mb-0 h1">Farmacias Guasdualito</span>
      </a>
    </div>
  </nav>

  <div class="container">
    <h4 class="mb-3">Listado de Farmacias</h4>

    <div class="accordion" id="farmaciasAccordion">

      <?php

        $telefono = "";
        $farmacias = [
          ["nombre" => "Farmavida", "direccion" => "Calle. Sucre", "telefono" => "Sin número", "horario" => "<br>Lunes: 7:00am ‑ 9:00pm <br> Martes: 7:00am ‑ 9:00pm <br> Miercoles: 7:00am ‑ 9:00pm <br> Jueves: 7:00am ‑ 9:00pm <br> Viernes: 7:00am ‑ 9:00pm <br> Sábado: 7:00am ‑ 9:00pm <br> Domingo: 7:00am ‑ 9:00pm"],

          ["nombre" => "Farma Uno", "direccion" => "Calle Bolivar", "telefono" => "+582783321849", "horario" => "<br>Lunes: 7:00am ‑ 10:00pm <br> Martes: 7:00am ‑ 10:00pm <br> Miercoles: 7:00am ‑ 10:00pm <br> Jueves: 7:00am ‑ 10:00pm <br> Viernes: 7:00am ‑ 10:00pm <br> Sábado: 7:00am ‑ 10:00pm <br> Domingo: 7:00am ‑ 10:00pm"],

          ["nombre" => "Farmacia SAN JOSÉ C.A", "direccion" => "Calle Bolivar", "telefono" => "+582783325074", "horario" => "<br>Lunes: 8:00am ‑ 9:00pm <br> Martes: 8:00am ‑ 9:00pm <br> Miercoles: 8:00am ‑ 9:00pm <br> Jueves: 8:00am ‑ 9:00pm <br> Viernes: 8:00am ‑ 9:00pm <br> Sábado: 9:00am ‑ 9:00pm <br> Domingo: Cerrado"],

          ["nombre" => "Farmacia Ubami", "direccion" => "Calle Vázquez", "telefono" => "Sin número", "horario" => "<br>Lunes: 8:00am ‑ 9:00pm <br> Martes: 8:00am ‑ 9:00pm <br> Miercoles: 8:00am ‑ 9:00pm <br> Jueves: 8:00am ‑ 9:00pm <br> Viernes: 8:00am ‑ 9:00pm <br> Sábado: 9:00am ‑ 9:00pm <br> Domingo: Cerrado"],

          ["nombre" => "Biofarma", "direccion" => "Carrera 12 Páez", "telefono" => "+584247004508", "horario" => "<br>Lunes: 7:00am ‑ 8:00pm <br> Martes: 7:00am ‑ 8:00pm <br> Miercoles: 7:00am ‑ 8:00pm <br> Jueves: 7:00am ‑ 8:00pm <br> Viernes: 7:00am ‑ 8:00pm <br> Sábado: 7:00am ‑ 8:00pm <br> Domingo: 9:00am - 2:00pm"],

          ["nombre" => "Farmacia Páez", "direccion" => "Carrera Cedeño con Calle Páez", "telefono" => "0278‑3321192", "horario" => "<br>Lunes: Abierto las 24 horas <br> Martes: Abierto las 24 horas <br> Miercoles: Abierto las 24 horas <br> Jueves: Abierto las 24 horas <br> Viernes: Abierto las 24 horas <br> Sábado: Abierto las 24 horas <br> Domingo: Abierto las 24 horas"],

          ["nombre" => "Farmacia El Sarare", "direccion" => "Av. Miranda con C. Pedro Camejo", "telefono" => "0278‑3321030", "horario" => "<br>Lunes: Abierto las 24 horas <br> Martes: Abierto las 24 horas <br> Miercoles: Abierto las 24 horas <br> Jueves: Abierto las 24 horas <br> Viernes: Abierto las 24 horas <br> Sábado: Abierto las 24 horas <br> Domingo: Abierto las 24 horas"],

          ["nombre" => "BOTIQUERIA Farmacia Alto Apure", "direccion" => "Calle Sucre S/N", "telefono" => "0278‑3321646", "horario" => "<br>Lunes: 8:00am ‑ 10:00pm <br> Martes: 8:00am ‑ 10:00pm <br> Miercoles: 8:00am ‑ 10:00pm <br> Jueves: 8:00am ‑ 10:00pm <br> Viernes: 8:00am ‑ 10:00pm <br> Sábado: 7:00am ‑ 5:45pm <br> Domingo: Cerrado"],

          ["nombre" => "Pro Farma", "direccion" => "Av. Las Carpas", "telefono" => "+584162771740", "horario" => "<br>Lunes: 7:00am ‑ 8:00pm <br> Martes: 7:00am ‑ 8:00pm <br> Miercoles: 7:00am ‑ 8:00pm <br> Jueves: 7:00am ‑ 8:00pm <br> Viernes: 7:00am ‑ 8:00pm <br> Sábado: 7:00am ‑ 8:00pm <br> Domingo: 7:00am - 8:00pm"],

          ["nombre" => "Farmacia Apure", "direccion" => "Av. Miranda con C. Bolivar, esquina", "telefono" => "Sin número", "horario" => "<br>Lunes: 8:00am ‑ 7:00pm <br> Martes: 8:00am ‑ 7:00pm <br> Miercoles: 8:00am ‑ 7:00pm <br> Jueves: 8:00am ‑ 7:00pm <br> Viernes: 8:00am ‑ 7:00pm <br> Sábado: 8:00am ‑ 7:00pm <br> Domingo: Cerrado"],

          ["nombre" => "Farma Medic", "direccion" => "Av. Las Carpas", "telefono" => "Sin número", "horario" => "<br>Lunes: 8:00am ‑ 10:00pm <br> Martes: 8:00am ‑ 10:00pm <br> Miercoles: 8:00am ‑ 10:00pm <br> Jueves: 8:00am ‑ 10:00pm <br> Viernes: 8:00am ‑ 10:00pm <br> Sábado: 8:00am ‑ 10:00pm <br> Domingo: 8:00am - 10:00pm"],

          ["nombre" => "INSUMEDICA VÁSQUEZ F.P", "direccion" => "C. Sta. Rita", "telefono" => "+584245289619", "horario" => "<br>Lunes: Abierto las 24 horas <br> Martes: Abierto las 24 horas <br> Miercoles: Abierto las 24 horas <br> Jueves: Abierto las 24 horas <br> Viernes: Abierto las 24 horas <br> Sábado: Abierto las 24 horas <br> Domingo: Abierto las 24 horas"],

          ["nombre" => "FARMACIA LA PERIQUERA 0447 C.A", "direccion" => "Carretera principal Local N° 2, Sector Pueblo Viejo", "telefono" => "+584147155187", "horario" => "<br>Lunes: Abierto las 24 horas <br> Martes: Abierto las 24 horas <br> Miercoles: Abierto las 24 horas <br> Jueves: Abierto las 24 horas <br> Viernes: Abierto las 24 horas <br> Sábado: Abierto las 24 horas <br> Domingo: Abierto las 24 horas"]
        ];

        foreach ($farmacias as $index => $farmacia) {
          $id = "farmacia" . $index;
          echo "
          <div class='accordion-item'>
            <h2 class='accordion-header' id='heading{$index}'>
              <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#{$id}' aria-expanded='false' aria-controls='{$id}'>
                {$farmacia['nombre']}
              </button>
            </h2>
            <div id='{$id}' class='accordion-collapse collapse' aria-labelledby='heading{$index}' data-bs-parent='#farmaciasAccordion'>
              <div class='accordion-body'>
                <p><strong>Dirección:</strong> {$farmacia['direccion']}</p>
                <p><strong>Teléfono:</strong> {$farmacia['telefono']}</p>
                <p><strong>Horario:</strong> {$farmacia['horario']}<br></p>
        
                <a href='https://wa.me/{$farmacia['telefono']}' class='btn btn-success' target='_blank'> Contactar por WhatsApp</a>
              </div>
            </div>
          </div>";
        }
      ?>

    </div>
  </div>

  <script>

        function contactarWhatsapp(telefono) {
            // Limpia el número para asegurar compatibilidad con el enlace de WhatsApp
            let numero = telefono.replace(/\D/g, '');
            window.location.href = "https://wa.me/" + numero;
        }
    </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
