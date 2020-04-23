var map = L.map('mapa').setView([-51.634147, -69.203369], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-51.634147, -69.203369]).addTo(map)
    .bindPopup('Mira Donde Apunta la flecha<br> ya voy mejorandoXD.')
    .openPopup();