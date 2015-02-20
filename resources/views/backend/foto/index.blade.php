@extends('backend/templates/index')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/colorbox/example2/colorbox.css')}}">
@stop
@section('js')
<script src='{{asset('assets/js/controller/admin-foto.js')}}'></script>
@stop
@section('content')
<div class="main-content" ng-controller="foto">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                {!! Breadcrumbs::render('foto',$album_id); !!}
                <div class="page-header">
                    <h1>
                        {{$title}} <%title%><br />
                        <small>Menambahkan foto pada album <%title%></small>
                    </h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                <div class="col-sm-2">
                    <a class="btn btn-green add-row" href="{{route('admin.galeri.{id}.foto.create', $album_id)}}">
                        Tambah Foto <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-3 col-sm-4 gallery-img" ng-repeat="status in data| filter:paginate">
                <div class="wrap-image">
                    <a title="<%status['foto_kecil']%>" href="{{asset('upload/besar')}}/<%status['foto_besar']%>" class="group1">
                        <img class="img-responsive" alt="" src="{{asset('upload/kecil')}}/<%status['foto_kecil']%>">
                    </a>
                    <div class="tools tools-bottom">
                        <a href="{{url('admin/galeri/'.$album_id)}}/foto/<% status['id_foto']%>/edit">
                            <i class="clip-pencil-3 "></i>
                        </a>
                        <a href="#" ng-click="delete(status['id_foto'])">
                            <i class="clip-close-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <pagination total-items="totalItems" ng-model="currentPage"
                    max-size="10" boundary-links="true"
                    items-per-page="numPerPage" class="pagination-sm">
        </pagination>
        <!-- end: BASIC TABLE PANEL -->
    </div>
</div>
    @stop