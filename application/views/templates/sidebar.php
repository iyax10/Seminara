<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #00aaff, #d84eed);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="color: #ffffff;">Pustaka Booking</div> <!-- Warna teks lebih terang -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Looping Menu-->
    <div class="sidebar-heading" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
        Home
    </div>
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Dashboard</span>
            </a>
        </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
        Master Data
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('buku/kategori'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Kategori Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('buku'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Data Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('user/anggota'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Data Anggota</span>
            </a>
        </li>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
        Transaksi
    </div>
    <li class="nav-item active">
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('pinjam'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Data Peminjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('pinjam/daftarBooking'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Data Booking</span>
            </a>
        </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
        Laporan
    </div>
    <li class="nav-item active">
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('Laporan/laporan_buku'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Laporan Data Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('Laporan/laporan_anggota'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Laporan Data Anggota</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('Laporan/laporan_pinjam'); ?>" style="color: #ffffff;"> <!-- Warna teks lebih terang -->
                <i class="fa fa-fw fa-book"></i>
                <span>Laporan Peminjaman</span>
            </a>
        </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>