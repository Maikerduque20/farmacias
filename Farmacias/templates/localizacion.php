<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mapa Farmacias Guasdualito</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
  <style>

    a {
      text-decoration:none;
    }
    #map { height: 100vh; }
    .search-container {
      position: absolute;
      top: 55px; left: 50%; transform: translateX(-50%);
      z-index: 1000; width: 90%; max-width: 400px;
    }
  </style>
</head>
<body>
  <nav style="background-color: #2c3e50;" class="navbar navbar-dark">
    <div class="container-fluid">
      <a href="bienvenida.php">
        <i style="color: white;" class="fas fa-arrow-left"></i>
        <span style="text-align:center;" class="navbar-brand mb-0 h1">Farmacias Guasdualito</span>
      </a>
    </div>
  </nav>
  
  <div class="search-container">
    <input id="searchBox" class="form-control" placeholder="Buscar farmacia..." />
  </div>
  <div id="map"></div>
  
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const farmacias = [

      {nombre: "Farmavida", direccion: "Calle. Sucre", telefono: "Sin número", horario: "7:00am ‑ 9:00pm", lat: 7.2452257, lng: -70.7294316},

      {nombre: "Farma Uno", direccion: "Calle Bolivar", telefono: "0278‑3321849", horario: "7:00am ‑ 10:00pm", lat: 7.2438877, lng: -70.7332407},

      {nombre: "Farmacia SAN JOSÉ C.A", direccion: "Calle Bolivar", telefono: "0278‑3325074", horario: "8:00am ‑ 9:00pm", lat: 7.2417487, lng: -70.7368955},

      {nombre: "Farmacia Ubami", direccion: "Calle Vázquez", telefono: "Sin número", horario: "8:00am ‑ 9:00pm", lat: 7.2439362, lng: -70.7281576},

      {nombre: "Biofarma", direccion: "Carrera 12 Páez", telefono: "0424-7004508", horario: "7:00am ‑ 8:00pm", lat: 7.2439598, lng: -70.7293327},

      {nombre: "Farmacia Páez", direccion: "Carrera Cedeño con Calle Páez", telefono: "0278‑3321192", horario: "Abierto las 24 horas", lat: 7.2436036, lng: -70.7299604},

      {nombre: "Farmacia El Sarare", direccion: "Av. Miranda con C. Pedro Camejo", telefono: "0278‑3321030", horario: "Abierto las 24 horas", lat: 7.2452247, lng: -70.7322044},

      {nombre: "BOTIQUERIA Farmacia Alto Apure", direccion: "Calle Sucre S/N", telefono: "0278‑3321646", horario: "8:00am ‑ 11:00pm", lat: 7.2430505, lng: -70.7324957},

      {nombre: "Pro Farma", direccion: "Av. Las Carpas", telefono: "0416-2771740", horario: "7:00am ‑ 8:00pm", lat: 7.2383429, lng: -70.7252963},

      {nombre: "Farmacia Apure", direccion: "Av. Miranda con C. Bolivar, esquina", telefono: "Sin número", horario: "8:00am ‑ 7:00pm", lat: 7.2465850, lng: -70.7288365},

      {nombre: "Farma Medic", direccion: "Av. Las Carpas", telefono: "Sin número", horario: "8:00am - 10:00pm", lat: 7.2348009, lng: -70.7260594},

      {nombre: "INSUMEDICA VÁSQUEZ F.P", direccion: "C. Sta. Rita", telefono: "0424-5289619", horario: "Abierto las 24 horas", lat: 7.2315035, lng: -70.726054425},

      {nombre: "FARMACIA LA PERIQUERA 0447 C.A", direccion: "Carretera principal Local N° 2, Sector Pueblo Viejo", telefono: "0414-7155187", horario: "Abierto las 24 horas", lat: 7.2167068, lng: -70.7216717}
    ];

    const map = L.map('map').setView([7.24241, -70.73235], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const markers = farmacias.map(f => {
      const m = L.marker([f.lat, f.lng]).addTo(map);
      m.bindPopup(`
        <b>${f.nombre}</b><br>
        📍 ${f.direccion}<br>
        ⏰ ${f.horario}<br>
        📞 ${f.telefono}
      `);
      return {marker: m, nombre: f.nombre};
    });

    document.getElementById('searchBox').addEventListener('input', (e) => {
      const val = e.target.value.toLowerCase();
      markers.forEach(mObj => {
        if (mObj.nombre.toLowerCase().includes(val)) {
          mObj.marker.addTo(map);
        } else {
          map.removeLayer(mObj.marker);
        }
      });
    });
  </script>
</body>
</html>
