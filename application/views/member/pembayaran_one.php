  <html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Seminara Payment Page
  </title>
  <link rel="stylesheet" href="src/output.css">
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: "Inter", sans-serif;
    }
  </style>


 </head>
 <body class="bg-[#f4f6fa] min-h-screen flex flex-col">
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
   <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6 flex-grow">
    <!-- info produk -->
   <section class="lg:col-span-2 bg-white rounded-xl p-6 space-y-4">
    <img alt="Poster image" class="w-20 h-20 rounded-lg mx-auto" src="<?= base_url($seminar['gambar']) ?>" style="width: 750px; height:200px; object-fit: cover;"/>
    <h2 class="text-blue-600 font-semibold text-lg leading-tight">
        <?= htmlspecialchars($seminar['judul']) ?>
    </h2>
    <p class="text-gray-700 text-sm mt-1 leading-relaxed">
        <?= htmlspecialchars($seminar['deskripsi']) ?>
        <span>😊</span>
    </p>
    <p class="text-blue-600 font-bold mt-3 text-base">
        <?= $seminar['harga'] == 0 ? 'GRATIS' : 'Rp ' . number_format($seminar['harga'], 0, ',', '.') ?>
    </p>
</section>

<!-- bagian harga -->
<?php 
    $harga = $seminar['harga'];
    $biaya_admin = $harga == 0 ? 0 : 5000;
    $total = $harga + $biaya_admin;
?>

<section class="space-y-6">
    <div class="bg-white rounded-xl p-6 space-y-4">
        <div class="flex justify-between text-gray-600 text-sm">
            <span>Harga Tiket</span>
            <span class="font-semibold text-black">
                Rp <?= $harga == 0 ? '0' : number_format($harga, 0, ',', '.') ?>
            </span>
        </div>

        <?php if ($harga > 0): ?>
        <div class="flex justify-between text-gray-600 text-sm">
            <span>Biaya Admin</span>
            <span class="font-semibold text-black">
                Rp <?= number_format($biaya_admin, 0, ',', '.') ?>
            </span>
        </div>
        <?php endif; ?>

        <div class="flex justify-between text-gray-600 text-base font-semibold">
            <span>Total Pembayaran</span>
            <span class="text-blue-600 font-bold">
                Rp <?= number_format($total, 0, ',', '.') ?>
            </span>
        </div>

<form action="<?= base_url('transaksi/buat_transaksi') ?>" method="post">
    <!-- Hidden field untuk id_seminar -->
    <input type="hidden" name="id_seminar" value="<?= $seminar['id_seminar'] ?>">

    <!-- Jumlah pembayaran bisa otomatis dari harga seminar -->
    <input type="hidden" name="nom_bayar" value="<?= $seminar['harga'] ?>">

    <!--  -->

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg py-3 flex justify-center items-center space-x-2" >Lanjutkan Pembayaran</button>
</form>

<!-- <form action="('transaksi/buat_transaksi') ?>" method="post">
    <input type="hidden" name="id_seminar" value="<?= $seminar->id_seminar ?>">
    <input type="number" name="nom_bayar" required>
    <button type="submit">Lanjutkan Pembayaran</button>
</form> -->


    </div>
</section>


</main>
 <!-- dukung pembayaran -->
<section class="w-full px-4 sm:px-6 lg:px-0 mt-6"> <!-- Menggunakan padding yang konsisten -->
  <div class="bg-white shadow-sm rounded-xl p-6 mx-auto w-full max-w-screen-xl flex flex-col sm:flex-row sm:items-center sm:space-x-10 space-y-5 sm:space-y-0" style="width: 1220px; height:80px;">
    <p class="text-gray-500 text-sm sm:flex-1">
      Metode pembayaran yang didukung
    </p>
    <div class="flex flex-wrap items-center space-x-4 space-y-2 sm:space-y-0">
      <img alt="QRIS payment logo black and white" src="../../assets/logoqris.jpg" class="h-10 w-auto object-contain" />
    </div>
  </div>
</section>

  <footer class="bg-blue-600 text-white py-6 px-10 mt-10">
   <div class="max-w-6xl mx-auto flex flex-col items-center gap-6 text-center">
    <div>
     <h2 class="text-lg font-bold">
      Seminara Company
     </h2>
     <p class="text-sm">
      Providing reliable tech since 2025
     </p>
    </div>
    <div class="flex gap-4">
     <a aria-label="Twitter" class="hover:opacity-80" href="#">
      <svg fill="#fff" height="28" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
       <path d="M19.89 7.34c-.09.33-.49 1.16-1.17 1.95-.45 8.68-8.87 11.5-14.64 8.59-.79-1.05 2.85-.62 4.18-2.63C3.23 12.68 3.63 5.81 4.64 6.09c2.37 3.19 6.19 3.48 6.81 3.19 0-.73-.31-2.32 1.41-3.65.99-.71 3.06-1.34 4.93.69.32.21.78.3 1.47.15.41-.21.95-.07.67.66Z">
       </path>
      </svg>
     </a>
     <a aria-label="Facebook" class="hover:opacity-80" href="#">
      <svg fill="#fff" height="28" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
       <path d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48">
       </path>
      </svg>
     </a>
     <a aria-label="YouTube" class="hover:opacity-80" href="#">
      <svg fill="#fff" height="28" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg">
       <path d="M10 8.5L16 12L10 15.5Z">
       </path>
       <path d="M12 5c9 0 9 0 9 7s0 7-9 7-9 0-9-7 0-7 9-7Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
       </path>
      </svg>
     </a>
    </div>
    <p class="text-sm">
     © 2025 Seminara Company. All rights reserved.
    </p>
   </div>
  </footer>
 </body>
</html>