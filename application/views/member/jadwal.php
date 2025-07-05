<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Page</title>
    <link rel="stylesheet" href="src/output.css">
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


    <style>
    /* Membuat halaman penuh vertikal dan memastikan footer tetap di bawah */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    main > section {
        flex: 1;
    }

    /* Opsional: styling default section jika kosong */
    .empty-section {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px;
        color: #555;
        font-size: 1.2rem;
    }
</style>

</head>

<body>
    <!-- navbar -->
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
            <a href="<?= base_url('jadwal') ?>"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Jadwal</a>
            <a href="<?= base_url('tentang') ?>"
                class="text-center pb-1 hover:border-b-2 hover:border-blue-500 hover:text-blue-500 focus:text-blue-600 active:text-blue-700 focus:font-bold transition-all duration-300 ease-in-out">Tentang
                Kami</a>
            <a href="<?= base_url('kontak') ?>"
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

    <!--login  -->
    <section class="flex items-center justify-center h-full w-full bg-black/75 fixed insert-0 z-50 hidden"
        id="loginForm">
        <div role="dialog" aria-modal="true" aria-labelledby="login-title"
            class="lg:flex  bg-white rounded-3xl shadow-2xl w-[300px] lg:!w-4xl overflow-hidden">
            <div id="image-side" aria-hidden="true"
                class=" hidden lg:!flex flex-1 w-[70px] max-h-[600px] rounded-l-3xl items-center justify-center bg-primary relative overflow-hidden">
                <div id="vector-wrapper" aria-hidden="true" class="w-[140px] h-[140px] float-animate">
                    <svg fill="none" viewBox="0 0 64 64" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" focusable="false">
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

                <form id="login-form" autocomplete="off" novalidate class="flex flex-col">
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
                    <span>Not a member?</span>
                    <a href="#" id="register-link" aria-label="Register here"
                        class="flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 focus:text-blue-700 no-underline cursor-pointer transition-colors">
                        Register here
                        <svg class="arrow-bounce w-4 h-4 stroke-current" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

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
    <!-------------------- /MODAL FORM REGIST ------------------------->


    <!--------------------------------------------- SECTION MENAMPILKAN SEMUA SEMINAR  ------------------------------------------------->
    <main>
   <section class="h-auto lg:px-8 px-3.5 bg-[#F4F4F4B3] pt-[50px] lg:!py-[140px]">
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-primary text-[19px] lg:text-3xl text-center font-bold">EKSPLORASI KATEGORI SEMINAR YANG
            TERSEDIA</h1>
        <h4 class="text-[#1E1E1E] text-[13px] lg:text-[20px] text-center w-[90%]">Setiap kategori adalah langkah
            awal menuju versi terbaik dari dirimu. Jelajahi tema yang kamu suka !!</h4>
    </div>
    <div class="pt-5 lg:!pt-[35px] flex justify-center items-center">
        <div class="flex justify-center gap-3 flex-wrap items-center">
            <button data-kategori="all"
                class="button-kategori active-btn bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Semua</button>
            <button data-kategori="Finansial"
                class="button-kategori bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Finansial</button>
            <button data-kategori="Teknologi"
                class="button-kategori bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Teknologi</button>
            <button data-kategori="Pendidikan"
                class="button-kategori bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Pendidikan</button>
            <button data-kategori="Komunikasi"
                class="button-kategori bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Komunikasi</button>
            <button data-kategori="Bisnis"
                class="button-kategori bg-white border-[1.5px] cursor-pointer border-secondary text-secondary w-[90px] h-[25px] rounded-[5px] text-[12px] lg:text-[17px] lg:h-[33px] lg:w-[110px]">Bisnis</button>
        </div>
    </div>
    <div class="parent-card pt-7 flex flex-wrap gap-7 justify-center pb-10">
    <?php if (empty($seminars)): ?>
        <div class="w-full text-center py-10 flex flex-col items-center">
            <img src="<?= base_url('assets/img/no-seminar.svg') ?>" alt="Tidak ada seminar" class="w-40 mb-4" />
            <p class="text-lg font-semibold text-gray-600">
                Mohon Maaf, belum ada jadwal seminar di kategori ini 😔
            </p>
        </div>

    <?php else: ?>
        <?php foreach ($seminars as $seminar): ?>
            <div data-kategori="<?= $seminar->kategori ?>" class="card w-[380px] border-2 border-[#B6B6B6] rounded-[7px]">
                <img class="w-full h-[195px]" src="<?= base_url($seminar->gambar) ?>" alt="Title" />
                <div class="card-body px-2 pt-2 flex flex-col gap-2">
                    <div class="flex gap-1">
                        <h4 class="tex-[16px] font-bold w-[80%] border-b-[1.5px]"><?= $seminar->judul ?></h4>
                        <button class="w-[80px] h-[20px] bg-[#3A59D133] text-primary text-[12px] rounded-[4px]"><?= $seminar->kategori ?></button>
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="flex items-center gap-1 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#3A59D1" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                            </svg>
                            <?= $seminar->narasumber ?>
                        </p>
                        <p class="flex items-center gap-1 text-secondary">
                            <svg class="relative right-[1px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#3A59D1" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
                            </svg>
                            <?= date('d F Y', strtotime($seminar->tanggal)) ?>
                        </p>
                        <p class="flex items-center gap-2 text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path fill="#3A59D1" d="M10 0c5.523 0 10 4.477 10 10s-4.477 10-10 10S0 15.523 0 10S4.477 0 10 0m0 1.395a8.605 8.605 0 1 0 0 17.21a8.605 8.605 0 0 0 0-17.21m-.93 4.186c.385 0 .697.313.697.698v4.884h4.884a.698.698 0 0 1 0 1.395H9.07a.7.7 0 0 1-.698-.698V6.28c0-.386.312-.699.698-.699" />
                            </svg>
                            <?= date('H:i', strtotime($seminar->waktu)) ?> Wib - Selesai
                        </p>
                        <p class="flex items-center gap-1 text-secondary">
                            <svg class="relative right-[3px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="#3A59D1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64" />
                                    <path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                </g>
                            </svg>
                            <?= $seminar->lokasi ?>
                        </p>
                    </div>
                    <div class="flex pb-3 pt-1 justify-between">
                        <button class="w-[80px] h-[27px] bg-[#10B98133] text-[#10B981] text-[13px] font-medium rounded-[4px]"><?= $seminar->harga == 0 ? 'Free' : 'Rp ' . number_format($seminar->harga, 0, ',', '.') ?></button>
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
    <?php endif; ?>
</div>


</section>
</main>

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

    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.button-kategori');
            const cards = document.querySelectorAll('.card');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const kategori = this.getAttribute('data-kategori');

                    // Set tombol aktif
                    buttons.forEach(btn => btn.classList.remove('active-btn'));
                    this.classList.add('active-btn');

                    // Filter kartu
                    cards.forEach(card => {
                        const cardKategori = card.getAttribute('data-kategori');

                        if (kategori === 'all' || cardKategori === kategori) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
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
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.add('hidden'); // Sembunyikan dropdown
        }
    }
</script>

</body>

</html>