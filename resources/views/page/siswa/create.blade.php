@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        @include('page.siswa.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        function getKelas(id) {
            $('#kelas').removeAttr('disabled');
            $('#kelas')
                .find('option')
                .remove()
                .end()
                .append('<option value="">-- Pilih Kelas --</option>');
            $.ajax({
                type: "POST",
                url: "{{ route('siswa.getkelas') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data) {
                    data.kelas.forEach(element => {
                        console.log(element.nama_kelas);
                        $("#kelas").append(new Option(element.nama_kelas, element.id));
                    });
                }
            });
        }

        $('#pendidikan').on('change', function() {
            if (this.value !== '') {
                getKelas(this.value);
            } else {
                $('#kelas').attr('disabled', true);
                $('#kelas')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Pilih pendidikan terlebih dahulu --</option>');
            }
        });
    </script>
@endpush
