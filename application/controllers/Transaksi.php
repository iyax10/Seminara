<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct() {
        parent::__construct();
           $this->load->model('ModelPengguna');
        $this->load->model('ModelSeminar');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelUlasan');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
    }

// ================================================ WILAYAH ADMIN ====================================================

  public function detailpeserta($id_seminar) {
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiBySeminar($id_seminar);
        $data['seminar_id'] = $id_seminar;
        $this->load->view('admin/detail_pesertaseminar', $data);
    }


     public function index() {
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->getAllTransaksi();
        $this->load->view('admin/data_transaksi', $data);
    }
    public function konfirmasi($id_transaksi) {
        $this->ModelTransaksi->updateStatus($id_transaksi, 'berhasil');
        $this->session->set_flashdata('success', 'Status transaksi berhasil diperbarui.');
        redirect('transaksi');
    }
 
//==================================================== WILAYAH PENGGUNA ==============================================

 public function pembayaran_one($id_seminar) {
    // Ambil data seminar berdasarkan ID
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['seminar'] = $this->ModelSeminar->infoSeminar($id_seminar); // Ambil data seminar

    $this->load->view('member/pembayaran_one', $data); // Ganti dengan nama view Anda
}


 private function generateIdTransaksi() {
        // Format tanggal (YYYYMMDD)
        $tanggal = date('Ymd');
        // Hitung jumlah tiket berhasil untuk kategori dan tanggal yang sama
        $this->db->select('COUNT(*) as total');
        $this->db->from('transaksi');
        $this->db->where('DATE(tanggal_transaksi)', date('Y-m-d'));
        $query = $this->db->get()->row();
        $nomor_urut = $query ? intval($query->total) + 1 : 1;
        // Format nomor urut jadi 7 digit dengan leading zeros
        $nomor_urut_pad = str_pad($nomor_urut, 7, '0', STR_PAD_LEFT);
        // Menghasilkan ID transaksi final
        return 'QSM-' . $tanggal . '-' . $nomor_urut_pad;
    }

public function buat_transaksi()
{
    // Pastikan user sudah login
    if (!$this->session->userdata('id_pengguna')) {
        redirect('jadwal');
    }

    // Ambil data dari input form
    $id_seminar   = $this->input->post('id_seminar');
    $id_pengguna  = $this->session->userdata('id_pengguna');

    // Ambil harga seminar dari model (bisa juga dari hidden input, tapi lebih aman dari DB)
    $seminar = $this->ModelSeminar->infoSeminar($id_seminar);
    $harga_tiket = $seminar['harga'];
    $biaya_admin = 5000;
    $total_bayar = $harga_tiket + $biaya_admin;

    // Buat kode transaksi unik
    $id_transaksi = $this->generateIdTransaksi();

    // Siapkan data transaksi
    $data = array(
        'id_transaksi'       => $id_transaksi,
        'id_pengguna'        => $id_pengguna,
        'id_seminar'         => $id_seminar,
        'tanggal_transaksi'  => date('Y-m-d H:i:s'),
        'nom_bayar'          => $total_bayar,
        'status'             => 'pending',
        'kode_tiket'         => null,
        'created_at'         => date('Y-m-d H:i:s')
    );

    // Simpan ke database
    $this->ModelTransaksi->simpanTransaksi($data);

    // Redirect ke halaman pembayaran
    redirect('transaksi/pembayaran_two/' . $id_transaksi);
}



public function pembayaran_two($id_transaksi)
    {
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiById($id_transaksi);
        $data['seminar'] = $this->ModelSeminar->infoSeminar($data['transaksi']['id_seminar']);
        $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('member/pembayaran_two', $data);
    }

    public function batal_otomatis($id_transaksi)
{
    $trx = $this->ModelTransaksi->getTransaksiById($id_transaksi);

    if ($trx && $trx['status'] == 'pending') {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', ['status' => 'dibatalkan']);
    }

    echo "ok";
}


public function cek_status()
{
    $id_transaksi = $this->input->post('id_transaksi');

    // Ambil data transaksi dari database
    $transaksi = $this->ModelTransaksi->getTransaksiById($id_transaksi);

    if ($transaksi) {
        if ($transaksi['status'] === 'berhasil') {
            // Jika status berhasil, redirect ke halaman pembayaran_fx
            redirect('transaksi/pembayaran_fx/' . $id_transaksi);
        } else {
            // Jika belum berhasil, tetap di pembayaran_two
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Status belum berhasil. Silakan cek kembali.</div>');
            redirect('transaksi/pembayaran_two/' . $id_transaksi);
        }
    } else {
        // Jika transaksi tidak ditemukan
        show_404();
    }
}

public function update_status($id_transaksi)
{
    $this->load->model('ModelTransaksi');
    $update = $this->ModelTransaksi->updateStatusTransaksiBerhasil($id_transaksi);

    if ($update) {
        // Pastikan status benar-benar berubah jadi "berhasil"
        $transaksi = $this->ModelTransaksi->getTransaksiById($id_transaksi);
        if ($transaksi && $transaksi['status'] === 'berhasil') {
            // Redirect hanya jika status memang berhasil
            redirect('transaksi/pembayaran_fx/' . $id_transaksi);
        } else {
            $this->session->set_flashdata('error', 'Status belum berhasil. Silakan coba lagi nanti.');
            redirect('transaksi/pembayaran_two/' . $id_transaksi);
        }
    } else {
        $this->session->set_flashdata('error', 'Gagal memperbarui status.');
        redirect('transaksi/pembayaran_two/' . $id_transaksi);
    }
}



public function pembayaran_fx($id_transaksi)
{
    $data['user'] = $this->ModelPengguna->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['transaksi'] = $this->ModelTransaksi->getTransaksiById($id_transaksi);
    $data['seminar'] = $this->ModelSeminar->getSeminarById($data['transaksi']['id_seminar']);

    // Validasi jika status belum berhasil, jangan lanjut
    if ($data['transaksi']['status'] !== 'berhasil') {
        redirect('transaksi/pembayaran_two/' . $id_transaksi);
    }

    $this->load->view('member/pembayaran_fx', $data);
}



        

}
