@extends('layout.app')

@section('title')
    DAFTAR
@endsection

@section('content')


<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#016551 url({{ asset('') }}giganusa/img/bg2.png) no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <h2 class="ipt-title">All Job </h2>
                <div class="breadcrumbs light">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="JavaScript:Void(0);">Giganusa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ All List Wrap ================================== -->
<form class="find-form mt-0" action="{{ route('searchJobs') }}" method="GET">
<section class="gray-simple">
    <div class="container">
        <div class="row">
        
            <!-- Search Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                
                <div class="bg-white rounded mb-3">							
                
                    <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                        <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                        <div class="ssh-header">
                            <a href="{{ url('alljob') }}" class="clear_all ft-medium text-muted">Clear All</a>
                            <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
                        </div>
                    </div>
                    
                    <!-- Find New Property -->
                    <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                        
                        <div class="search-inner">
                            
                            <div class="filter-search-box px-4 pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Search by judul...">
                                </div>
                                {{-- <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Location, Zip..">
                                </div> --}}

                                
                            </div>
                            
                            <div class="filter_wraps">
                                
                                <!-- Job categories Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#categories" class="ft-medium fs-md" data-bs-toggle="collapse" aria-expanded="false" role="button">Nama Perusahaan</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse" id="categories" data-bs-parent="#categories">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            @foreach($companies as $company)
                                                            <li>
                                                                <input value="{{ $company->id }}" data-display="Perusahaan" name="category" type="radio">
                                                                <label for="e2" class="form-check-label">{{ $company->name }}</label>
                                                            </li>
                                                            @endforeach
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  <!-- Expected Salary Search -->
                                  {{-- <div class="single_search_boxed px-4 pt-0">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#radiusmiles" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Rentang Gaji (Develop)</a>
                                        </h4>
                                     
                                    </div>
                                    <div class="widget-boxed-body collapse show" id="radiusmiles" data-bs-parent="#radiusmiles">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="rg-slider">
                                                         <input type="text" class="js-range-slider" name="my_range">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                
                                <!-- Job Locations Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#locations" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Job Locations</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse" id="locations" data-bs-parent="#locations">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            

                                                            <!-- Tambahan -->
                                                            @php
                                                            $displayedRegencies = [];
                                                        @endphp
                                                        
                                                        @foreach($jobs as $moreJob)
                                                            @if(!in_array($moreJob->regency_id, $displayedRegencies))
                                                                <li>
                                                                    <input value="{{ $moreJob->regency_id }}" data-display="Lokasi" name="location" type="radio">
                                                                    <label for="e2" class="form-check-label">{{ $moreJob->regency->name }}</label>
                                                                </li>
                                                                
                                                                @php
                                                                    $displayedRegencies[] = $moreJob->regency_id;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Expected Salary Search -->

                                <!-- Job types Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#jbtypes" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Job Type</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse" id="jbtypes" data-bs-parent="#jbtypes">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            <li>
                                                                <input value="Full-time" id="e2" class="form-check-input" name="type" type="radio">
                                                                <label for="e2" class="form-check-label">Full time</label>
                                                            </li>
                                                            <li>
                                                                <input value="Part-Time" id="e3" class="form-check-input" name="type" type="radio">
                                                                <label for="e3" class="form-check-label">Part Time</label>
                                                            </li>
                                                            <li>
                                                                <input value="Contract" class="form-check-input" name="type" type="radio" >
                                                                <label for="e4" class="form-check-label">Contract Base</label>
                                                            </li>
                                                            <li>
                                                                <input value="Internship" class="form-check-input" name="type" type="radio">
                                                                <label for="e5" class="form-check-label">Internship</label>
                                                            </li>
                                                            <li>
                                                                <input value="Regular" class="form-check-input" name="type" type="radio">
                                                                <label for="e6" class="form-check-label">Regular</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <!-- Experience Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#experience" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Experience</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse" id="experience" data-bs-parent="#experience">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            @php
                                                            $displayedExperiences = [];
                                                        @endphp
                                                        
                                                        @foreach($jobs->sortBy('work_experience') as $moreJob)
                                                            @if(!in_array($moreJob->work_experience, $displayedExperiences))
                                                                <li>
                                                                    <input value="{{ $moreJob->work_experience }}" data-display="workexperience" name="workexperience" type="radio">
                                                                    <label for="e2" class="form-check-label">{{ $moreJob->work_experience }}</label>
                                                                </li>
                                                                
                                                                @php
                                                                    $displayedExperiences[] = $moreJob->work_experience;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <!-- Job Level Search -->
                                <div class="single_search_boxed px-4 pt-0 br-bottom">
                                    <div class="widget-boxed-header">
                                        <h4>
                                            <a href="#jblevel" data-bs-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md collapsed">Job Level</a>
                                        </h4>
                                        
                                    </div>
                                    <div class="widget-boxed-body collapse" id="jblevel" data-bs-parent="#jblevel">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body p-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list filter-list">
                                                            <li>
                                                                <input id="f1" class="form-check-input" name="ADA" type="checkbox" checked="">
                                                                <label for="f1" class="form-check-label">Team Leader</label>
                                                            </li>
                                                            <li>
                                                                <input id="f2" class="form-check-input" name="Parking" type="checkbox">
                                                                <label for="f2" class="form-check-label">Manager</label>
                                                            </li>
                                                            <li>
                                                                <input id="f3" class="form-check-input" name="Coffee" type="checkbox">
                                                                <label for="f3" class="form-check-label">Junior</label>
                                                            </li>
                                                            <li>
                                                                <input id="f4" class="form-check-input" name="Coffee" type="checkbox">
                                                                <label for="f4" class="form-check-label">Senior</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group filter_button pt-3 pb-3 px-4">
                                <button type="submit" class="btn btn-primary full-width">Search job</button>
                            </div>
                        </div>							
                    </div>
                </div>
                

                
            </div>
            <!-- Sidebar End -->
            
            <div class="col-lg-8 col-md-12 col-sm-12">
            
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="item-shorting-box">
                            <div class="item-shorting clearfix">
                                <div class="left-column">
                                    <h4 class="m-0">
                                        Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} Results
                                    </h4>
                                </div>
                            </div>
                            {{-- <div class="item-shorting-box-right">
                                <div class="shorting-by small">
                                    <select id="pagination-select">
                                        <option value="8">8 Per Page</option>
                                        <option value="16">16 Per Page</option>
                                        <option value="32">32 Per Page</option>
                                        <option value="64">64 Per Page</option>
                                    </select>
                                </div>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
                
                
                <!-- Start All List -->
                <div class="row justify-content-center gx-xl-3 gx-3 gy-4">
    

                    @foreach($jobs as $job)
						<!-- Single Item -->
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="jbs-grid-layout border">
								<div class="right-tags-capt">
									<span class="featured-text">Featured</span>
									<span class="urgent">Urgent</span>
								</div>
								<div class="jbs-grid-emp-head">
									<div class="jbs-grid-emp-content">
										<div class="jbs-grid-emp-thumb"><a href="job-detail.html"><figure>
											@if($job->image)
												<img src="{{ (Storage::disk('s3')->url('job/'.$job->image)) }}" alt="blog image">
											@else
												<img src="https://placehold.co/250x250" class="img-fluid" alt="">
											@endif
											
										</figure></a></div>
										<div class="jbs-grid-job-caption">
											<div class="jbs-job-employer-wrap"><span> {{ Str::limit($job->company->name, 20) }}</span></div>
											<div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title"> {{ Str::limit($job->title, 20) }}</a></h4></div>
										</div>
									</div>
								</div>
								<div class="jbs-grid-job-description">
									<p>{!! Str::limit(strip_tags($job->deskription), 100) !!}</p>
								</div>
								<div class="jbs-grid-job-edrs">
									<div class="jbs-grid-job-edrs-group">
										<span><i class="fa-solid fa-location-dot me-1"></i>London</span>
										<span><i class="fa-regular fa-clock me-1"></i>{{ $job->type }}</span>
										<span><i class="fa-solid fa-calendar-days me-1"></i>1 Hours ago</span>
									</div>
								</div>
								<div class="jbs-grid-job-apply-btns">
									<div class="jbs-btn-groups">
										<div class="jbs-sng-blux"><div class="jbs-grid-package-title smalls"><h5>Rp {{ $job->salary }}<span></span></h5></div></div>
										<div class="jbs-sng-blux"><a href="{{ route('jobdetails', ['id' => $job->id]) }}" class="btn btn-md btn-primary px-4">Quick Apply</a></div>
									</div>
								</div>
							</div>	
						</div>

						@endforeach
										
                    

                    
                    </div>
                
                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @if ($jobs->onFirstPage())
                                <li class="page-item">
                                    <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                    </a>
                                  </li>             
                                @else

                                    <li class="page-item">
                                        <a class="page-link"  href="{{ $jobs->previousPageUrl() }}" aria-label="Previous">
                                          <span aria-hidden="true">&laquo;</span>
                                        </a>
                                      </li>
                                @endif
                        
                                @php
                                    $lastPage = $jobs->lastPage();
                                    $currentPage = $jobs->currentPage();
                                    $delta = 2;
                                    $from = max($currentPage - $delta, 1);
                                    $to = min($currentPage + $delta, $lastPage);
                                @endphp
                        
                                @if ($from > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $jobs->url(1) }}">1</a>
                                    </li>
                                    @if ($from > 2)
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a>
                                        </li>
                                    @endif
                                @endif
                        
                                @for ($i = $from; $i <= $to; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $jobs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                        
                                @if ($to < $lastPage)
                                    @if ($to < $lastPage - 1)
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a>
                                        </li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $jobs->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif
                        
                                @if ($jobs->hasMorePages())
                                

                                    <li class="page-item">
                                        <a class="page-link" href="{{ $jobs->nextPageUrl() }}" aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                        </a>
                                      </li>

                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                        </a>
                                      </li>
                                @endif
                            </ul>
                        </nav>
                        
                    </div>
                </div>
        
            </div>
            
        </div>
    </div>		
</section>
</form>
<!-- ============================ All List Wrap ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="bg-cover" style="background:#016551 url({{ asset('') }}giganusa/img/footer-bg-dark.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
                
                <div class="call-action-wrap">
                    <div class="sec-heading center">
                        <h2 class="mb-3 text-light">Find The Perfect Job<br>on Job Stock That is Superb For You</h2>
                        <p class="text-light">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias</p>
                    </div>
                    <div class="call-action-buttons mt-3">
                        <a href="JavaScript:Void(0);" class="btn btn-lg btn-dark font--medium px-xl-5 px-lg-4 me-2">Upload resume</a>
                        <a href="JavaScript:Void(0);" class="btn btn-lg btn-whites font--medium px-xl-5 px-lg-4">Join Our Team</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->
          
@endsection


@push('after-script')


<script>
    // Get the pagination select element
    const paginationSelect = document.getElementById('pagination-select');

    // Add an event listener to the select element
    paginationSelect.addEventListener('change', function() {
        // Get the selected option value
        const selectedValue = this.value;

        // Call the function to update the pagination
        updatePagination(selectedValue);
    });

    // Function to update the pagination
    function updatePagination(itemsPerPage) {
        // Perform the pagination based on the selected value
        $jobs = $jobs.paginate(itemsPerPage);
        $currentPage = $jobs.currentPage();

        // Call the function to update the view or perform any other necessary actions
        updateView($jobs, $currentPage);
    }

    // Function to update the view (replace with your implementation)
    function updateView(jobs, currentPage) {
        // Replace this with your logic to update the view using the updated $jobs and $currentPage values
        console.log('Updated $jobs:', jobs);
        console.log('Updated $currentPage:', currentPage);
    }
</script>

@endpush


