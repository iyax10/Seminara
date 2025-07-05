<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SEMINARA Admin - Kelola Seminar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

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
       
       <a href="<?= base_url('admin/data_pengguna') ?>" class="flex items-center gap-3 px-3 py-2 rounded bg-blue-50 text-blue-700 font-semibold">
        <i class="fas fa-chalkboard-teacher"></i>
        Data Pengguna
      </a>
      <a href="<?= base_url('Ulasan/data_ulasan') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
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
    <div class="flex justify-between items-center">
    <h2 class="text-2xl font-semibold text-blue-700">Data Member</h2>

    <div class="flex items-center flex-1 justify-between ml-10 space-x-10">
        <!-- Form Pencarian -->
        <form action="<?= base_url('admin/search') ?>" method="GET" class="flex flex-grow max-w-xl">
            <input
                type="text"
                name="query"
                placeholder="Cari seminar..."
                class="w-full border border-gray-300 rounded-l px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
            />
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-r hover:bg-blue-800 transition">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Tombol Tambah Seminar -->
       
    </div>
</div>


      <!-- Seminar Table -->
    <!-- Seminar Table -->
<section class="bg-white rounded-lg shadow p-5 overflow-auto">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Informasi Data Pengguna</h2>
     <div class="flex justify-end mb-4 space-x-3">
          <a href="<?= base_url('laporan/laporan_pengguna_pdf'); ?>"  class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition"><i class="far fa-file-pdf"></i> Download Pdf</a> 

    <a href="<?= base_url('laporan/export_excel_pengguna'); ?>"  class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition"><i class="far fa-file-excel"></i> Download Excel</a>
        </div>
    <table class="min-w-full text-left text-sm">
        <thead class="bg-blue-50 text-blue-700 font-semibold">
            <tr>
                <th class="px-3 py-2 border-b border-gray-200">ID Pengguna</th>
                <th class="px-3 py-2 border-b border-gray-200">Nama</th>
                <th class="px-3 py-2 border-b border-gray-200">Email</th>
                <th class="px-3 py-2 border-b border-gray-200">No. Telepon</th>
                <th class="px-3 py-2 border-b border-gray-200">Tanggal Lahir</th>
                <th class="px-3 py-2 border-b border-gray-200">Status</th>
                <th class="px-3 py-2 border-b border-gray-200">Member Sejak</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pengguna)): ?>
                <tr>
                    <td colspan="8" class="text-center py-4">Belum ada data pengguna</td>
                </tr>
            <?php else: ?>
                <?php foreach ($pengguna as $user): ?>
                    <tr class="hover:bg-blue-50">
                        <td class="px-3 py-2 border-b border-gray-200"><?= $user->id_pengguna ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= htmlspecialchars($user->nama) ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= htmlspecialchars($user->email) ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= htmlspecialchars($user->no_telp ?? '-') ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= $user->tanggal_lahir ? date('d M Y', strtotime($user->tanggal_lahir)) : '-' ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= htmlspecialchars($user->status ?? '-') ?></td>
                        <td class="px-3 py-2 border-b border-gray-200"><?= date('d M Y, H:i', strtotime($user->created_at)) ?></td>
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

  <!-- Modal for Add/Edit Seminar -->
<!--   <div
    id="modalOverlay"
    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4"
  >
    <div class="bg-white rounded-lg max-w-lg w-full shadow-lg relative">
      <button
        id="modalCloseBtn"
        aria-label="Close modal"
        class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-xl font-bold"
      >
        &times;
      </button>
      <div class="p-6">
        <h3 id="modalTitle" class="text-xl font-semibold text-blue-700 mb-4">Tambah Seminar</h3>
        <form id="seminarForm" class="space-y-4">
          <div>
            <label for="nama_seminar" class="block text-xs font-semibold mb-1">Nama Seminar</label>
            <input
              type="text"
              id="nama_seminar"
              name="nama_seminar"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan nama seminar"
            />
          </div>
          <div>
            <label for="kategori" class="block text-xs font-semibold mb-1">Kategori</label>
            <input
              type="text"
              id="kategori"
              name="kategori"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan kategori"
            />
          </div>
          <div>
            <label for="tempat" class="block text-xs font-semibold mb-1">Tempat</label>
            <input
              type="text"
              id="tempat"
              name="tempat"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan tempat seminar"
            />
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="tanggal" class="block text-xs font-semibold mb-1">Tanggal</label>
              <input
                type="date"
                id="tanggal"
                name="tanggal"
                required
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
            <div>
              <label for="waktu" class="block text-xs font-semibold mb-1">Waktu</label>
              <input
                type="time"
                id="waktu"
                name="waktu"
                required
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              />
            </div>
          </div>
          <div>
            <label for="harga" class="block text-xs font-semibold mb-1">Harga</label>
            <input
              type="number"
              id="harga"
              name="harga"
              min="0"
              step="0.01"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan harga tiket"
            />
          </div>
          <div>
            <label for="narasumber" class="block text-xs font-semibold mb-1">Narasumber</label>
            <input
              type="text"
              id="narasumber"
              name="narasumber"
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan nama narasumber"
            />
          </div>
          <div>
            <label for="deskripsi" class="block text-xs font-semibold mb-1">Deskripsi</label>
            <textarea
              id="deskripsi"
              name="deskripsi"
              rows="3"
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Masukkan deskripsi seminar"
            ></textarea>
          </div>
          <div>
            <label for="benefit" class="block text-xs font-semibold mb-1">Benefit (opsional)</label>
            <textarea
              id="benefit"
              name="benefit"
              rows="2"
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
              placeholder="Sertifikat, snack, dll"
            ></textarea>
          </div>
          <div class="flex justify-end space-x-3 mt-4">
            <button
              type="button"
              id="btnCancel"
              class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition"
            >
              Batal
            </button>
            <button
              type="submit"
              class="px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 transition"
            >
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div> -->

  <!-- <script>
    const modalOverlay = document.getElementById("modalOverlay");
    const btnAddSeminar = document.getElementById("btnAddSeminar");
    const modalCloseBtn = document.getElementById("modalCloseBtn");
    const btnCancel = document.getElementById("btnCancel");
    const modalTitle = document.getElementById("modalTitle");
    const seminarForm = document.getElementById("seminarForm");

    btnAddSeminar.addEventListener("click", () => {
      modalTitle.textContent = "Tambah Seminar";
      seminarForm.reset();
      modalOverlay.classList.remove("hidden");
    });

    modalCloseBtn.addEventListener("click", () => {
      modalOverlay.classList.add("hidden");
    });

    btnCancel.addEventListener("click", () => {
      modalOverlay.classList.add("hidden");
    });

    // Close modal on clicking outside modal content
    modalOverlay.addEventListener("click", (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.classList.add("hidden");
      }
    });

    seminarForm.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Data seminar disimpan (simulasi).");
      modalOverlay.classList.add("hidden");
    });
  </script> -->

  <script>
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
      const idSeminar = this.getAttribute('data-id');

      Swal.fire({
        title: 'Anda yakin ingin menghapus seminar ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect ke controller delete dengan id seminar
          window.location.href = '<?= base_url("seminar/delete/") ?>' + idSeminar;
        }
      });
    });
  });
</script>

<script>
  <?php if ($this->session->flashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: '<?= $this->session->flashdata('success') ?>',
      timer: 2500,
      showConfirmButton: false
    });
  <?php endif; ?>
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
