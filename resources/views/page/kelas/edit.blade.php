@extends('layout.master')

@section('title')
    Edit Buku Pelajaran
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('kelase.update', $kelas) }}" id="form" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('page.kelas.form')
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('after-script')
@endpush
