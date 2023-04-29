@extends('layout.master')

@section('title')
    Edit Tentor
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('tentor.update', $tentor) }}" id="form" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('page.tentor.form')
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('after-script')
@endpush
