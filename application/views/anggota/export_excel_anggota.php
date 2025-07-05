<?php  

 header ("Content-type: application/x-msexcel");
 	header ("Content-Disposition: attachment; filename=$title.xls");
    header ("Pragma: no-cache");
    header ("expires: 0");

?>



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
