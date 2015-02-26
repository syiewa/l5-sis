@extends('front/templates/index')
@section('bread')
<section class="page-top">
    <div class="container">
        <div class="col-md-4 col-sm-4">
            <h1>{{$title}}</h1>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src='{{asset('assets/js/angular.min.js')}}'></script>
<script src='{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}'></script>
<script src='{{asset('assets/js/angular-block-ui.min.js')}}'></script>
<script src='{{asset('assets/js/siswa.js')}}'></script>
@endsection
@section('content')
<div class="col-md-9" ng-app="siswa">
    <div ng-controller="kelas">
        <div class='row'>
            <div class="form-group">
                <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                    <label class="col-sm-2 control-label" for="form-field-1"> Kelas </label>
                    <div class="col-sm-5">
                        <select name="id_kelas" class="form-control" ng-model="data.id_kelas">
                            <option value="">Pilih Kelas</option>
                            <option ng-repeat="unit in kelas" value="<%unit.id%>"><% unit.label %></option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <button class="btn btn-blue" type="submit">Submit</button>
                    </div>
                </form>
            </div> 
        </div>
        <div class='row' ng-show='show'>
            <br/>
            <table id="sample-table-1" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="kampret in telo">
                        <td><%$index+1%>
                        </td>
                        <td><%kampret['nis']%>
                        </td>
                        <td><%kampret['nama_siswa']%>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop