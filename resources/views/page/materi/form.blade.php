<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Horizontal Form Materi</h6>
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
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori Pelajaran</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="pelajaran_id">
                                @foreach($pelajaran as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <h4 class="mb-4">Materi Pelajaran</h4>
							<textarea id="mytextarea" name="materi"></textarea>
                    </div>

                    <div class="rowmb-3 ">
                        <div class="col-xl-12 mx-auto">
                            <h6 class="mb-0 text-uppercase">File Materi</h6>
                            <hr/>
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <input id="image-uploadify" type="file" name="file_materi[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-info px-5">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>