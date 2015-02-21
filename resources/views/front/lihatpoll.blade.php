@extends('front/templates/index')
@section('content')
<div class="col-md-9">
        <h3>Hasil Polling Sementara</h3>
        <p>
            {{$polling->soal_poll}}
        </p>
        
        <div class="progress-bars">
            @foreach($polling->jawaban as $jawaban)
            
            <div class="progress-label">
                <span>{{$jawaban->jawaban}}</span>
            </div>
            <div class="progress">
                <div aria-valuetransitiongoal="{{number_format($jawaban->counter/$total_data,2)}}" class="progress-bar main-color animate-bar six-sec-ease-in-out" style="width: {{number_format($jawaban->counter/$total_data,2)}}%;" aria-valuenow="{{$jawaban->counter/$total_data}}"><span class="progressbar-front-text" style="width: 653px;">{{number_format($jawaban->counter/$total_data,2)}}%</span></div>
            </div>
            @endforeach
        </div>
</div>
@stop