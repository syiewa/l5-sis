@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-datastatis.js')}}'></script>
@stop
@section('content')
<div class="main-content" ng-controller="datastatiscreate">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                {!! Breadcrumbs::render('datastatiscreate') !!}
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
                            <form class="form-horizontal" role="form" name="dataStatisForm" ng-submit="submit()">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Kategori </label>
                                    <div class="col-sm-9">
                                        <select name="data.id" class="form-control" ng-model="data.data_id" required>
                                            <option value="">Pilih Menu</option>
                                            <option ng-repeat="unit in menu" value="<% unit.id %>"><% unit.label %></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Konten </label>
                                    <div class="col-sm-9">
                                        <textarea class="ckeditor form-control" cols="10" rows="10" name="editor1" ng-model="data.content"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" type="submit">
                                            Save
                                        </button>
                                        <a href='{{route('admin.datastatis.index')}}' class="btn btn-blue">Back</a>
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