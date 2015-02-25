@extends('backend/templates/index')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@stop
@section('js')
<script src='{{asset('assets/js/controller/admin-berita.js')}}'></script>
@stop
@section('content')
<div class="main-content" ng-controller="beritaedit">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
{!! Breadcrumbs::render('indexberitaedit'); !!}
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
                                <i class="green fa fa-home"></i> Data Statis
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="panel_tab2_example1" class="tab-pane active">
                            <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                            <form class="form-horizontal" role="form" name="beritaForm" ng-submit="submit({{$data->id_berita}})" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Judul Berita </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='judul_berita' ng-model="data.judul_berita"/>
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
                                <div class='form-group'>
                                    <label class="col-sm-2 control-label" for="form-field-1"> Gambar </label>
                                           <div class="col-sm-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{asset('upload/berita/'.$data->gambar)}}" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                                                    <input type="file" name="file" accept="image/*" ng-file-select="" ng-model="data.foto">
                                                </span>
                                                <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                    <i class="fa fa-times"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning">
                                            <span class="label label-warning">NOTE!</span>
                                            <span> Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" type="submit">
                                            Save
                                        </button>
                                        <a href='{{route('admin.berita.index')}}' class="btn btn-blue">Back</a>
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