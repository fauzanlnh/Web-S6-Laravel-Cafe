<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #20 : Eloquent Laravel</title>
</head>
<body>
 
<h1>Data Pegawai</h1>
<h3>www.malasngoding.com</h3>
 
<ul>
@foreach($pemesanan as $p)
		<li>{{ "ID Pemesanan : ". $p->id_pemesanan	 . ' | No Meja : ' . $p->no_meja . ' | Total Pembayaran : ' . $p->total_pembayaran}}</li>
	@endforeach
</ul>
 
</body>
</html>
