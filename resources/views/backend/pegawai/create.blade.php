@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-pegawai.js')}}'></script>
@stop
@section('content')
<div class="main-content" ng-controller="pegawaicreate">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                {!! Breadcrumbs::render('pegawaicreate'); !!}
                <div class="page-header">
                    <h1>{{$title}}</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs tab-bricky" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#panel_tab2_example1">
                                <i class="green fa fa-home"></i> {{$title}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="panel_tab2_example1" class="tab-pane active">
                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                            <form class="form-horizontal" role="form" name="pegawaiForm" ng-submit="submit()" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> NIP </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='nip' ng-model='data.nip'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Nama Pegawai </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='nama_pegawai' ng-model='data.nama_pegawai'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Kelahiran </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='kelahiran' ng-model='data.kelahiran'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Mata Pelajaran </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='matpel' ng-model='data.matpel'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Jenis Kelamin </label>
                                    <div class="col-sm-9">
                                        <select name="data.id" class="form-control" ng-model="data.jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option ng-repeat="unit in jk" value="<% unit.id %>"><% unit.label %></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Status </label>
                                    <div class="col-sm-9">
                                        <select name="data.id" class="form-control" ng-model="data.status" required>
                                            <option value="">Pilih Jabatan</option>
                                            <option ng-repeat="unit in status" value="<% unit.id %>"><% unit.label %></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Username</label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='username' ng-model='data.username'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Password </label>
                                    <div class="col-sm-7">
                                        <input type='password' class='col-sm-10 form-control' name='password' ng-model='data.password'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" type="submit">
                                            Save
                                        </button>
                                        <a href='{{route('admin.pegawai.index')}}' class="btn btn-blue">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop