@extends('layout.master')

@section('content')

    
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">e-Modul</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products Details</li>
                    </ol>
                </nav>
            </div>
           
        </div>
        <!--end breadcrumb-->

         <div class="card">
            <div class="row g-0">
              <div class="col-md-4 ">
                <img src="{{ asset('') }}assets/images/products/01.png" class="img-fluid" alt="...">
               
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">{{ $pelajaran->nama_pelajaran }}</h4>
                  <div class="d-flex gap-3 py-3">
                    <div> Pembuatan:{{ $pelajaran->created_at }}</div>
                      <div>142 reviews</div>
                      <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>
                  </div>
                  <div class="mb-3"> 
                    <span class="price h4">{{ $pelajaran->harga_pelajaran }}</span> 
                    <span class="text-muted">/per pelajaran</span> 
                </div>
                @foreach ($materi as $m )
                <p class="card-text fs-6">{!! Str::limit(strip_tags($m->materi), 230) !!}</p>
                @endforeach
                 
                
                  <dl class="row">
                    <dt class="col-sm-3">Pendidikan:</dt>
                    <dd class="col-sm-9">{{ $pelajaran->pendidikan->nama_pendidikan }}</dd>
              
                    <dt class="col-sm-3">Kelas</dt>
                    <dd class="col-sm-9">??</dd>
                  
                    <dt class="col-sm-3">Tentor</dt>
                    <dd class="col-sm-9">{{ $pelajaran->user->name }} </dd>
                  </dl>
                  <hr>
                 
                <div class="d-flex gap-3 mt-3">
                    
                    @if ($transaksi && $transaksi->status_transaksi !== 'success')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Bayar Langsung
                        </button>
                    @elseif (!$transaksi)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Bayar Langsung
                        </button>
                    @endif

                
                    {{-- <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i class='bx bxs-cart-alt'></i></a> --}}
                </div>
                </div>
              </div>
            </div>
            <hr/>
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                </div>
                                <div class="tab-title"> Pelajaran Materi </div>
                            </div>
                        </a>
                    </li>
                    @if ($transaksi && $transaksi->status_transaksi == 'success')
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                </div>
                                <div class="tab-title">File Materi</div>
                            </div>
                        </a>
                    </li>
                    @elseif (!$transaksi)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                </div>
                                <div class="tab-title">File Materi</div>
                            </div>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item" role="presentation">
                      <a class="nav-link disabled" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                          <div class="d-flex align-items-center">
                              <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i></div>
                              <div class="tab-title">Jadwal</div>
                          </div>
                      </a>
                  </li>
                  
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        
                      @foreach ($materi as $m )
                        <p>{!! Str::limit(strip_tags($m->materi), 400) !!}</p>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                      <div class="row row-cols-1 row-cols-lg-3">
                        @foreach ($file as $key => $f)
                        <div class="col">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('') }}assets/images/products/01.png" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $f->nama_file }}</h6>
                                            <div class="clearfix">
                                               
                                                <a href="{{ route('download', ['id' => $f->id]) }}" class="btn btn-primary">Download</a>
                                              
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                       
                    </div>
                    </div>
                    <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                </div>
            </div>

          </div>


          @include('page.pembayaran')
@endsection