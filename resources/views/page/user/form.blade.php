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
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName" name="name"
                                placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">No Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" name="phone"
                                placeholder="Phone No">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputUsernameAddress2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputUsernameAddress" placeholder="Username"
                                name="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Address" name="address"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3" id="row-role">
                        <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="role">
                                <option value="">-- Pilih Role --</option>
                                <option value="siswa">Siswa</option>
                                <option value="tentor">Tentor</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmailAddress2" name="email"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputChoosePassword2"
                                placeholder="Choose Password" name="password">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputConfirmPassword2"
                                placeholder="Confirm Password">
                        </div>
                    </div> --}}
                    {{-- <div class="row mb-3">
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
                            <button type="submit" class="btn btn-info px-5">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
