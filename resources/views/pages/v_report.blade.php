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
                        <div class="row">
                            <div class="col-12" >
                                <div class="card mb-3" >
                                    <!-- BEGIN card-body -->
                                    <div class="card-header bg-success text-dark" >
                                         Event Alarm Log
                                    </div>
                                    
                                    <div class="card-body" style="height: 632px; overflow-x: scroll;">
                                        <!-- BEGIN title -->
                                        <table id="eventTable" class="table responsive w-100 text-white" style=" color:white;!important"> 
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alarm Desc</th>
                                                <th>Start</th>
                                                <th>Ack</th>
                                                <th>Finish</th>
                                                <th>Area</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($event_log as $el)
                                                <tr>
                                                    <td class="text-dark">{{$el->event_id}}</td>
                                                    <td class="text-dark">{{$el->event_desc}}</td>
                                                    <td class="text-dark">{{$el->event_start}}</td>
                                                    <td class="text-dark">{{$el->event_acknowledge}}</td>
                                                    <td class="text-dark">{{$el->event_end}}</td>
                                                    <td class="text-dark">{{$el->area_name}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        <!-- END stat-lg -->
                                        <!-- BEGIN stat-sm -->
                                        <div class="small text-white text-opacity-50 text-truncate">
                                            
                                            <div class="">last update:</div>
                                            <div id='last_update_2'>offline</div>
                                        </div>
                                        <!-- END stat-sm -->
                                    </div>
                                    <!-- END card-body -->
            
                                    <!-- BEGIN card-arrow -->
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                    <!-- END card-arrow -->
                                </div>
                            </div>
                            
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#eventTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
    </script>
@endsection