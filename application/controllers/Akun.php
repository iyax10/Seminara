<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
         $this->load->database(); // Memastikan koneksi ke database sudah di-load
        $this->load->library('session');
    }
//================================PENGGUNA====================================
      public function index() {
        // Halaman beranda
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('member/profil_saya', $data); // Pastikan data dikirim ke view
    }

      public function edit_profil() {
        // Halaman beranda
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('member/edit_profil', $data); // Pastikan data dikirim ke view
    }

    public function update_profil()
{
    $email = $this->session->userdata('email');

    // Ambil input dari form
    $nama = $this->input->post('name', true);
    $no_telp = $this->input->post('phone', true);
    $tanggal_lahir = $this->input->post('birthdate', true);
    $status = $this->input->post('status', true);

    // Cek apakah ada upload foto
    if (!empty($_FILES['profilePhoto']['name'])) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = time(); // nama file unik

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profilePhoto')) {
            $foto = 'assets/img/profile/' . $this->upload->data('file_name');
            // Simpan juga nama file baru ke dalam DB
            $this->db->set('foto', $foto);
        } else {
            echo $this->upload->display_errors();
            return;
        }
    }

    // Update data
    $this->db->set('nama', $nama);
    $this->db->set('no_telp', $no_telp);
    $this->db->set('tanggal_lahir', $tanggal_lahir);
    $this->db->set('status', $status);
    $this->db->where('email', $email);
    $this->db->update('pengguna');

    // Set flashdata & redirect
    $this->session->set_flashdata('pesan', '<div class="alert alert-success">Profil berhasil diperbarui.</div>');
    redirect('akun');
}

public function riwayat_transaksi()
{
    $data['user'] = $this->ModelPengguna->cekData([
        'email' => $this->session->userdata('email')
    ])->row_array();

    $id_pengguna = $this->session->userdata('id_pengguna');
    $status = $this->input->get('status');

    if ($status) {
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiByPenggunaStatus($id_pengguna, $status)->result_array();
    } else {
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiByPengguna($id_pengguna)->result_array();
    }

    $this->load->view('member/riwayat', $data);
}


public function seminar_favorit()
{
    $id_pengguna = $this->session->userdata('id_pengguna');
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
    
    $this->load->model('ModelSeminar'); // pastikan ini ada

    $data['favorit'] = $this->ModelSeminar->getFavoritByPengguna($id_pengguna);
    
    $this->load->view('member/favorit', $data);
}


//================================ADMIN====================================

 public function profil_admin() {
        // Halaman beranda
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('admin/profil_admin', $data); // Pastikan data dikirim ke view
    }


        public function edit_profil_admin() {
        // Halaman beranda
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('admin/edit_profil_admin', $data); // Pastikan data dikirim ke view
    }

        public function update_profil_admin()
{
    $email = $this->session->userdata('email');

    // Ambil input dari form
    $nama = $this->input->post('name', true);
  

    // Cek apakah ada upload foto
    if (!empty($_FILES['profilePhoto']['name'])) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = time(); // nama file unik

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profilePhoto')) {
            $foto = 'assets/img/profile/' . $this->upload->data('file_name');
            // Simpan juga nama file baru ke dalam DB
            $this->db->set('foto', $foto);
        } else {
            echo $this->upload->display_errors();
            return;
        }
    }

    // Update data
    $this->db->set('nama', $nama);
   
    $this->db->where('email', $email);
    $this->db->update('pengguna');

    // Set flashdata & redirect
    $this->session->set_flashdata('pesan', '<div class="alert alert-success">Profil berhasil diperbarui.</div>');
    redirect('akun/profil_admin');
}
}