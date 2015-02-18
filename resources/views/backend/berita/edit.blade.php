@extends('backend/templates/index')

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
                                        <div class="wrap-image">
                                            <img src="{{asset('/upload/'.$data->gambar)}}" alt="" class="img-responsive" height="100px" width="100px">
                                        </div>
                                        <span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                                            <input type="file" name="gambar" accept="image/*" ng-file-select="" ng-model="data.foto">
                                        </span>
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