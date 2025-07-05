<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
        $this->load->database();
        $this->load->library('session');
    }

    // Menampilkan halaman sertifikat
    public function index() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_pengguna = $this->session->userdata('id_pengguna');

        // Ambil transaksi yang berhasil milik pengguna ini dan seminar sudah lewat
        $this->db->select('seminar.*, transaksi.tanggal_transaksi');
        $this->db->from('transaksi');
        $this->db->join('seminar', 'seminar.id_seminar = transaksi.id_seminar');
        $this->db->where('transaksi.id_pengguna', $id_pengguna);
        $this->db->where('transaksi.status', 'berhasil');
        $this->db->where('seminar.tanggal <=', date('Y-m-d'));
        $data['sertifikat'] = $this->db->get()->result();

        $this->load->view('member/sertifikat', $data);
    }
}

