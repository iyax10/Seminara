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

<h3><center>Laporan Data Buku Peserta Seminar</center></h3> 

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

<script type="text/javascript"> 

window.print();

</script> 

</body> 

</html>