<?php
// Veritabanı bağlantısı
$baglan = new mysqli("localhost", "root", "", "uyeler");

// Bağlantı hatası kontrolü
if ($baglan->connect_error) {
    die("Bağlantı hatası: " . $baglan->connect_error);
}

$baglan->set_charset("utf8");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Günlük Burç Bilgileri</title>
    <link rel="stylesheet" href="css ve js kodları/gunluk-burc.css">
</head>
<body>
<?php include 'header.php'; ?>
    <style>
        /* Genel Stil */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Ana Bölüm */
        main {
            padding: 20px;
        }

        /* Burç Konteyneri */
        .burc-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Burç Kartı */
        .burc-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .burc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .burc-card h2 {
            color: #e74c3c;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .burc-card p {
            font-size: 16px;
            line-height: 1.5;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>

    <main>
        <div class="burc-container">
            <?php
            $burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
            $bugun = date('Y-m-d');

            foreach ($burclar as $burc) {
                echo "<div class='burc-card'>
                        <h2>$burc</h2>";

                // Veritabanından bugünkü yorumu çek
                $sorgu = $baglan->prepare("SELECT yorum FROM gunluk_burc_yorumlari WHERE burc_adi = ? AND tarih = ?");
                $sorgu->bind_param("ss", $burc, $bugun);
                $sorgu->execute();
                $sonuc = $sorgu->get_result();

                if ($sonuc->num_rows > 0) {
                    $satir = $sonuc->fetch_assoc();
                    echo "<p>" . htmlspecialchars($satir['yorum']) . "</p>";
                } else {
                    echo "<p>Bugün için yorum eklenmedi.</p>";
                }

                echo "</div>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Burçlar Dünyası</p>
    </footer>
</body>
</html>
