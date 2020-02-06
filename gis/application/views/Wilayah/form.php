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

<h1>Form Wilayah</h1>
<form action="<?php echo base_url();?>index.php/wilayah/addsave" method="POST" enctype="multipart/form-data">
	idwilayah : <input type="hidden" name="idwilayah" value="<?php echo $idwilayah;?>"><br>
	Nama Wilayah : <input type="text" name="namawilayah" value="<?php echo $namawilayah;?>"><br>
	Wilayah : <input type="text" name="wilayah" value="<?php echo $wilayah;?>"><br>
	Data Wilayah : <input type="file" name="js" value="<?php;?>" <br>
	Keterangan : <textarea name="keterangan"><?php echo $keterangan;?></textarea>
	<button type="submit" >Simpan</button>
</form>

</body>
</html> 
}
