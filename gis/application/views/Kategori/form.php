<h1>Form Kategori</h1>
<form action="<?php echo base_url();?>index.php/kategori/addsave" method="POST" enctype="multipart/form-data">
	idkategori : <input type="hidden" name="idkategori" value="<?php echo $idkategori;?>"><br>
	Nama : <input type="text" name="nama_kategori" value="<?php echo $nama_kategori;?>"><br>
	Icon : <input type="file" name="icon" value="<?php echo $icon;?>"><br>
	Keterangan : <textarea name="keterangan"><?php echo $keterangan;?></textarea>
	<button type="submit" >Simpan</button>
</form>