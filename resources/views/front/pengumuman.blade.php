@extends('front/templates/index')
@section('content')
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
@stop