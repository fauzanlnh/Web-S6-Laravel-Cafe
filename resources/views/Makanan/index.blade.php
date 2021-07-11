<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #20 : Eloquent Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
 
<h1>Data Pegawai</h1>
<h3>www.malasngoding.com</h3>

<ul>
	@foreach($menu as $p)
		<li>{{ "Nama : ". $p->nama_menu	 . ' | Harga : ' . $p->harga_menu . ' | Kategori : ' . $p->kategori}}</li>
		<a href="{{ url('/Admin/Menu/Ubah/$p->id_menu')}}">Edit</a>
		<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/Admin/Menu/Delete/$p->id_menu') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
	@endforeach
</ul>
<?php
$mytime = Carbon\Carbon::now();
		echo $mytime->toDateTimeString();
		?>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
</body>

</html>