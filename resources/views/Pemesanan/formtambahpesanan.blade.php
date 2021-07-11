<form action="{{ url('/Tamu/Pemesanan/Save')  }}" method="POST">
    {{ csrf_field() }}
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No Meja</label>
    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="no_meja">
    @for ($i = 1; $i <= 10; $i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

    
  <?php
/*var_dump($menu)
@foreach ($list_makanan as $item)
    <li>{{ $item->nama_menu }}
@endforeach
@foreach ($list_minuman as $item)
    <li>{{ $item->nama_menu }}
@endforeach*/
  ?>