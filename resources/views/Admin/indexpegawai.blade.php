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
              
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>No Telp Pegawai</th>
                    <th>Alamat Pegawai</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pegawai as $p)
                  <tr>
                    <td style="width:20%;">{{$p->kd_pegawai}}</td>
                    <td style="width:20%;">{{$p->nama_pegawai}}</td>
                    <td style="width:20%;">{{$p->notlp_pegawai}}</td>
                    <td style="width:20%;">{{$p->almt_pegawai}}</td>
                    <td style="width:20%; text-align:center;">
                        <a class="btn btn-warning"href="{{ url('/Admin/Pegawai/Ubah/'.$p->kd_pegawai)}}"><i value="Edit">Ubah</a>
                        <a value='delete'>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/Admin/Pegawai/Delete/'.$p->kd_pegawai) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i value="Delete">Hapus</button>
                            </form>
                        </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>No Telp Pegawai</th>
                    <th>Alamat Pegawai</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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