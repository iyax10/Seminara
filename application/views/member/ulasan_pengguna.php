<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Seminara Payment Success</title>
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
      background: #f4f6fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
<body class="flex-grow flex flex-col">
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
                <a href="<?= base_url('profile') ?>" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
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


  <main class="card text-center"> <br>
    <section class="flex-1 bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
  <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Beri Ulasan Seminar</h2>

  <form class="space-y-6" action="<?= base_url('ulasan/simpan'); ?>" method="POST">
    <!-- Hidden input untuk menyimpan ID pengguna dan ID seminar -->
    <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">
  <input type="hidden" name="id_seminar" value="<?= $seminar->id_seminar; // ?>">


    <!-- Judul Seminar -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Seminar</label>
      <p class="text-lg font-medium text-gray-900"><?= htmlspecialchars($seminar->judul); ?></p>

    </div>

    <!-- Komentar -->
    <div>
      <label for="komentar" class="block text-gray-700 font-semibold mb-1">Komentar Anda</label>
      <textarea
        id="komentar"
        name="komentar"
        rows="5"
        required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
        placeholder="Tulis ulasan Anda tentang seminar ini..."
      ></textarea>
    </div>

    <!-- Rating -->
    <div>
      <label for="rating" class="block text-gray-700 font-semibold mb-1">Rating</label>
      <select
        id="rating"
        name="rating"
        required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
      >
        <option value="">Pilih rating</option>
        <option value="1">1 - Sangat Buruk</option>
        <option value="2">2 - Buruk</option>
        <option value="3">3 - Cukup</option>
        <option value="4">4 - Baik</option>
        <option value="5">5 - Sangat Baik</option>
      </select>
    </div>

    <div class="pt-4">
      <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-6 py-3"
      >
        Kirim Ulasan
      </button>
    </div>
  </form>
</section>


  </main>

   <footer class="bg-blue-600 text-white py-6 px-10 mt-auto">
    <div class="max-w-6xl mx-auto flex flex-col items-center gap-6 text-center">
      <div>
        <h2 class="text-lg font-bold">Seminara Company</h2>
        <p class="text-sm">Providing reliable tech since 2025</p>
      </div>
      <div class="flex gap-6">
        <a aria-label="Twitter" class="hover:opacity-80 text-white" href="#">
          <i class="fab fa-twitter fa-lg"></i>
        </a>
        <a aria-label="Facebook" class="hover:opacity-80 text-white" href="#">
          <i class="fab fa-facebook-f fa-lg"></i>
        </a>
        <a aria-label="YouTube" class="hover:opacity-80 text-white" href="#">
          <i class="fab fa-youtube fa-lg"></i>
        </a>
      </div>
      <p class="text-sm select-none">© 2025 Seminara Company. All rights reserved.</p>
    </div>
  </footer>

  <style>
    .btn-primary {
      background: #3b82f6;
      color: white;
      font-weight: 600;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      box-shadow: 0 8px 20px rgb(59 130 246 / 0.4);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      width: 100%;
      max-width: 320px;
      margin: 2rem auto 0;
      display: block;
      text-align: center;
    }
    .btn-primary:hover {
      background: #2563eb;
      box-shadow: 0 12px 30px rgb(37 99 235 / 0.6);
    }
  </style>
</body>
</html>