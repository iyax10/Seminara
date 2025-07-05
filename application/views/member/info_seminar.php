<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Seminar</title>
    <link rel="stylesheet" href="src/output.css">
   
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" /> <!-- tambahan-->

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- Font Awesome 5.15 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-d+MOBHn0w0ZMEf8Z+e7xPZqzpChs0D7d+c2vYq+kR6J9ymxdD58z5BhZqgLM1kAdV+u4a7gBfWRSWYuJm0Dj1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />




      <style>
        /* Gaya CSS Kustom */
        .custom-section {
            padding-top: 5rem; /* pt-20 */
            padding-left: 1rem; /* px-3.5 */
            padding-right: 1rem; /* px-3.5 */
        }

        @media (min-width: 1024px) {
            .custom-section {
                padding-top: 7.5rem; /* lg:!pt-[120px] */
            }
        }

        .custom-container {
            max-width: 1200px; /* max-w-7xl */
            margin: 0 auto;
            padding: 2rem; /* px-6 py-8 */
        }

        .custom-flex {
            display: flex;
            flex-direction: column; /* flex-col */
            gap: 1.5rem; /* gap-6 */
        }

        @media (min-width: 1024px) {
            .custom-flex {
                flex-direction: row; /* lg:flex-row */
            }
        }

        .custom-card {
            background-color: white; /* bg-white */
            border-radius: 0.5rem; /* rounded-lg */
            border: 1px solid #e5e7eb; /* border-gray-200 */
            padding: 1.5rem; /* p-6 */
            display: flex;
            align-items: center; /* items-center */
            justify-content: center; /* justify-center */
        }

        .custom-image {
            width: 100%; /* w-full */
            border-radius: 0.5rem; /* rounded-lg */
            object-fit: cover; /* object-cover */
            max-height: 24rem; /* max-h-96 */
        }

        .custom-benefit-box {
            background-color: #f9fafb; /* bg-gray-50 */
            border-radius: 0.5rem; /* rounded-lg */
            padding: 1.25rem; /* p-5 */
        }

        .custom-button {
            background-color: #3b82f6; /* bg-blue-600 */
            color: white; /* text-white */
            font-weight: 600; /* font-semibold */
            border-radius: 0.5rem; /* rounded-lg */
            padding: 0.75rem; /* py-3 */
            flex: 1; /* flex-1 */
        }

        .custom-button:hover {
            background-color: #2563eb; /* hover:bg-blue-700 */
        }

        .custom-description {
            background-color: #f9fafb; /* bg-gray-50 */
            border-radius: 0.5rem; /* rounded-lg */
            padding: 1.5rem; /* p-6 */
            max-width: 100%; /* max-w-4xl */
        }

        .custom-info-box {
            background-color: #bfdbfe; /* bg-blue-100 */
            border-radius: 0.5rem; /* rounded-lg */
            padding: 1.5rem; /* p-6 */
            max-width: 100%; /* max-w-4xl */
        }

        .custom-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* grid-cols-5 */
            gap: 1rem; /* gap-4 */
        }

        .custom-title {
            margin-top: 2rem; /* mt-8 */
            font-size: 1.875rem; /* text-3xl */
            font-weight: 600; /* font-semibold */
            color: #1f2937; /* text-black-600 */
        }
    </style>
 
</head>

<body>
    <!-- navbar -->
        <nav
        class="px-3.5 py-2 lg:flex lg:justify-between bg-white w-full lg:items-center lg:px-7 shadow-md lg:h-20 fixed z-50">
       <div class="flex items-center justify-between">
           <a href="#" class="text-blue-600 font-serif text-3xl" style="font-family: 'Times New Roman', serif;"> SEMINARA </a> 

            <svg id="h-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="cursor-pointer lg:hidden">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                    d="M4 7h3m13 0h-9m9 10h-3M4 17h9m-9-5h16" />
            </svg>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileContainer" class="flex flex-col items-center gap-2 bg-white mx-1 p-4 rounded-md hidden">
            <a href="index.html" class=" w-full text-center pb-1">Beranda</a>
            <a href="jadwal.html" class=" w-full text-center pb-1">Jadwal</a>
            <a href="tentang-kami.html" class=" w-full text-center pb-1">Tentang Kami</a>
            <a href="kontak-kami.html" class=" w-full text-center pb-1">Kontak Kami</a>

            <div class="flex gap-4 pt-3">
                <button onclick="showLogin()"
                    class="bg-white border-2 border-primary px-3 rounded text-primary font-medium">Masuk</button>
                <button onclick="showRegist()" class="bg-primary text-white rounded px-3 texy-[10px]">Daftar</button>
            </div>
        </div>

        <!-- Dekstop Menu -->
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


    </nav>
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
    <!-------------------- MODAL FORM LOGIN ------------------------->
    <section class="flex items-center justify-center h-full w-full bg-black/75 fixed insert-0 z-50 hidden"
        id="loginForm">
        <div class="flex max-w-3xl w-full rounded-2xl overflow-hidden shadow-lg" style="font-feature-settings: 'liga' off">
  <!-- Left Panel -->
  <div class="bg-[#3B55D6] flex items-center justify-center p-12 flex-1 rounded-l-2xl">
    <div class="relative w-24 h-24">
      <svg class="absolute inset-0 w-24 h-24 opacity-20 animate-pulse" viewBox="0 0 100 100" fill="none">
        <circle cx="50" cy="50" r="40" stroke="white" stroke-width="6" />
        <circle cx="50" cy="50" r="30" stroke="white" stroke-width="6" />
      </svg>
      <svg class="relative w-24 h-24 text-white" viewBox="0 0 64 64" fill="none">
        <circle cx="32" cy="32" r="30" stroke="white" stroke-width="4" />
        <circle cx="22" cy="26" r="4" fill="white" />
        <circle cx="42" cy="26" r="4" fill="white" />
        <path d="M22 42c4 4 16 4 16 0" stroke="white" stroke-width="4" stroke-linecap="round" />
      </svg>
    </div>
  </div>

  <!-- Right Panel / Form -->
  <div class="bg-white flex flex-col p-8 flex-1 rounded-r-2xl relative max-w-md w-full">
   

    
        <div id="login-form-container"
                class="relative flex flex-1 max-w-[450px] max-h-[600px] flex-col justify-center p-8 sm:p-10">
                <button onclick="hideLogin()" aria-label="Close login form" title="Close form"
                    class="absolute top-3 right-4 text-3xl font-bold text-gray-500 hover:text-red-600 focus:outline-none select-none cursor-pointer">&times;</button>
                <h2 id="login-title"
                    class="text-center lg:!text-4xl text-2xl font-extrabold text-gray-800 mb-6 select-none">Login
                </h2>
                <?php if($this->session->flashdata('error_message')): ?>
                <div class="text-red-500 mb-3"><?= $this->session->flashdata('error_message'); ?></div>
                <?php endif; ?>

                <form id="login-form" autocomplete="off" novalidate class="flex flex-col"
                    action="<?= base_url('home/login'); ?>" method="post">
                    <label for="email" class="text-gray-600 mb-2 text-sm select-none">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your Email" required
                        class="mb-6 rounded-lg border-2 border-gray-300 px-4 lg:!py-3 py-1.5 text-lg focus:outline-none focus:border-blue-500" />

                    <label for="Email" class="text-gray-600 mb-2 text-sm select-none">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                        class="mb-8 rounded-lg border-2 border-gray-300 px-4 lg:!py-3 py-1.5 text-lg focus:outline-none focus:border-blue-500" />

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white font-semibold text-lg rounded-lg lg:py-4 py-2 cursor-pointer transition-all select-none">
                        Sign In
                    </button>
                </form>

                <div
                    class="register-choice mt-5 text-center text-gray-600 text-sm flex justify-center items-center gap-2 select-none">
                    <span>Belum punya akun?</span>
                    <a href="#" onclick="showRegist(); hideLogin()" id="register-link" aria-label="Register here"
                        class="flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 focus:text-blue-700 no-underline cursor-pointer transition-colors">
                        Daftar disini
                        <svg class="arrow-bounce w-4 h-4 stroke-current" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

   
  </div>
</div>

    </section>
    <!-------------------- /MODAL FORM LOGIN ------------------------->

    <!-------------------- MODAL FORM REGIST ------------------------->
    <section class="flex items-center justify-center h-full w-full bg-black/75 fixed inset-0 z-50 hidden" id="registForm">
  <div class="flex max-w-3xl w-full rounded-2xl overflow-hidden shadow-lg" style="font-feature-settings: 'liga' off">
    
    <!-- Left Panel -->
    <div class="bg-[#3B55D6] flex items-center justify-center p-12 flex-1 rounded-l-2xl">
      <div class="relative w-24 h-24">
        <svg class="absolute inset-0 w-24 h-24 opacity-20 animate-pulse" viewBox="0 0 100 100" fill="none">
          <circle cx="50" cy="50" r="40" stroke="white" stroke-width="6" />
          <circle cx="50" cy="50" r="30" stroke="white" stroke-width="6" />
        </svg>
        <svg class="relative w-24 h-24 text-white" viewBox="0 0 64 64" fill="none">
          <circle cx="32" cy="32" r="30" stroke="white" stroke-width="4" />
          <circle cx="22" cy="26" r="4" fill="white" />
          <circle cx="42" cy="26" r="4" fill="white" />
          <path d="M22 42c4 4 16 4 16 0" stroke="white" stroke-width="4" stroke-linecap="round" />
        </svg>
      </div>
    </div>

    <!-- Right Panel / Form -->
    <div class="bg-white flex flex-col p-8 flex-1 rounded-r-2xl relative max-w-md w-full">

      <div id="login-form-container" class="relative flex flex-1 w-full flex-col justify-center">
        <button onclick="hideRegist()" aria-label="Close register form" title="Close form"
          class="absolute top-3 right-4 text-3xl font-bold text-gray-500 hover:text-red-600 focus:outline-none select-none cursor-pointer">&times;</button>
        
        <h2 class="text-center lg:!text-4xl text-2xl font-extrabold text-gray-800 mb-3 select-none">Daftar</h2>

        <?php if($this->session->flashdata('success_message')): ?>
          <div class="text-green-500 mb-3"><?= $this->session->flashdata('success_message'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('regist_error')): ?>
          <div class="text-red-500 mb-3"><?= $this->session->flashdata('regist_error'); ?></div>
        <?php endif; ?>

        <form id="register-form" autocomplete="off" novalidate class="flex flex-col" action="<?= base_url('home/registrasi'); ?>" method="post">
          <label for="Nama" class="text-gray-600 mb-1 text-sm select-none">Nama</label>
          <input type="text" id="Nama" name="Nama" placeholder="Masukan Nama" required
            class="mb-2 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500" />

          <label for="Email" class="text-gray-600 mb-1 text-sm select-none">Email</label>
          <input type="email" id="Email" name="Email" placeholder="Masukan Email" required
            class="mb-2 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500" />

          <label for="no_telp" class="text-gray-600 mb-1 text-sm select-none">No. Telp</label>
          <input type="text" id="no_telp" name="no_telp" placeholder="Masukan No. Telp" required
            class="mb-2 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500" />

          <label for="Password" class="text-gray-600 mb-1 text-sm select-none">Password</label>
          <input type="password" id="Password" name="Password" placeholder="Masukan Password" required
            class="mb-2 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500" />

          <label for="tanggal" class="text-gray-600 mb-1 text-sm select-none">Tanggal Lahir</label>
          <input type="date" id="tanggal" name="tanggal" required
            class="mb-2 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500" />

          <label for="status" class="text-gray-600 mb-1 text-sm select-none">Pilih Status</label>
          <select name="status" class="mb-4 rounded-lg border-2 border-gray-300 px-4 py-1.5 text-base focus:outline-none focus:border-blue-500">
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Umum">Umum</option>
            <option value="Pekerja">Pekerja</option>
          </select>

          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white font-semibold text-lg rounded-lg py-2 cursor-pointer transition-all select-none">
            Daftar
          </button>
        </form>

        <div class="mt-3 text-center text-gray-600 text-sm flex justify-center items-center gap-2 select-none">
          <span>Sudah punya akun?</span>
          <a href="#" onclick="showLogin(); hideRegist()" class="flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 focus:text-blue-700 no-underline cursor-pointer transition-colors">
            Login disini
            <svg class="w-4 h-4 stroke-current" viewBox="0 0 24 24" fill="none">
              <path d="M8 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

    <script>
    function showLogin() {
        document.getElementById('loginForm').classList.remove('hidden');
    }

    function hideLogin() {
        document.getElementById('loginForm').classList.add('hidden');
    }

    function showRegist() {
        document.getElementById('registForm').classList.remove('hidden');
    }

    function hideRegist() {
        document.getElementById('registForm').classList.add('hidden');
    }
    </script>


    <!---------------------------------------------------------------- INFO SEMINARNYA -------------------------------------------------------->
  <section class="custom-section">
        <div class="custom-container">
            <div class="custom-flex">
                <!-- Left main content as image poster -->
                <div class="custom-card">
                    <img alt="Poster image" 
                         class="custom-image"
                         src="<?= base_url($seminar['gambar']) ?>" />
                </div>

                <!-- Right side benefit box and buy ticket button -->
                <div class="w-full lg:w-80 space-y-6">
                    <div class="custom-benefit-box">
                        <h3 class="font-semibold text-gray-900 mb-3">Benefit Seminar</h3>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach (explode(',', $seminar['benefit']) as $benefit): ?>
                                <span class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2 text-gray-900 text-sm">
                                    <?= ($benefit) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                    </div>
<div class="text-left w-full">
            <p class="text-sm text-gray-600 mb-1">Harga Tiket</p>
            <p class="text-xl font-bold text-blue-700">
                Rp <?= number_format($seminar['harga'], 0, ',', '.') ?>
            </p>
        </div>
                    <div class="bg-white rounded-lg p-5 shadow flex items-center space-x-3">

                      <?php if ($this->session->userdata('logged_in')): ?>
        <a href="<?= base_url('transaksi/pembayaran_one/' . $seminar['id_seminar']) ?>" class="custom-button flex items-center justify-center">
            Beli Tiket
        </a>
    <?php else: ?>
        <button type="button" class="custom-button" onclick="showLogin()">
            Beli Tiket
        </button>
    <?php endif; ?>
                        <!-- Tombol Bookmark -->

       <?php
$isFavorit = $this->ModelFavorit->cekFavorit($this->session->userdata('id_pengguna'), $seminar['id_seminar']);
?>

<button onclick="toggleFavorite(<?= $seminar['id_seminar'] ?>, this)">
    <i class="<?= $isFavorit ? 'hidden' : 'far' ?> fa-bookmark" id="bookmark-icon"></i>
    <i class="<?= $isFavorit ? '' : 'hidden' ?> fas fa-bookmark" id="bookmark-icon-filled"></i>
</button>


<script>
function toggleFavorite(id_seminar, el) {
    fetch("<?= base_url('favorit/toggle_favorit') ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id_seminar: id_seminar }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const emptyIcon = el.querySelector('#bookmark-icon');
            const filledIcon = el.querySelector('#bookmark-icon-filled');
            if (data.favorited) {
                emptyIcon.classList.add('hidden');
                filledIcon.classList.remove('hidden');
            } else {
                emptyIcon.classList.remove('hidden');
                filledIcon.classList.add('hidden');
            }
        } else {
            alert("Gagal: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}
</script>


                    </div>
                </div>
                
            </div>
            <div class="max-w-1xl mx-auto px-2 font-robotto">
                <h2 class="custom-title">
                    <?= htmlspecialchars($seminar['judul']) ?>
                </h2>
            </div>

            <!-- Job description section -->
            <div class="custom-description">
                <h3 class="font-semibold text-gray-900 mb-3">Deskripsi Seminar</h3>
                <p class="text-gray-900 text-sm md:text-base mb-2"><?= htmlspecialchars($seminar['deskripsi']) ?></p>
            </div><br>

            <!-- Info Seminar box below description -->
            <div class="custom-info-box">
                <h3 class="font-semibold text-blue-700 mb-4">Info Seminar</h3>
                <div class="custom-grid text-sm font-semibold text-blue-700 border-b border-blue-300 pb-2">
                    <div>Bidang</div>
                    <div>Lokasi</div>
                    <div>Tanggal</div>
                    <div>Waktu</div>
                    <div>Kuota</div>
                </div>
                <div class="custom-grid text-sm text-gray-900 pt-2">
                    <div><?= htmlspecialchars($seminar['kategori']) ?></div>
                    <div><?= htmlspecialchars($seminar['lokasi']) ?></div>
                    <div><?= date('d F Y', strtotime($seminar['tanggal'])) ?></div>
                    <div><?= htmlspecialchars($seminar['waktu']) ?></div>
                    <div><?= htmlspecialchars($seminar['kuota']) ?> peserta</div>
                </div>
            </div>
        </div> <!-- penutup div custom-container -->
    </section> <!-- penutup section utama -->
 <!---------------------------------------------------------------- /INFO SEMINARNYA -------------------------------------------------------->
<!-- Footer -->
<footer class="bg-blue-600 text-white py-10 px-4">
    <div class="max-w-6xl mx-auto flex flex-col items-center gap-6 text-center">
        <div>
            <h2 class="text-lg font-bold">Seminara Company</h2>
            <p class="text-sm">Providing reliable tech since 2025</p>
        </div>
        <div class="flex gap-4">
            <a href="#" aria-label="Twitter" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" viewBox="0 0 24 24">
                    <path d="M19.89 7.34c-.09.33-.49 1.16-1.17 1.95-.45 8.68-8.87 11.5-14.64 8.59-.79-1.05 2.85-.62 4.18-2.63C3.23 12.68 3.63 5.81 4.64 6.09c2.37 3.19 6.19 3.48 6.81 3.19 0-.73-.31-2.32 1.41-3.65.99-.71 3.06-1.34 4.93.69.32.21.78.3 1.47.15.41-.21.95-.07.67.66Z"/>
                </svg>
            </a>
            <a href="#" aria-label="Facebook" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" viewBox="0 0 24 24">
                    <path d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"/>
                </svg>
            </a>
            <a href="#" aria-label="YouTube" class="hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" viewBox="0 0 24 24">
                    <path d="M10 8.5L16 12L10 15.5Z" />
                    <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5c9 0 9 0 9 7s0 7-9 7-9 0-9-7 0-7 9-7Z" />
                </svg>
            </a>
        </div>
        <p class="text-sm">&copy; 2025 Seminara Company. All rights reserved.</p>
    </div>
</footer>

    <!-- js -->
    <script src="script.js">
    </script>
    <script>
        const counters = document.querySelectorAll('.counter');
        const speed = 1000; // Semakin kecil, makin cepat

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target + '+'; // Tambahkan "+" di akhir
                }
            };

            // Aktifkan saat elemen masuk ke viewport
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCount();
                        observer.unobserve(counter);
                    }
                });
            }, { threshold: 1 });

            observer.observe(counter);
        });

    </script>

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