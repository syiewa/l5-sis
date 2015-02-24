@extends('guru/templates/index')
@section('content')
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
                <h2>Manajemen Pengumuman</h2>
            </div>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
            </div>
            <a class="view-more" href="{{route('guru.pengumuman.index')}}">
                View More <i class="clip-arrow-right-2"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="core-box">
            <div class="heading">
                <i class="clip-clip circle-icon circle-teal"></i>
                <h2>Manajemen File</h2>
            </div>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
            </div>
            <a class="view-more" href="{{route('guru.upload.index')}}">
                View More <i class="clip-arrow-right-2"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="core-box">
            <div class="heading">
                <i class="clip-users-2 circle-icon circle-bricky"></i>
                <h2>Manajemen Absensi</h2>
            </div>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
            </div>
            <a class="view-more" href="{{route('guru.absensi.index')}}">
                View More <i class="clip-arrow-right-2"></i>
            </a>
        </div>
    </div>
</div>
@stop