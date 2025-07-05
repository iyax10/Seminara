<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
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
            <a href="index.html" class="w-full text-center pb-1">Beranda</a>
            <a href="jadwal.html" class="w-full text-center pb-1">Jadwal</a>
            <a href="tentang-kami.html" class="w-full text-center pb-1">Tentang Kami</a>
            <a href="kontak-kami.html" class="w-full text-center pb-1">Kontak Kami</a>

            <div class="flex gap-4 pt-3">
                <button onclick="showLogin()"
                    class="bg-white border-2 border-primary px-5 rounded text-primary font-medium">Masuk</button>
                <button onclick="showRegist()" class="bg-primary text-white rounded px-5">Daftar</button>
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


    <!-- login & daftar -->
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

    <!-- regist -->
    <section class="flex items-center justify-center h-full w-full bg-black/75 fixed insert-0 z-50 hidden"
        id="registForm">
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
                class="relative flex flex-1 w-[300px] lg:!w-[550px] max-h-[600px] flex-col justify-center p-8 sm:p-10">
                <button onclick="hideRegist()" aria-label="Close login form" title="Close form"
                    class="absolute top-3 right-4 text-3xl font-bold text-gray-500 hover:text-red-600 focus:outline-none select-none cursor-pointer">&times;</button>
                <h2 id="login-title"
                    class="text-center lg:!text-4xl text-2xl font-extrabold text-gray-800 mb-1 select-none">Daftar
                </h2>

                <form id="login-form" autocomplete="off" novalidate class="flex flex-col">
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
                    <Select
                        class="mb-3 rounded-lg border-2 border-gray-300 px-4 lg:!py-1.5 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        <option value="" class="text-base lg:text-lg">Mahasiswa</option>
                        <option value="" class="text-base lg:text-lg">Umum</option>
                        <option value="" class="text-base lg:text-lg">Pekerja</option>
                    </Select>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white font-semibold text-lg rounded-lg lg:py-1.5 py-2 cursor-pointer transition-all select-none">
                        Daftar
                    </button>
                </form>

                <div
                    class="register-choice mt-2 text-center text-gray-600 text-sm flex justify-center items-center gap-2 select-none">
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


    <!-- Section 1 -->
    <section class="pt-20 px-3.5 lg:!pt-[120px]">
        <div class="block lg:flex lg:gap-4">
            <div class="flex flex-col justify-center items-center lg:!justify-start lg:items-start gap-2 lg:!50% ">
                <p class="text-secondary text-center text-[16px] lg:!text-xl font-medium lg:!text-left">Tentang Kami</p>
                <div class="w-[70px] border-1"></div>
                <h1
                    class="font-semibold text-center font-montserrat antialiased text-primary text-[18px] lg:!text-2xl lg:!text-left">
                    KAMI HADIR UNTUK
                    MEMBERIKAN ILMU LEBIH DEKAT KEPADAMU</h1>
                <img src="https://icm.sch.id/images/article/20240624_100458_phpaxvz4t_resized.png" alt=""
                    class="rounded-[8px] lg:!w-[650px]">
            </div>
            <div class="flex-col flex lg:!w-[50%] lg:gap-5.5 pt-3 gap-4 lg:!pt-[50px]">
                <div class="flex overflow-hidden gap-2">
                    <img src="https://dibimbing-cdn.sgp1.cdn.digitaloceanspaces.com/1695027411191-Manfaat-Seminar-Kampus.webp"
                        alt="" class="w-[49%] rounded-[5px]">
                    <img src="https://www.thebrewery.co.uk/wp-content/uploads/2024/07/1717788736216.jpeg" alt=""
                        class="w-[48%] rounded-[5px]">
                </div>
                <p class="font-normal text-secondary text-justify lg:text-[19px]">Kami adalah platform yang menghubungkan Anda dengan
                    seminar-seminar berkualitas di berbagai bidang. Misi kami adalah mempermudah akses informasi seminar
                    dan
                    tiket, sehingga Anda dapat terus belajar dan berkembang. Dengan kemudahan pencarian seminar, detail
                    acara yang jelas, dan proses pembelian tiket yang cepat, kami hadir untuk mendukung perjalanan
                    profesional Anda.</p>
                <div class="flex flex-wrap gap-6 lg:!gap-8 justify-center pt-2.5 lg:!pt-0">
                    <div class="flex flex-col items-center">
                        <h3 class="counter text-primary font-bold text-3xl lg:!text-4xl" data-target="100">0</h3>
                        <p>Seminar Terdaftar</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h3 class="counter text-primary font-bold text-3xl lg:!text-4xl" data-target="1000">0</h3>
                        <p>Tiket Terjual</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <h3 class="counter text-primary font-bold text-3xl lg:!text-4xl" data-target="400">0</h3>
                        <p>Pengguna Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2 -->
    <section class="px-3.5 py-20 lg:py-[120px]">
        <div>
            <h1 class="text-primary text-[19px] lg:text-3xl text-center font-bold">MITRA KAMI</h1>
            <p class="text-[#1E1E1E] text-[13px] lg:text-[20px] text-center w-[100%] lg:!w-[100%]">Kami bangga bekerja sama dengan berbagai
                Startup, Institusi, dan penyelenggara seminar terpercaya</p>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-9 pt-3.5">
            <img src="assets/MySkill-logo.png" alt="" class="w-[100px] lg:w-[200px]">
            <img src="assets/Universitas_Indonesia_logo.svg.png" alt="" class="w-[80px] lg:w-[130px]">
            <img src="assets/Dicoding.png" alt="" class="w-[100px] lg:w-[200px]">
            <img src="assets/Ruangguru_logo.svg.png" alt="" class="w-[100px] lg:w-[150px]">
            <img src="assets/alianz.png" alt="" class="w-[120px] h-[50px] lg:w-[200px] lg:h-[70px] ml-1.5">
        </div>
    </section>

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
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.add('hidden'); // Sembunyikan dropdown
        }
    }
</script>
</body>

</html>