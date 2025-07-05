<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUlasan extends CI_Model {

     public function countUlasan() {
        return $this->db->count_all('review');
    }

    public function getLatestReviews($limit = 5) {
        $this->db->select('review.*, pengguna.nama as nama_pengguna, seminar.judul as judul_seminar');
        $this->db->from('review');
        $this->db->join('pengguna', 'review.id_pengguna = pengguna.id_pengguna');
        $this->db->join('seminar', 'review.id_seminar = seminar.id_seminar');
        $this->db->order_by('review.created_at', 'DESC');
        return $this->db->get('', $limit)->result();
    }

    public function getAllReviews() {
        $this->db->select('r.id_review, r.rating, r.komentar, r.created_at, s.judul AS seminar, p.nama AS pengguna');
        $this->db->from('review r');
        $this->db->join('seminar s', 'r.id_seminar = s.id_seminar');
        $this->db->join('pengguna p', 'r.id_pengguna = p.id_pengguna');
        return $this->db->get()->result();
    }


    public function tambahUlasan($data) {
        return $this->db->insert('review', $data);
    }

      public function getAllUlasan()
    {
        $this->db->select('review.*, pengguna.nama as nama_pengguna, seminar.judul as judul_seminar');
        $this->db->from('review');
        $this->db->join('pengguna', 'pengguna.id_pengguna = review.id_pengguna');
        $this->db->join('seminar', 'seminar.id_seminar = review.id_seminar');
        $this->db->order_by('review.created_at', 'DESC');
        return $this->db->get()->result();
    }


    // Mengambil ulasan berdasarkan ID
    // public function getReviewById($id_review) {
    //     return $this->db->get_where('review', ['id_review' => $id_review])->row();
    // }
    // // Insert ulasan baru
    // public function insertReview($data) {
    //     return $this->db->insert('review', $data);
    // }
    // // Update ulasan
    // public function updateReview($id_review, $data) {
    //     $this->db->where('id_review', $id_review);
    //     return $this->db->update('review', $data);
    // }
    // // Delete ulasan
    // public function deleteReview($id_review) {
    //     $this->db->where('id_review', $id_review);
    //     return $this->db->delete('review');
    // }
}