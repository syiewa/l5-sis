<div class="main-navigation navbar-collapse collapse">
    <!-- start: MAIN MENU TOGGLER BUTTON -->
    <!-- end: MAIN MENU TOGGLER BUTTON -->
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li class='{{setActive('')}}'>
            <a href="{{url('/admin')}}"><i class="clip-home-3"></i>
                <span class="title"> Dashboard </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('pengumuman')}}'>
            <a href="{{route('guru.pengumuman.index')}}"><i class="	clip-file-powerpoint "></i>
                <span class="title"> Pengumuman </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('upload')}}'>
            <a href="{{route('guru.upload.index')}}"><i class="clip-upload"></i>
                <span class="title"> Upload Berkas/File </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('absensi')}}'>
            <a href="{{route('guru.absensi.index')}}"><i class="clip-checkbox "></i>
                <span class="title"> Input Absensi </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('pegawai')}}'>
            <a href="{{route('guru.pegawai.edit',Auth::user()->id_kepegawaian)}}"><i class="clip-key-2"></i>
                <span class="title"> Ganti Password </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('/')}}'>
            <a href="{{url('/')}}" target="_newtab"><i class="clip-world"></i>
                <span class="title"> Website SMAN1 </span><span class="selected"></span>
            </a>
        </li>
        <li class='{{setActive('/')}}'>
            <a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>
                <span class="title"> Logout </span><span class="selected"></span>
            </a>
        </li>
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->
</div>