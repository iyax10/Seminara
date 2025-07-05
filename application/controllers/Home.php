<?php
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        // Halaman beranda
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['seminars'] = $this->ModelSeminar->terbaruSeminar(); // Mengambil 3 seminar terbaru
        $data['ulasan'] = $this->ModelUlasan->getAllUlasan(); // atau query join yang relevan

        $this->load->view('member/index', $data); // Pastikan data dikirim ke view
    }

    public function login() {
    // Mengecek apakah form telah disubmit
    if ($this->input->post()) {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        // Memanggil model untuk memeriksa kredensial login
        $user = $this->ModelPengguna->getUserByEmail($email); // Ambil data pengguna berdasarkan email

        if ($user) {
            if (password_verify($password, $user->password)) { // Jika password cocok
                if ($user->role == 2) { // Cek apakah role pengguna adalah 2
                    // Menyimpan data session untuk login, termasuk id_pengguna
                   $this->session->set_userdata([
                        'logged_in'   => true,
                        'email'       => $user->email,
                        'nama'        => $user->nama,
                        'id_pengguna' => $user->id_pengguna,
                        'foto'        => $user->foto //  Tambahkan ini
                    ]);


                    // Mengarahkan ke dashboard (index)
                    redirect(base_url());
                } else {
                    // Jika role bukan 2
                    $this->session->set_flashdata('error_message', 'Anda Tidak memiliki Hak akses');
                    redirect(base_url());
                }
            } else {
                // Jika password salah
                $this->session->set_flashdata('error_message', 'Email atau password anda salah');
                redirect(base_url());
            }
        } else {
            // Jika email tidak ada
            $this->session->set_flashdata('error_message', 'Email anda belum terdaftar');
            redirect(base_url());
        }
    } else {
        // Jika bukan request POST, tampilkan form login
        redirect(base_url());
    }
}


    public function registrasi() {
        // Aturan validasi
        $this->form_validation->set_rules('Nama', 'Nama', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Email ini sudah terdaftar, harap daftar dengan email baru',
            'valid_email' => 'Masukkan email yang benar!'
        ]);
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[5]', [
            'min_length' => 'Masukkan Password minimal 5 karakter'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form registrasi
            $this->session->set_flashdata('regist_error', validation_errors());
            redirect(base_url());
        } else {
            // Proses registrasi
            $data = [
                'nama' => $this->input->post('Nama'),
                'email' => $this->input->post('Email'),
                'no_telp' => $this->input->post('no_telp'),
                'password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
                'tanggal_lahir' => $this->input->post('tanggal'),
                'status' => $this->input->post('status'),
                'role' => 2, //otomatis role nya 2
            ];
            // Simpan data ke database
            $this->ModelPengguna->simpanData($data);
            $this->session->set_flashdata('success_message', 'Selamat akun anda telah terdaftar, silahkan Login.');
            redirect(base_url());
        }
    }

    public function logout() {
        // Hapus data session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');

        // Redirect ke halaman utama setelah logout
        redirect(base_url());
    }
}
