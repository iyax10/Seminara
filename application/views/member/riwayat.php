<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Seminara - User Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap"
    rel="stylesheet"
  />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
                <img alt="User  avatar photo" class="w-8 h-8 rounded-full" height="32" src="<?= base_url($user['foto']) ?>" >
                <span class="text-primary font-medium"><?= $this->session->userdata('nama'); ?></span>
            </button>
            <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                <a href="<?= base_url('Akun') ?>" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
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

  <main class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row gap-8 flex-grow">
    <!-- Sidebar menu with height fit-content -->
    <nav class="w-full md:w-64 bg-white rounded-xl shadow p-6 self-start">
         <ul class="space-y-4 text-gray-700 font-semibold">
        <li>
          <a href="<?= base_url('Akun') ?>" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition">
            Profil Saya
          </a>
        </li>
        <li>
          <a href="<?= base_url('akun/riwayat_transaksi') ?>" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition">
            Transaksi
          </a>
        </li>
        <li>
          <a href="<?= base_url('akun/seminar_favorit') ?>" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition">
            Seminar Tersimpan
          </a>
        </li>
       <a href="<?= base_url('sertifikat/index/' . $user['id_pengguna']) ?>" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition">
  Sertifikat Saya
</a>

      </ul>
    </nav>

    <!-- Profile content replaced with Transaksi section -->
   <?php
$status_filter = $this->input->get('status'); // Ambil query string ?status=...
?>

<section class="bg-white rounded-xl shadow-md p-8 w-full md:flex-1">
  <h2 class="text-2xl font-extrabold mb-4 flex items-center gap-2 text-gray-900">
    Transaksi
    <i class="fas fa-info-circle text-gray-700 text-base"></i>
  </h2>

  <!-- Navigasi Filter -->
  <nav class="flex gap-6 mb-4 text-sm font-normal">
    <a class="<?= $status_filter == '' ? 'text-blue-700 font-semibold border-b-4 border-blue-700 pb-1' : 'text-gray-600 hover:text-gray-900' ?>" href="<?= base_url('akun/riwayat_transaksi') ?>">
      Semua Transaksi
    </a>
    <a class="<?= $status_filter == 'berhasil' ? 'text-blue-700 font-semibold border-b-4 border-blue-700 pb-1' : 'text-gray-600 hover:text-gray-900' ?>" href="<?= base_url('akun/riwayat_transaksi?status=berhasil') ?>">
      Transaksi Berhasil
    </a>
    <a class="<?= $status_filter == 'pending' ? 'text-blue-700 font-semibold border-b-4 border-blue-700 pb-1' : 'text-gray-600 hover:text-gray-900' ?>" href="<?= base_url('akun/riwayat_transaksi?status=pending') ?>">
      Menunggu Pembayaran
    </a>
    <a class="<?= $status_filter == 'dibatalkan' ? 'text-blue-700 font-semibold border-b-4 border-blue-700 pb-1' : 'text-gray-600 hover:text-gray-900' ?>" href="<?= base_url('akun/riwayat_transaksi?status=dibatalkan') ?>">
      Transaksi Dibatalkan
    </a>
  </nav>

  <!-- Daftar Transaksi -->
  <?php if (!empty($transaksi)): ?>
    <?php foreach ($transaksi as $trx): ?>
      <div class="rounded-md border border-gray-200 mb-6">
        <div class="flex items-center justify-between bg-gray-50 px-4 py-2 text-sm text-gray-900 border-b border-gray-200">
          <p>
            Waktu Pembayaran :
            <span class="font-normal"><?= date('d M Y, H:i', strtotime($trx['tanggal_transaksi'])); ?></span>
            <span class="mx-2">|</span>
            ID Transaksi :
            <?php
// Buat link berdasarkan status
$link_transaksi = '';
if ($trx['status'] == 'berhasil') {
    $link_transaksi = base_url('transaksi/pembayaran_fx/' . $trx['id_transaksi']);
} elseif ($trx['status'] == 'pending') {
    $link_transaksi = base_url('transaksi/pembayaran_two/' . $trx['id_transaksi']);
} else {
    $link_transaksi = '#'; // default untuk yang dibatalkan atau lainnya
}
?>

<a class="text-blue-700 underline font-normal" href="<?= $link_transaksi; ?>">
  <?= $trx['id_transaksi']; ?>
</a>

          </p>
          <?php
// Tentukan warna badge berdasarkan status
$status = strtolower($trx['status']);
switch ($status) {
    case 'pending':
        $bg = 'bg-yellow-100';
        $text = 'text-yellow-700';
        break;
    case 'berhasil':
        $bg = 'bg-green-100';
        $text = 'text-green-700';
        break;
    case 'dibatalkan':
        $bg = 'bg-red-100';
        $text = 'text-red-700';
        break;
    default:
        $bg = 'bg-gray-100';
        $text = 'text-gray-700';
        break;
}
?>

<span class="<?= "$bg $text" ?> font-extrabold text-xs px-3 py-1 rounded-md uppercase select-none">
  <?= ucfirst($trx['status']); ?>
</span>

        </div>

        <div class="flex items-center justify-between px-4 py-4 border-b border-gray-200">
          <p class="text-gray-700 font-semibold flex-1"><?= $trx['judul']; ?></p>
          <div class="border-l border-gray-300 pl-6">
            <p class="text-gray-500 text-sm">Harga Produk</p>
            <p class="font-extrabold text-gray-900">
              <?= ($trx['harga'] == 0) ? 'GRATIS' : 'Rp ' . number_format($trx['harga'], 0, ',', '.'); ?>
            </p>
          </div>
        </div>

        <div class="bg-gray-100 px-4 py-3 rounded-b-md flex justify-between text-gray-900 font-semibold text-sm">
          <span>Total Pembayaran</span>
          <span class="text-red-700">
            <?= ($trx['nom_bayar'] == 0) ? 'GRATIS' : 'Rp ' . number_format($trx['nom_bayar'], 0, ',', '.'); ?>
          </span>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center text-gray-500">Belum ada transaksi yang tercatat.</p>
  <?php endif; ?>
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
          <svg
            fill="#fff"
            height="28"
            viewBox="0 0 24 24"
            width="28"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M19.89 7.34c-.09.33-.49 1.16-1.17 1.95-.45 8.68-8.87 11.5-14.64 8.59-.79-1.05 2.85-.62 4.18-2.63C3.23 12.68 3.63 5.81 4.64 6.09c2.37 3.19 6.19 3.48 6.81 3.19 0-.73-.31-2.32 1.41-3.65.99-.71 3.06-1.34 4.93.69.32.21.78.3 1.47.15.41-.21.95-.07.67.66Z"
            ></path>
          </svg>
        </a>
        <a aria-label="Facebook" class="hover:opacity-80" href="#">
          <svg
            fill="#fff"
            height="28"
            viewBox="0 0 24 24"
            width="28"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"
            ></path>
          </svg>
        </a>
        <a aria-label="YouTube" class="hover:opacity-80" href="#">
          <svg
            fill="#fff"
            height="28"
            viewBox="0 0 24 24"
            width="28"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M10 8.5L16 12L10 15.5Z"></path>
            <path
              d="M12 5c9 0 9 0 9 7s0 7-9 7-9 0-9-7 0-7 9-7Z"
              fill="none"
              stroke="#fff"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            ></path>
          </svg>
        </a>
      </div>
      <p class="text-sm">© 2025 Seminara Company. All rights reserved.</p>
    </div>
  </footer>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden'); // Toggle visibility
    }

    // Menutup dropdown jika klik di luar
    window.onclick = function(event) {
        if (!event.target.matches('#profileButton')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }
</script>

</body>
</html>