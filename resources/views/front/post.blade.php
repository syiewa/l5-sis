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
@if(count($page))
<div class="col-md-9">
    <div class="blog-posts post-page">
        <article>
            <div class="post-content">
                <h2>{{$page->menu->title}}</h2>
                <div class="post-meta">
                </div>
                {!!$page->content!!}
        </article>
    </div>
</div>
@else 
<div class="col-md-9">
    <div class="blog-posts post-page">
        <article>
            Maaf Data Tidak Diketemukan
        </article>
    </div>
</div>
@endif
@stop