@extends('guru/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/guru-absensi.js')}}'></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        {!! Breadcrumbs::render('guruabsensi'); !!}
        <div class="page-header">
            <h1>
                {{$title}} <br />
                <small>Absensi Siswa di website SMA Negeri 1</small>
            </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<!-- end: PAGE HEADER -->
<!-- start: PAGE CONTENT -->
<div class="row" ng-controller="absensi">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="form-group connected-group">
                    <form name="inputabsensi" action="{{route('guru.absensi.create')}}" method="POST">
                        <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
                        <label class="control-label">
                            Masukan Input Absensi<span class="symbol required"></span>
                        </label>
                        <div class="row">
                            <div class="col-md-2">
                                <select name="tanggal" class="form-control" ng-model="data.tanggal">
                                    <option ng-repeat="unit in date" ng-selected="unit.id == data.tanggal" value="<%unit.id%>"><% unit.label %></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="bulan" class="form-control" ng-model="data.bulan">
                                    <option ng-repeat="unit in bulan" ng-selected="unit.id == data.bulan" value="<%unit.id%>"><% unit.label %></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="tahun" class="form-control" ng-model="data.tahun">
                                    <option ng-repeat="unit in tahun" ng-selected="unit.id == data.tahun" value="<%unit.id%>"><% unit.label %></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="kelas" class="form-control" ng-model="data.kelas">
                                    <option ng-repeat="unit in kelas" ng-selected="unit.id == data.kelas" value="<%unit.id%>"><% unit.label %></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-bricky" value="Submit">
                            </div>
                    </form>
                </div>
            </div>
            <div class="form-group connected-group">
                <form name="lihatabsensi" action="{{route('guru.absensi.show')}}" method="POST">
                    <label class="control-label">
                        Lihat Absensi<span class="symbol required"></span>
                    </label>
                    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
                    <div class="row">
                        <div class="col-md-2">
                            <select name="tanggal" class="form-control" ng-model="data.tanggal">
                                <option ng-repeat="unit in date" ng-selected="unit.id == data.tanggal" value="<%unit.id%>"><% unit.label %></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="bulan" class="form-control" ng-model="data.bulan">
                                <option ng-repeat="unit in bulan" ng-selected="unit.id == data.bulan" value="<%unit.id%>"><% unit.label %></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="tahun" class="form-control" ng-model="data.tahun">
                                <option ng-repeat="unit in tahun" ng-selected="unit.id == data.tahun" value="<%unit.id%>"><% unit.label %></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="kelas" class="form-control" ng-model="data.kelas">
                                <option ng-repeat="unit in kelas" ng-selected="unit.id == data.kelas" value="<%unit.id%>"><% unit.label %></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-bricky" value="Submit">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop