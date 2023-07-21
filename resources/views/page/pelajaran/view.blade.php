@extends('layout.master')

@section('title')
    Pelajaran
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
                @if (Auth::user()->role == 'admin')
                    <div class="btn-group">
                        <a href="{{ route('pelajaran.create') }}" class="btn btn-primary">Tambah Data @yield('title')</a>
                       
                       
                    </div>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">DataTable @yield('title')</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Pendidikan</th>
                                <th>Tentor</th>
                                <th>Pelajaran</th>
                                <th>Harga</th>
                                @if (Auth::user()->role == 'admin')
                                    <th>Action</th>
                                @endif
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
      


        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('pelajaran.index') }}',

                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pendidikan.nama_pendidikan',
                        name: 'pendidikan.nama_pendidikan'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'nama_pelajaran',
                        name: 'nama_pelajaran'
                    },
                    {
                        data: 'harga_pelajaran',
                        name: 'harga_pelajaran'
                    },
                    @if (Auth::user()->role == 'admin')
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    @endif

                ]
            });
        });
    </script>
@endpush
