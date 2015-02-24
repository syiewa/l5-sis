@extends('guru/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/guru-pengumuman.js')}}'></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        {!! Breadcrumbs::render('gurupengumumanedit'); !!}
        <div class="page-header">
            <h1>{{$title}}</h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<div class="row" ng-controller="pengumumanedit">
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
                    <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                    <form class="form-horizontal" role="form" name="beritaForm" ng-submit="submit()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1"> Judul Pengumuman </label>
                            <div class="col-sm-9">
                                <input type='text' class='col-sm-10 form-control' name='judul_pengumuman' ng-model="data.judul_pengumuman"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1"> Isi </label>
                            <div class="col-sm-9">
                                <textarea class="ckeditor form-control" cols="10" rows="10" name="editor1" ng-model='data.isi'>
                                            {{$data->isi}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit">
                                    Save
                                </button>
                                <a href='{{route('admin.pengumuman.index')}}' class="btn btn-blue">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop