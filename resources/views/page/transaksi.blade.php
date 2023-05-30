@extends('layout.master')

@section('content')

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eModul</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
         
        </div>
        <!--end breadcrumb-->
      
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    @if (auth()->user()->role == 'siswa')
                  <div class="ms-auto"><a href="{{ url('allpelajaran') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div>
                @endif
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order#</th>
                                <th>Pembelajaran Name</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Date Pembelian</th>
                                <th>View Details</th>
                                @if (auth()->user()->role == 'admin')
                                <th>Action</th>
                                @endif
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $pembelian)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                       
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#{{ $pembelian->slug }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $pembelian->pelajaran->nama_pelajaran }}</td>
                                <td>
                                    @if ($pembelian->status_transaksi == 'pending')
                                        <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i>{{ $pembelian->status_transaksi }}
                                        </div>
                                    @elseif ($pembelian->status_transaksi == 'success')
                                        <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i>{{ $pembelian->status_transaksi }}
                                        </div>
                                    @elseif ($pembelian->status_transaksi == 'gagal')
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i>{{ $pembelian->status_transaksi }}
                                        </div>
                                    @else
                                        <div>{{ $pembelian->status_transaksi }}</div>
                                    @endif
                                </td>
                                
                                <td>Rp.{{ $pembelian->pelajaran->harga_pelajaran }}</td>
                                <td>{{ $pembelian->created_at }}</td>
                                <td> <button type="button" class="btn btn-primary btn-sm radius-30 px-4" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $pembelian->id }}">
                                    View Details
                                </button></td>
                                <td>
                                    @if (auth()->user()->role == 'admin')
                                        <div class="d-flex order-actions">
                                           
                                            <div class="dropdown ms-3">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Status
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                    <li>
                                                        <form action="{{ route('pembayaran.update', $pembelian->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status_transaksi" value="success">
                                                            <button type="submit" class="dropdown-item">Success</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('pembayaran.update', $pembelian->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status_transaksi" value="gagal">
                                                            <button type="submit" class="dropdown-item">Gagal</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <a href="{{ route('pembayaran.destroy', $pembelian->id) }}" class="ms-3"
                                               onclick="event.preventDefault();
                                                            if (confirm('Are you sure you want to delete this transaction?')) {
                                                                document.getElementById('delete-form-{{ $pembelian->id }}').submit();
                                                            }">
                                                <i class='bx bxs-trash'></i>
                                            </a>
                                            <form id="delete-form-{{ $pembelian->id }}" action="{{ route('pembayaran.destroy', $pembelian->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>

                            <div class="modal fade" id="detailsModal{{ $pembelian->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $pembelian->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsModalLabel{{ $pembelian->id }}">Transaction Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Place your transaction details here -->
                                            <!-- Example: -->
                                            <p>Transaction ID: {{ $pembelian->id }}</p>
                                            <img src="{{ asset($pembelian->bukti_pembayaran) }}" class="img-fluid" />

                                            <p>Status: {{ $pembelian->status_transaksi }}</p>
                                            <!-- Add more details as needed -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                          
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection