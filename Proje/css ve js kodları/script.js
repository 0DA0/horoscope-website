// Pop-up mesajı gösterme
function showPopup(burc) {
    const popupText = document.getElementById('popupText');
    popupText.textContent = `${burc} hakkında daha fazla bilgi edinin.`;
    const popup = document.getElementById('popupMessage');
    popup.style.display = 'flex';
}

// Pop-up mesajını kapatma
function closePopup() {
    const popup = document.getElementById('popupMessage');
    popup.style.display = 'none';
}

// Admin Girişi butonuna tıklama mesajı
function showMessage() {
    alert("Admin Girişi yapılacak.");
}
