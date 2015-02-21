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
    <div class="blog-posts">
        @foreach($beritalist as $new)
        <article>
            <div class="row">
                <div class="col-md-5">
                    <div class="post-image">
                        <div class="flexslider" data-plugin-options='{"directionNav":true}'>
                            <ul class="slides">
                                <li>
                                    <img src="{{asset('upload/berita/'.$new->gambar)}}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="post-content">
                        <h2>
                            <a href="{{url('berita',$new->id_berita)}}">
                                {{$new->judul_berita}}
                            </a></h2>
                        {!!substr($new->isi,0,230)!!}..
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="post-meta">
                        <span><i class="fa fa-calendar"></i> {{date('d F Y',strtotime($new->tanggal))}}</span>
                        <span><i class="fa fa-user"></i> By
                            <a href="#">
                                {{$new->author}}
                            </a> </span>
                        <a class="btn btn-xs btn-main-color pull-right" href="{{url('berita',$new->id_berita)}}">
                            Read more...
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
        {!!$beritalist->render()!!}
    </div>
</div>
@stop