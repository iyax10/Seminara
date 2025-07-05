<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSeminar extends CI_Model {
    public function countSeminar() {
        return $this->db->count_all('seminar');
    }

    //menampilkan 5 seminar terbaru (untuk di bagian beranda Admin)
    public function getLatestSeminars($limit = 5) {
        return $this->db->order_by('created_at', 'DESC')->get('seminar', $limit)->result();
    }

    //menampilkan seminar  (untuk di bagian kelola seminar Admin)
     public function getAllSeminars() {
        return $this->db->get('seminar')->result();
    }

      public function getSeminarById($id_seminar) {
        $query = $this->db->get_where('seminar', ['id_seminar' => $id_seminar]);
        return $query->row(); // Mengembalikan 1 baris data
    }

      public function insertSeminar($data) {
        return $this->db->insert('seminar', $data);
    }

    public function searchSeminar($query) {
    $this->db->like('judul', $query);
    $this->db->or_like('kategori', $query);
    return $this->db->get('seminar')->result();
}

public function updateSeminar($id_seminar, $data) {
    $this->db->where('id_seminar', $id_seminar);
    return $this->db->update('seminar', $data);
}

public function deleteSeminar($id_seminar) {
    $this->db->where('id_seminar', $id_seminar);
    return $this->db->delete('seminar');
}

//================================================================= BAGIAN PENGGUNA =============================================

public function terbaruSeminar($limit = 3) {
        $this->db->order_by('created_at', 'DESC'); // Mengurutkan berdasarkan tanggal terbaru
        return $this->db->get('seminar', $limit)->result(); // Mengambil 3 seminar terbaru
    }

    public function getSeminars($kategori = 'all') {
        $this->db->where('tanggal >=', date('Y-m-d')); // Hanya tampilkan seminar yang belum lewat tanggalnya
        if ($kategori != 'all') {
            $this->db->where('kategori', $kategori);
        }
        $this->db->order_by('tanggal', 'ASC');
        $query = $this->db->get('seminar');
        return $query->result();
    }

 public function infoSeminar($id_seminar) {
           // Mengambil data seminar berdasarkan ID
           $this->db->where('id_seminar', $id_seminar);
           $query = $this->db->get('seminar'); // Ganti 'seminar' dengan nama tabel Anda
           return $query->row_array(); // Mengembalikan hasil dalam bentuk array
       }

public function getFavoritByPengguna($id_pengguna)
{
    $this->db->select('favorit.created_at, seminar.judul, seminar.tanggal, seminar.waktu, seminar.kategori, seminar.id_seminar');
    $this->db->from('favorit');
    $this->db->join('seminar', 'favorit.id_seminar = seminar.id_seminar');
    $this->db->where('favorit.id_pengguna', $id_pengguna);
    $this->db->order_by('favorit.created_at', 'DESC');
    return $this->db->get()->result_array();
}


}