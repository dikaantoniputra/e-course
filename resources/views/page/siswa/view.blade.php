@extends('layout.master')

@section('title')
    kelahiran AKTE LAHIR
@endsection

@section('content')

<div class="container-fluid">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
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
    
    <h6 class="mb-0 text-uppercase">DataTable Example</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                        </tr>
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
        $('#example').DataTable();
      } );

// lek onok datae
// $(document).ready(function() {
//     $('#example').DataTable({
//     processing: true,
//     serverSide: true,
//     ajax: {
//         url: '{{ route('siswa.index') }}',
        
//     },
//     columns: [
//             {data: 'id', name: 'id'}, 
//             {data: 'email', name: 'email'},     
//             {data: 'name_submitter', name: 'name_submitter'}, 
//             {data: 'dead_name', name: 'dead_name'},
//             {data: 'hospital_regency', name: 'hospital_regency'}, 
//             {data: 'created_at', name: 'created_at'},
//             {data: 'status', name: 'status'},
//             {data: 'action', name: 'action', orderable: false, searchable: false}
//         ] 
//     });
// });
</script>

@endpush
