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
    <div ng-controller="absensi">
        <div class='row'>
            <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                <div class="form-group">
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
                </div> 
            </form>
        </div>
        <div class='row' ng-show='show'>
            <br/>
            <table id="sample-table-1" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Hadir</th>
                        <th>Ijin</th>
                        <th>Sakit</th>
                        <th>Bolos</th>
                        <th>Alpha</th>
                        <th>Dispensasi</th>
                        <th>Skorsing</th>
                        <th>Total</th>
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
                        <td><%kampret['hadir']%>
                        </td>
                        <td><%kampret['ijin']%>
                        </td>
                        <td><%kampret['sakit']%>
                        </td>
                        <td><%kampret['bolos']%>
                        </td>
                        <td><%kampret['alpha']%>
                        </td>
                        <td><%kampret['dispen']%>
                        </td>
                        <td><%kampret['skorsing']%>
                        </td>
                        <td><%kampret['total']%>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop