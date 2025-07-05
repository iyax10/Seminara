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
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: "Inter", sans-serif;
      background: #f4f6fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .card {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1),
        0 4px 6px -4px rgb(0 0 0 / 0.1);
      max-width: 700px;
      margin: 2rem auto 4rem;
      padding: 2.5rem 3rem;
    }
    .icon-circle {
      background: #22c55e;
      width: 72px;
      height: 72px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgb(34 197 94 / 0.4);
      margin: 0 auto;
    }
    .icon-circle svg {
      width: 36px;
      height: 36px;
      stroke-width: 2.5;
    }
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
    .qr-container {
      max-width: 220px;
      margin: 0 auto 1rem;
    }
    .ticket-code {
      font-family: monospace;
      font-weight: 600;
      font-size: 1.125rem;
      color: #1f2937; /* gray-800 */
      word-break: break-all;
      text-align: center;
      user-select: all;
      margin-bottom: 2rem;
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
<?php
  $tanggal_seminar = strtotime($seminar->tanggal);
  $sekarang = strtotime(date('Y-m-d'));
  $boleh_ulasan = $tanggal_seminar < $sekarang;
?>

  <main class="card text-center">
    <div class="icon-circle mb-6" aria-hidden="true">
      <svg
        fill="none"
        stroke="white"
        stroke-linecap="round"
        stroke-linejoin="round"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
        aria-hidden="true"
        focusable="false"
      >
        <path d="M5 13l4 4L19 7"></path>
      </svg>
    </div>
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Pembayaran Berhasil!</h1>
    <p class="text-gray-600 max-w-xl mx-auto mb-10 text-lg leading-relaxed">
      Terima kasih telah melakukan pembayaran. Berikut adalah detail transaksi Anda:
    </p>

    <div class="qr-container">
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=<?= urlencode($transaksi['kode_tiket'] ?? 'TKT20240615XYZ') ?>" alt="QR Code Tiket" class="mx-auto rounded-lg shadow-lg" />
      <div class="ticket-code" title="Kode Tiket"><?= htmlspecialchars($transaksi['kode_tiket'] ?? 'TKT20240615XYZ') ?></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 text-left max-w-3xl mx-auto">
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b border-gray-200 pb-2 text-gray-800">
          Informasi Transaksi
        </h2>
        <ul class="space-y-3 text-gray-700 text-base">
          <li><span class="font-semibold">ID Transaksi:</span> <span class="break-words"><?= htmlspecialchars($transaksi['id_transaksi'] ?? 'TRX1234567890') ?></span></li>
          <li><span class="font-semibold">Kode Tiket:</span> <span class="break-words"><?= htmlspecialchars($transaksi['kode_tiket'] ?? 'TKT20240615XYZ') ?></span></li>
          <li><span class="font-semibold">Tanggal Pembayaran:</span> <span><?= htmlspecialchars($transaksi['tanggal_transaksi'] ?? '16 Juni 2025') ?></span></li>
          <li><span class="font-semibold">Status Pembayaran:</span> <span class="text-green-600 font-bold"><?= htmlspecialchars($transaksi['status'] ?? 'Berhasil') ?></span></li>
        </ul>
      </section>

      <section>
        <h2 class="text-xl font-semibold mb-4 border-b border-gray-200 pb-2 text-gray-800">
          Detail Seminar
        </h2>
        <ul class="space-y-3 text-gray-700 text-base">
  <li><span class="font-semibold">Nama Seminar:</span> <span><?= htmlspecialchars($seminar->judul ?? 'Internet of Things (IoT) Project') ?></span></li>
  <li><span class="font-semibold">Kategori:</span> <span><?= htmlspecialchars($seminar->kategori ?? 'Teknologi & Inovasi') ?></span></li>
  <li><span class="font-semibold">Harga Tiket:</span> <span>Rp <?= number_format($seminar->harga ?? 0, 0, ',', '.') ?></span></li>
  <li><span class="font-semibold">Biaya Admin:</span> <span>Rp 5.000</span></li>
  <li><span class="font-semibold">Total Pembayaran:</span> <span class="font-bold">Rp <?= number_format($transaksi['nom_bayar'] ?? 5000, 0, ',', '.') ?></span></li>
  <li><span class="font-semibold">Tanggal Seminar:</span> <span><?= htmlspecialchars($seminar->tanggal ?? 'Internet of Things (IoT) Project') ?></span></li>
  <li><span class="font-semibold">Waktu Seminar:</span> <span><?= htmlspecialchars($seminar->waktu ?? 'Internet of Things (IoT) Project') ?></span></li>
</ul>

      </section>
    </div>

    <p class="mt-12 text-gray-500 max-w-xl mx-auto text-sm leading-relaxed">
      Tiket Anda sudah terkonfirmasi. Silakan cek email Anda untuk informasi lebih lanjut dan simpan kode tiket sebagai bukti.
    </p>

    <button
      type="button"
      onclick="window.location.href='<?= base_url('home') ?>'"
      class="btn-primary"
      aria-label="Kembali ke Beranda"
    >
      Kembali ke Beranda
    </button>
    <?php if ($boleh_ulasan): ?>
  <button
    type="button"
    onclick="window.location.href='<?= base_url('ulasan/form/' . $transaksi['id_seminar']) ?>'"
    class="btn-primary mt-4"
    aria-label="Beri Ulasan"
  >
    Beri Ulasan
  </button>
<?php else: ?>
  <button
    type="button"
    disabled
    class="mt-4 bg-gray-200 text-gray-500 cursor-not-allowed px-6 py-3 rounded font-semibold"
    title="Ulasan akan aktif setelah seminar selesai"
  >
    Beri Ulasan
  </button>
<?php endif; ?>

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