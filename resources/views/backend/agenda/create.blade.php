@extends('backend/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/admin-agenda.js')}}'></script>
@stop
@section('content')
<div class="main-content" ng-controller="agendacreate">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
{!! Breadcrumbs::render('agendacreate'); !!}
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
                             <form class="form-horizontal" role="form" name="agendaForm" ng-submit="submit()" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Tema Agenda </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='tema_agenda' ng-model='data.tema_agenda'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Isi </label>
                                    <div class="col-sm-9">
                                        <textarea class="ckeditor form-control" cols="10" rows="10" name="isi" ng-model="data.isi"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Tanggal Mulai </label>
                                    <div class="col-sm-3">
                                        <input type="text" 
                                               class="form-control" 
                                               placeholder="yyyy-MM-dd"
                                               datepicker-popup="yyyy-MM-dd" 
                                               ng-model="data.tgl_mulai" 
                                               is-open="mulai" 
                                               datepicker-options="dateOptions"  
                                               ng-required="true" 
                                               close-text="Close" 
                                               ng-click="mulai = true"
                                               max-date="data.tgl_selesai"
                                               name="tgl_mulai"
                                               required
                                               date-validator
                                               /></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Tanggal Selesai </label>
                                    <div class="col-sm-3">
                                        <input type="text" 
                                               class="form-control" 
                                               placeholder="yyyy-MM-dd"
                                               datepicker-popup="yyyy-MM-dd" 
                                               ng-model="data.tgl_selesai" 
                                               is-open="selesai" 
                                               datepicker-options="dateOptions"  
                                               ng-required="true" 
                                               close-text="Close" 
                                               ng-click="selesai = true"
                                               min-date="data.tgl_mulai"
                                               name="tgl_selesai"
                                               required
                                               date-validator
                                               /></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Tempat </label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='tempat' ng-model='data.tempat'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Waktu</label>
                                    <div class="col-sm-9">
                                        <input type='text' class='col-sm-10 form-control' name='waktu' ng-model='data.jam'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"> Keterangan </label>
                                    <div class="col-sm-9">
                                        <textarea class="ckeditor form-control" cols="10" rows="10" name="keterangan" ng-model="data.keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" type="submit">
                                            Save
                                        </button>
                                        <a href='{{route('admin.agenda.index')}}' class="btn btn-blue">Back</a>
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