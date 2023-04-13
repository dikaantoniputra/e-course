@extends('layout.master')

@section('title')
    user
@endsection

@push('after-style')
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        @include('page.user.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        const fieldPendidikan = '<div class="row mb-3" id="row-pendidikan">' +
            '<label for="inputRole" class="col-sm-3 col-form-label">Pendidikan</label>' +
            '<div class="col-sm-9">' +
            '<select class="form-select" id="pendidikan" name="pendidikan">' +
            '<option value="">-- Pilih Pendidikan --</option>' +
            '<?php foreach($pendidikan as $p){ ?>' +
            '<option value="<?php echo $p->id; ?>"><?php echo $p->nama_pendidikan; ?></option>' +
            '<?php } ?>' +
            '</select>' +
            ' </div>' +
            '</div>';

        const fieldKelas = '<div class="row mb-3" id="row-kelas">' +
            '<label for="inputRole" class="col-sm-3 col-form-label">Kelas</label>' +
            '<div class="col-sm-9">' +
            '<select class="form-select" id="kelas" name="kelas" disabled>' +
            '<option value="">-- Mohon pilih pendidikan dahulu --</option>' +
            '</select>' +
            ' </div>' +
            '</div>';

        function getKelasByPendidikan(id) {
            $('#kelas')
                .find('option')
                .remove()
                .end()
                .append('<option value="">-- Mohon pilih kelas --</option>');
            $.ajax({
                type: "POST",
                url: "{{ route('user.getkelas') }}",
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

        function changePendidikan() {
            $('#pendidikan').each(function(index, element) {
                $(element).each(function(index, element) {
                    $(element).on('change', function(el) {
                        if (this.value !== "") {
                            $('#kelas').removeAttr('disabled');
                            getKelasByPendidikan(this.value);
                        } else {
                            $('#kelas').attr('disabled', true);
                        }
                    });
                });
            });
        }

        $('#role').on('change', function() {
            $("#row-kelas").remove();
            $("#row-pendidikan").remove();
            if (this.value === 'tentor') {
                $("#row-role").after(fieldPendidikan);
            } else if (this.value === 'siswa') {
                $("#row-role").after(fieldPendidikan + fieldKelas);
                changePendidikan();
            }
        });
    </script>
@endpush
