<?php
// Veritabanı bağlantısı
$baglan = new mysqli("localhost", "root", "", "uyeler");

// Bağlantı hatası kontrolü
if ($baglan->connect_error) {
    die("Bağlantı hatası: " . $baglan->connect_error);
}

$baglan->set_charset("utf8");

// Form gönderildiğinde veriyi kaydet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $burclar = $_POST['burclar'];
    $tarih = date('Y-m-d'); // Bugünün tarihini al

    foreach ($burclar as $burc_adi => $yorum) {
        if (!empty($yorum)) { // Yorum boş değilse kaydet veya güncelle
            $sorgu = $baglan->prepare("
                INSERT INTO gunluk_burc_yorumlari (burc_adi, yorum, tarih) 
                VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE yorum = VALUES(yorum)
            ");
            $sorgu->bind_param("sss", $burc_adi, $yorum, $tarih);
            $sorgu->execute();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Günlük Burç Yorumları</title>
    <link rel="stylesheet" href="../css ve js kodları/gunluk-burc.css">
</head>
<body>
<?php include 'header.php'; ?>
    <main>
        <form method="POST">
            <div class="burc-container">
                <!-- Burç Listesi -->
                <?php
                $burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
                foreach ($burclar as $burc) {
                    echo "<div class='burc-card'>
                        <h2>$burc</h2>
                        <textarea name='burclar[$burc]' rows='3' placeholder='$burc burcu için yorum yazın...'></textarea>";

                    // Bu burcun yorumlarını veritabanından çek
                    $sonuc = $baglan->query("SELECT yorum, tarih FROM gunluk_burc_yorumlari WHERE burc_adi = '$burc' ORDER BY tarih DESC LIMIT 3");
                    if ($sonuc->num_rows > 0) {
                        echo "<ul>";
                        while ($satir = $sonuc->fetch_assoc()) {
                            echo "<li><strong>" . htmlspecialchars($satir['tarih']) . ":</strong> " . htmlspecialchars($satir['yorum']) . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>Henüz yorum eklenmemiş.</p>";
                    }

                    echo "</div>";
                }
                ?>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button type="submit">Kaydet</button>
            </div>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Burçlar Dünyası</p>
    </footer>
</body>
</html>