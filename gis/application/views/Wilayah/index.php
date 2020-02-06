<h1>TABEL WILAYAH</h1>

<table>
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Wilayah</th>
		<th>Wilayah</th>
		<th>Data Wilayah</th>
		<th>Keterangan</th>
		<th><a href="<?php echo base_url();?>index.php/wilayah/add">Tambah</a></th>
	</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($wilayah as $baris) {?>
				
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $baris->namawilayah;?></td>
			<td><?php echo $baris->wilayah;?></td>
			<td><json src="<?php echo base_url();?>assets/upload/
			<?php echo $baris->json;?></td>
			<td><?php echo $baris->keterangan;?></td>
			
			<td>
				<a href="#">Ubah</a>
				<a href="<?php echo base_url();?>index.php/wilayah/delete/<?php echo $baris->idwilayah;?>"onclick=" return confirm('anda yakin untuk menghapus?')">Hapus</a>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>