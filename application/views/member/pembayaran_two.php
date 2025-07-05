<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Seminara QRIS Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet"
  />
  <!-- Tambahkan ini jika belum -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      font-family: "Inter", sans-serif;
      background: #f9fafb;
    }
    .card-shadow {
      box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1),
        0 4px 6px -4px rgb(0 0 0 / 0.1);
    }
    button {
      transition: background-color 0.3s ease;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col">
   <header class="bg-white shadow-sm">
   
    <div class="flex justify-between items-center h-20 px-10">
  <div class="flex items-center space-x-3">
    <a href="#" class="text-blue-600 font-serif text-3xl" style="font-family: 'Times New Roman', serif;">
      SEMINARA
    </a>

            
        </div>
 <div class="hidden lg:flex items-center justify-center gap-5">
            <a href="<?= base_url('home') ?>" id="link-beranda"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Beranda</a>
            <a href="<?= base_url('jadwal') ?>" id="link-jadwal"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Jadwal</a>
            <a href="<?= base_url('tentang') ?>" id="link-tentang"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Tentang
                Kami</a>
            <a href="<?= base_url('kontak') ?>" id="link-kontak"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Kontak
                Kami</a>
        </div>
<div class="lg:flex gap-4 hidden items-center relative">
    <?php if ($this->session->userdata('logged_in')): ?>
        <div class="relative">
            <button id="profileButton" class="flex items-center space-x-2 border border-gray-200 rounded-lg px-3 py-1.5 text-gray-700 text-sm hover:bg-gray-50" type="button" onclick="toggleDropdown()">
                <img alt="User  avatar photo" class="w-8 h-8 rounded-full" height="32" src="<?= base_url($user['foto']) ?>" width="32"/>
                <span class="text-primary font-medium"><?= $this->session->userdata('nama'); ?></span>
            </button>
            <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                <a href="<?= base_url('akun') ?>" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-user mr-2"></i> <!-- Ikon profil -->
                    Profile Saya
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt mr-2"></i> <!-- Ikon logout -->
                    Logout
                </a>
            </div>
        </div>
    <?php else: ?>
                    <button
                        type="button"
                        class="text-blue-600 border border-blue-600 rounded px-4 py-1 text-sm font-medium hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onclick="showLogin()">
                        Masuk
                    </button>
                    <button
                        type="button"
                        class="bg-blue-700 text-white rounded px-4 py-1 text-sm font-medium hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600"
                        onclick="showRegist()">
                        Daftar
                    </button>
                <?php endif; ?>
</div>

  
   </div>
   <script>
    function confirmLogout() {
    swal({
        title: "Yakin ingin logout?",
        text: "Anda akan keluar dari akun ini.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4d4d",
        confirmButtonText: "Ya, Logout!",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            // Jika pengguna mengkonfirmasi, redirect ke halaman logout
            window.location.href = "<?php echo base_url('home/logout'); ?>";
        }
    });
}
</script>
  </header>

  <main class="max-w-[1100px] mx-auto px-6 sm:px-8 lg:px-10 mt-16 mb-20 flex-grow">
    <section class="bg-white rounded-2xl card-shadow p-10 grid grid-cols-1 md:grid-cols-2 gap-12" style="max-width: 1100px;">
        <!-- QR Code & Countdown -->
        <div class="flex flex-col items-center space-y-8 border border-gray-200 rounded-xl p-8">
            <h2 class="text-2xl font-semibold text-gray-900">Pembayaran QRIS</h2>
            <img src="<?= base_url('assets/qrseminara.png') ?>" alt="QRIS" class="rounded-lg shadow-lg w-auto h-auto max-w-full" loading="lazy">
            
            <div class="text-center">
                <p class="text-gray-600 text-sm mb-2 font-medium tracking-wide">Kode Pembayaran:</p>
                <p class="text-xl font-mono font-semibold text-gray-900 select-all"><?= htmlspecialchars($transaksi['id_transaksi']) ?></p>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="flex flex-col border-gray-200 rounded-xl p-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-8">Detail Pembayaran</h2>
            <div class="space-y-6 text-gray-700 text-lg">
                <div class="flex justify-between border-b border-gray-300 pb-4">
                    <span>Harga Tiket</span>
                    <span class="font-semibold text-gray-900">Rp <?= number_format($seminar['harga'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between border-b border-gray-300 pb-4">
                    <span>Biaya Admin</span>
                    <span class="font-semibold text-gray-900">Rp 5.000</span>
                </div>
                <div class="flex justify-between pt-6 text-gray-900 text-2xl font-extrabold">
                    <span>Total Pembayaran</span>
                    <span>Rp <?= number_format($transaksi['nom_bayar'], 0, ',', '.') ?></span>
                </div>
            </div>

            <div class="text-center mt-6">
                <p class="text-gray-700 font-semibold mb-2">Waktu tersisa untuk pembayaran:</p>
                <p id="countdown-timer" class="text-4xl font-extrabold text-blue-700 min-h-[48px]">Memuat...</p>

            </div>

            <p class="mt-10 text-sm text-gray-500">Silakan scan QRIS di atas menggunakan aplikasi pembayaran Anda sebelum waktu habis.</p>

<form method="post" action="<?= base_url('transaksi/update_status/' . $transaksi['id_transaksi']) ?>">
  <button type="submit" class="mt-10 w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg py-4 shadow-md">
    <span class="text-lg">Update Status Pembayaran</span>
  </button>
</form>
<!-- Tombol Batalkan Pembayaran -->
<form method="post" action="<?= base_url('transaksi/batal_otomatis/' . $transaksi['id_transaksi']) ?>">
 <button
  type="button"
  onclick="batalkanDenganKonfirmasi('<?= base_url('transaksi/batal_otomatis/' . $transaksi['id_transaksi']) ?>')"
  class="mt-4 w-full bg-red-100 hover:bg-red-200 text-red-700 font-semibold rounded-lg py-4 shadow-sm transition"
>
  <span class="text-lg">Batalkan Pembayaran</span>
</button>


</form>



        </div>
    </section>
</main>



  <footer class="bg-blue-600 text-white py-6 px-10 mt-10">
    <div class="max-w-6xl mx-auto flex flex-col items-center gap-6 text-center">
      <div>
        <h2 class="text-lg font-bold">Seminara Company</h2>
        <p class="text-sm">Providing reliable tech since 2025</p>
      </div>
      <div class="flex gap-4">
        <a aria-label="Twitter" class="hover:opacity-80" href="#">
          <svg fill="#fff" height="28" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.89 7.34c-.09.33-.49 1.16-1.17 1.95-.45 8.68-8.87 11.5-14.64 8.59-.79-1.05 2.85-.62 4.18-2.63C3.23 12.68 3.63 5.81 4.64 6.09c2.37 3.19 6.19 3.48 6.81 3.19 0-.73-.31-2.32 1.41-3.65.99-.71 3.06-1.34 4.93.69.32.21.78.3 1.47.15.41-.21.95-.07.67.66Z"></path>
          </svg>
        </a>
        <a aria-label="Facebook" class="hover:opacity-80" href="#">
          <svg fill="#fff" height="28" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"></path>
          </svg>
        </a>
        <a aria-label="YouTube" class="hover:opacity-80" href="#">
          <svg fill="#fff" height="28" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 8.5L16 12L10 15.5Z"></path>
            <path d="M12 5c9 0 9 0 9 7s0 7-9 7-9 0-9-7 0-7 9-7Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
          </svg>
        </a>
      </div>
      <p class="text-sm">© 2025 Seminara Company. All rights reserved.</p>
    </div>
  </footer>

 <script>
  const countdownTimer = document.getElementById("countdown-timer");
  const COUNTDOWN_KEY = "waktu_pembayaran_berakhir_<?= $transaksi['id_transaksi'] ?>"; // unikan per transaksi
  const ID_TRANSAKSI = "<?= $transaksi['id_transaksi'] ?>";
  const TOTAL_WAKTU = 15 * 60 * 1000; // 15 menit

  function formatTime(seconds) {
    const m = Math.floor(seconds / 60).toString().padStart(2, "0");
    const s = (seconds % 60).toString().padStart(2, "0");
    return `${m}:${s}`;
  }

  function startCountdown() {
    let waktuBerakhir = localStorage.getItem(COUNTDOWN_KEY);

    if (!waktuBerakhir) {
      const waktuSekarang = new Date().getTime();
      waktuBerakhir = waktuSekarang + TOTAL_WAKTU;
      localStorage.setItem(COUNTDOWN_KEY, waktuBerakhir);
    } else {
      waktuBerakhir = parseInt(waktuBerakhir);
    }

    const countdown = setInterval(() => {
      const sekarang = new Date().getTime();
      const sisaWaktu = Math.floor((waktuBerakhir - sekarang) / 1000);

      if (sisaWaktu <= 0) {
        clearInterval(countdown);
        countdownTimer.textContent = "Waktu habis";
        localStorage.removeItem(COUNTDOWN_KEY);

        // Kirim ke server untuk ubah status jadi dibatalkan
        fetch("<?= base_url('transaksi/batal_otomatis/') ?>" + ID_TRANSAKSI, {
          method: 'POST'
        })
        .then(res => res.text())
        .then(() => {
          alert("Waktu pembayaran habis. Transaksi otomatis dibatalkan.");
          location.reload();
        });
      } else {
        countdownTimer.textContent = formatTime(sisaWaktu);
      }
    }, 1000);
  }

  startCountdown();
</script>
<script>
function batalkanDenganKonfirmasi(url) {
  Swal.fire({
    title: 'Batalkan Pembayaran?',
    text: "Transaksi akan dibatalkan dan tidak bisa dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#aaa',
    confirmButtonText: 'Ya, batalkan!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(url)
        .then(res => res.text())
        .then(data => {
          if (data.trim() === "ok") {
            Swal.fire({
              icon: 'success',
              title: 'Dibatalkan!',
              text: 'Transaksi berhasil dibatalkan.',
              timer: 2000,
              showConfirmButton: false
            }).then(() => {
              window.location.href = "<?= base_url('akun/riwayat_transaksi') ?>";
            });
          } else {
            Swal.fire('Gagal', 'Gagal membatalkan transaksi.', 'error');
          }
        })
        .catch(error => {
          console.error(error);
          Swal.fire('Error', 'Terjadi kesalahan saat membatalkan.', 'error');
        });
    }
  });
}
</script>


</body>
</html>