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
       <a href="<?= base_url('admin/data_pengguna') ?>" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition">
        <i class="fas fa-users"></i>
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
    <h2 class="text-2xl font-semibold text-blue-700">Edit Profil</h2>

    <div class="flex items-center flex-1 justify-between ml-10 space-x-10">
        <!-- Form Pencarian -->
        

        <!-- Tombol Tambah Seminar -->
        
    </div>
</div>


      <!-- Seminar Table -->
    <!-- Seminar Table -->
<section class="flex-1 bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto md:mx-0">
  <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Edit Profile</h2>

  <form class="space-y-6" action="<?= base_url('akun/update_profil_admin'); ?>" method="POST" enctype="multipart/form-data">
    <div class="flex flex-col md:flex-row md:items-center md:space-x-5" style="width: 750px; height:200px;">
      <div class="flex-shrink-0">
        <img
          src="<?= $user['foto'] ? base_url($user['foto']) : 'https://via.placeholder.com/128'; ?>"
          alt="User profile photo"
          class="w-32 h-32 rounded-full object-cover border-4 border-blue-600"
          width="128"
          height="128"
        />
        <label for="profilePhoto" class="mt-3 inline-block cursor-pointer text-blue-600 hover:text-blue-800 font-semibold text-sm">
          <i class="fas fa-upload mr-1"></i> Edit Foto
        </label>
        <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" class="hidden" />
      </div>

      <div class="flex-0 mt-6 md:mt-2 ">
        <label for="name" class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
        <input
          type="text"
          id="name"
          name="name"
          value="<?= $user['nama']; ?>"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
          required
        />
      </div>
    </div>

    <div>
      <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        value="<?= $user['email']; ?>"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
        readonly
      />
    </div>

   

    

    <div class="pt-4">
      <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-6 py-3"
      >
        Simpan Perubahan
      </button>
    </div>
  </form>
</section>

    </main>
  </div>

  

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
