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
    <div class="blog-posts post-page">
        <article>
            <div class="post-content">
                <h2>{{$pengumumanlist->judul_pengumuman}}</h2>
                <span><i class="fa fa-calendar"></i> {{date('d F Y',strtotime($pengumumanlist->tanggal))}} </span>
                <span><i class="fa fa-user"></i> By
                    <a href="#">
                        {{$pengumumanlist->penulis}}
                    </a> </span>
                <p>
                    {!!$pengumumanlist->isi!!}
                </p>
            </div>
        </article>
    </div>
</div>
@stop