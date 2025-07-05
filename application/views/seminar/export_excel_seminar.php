<?php  

 header ("Content-type: application/x-msexcel");
 	header ("Content-Disposition: attachment; filename=$title.xls");
    header ("Pragma: no-cache");
    header ("expires: 0");

?>



<h3><center>Laporan Data Seminar</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 

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

