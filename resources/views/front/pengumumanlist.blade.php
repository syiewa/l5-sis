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
        @foreach($pengumumanlist as $umum)
        <article>
            <div class="row">
                <div class="col-md-12">
                    <div class="post-content">
                        <h2>
                            <a href="{{url('pengumuman',$umum->id_pengumuman)}}">
                                {{$umum->judul_pengumuman}}
                            </a></h2>
                        {!!substr($umum->isi,0,230)!!}..
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="post-meta">
                        <span><i class="fa fa-calendar"></i> {{date('d F Y',strtotime($umum->tanggal))}}</span>
                        <span><i class="fa fa-user"></i> By
                            <a href="#">
                                {{$umum->penulis}}
                            </a> </span>
                        <a class="btn btn-xs btn-main-color pull-right" href="{{url('pengumuman',$umum->id_pengumuman)}}">
                            Read more...
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
        {!!$pengumumanlist->render()!!}
    </div>
</div>
@stop