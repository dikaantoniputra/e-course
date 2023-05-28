<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Horizontal Form</h6>
        <hr />
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">@yield('title') Registration</h5>
                    </div>
                    <hr />

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori Pendidikan</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="pendidikan_id">
                                @foreach ($pendidikan as $r)
                                    <option value="{{ $r->id }}"
                                        {{ !empty($pelajaran) && $pelajaran->pendidikan_id == $r->id ? 'selected' : (old('pendidikan_id') == $r->id ? 'selected' : '') }}>
                                        {{ $r->nama_pendidikan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tentor Pelajaran</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="user_id">
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}"
                                        {{ !empty($pelajaran) && $pelajaran->user_id == $u->id ? 'selected' : (old('user_id') == $u->id ? 'selected' : '') }}>
                                        {{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Pelajaran </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" placeholder="Nama Pelajaran"
                                name="nama_pelajaran" value="{{ $pelajaran->nama_pelajaran ?? '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputEmailAddress2" placeholder="Harga"
                                name="harga_pelajaran" value="{{ $pelajaran->harga_pelajaran ?? '' }}">
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
