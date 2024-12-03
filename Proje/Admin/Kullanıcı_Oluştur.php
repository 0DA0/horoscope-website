<?php
$baglan = new mysqli("localhost", "root", "", "uyeler");

if ($baglan->connect_error) {
    exit("Bağlantı hatası: " . $baglan->connect_error);
}

$baglan->set_charset("utf8");

if (isset($_POST['form_gonder'])) {
    $kullaniciAd = $baglan->real_escape_string($_POST['kullaniciAd']);
    $sifre = $baglan->real_escape_string($_POST['sifre']);
    $sifre_tekrar = $baglan->real_escape_string($_POST['sifre_tekrar']);

    if (!empty($kullaniciAd) && !empty($sifre) && !empty($sifre_tekrar)) {
        if (strlen($sifre) >= 3 && strlen($sifre_tekrar) >= 3) {
            if ($sifre == $sifre_tekrar) {
                $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);

                $sql = "SELECT kullanici_adi FROM kullanicilar WHERE kullanici_adi = '$kullaniciAd'";
                $result = $baglan->query($sql);

                if ($result) {
                    if ($result->num_rows == 0) {
                        $sql_insert = "INSERT INTO kullanicilar (kullanici_adi, sifre) VALUES ('$kullaniciAd', '$sifre_hash')";
                        if ($baglan->query($sql_insert)) {
                            echo "Üyeliğiniz alınmıştır.";
                            header('Location: http://localhost/Proje/KontrolDeneme.php');
                            exit();
                        } else {
                            echo "Bir hata oluştu. Lütfen tekrar deneyin.";
                        }
                    } else {
                        echo 'Zaten böyle bir kullanıcı var!';
                    }
                } else {
                    echo "Sorgu hatası: " . $baglan->error;
                }
            } else {
                echo 'Lütfen şifrenizi doğru oluşturun.';
            }
        } else {
            echo 'Lütfen şifrenizi en az 3 karakter yapın.';
        }
    } else {
        echo 'Lütfen tüm alanları doldurunuz.';
    }
}

if (isset($_POST['form_gonder2'])) {
    header("Location: http://localhost/Proje/KontrolDeneme.php");
    exit;
}

$baglan->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Oluştur</title>
</head>
<body>

<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <table>
        <tr>
            <th>Kullanıcı adı</th>
            <td><input type="text" name="kullaniciAd" required></td>
        </tr>
        <tr>
            <th>Şifreniz</th>
            <td><input type="password" name="sifre" required></td>
        </tr>
        <tr>
            <th>Şifre Tekrar</th>
            <td><input type="password" name="sifre_tekrar" required></td>
        </tr>
    </table>
    <input type="submit" name="form_gonder" value="Üye Ol">
</form>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="form_gonder2" value="Hesabım var">
</form>

</body>
</html>
