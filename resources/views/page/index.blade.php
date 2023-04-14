@extends('layout.master')

@section('content')
<div class="card radius-10">
    <div class="card-content">
        <div class="row row-group row-cols-1 row-cols-xl-4">
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total Orders</p>
                            <h4 class="mb-0 text-primary">4805</h4>
                        </div>
                        <div class="ms-auto"><i class="bx bx-cart font-35 text-primary"></i>
                        </div>
                    </div>
                    <div class="progress radius-10 my-2" style="height:4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%"></div>
                    </div>
                    <p class="mb-0 font-13">+2.5% from last week</p>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total Revenue</p>
                            <h4 class="mb-0 text-danger">$8,245</h4>
                        </div>
                        <div class="ms-auto"><i class="bx bx-wallet font-35 text-danger"></i>
                        </div>
                    </div>
                    <div class="progress radius-10 my-2" style="height:4px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                    </div>
                    <p class="mb-0 font-13">+5.4% from last week</p>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Bounce Rate</p>
                            <h4 class="mb-0 text-success">34.6%</h4>
                        </div>
                        <div class="ms-auto"><i class="bx bx-line-chart-down font-35 text-success"></i>
                        </div>
                    </div>
                    <div class="progress radius-10 my-2" style="height:4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                    </div>
                    <p class="mb-0 font-13">-4.5% from last week</p>
                </div>
            </div>
            <div class="col">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total Customers</p>
                            <h4 class="mb-0 text-warning">8.4K</h4>
                        </div>
                        <div class="ms-auto"><i class="bx bx-group font-35 text-warning"></i>
                        </div>
                    </div>
                    <div class="progress radius-10 my-2" style="height:4px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%"></div>
                    </div>
                    <p class="mb-0 font-13">+8.4% from last week</p>
                </div>
            </div>
        </div>
    </div>
</div>









  

@endsection