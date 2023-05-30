@extends('layout.master')

@section('title')
    Jadwal
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
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Data @yield('title')</a>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
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
                                <th>No</th>
                                <th>Slug</th>
                                <th>Pelajaran</th>
                                <th>Nama Tentor</th>
                                <th>Hari</th>
                                <th>Jam</th>
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

    <div class="modal fade" id="detailModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="detail-datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> --}}
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

        // lek onok datae
        $(document).ready(function() {
            let mainTable = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('jadwal.index') }}',

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
                        data: 'pelajaran.nama_pelajaran',
                        name: 'nama_pelajaran'
                    },
                    {
                        data: 'user.name',
                        name: 'nama_tentor'
                    },
                    {
                        data: 'hari',
                        name: 'hari'
                    },
                    {
                        data: 'jam_mulai',
                        render: function(data, type, row) {
                            return data + ' - ' + row.jam_akhir;
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

            $('#example').on('click', '.btn-detail', function() {
                let selectedData = '';
                let slug = '';
                let indexRow = mainTable.rows().nodes().to$().index($(this).closest('tr'));
                selectedData = mainTable.row(indexRow).data();
                $('#detail-datatable').DataTable().clear();
                $('#detail-datatable').DataTable().destroy();
                console.log(selectedData.slug);
                slug = selectedData.slug;
                $('#detail-datatable').DataTable({
                    ajax: {
                        "type": "POST",
                        "url": "{{ route('jadwal.detail-siswa') }}",
                        "data": {
                            '_token': "{{ csrf_token() }}",
                            'slug': slug
                        }
                    },
                    lengthMenu: [5],
                    columns: [{
                        data: "name",
                        name: "name"
                    }],
                });
            });
        });
    </script>
@endpush
