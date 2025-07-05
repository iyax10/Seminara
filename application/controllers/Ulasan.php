<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelUlasan');
        $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');

    }

    // Menampilkan halaman ulasan
    public function data_ulasan() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['reviews'] = $this->ModelUlasan->getAllReviews();
        $this->load->view('admin/ulasan', $data);
    }

 // Tampilkan form ulasan
    public function form($id_seminar) {
        $id_pengguna = $this->session->userdata('id_pengguna');

        $seminar = $this->ModelSeminar->getSeminarById($id_seminar);

        // Cek apakah seminar sudah lewat
       
    if (strtotime($seminar->tanggal) > time()) {
        show_error("Anda hanya dapat mengulas seminar yang sudah lewat.");
    }

        $data['user'] = $this->ModelPengguna->getPenggunaById($id_pengguna);
        $data['seminar'] = $seminar;

        $this->load->view('member/ulasan_pengguna', $data);
    }

    // Simpan ulasan
    public function simpan() {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_seminar = $this->input->post('id_seminar', true);
        $komentar = $this->input->post('komentar', true);
        $rating = (int) $this->input->post('rating');

        if ($id_seminar && $rating) {
            $data = [
                'id_pengguna' => $id_pengguna,
                'id_seminar' => $id_seminar,
                'komentar'    => $komentar,
                'rating'      => $rating,
            ];

            $this->ModelUlasan->tambahUlasan($data);

            $this->session->set_flashdata('success', 'Ulasan berhasil dikirim.');
            redirect('akun/riwayat_transaksi');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan ulasan. Pastikan semua kolom diisi.');
            redirect('ulasan/form/' . $id_seminar);
        }
    }

}
