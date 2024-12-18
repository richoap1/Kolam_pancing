<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pemesanan</title>
    <link rel="stylesheet" href="css/confirmation.css">
</head>
<body>
<header>
    <h1>Rincian Pemesanan Anda</h1>
</header>

<div class="logo-container">
    <a href="home.html">
        <img src="assets/Logo.png" alt="logo">
    </a>
</div>

<div class="container">
    <p><strong>Nama:</strong> <span id="name"></span></p>
    <p><strong>Email:</strong> <span id="email"></span></p>
    <p><strong>Tanggal Penyewaan:</strong> <span id="date"></span></p>
    <p><strong>Jam Mulai:</strong> <span id="time"></span></p>
    <p><strong>Sistem Pemancingan:</strong> <span id="duration"></span></p>
    <p><strong>Opsi Harian:</strong> <span id="additional-option"></span></p>
    <p>Terima kasih telah memesan di Kolam Pancing Chocho.</p>
</div>

<footer>
    <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
</footer>

<script>
    // Get query parameters from the URL
    function getQueryParams() {
        const params = {};
        window.location.search.substring(1).split("&").forEach(function(part) {
            const pair = part.split("=");
            params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
        });
        return params;
    }

    // Populate fields with query parameters
    document.addEventListener("DOMContentLoaded", function() {
        const params = getQueryParams();
        document.getElementById("name").textContent = params.name || "N/A";
        document.getElementById("email").textContent = params.email || "N/A";
        document.getElementById("date").textContent = params.date || "N/A";
        document.getElementById("time").textContent = params.time || "N/A";
        document.getElementById("duration").textContent = params.duration || "N/A";
        document.getElementById("additional-option").textContent = params.hourly || "N/A";
    });
</script>

</body>
</html>
