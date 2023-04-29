@extends('layout.master')

@section('title')
    Tentor
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
                    <a href="{{ route('tentor.create') }}" class="btn btn-primary">Tambah Data @yield('title')</a>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Data @yield('title')</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Slug</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Pendidikan Akhir</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>

                                <td>
                                    <button type="button" class="btn btn-warning ">Edit</button>
                                    <button type="button" class="btn btn-primary ">Primary</button>
                                    <button type="button" class="btn btn-danger ">Danger</button>
                                <td>
                            </tr> --}}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection



@push('after-script')
    <script>
        function datatable() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('tentor.index') }}',
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'user.address',
                        name: 'user.address'
                    },
                    {
                        data: 'user.phone',
                        name: 'user.phone'
                    },
                    {
                        data: 'pendidikan.nama_pendidikan',
                        name: 'pendidikan.nama_pendidikan'
                    },
                    {
                        data: 'user.username',
                        name: 'user.username'
                    },
                    {
                        data: 'user.email',
                        name: 'user.email'
                    },
                    {
                        data: 'user.status',
                        render: function(data, type, row) {
                            if (data === 1) {
                                return '<button type="button" class="btn btn-info btn-sm rounded-pill btn-status" data-user="' +
                                    row.user.id +
                                    '" onclick="changeStatusSiswa()">active</button>';
                            } else {
                                return '<button type="button" class="btn btn-warning btn-sm rounded-pill btn-status" data-user="' +
                                    row.user.id +
                                    '" onclick="changeStatusSiswa()">non-active</button>';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }

        datatable();

        function changeStatusSiswa() {
            event.preventDefault();
            const currentItem = event.target.getAttribute('data-user');
            console.log(currentItem);
            $("#example").dataTable().fnDestroy();
            $.ajax({
                type: "POST",
                url: "{{ route('tentor.setstatus') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": currentItem
                },
                success: function(response) {
                    datatable();
                }
            });
        }
    </script>
@endpush
