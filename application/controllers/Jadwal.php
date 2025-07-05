<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ModelSeminar');
        $this->load->model('ModelPengguna'); // Load ModelPengguna
        $this->load->library('session');
    }

   public function index($kategori = 'all') {
        $data['seminars'] = $this->ModelSeminar->getSeminars($kategori);
        $data['kategori_seminar'] = array_unique(array_column($this->ModelSeminar->getSeminars(), 'kategori'));
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('member/jadwal', $data);
    }
   
}
