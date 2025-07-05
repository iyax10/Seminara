
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {
    public function __construct() {
        parent::__construct();
         $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
          $this->load->model('ModelFavorit');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
    }


 // ================================================================== BAGIAN ADMIN ============================================================
    public function data_seminar() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['seminars'] = $this->ModelSeminar->getAllSeminars();
        $this->load->view('admin/kelolaseminar', $data);
    }

    public function input() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        // Form input seminar
        $this->load->view('admin/input_seminar',$data);
    }

  public function save() {
    // Validasi input minimal
    $required = ['judul', 'tanggal', 'waktu', 'kategori', 'tgl_mulai_daftar', 'tgl_akhir_daftar'];
    foreach ($required as $field) {
        if (!$this->input->post($field)) {
            show_error("Field $field wajib diisi.");
            return;
        }
    }

    // Konfigurasi upload gambar
    $config['upload_path'] = './assets/img/upload/'; // Pastikan folder ini ada
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = 2048; // 2MB
    $config['encrypt_name'] = TRUE; // Menggunakan nama file yang terenkripsi

    $this->load->library('upload', $config);

    $gambar = '';
    if (!empty($_FILES['gambar']['name'])) {
        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $gambar = 'assets/img/upload/' . $image['file_name']; // Simpan path yang benar
        } else {
            // Jika upload gagal, Anda bisa set error atau kosongkan gambar
            $gambar = '';
            // Anda bisa menampilkan error upload jika diperlukan
            // $error = $this->upload->display_errors();
            // show_error("Upload gambar gagal: " . $error);
        }
    }

    $data = [
        'judul'             => $this->input->post('judul'),
        'deskripsi'         => $this->input->post('deskripsi'),
        'kategori'          => $this->input->post('kategori'),
        'tanggal'           => $this->input->post('tanggal'),
        'waktu'             => $this->input->post('waktu'),
        'lokasi'            => $this->input->post('lokasi'),
        'kuota'             => intval($this->input->post('kuota')),
        'harga'             => floatval($this->input->post('harga')),
        'gambar'            => $gambar, // Simpan path gambar
        'narasumber'        => $this->input->post('narasumber'),
        'benefit'           => $this->input->post('benefit'),
        'tgl_mulai_daftar'  => $this->input->post('tgl_mulai_daftar'),
        'tgl_akhir_daftar'  => $this->input->post('tgl_akhir_daftar'),
        'created_at'        => date('Y-m-d H:i:s'),
    ];

    if ($this->ModelSeminar->insertSeminar($data)) {
        $this->session->set_flashdata('success', 'Data seminar berhasil ditambahkan.');
        redirect('seminar/input');
    } else {
        show_error('Gagal menyimpan seminar.');
    }
}

public function detail($id_seminar) {
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
    // Ambil data seminar berdasarkan ID
    $data['seminar'] = $this->ModelSeminar->getSeminarById($id_seminar);
    
    // Cek jika seminar tidak ditemukan
    if (empty($data['seminar'])) {
        show_404(); // Tampilkan halaman 404 jika seminar tidak ditemukan
    }

    // Tampilkan view detail seminar
    $this->load->view('admin/detail_seminar', $data);
}

public function search() {
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
    $query = $this->input->get('query');
    $data['seminars'] = $this->ModelSeminar->searchSeminar($query);
    $this->load->view('admin/kelolaseminar', $data);
}

 public function edit($id_seminar) {
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $seminar = $this->ModelSeminar->getSeminarById($id_seminar);
        if (!$seminar) {
            $this->session->set_flashdata('error', 'Seminar tidak ditemukan.');
            redirect('seminar/data_seminar');
            return;
        }
        $data['seminar'] = $seminar;
        $this->load->view('admin/update_seminar', $data);
    }

    // Method untuk proses update seminar dari form
    public function update() {
        $id_seminar = $this->input->post('id_seminar');
        if (!$id_seminar) {
            $this->session->set_flashdata('error', 'ID seminar tidak ditemukan.');
            redirect('seminar/data_seminar');
            return;
        }
        $data = [
            'waktu' => $this->input->post('waktu'),
            'kuota' => $this->input->post('kuota'),
            'tgl_akhir_daftar' => $this->input->post('tgl_akhir_daftar'),
        ];
        $this->ModelSeminar->updateSeminar($id_seminar, $data);
        $this->session->set_flashdata('success', 'Data seminar berhasil diperbarui.');
        redirect('seminar/data_seminar');
    }

public function delete($id_seminar) {
    if (!$id_seminar) {
        $this->session->set_flashdata('error', 'ID seminar tidak ditemukan.');
        redirect('seminar/data_seminar');
        return;
    }

    $this->ModelSeminar->deleteSeminar($id_seminar);
    $this->session->set_flashdata('success', 'Data seminar berhasil dihapus.');
    redirect('seminar/data_seminar');
}

// ================================================================== /BAGIAN ADMIN ============================================================

  public function seminar_info($id_seminar) {
           // Ambil data seminar berdasarkan ID
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();

           $data['seminar'] = $this->ModelSeminar->infoSeminar($id_seminar);
           $this->load->view('member/info_seminar', $data); // Ganti dengan nama view Anda
       }

         public function view($id) {
        // Mengambil data seminar berdasarkan ID
        $data['seminar'] = $this->ModelSeminar->getSeminarById($id);
        // Memeriksa apakah seminar ditemukan
        if (!$data['seminar']) {
            show_404(); // Tampilkan halaman 404 jika seminar tidak ditemukan
        }
        // Cek apakah seminar sudah difavoritkan oleh pengguna
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['is_favorited'] = $id_pengguna ? $this->ModelFavorit->is_favorited($id_pengguna, $id) : false;
        // Memuat view dengan data seminar dan status favorit
        $this->load->view('member/info_seminar', $data);
    }

}


