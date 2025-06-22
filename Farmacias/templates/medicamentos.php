<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Medicamentos | Farmacias Guasdualito</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>

    body{
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
    }

    a {
      text-decoration:none;
    }

    .search-input {
      margin-bottom: 10px;
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
  <h4 class="mb-3">Disponibilidad de medicamentos por farmacia</h4>

  <div class="accordion" id="accordionMedicamentos">
    <?php
      $farmacias = [
        "Farmavida", "Farma Uno", "Farmacia SAN JOSÉ C.A", "Farmacia Ubami", "Biofarma",
        "Farmacia Páez", "Farmacia El Sarare", "BOTIQUERIA Farmacia Alto Apure",
        "Pro Farma", "Farmacia Apure", "Farma Medic", "INSUMEDICA VÁSQUEZ F.P",
        "FARMACIA LA PERIQUERA 0447 C.A"
      ];

      $medicamentos = [
        ["Paracetamol", "Tabletas 500mg", 1.5, "Sí", "Analgésico"],
        ["Ibuprofeno", "Cápsulas 400mg", 2.0, "Sí", "Antiinflamatorio"],
        ["Omeprazol", "Cápsulas 20mg", 2.5, "Sí", "Gastritis"],
        ["Amoxicilina", "Jarabe 250mg", 3.0, "No", "Antibiótico"],
        ["Loratadina", "Tabletas 10mg", 1.8, "Sí", "Antialérgico"],
        ["Acetaminofén", "Tabletas 500mg", 1.4, "Sí", "Fiebre"],
        ["Salbutamol", "Inhalador", 5.0, "No", "Respiratorio"],
        ["Diclofenac", "Gel tópico 1%", 2.2, "Sí", "Antiinflamatorio"],
        ["Metformina", "Tabletas 850mg", 2.1, "Sí", "Diabetes"],
        ["Vitamina C", "Tabletas 500mg", 1.2, "Sí", "Suplemento"]
      ];

      foreach ($farmacias as $i => $nombreFarmacia) {
        $id = "medFarmacia{$i}";
        echo "
        <div class='accordion-item'>
          <h2 class='accordion-header' id='heading{$i}'>
            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#{$id}' aria-expanded='false' aria-controls='{$id}'>
              $nombreFarmacia
            </button>
          </h2>
          <div id='{$id}' class='accordion-collapse collapse' aria-labelledby='heading{$i}' data-bs-parent='#accordionMedicamentos'>
            <div class='accordion-body'>
              <input type='text' class='form-control search-input' placeholder='Buscar medicamento...' onkeyup='buscar(this, \"table{$i}\")'>
              <div class='table-responsive'>
                <table class='table table-bordered table-striped' id='table{$i}'>
                  <thead class='table-light'>
                    <tr>
                      <th>Medicamento</th>
                      <th>Presentación</th>
                      <th>Precio ($)</th>
                      <th>Disponible</th>
                      <th>Categoría</th>
                      <th>Buscar</th>
                    </tr>
                  </thead>
                  <tbody>";
                    foreach ($medicamentos as $index => $m) {
                      $json = htmlspecialchars(json_encode([$m[0], $m[1], $m[2], $m[3], $m[4], $nombreFarmacia]));
                      echo "<tr>
                        <td>{$m[0]}</td>
                        <td>{$m[1]}</td>
                        <td>{$m[2]}</td>
                        <td>{$m[3]}</td>
                        <td>{$m[4]}</td>
                        <td><button class='btn btn-sm btn-info' onclick='compararMedicamento({$json})'><i class='fas fa-search'></i></button></td>
                      </tr>";
                    }
        echo "</tbody></table></div></div></div></div>";
      }
    ?>
  </div>
</div>

<!-- Modal comparación -->
<div class="modal fade" id="modalComparar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Comparación del medicamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <h6 id="nombreMedicamento"></h6>
        <div class='table-responsive'>
          <table class='table table-bordered'>
            <thead>
              <tr>
                <th>Farmacia</th>
                <th>Precio ($)</th>
                <th>Disponible</th>
              </tr>
            </thead>
            <tbody id="tablaComparacion">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const todasFarmacias = <?php echo json_encode($farmacias); ?>;
  const medicamentosBase = <?php echo json_encode($medicamentos); ?>;

  function buscar(input, tableId) {
      const filter = input.value.toLowerCase();
      const rows = document.querySelectorAll(`#${tableId} tbody tr`);
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
      });
    }

  function compararMedicamento(data) {
    const [nombre, presentacion, precio, disponible, categoria, farmaciaOrigen] = data;
    document.getElementById("nombreMedicamento").textContent = `Medicamento: ${nombre}`;
    let html = "";
    todasFarmacias.forEach(farm => {
      const encontrado = medicamentosBase.find(m => m[0] === nombre);
      if (encontrado) {
        html += `<tr>
          <td>${farm}</td>
          <td>${encontrado[2]}</td>
          <td>${encontrado[3]}</td>
        </tr>`;
      }
    });
    document.getElementById("tablaComparacion").innerHTML = html;
    new bootstrap.Modal(document.getElementById("modalComparar")).show();
  }
</script>
</body>
</html>