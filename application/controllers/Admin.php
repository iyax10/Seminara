<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
         $this->load->database(); // Memastikan koneksi ke database sudah di-load
        $this->load->library('session');
    }

    public function index()
{
    // Periksa apakah pengguna sudah login
    if ($this->session->userdata('logged_in')) {
        // Pengguna sudah login, tampilkan dashboard
        $this->dashboard();
    } else {
        // Pengguna belum login, tampilkan formulir login
        $this->show_login();
    }
}

private function show_login()
{
    // Memuat tampilan login
    $this->load->view('admin/login'); // Pastikan ini mengarah ke tampilan login 
}

public function login()
{
    // Mengecek apakah form telah disubmit
    if ($this->input->post()) {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        // Memanggil model untuk memeriksa kredensial login
        $user = $this->ModelPengguna->getUserByEmail($email); // Ambil data pengguna berdasarkan email

        if ($user) {
            if (password_verify($password, $user->password)) { // Jika password cocok
                if ($user->role == 1) { // Cek apakah role pengguna adalah 1
                    // Menyimpan data session untuk login
                    $this->session->set_userdata('logged_in', true); // Menandakan user sudah login
                    $this->session->set_userdata('email', $user->email); // Menyimpan email ke session
                    $this->session->set_userdata('nama', $user->nama); // Menyimpan nama user ke session

                    // Mengarahkan ke dashboard (index)
                    redirect('admin/index'); // Redirect ke metode index pada controller admin
                } else {
                    // Jika role bukan 1
                    $data['error_message'] = 'Anda Tidak memiliki Hak akses';
                    $this->load->view('admin/login', $data);
                }
            } else {
                // Jika password salah
                $data['error_message'] = 'Email atau password anda salah';
                $this->load->view('admin/login', $data);
            }
        } else {
            // Jika email tidak ada
            $data['error_message'] = 'Email anda belum terdaftar';
            $this->load->view('admin/login', $data);
        }
    } else {
        // Jika bukan request POST, tampilkan form login
        $this->show_login();
    }
}


 public function data_pengguna() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->ModelPengguna->getAllPengguna();
        $this->load->view('admin/data_pengguna', $data);
    }

    public function search() {
    $query = $this->input->get('query');
     $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();

    $data['pengguna'] = $this->ModelPengguna->searchPengguna($query);
    $this->load->view('admin/data_pengguna', $data);
    
}



public function registrasi() {
    // Aturan validasi
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna.email]', [
        'is_unique' => 'Email ini sudah terdaftar, harap daftar dengan email baru',
        'valid_email' => 'Masukkan email yang benar!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', [
        'min_length' => 'Masukkan Password minimal 5 karakter'
    ]);
    $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|matches[password]', [
        'matches' => 'Password Tidak sama!'
    ]);

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan kembali form registrasi
        $this->load->view('admin/registrasi');
    } else {
        // Proses registrasi
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 1,
        ];
        // Simpan data ke database
        $this->ModelPengguna->simpanData($data);
          $this->session->set_flashdata('success', 'Selamat akun anda telah terdaftar, silahkan Login.');
        redirect('admin');
    }
}




    public function dashboard() {
        // Halaman dashboard admin
         $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['total_pengguna'] = $this->ModelPengguna->countPengguna();
        $data['total_seminar'] = $this->ModelSeminar->countSeminar();
        $data['total_tiket'] = $this->ModelTransaksi->countTransaksi();
        $data['total_ulasan'] = $this->ModelUlasan->countUlasan();
        $data['latest_seminars'] = $this->ModelSeminar->getLatestSeminars();
        $data['latest_transactions'] = $this->ModelTransaksi->getLatestTransactions();
        $data['latest_reviews'] = $this->ModelUlasan->getLatestReviews();

        $this->load->view('admin/dashboard', $data);
    }



 public function logout()
{
    // Menghancurkan session yang ada, sehingga pengguna akan keluar dari aplikasi
    $this->session->sess_destroy();
    // Mengarahkan pengguna kembali ke halaman login setelah logout
    redirect('admin/index'); // Redirect ke halaman utama atau login page
}


}
