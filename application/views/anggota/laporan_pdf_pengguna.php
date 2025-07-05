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

<h3><center>Laporan Data Seluruh Anggota</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 

			        <th>ID Pengguna</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Member Sejak</th>

		</tr> 

	</thead> 

	<tbody>
		<?php $no = 1; foreach($pengguna as $t): ?>
			<tr>
				
				<td><?= $t->id_pengguna; ?></td>
				<td><?= $t->nama; ?></td>
				<td><?= $t->email; ?></td>
				<td><?= $t->no_telp; ?></td>
				<td><?= date('Y-m-d H:i', strtotime($t->tanggal_lahir)) ?></td>
				<td><?= $t->status?? '-'; ?></td>
				<td><?= $t->created_at; ?></td>

			</tr>
		<?php endforeach; ?>
	</tbody>

</table> 

<script type="text/javascript"> 

window.print();

</script> 

</body> 

</html>