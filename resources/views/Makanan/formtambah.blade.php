<form action="{{ empty($menu) ? url('/Admin/Menu/Save') : url("/Admin/Menu/Ubah/$menu->id_menu") }}" method="POST">
    {{ csrf_field() }}
    <?php 
    //Method field yang digunakan adalah patch untuk melakukan update data
    ?>
    @if (!empty($menu))
        {{ method_field('patch') }}
    @endif
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_menu"value="{{ $menu->nama_menu}}" >
  </div>
  @error('nama_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
 @enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Harga menu</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga_menu" value="{{ $menu->harga_menu}}">
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
    @if($menu->kategori == "Makanan")
        <option value="Makanan" selected>Makanan</option>
        <option value="Minuman" >Minuman</option>    
    @endif
    @if($menu->kategori == "Minuman")
        <option value="Makanan" >Makanan</option>
        <option value="Minuman" selected>Minuman</option>    
    @endif
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Status menu</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="status">
    <option>Pilih</option>
    @if($menu->status == "Tersedia")
        <option value="Tersedia" selected>Tersedia</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
    @endif
    @if($menu->status == "Tidak Tersedia")
        <option value="Tersedia">Tersedia</option>
        <option value="Tidak Tersedia" selected>Tidak Tersedia</option>
    @endif
    
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>