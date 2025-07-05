<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Seminara Admin Portal Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Animation for fade-in */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        /* Animation for fade-out */
        .fade-out {
            animation: fadeOut 0.5s ease forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-10px); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row bg-white">
    <section class="bg-[#2B64E6] flex-1 relative flex flex-col justify-center px-10 py-16 md:py-24 md:px-16 text-white overflow-hidden">
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight max-w-md">
            Welcome to
            <br/>
            Seminara Admin Portal
        </h1>
        <svg aria-hidden="true" class="absolute bottom-0 right-0 w-48 h-48 md:w-72 md:h-72" fill="none" stroke="white" stroke-width="4" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path d="M 100, 200 A 100,100 0 0 1 200,100" stroke-linecap="round"></path>
            <path d="M 140, 200 A 60,60 0 0 1 200,140" stroke-linecap="round"></path>
        </svg>
    </section>
    <section class="flex-1 bg-[#F7FAFC] px-12 py-20 md:py-28 md:px-28 flex flex-col justify-center max-w-xl mx-auto w-full">
        <h2 class="text-4xl font-extrabold text-[#0F172A] leading-tight max-w-lg">Masuk</h2>
        <div class="mt-10 max-w-lg space-y-8 relative">
            <!-- Animated Success Notification -->
            <?php if ($this->session->flashdata('success')): ?>
                <div id="notification" class="fade-in bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert" aria-live="assertive" aria-atomic="true">
                    <strong class="font-bold mr-2">Success!</strong>
                    <span class="block sm:inline"><?= htmlspecialchars($this->session->flashdata('success'), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <!-- Animated Error Notification -->
            <?php if (isset($error_message)): ?>
                <div id="notification" class="fade-in bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert" aria-live="assertive" aria-atomic="true">
                    <strong class="font-bold mr-2">Error!</strong>
                    <span class="block sm:inline"><?= htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('Admin/login'); ?>" novalidate="" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-[#111827] mb-2" for="email">Email address</label>
                    <input autocomplete="email" class="w-full rounded-md border border-gray-300 px-5 py-4 text-base text-[#111827] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2B64E6] focus:border-transparent" id="email" name="email" required="" type="email"/>
                    <?= form_error('email', '<small class="text-red-500">', '</small>'); ?>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#111827] mb-2" for="password">Password</label>
                    <input autocomplete="current-password" class="w-full rounded-md border border-gray-300 px-5 py-4 text-base text-[#111827] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2B64E6] focus:border-transparent" id="password" name="password" required="" type="password"/>
                    <?= form_error('password', '<small class="text-red-500">', '</small>'); ?>
                </div>
                <button class="w-max bg-[#2B64E6] text-white font-semibold text-base rounded-md px-8 py-4 hover:bg-[#244fc1] focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-[#2B64E6]" type="submit">Masuk</button>
            </form>
            <p class="mt-6 text-sm text-[#6B7280] max-w-lg">
                Belum punya akun?
                <a class="text-[#2B64E6] font-semibold hover:underline" href="<?= base_url('Admin/registrasi'); ?>">Daftar</a>
            </p>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var notif = document.getElementById('notification');

            if (notif) {
                // Auto fade out after 4 seconds
                setTimeout(function () {
                    // Add fade-out class
                    notif.classList.remove('fade-in');
                    notif.classList.add('fade-out');
                    // Remove the element completely after animation ends (500ms)
                    setTimeout(function () {
                        notif.remove();
                    }, 500);
                }, 4000);
            }
        });
    </script>
</body>
</html>
