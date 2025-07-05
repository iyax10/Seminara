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

    <!-- Profile content replaced with Sertifikat Saya section -->
<section class="bg-white rounded-xl shadow-md p-8 w-full md:flex-1">
  <h2 class="text-2xl font-extrabold mb-6 text-gray-900">Sertifikat Saya</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (!empty($sertifikat)) : ?>
      <?php foreach ($sertifikat as $item) : ?>
        <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col">
          <img
            src="https://media.istockphoto.com/id/1399470424/id/vektor/template-sertifikat-apresiasi-mewah-dengan-warna-merah-dan-emas-batas-sertifikat-serbaguna.jpg?s=2048x2048&w=is&k=20&c=LmoHUiLV5UjGxi7rnDArUtdalwOPdbQ80jzzK2bYCdU="
            alt="Sertifikat <?= htmlspecialchars($item->judul) ?>"
            class="w-full h-48 object-cover"
          />
          <div class="p-4 flex flex-col flex-grow">
            <h3 class="font-semibold text-gray-900 mb-1 text-sm">
              <?= htmlspecialchars($item->judul) ?>
            </h3>
          <p class="text-gray-600 text-xs mb-4">Diterbitkan: <?= date('d M Y', strtotime($item->tanggal)) ?></p>

            <button
              class="mt-auto bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md py-2"
              type="button"
              onclick="alert('Download sertifikat akan tersedia setelah fitur ini aktif')"
            >
              Download
            </button>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-gray-500">Belum ada sertifikat yang tersedia.</p>
    <?php endif; ?>
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
</body>
</html>