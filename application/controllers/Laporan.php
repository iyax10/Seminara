<?php 

defined('BASEPATH') or exit('No Direct script access allowed'); 

class Laporan extends CI_Controller 

{ 

	function __construct() 

	{ 

		parent::__construct(); 

		$this->load->model(['ModelPengguna', 'ModelSeminar', 'ModelTransaksi']); 
		$this->load->library('dompdf_gen'); 

	} 


	
//================================================= LAPORAN SEMINAR ====================================================
	


public function laporan_seminar_pdf() 

{ 
	$this->load->library('dompdf_gen');

   $data['seminar'] = $this->ModelSeminar->getAllSeminars();


$this->load->library('dompdf_gen');
$this->load->view('seminar/laporan_seminar_pdf.php', $data); $paper_size = 'A4'; // ukuran kertas 
$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
$this->dompdf->set_paper($paper_size, $orientation); 
//Convert to PDF 

$this->pdf->filename = "laporan_data_seminar.pdf";
//nama file pdf yang di hasilkan}
$this->dompdf->stream("laporan_data_seminar.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
}


public function export_excel() 

{ 

$data = array('title' => 'Laporan Seminar');
$data['seminar'] = $this->ModelSeminar->getAllSeminars();
$this->load->view('seminar/export_excel_seminar', $data);
}


//================================================= LAPORAN DETAIL PESERTA SEMINAR ====================================================
	
public function laporan_peserta_pdf($id_seminar) 

{ 
	$this->load->library('dompdf_gen');

            $data['transaksi'] = $this->ModelTransaksi->getTransaksiBySeminar($id_seminar);
        $data['seminar_id'] = $id_seminar;


$this->load->library('dompdf_gen');
$this->load->view('peserta/laporan_peserta_pdf.php', $data); $paper_size = 'A4'; // ukuran kertas 
$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
$this->dompdf->set_paper($paper_size, $orientation); 
//Convert to PDF 

$this->pdf->filename = "laporan_data_peserta.pdf";
//nama file pdf yang di hasilkan}
$this->dompdf->stream("laporan_data_peserta.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
}

public function export_excel_peserta() 

{ 

$data = array('title' => 'Daftar Peserta Seminar');
 $data['transaksi'] = $this->ModelTransaksi->getTransaksiBySeminar($id_seminar);
        $data['seminar_id'] = $id_seminar;
$this->load->view('seminar/export_excel_peserta', $data);
}

//================================================= LAPORAN TRANSAKSI ====================================================
	
	public function laporan_transaksi_pdf() 

{ 
	$this->load->library('dompdf_gen');

   $data['transaksi'] = $this->ModelTransaksi->getAllTransaksi();


$this->load->library('dompdf_gen');
$this->load->view('transaksi/laporan_transaksi_pdf.php', $data); $paper_size = 'A4'; // ukuran kertas 
$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
$this->dompdf->set_paper($paper_size, $orientation); 
//Convert to PDF 

$this->pdf->filename = "laporan_data_transaksi.pdf";
//nama file pdf yang di hasilkan}
$this->dompdf->stream("laporan_data_transaksi.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
}


public function export_excel_transaksi() 

{ 

$data = array('title' => 'Laporan Transaksi');
 $data['transaksi'] = $this->ModelTransaksi->getAllTransaksi();
$this->load->view('seminar/export_excel_transaksi', $data);
}


//================================================= LAPORAN PENGGUNA ====================================================

public function laporan_pengguna_pdf() 

{ 
	$this->load->library('dompdf_gen');

 $data['pengguna'] = $this->ModelPengguna->getAllPengguna();

$this->load->library('dompdf_gen');
$this->load->view('anggota/laporan_pdf_pengguna.php', $data); $paper_size = 'A4'; // ukuran kertas 
$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
$this->dompdf->set_paper($paper_size, $orientation); 
//Convert to PDF 

$this->pdf->filename = "laporan_data_pengguna.pdf";
//nama file pdf yang di hasilkan}
$this->dompdf->stream("laporan_data_pengguna.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
}


public function export_excel_pengguna() 

{ 

$data = array('title' => 'Laporan Data Pengguna');
 $data['pengguna'] = $this->ModelPengguna->getAllPengguna();
$this->load->view('seminar/export_excel_pengguna', $data);
}



 }



