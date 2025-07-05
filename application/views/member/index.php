<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <!-- tambahan-->
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

    <title>SEMINARA|Beranda</title>
    
</head>

<body>
    <nav
        class="px-3.5 py-2 lg:flex lg:justify-between bg-white w-full lg:items-center lg:px-7 shadow-md lg:h-20 fixed z-50">
        <div class="flex items-center justify-between">
            <h1 class="font-[Kanit] text-[20px] lg:text-[30px] font-medium text-primary">SEMINARA</h1>
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
        <button onclick="showLogin()" class="bg-white border-2 cursor-pointer border-primary px-4 rounded text-primary font-medium py-[3px] transition-all duration-300 ease-in-out hover:bg-primary hover:text-white hover:border-transparent">Masuk</button>
        <button onclick="showRegist()" class="bg-primary border-2 cursor-pointer text-white rounded px-4 py-[4px] rounded transition-all duration-300 ease-in-out hover:bg-white hover:text-primary hover:border-2 hover:border-primary">Daftar</button>
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
        <div role="dialog" aria-modal="true" aria-labelledby="login-title"
            class="lg:flex  bg-white rounded-3xl shadow-2xl w-[300px] lg:!w-4xl overflow-hidden">
            <div id="image-side" aria-hidden="true"
                class=" hidden lg:!flex flex-1 w-[70px] max-h-[600px] rounded-l-3xl items-center justify-center bg-primary relative overflow-hidden">
                <div id="vector-wrapper" aria-hidden="true" class="w-[140px] h-[140px] float-animate">
                    <svg fill="none" viewBox="0 0 64 64" width="100%" height="100%"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <circle cx="32" cy="32" r="30" stroke="#fff" stroke-width="4" opacity="0.2" />
                        <circle cx="32" cy="32" r="20" fill="#fff" opacity="0.1" />
                        <!-- <path d="M20 44c6-7 12-7 18 0" stroke="#fff" stroke-width="3" stroke-linecap="round" /> -->
                        <circle cx="24" cy="26" r="4" fill="#fff" />
                        <circle cx="40" cy="26" r="4" fill="#fff" />
                        <circle cx="24" cy="26" r="2" fill="#6c63ff" />
                        <circle cx="40" cy="26" r="2" fill="#6c63ff" />
                        <path d="M22 36q10 6 20 0" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </div>

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
    </section>
    <!-------------------- /MODAL FORM LOGIN ------------------------->

    <!-------------------- MODAL FORM REGIST ------------------------->
    <section class="flex items-center justify-center h-full w-full bg-black/75 fixed insert-0 z-50 hidden"
        id="registForm">
        <div role="dialog" aria-modal="true" aria-labelledby="login-title"
            class="lg:flex  bg-white rounded-3xl shadow-2xl w-[300px] lg:!w-4xl overflow-hidden">
            <div id="image-side" aria-hidden="true"
                class=" hidden lg:!flex flex-1 w-[70px] max-h-[600px] rounded-l-3xl items-center justify-center bg-primary relative overflow-hidden">
                <div id="vector-wrapper" aria-hidden="true" class="w-[140px] h-[140px] float-animate">
                    <svg fill="none" viewBox="0 0 64 64" width="100%" height="100%"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <circle cx="32" cy="32" r="30" stroke="#fff" stroke-width="4" opacity="0.2" />
                        <circle cx="32" cy="32" r="20" fill="#fff" opacity="0.1" />
                        <!-- <path d="M20 44c6-7 12-7 18 0" stroke="#fff" stroke-width="3" stroke-linecap="round" /> -->
                        <circle cx="24" cy="26" r="4" fill="#fff" />
                        <circle cx="40" cy="26" r="4" fill="#fff" />
                        <circle cx="24" cy="26" r="2" fill="#6c63ff" />
                        <circle cx="40" cy="26" r="2" fill="#6c63ff" />
                        <path d="M22 36q10 6 20 0" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </div>

            <div id="login-form-container"
                class="relative flex flex-1 w-[300px] lg:!w-[550px] max-h-[600px] flex-col justify-center p-8 sm:p-10">
                <button onclick="hideRegist()" aria-label="Close login form" title="Close form"
                    class="absolute top-3 right-4 text-3xl font-bold text-gray-500 hover:text-red-600 focus:outline-none select-none cursor-pointer">&times;</button>
                <h2 id="login-title"
                    class="text-center lg:!text-4xl text-2xl font-extrabold text-gray-800 mb-1 select-none">Daftar
                </h2>
                <?php if($this->session->flashdata('success_message')): ?>
                <div class="text-green-500 mb-3"><?= $this->session->flashdata('success_message'); ?></div>
                <?php endif; ?>
                <?php if($this->session->flashdata('regist_error')): ?>
                <div class="text-red-500 mb-3"><?= $this->session->flashdata('regist_error'); ?></div>
                <?php endif; ?>

                <form id="login-form" autocomplete="off" novalidate class="flex flex-col"
                    action="<?= base_url('home/registrasi'); ?>" method="post">
                    <label for="Nama" class="text-gray-600 mb-2 text-sm select-none">Nama</label>
                    <input type="text" id="Nama" name="Nama" placeholder="Masukan Nama" required
                        class="mb-2 rounded-lg border-2 border-gray-300 px-4 lg:!py-1 py-1.5 text-base focus:outline-none focus:border-blue-500" />
                    <label for="Email" class="text-gray-600 mb-1.5 text-sm select-none">Email</label>
                    <input type="Email" id="Email" name="Email" placeholder="Masukan Email" required
                        class="mb-1.5 rounded-lg border-2 border-gray-300 px-4 lg:!py-1 py-1.5 text-base focus:outline-none focus:border-blue-500" />
                    <label for="no_telp" class="text-gray-600 mb-2 text-sm select-none">No.Telp</label>
                    <input type="text" id="no_telp" name="no_telp" placeholder="Masukan no_telp" required
                        class="mb-2 rounded-lg border-2 border-gray-300 px-4 lg:!py-1 py-1.5 text-base focus:outline-none focus:border-blue-500" />
                    <label for="Password" class="text-gray-600 mb-2 text-sm select-none">Password</label>
                    <input type="Password" id="Password" name="Password" placeholder="Masukan Password" required
                        class="mb-2 rounded-lg border-2 border-gray-300 px-4 lg:!py-1 py-1.5 text-base focus:outline-none focus:border-blue-500" />
                    <label for="tanggal" class="text-gray-600 mb-2 text-sm select-none">Tanggal Lahir</label>
                    <input type="date" id="tanggal" name="tanggal" placeholder="Masukan tanggal" required
                        class="mb-2 rounded-lg border-2 border-gray-300 px-4 lg:!py-1 py-1.5 text-base focus:outline-none focus:border-blue-500" />
                    <label for="status" class="text-gray-600 mb-2 text-sm select-none">Plih Status</label>
                    <Select name="status"
                        class="mb-3 rounded-lg border-2 border-gray-300 px-4 lg:!py-1.5 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        <option value="Mahasiswa" class="text-base lg:text-lg">Mahasiswa</option>
                        <option value="Umum" class="text-base lg:text-lg">Umum</option>
                        <option value="Pekerja" class="text-base lg:text-lg">Pekerja</option>
                    </Select>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white font-semibold text-lg rounded-lg lg:py-1.5 py-2 cursor-pointer transition-all select-none">
                        Daftar
                    </button>
                </form>

                <div
                    class="register-choice mt-2 text-center text-gray-600 text-sm flex justify-center items-center gap-2 select-none">
                    <span>Sudah punya akun?</span>
                    <a href="#" onclick="showLogin(); hideRegist()" id="register-link" aria-label="Register here"
                        class="flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 focus:text-blue-700 no-underline cursor-pointer transition-colors">
                        Login disini
                        <svg class="arrow-bounce w-4 h-4 stroke-current" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
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
    <!-------------------- MODAL FORM REGIST ------------------------->

    <!------------------------------------------------ section 1 (BAGIAN CAROUSEL SEMINAR) style="width: 750px; height:500px; object-fit: cover;" -------------------------------------->
    <section class="lg:pt-20 pt-[48px]">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 lg:!h-[360px] overflow-hidden"> 
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="assets/najwa.jpg"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:flex hidden"
                        alt="...">
                    <img src="assets/1.png"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:hidden flex"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="assets/dekstop2.png"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:flex hidden"
                        alt="...">
                    <img src="assets/2.png"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:hidden flex"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="assets/dekstop3.png"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:flex hidden"
                        alt="...">
                    <img src="assets/3.png"
                        class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:hidden flex"
                        alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-2 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-1 h-1 lg:!h-3 lg:!w-3 rounded-full" aria-current="true"
                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-1 h-1 lg:!h-3 lg:!w-3 rounded-full" aria-current="false"
                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-1 h-1 lg:!h-3 lg:!w-3 rounded-full" aria-current="false"
                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-1 lg:!px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-2 h-2 lg:!h-4 lg:!w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-1 lg:!px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full  group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-2 h-2 lg:!h-4 lg:!w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>

    <!------------------------------------------------ /section 1 (BAGIAN CAROUSEL SEMINAR) -------------------------------------->

    <!---------------------------------------------- section 2 (BAGIAN INFO SEMINAR TERBARU) ---------------------------------------->
    <section class="h-auto py-11 lg:px-8 px-3.5 bg-[#F4F4F4B3]">
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-primary text-[19px] lg:text-3xl text-center font-bold">EKSPLORASI KATEGORI SEMINAR YANG
            TERSEDIA</h1>
        <h4 class="text-[#1E1E1E] text-[13px] lg:text-[20px] text-center w-[90%]">Setiap kategori adalah langkah
            awal menuju versi terbaik dari dirimu. Jelajahi tema yang kamu suka !!</h4>
    </div>
    <div class="pt-5 lg:!pt-[35px] flex justify-between items-center">
        <h2 class="text-[20px] lg:text-[22px] font-semibold text-primary">Terbaru Untuk Kamu!!</h2>
        <a href="<?= base_url('jadwal') ?>"
            class="hidden lg:flex items-center gap-1.5 text-[18px] text-primary font-semibold">Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 24">
                <defs>
                    <path id="weuiArrowOutlined0" fill="#3A59D1"
                        d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                </defs>
                <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
            </svg> </a>
    </div>
    <div class="parent-card pt-7 flex flex-wrap gap-7 justify-center">
        <?php foreach ($seminars as $seminar): ?>
            <div class="card w-[380px] border-2 border-[#B6B6B6] rounded-[7px]">
                <img class="w-full h-[195px]" src="<?= base_url($seminar->gambar) ?>" />
                <div class="card-body px-2 pt-2 flex flex-col gap-2">
                    <div class="flex gap-1">
                        <h4 class="tex-[16px] font-bold w-[80%] border-b-[1.5px]"><?= $seminar->judul; ?></h4>
                        <button class="w-[80px] h-[20px] bg-[#3A59D133] text-primary text-[12px] rounded-[4px]"><?= $seminar->kategori; ?></button>
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="flex items-center gap-1 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#3A59D1" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                            </svg>
                            <?= $seminar->narasumber; ?>
                        </p>
                        <p class="flex items-center gap-1 text-secondary">
                            <svg class="relative right-[1px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#3A59D1" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
                            </svg>
                            <?= date('d F Y', strtotime($seminar->tanggal)); ?>
                        </p>
                        <p class="flex items-center gap-2 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path fill="#3A59D1" d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10S4.477 0 10 0m0 1.395a8.605 8.605 0 1 0 0 17.21a8.605 8.605 0 0 0 0-17.21m-.93 4.186c.385 0 .697.313.697.698v4.884h4.884a.698.698 0 0 1 0 1.395H9.07a.7.7 0 0 1-.698-.698V6.28c0-.386.312-.699.698-.699" />
                            </svg>
                            <?= date('H:i', strtotime($seminar->waktu)); ?>
                        </p>
                        <p class="flex items-center gap-1 text-secondary">
                            <svg class="relative right-[3px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="#3A59D1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64" />
                                    <path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                </g>
                            </svg>
                            <?= $seminar->lokasi; ?>
                        </p>
                    </div>
                    <div class="flex pb-3 pt-1 justify-between">
                        <button class="w-[80px] h-[27px] bg-[#10B98133] text-[#10B981] text-[13px] font-medium rounded-[4px]"><?= $seminar->harga == 0 ? 'Free' : 'Rp ' . number_format($seminar->harga, 0, ',', '.') ?>
                        </button>
                       <a href="<?= base_url('seminar/seminar_info/' . $seminar->id_seminar); ?>" class="hidden lg:flex items-center gap-1.5 text-[15px] text-primary font-semibold">Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 24">
                                <defs>
                                    <path id="weuiArrowOutlined0" fill="#3A59D1" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                                </defs>
                                <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                            </svg>
                       </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

   <!---------------------------------------------- /section 2 (BAGIAN INFO SEMINAR TERBARU) ---------------------------------------->

    <!------------------------------------------------- section 3 (KENAPA SEMINARA?) ------------------------------------------------->
    <section class="h-auto py-11 lg:px-8 px-3.5">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-primary text-[19px] lg:text-3xl text-center font-bold">KENAPA HARUS SEMINARA?</h1>
            <h4 class="text-[#1E1E1E] text-[13px] lg:text-[20px] text-center w-[90%]">Dengan platform kami, menemukan
                seminar terbaik jadi lebih cepat, mudah, dan terpercaya.</h4>
        </div>
        <div class="pt-12 flex flex-wrap gap-9 lg:gap-0">
            <div class="w-[250px] lg:w-[280px] mx-auto bg-white rounded-xl shadow-md px-3 py-6 text-center relative">
                <!-- Decorative Corners -->
                <div class="absolute top-0 left-0 w-5 h-5 border-t-4 border-l-4 border-blue-600 rounded-tl-xl"></div>
                <div class="absolute bottom-0 right-0 w-5 h-5 border-b-4 border-r-4 border-blue-600 rounded-br-xl">
                </div>

                <!-- Search Icon -->
                <div class="flex justify-center mb-2">
                    <div class="w-14 h-14 rounded-full  flex items-center justify-center">
                        <svg class="w-11 h-11 lg:h-13 lg:w-13 relative text-blue-600" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103 10.5a7.5 7.5 0 0013.15 6.15z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <h2 class="text-[17px] lg:text-xl font-bold text-gray-900">Temukan Seminar Sesuai Minatmu</h2>
                <p class=" text-[13px] lg:text-[16px] mt-2 text-gray-500">
                    Akses ratusan seminar dari berbagai bidang hanya dengan beberapa klik.
                </p>
            </div>
            <div class="w-[250px] lg:w-[280px] mx-auto bg-white rounded-xl shadow-md px-3 py-6 text-center relative">
                <!-- Decorative Corners -->
                <div class="absolute top-0 left-0 w-5 h-5 border-t-4 border-l-4 border-blue-600 rounded-tl-xl"></div>
                <div class="absolute bottom-0 right-0 w-5 h-5 border-b-4 border-r-4 border-blue-600 rounded-br-xl">
                </div>

                <!-- Calender Icon -->
                <div class="flex justify-center mb-2">
                    <div class="w-14 h-14 rounded-full  flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                            <path fill="#3A59D1"
                                d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <h2 class="text-[17px] lg:text-xl font-bold text-gray-900">Update Informasi Seminar Terbaru</h2>
                <p class=" text-[13px] lg:text-[16px] mt-2 text-gray-500">
                    Kami terus memperbarui daftar seminar agar kamu tidak ketinggalan acara penting.
                </p>
            </div>
            <div class="w-[250px] lg:w-[280px] mx-auto bg-white rounded-xl shadow-md px-3 py-6 text-center relative">
                <!-- Decorative Corners -->
                <div class="absolute top-0 left-0 w-5 h-5 border-t-4 border-l-4 border-blue-600 rounded-tl-xl"></div>
                <div class="absolute bottom-0 right-0 w-5 h-5 border-b-4 border-r-4 border-blue-600 rounded-br-xl">
                </div>

                <!-- Flash Icon -->
                <div class="flex justify-center mb-2">
                    <div class="w-14 h-14 rounded-full  flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                            <path fill="#3A59D1"
                                d="m16 3l-3.5 7H16l-6 12.03V14H7V3zm-5.11 8l3.49-7H8v9h3v4.79L14.38 11z" />
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <h2 class="text-[17px] lg:text-xl font-bold text-gray-900">Daftar Dengan Mudah Dan Cepat</h2>
                <p class=" text-[13px] lg:text-[16px] mt-2 text-gray-500">
                    Cukup satu klik untuk melihat detail dan langsung mendaftar ke seminar pilihanmu.
                </p>
            </div>
            <div class="w-[250px] lg:w-[280px] mx-auto bg-white rounded-xl shadow-md px-3 py-6 text-center relative">
                <!-- Decorative Corners -->
                <div class="absolute top-0 left-0 w-5 h-5 border-t-4 border-l-4 border-blue-600 rounded-tl-xl"></div>
                <div class="absolute bottom-0 right-0 w-5 h-5 border-b-4 border-r-4 border-blue-600 rounded-br-xl">
                </div>

                <!-- Search Icon -->
                <div class="flex justify-center mb-2">
                    <div class="w-14 h-14 rounded-full  flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill="#3A59D1"
                                d="m8.6 22.5l-1.9-3.2l-3.6-.8l.35-3.7L1 12l2.45-2.8l-.35-3.7l3.6-.8l1.9-3.2L12 2.95l3.4-1.45l1.9 3.2l3.6.8l-.35 3.7L23 12l-2.45 2.8l.35 3.7l-3.6.8l-1.9 3.2l-3.4-1.45zm.85-2.55l2.55-1.1l2.6 1.1l1.4-2.4l2.75-.65l-.25-2.8l1.85-2.1l-1.85-2.15l.25-2.8l-2.75-.6l-1.45-2.4L12 5.15l-2.6-1.1L8 6.45l-2.75.6l.25 2.8L3.65 12l1.85 2.1l-.25 2.85l2.75.6zm1.5-4.4L16.6 9.9l-1.4-1.45l-4.25 4.25l-2.15-2.1L7.4 12z" />
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <h2 class="text-[17px] lg:text-xl font-bold text-gray-900">Seminar Yang Sudah Terverifikasi</h2>
                <p class=" text-[13px] lg:text-[16px] mt-2 text-gray-500">
                    Hanya seminar terpercaya dari penyelenggara terpilih yang kami tampilkan.
                </p>
            </div>

        </div>
    </section>
     <!------------------------------------------------- /section 3 (KENAPA SEMINARA?) ------------------------------------------------->

    <!------------------------------------------------- section 4 (ULASAN PESERTA) ------------------------------------------------->
   <section class="h-[500px] py-11 lg:px-8 px-3.5">
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-primary text-[19px] lg:text-3xl text-center font-bold">APA KATA MEREKA?</h1>
        <h4 class="text-[#1E1E1E] text-[13px] lg:text-[20px] text-center w-[90%]">Ribuan pengguna telah menemukan seminar terbaik mereka bersama kami. Kini giliranmu!</h4>
    </div>
    <div class="testimonial-container pt-10">
        <div id="splide" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($ulasan as $item): ?>
                        <li class="splide__slide">
                            <figure class="max-w-screen-md mx-auto text-center">
                                <svg class="w-8 h-8 mx-auto mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#3A59D1" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                </svg>
                                <blockquote>
                                    <p class="text-[18px] italic font-medium ">"<?= htmlspecialchars($item->komentar) ?>"</p>
                                </blockquote>
                                <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                                    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500">
                                        <cite class="pe-3 font-medium text-[17px] text-primary "><?= htmlspecialchars($item->nama_pengguna) ?></cite>
                                        <cite class="ps-3 text-sm text-secondary"><?= htmlspecialchars($item->judul_seminar) ?></cite>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
     <!------------------------------------------------- /section 4 (ULASAN PESERTA) ------------------------------------------------->

    <!-- footer -->
    <footer
        class="footer footer-horizontal footer-center bg-primary text-primary-content p-10 flex flex-col items-center justify-center gap-6">
        <aside class="gap-2.5 flex flex-col">
            <p class="font-bold text-center text-white">
                Seminara Company
                <br />
                Providing reliable tech since 2025
            </p>
            <p class="text-white">Copyright ©2025 - All right reserved</p>
        </aside>
        <nav>
            <div class="flex justify-center items-center gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24">
                        <path fill="none" stroke="#fff" stroke-dasharray="64" stroke-dashoffset="64"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.89 7.34c-0.09 0.33 -0.49 1.16 -1.17 1.95c-0.45 8.68 -8.87 11.5 -14.64 8.59c-0.79 -1.05 2.85 -0.62 4.18 -2.63c-5.03 -2.57 -4.63 -9.44 -3.62 -9.16c2.37 3.19 6.19 3.48 6.81 3.19c0 -0.73 -0.31 -2.32 1.41 -3.65c0.99 -0.71 3.06 -1.34 4.93 0.69c0.32 0.21 0.78 0.3 1.47 0.15c0.41 -0.21 0.95 -0.07 0.67 0.66Z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24">
                        <path fill="#fff"
                            d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48" />
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24">
                        <path fill="#fff" fill-opacity="0" d="M12 11L12 12L12 13z">
                            <animate fill="freeze" attributeName="d" begin="0.6s" dur="0.2s"
                                values="M12 11L12 12L12 13z;M10 8.5L16 12L10 15.5z" />
                            <set fill="freeze" attributeName="fill-opacity" begin="0.6s" to="1" />
                        </path>
                        <path fill="none" stroke="#fff" stroke-dasharray="64" stroke-dashoffset="64"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5c9 0 9 0 9 7c0 7 0 7 -9 7c-9 0 -9 0 -9 -7c0 -7 0 -7 9 -7Z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                        </path>
                    </svg>
                </a>
            </div>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <!-- AutoScroll Extension -->
    <script
        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.1/dist/js/splide-extension-auto-scroll.min.js"></script>

    <!-- Inisialisasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#splide', {
                type: 'loop',
                perPage: 2,    // 2 halaman di desktop
                perMove: 1,    // 1 slide per geser
                pagination: false,
                arrows: false,
                autoplay: true,  // Aktifkan auto-scroll
                interval: 2000,  // Interval perpindahan slide (2 detik)
                breakpoints: {
                    768: {
                        perPage: 1,    // 1 halaman di mobile
                    },
                },
            });

            splide.mount();
        });
    </script>

    <script src="script.js"></script>

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