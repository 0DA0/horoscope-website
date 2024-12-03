<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css ve js kodları/styleA.css">
</head>
<body>

<!-- Header ve Menü -->
<?php include 'header.php'; ?>

<div class="container">
    <!-- Koç, Aslan, Başak, Terazi Burçları -->
    <div class="card" onclick="showPopup('Koç Burcu')">
        <img src="./Burc_Foto/Koç.jpg" alt="Koç">
        <h3>Koç Burcu</h3>
        <a href="Koç_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Aslan Burcu')">
        <img src="./Burc_Foto/Aslan.jpg" alt="Aslan">
        <h3>Aslan Burcu</h3>
        <a href="Aslan_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Başak Burcu')">
        <img src="./Burc_Foto/Başak.jpg" alt="Başak">
        <h3>Başak Burcu</h3>
        <a href="Başak_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Terazi Burcu')">
        <img src="./Burc_Foto/Terazi.jpg" alt="Terazi">
        <h3>Terazi Burcu</h3>
        <a href="Terazi_Burcu.php">Detaylar</a>
    </div>

    <!-- Akrep, Boğa, Yay, Oğlak Burçları -->
    <div class="card" onclick="showPopup('Akrep Burcu')">
        <img src="./Burc_Foto/Akrep.jpg" alt="Akrep">
        <h3>Akrep Burcu</h3>
        <a href="Akrep_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Boğa Burcu')">
        <img src="./Burc_Foto/Boğa.jpg" alt="Boğa">
        <h3>Boğa Burcu</h3>
        <a href="Boğa_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Yay Burcu')">
        <img src="./Burc_Foto/Yay.jpg" alt="Yay">
        <h3>Yay Burcu</h3>
        <a href="Yay_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Oğlak Burcu')">
        <img src="./Burc_Foto/Oğlak.jpg" alt="Oğlak">
        <h3>Oğlak Burcu</h3>
        <a href="Oğlak_Burcu.php">Detaylar</a>
    </div>

    <!-- Kova, Balık, İkizler, Yengeç Burçları -->
    <div class="card" onclick="showPopup('Kova Burcu')">
        <img src="./Burc_Foto/Kova.jpg" alt="Kova">
        <h3>Kova Burcu</h3>
        <a href="Kova_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Balık Burcu')">
        <img src="./Burc_Foto/Balık.jpg" alt="Balık">
        <h3>Balık Burcu</h3>
        <a href="Balık_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('İkizler Burcu')">
        <img src="./Burc_Foto/Ikizler.jpg" alt="İkizler">
        <h3>İkizler Burcu</h3>
        <a href="İkizler_Burcu.php">Detaylar</a>
    </div>
    <div class="card" onclick="showPopup('Yengeç Burcu')">
        <img src="./Burc_Foto/Yengeç.jpg" alt="Yengeç">
        <h3>Yengeç Burcu</h3>
        <a href="Yengeç_Burcu.php">Detaylar</a>
    </div>
</div>

<!-- Pop-up Message -->
<div id="popupMessage" class="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <p id="popupText"></p>
    </div>
</div>

<script src="script.js"></script>

</body>
</html>
