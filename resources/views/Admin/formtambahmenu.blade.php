@include('templates/header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{ empty($menu) ? url('/Admin/Menu/Save') : url('/Admin/Menu/Ubah/'.$menu->id_menu) }}" method="POST">
    {{ csrf_field() }}
    <?php 
    //Method field yang digunakan adalah patch untuk melakukan update data
    ?>
    @if (!empty($menu))
        {{ method_field('patch') }}
    @endif
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
    @if(!empty($menu))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_menu" value="{{ $menu->nama_menu}}" >
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_menu"  >
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
    @if(!empty($menu))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deskripsi" value="{{ $menu->deskripsi}}" >
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deskripsi"  >
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Waktu Penyajian</label>
    @if(!empty($menu))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="waktu_penyajian" value="{{ $menu->waktu_penyajian}}" >
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="waktu_penyajian"  >
    @endif
  </div>
  @error('nama_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Harga menu</label>
    @if(!empty($menu))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga_menu" value="{{$menu->harga_menu}}">
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga_menu">
    @endif
  </div>
  @error('harga_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">kategori menu</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="kategori">
    <option>Pilih</option>
    @if(!empty($menu))
      @if($menu->kategori == "Makanan")
        <option value="Makanan" selected>Makanan</option>
        <option value="Minuman" >Minuman</option>    
      @endif
      @if($menu->kategori == "Minuman")
        <option value="Makanan" >Makanan</option>
        <option value="Minuman" selected>Minuman</option>    
      @endif
    @else
      <option value="Makanan" >Makanan</option>
      <option value="Minuman">Minuman</option>    
    @endif
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Status menu</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="status">
    <option>Pilih</option>
    @if(!empty($menu))
      @if($menu->status == "Tersedia")
        <option value="Tersedia" selected>Tersedia</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
      @endif
      @if($menu->status == "Tidak Tersedia")
        <option value="Tersedia">Tersedia</option>
        <option value="Tidak Tersedia" selected>Tidak Tersedia</option>
      @endif
    @else
      <option value="Tersedia" selected>Tersedia</option>
      <option value="Tidak Tersedia">Tidak Tersedia</option>
    @endif

    
    
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('templates/footer')
<script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>