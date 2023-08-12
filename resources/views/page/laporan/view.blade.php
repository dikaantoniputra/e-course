@extends('layout.master')

@section('content')

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Laporan keuangan</div>
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
                             
                             
                            </tr>
                        </thead>
                        <tbody>
                            @php
                        $totalHarga = 0; // Variabel untuk menghitung total harga
                    @endphp

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
                                 <!-- Mengakumulasi total harga -->
                                @php
                                    $totalHarga += $pembelian->pelajaran->harga_pelajaran;
                                @endphp
                                
                               
                            </tr>

                          

                            @endforeach
                          
                            
                        </tbody>
                    </table>
                </div>

                <!-- Menampilkan total harga di bawah tabel -->
                <div class="mt-3 text-end">
                    <strong>Total Pendapatan: Rp.{{ $totalHarga }}</strong>
                </div>

            </div>
        </div>



@endsection