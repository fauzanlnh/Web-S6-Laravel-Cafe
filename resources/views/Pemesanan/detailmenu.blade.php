<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
    <script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script>
</head>

<body>
    <div class="main m-auto h-screen p-4">
        <div class="flex flex-col">
            <!-- header -->
            <div class="header flex justify-between">
                <div class="icon">
                    <img src="{{ asset('asset/img/coffee 2.png') }}" alt="">
                </div>
                <div class="cart__counter keranjang flex">
                    <img src="{{ asset('asset/img/cart-add 1.svg') }}" alt="" height="15" width="15" class="mr-1">
                    Keranjang
                </div>
            </div>
            <!-- item -->
            <div class="item-main flex justify-between">
                <div class="text mt-5">
                    <div class="text-1 font-bold">Hayyu Coffe</div>
                    <div class="text-2">Punclut Lembang</div>
                </div>
                <div class="img">
                    <img src="{{ asset('asset/img/97f91f634de04058a299 1.png')}}" alt="">
                </div>
            </div>
            <!-- detail menu -->
            <div class="kategori ml-4 mt-1">
                Detail Menu
            </div>
            <div class="detail-menu flex justify-between">
                <div class="jenis">
                    <img src="{{ asset('asset/img/coffee 3.svg')}}" alt="">
                </div>
                <div class="detail-gambar">
                    <img src="{{ asset('asset/img/sensasi-ngopi-di-sinia-coffe 2.png')}}" alt="">
                    <div class="tag-line mt-2 w-max ml-auto">
                        Cocok buat senja
                    </div>
                </div>
            </div>
            <div class="kategori ml-4 mt-1">
                Deskripsi
            </div>
            <div class="deskripsi-makanan   ">
                {{ $detail_menu->deskripsi}}
            </div>
            <div class="deskrpisi-pesanan flex ">
                <div class=" waktu-pesan">{{ $detail_menu->waktu_penyajian }} Menit</div>
            <div class="harga-pesan">{{ $detail_menu->harga_menu }}</div>
        </div>
        <form action="{{ url('/Tamu/Order/Save')  }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$a[0]->no_meja}}" name="no_meja">
                    <input type="hidden" value="{{$a[0]->id_pemesanan}}" name="id_pemesanan">
                    <input type="hidden" value="{{$detail_menu->id_menu}}" name="id_menu">
                <div class="pesan">
                    <button type="submit" class="pesan">Tambah ke keranjang +</button>
                </div>
        </form>
    </div>
</body>
</html>