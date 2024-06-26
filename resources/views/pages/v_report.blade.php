@extends('layouts.main')
@section('content')
    <style>
        .bg-alarm {
            background-image: url('{{asset("public/sites/img/alarm.gif")}}')
        }
        .bg-ack{
            background-image: url('{{asset("public/sites/img/ack.png")}}')
        }
        .bg-normal{
            background-image: url('{{asset("public/sites/img/normal.png")}}')
        }
    </style>
    
    <div id="content" class="app-content">
        <div class="bg-dark bg-opacity-70 text-white mx-0">
            <div class="d-print-none">
                <div class="row">
                    <div class="col-6">
                        <ul class="nav justify-content-start">
                        <li class="nav-item">
                                 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">{{$area->area_name}}</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('detail', ['id' => $area->area_id]) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('power', ['id' => $area->area_id]) }}">Power Monitoring</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('statistic', ['id' => $area->area_id]) }}">Static Fault</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('report', ['id' => $area->area_id]) }}">Reporting</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-0">
                        
                        </div>
                        
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 pe-0  col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="chart"></div>
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 ps-0 col-lg-6 col-md-12 col-sm-12 mb-2">
                <div class="card p-0">
                    <div class="card-body p-0">
                        <div id="chart1"></div>
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{asset('public/sites/js/mqtt.js')}}"></script>

@endsection