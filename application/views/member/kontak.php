<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
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

    <!-- section 1 -->
    <section class="lg:py-[140px] py-14">
        <div class="px-3.5">
            <div
                class="grid sm:grid-cols-2 items-start gap-12 p-8 mx-auto w-full bg-white [box-shadow:0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
                <div>
                    <h1 class="text-slate-900 text-3xl font-semibold">Let's Talk</h1>
                    <p class="text-sm text-slate-500 mt-4 leading-relaxed">Punya pertanyaan, ingin kerja sama, atau
                        butuh bantuan?
                        Kami siap membantu kamu!</p>

                    <div class="mt-12">
                        <h2 class="text-slate-900 text-base font-semibold">Email</h2>
                        <ul class="mt-4">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff'
                                        viewBox="0 0 479.058 479.058">
                                        <path
                                            d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                                <a href="javascript:void(0)" class="text-sm ml-4">
                                    <small class="block text-slate-900">Gmail</small>
                                    <span class="text-blue-600 font-medium">seminara@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-slate-900 text-base font-semibold">Socials</h2>

                        <ul class="flex mt-4 space-x-4">
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff'
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M6.812 13.937H9.33v9.312c0 .414.335.75.75.75l4.007.001a.75.75 0 0 0 .75-.75v-9.312h2.387a.75.75 0 0 0 .744-.657l.498-4a.75.75 0 0 0-.744-.843h-2.885c.113-2.471-.435-3.202 1.172-3.202 1.088-.13 2.804.421 2.804-.75V.909a.75.75 0 0 0-.648-.743A26.926 26.926 0 0 0 15.071 0c-7.01 0-5.567 7.772-5.74 8.437H6.812a.75.75 0 0 0-.75.75v4c0 .414.336.75.75.75zm.75-3.999h2.518a.75.75 0 0 0 .75-.75V6.037c0-2.883 1.545-4.536 4.24-4.536.878 0 1.686.043 2.242.087v2.149c-.402.205-3.976-.884-3.976 2.697v2.755c0 .414.336.75.75.75h2.786l-.312 2.5h-2.474a.75.75 0 0 0-.75.75V22.5h-2.505v-9.312a.75.75 0 0 0-.75-.75H7.562z"
                                            data-original="#000000" />
                                    </svg>
                                </a>
                            </li>
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff'
                                        viewBox="0 0 511 512">
                                        <path
                                            d="M111.898 160.664H15.5c-8.285 0-15 6.719-15 15V497c0 8.285 6.715 15 15 15h96.398c8.286 0 15-6.715 15-15V175.664c0-8.281-6.714-15-15-15zM96.898 482H30.5V190.664h66.398zM63.703 0C28.852 0 .5 28.352.5 63.195c0 34.852 28.352 63.2 63.203 63.2 34.848 0 63.195-28.352 63.195-63.2C126.898 28.352 98.551 0 63.703 0zm0 96.395c-18.308 0-33.203-14.891-33.203-33.2C30.5 44.891 45.395 30 63.703 30c18.305 0 33.195 14.89 33.195 33.195 0 18.309-14.89 33.2-33.195 33.2zm289.207 62.148c-22.8 0-45.273 5.496-65.398 15.777-.684-7.652-7.11-13.656-14.942-13.656h-96.406c-8.281 0-15 6.719-15 15V497c0 8.285 6.719 15 15 15h96.406c8.285 0 15-6.715 15-15V320.266c0-22.735 18.5-41.23 41.235-41.23 22.734 0 41.226 18.495 41.226 41.23V497c0 8.285 6.719 15 15 15h96.403c8.285 0 15-6.715 15-15V302.066c0-79.14-64.383-143.523-143.524-143.523zM466.434 482h-66.399V320.266c0-39.278-31.953-71.23-71.226-71.23-39.282 0-71.239 31.952-71.239 71.23V482h-66.402V190.664h66.402v11.082c0 5.77 3.309 11.027 8.512 13.524a15.01 15.01 0 0 0 15.875-1.82c20.313-16.294 44.852-24.907 70.953-24.907 62.598 0 113.524 50.926 113.524 113.523zm0 0"
                                            data-original="#000000" />
                                    </svg>
                                </a>
                            </li>
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff'
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 9.3a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4Zm0-1.8a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm5.85-.225a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0ZM12 4.8c-2.227 0-2.59.006-3.626.052-.706.034-1.18.128-1.618.299a2.59 2.59 0 0 0-.972.633 2.601 2.601 0 0 0-.634.972c-.17.44-.265.913-.298 1.618C4.805 9.367 4.8 9.714 4.8 12c0 2.227.006 2.59.052 3.626.034.705.128 1.18.298 1.617.153.392.333.674.632.972.303.303.585.484.972.633.445.172.918.267 1.62.3.993.047 1.34.052 3.626.052 2.227 0 2.59-.006 3.626-.052.704-.034 1.178-.128 1.617-.298.39-.152.674-.333.972-.632.304-.303.485-.585.634-.972.171-.444.266-.918.299-1.62.047-.993.052-1.34.052-3.626 0-2.227-.006-2.59-.052-3.626-.034-.704-.128-1.18-.299-1.618a2.619 2.619 0 0 0-.633-.972 2.595 2.595 0 0 0-.972-.634c-.44-.17-.914-.265-1.618-.298-.993-.047-1.34-.052-3.626-.052ZM12 3c2.445 0 2.75.009 3.71.054.958.045 1.61.195 2.185.419A4.388 4.388 0 0 1 19.49 4.51c.457.45.812.994 1.038 1.595.222.573.373 1.227.418 2.185.042.96.054 1.265.054 3.71 0 2.445-.009 2.75-.054 3.71-.045.958-.196 1.61-.419 2.185a4.395 4.395 0 0 1-1.037 1.595 4.44 4.44 0 0 1-1.595 1.038c-.573.222-1.227.373-2.185.418-.96.042-1.265.054-3.71.054-2.445 0-2.75-.009-3.71-.054-.958-.045-1.61-.196-2.185-.419A4.402 4.402 0 0 1 4.51 19.49a4.414 4.414 0 0 1-1.037-1.595c-.224-.573-.374-1.227-.419-2.185C3.012 14.75 3 14.445 3 12c0-2.445.009-2.75.054-3.71s.195-1.61.419-2.185A4.392 4.392 0 0 1 4.51 4.51c.45-.458.994-.812 1.595-1.037.574-.224 1.226-.374 2.185-.419C9.25 3.012 9.555 3 12 3Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form class="space-y-4">
                    <input type='text' placeholder='Name'
                        class="w-full text-slate-900 rounded-md py-2.5 px-4 border border-gray-300 text-sm outline-0 focus:border-blue-500" />
                    <input type='email' placeholder='Email'
                        class="w-full text-slate-900 rounded-md py-2.5 px-4 border border-gray-300 text-sm outline-0 focus:border-blue-500" />
                    <input type='text' placeholder='Subject'
                        class="w-full text-slate-900 rounded-md py-2.5 px-4 border border-gray-300 text-sm outline-0 focus:border-blue-500" />
                    <textarea placeholder='Message' rows="6"
                        class="w-full text-slate-900 rounded-md px-4 border border-gray-300 text-sm pt-2.5 outline-0 focus:border-blue-500"></textarea>
                    <button type='button'
                        class="text-white bg-blue-500 hover:bg-blue-600 rounded-md text-[15px] font-medium px-4 py-2 w-full cursor-pointer !mt-6">Send</button>
                </form>
            </div>
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
    <!-- script -->
    <script src="script.js"></script>

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