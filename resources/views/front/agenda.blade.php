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
                <h2>{{$agendalist->tema_agenda}}</h2>
                <span><i class="fa fa-calendar"></i> 
                    {{date('d F Y',strtotime($agendalist->tgl_mulai))}} - 
                    {{date('d F Y',strtotime($agendalist->tgl_selesai))}}
                </span>
                <span> Jam
                    <a href="#">
                        {{$agendalist->jam}}
                    </a> </span>
                <p><b> Tempat : </b><br/>
                    {!!$agendalist->tempat!!}
                </p>
                <p><b> Deskripsi : </b><br/>
                    {!!$agendalist->isi!!}
                </p>
                <p><b> Keterangan : </b><br/>
                    {!!$agendalist->keterangan!!}
                </p>
            </div>
        </article>
    </div>
</div>
@stop