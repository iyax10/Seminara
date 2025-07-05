<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model {

     public function countTransaksi() {
        return $this->db->count_all('transaksi');
    }

    public function getLatestTransactions($limit = 5) {
        $this->db->select('transaksi.*, pengguna.nama as nama_pengguna, seminar.judul as judul_seminar');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'transaksi.id_pengguna = pengguna.id_pengguna');
        $this->db->join('seminar', 'transaksi.id_seminar = seminar.id_seminar');
        $this->db->order_by('transaksi.created_at', 'DESC');
        return $this->db->get('', $limit)->result();
    }

     public function getTransaksiBySeminar($id_seminar) {
        $this->db->select('transaksi.id_transaksi, seminar.judul as nama_seminar, pengguna.nama as nama_peserta, pengguna.email as email_peserta, pengguna.no_telp as telp_peserta, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('seminar', 'transaksi.id_seminar = seminar.id_seminar');
        $this->db->join('pengguna', 'transaksi.id_pengguna = pengguna.id_pengguna');
        $this->db->where('transaksi.id_seminar', $id_seminar);
        return $this->db->get()->result();
    }

        public function getAllTransaksi() {
    $this->db->select('t.*, p.nama as nama_pengguna, p.email as email_pengguna, p.no_telp as tlp_pengguna,s.judul as judul_seminar, s.kategori, s.harga');
    $this->db->from('transaksi t');
    $this->db->join('pengguna p', 't.id_pengguna = p.id_pengguna');
    $this->db->join('seminar s', 't.id_seminar = s.id_seminar');
    return $this->db->get()->result();
}

    public function updateStatus($id_transaksi, $status) {
        // Ambil data transaksi berdasarkan ID
        $transaksi = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row();
        if (!$transaksi) {
            return false;
        }
        // Jika status diubah menjadi 'berhasil', buat kode tiket hanya untuk transaksi ini
        if ($status === 'berhasil') {
            $kode_tiket = $this->generateKodeTiket($transaksi->id_seminar, $transaksi->tanggal_transaksi, $id_transaksi);
            $data = [
                'status' => $status,
                'kode_tiket' => $kode_tiket
            ];
        } else {
            $data = ['status' => $status];
        }
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', $data);
    }

public function updateStatusTransaksiBerhasil($id_transaksi)
{
    // Ambil transaksi untuk informasi id_seminar dan tanggal
    $transaksi = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    if (!$transaksi) return false;

    // Generate kode tiket baru
    $kode_tiket = $this->generateKodeTiket($transaksi['id_seminar'], $transaksi['tanggal_transaksi'], $id_transaksi);

    // Update status + kode tiket
    $data = [
        'status' => 'berhasil',
        'kode_tiket' => $kode_tiket,
        'tanggal_transaksi' => date('Y-m-d H:i:s')
    ];

    $this->db->where('id_transaksi', $id_transaksi);
    return $this->db->update('transaksi', $data);
}



// Fungsi untuk menghasilkan kode tiket
private function generateKodeTiket($id_seminar, $tanggal_transaksi, $id_transaksi) {
        // Ambil kategori seminar
        $kategori_data = $this->db->select('kategori')
                                  ->from('seminar')
                                  ->where('id_seminar', $id_seminar)
                                  ->get()
                                  ->row();
        if (!$kategori_data) {
            return null; // atau return kode default
        }
        $kategori = $kategori_data->kategori;
        // Kode kategori
        $kode_kategori_map = [
            'Finansial' => 'FIN',
            'Teknologi' => 'TEK',
            'Pendidikan' => 'PEN',
            'Komunikasi' => 'KOM',
            'Bisnis' => 'BIS'
        ];
        $kode_kategori = isset($kode_kategori_map[$kategori]) ? $kode_kategori_map[$kategori] : 'UNK';
        // Format tanggal (YYYYMMDD)
        $tanggal = date('Ymd', strtotime($tanggal_transaksi));
        // Hitung jumlah tiket berhasil untuk kategori dan tanggal yang sama, tapi exclude transaksi ini sendiri
        $this->db->select('COUNT(*) as total');
        $this->db->from('transaksi t');
        $this->db->join('seminar s', 't.id_seminar = s.id_seminar');
        $this->db->where('t.status', 'berhasil');
        $this->db->where('s.kategori', $kategori);
        $this->db->where('DATE(t.tanggal_transaksi)', date('Y-m-d', strtotime($tanggal_transaksi)));
        $this->db->where('t.id_transaksi !=', $id_transaksi); // exclude transaksi sendiri
        $query = $this->db->get()->row();
        $nomor_urut = $query ? intval($query->total) + 1 : 1;
        // Format nomor urut jadi 4 digit dengan leading zeros
        $nomor_urut_pad = str_pad($nomor_urut, 4, '0', STR_PAD_LEFT);
        // Menghasilkan kode tiket final
        return $kode_kategori . '-' . $tanggal . '-' . $nomor_urut_pad;
    }

    public function simpanTransaksi($data) {
        return $this->db->insert('transaksi', $data); // Pastikan ini berhasil
    }
    public function getTransaksiById($id_transaksi) {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    }
//=============================================pengguna riwayat transaksi=========================================
public function getTransaksiByPengguna($id_pengguna)
{
    $this->db->select('transaksi.*, seminar.judul, seminar.harga');
    $this->db->from('transaksi');
    $this->db->join('seminar', 'seminar.id_seminar = transaksi.id_seminar');
    $this->db->where('transaksi.id_pengguna', $id_pengguna);
    $this->db->order_by('transaksi.created_at', 'DESC'); // opsional, urutkan terbaru

    return $this->db->get();
}

public function getTransaksiByPenggunaStatus($id_pengguna, $status)
{
    $this->db->select('transaksi.*, seminar.judul, seminar.harga');
    $this->db->from('transaksi');
    $this->db->join('seminar', 'seminar.id_seminar = transaksi.id_seminar');
    $this->db->where('transaksi.id_pengguna', $id_pengguna);
    $this->db->where('transaksi.status', $status);
    return $this->db->get();
}




}