@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <h6>Pelajaran Yang Belum Di Beli</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">

        @foreach ($pelajaran as $menu)
            @if (!empty($menu->jadwal))
                <a href="{{ route('pelajaran', ['slug' => $menu->slug]) }}">
                    <div class="col">
                        <div class="card">
                            <img src="assets/images/products/01.png" class="card-img-top" alt="...">
                            <div class="">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"
                                    style="background-color: blue; border-radius: 50%;">
                                    <span class="text-white">{{ $menu->pendidikan->nama_pendidikan }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Tentor : {{ $menu->user->name }}</h6>
                                <div class="clearfix">
                                    <p class="mb-0 float-start"><strong>Judul:</strong> {{ $menu->nama_pelajaran }}</p>
                                    <p class="mb-0 float-end fw-bold"><span>RP.{{ $menu->harga_pelajaran }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
    <!--end row-->
@endsection
