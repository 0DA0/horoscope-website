<?php
function calculateZodiac($day, $month) {
    $zodiacSign = "";
    
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        $zodiacSign = "Koç";
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        $zodiacSign = "Boğa";
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        $zodiacSign = "İkizler";
    } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        $zodiacSign = "Yengeç";
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        $zodiacSign = "Aslan";
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        $zodiacSign = "Başak";
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        $zodiacSign = "Terazi";
    } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        $zodiacSign = "Akrep";
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        $zodiacSign = "Yay";
    } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        $zodiacSign = "Oğlak";
    } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        $zodiacSign = "Kova";
    } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        $zodiacSign = "Balık";
    }
    
    return $zodiacSign;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST['dob'];
    $dobDate = new DateTime($dob);
    $day = $dobDate->format('d');
    $month = $dobDate->format('m');
    
    $zodiac = calculateZodiac($day, $month);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burç Hesaplama</title>
</head>
<body>
<?php include 'header.php'; ?>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

main {
    padding: 20px;
    text-align: center;
}

form {
    margin: 20px 0;
}

input[type="date"] {
    padding: 10px;
    margin-top: 10px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    background-color: #e74c3c;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #e74c3c;
}

footer {
    background-color: #e74c3c;
    color: white;
    text-align: center;
    padding: 10px;
    position: absolute;
    width: 100%;
    bottom: 0;
}

    </style>

    <main>
        <form method="POST">
            <label for="dob">Doğum Tarihinizi Girin:</label>
            <input type="date" id="dob" name="dob" required />
            <button type="submit">Burcunuzu Hesapla</button>
        </form>

        <?php
        if (isset($zodiac)) {
            echo "<h2>Burcunuz: $zodiac</h2>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Burçlar Dünyası</p>
    </footer>
</body>
</html>
