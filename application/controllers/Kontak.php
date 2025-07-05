<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
      $this->load->model('ModelPengguna'); // Load ModelPengguna
        $this->load->library('session');
    }

   public function index() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('member/kontak', $data);
    }
   
}
