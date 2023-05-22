@extends('layout.master')

@section('title')
    Materi
@endsection

@section('content')

<div class="container-fluid">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables @yield('title')</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data @yield('title')</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('materi.create') }}" class="btn btn-primary">Tambah Data @yield('title')</a>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    
    <h6 class="mb-0 text-uppercase">DataTable @yield('title')</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pelajaran</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
    
</div>


@endsection



@push('after-script')

<script>
    // $(document).ready(function() {
    //     $('#example').DataTable();
    //   } );


$(document).ready(function() {
    $('#example').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('materi.tentor') }}',
        
    },
    columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pelajaran.nama_pelajaran',
                        name: 'pelajaran.nama_pelajaran'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
    });
});
</script>

@endpush
