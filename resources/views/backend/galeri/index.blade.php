@extends('backend/templates/index')

@section('content')
<div class="main-content" ng-controller="galeri">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                {!! Breadcrumbs::render('galeri'); !!}
                <div class="page-header">
                    <h1>
                        {{$title}} <br />
                        <small>Menambahkan Album Galeri di situs website SMA Negeri 1</small>
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
                    <a class="btn btn-green add-row" href="{{route('admin.galeri.create')}}">
                        Tambah Kelas <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="col-sm-7">
                    <fieldset>
                        <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1"> Tambah Album </label>
                                <div class="col-sm-5">
                                    <input type='text' class='col-sm-10 form-control' name='nama_album' ng-model='post.nama_album'/>
                                </div>
                                <div class="col-sm-5">
                                    <button class="btn btn-success" type="submit">
                                        Save
                                    </button>
                                    <button type="reset" class="btn btn-blue">Reset</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- start: BASIC TABLE PANEL -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <input class="form-control pull-right" ng-model="query"  placeholder="Search">
                        </div>
                        <table id="sample-table-1" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Album Galeri</th>
                                    <th class="hidden-xs center">Aksi Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="status in data| filter:paginate">
                                    <td><% status['nama_album'] %></td>
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a data-original-title="Siswa" data-placement="top" class="btn btn-xs btn-success tooltips" href="{{url('admin/galeri')}}/<% status['id_album']%>/siswa"><i class="fa fa-user"></i> Lihat Siswa</a>
                                            <a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-teal tooltips" href="{{url('admin/galeri')}}/<% status['id_album']%>/edit"><i class="fa fa-edit"></i></a>
                                            <a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-bricky tooltips" href="#" ng-click="delete(status['id_album'])"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li role="presentation">
                                                        <a href="{{url('admin/siswa')}}/<% status['id_album']%>/edit" tabindex="-1" role="menuitem">
                                                            <i class="fa fa-user"></i> Lihat Siswa
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="{{url('admin/galeri')}}/<% status['id_album']%>/edit" tabindex="-1" role="menuitem">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_album'])">
                                                            <i class="fa fa-times"></i> Remove 
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
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
        <!-- end: BASIC TABLE PANEL -->
    </div>
    @stop