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
                        <?php

                        for ($i = 1; $i < 33; $i++) {
                            // Your code to be executed each iteration goes here
                            echo '<div class="col-6 col-lg-2 col-md-4 col-sm-6 box p-1">
                                    <div class="card" >
                                    <div class="card-body text-center align-middle bg-opacity-55" id="lamp_'.$i.'">
                                        <div id="progress'.$i.'"></div>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                    </div>
                                </div>';
                        }

                        ?>                     
                            
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
           
            
        </div>
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{asset('public/sites/js/mqtt.js')}}"></script>

</script>
<script>
        var optionsProgress2 = {
            chart: {
                height: 70,
                type: "bar",
                stacked: true,
                sparkline: {
                enabled: true
                }
            },
            plotOptions: {
                bar: {
                horizontal: true,
                barHeight: "20%",
                colors: {
                    backgroundBarColors: ["#40475D"]
                }
                }
            },
            colors: ["#17ead9"],
            stroke: {
                width: 0
            },
            series: [
                {
                name: "a",
                data: [0]
                }
            ],
            title: {
                floating: true,
                offsetX: -10,
                offsetY: 5,
                text: "Proces2",
                style: {
                    fontSize: "12px",
                    color: '#ffffff'
                }

            },
            subtitle: {
                floating: true,
                align: "right",
                offsetY: 0,
                text: "-",
                style: {
                    fontSize: "20px",
                    color: '#ffffff'
                }
            },
            tooltip: {
                enabled: false
            },
            xaxis: {
                categories: ["Process 2"],
                labels: {
                    style:{
                        colors: '#ffffff'
                    }
                }
            },
            yaxis: {
                max: 1000
            },
            fill: {
                type: "gradient",
                gradient: {
                inverseColors: false,
                gradientToColors: ["#6078ea"]
                }
            }
        };
        var chartProgress = []
        for (let v = 1; v < 33; v++) {
                let chartElement = `#progress${v}`; // Create the selector string
                chartProgress[v] = new ApexCharts(document.querySelector(chartElement), optionsProgress2);
                chartProgress[v].render();
        }
        
   
        var web_id = "webmuffler"+Math.random() * 100000+"";
        clientu = new Paho.MQTT.Client('portal-iot.com', Number('9001'), ""+web_id+"");
        clientu.onConnectionLost = onConnectionLostu ;
        clientu.onMessageArrived = onMessageArrivedu ;
        clientu.connect({onSuccess :onConnectu,useSSL: false});    
        function onConnectu () {
            clientu.subscribe("ckp/demo/{{$area->area_id}}/fault");                              
        }
                                       
        function onConnectionLostu(responseObject) {
            if (responseObject.errorCode !== 0) {
             console.log(responseObject)       
            }
        }
        function onMessageArrivedu(message) {
            var a = JSON.parse(message.payloadString); 
            console.log(a);             
            for (let v = 1; v < 33; v++) {
                var i = v-1
                chartProgress[v].updateOptions({
                    series: [
                        {
                            data: [a[i].value]
                        }
                    ],
                    subtitle: {
                    text: a[i].value + " x"
                    },
                    title:{
                        text:a[i].text
                    }
                });
            }
            
        }

       
</script>
@endsection