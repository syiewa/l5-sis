<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <!-- end: RESPONSIVE MENU TOGGLER -->
            <!-- start: LOGO -->
            <a class="navbar-brand" href="{{url()}}">
                SMA NEGERI 1
            </a>
            <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                        <span class="username">{{$user->nama_pegawai}}</span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('admin.pegawai.edit',$user->id_kepegawaian)}}">
                                <i class="clip-user-2"></i>
                                &nbsp;My Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{url('logout')}}">
                                <i class="clip-exit"></i>
                                &nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
        <!-- start: HORIZONTAL MENU -->
        <div class="horizontal-menu navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class='{{setActive('')}}'>
                    <a href="{{url('/admin')}}">
                        Dashboard
                    </a>
                </li>
                <li class="{{setActive('admin.datastatis')}}">
                    <a href="{{route('admin.datastatis.index')}}">
                        Data Statis   
                    </a>
                </li>
                <li class="{{setActive('admin.berita')}}  {{setActive('admin.pengumuman')}}  {{setActive('admin.agenda')}}">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                        <span class="selected"></span>
                        Data Dinamis <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{setActive('admin.berita')}}">
                            <a href="{{route('admin.berita.index')}}">
                                Index Berita
                            </a>
                        </li>
                        <li class="{{setActive('admin.pengumuman')}}">
                            <a href="{{route('admin.pengumuman.index')}}">
                                Pengumuman
                            </a>
                        </li>
                        <li class="{{setActive('admin.agenda')}}">
                            <a href="{{route('admin.agenda.index')}}">
                                Agenda Sekolah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{setActive('admin.kelas')}} {{setActive('admin.siswa')}} {{setActive('admin.pegawai')}}">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                        <span class="selected"></span>
                        Sekolah <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{setActive('admin.kelas')}}{{setActive('admin.siswa')}}">
                            <a href="{{route('admin.kelas.index')}}">
                                Data Kelas & Siswa
                            </a>
                        </li>
                        <li class="{{setActive('admin.pegawai')}}">
                            <a href="{{route('admin.pegawai.index')}}">
                                Data Kepegawaian
                            </a>
                        </li>
                        <li class="{{setActive('admin.alumni')}}">
                            <a href="#">
                                Data Alumni
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{setActive('admin.polling')}}">
                    <a href="{{route('admin.polling.index')}}">
                        Polling
                    </a>
                </li>
                <li class="{{setActive('admin.galeri')}}">
                    <a href="{{route('admin.galeri.index')}}">
                        Gallery
                    </a>
                </li>
                <li class="{{setActive('admin.absensi')}}">
                    <a href="{{route('admin.absensi.index')}}">
                        Absensi
                    </a>
                </li>
                <li class="{{setActive('admin.upload')}}">
                    <a href="{{route('admin.upload.index')}}">
                        Upload
                    </a>
                </li>
            </ul>
        </div>
        <!-- end: HORIZONTAL MENU -->
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>