<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Çıkış tamponlama
ob_start();

// Veritabanı bağlantısı
$baglan = new mysqli("localhost", "root", "", "uyeler");

// Bağlantı hatası kontrolü
if ($baglan->connect_error) {
    exit("Bağlantı hatası: " . $baglan->connect_error);
}

$baglan->set_charset("utf8");

$giris_hata = '';

// Form gönderilmiş mi kontrolü
if (isset($_POST['form_gonder'])) {
    $kullaniciAd = $baglan->real_escape_string($_POST['kullaniciAd']);
    $sifre = $_POST['sifre']; // Şifreyi burada escape etmeye gerek yok, çünkü hash kontrolü yapılacak.

    // Kullanıcı adı ve şifre alanlarının dolu olup olmadığının kontrolü
    if (!empty($kullaniciAd) && !empty($sifre)) {
        // Kullanıcıyı veritabanından sorgula
        $stmt = $baglan->prepare("SELECT * FROM kullanicilar WHERE kullanici_adi = ?");
        if ($stmt === false) {
            die("Hata: " . $baglan->error);
        }

        $sifre_hash = password_hash($sifre, PASSWORD_BCRYPT); // Şifreyi hashle
        $stmt->bind_param("s", $kullaniciAd);
        $stmt->execute();
        $result = $stmt->get_result();

        // Sorgu sonucunu kontrol et
        if ($result && $result->num_rows > 0) {
 		session_start();
                $_SESSION['kullaniciAdi'] = $kullaniciAd;
                $_SESSION['oturum_baslama_zamani'] = time();

                // Oturum süresi kontrolü için çerez tanımlama (5 dakika)
                $oturum_suresi = 5 * 60; // 5 dakika
                setcookie('oturum_zamani', time() + $oturum_suresi, time() + $oturum_suresi);
            // Giriş başarılı, yönlendir
            header('Location: http://localhost/Proje/Admin/Ana_Sayfa.php?kullaniciAd=' . urlencode($kullaniciAd));
            $baglan->close();
            exit();
        } else {
            $giris_hata = 'Kullanıcı adı veya şifre yanlış.';
        }
    } else {
        $giris_hata = 'Lütfen kullanıcı adınızı ve şifrenizi giriniz.';
    }
}

$baglan->close();
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
</head>
<body>
    
    <style>
        /* Genel Stil */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form Kontainer */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

table {
    width: 100%;
    margin-bottom: 15px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    width: 40%;
    font-weight: bold;
    color: #555;
}

td input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #e74c3c;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    width: 100%;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #e74c3c;
}

/* Hata Mesajı */
p {
    color: red;
    font-size: 14px;
    margin-top: 15px;
}

h1 {
    color: #333;
}

/* Sayfa Başlığı */
header {
    text-align: center;
    margin-bottom: 20px;
}

    </style>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <table>
        <tr>
            <th>Kullanıcı Adı</th>
            <td><input type="text" name="kullaniciAd" required></td>
        </tr>
        <tr>
            <th>Şifre</th>
            <td><input type="password" name="sifre" required></td>
        </tr>
    </table>
    <input type="submit" name="form_gonder" value="Giriş Yap">
    <?php if (!empty($giris_hata)) echo '<p>' . htmlspecialchars($giris_hata) . '</p>'; ?>
</form>

</body>
</html>
