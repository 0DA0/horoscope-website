<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yükselen Burç Hesaplama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }
        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
        }
        label {
            font-size: 1.2rem;
            display: block;
            margin: 10px 0 5px;
        }
        input, select {
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
        }
        button {
            padding: 10px 15px;
            font-size: 1rem;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #e74c3c;
        }
        .result {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .result h2 {
            margin: 0 0 10px;
            color: #e74c3c;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <main>
        <form method="POST" action="">
            <label for="dob">Doğum Tarihinizi Girin:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="birth-time">Doğum Saatinizi Girin:</label>
            <input type="time" id="birth-time" name="birth_time" required>

            <label for="birth-place">Doğum Yerinizi Seçin:</label>
            <select id="birth-place" name="birth_place" required>
                <option value="">Doğum yerinizi seçin</option>
                <option value="istanbul">İstanbul</option>
                <option value="ankara">Ankara</option>
                <option value="izmir">İzmir</option>
                <option value="antalya">Antalya</option>
                <option value="diger">Diğer</option>
            </select>

            <button type="submit">Yükseleni Hesapla</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form verilerini al
            $dob = $_POST['dob'];
            $birth_time = $_POST['birth_time'];
            $birth_place = $_POST['birth_place'];

            // Saat değerini al
            $hour = (int)date('H', strtotime($birth_time));

            // Basit saat mantığıyla yükseleni belirle
            $ascendant = '';
            if ($hour >= 6 && $hour < 8) {
                $ascendant = "Koç";
            } elseif ($hour >= 8 && $hour < 10) {
                $ascendant = "Boğa";
            } elseif ($hour >= 10 && $hour < 12) {
                $ascendant = "İkizler";
            } elseif ($hour >= 12 && $hour < 14) {
                $ascendant = "Yengeç";
            } elseif ($hour >= 14 && $hour < 16) {
                $ascendant = "Aslan";
            } elseif ($hour >= 16 && $hour < 18) {
                $ascendant = "Başak";
            } elseif ($hour >= 18 && $hour < 20) {
                $ascendant = "Terazi";
            } elseif ($hour >= 20 && $hour < 22) {
                $ascendant = "Akrep";
            } elseif ($hour >= 22 || $hour < 2) {
                $ascendant = "Yay";
            } elseif ($hour >= 2 && $hour < 4) {
                $ascendant = "Oğlak";
            } elseif ($hour >= 4 && $hour < 6) {
                $ascendant = "Balık";
            }

            // Sonuç göster
            echo "
            <div class='result'>
                <h2>Sonuç:</h2>
                <p>Doğum Tarihi: $dob</p>
                <p>Doğum Saati: $birth_time</p>
                <p>Doğum Yeri: $birth_place</p>
                <p>Yükselen Burcunuz: $ascendant</p>
            </div>";
        }
        ?>
    </main>
</body>
</html>
