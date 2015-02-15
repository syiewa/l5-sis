@extends('backend/templates/index')

@section('content')
<div class="main-content" ng-controller="datastatis">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        Dashboard
                    </li>
                    <li class="search-box">
                        <form class="sidebar-search">
                            <div class="form-group">
                                <input type="text" placeholder="Start Searching...">
                                <button class="submit">
                                    <i class="clip-search-3"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ol>
                <div class="page-header">
                    <h1>{{$title}}</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
                <div class="col-md-12">
                    <!-- start: BASIC TABLE PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-external-link-square"></i>
                            Menu Data Statis
                            <div class="panel-tools">
                                <a href="#" class="btn btn-xs btn-link panel-collapse collapses">
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-green add-row" href="{{route('datastatis.create')}}">
                                Add New <i class="fa fa-plus"></i>
                            </a>
                            <div class="pull-right col-sm-5">
                                <input class="form-control col-md-12" ng-model="query"  placeholder="Search">
                            </div>
                            <table id="sample-table-1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">Data ID</th>
                                        <th>Judul Data</th>
                                        <th>ID Parent</th>
                                        <th>Level</th>
                                        <th class="hidden-xs center">Aksi Data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="status in data | filter:query">
                                        <td class="center"><% status['id'] %></td>
                                        <td><% status['title'] %></td>
                                        <td><% status['id_parent'] %></td>
                                        <td><% status['level'] %></td>
                                        <td class="center">
                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-teal tooltips" href="#"><i class="fa fa-edit"></i></a>
                                                <a data-original-title="Share" data-placement="top" class="btn btn-xs btn-green tooltips" href="#"><i class="fa fa-share"></i></a>
                                                <a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-bricky tooltips" href="#"><i class="fa fa-times fa fa-white"></i></a>
                                            </div>
                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                <div class="btn-group">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                        <i class="fa fa-cog"></i> <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li role="presentation">
                                                            <a href="#" tabindex="-1" role="menuitem">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a href="#" tabindex="-1" role="menuitem">
                                                                <i class="fa fa-share"></i> Share
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a href="#" tabindex="-1" role="menuitem">
                                                                <i class="fa fa-times"></i> Remove
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: BASIC TABLE PANEL -->
    </div>
@stop