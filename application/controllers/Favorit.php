<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorit extends CI_Controller {

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
public function toggle_favorit()
{
    $json = json_decode(file_get_contents("php://input"), true);
    $id_seminar = $json['id_seminar'];
    $id_pengguna = $this->session->userdata('id_pengguna');

    if (!$id_pengguna) {
        echo json_encode(['success' => false, 'message' => 'Belum login']);
        return;
    }

    // Cek apakah sudah ada favorit
    $exists = $this->ModelFavorit->cekFavorit($id_pengguna, $id_seminar);

    if ($exists) {
        // Jika sudah ada, hapus
        $this->ModelFavorit->hapusFavorit($id_pengguna, $id_seminar);
        echo json_encode(['success' => true, 'favorited' => false]); // FALSE = sudah dihapus
    } else {
        // Jika belum ada, tambahkan
        $data = [
            'id_pengguna' => $id_pengguna,
            'id_seminar' => $id_seminar,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->ModelFavorit->insertFavorit($data);
        echo json_encode(['success' => true, 'favorited' => true]); // TRUE = baru ditambahkan
    }
}



}
