@extends('backend/templates/index')
@section('content')
<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                {!! Breadcrumbs::render('home'); !!}
                <div class="page-header">
                    <h1>
                        Home<br />
                        <small>Halaman Administrator SMA N 1</small>
                    </h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-user-4 circle-icon circle-green"></i>
                        <h2>Manajemen Data Statis</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.datastatis.index')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-clip circle-icon circle-teal"></i>
                        <h2>Manajemen Data Dinamis</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.dashboard.datadinamis')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-users-2 circle-icon circle-bricky"></i>
                        <h2>Manajemen Sekolah</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.dashboard.sekolah')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-list-5 circle-icon circle-green"></i>
                        <h2>Manajemen Polling</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.polling.index')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-images-2 circle-icon circle-teal"></i>
                        <h2>Manajemen Galeri</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.galeri.index')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="core-box">
                    <div class="heading">
                        <i class="clip-calendar circle-icon circle-bricky"></i>
                        <h2>Manajemen Absensi</h2>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>
                    <a class="view-more" href="{{route('admin.absensi.index')}}">
                        View More <i class="clip-arrow-right-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop