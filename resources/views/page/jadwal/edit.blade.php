@extends('layout.master')

@section('title')
    Edit Jadwal
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('jadwal.update', $jadwal->slug) }}" id="form" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('page.jadwal.form')
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endpush

@push('after-script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm ',
            interval: 60,
            minTime: '24',
            maxTime: '23:00',
            // defaultTime: '01',
            startTime: '00:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
