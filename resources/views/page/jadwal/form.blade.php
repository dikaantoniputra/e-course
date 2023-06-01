<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">@yield('title') Form</h6>
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
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori Pelajaran</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="pelajaran_id">
                                @foreach ($pelajaran as $r)
                                    <option value="{{ $r->id }}"
                                        {{ !empty($jadwal) && $jadwal->pelajaran_id == $r->id ? 'selected' : (old('pelajaran_id') == $r->id ? 'selected' : '') }}>
                                        {{ $r->nama_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Mentor Pelajaran</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="user_id">
                                @foreach ($tentor as $t)
                                    <option value="{{ $t->id }}"
                                        {{ !empty($jadwal) && $jadwal->user_id == $t->id ? 'selected' : (old('user_id') == $t->id ? 'selected' : '') }}>
                                        {{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Hari Pembelajaran</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="hari">
                                @foreach ($days as $day)
                                    <option value="{{ $day }}"
                                        {{ !empty($jadwal) && $jadwal->hari == $day ? 'selected' : (old('hari') == $day ? 'selected' : '') }}>
                                        {{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jam Mulai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" id="inputEnterYourName"
                                name="jam_mulai" value="{{ !empty($jadwal) ? $jadwal->jam_mulai : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jam Akhir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control timepicker" id="inputEnterYourName"
                                name="jam_akhir" value="{{ !empty($jadwal) ? $jadwal->jam_akhir : '' }}">
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
