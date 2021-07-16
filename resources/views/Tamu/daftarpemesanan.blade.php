<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/tailwind.css') }}">
</head>

<body>
    <div class="main m-auto h-screen p-4">
        <div id="myModal" class="modal">
            <div class="modal-content mx-auto flex flex-col">
                <span id="close" class="text-right font-bold tutup">&times;</span>
                <p class="isi-modal overflow-auto h-10">List Pesanan</p>
                <?php $total=0;
                ?>
                @foreach ($b as $item)
                    <?php
                        $subtotal = $item->harga_menu * $item->jumlah_pesan;
                        $total=$total+$subtotal;
                    ?>
                    <div class="cart flex justify-evenly mb-3">
                        <div class='ml-4'>
                            <div class='text-white font-bold '>{{$item->nama_menu}}</div>
                            <div class='text-white text-sm mt-2'> Sub Jumlah : {{$item->jumlah_pesan}}</div>
                            <div class='text-white text-sm'> Sub Total: {{$subtotal}}</div>
                        </div>              
                        <div class=' flex flex-col justify-around' >
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/Tamu/'.$a[0]->no_meja.'/Detail_Pesanan/Delete/'.$item->id_detail) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class='hapus text-white mt-1' type="submit">x</button>
                            </form>
                        </div>
                    </div>
                    
                @endforeach
                <p class="total text-sm mt-2"> Rp.{{$total}}</p>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/Tamu/'.$a[0]->no_meja.'/Pesanan/Order/') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class='checkout font-3xl h-full font-bold' type="submit"> Pesan </button>
                </form>
            </div>
        </div>
        <div class="flex flex-col">
            <!-- header -->
            <div class="header flex">
                <div class="icon">
                <img src="{{ asset('asset/img/coffee 2.png') }}" alt="">
                </div>
                <a href="{{ url('/Tamu/'.$a[0]->no_meja.'/DaftarPesanan') }}">
                    <div class="checkout flex ml-32">
                        <img src="{{ asset('asset/img/Frame.svg') }}" alt="" height="15" width="15" class="mr-1">
                        Pesanan
                    </div>
                </a>
                <div class="keranjang flex ml-2" id="keranjang">
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
            <div class="code text-3xl text-center w-60 items-center mx-auto my-2 font-extrabold">
                {{ $a[0]->id_pemesanan }}
            </div>
            <div class="cart flex text-white justify-evenly mt-2 mb-2">Daftar Pesanan </div>
            <div class="item justify-between overflow-auto h-96">
                <?php $total =0;?>
                @foreach($daftar_pesanan as $item)
                <?php 
                $total = $total +($item->harga_menu * $item->jumlah_pesan)?>
                <!-- item1 -->
                    @if($item->status_pemesanan == 'Order')
                        <div class="rekomend flex items-center w-full mt-3">
                            <div class="bag-1">
                                <img src="/asset/sensasi-ngopi-di-sinia-coffe 1.png" alt="" class="gambar" width="100px">
                            </div>
                            <div class="bag-2 w-full">
                                <span class="font-bold text-white font-4xl">{{$item->nama_menu}}</span><br>
                                <p class="deskripsi mt-2"> Qty : {{$item->jumlah_pesan}} Harga : {{$item->harga_menu}}</p>
                                <div class="flex  mt-2">
                                    <span class="harga">{{ $item->status_pemesanan }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($item->status_pemesanan == 'Masak')
                        <div class="rekomend flex items-center w-full mt-3">
                            <div class="bag-1">
                                <img src="/asset/sensasi-ngopi-di-sinia-coffe 1.png" alt="" class="gambar" width="100px">
                            </div>
                            <div class="bag-2 w-full">
                                <span class="font-bold text-white font-4xl">{{$item->nama_menu}}</span><br>
                                <p class="deskripsi mt-2"> Qty : {{$item->jumlah_pesan}} Harga : {{$item->harga_menu}}</p>
                                <div class="flex  mt-2">
                                    <span class="harga">{{ $item->status_pemesanan }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($item->status_pemesanan == 'Sajikan')
                        <div class="rekomend flex items-center w-full mt-3">
                            <div class="bag-1">
                                <img src="/asset/sensasi-ngopi-di-sinia-coffe 1.png" alt="" class="gambar" width="100px">
                            </div>
                            <div class="bag-2 w-full">
                                <span class="font-bold text-white font-4xl">{{$item->nama_menu}}</span><br>
                                <p class="deskripsi mt-2"> Qty : {{$item->jumlah_pesan}} Harga : {{$item->harga_menu}}</p>
                                <div class="flex  mt-2">
                                    <span class="harga">{{ $item->status_pemesanan }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="cart flex text-white justify-evenly mt-4">Total Harga : {{ $total }}</a>
            <a href="{{ url('/Tamu/'.$a[0]->no_meja.'/Pesanan/Bayar') }}" class="cart flex text-white justify-evenly mt-4">Lakukan Pembayaran </a>
            
        </div>
    </div>
</body>
<script src="{{ asset('asset/js/main.js') }}"></script>
</html>