
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-xxl-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pembayaran {{ $pelajaran->nama_pelajaran }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('pembayaran.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                     <div class="form-body mt-4">
                      <div class="row">
                         <div class="col-lg-8">
                         <div class="border border-3 p-4 rounded">
                          <div class="mb-3">
                              <label for="inputProductTitle" class="form-label">Product Judul</label>
                              <input type="email" class="form-control" id="inputProductTitle" placeholder="{{ $pelajaran->nama_pelajaran }}" disabled>
                            </div>
                            <div class="mb-3">
                              <label for="inputProductTitle" class="form-label">Product Judul</label>
                              <input type="email" class="form-control" id="inputProductTitle" placeholder="{{ $pelajaran->harga }}" disabled>
                            </div>
                            <div class="mb-3">
                              <label for="inputProductDescription" class="form-label">Bank Transfer</label>
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="card radius-10 bg-success">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-white">BRI</p>
                                                    <h4 class="my-1 text-white">1234-01-567890-10</h4>
                                                </div>
                                                <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card radius-10 bg-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-white">BCA</p>
                                                    <h4 class="my-1 text-white">1234-01-567890-10</h4>
                                                </div>
                                                <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card radius-10 bg-danger">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-white">Mandiri</p>
                                                    <h4 class="my-1 text-white">1234-01-567890-10</h4>
                                                </div>
                                                <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="inputProductDescription" class="form-label">Uplod Bukti Pembayaran</label>
                              <input  class="form" type="file" name="bukti_pembayaran" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" >
                            </div>
                          </div>
                         </div>
                         <div class="col-lg-4">
                          <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <h4>Detail Pembeli</h4>
                              <div class="col-md-6">
                                  <label for="inputPrice" class="form-label">Nama Pembeli</label>
                                  <input type="text" class="form-control" id="inputPrice" placeholder="" value="{{ $user->name }}">
                                </div>
                                <div class="col-md-6">
                                  <label for="inputCompareatprice" class="form-label">Status Akun</label>
                                  <input type="text" class="form-control" id="inputCompareatprice" value="{{ $user->role }}">
                                </div>
                                <div class="col-md-6">
                                  <label for="inputCostPerPrice" class="form-label">Pendidikan</label>
                                  <input type="text" class="form-control" id="inputCostPerPrice" value="{{ $user->siswa->pendidikan->nama_pendidikan }}">
                                </div>
                                <div class="col-md-6">
                                  <label for="inputStarPoints" class="form-label">Kelas</label>
                                  <input type="text" class="form-control" id="inputStarPoints" value="{{ $user->siswa->kelas->nama_kelas }}">
                                </div>
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="inputProductTags" value="{{ $user->phone }}">
                                  </div>
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">Email </label>
                                    <input type="text" class="form-control" id="inputProductTags" value="{{ $user->email }}">
                                  </div>
                                  <hr> <!-- Horizontal line separator -->
                                  <h3>Detail Produk</h3>
                                <div class="col-12">
                                  <label for="inputProductTags" class="form-label">Product</label>
                                  <input type="text" class="form-control" id="inputProductTags" name="pelajaran_id" value="{{ $pelajaran->id }}">
                                  <input type="text" class="form-control" id="inputProductTags" value="{{ $pelajaran->nama_pelajaran }}">
                                </div>
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">Kelas Pelajaran</label>
                                    <input type="text" class="form-control" id="inputProductTags" value="{{ $pelajaran->pendidikan->nama_pendidikan }}">
                                </div>
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">Tentor</label>
                                    <input type="text" class="form-control" id="inputProductTags" value="{{ $pelajaran->user->name }}">
                                </div>
                                @php
                                $count = count($file);
                                @endphp
                                
                                @foreach ($file as $key => $f)
                                    {{-- Loop Content --}}
                                @endforeach
                                <div class="col-12">
                                    <label for="inputProductTags" class="form-label">Tentor</label>
                                    File Materi :
                                    {!! $count !!}
                                    
                                </div>
                               
                            </div> 
                        </div>
                        </div>
                     </div><!--end row-->
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>