@extends('guru/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/guru-upload.js')}}'></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        {!! Breadcrumbs::render('guruupload'); !!}
        <div class="page-header">
            <h1>
                {{$title}} <br />
                <small>Tulis upload di situs website SMA Negeri 1</small>
            </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<!-- end: PAGE HEADER -->
<!-- start: PAGE CONTENT -->
<div class="row" >
    <div class="col-md-12" ng-controller="upload">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                <a class="btn btn-green add-row" href="{{route('guru.upload.create')}}">
                    Add New <i class="fa fa-plus"></i>
                </a>
                <div class="pull-right col-sm-5">
                    <input class="form-control col-md-12" ng-model="query"  placeholder="Search">
                </div>
                <table id="sample-table-1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Judul File</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th class="center">Download Link</th>
                            <th class="hidden-xs center">Aksi Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="status in data| filter:paginate">
                            <td><% status['judul_file'] %></td>
                            <td><% status['tgl_posting'] %></td>
                            <td><% status['author'] %></td>
                            <td class='center'><a href="{{asset('upload/file')}}/<% status['nama_file'] %>">[Download]</a></td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-teal tooltips" href="{{url('guru/upload')}}/<% status['id_download']%>/edit"><i class="fa fa-edit"></i></a>
                                    <a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-bricky tooltips" href="#" ng-click="delete(status['id_download'])"><i class="fa fa-times fa fa-white"></i></a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li role="presentation">
                                                <a href="{{url('guru/upload')}}/<% status['id_download']%>/edit" tabindex="-1" role="menuitem">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_download'])">
                                                    <i class="fa fa-times"></i> Remove 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr ng-if="data.length == 0">
                            <td colspan="5" class="center">Belum Ada Data</td>
                        </tr>
                    </tbody>
                </table>
                <pagination total-items="totalItems" ng-model="currentPage"
                            max-size="10" boundary-links="true"
                            items-per-page="numPerPage" class="pagination-sm">
                </pagination>
            </div>
        </div>
    </div>
</div>
@stop