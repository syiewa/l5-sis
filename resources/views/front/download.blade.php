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
    @foreach($download as $dl)
    <div class="panel-group accordion-custom accordion-teal" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$dl->id_download}}">
                        <i class="icon-arrow"></i>
                        {{$dl->judul_file}}
                    </a></h4>
            </div>
            <div id="collapse{{$dl->id_download}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>
                        <strong>Tanggal Upload:</strong> {{date('d F m',strtotime($dl->tgl_posting))}}
                    </p>
                    <p>
                        <strong>Oleh:</strong> {{$dl->author}}
                    </p>
                    <p>
                        <a href="{{asset('upload/file/'.$dl->nama_file)}}" class="btn btn-main-color pull-bottom" target="_blank">
                            Download
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {!!$download->render()!!}
</div>
@stop