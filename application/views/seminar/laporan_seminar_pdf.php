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

<h3><center>Laporan Data Seminar</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 

				<th >ID Seminar</th>
                <th >Nama Seminar</th>
                <th >Kategori</th>
                <th >Tempat</th>
                <th >Tanggal</th>
                <th >Waktu</th>
                <th >Harga</th>
                <th >Narasumber</th> 

		</tr> 

	</thead> 

	<tbody>
		<?php $no = 1; foreach($seminar as $b): ?>
			<tr>
				
				<td><?= $b->id_seminar; ?></td>
				<td><?= $b->judul; ?></td>
				<td><?= $b->kategori; ?></td>
				<td><?= $b->lokasi; ?></td>
				<td><?= $b->tanggal; ?></td>
				<td><?= $b->waktu; ?></td>
				<td><?= $b->harga == 0 ? 'Free' : 'Rp ' . number_format($b->harga, 0, ',', '.') ?></td>
				<td><?= $b->narasumber; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table> 

<script type="text/javascript"> 

window.print();

</script> 

</body> 

</html>