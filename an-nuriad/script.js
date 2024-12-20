function showDescription(item) {
    const descriptionText = document.getElementById('description-text');

    if (item === 'membaca') {
        descriptionText.textContent = 'Membaca: Keterampilan dasar yang mengajarkan anak mengenal huruf dan menyusun kata sehingga dapat memahami teks. Keterampilan ini penting sebagai pondasi bagi mereka untuk belajar lebih lanjut.';
    } else if (item === 'menulis') {
        descriptionText.textContent = 'Menulis: Melatih anak untuk mengekspresikan ide melalui tulisan, sekaligus mengembangkan kemampuan motorik halus seperti memegang pensil dan membuat huruf. Ini membantu mereka berkomunikasi secara tertulis.';
    } else if (item === 'berhitung') {
        descriptionText.textContent = 'Berhitung: Mengajarkan anak mengenal angka dan operasi matematika dasar, seperti penjumlahan dan pengurangan. Keterampilan ini penting untuk melatih logika dan pemahaman numerik sejak dini.';
    }
}
