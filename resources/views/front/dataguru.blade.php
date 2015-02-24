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
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <h1 class="center">Data Guru SMAN 1</h1>
                <p class="center">
                    <img src="{{asset('upload/dewan-guru.jpg')}}" />
                </p>
                <hr>
            </div>
        </div>
        <?php
        $open = 0;
        $close = 1;
        $i = 0;
        ?>
        @foreach($guru as $gr)
        @if($open % 3 == 0)
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <ul class="team-list animate-group">
                        @endif
                        <li class="col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <img class="animate" src="{{ $gr->jk == 'L' ? asset('assets/images/team-8.jpg') : asset('assets/images/team-7.jpg') }}" alt="" data-animation-options='{"animation":"fadeInRight", "duration":"300"}'>
                            </div>
                            <h3>{{$gr->nama_pegawai}}</h3>
                            <div itemprop="description" class="team-member-description">
                                <p>
                                    <strong>NIP : </strong>{{$gr->nip}}
                                </p>
                                <p>
                                    <strong>Guru Mata Pelajaran : </strong>{{$gr->matpel}}
                                </p>
                                <p>
                                    <strong>Kelahiran : </strong>{{$gr->kelahiran}}
                                </p>
                            </div>
                        </li>
                        @if($close % 3 == 0)
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <?php $i++;$open++;$close++ ?>
        @endforeach
    </section>
    {!!$guru->render()!!}
</div>
@stop