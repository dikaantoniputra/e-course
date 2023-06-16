@extends('layout.app')

@section('title')
    Tentang kami
@endsection

@section('content')


<!-- ============================ Page Title Start================================== -->
<section class="page-head bg-cover" style="background:#017efa url({{ asset('giganusa/img/side-banner3.png') }}) no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-9 col-md-12">
                
                <h1 class="text-white mb-4">Bagaimana Kami<br> & Memulai</h1>
                <p class="text-white mb-4">Ide awal kami untuk memulai GigaNusa Corporation adalah ingin memberikan kontribusi nyata dalam pembangunan infrastruktur nasional melalui penyediaan produk-produk inovatif dan berkualitas.
                    GigaNusa Corporation didirikan dengan visi dan misi untuk menjadi perusahaan teknologi terkemuka yang dapat menghasilkan produk-produk berkualitas tinggi dan memberikan solusi terbaik bagi pelanggan.
                    Pada awalnya, kami memiliki niat untuk membangun perusahaan yang bergerak di bidang teknologi informasi dan komunikasi dengan fokus pada pengembangan aplikasi dan sistem terintegrasi. </p>
                <a href="#selengkapnya" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section>

    <div class="container">
    
        <!-- row Start -->
        <div class="row align-items-center justify-content-between">

            <div class="col-lg-6 col-md-6"  id="selengkapnya">
                <div class="story-wrap explore-content">
                    
                    <h2>Mengapa Anda Memilih Kami Situs Pekerjaan ?</h2>
                    <p>Kami yakin bahwa kami dapat menawarkan kesempatan kerja yang sesuai dengan keinginan dan kualifikasi Anda.
                        Salah satu alasan mengapa Anda harus memilih kami adalah karena kami menawarkan pengalaman pencarian pekerjaan yang lebih baik dan mudah.</p>
                    <p>Kami memulai perusahaan GigaNusa Corporation dengan berkomitmen untuk menghadirkan solusi-solusi inovatif dan berdaya saing tinggi bagi industri energi dan manufaktur.
                        Sejak awal, kami memiliki impian untuk membangun perusahaan yang mampu memberikan kontribusi besar dalam pengembangan sektor pariwisata dan budaya di Indonesia.
                        Perusahaan GigaNusa Corporation bermula dari keinginan untuk menghadirkan teknologi terkini dan terdepan bagi industri pertambangan dan perminyakan di Indonesia.</p>
                    <button type="button" class="btn btn-primary">Get Started</button>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-6">
                <img src="{{ asset('') }}giganusa/img/bn-1.png" class="img-fluid" alt="">
            </div>
            
        </div>
        <!-- /row -->					
        
    </div>
            
</section>
<!-- ============================ Our Story End ================================== -->



<!-- ============================ Valuable Step Start ================================== -->
<section class="theme-bg-dark">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center light">
                    <h2>Giganusa Corps</h2>
                    <p>Kami yakin bahwa kami dapat menawarkan kesempatan kerja yang sesuai dengan keinginan dan kualifikasi Anda.</p>
                </div>
            </div>
        </div>
        
        <div class="row align-items-center gx-4 gy-4">
        
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="jobstock-posted-box-y78 colored">
                    <div class="jobstock-posted-body-y78">
                        <div class="serv-ctr-title"><h2 class="theme-2-cl">01.</h2></div>
                        <div class="serv-ctr-subtitle"><h5 class="text-light">Kembangkan Diri</h5></div>
                        <div class="serv-ctr-decs"><p class="text-light opacity-75">Kembangkan Diri Anda Lebih Cepat Dengan bergabung bersama kami</p></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="jobstock-posted-box-y78 colored">
                    <div class="jobstock-posted-body-y78">
                        <div class="serv-ctr-title"><h2 class="theme-2-cl">02.</h2></div>
                        <div class="serv-ctr-subtitle"><h5 class="text-light">Mencari Jobs</h5></div>
                        <div class="serv-ctr-decs"><p class="text-light opacity-75">Kami yakin bahwa bergabung bersama kami akan membantu Anda berkembang lebih cepat dalam karir Anda.
                            Dengan akses ke para ahli di bidang Anda, kami yakin Anda dapat mengembangkan keterampilan dan pengetahuan Anda lebih cepat.</p></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="jobstock-posted-box-y78 colored">
                    <div class="jobstock-posted-body-y78">
                        <div class="serv-ctr-title"><h2 class="theme-2-cl">03.</h2></div>
                        <div class="serv-ctr-subtitle"><h5 class="text-light">ami berdedikasi untuk membantu karyawan kami berkembang</h5></div>
                        <div class="serv-ctr-decs"><p class="text-light opacity-75">Kami berdedikasi untuk membantu karyawan kami berkembang dan mencapai tujuan karir mereka, dan bergabung bersama kami adalah langkah yang tepat untuk mencapai hal tersebut.
                            Kami memiliki program pengembangan karyawan yang inovatif dan terpercaya, yang dapat membantu Anda mencapai potensi penuh Anda.</p></div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
<!-- ============================ Valuable Step End ================================== -->


@endsection



