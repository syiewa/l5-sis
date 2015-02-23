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
@section('content')
<div class="col-md-9">
    <section class="wrapper portfolio-page">
            <!-- GRID -->
            <ul id="Grid" class="list-unstyled">
                @foreach($foto as $galeri)
                <li class="col-md-3 col-xs-9 mix category_1" data-cat="1">
                    <div class="portfolio-item img-thumbnail">
                        <a class="thumb-info group1" href="{{url('upload/besar/'.$galeri->foto_besar)}}">
                            <img src="{{url('upload/kecil/'.$galeri->foto_kecil)}}" class="img-responsive" alt="">
                            <span class="thumb-info-title"> <span class="thumb-info-type">{{$galeri->foto_kecil}}</span> </span>
                            <span class="image-overlay"> <i class="fa fa-mail-forward circle-icon circle-main-color"></i> </span>
                        </a>
                    </div>
                </li>
                @endforeach
                <li class="gap"></li>
                <!-- "gap" elements fill in the gaps in justified grid -->
            </ul>
    </section>
</div>
@stop