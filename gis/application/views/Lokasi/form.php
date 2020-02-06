<!-- load css leaflet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/src/leaflet.css">
<!-- load js leaflet -->
<script src="<?php echo base_url();?>assets/src/leaflet.js"></script>
<script>
var infoWindow;
window.onload = function()
{
//jika posisi wilayah desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
	var posisi = [-8.702195985385542,116.27208709716798];
	var zoom = 13;
	//Inisialisasi tampilan peta
	var petantb = L.map('ntbmap').setView(posisi, zoom);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data & copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        id: 'mapbox.streets'
    }).addTo(petantb);

 var marker = L.marker(posisi,{draggable: true}).addTo(petantb);
    marker.on('dragend', function (e) {
        document.getElementById('lat').value = marker.getLatLng().lat;
        document.getElementById('lng').value = marker.getLatLng().lng;
    });
};
    </script>
    <style>
    	body,html{
    		padding: 0;
    		margin: 0;
    	}
        #ntbmap{
            height: 350px;
        }
    </style>
</head>

<body>
<div id="ntbmap"></div>
<h1>Form Lokasi</h1>
<form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="idlokasi" value="<?php echo $idlokasi;?>"><br>
	nama : <input type="text" name="nama_lokasi" value="<?php echo $nama_lokasi;?>"><br>
	latitude : <input type="text" id="lat" name="latitude" value="<?php echo $latitude;?>"><br>
	longitude : <input type="text" id="lng" name="longitude" value="<?php echo $longitude;?>"><br>
	nama_kategori : <select name="idkategori">
					<option value="<?php echo $idkategori;?>"><?php echo $nama_kategori;?></option>

					<?php foreach ($datakategori as $baris) { ?>
					<option value="<?php echo $baris->idkategori;?>"><?php echo $baris->nama_kategori;?></option>
					<?php }  ?>

				</select><br>
	keterangan : <textarea name="keterangan"><?php echo $keterangan;?></textarea><br>
	<button type="submit"><?php echo $button;?></button>
</form>

</body>
</html>	
}
