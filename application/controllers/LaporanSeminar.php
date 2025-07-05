<?php

namespace App\Controllers;

use App\Models\ModelTransaksi; // Pastikan untuk menggunakan model yang sesuai
use CodeIgniter\Controller;

class LaporanController extends Controller
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function downloadPDF()
    {
        // Ambil data transaksi
        $transaksi = $this->transaksiModel->findAll();

        // Load library PDF (misalnya, dompdf)
        $dompdf = new \Dompdf\Dompdf();
        $html = view('laporan_pdf', ['transaksi' => $transaksi]); // Buat view untuk PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan_transaksi.pdf', ['Attachment' => true]);
    }

    public function downloadExcel()
    {
        // Ambil data transaksi
        $transaksi = $this->transaksiModel->findAll();

        // Load library Excel (misalnya, PhpSpreadsheet)
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'ID Transaksi');
        $sheet->setCellValue('B1', 'Nama Pengguna');
        $sheet->setCellValue('C1', 'Email Pengguna');
        $sheet->setCellValue('D1', 'No. Tlp');
        $sheet->setCellValue('E1', 'Seminar');
        $sheet->setCellValue('F1', 'Tanggal Beli');
        $sheet->setCellValue('G1', 'Harga');
        $sheet->setCellValue('H1', 'Status');
        $sheet->setCellValue('I1', 'Kode Tiket');

        // Isi data
        $row = 2;
        foreach ($transaksi as $item) {
            $sheet->setCellValue('A' . $row, $item->id_transaksi);
            $sheet->setCellValue('B' . $row, $item->nama_pengguna);
            $sheet->setCellValue('C' . $row, $item->email_pengguna);
            $sheet->setCellValue('D' . $row, $item->tlp_pengguna);
            $sheet->setCellValue('E' . $row, $item->judul_seminar);
            $sheet->setCellValue('F' . $row, date('Y-m-d H:i', strtotime($item->tanggal_transaksi)));
            $sheet->setCellValue('G' . $row, number_format($item->harga, 2));
            $sheet->setCellValue('H' . $row, ucfirst($item->status));
            $sheet->setCellValue('I' . $row, $item->status == 'berhasil' ? $item->kode_tiket : 'Belum ada kode tiket');
            $row++;
        }

        // Buat file Excel
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'laporan_transaksi.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $writer->save('php://output');
    }
}
