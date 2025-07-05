<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

      public function cekData($where = null)
    {
        return $this->db->get_where('pengguna', $where);
    }

    public function simpanData($data = null)
    {
        return $this->db->insert('pengguna', $data);
    }

    public function getUserByEmail($email)
{
    return $this->db->get_where('pengguna', ['email' => $email])->row(); // Mengambil satu baris data pengguna berdasarkan email
}

// ================================== jumlah pengguna di portal admin ==============
    public function countPengguna() {
    $this->db->where('role', 2);
    return $this->db->count_all_results('pengguna');
}

   public function getAllPengguna() {
     $this->db->where('role', 2);
        return $this->db->get('pengguna')->result();
    }
public function searchPengguna($query) {
    $this->db->where('role', 2);
    $this->db->group_start();
        $this->db->like('nama', $query);
        $this->db->or_like('email', $query);
    $this->db->group_end();
    return $this->db->get('pengguna')->result();
}

// ================================== /jumlah pengguna di portal admin ==============

//============================ login admin =============================
     public function login($email, $password) {
        // Mengambil pengguna dari database
        $this->db->where('email', $email); // Menambahkan kondisi WHERE untuk mencocokkan email dengan input pengguna
        $query = $this->db->get('pengguna'); // Mengambil data dari tabel 'tbadmin' berdasarkan kondisi yang telah ditentukan

        if ($query->num_rows() == 1) {
            $user = $query->row();
            // Memverifikasi password (diasumsikan disimpan dalam teks biasa, yang tidak disarankan)
            if ($user->password === $password) {
                return $user; // Mengembalikan data pengguna jika login berhasil
            }
        }
        return false; // Mengembalikan false jika login gagal
    }
//============================/login admin =============================

//========================================LOGIN & REGIST UNTUK NON ADMIN===========================================================
    public function registrasi($data) {
        return $this->db->insert('pengguna', $data);
    }
    public function loginUser($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
//========================================/LOGIN & REGIST UNTUK NON ADMIN===========================================================
}


  public function getPenggunaById($id_pengguna)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
    }

}