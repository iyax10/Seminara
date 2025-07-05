<?php  

 header ("Content-type: application/x-msexcel");
 	header ("Content-Disposition: attachment; filename=$title.xls");
    header ("Pragma: no-cache");
    header ("expires: 0");

?>



<h3><center>Laporan Data Peserta Seminar</center></h3> 

<br/> 

<table class="table-data"> 

	<thead> 

		<tr> 

				<th >ID Transaksi</th>
                <th >Nama Seminar</th>
                <th >Nama Peserta</th>
                <th >Email Peserta</th>
                <th >No. Telp Peserta</th>
                <th >Status Transaksi</th>
                 

		</tr> 

	</thead> 

	 <tbody>
            <?php if (empty($transaksi)): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada peserta</td>
                </tr>
            <?php else: ?>
                <?php foreach ($transaksi as $item): ?>
                    <tr>
                        <td><?= $item->id_transaksi ?></td>
                        <td><?= htmlspecialchars($item->nama_seminar) ?></td>
                        <td><?= htmlspecialchars($item->nama_peserta) ?></td>
                        <td><?= htmlspecialchars($item->email_peserta) ?></td>
                        <td><?= htmlspecialchars($item->telp_peserta) ?></td>
                        <td><?= ucfirst($item->status) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>

</table> 

