<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelFavorit extends CI_Model {

   
    public function insertFavorit($data)
{
    return $this->db->insert('favorit', $data);
}

public function cekFavorit($id_pengguna, $id_seminar)
{
    return $this->db->where('id_pengguna', $id_pengguna)
                    ->where('id_seminar', $id_seminar)
                    ->get('favorit')
                    ->row_array();
}

public function hapusFavorit($id_pengguna, $id_seminar)
{
    $this->db->where('id_pengguna', $id_pengguna);
    $this->db->where('id_seminar', $id_seminar);
    return $this->db->delete('favorit');
}


}
