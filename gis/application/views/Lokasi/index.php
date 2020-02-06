<h1>Lokasi</h1>

<table>
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Lokasi</th>
		<th>Kategori</th>
        <th>Latitude</th>
        <th>Longitude</th>
		<th>Keterangan</th>
		<th><a href="<?php echo base_url();?>index.php/lokasi/add">Tambah</a></th>
	</tr>
	</thead>
	<tbody>
    <?php $no = 1;
            foreach ($lokasi as $lok) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $lok->nama_lokasi; ?></td>
                    <td><?= $lok->kategori; ?></td>
                    <td><?= $lok->latitude; ?></td>
                    <td><?= $lok->longitude; ?></td>
                    <td><?= $lok->keterangan; ?></td>
                    <td>
                        <a href="<?= base_url('/lokasi/update/') . $lok->idlokasi; ?>">ubah</a>
                        <a href="<?= base_url('/lokasi/delete/') . $lok->idlokasi; ?>" onclick="return confirm('Anda Yakin Untuk Menghapus?');">hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>