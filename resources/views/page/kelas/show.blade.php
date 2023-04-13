@extends('layout.master')

@section('title')
Edit Buku Pelajaran
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                @if (strpos($error, 'The') === 0 && strpos($error, 'must not be greater than') !== false)
                                    File tidak boleh lebih besar dari 1024 kilobita
                                @else
                                    {{ str_replace('The', 'Kolom', str_replace('.', '', $error)) }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            
            <div id="basicwizard">
                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                    <li class="nav-item">
                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active"> 
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span class="d-none d-sm-inline">Data Pelapor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-face-profile me-1"></i>
                            <span class="d-none d-sm-inline">Data Anak</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                            <span class="d-none d-sm-inline">Upload Dokumen Syarat kelahiran</span>
                        </a>
                    </li>
                </ul>
            
                <div class="tab-content b-0 mb-0">
                    <div class="tab-pane active" id="basictab1" >
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="userName" name="name_submitter" placeholder="nama pengaju"  value="{{ (!empty($kelahiran) ? $kelahiran->name_submitter : old('name_submitter')) }}" disabled>
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="regency">Kota/Kabupaten</label>
                                    <div class="col-md-9">
                                        <select class="form-select select2" id="regency" name="regency_id" disabled>
                                            <option value="">-- Pilih kota/kabupaten --</option>
                                            @foreach($regencies as $r)
                                                <option value="{{ $r->id }}" {{ (!empty($kelahiran) && $kelahiran->regency_id == $r->id) ? 'selected' : (old('regency') == $r->id ? 'selected' : '') }}>{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="nik">NIK</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Nik" 
                                        value="{{ (!empty($kelahiran) ? $kelahiran->nik : old('nik')) }}"  type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16"  required>
                                        <span class="invalid-feedback error-nik" role="alert"></span>
                                    </div>
                                </div>
                                
                                
                                
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">No KK</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="kk" name="no_kk" placeholder="No KK" value="{{ (!empty($kelahiran) ? $kelahiran->no_kk : old('no_kk')) }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16" required>
                                        <span class="invalid-feedback error-nik" role="alert"></span>
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Kewarganegaraan</label>
                                    <div class="col-md-9">
                                        <select class="form-select" aria-label="Default select example" name="no_paspor" disabled placeholder="Pilih kewarganegaraan">
                                            <option data-display="Kewarganegaraan" value="" >Pilih</option>
                                            <option value="WNI" {{ isset($kelahiran) && $kelahiran->no_paspor == 'WNI' ? 'selected' : '' }}>WNI</option>
                                            <option value="WNA" {{ isset($kelahiran) && $kelahiran->no_paspor == 'WNA' ? 'selected' : '' }}>WNA</option>
                                          </select>
            
                                    </div>
                                </div>
            
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">No WA Pemohon
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="userName" name="phone" placeholder="No WA Pemohon" value="{{ (!empty($kelahiran) ? $kelahiran->phone : old('phone')) }}" required>
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Email Pemohon
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="userName" name="email" placeholder="Email Pemohon"  value="{{ (!empty($kelahiran) ? $kelahiran->email : old('email')) }}" required>
                                    </div>
                                </div>
            
                               
                            </div> <!-- end col -->
                        </div>
            
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/kelahiran') }}" class="btn btn-secondary" id="prevBtn" onclick="prevTab()">Previous</a>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextTab()">Next</button>
                    
                          </div>
                        
            
                    </div>
            
                    <div class="tab-pane" id="basictab2">
                        <div class="tab-pane" id="basictab2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="name">Nama Anak
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" id="name" name="child_name" class="form-control"  value="{{ (!empty($kelahiran) ? $kelahiran->child_name : old('child_name')) }}" required>
                                        </div>
                                    </div>
            
                                    @if (empty($kelahiran))
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="userName">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                          <div class="col">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="gender" id="status2" value="Laki-Laki" disabled>
                                              <label class="form-check-label" for="inlineRadio2">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="gender" id="status3" value="Perempuan" disabled>
                                              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
            
                                    @if (!empty($kelahiran))
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="userName">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                          <div class="col">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="gender" id="status2" value="Laki-Laki" @if ($kelahiran->gender == 'Laki-Laki') checked @endif disabled>
                                              <label class="form-check-label" for="inlineRadio2">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="gender" id="status3" value="Perempuan" @if ($kelahiran->gender == 'Perempuan') checked @endif disabled>
                                              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
            
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="name">TGL LAHIR
                                        </label>
                                        <div class="col-md-9">
                                            <input type="date" id="basic-datepicker" class="form-control" placeholder="Basic datepicker" name="birth_date" value="{{ (!empty($kelahiran) ? $kelahiran->birth_date : old('birth_date')) }}" required>
                                        </div>
                                    </div>
            
                                </div> <!-- end col -->
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" id="prevBtn" onclick="prevTab()">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextTab()">Next</button>
                        
                              </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="basictab3">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">                        
                                    <label class="col-md-3 col-form-label" for="userName">Formulir F-2.01
                                    </label>
                                    <img src="{{ asset($kelahiran->form_f2) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Surat Keterangan Lahir RS
                                    </label>
                                    <img src="{{ asset($kelahiran->hospital_birth_certificate) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Kartu Keluarga
                                    </label>
                                    <img src="{{ asset($kelahiran->family_card) }}" class="img-preview img-fluid col-sm-5" width="100" />
                    
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">KTP-el Ayah
            
                                    </label>
                                    <img src="{{ asset($kelahiran->father_id_card) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                    
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">KTP-el Ibu
            
                                    </label>
                                    <img src="{{ asset($kelahiran->mother_id_card) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                   
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">KTP-el saksi 1
                                    </label>
                                    <img src="{{ asset($kelahiran->witness_one) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                    
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">KTP-el saksi 2
                                    </label>
                                  
                                    <img src="{{ asset($kelahiran->witness_two) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                   
                                </div>
            
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="userName">Akta Perkawinan / Buku Nikah Orangtua         
                                    </label>
                                    <img src="{{ asset($kelahiran->marriage_book) }}" class="img-preview img-fluid col-sm-5" width="100" />
                                </div>

                                     
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" id="prevBtn" onclick="prevTab()">Previous</button>
                                  
                                </div>
                            </div>
                        
                        </div>
                       
                   
                    </div>
                </div>
            
            </div>
            
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pengajuan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda Yakin Dengan Data Yang telah Di ajukan
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button  type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('after-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$("select").select2({
  tags: "true",
  placeholder: "Select an Daerah",
  allowClear: true
});


// event listener untuk tombol "Next"
function nextTab() {
  var currentTab = $('.tab-content .tab-pane.active');
  var nextTab = currentTab.next('.tab-pane');

  // hanya beralih ke tab selanjutnya jika sekarang sedang di tab sebelumnya
  if (currentTab.attr('id') === 'basictab1' || currentTab.attr('id') === 'basictab2') {
    currentTab.removeClass('active');
    nextTab.addClass('active');

    var currentNav = $('.nav-pills .nav-link.active');
    var nextNav = currentNav.parent().next().find('.nav-link');

    currentNav.removeClass('active');
    nextNav.addClass('active');

    // menonaktifkan tombol next pada tab terakhir
    if (nextTab.length === 0) {
      $('#nextBtn').text('Complete');
      $('#saveBtn').show();
      $('#nextBtn').prop('disabled', true);
    }

    // mengaktifkan kembali tombol prev pada tab sebelumnya
    $('#prevBtn').prop('disabled', false);
  }
}

// fungsi untuk beralih ke tab sebelumnya
function prevTab() {
    var currentTab = $('.tab-content .tab-pane.active');
    var prevTab = currentTab.prev('.tab-pane');

    // hanya beralih ke tab sebelumnya jika sekarang bukan di tab pertama
    if (prevTab.length !== 0) {
        currentTab.removeClass('active');
        prevTab.addClass('active');
    
        var currentNav = $('.nav-pills .nav-link.active');
        var prevNav = currentNav.parent().prev().find('.nav-link');
    
        currentNav.removeClass('active');
        prevNav.addClass('active');
    
        // menonaktifkan tombol prev pada tab pertama
        if (prevTab.attr('id') === 'basictab1') {
            $('#prevBtn').prop('disabled', true);
        }
    
        // mengaktifkan kembali tombol next pada tab sebelumnya
        $('#nextBtn').prop('disabled', false);
    }
}


</script>


<script>


$(document).ready(function() {
    $('#nik, #kk').on('input', function() {
    var input = $(this);
    var value = input.val();
    if (value.length < 16) {
        input.addClass("is-invalid");
        $('.error-' + input.attr('name')).text(input.attr('name').toUpperCase() + ' harus berisi 16 digit numerik').show();
    } else if (!/^[0-9]+$/.test(value)) {
        input.addClass("is-invalid");
        $('.error-' + input.attr('name')).text(input.attr('name').toUpperCase() + ' harus berisi hanya digit numerik').show();
    } else {
        input.removeClass("is-invalid");
        $('.error-' + input.attr('name')).hide();
    }
});
});


</script>
        
@endpush

