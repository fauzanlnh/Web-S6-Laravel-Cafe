<form action="{{ url('/Tamu/Pemesanan/Save')  }}" method="POST">
    {{ csrf_field() }}
  
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">No Pemesanan</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_pemesanan" value="{{ $a[0]->id_pemesanan}}" disabled>
    </div>  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No Meja</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="no_meja">
      
      @for ($i = 1; $i <= 10; $i++)
      @if($a[0]->no_meja == $i)
        <option value="{{ $i }}" selected>{{ $i }}</option>
      @else
        <option value="{{ $i }}" >{{ $i }}</option>
      @endif
      
    @endfor
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Pindah Meja</button>
  
</form>

<?php
        var_dump($a);
        echo"tes";
      ?>
@foreach ($list_makanan as $item)
      <table>
        <tr>
          {{ $item->nama_menu }}
          <form action="{{ url('/Tamu/DetailPemesanan/Save')  }}" method="POST">
          <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_meja" value="{{ $a[0]->no_meja}}" >
          <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_pemesanan" value="{{ $a[0]->id_pemesanan}}" >
            {{ csrf_field() }}  
            <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_menu" value=" {{ $item->id_menu }}" ></td>
            <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_pesan"></td>
            <td><button type="submit" class="btn btn-primary">Tambah</button></td>
          </form>
        </tr>
      </table>
@endforeach
@foreach ($list_minuman as $item)
<table>
  <tr>
    {{ $item->nama_menu }}
    <form action="{{ url('/Tamu/DetailPemesanan/Save')  }}" method="POST">
    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_meja" value="{{ $a[0]->no_meja}}" >
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_pemesanan" value="{{ $a[0]->id_pemesanan}}" >
      {{ csrf_field() }}  
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_menu" value=" {{ $item->id_menu }}" ></td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_pesan"></td>
      <td><button type="submit" class="btn btn-primary">Tambah</button></td>
    </form>
  </tr>
</table>
@endforeach

