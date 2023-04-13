<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Amdash</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">DATA USER</div>
            </a>
            <ul>
                <li> <a href="{{ url('user') }}"><i class="bx bx-right-arrow-alt"></i>Data User</a>
                </li>
                <li> <a href="{{ url('siswa') }}"><i class="bx bx-right-arrow-alt"></i>Data Siswa</a>
                </li>
                <li> <a href="{{ url('tentor') }}"><i class="bx bx-right-arrow-alt"></i>Data Mentor</a>
                </li>
               
            </ul>
        </li>
        <li class="menu-label">Master Pelajaran</li>
        <li>
            <a href="{{ url('pelajaran') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Pelajaran</div>
            </a>
        </li>
        <li>
            <a>
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Materi</div>
            </a>
        </li>
        
      
        <li class="menu-label">Master Kelas</li>
        <li>
            <a  href="{{ url('kelas') }}">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Kelas</div>
            </a>
           
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Jadwal</div>
            </a>
        </li>

        <li class="menu-label">Mater Umum</li>
        <li>
            <a href="{{ url('pendidikan') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Pendidikan</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Transaksi</div>
            </a>
           
        </li>
       
     
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->