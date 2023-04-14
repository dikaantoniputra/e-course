<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">@yield('title') Form</h6>
        <hr/>
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">@yield('title') Registration</h5>
                    </div>
                    <hr/>

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori Pendidikan</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="pendidikan_id">
                                @foreach($pendidikan as $r)
                                    <option value="{{ $r->id }}" {{ (!empty($kelas) && $kelas->pendidikan_id == $r->id) ? 'selected' : (old('pendidikan_id') == $r->id ? 'selected' : '') }}>{{ $r->nama_pendidikan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Kelas" name="nama_kelas" value="{{ $kelas->nama_kelas ?? '' }}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>