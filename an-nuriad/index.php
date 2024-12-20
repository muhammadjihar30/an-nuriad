<?php
// Mengambil status tombol pendaftaran dari database
include 'koneksi.php';

$query = $conn->query("SELECT nilai FROM pengaturan WHERE nama_pengaturan = 'tombol_pendaftaran'");
$status = $query->fetch_assoc()['nilai'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAUD An Nuriyadh</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="atas">
            <div class="logo">
                <img src="WhatsApp_Image_2024-10-03_at_14.21.41-removebg-preview 2.png" alt="PAUD An Nuriyadh Logo">
                <span class="logo-text">PAUD AN NURIYADH</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="javascript:void(0);" onclick="scrollToSection('kegiatan')">Kegiatan</a></li>
                    <li><a href="javascript:void(0);" onclick="scrollToSection('kelas')">Kelas</a></li>
                    <li><a href="javascript:void(0);" onclick="scrollToSection('aktiv')">Aktivitas</a></li>
                    <li><a href="javascript:void(0);" onclick="scrollToSection('pendaftaran')">Pendaftaran</a></li>
                    <li><a href="javascript:void(0);" onclick="scrollToSection('footer')">Kontak</a></li>
                    <li><a href="login.php">Masuk</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <h1>PAUD </h1> <br>
        <h1>AN NURIYADH<img src="Eid Mubarak.png" alt="" srcset=""></h1>
        <p>Bermain, Belajar, dan Berakhlak Mulia</p>
        <div class="features">
        <div class="feature-item">
            <img src="logo/Open Book.png" alt="Pembelajaran Iqra">
            <h3>Pembelajaran Iqra</h3>
            <p>Hafalan surat-surat pendek</p>
        </div>
        <div class="feature-item">
            <img src="logo/Mosque.png" alt="Pembiasaan Ibadah">
            <h3>Pembiasaan Ibadah</h3>
            <p>Mengajarkan tata cara wudhu dan shalat sederhana</p>
        </div>
        <div class="feature-item">
            <img src="logo/Critical Thinking.png" alt="Kegiatan Kreatif">
            <h3>Kegiatan Kreatif</h3>
            <p>Menggambar dan mewarnai dengan tema Islami</p>
        </div>
    </div>
    </section>
    <br>
    <br>
    <div class="judul">
    <h1>Selamat Datang di Paud <span>An-nuriyadh</span>
        <br><span>Langkah Awal</span> Menuju Masa Depan Gemilang</h1>
    </div>
    <div class="container" id="gameToScrollTo"
    style="background-image: url(img/360_F_127162573_kcES41FWV2OOdI5GxdD4di6l4O8o0AZb-transformed.jpeg); background-repeat: no-repeat; background-size: cover; background-position: center">
    <div class="card">
        <div class="img-box">
            <img src="Frame 104.png" alt="" />
        </div>
        <div class="content">
            <p>keterampilan dasar yang mengajarkan anak mengenali huruf dan menyusun kata sehingga dapat memahami teks. Keterampilan ini penting sebagai fondasi bagi mereka untuk belajar lebih lanjut. </p>
        </div>
    </div>

    <div class="card">
        <div class="img-box">
            <img src="Frame 104 (3).png" alt="" />
        </div>
        <div class="content">
            <p>Melatih anak untuk mengekspresikan ide melalui tulisan, sekaligus mengembangkan kemampuan motorik halus seperti memegang pensil dan membuat huruf. Ini membantu mereka berkomunikasi secara tertulis.</p>
        </div>
    </div>
    <div class="card">
        <div class="img-box">
            <img src="Frame 104 (4).png" alt="" />
        </div>
        <div class="content">
            <p>Mengajarkan anak mengenal angka dan operasi matematika dasar, seperti penjumlahan dan pengurangan. Keterampilan ini penting untuk melatih logika dan pemahaman numerik sejak dini</p>
        </div>
    </div>
</div>
<!-- Bagian Kegiatan -->
<section id="kegiatan">
    <h2>Kegiatan</h2>
    <div class="kegiatan-wrapper">
      <div class="kegiatan-item">
        <img src="kegiatan/1.png" alt="Study Tour">
        <div class="kegiatan-text">
          <h3>Study Tour</h3>
        </div>
      </div>
      <div class="kegiatan-item">
        <img src="kegiatan/2.png" alt="Wisuda">
        <div class="kegiatan-text">
          <h3>Wisuda</h3>
        </div>
      </div>
      <div class="kegiatan-item">
        <img src="kegiatan/3.png" alt="Manasik Haji">
        <div class="kegiatan-text">
          <h3>Manasik Haji</h3>
        </div>
      </div>
      <div class="kegiatan-itembesar">
        <img src="kegiatan/Frame 100.png" alt="Perpisahan">
        <div class="kegiatan-text">
            <h3>Outing Class</h3>
          </div>
      </div>
      <div class="kegiatan-itembesar">
        <img src="kegiatan/Frame 101.png" alt="Field Trip">
        <div class="kegiatan-text">
            <h3>Perpisahan</h3>
          </div>
      </div>
      <div class="kegiatan-itembesar">
        <img src="kegiatan/Frame 101.png" alt="Field Trip">
        <div class="kegiatan-text">
            <h3>Perpisahan</h3>
          </div>
      </div>
    </div>
  </section>
  <br>
  <br>
  <section id="kelas">
  <div class="container-kelas">
    <h1>Tingkatan Kelas yang Tersedia Pada <br><span>Paud
      An-Nuriyadh</span></h1>
      <br>
      <br>
    <div class="cards-kelas">
      <div class="card-kelas" onclick="animateCard(this)">
        <img src="logo/ABC Block (1).png" alt="Membaca Icon">
        <h3>KOBER</h3>
        <h3>(kelompok bermain)</h3>
        <p>Dimulai dari usia 2-4 tahun. Kegiatan di kelompok ini berinteraksi lebih aktif dengan sebaya mencakup kegiatan sosial, motorik, dan bermain menjadi mode utama dalam pembelajaran ini.</p>
      </div>

      <div class="card-kelas" onclick="animateCard(this)">
        <img src="logo/Google Web Search.png" alt="Menulis Icon">
        <h3>TK A</h3>
        <h3>(Taman kanak-kanak)</h3>
        <p>Di mulai dari usia 4-5 tahun. Anak-anak mulai diperkenalkan dengan kegiatan yang lebih terstruktur seperti pengenalan angka, huruf, serta pelajaran lainnya dengan cara yang menyenangkan.</p>
      </div>

      <div class="card-kelas" onclick="animateCard(this)">
        <img src="logo/Goal.png" alt="Berhitung Icon">
        <h3>TK B</h3>
        <h3>(Taman kanak-kanak)</h3>
        <p>Di mulai dari usia 5-6 tahun. Pada kelas ini merupakan persiapan anak-anak memasuki sekolah dasar, dilatih untuk lebih mandiri dalam menyelesaikan tugas-tugas, fokus lebih lama yang meliputi kemampuan membaca, menulis, dan berhitung.</p>
      </div>
    </div>
  </div>
</section>
  <br>
  <br>
  <section id="aktiv">
    <div id="aktivitas">
      <h1>AKTIVITAS DI <span>SEKOLAH</span></h1>
      <br>
      <br>
      <div class="activities-container">
          <div class="activity">
              <div class="icon custom-food"></div>
              <div class="content">
                  <h3><br><br>Baris sebelum masuk kelas</h3>
                  <p>Anak anak di bariskan sebelum masuk kelas,lalu di bimbing para dewan guru untuk bernyanyi & di beri arahan peraturan di kelas agar menambah semangat anak saat belajar.</p>
              </div>
          </div>
          <div class="activity">
              <div class="icon many-sports"></div>
              <div class="content">
                  <h3><br><br>Senam</h3>
                  <p>pada pelajaran olahraga selain olahraga sesuai tema anak anak juga senam berasama terlebih dahulu agar menambah aktivitas anak dan terbiasa dengan olahraga.</p>
              </div>
          </div>
          <div class="activity">
              <div class="icon bus-service"></div>
              <div class="content">
                  <h3><br><br>Makan saat istirahat</h3>
                  <p>Setelah pembelajaran pertama anak akan di arahkan cuci tangan lalu memakan bekal yang di bawa bersama teman-temannya,agar mengeratkan silaturahmi antara anak dan senang berbagi.</p>
              </div>
          </div>
          <div class="activity">
              <div class="icon music-lesson"></div>
              <div class="content">
                  <h3><br><br>Bermain di taman</h3>
                  <p>Setelah selesai makan anak boleh bermain di taman dan para dewan guru akan mengawasi anak. Anak juga bebas bermain dengan kelas lain agar banyak berinteraksi secara sosial.</p>
              </div>
          </div>
          <div class="activity">
              <div class="icon excursions"></div>
              <div class="content">
                  <h3>Belajar</h3>
                  <p>Anak akan belajar bersama dewan guru dengan tema yang telah di tentukan setiap harinya sesuai jadwal.</p>
              </div>
          </div>
          <div class="activity">
              <div class="icon languages"></div>
              <div class="content">
                  <h3><br>Praktik sholat Duha</h3>
                  <p>Setiap hari jumat anak anak akan belajar praktik sholat duha dan juga wudhu di mushola bersama dewan guru yang akan membimbing</p>
              </div>
          </div>
      </div>
  </div>
</section>

  <script>
    function animateCard(card) {
      // Menambahkan kelas active untuk memulai animasi
      card.classList.add('active');

      // Menghapus kelas active setelah beberapa waktu agar kartu bisa diklik lagi
      setTimeout(() => {
        card.classList.remove('active');
      }, 1500); // Durasi animasi 1.5 detik
    }
    function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            element.scrollIntoView({ behavior: 'smooth' });
        }
  </script>
  <br>
  <br>
<!-- Bagian Pendaftaran -->
<section id="pendaftaran">
    <h2>Penerimaaan <span>Siswa Baru</span></h2>
    <h1>Daftar <br>
      Sekarang</h1>
    <div class="pendaftaran-button">
    <?php if ($status): ?>
        <a href="form.php">
            <button class="daftar-button">Daftar Siswa Baru</button>
        </a>
    <?php else: ?>
        <button disabled class="daftar-button">Pendaftaran Ditutup</button>
    <?php endif; ?>
  </div>
    <div class="pendaftaran-content">
        <div class="pendaftaran-text">
           
        </div>
        
    </div>
</section>


<section id="footer">
<footer id="kontak">
  <div class="footer-section">
      <h3>Alamat:</h3>
  <p>Jl. Perumahan Green Garden Blok F2
    No 14, Nagasari, Kec. Karawang Bar.,
    Karawang, Jawa Barat 41312
    </p>
  </div>

  <div class="footer-section">
      <h3>Layanan :</h3>
 <p>Senin - Rabu   : 08.00 - 11.00 WIB</p>
 <p>Kamis - Jumat: 08.00 - 10.00 WIB</p>
  </div>

  <div class="footer-section">
      <h3>Hubungi Kami :</h3>
      <p>Jika ada yang ingin ditanyakan hubungi kami</p>
      <p>Nomer Telp: 0856-9702-8060</p>
      <div class="contact-icons">
          <a href="https://api.whatsapp.com/send?phone=085697028060" target="_blank" title="WhatsApp">
              <img src="igfbwa/WhatsApp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com/nama_akun_anda/" target="_blank" title="Instagram">
              <img src="igfbwa/Instagram Circle.png" alt="Instagram">
            </a>
            <a href="https://www.facebook.com/nama_akun_anda/" target="_blank" title="Facebook">
              <img src="igfbwa/Facebook.png" alt="Facebook">
            </a>
      </div>
  </div>
  </section>
</footer>
</body>
</html>
