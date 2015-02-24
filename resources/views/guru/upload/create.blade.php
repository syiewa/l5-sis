@extends('guru/templates/index')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}">
@stop
@section('js')
<script src='{{asset('assets/js/controller/guru-upload.js')}}'></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        {!! Breadcrumbs::render('guruuploadcreate'); !!}
        <div class="page-header">
            <h1>{{$title}}</h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<div class="row" ng-controller="uploadcreate">
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
                            <label class="col-sm-2 control-label" for="form-field-1"> Judul Upload </label>
                            <div class="col-sm-9">
                                <input type='text' class='col-sm-10 form-control' name='judul_upload' ng-model='data.judul_file'/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1"> File </label>
                            <div class="col-sm-5">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <div class="input-group-btn">
                                            <div class="btn btn-light-grey btn-file">
                                                <span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
                                                <input type="file" class="file-input" name='file' ng-file-select="" ng-model="data.file">
                                            </div>
                                            <a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit">
                                    Save
                                </button>
                                <a href='{{route('guru.upload.index')}}' class="btn btn-blue">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop