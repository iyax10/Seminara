<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SEMINARA Admin - Ulasan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

   <!------------------------------------------------ PENDUKUNG  -------------------------------------->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

  
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
</head>
<body class="flex h-screen bg-gray-100">
  <!-- Sidebar -->
 <aside class="w-64 bg-white shadow-md flex flex-col">
    <div class="flex items-center justify-center h-16 border-b border-gray-200 font-robotoslab italic font-semibold text-xl text-blue-700">
      SEMINARA
    </div>
    <nav class="flex flex-col flex-grow px-4 py-6 space-y-2 text-gray-700 text-sm">
     <a href="<?= base_url('admin') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
      </a>
       <a href="<?= base_url('Seminar/data_seminar') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
        <i class="fas fa-chalkboard-teacher"></i>
        Kelola Seminar
      </a>
      <a href="<?= base_url('Transaksi') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
        <i class="fas fa-receipt"></i>
        Data Transaksi
      </a>
       <a href="<?= base_url('admin/data_pengguna') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
        <i class="fas fa-users"></i>
        Data Pengguna
      </a>
       <a href="<?= base_url('Ulasan/data_ulasan') ?>" class="flex items-center gap-3 px-3 py-2 rounded bg-blue-50 text-blue-700 font-semibold">
        <i class="fas fa-star"></i>
       Ulasan
      </a>
     <a href="#"  class="flex items-center gap-3 px-3 py-2 mt-auto rounded hover:bg-red-100 hover:text-red-700 transition font-semibold text-red-600" onclick="confirmLogout()">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </a>
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
            window.location.href = "<?php echo base_url('admin/logout'); ?>";
        }
    });
}
</script>
  </aside>

  <!-- Main content -->
  <div class="flex flex-col flex-grow overflow-auto">
    <!-- Header -->
   <header class="h-16 flex items-center justify-between bg-white shadow px-6 relative z-50">
  <div class="font-robotoslab italic font-semibold text-xl text-blue-700">SEMINARA Admin</div>

  <div class="relative">
    <button id="profileButton"
      class="flex items-center space-x-2 border border-gray-200 rounded-lg px-3 py-1.5 text-gray-700 text-sm hover:bg-gray-50"
      type="button" onclick="toggleDropdown()">
      <img alt="User avatar photo" class="w-8 h-8 rounded-full object-cover" src="<?= base_url($user['foto']) ?>" width="32" height="32" />
      <span class="text-primary font-medium"><?= $this->session->userdata('nama'); ?></span>
    </button>

    <div id="dropdownMenu"
      class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
      <a href="<?= base_url('Akun/profil_admin') ?>"
        class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
        <i class="fas fa-user mr-2"></i>
        Profile Saya
      </a>
    </div>
  </div>
</header>


    <!-- Content -->
    <main class="p-6 space-y-8 overflow-auto">
      <h2 class="text-2xl font-semibold text-blue-700">Ulasan</h2>

      <section class="bg-white rounded-lg shadow p-5 overflow-auto">
        <table class="min-w-full text-left text-sm">
          <thead class="bg-blue-50 text-blue-700 font-semibold">
            <tr>
              <th class="px-3 py-2 border-b border-gray-200">ID Review</th>
              <th class="px-3 py-2 border-b border-gray-200">Nama Pengguna</th>
              <th class="px-3 py-2 border-b border-gray-200">Seminar</th>
              <th class="px-3 py-2 border-b border-gray-200">Rating</th>
              <th class="px-3 py-2 border-b border-gray-200">Komentar</th>
              <th class="px-3 py-2 border-b border-gray-200">Tanggal Review</th>
            
            </tr>
          </thead>
          <tbody>
            <?php if (empty($reviews)): ?>
              <tr>
                <td colspan="7" class="px-3 py-2 border-b border-gray-200 text-center italic">Belum ada ulasan.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($reviews as $review): ?>
                <tr class="hover:bg-blue-50 align-top">
                  <td class="px-3 py-2 border-b border-gray-200"><?= $review->id_review ?></td>
                  <td class="px-3 py-2 border-b border-gray-200"><?= $review->pengguna ?></td>
                  <td class="px-3 py-2 border-b border-gray-200"><?= $review->seminar ?></td>
                  <td class="px-3 py-2 border-b border-gray-200">
                    <div class="flex items-center space-x-1">
                      <?php for ($i = 0; $i < 5; $i++): ?>
                        <i class="fas fa-star <?= $i < $review->rating ? 'text-yellow-400' : 'far fa-star' ?>"></i>
                      <?php endfor; ?>
                    </div>
                  </td>
                  <td class="px-3 py-2 border-b border-gray-200 max-w-xs break-words italic"><?= $review->komentar ?></td>
                  <td class="px-3 py-2 border-b border-gray-200"><?= $review->created_at ?></td>
                  <td class="px-3 py-2 border-b border-gray-200 space-x-2">
                  
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </section>
    </main>
  </div>

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
