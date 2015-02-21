@extends('front/templates/index')
@section('content')
@if($page)
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