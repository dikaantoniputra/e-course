@extends('layout.master')

@section('title')
    kelas
@endsection

@push('after-style')
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('kelase.store') }}" id="form">
                        @csrf
                        @include('page.kelas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
@endpush
