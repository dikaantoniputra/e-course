@extends('layout.master')

@section('title')
Edit Pelajaran
@endsection

@section('content')
<div class="row row-deck row-cards">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('materi.update', $materi) }}" id="form" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('page.materi.form')
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('after-script')
<script>
    function deleteFile(fileId) {
        if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
            $.ajax({
                url: "{{ route('file.delete', '') }}" + "/" + fileId,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    // Tindakan yang diambil setelah penghapusan berhasil, misalnya menghapus elemen dari daftar
                    console.log("File berhasil dihapus");
                },
                error: function (xhr, status, error) {
                    // Penanganan kesalahan, jika terjadi
                    console.error(error);
                }
            });
        }
    }
</script>
        
@endpush

