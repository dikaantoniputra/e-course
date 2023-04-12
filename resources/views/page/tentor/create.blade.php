@extends('layout.master')

@section('title')
Tentor
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
                    @include('page.tentor.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')

        
@endpush

