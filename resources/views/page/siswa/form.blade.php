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
                        <h5 class="mb-0 text-info">Siswa Registration</h5>
                    </div>
                    <hr />
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName"
                                placeholder="Masukkan Nama" name="name"
                                value="{{ !empty($siswa) ? $siswa->user->name : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Alamat" name="address">{{ !empty($siswa) ? $siswa->user->address : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" placeholder="No Telepon"
                                name="phone" value="{{ !empty($siswa) ? $siswa->user->phone : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPend" class="col-sm-3 col-form-label">Pendidikan</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="pendidikan" name="pendidikan">
                                <option value="">-- Pilih Pendidikan --</option>
                                @foreach ($pendidikan as $p)
                                    @if (!empty($siswa))
                                        <option value="{{ $p->id }}"
                                            {{ $p->id == $siswa->pendidikan_id ? ' selected ' : '' }}>
                                            {{ $p->nama_pendidikan }}</option>
                                    @else
                                        <option value="{{ $p->id }}">{{ $p->nama_pendidikan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputKel" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="kelas" name="kelas"
                                {{ empty($siswa) ? ' disabled ' : '' }}>
                                <option value="">-- Pilih pendidikan terlebih dahulu --</option>
                                @if (!empty($siswa))
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}"
                                            {{ $k->id == $siswa->kelas_id ? ' selected ' : '' }}>{{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputUsernameAddress2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputUsernameAddress2" placeholder="Username"
                                name="username" value="{{ !empty($siswa) ? $siswa->user->username : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmailAddress2" placeholder="Email"
                                name="email" value="{{ !empty($siswa) ? $siswa->user->email : '' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputChoosePassword2" placeholder="Password"
                                name="password">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputConfirmPassword2"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck4">
                                <label class="form-check-label" for="gridCheck4">Check me out</label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit"
                                class="btn btn-info px-5">{{ !empty($siswa) ? 'Update' : 'Register' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
