// Fungsi pencarian sederhana
function searchFunction() {
  // Ambil input dari pengguna
  let input = document.getElementById("searchInput").value.toLowerCase();
  let items = document.querySelectorAll(".search-item"); // Elemen yang akan dicari

  // Loop melalui semua elemen dan sembunyikan yang tidak sesuai dengan input
  items.forEach((item) => {
    if (item.textContent.toLowerCase().includes(input)) {
      item.style.display = ""; // Tampilkan elemen
    } else {
      item.style.display = "none"; // Sembunyikan elemen
    }
  });
}
