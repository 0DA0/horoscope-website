<header>
    <style>
        /* Sayfa düzeyi margin ve padding sıfırlama */
html, body {
    margin: 0;
    padding: 0;
    height: 100%; /* Yüksekliği %100 yaparak tam ekran kullanımını sağlarız */
}

/* Header Stili */
header {
    background-color: #e74c3c; /* Burçlar Dünyası başlığının arka plan rengi kırmızı */
    color: white; /* Yazı rengi beyaz */
    text-align: left; /* Sola yasla */
    padding: 20px 30px; /* Üst ve alt boşluk */
    font-size: 2rem; /* Yazı büyüklüğü */
    font-weight: bold; /* Yazı kalın */
    margin-bottom: 0; /* Menü ile arasındaki boşluk */
    display: flex;
    flex-direction: column;
    border-bottom: 3px solid #fff; /* Header altına beyaz kenarlık */
    font-family: 'Roboto', Arial, sans-serif; /* Header için özel yazı tipi */
}

/* Menü Çubuğu */
.menu {
    background-color: #e74c3c; /* Kırmızı renk */
    display: flex; /* Menü elemanlarını yatay hizalama */
    justify-content: space-between; /* Menü öğeleri arasında eşit boşluk */
    align-items: center; /* Ortalamak için */
    padding: 15px 30px; /* Üst-alt ve sağ-sol boşluklar */
    border-top: 3px solid #fff; /* Menü çubuğunun üstüne beyaz kenarlık */
    border-bottom: 3px solid #fff; /* Menü çubuğunun altına beyaz kenarlık */
    font-family: 'Roboto', Arial, sans-serif; /* Menü için özel yazı tipi */
}

/* Menü öğeleri arasına boşluk */
.menu-item {
    margin: 0 10px; /* Menü öğeleri arasına boşluk */
}

/* Menü öğelerindeki link stilleri */
.menu-item a {
    color: white; /* Link rengi beyaz */
    text-decoration: none; /* Alt çizgi kaldırma */
    font-size: 16px; /* Yazı boyutu */
    padding: 10px 20px; /* İç boşluk */
    display: inline-block; /* Menü elemanlarını blok yapma */
    border-radius: 5px; /* Kenarları yuvarlatma */
}

.menu-item a:hover {
    background-color: #c0392b; /* Hover rengi */
    color: #fff; /* Hover'da yazı rengi */
}

.burclar-dunyasi {
    margin-left: 0; /* Sola yaslama */
    font-size: 2rem; /* Başlık boyutu */
    margin-bottom: 20px; /* Başlık ile menü arasına daha uygun bir boşluk */
}
    </style>

    <div>
        <span class="burclar-dunyasi">Burçlar Dünyası</span>
    </div>

    <!-- Menü Barı -->
    <nav class="menu">
        <div class="menu-item"><a href="Ana_Sayfa.php">Ana Sayfa</a></div>
        <div class="menu-item"><a href="GünlükBurçYorumu.php">Günlük Burç Yorumları</a></div>
        <div class="menu-item"><a href="BurçHesaplama.php">Burç Hesaplama</a></div>
        <div class="menu-item"><a href="YükselenHesaplama.php">Yükselen Burç Hesaplama</a></div>
        <div class="menu-item"><a href="Admin/Login.php" class="admin-giris">Admin Girişi</a></div>
    </nav>
</header>
