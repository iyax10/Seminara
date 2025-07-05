<!DOCTYPE html> 



<html> 

<head> 

	<title></title> 

</head> 

<body> 

	<style type="text/css"> 

	.table-data{ 

width: 100%; 

border-collapse: collapse; 

} 

.table-data tr th, 

.table-data tr td

{ 

border:1px solid black; 

font-size: 11pt; 

font-family:Verdana; 

padding: 10px 10px 10px 10px; 

} 

h3

{ 

font-family:Verdana;

 } 

</style> 

<h3><center>Laporan Data Seluruh Transaksi</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 

				<th >ID Transaksi</th>
              <th >Nama Pengguna</th>
              <th >Email Pengguna</th>
              <th >No. Tlp</th>
              <th >Seminar</th>
              <th >Tanggal Beli</th>
              <th >Harga</th>
              <th >Status</th>
              <th >Kode Tiket</th>

		</tr> 

	</thead> 

	<tbody>
		<?php $no = 1; foreach($transaksi as $t): ?>
			<tr>
				
				<td><?= $t->id_transaksi; ?></td>
				<td><?= $t->nama_pengguna; ?></td>
				<td><?= $t->email_pengguna; ?></td>
				<td><?= $t->tlp_pengguna; ?></td>
				<td><?= $t->judul_seminar; ?></td>
				<td><?= date('Y-m-d H:i', strtotime($t->tanggal_transaksi)) ?></td>
				<td><?= $t->harga == 0 ? 'Free' : 'Rp ' . number_format($t->harga, 0, ',', '.') ?></td>
				<td><?= $t->status; ?></td>
				<td><?= $t->status == 'berhasil' ? $t->kode_tiket : 'Belum ada kode tiket' ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table> 

<script type="text/javascript"> 

window.print();

</script> 

</body> 

</html>