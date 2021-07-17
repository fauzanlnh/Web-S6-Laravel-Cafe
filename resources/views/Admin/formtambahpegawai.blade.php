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
              <form action="{{ empty($pegawai) ? url('/Admin/Pegawai/Save') : url('/Admin/Pegawai/Ubah/'.$pegawai[0]->kd_pegawai) }}" method="POST">
    {{ csrf_field() }}
    <?php 
    //Method field yang digunakan adalah patch untuk melakukan update data
    ?>
    @if (!empty($pegawai))
        {{ method_field('patch') }}
    @endif
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
    @if(!empty($pegawai))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_pegawai" value="{{ $pegawai[0]->nama_pegawai}}" >
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_pegawai">
    @endif
  </div>
  @error('nama_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No Telp Pegawai</label>
    @if(!empty($pegawai))
      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="notlp_pegawai" value="{{ $pegawai[0]->notlp_pegawai}}" maxlength="15">
    @else
      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="notlp_pegawai" maxlength="15">
    @endif
    
  </div>
  @error('notlp_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Alamat Pegawai</label>
    @if(!empty($pegawai))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="almt_pegawai" value="{{ $pegawai[0]->almt_pegawai}}">
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="almt_pegawai">
    @endif
  </div>
  @error('almt_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Kode Pengguna</label>
    @if(!empty($pegawai))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kd_pengguna" value="{{ $pegawai[0]->kd_penguna}}" readonly>
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kd_pengguna" value="{{$ld_baru}}" readonly>
    @endif
    
  </div>
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Username</label>
    @if(!empty($pegawai))
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="{{ $pegawai[0]->username}}">
    @else
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="">
    @endif
    
  </div>
  @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Hak Akses</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="hak_akses">
    <option value="">Pilih</option>
    @if(!empty($pegawai[0]))
      @if($pegawai[0]->hak_akses == "Admin")
        <option value="Admin"  selected>Admin</option>
        <option value="Koki">Koki</option>    
        <option value="Petugas">Petugas</option>    
      @endif
      @if($pegawai[0]->hak_akses == "Koki")
        <option value="Admin" >Admin</option>
        <option value="Koki" selected>Koki</option>    
        <option value="Petugas">Petugas</option>    
      @endif
      @if($pegawai[0]->hak_akses == "Petugas")
        <option value="Admin" >Admin</option>
        <option value="Koki">Koki</option>    
        <option value="Petugas" selected>Petugas</option>    
      @endif
    @else
      <option value="Admin" >Admin</option>
      <option value="Koki">Koki</option>    
      <option value="Petugas">Petugas</option>    
    @endif
  </select>
  </div>
  @error('hak_akses')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
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