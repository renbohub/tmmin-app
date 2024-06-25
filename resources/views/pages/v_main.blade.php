@extends('layouts.main')
@section('content')
<style>
    #map {
        height: 600px;
        width: 100%;
        opacity: 0.6;
    }
     .event-unk { background-color: #ff000083!important; } /* Green */
        .event-ack { background-color: #ffd50065!important; } /* Yellow */
        .event-nor { background-color: #00992671!important; } /* Red */
    </style>
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-8 col-lg-6">
                <!-- BEGIN card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <!-- BEGIN card-body -->
                            <div class="card-header bg-success text-dark">
                                 Factory Land
                            </div>
                            <div class="card-body">
                                <!-- BEGIN title -->
                                <div id="map"></div>
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
            <div class="col-xl-4 col-lg-6 px-0">
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
                                    <!-- Table body will be dynamically populated -->
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
    
                <!-- END card -->
            </div>
            <div class="col-12 pb-0 ">
                <div class="row pb-0">				
                    <div class="col-12 col-lg-6 col-md-12 py-0">
                        <div class="card">
                            <div class="card-header bg-success text-white bg-opacity-60 text-center">
                                Monitoring GI Jababeka
                            </div>
                            <div class="card-body px-2 py-0">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                        <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success text-dark text-white text-center bg-opacity-25">
                                                <b>Power Monitoring</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3">
                                                    <span class="flex-grow-1">CBM Lvl 1</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12">
                                                        <h3 class="mb-0">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                        <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success text-white text-center bg-opacity-25">
                                                <b>Power Monitoring</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3">
                                                    <span class="flex-grow-1">CBM Lvl 1</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12">
                                                        <h3 class="mb-0">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                        <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success  text-white text-center bg-opacity-25">
                                                <b>Power Monitoring</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3">
                                                    <span class="flex-grow-1">CBM Lvl 1</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12">
                                                        <h3 class="mb-0">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                <!-- BEGIN card-arrow -->
                                
                                <!-- END card-arrow -->
                            </div>
                            <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-12 py-0">
                        <div class="card">
                            <div class="card-header bg-success text-white bg-opacity-60 text-center">
                                Monitoring GI Jababeka
                            </div>
                            <div class="card-body px-2 py-0">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                        <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success text-dark text-white text-center bg-opacity-25">
                                                <b>Power Monitoring</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3">
                                                    <span class="flex-grow-1">CBM Lvl 1</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12">
                                                        <h3 class="mb-0">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                        <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success text-white text-center bg-opacity-25">
                                                <b>CBM Lvl 1</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3" style="height: 20px">
                                                    <span class="flex-grow-1" id="tag-01-cbm01" >CBM Lvl 1</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12"  style="height: 20px">
                                                        <h3 class="mb-0" id="number-01-cbm01">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                    <div class="col-xl-4 col-md-6 col-sm-12 px-0 py-0">
                                    <div class="card mb-3">
                                            <!-- BEGIN card-body -->
                                            <div class="card-header bg-success text-white text-center bg-opacity-25">
                                                <b>CBM Lvl 2</b>
                                            </div>
                                            <div class="card-body">
                                                <!-- BEGIN title -->
                                                <div class="d-flex fw-bold small mb-3" style="height: 20px">
                                                    <span class="flex-grow-1" id="tag-01-cbm02" >CBM Lvl 2</span>
                                                    <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                                                </div>
                                                <!-- END title -->
                                                <!-- BEGIN stat-lg -->
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-12"  style="height: 20px">
                                                        <h3 class="mb-0" id="number-01-cbm02">100 pcs</h3>
                                                    </div>
                                                    
                                                </div>
                                                <!-- END stat-lg -->
                                                <!-- BEGIN stat-sm -->
                                                
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
                                <!-- BEGIN card-arrow -->
                                
                                <!-- END card-arrow -->
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
        </div>
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="{{asset('public/sites/js/mqtt.js')}}"></script>

<script>
   $(document).ready(function() {
        var web_id = "webmuffler"+Math.random() * 100000+"";
        clientu = new Paho.MQTT.Client('portal-iot.com', Number('9001'), ""+web_id+"");
        clientu.onConnectionLost = onConnectionLostu ;
        clientu.onMessageArrived = onMessageArrivedu ;
        clientu.connect({onSuccess :onConnectu,useSSL: false});    
        function onConnectu () {
            clientu.subscribe("ckp/all/alarm");                              
        }                                       
        function onConnectionLostu(responseObject) {
            if (responseObject.errorCode !== 0) {
                        
            }
        }
        var table = $('#eventTable').DataTable({
            responsive: true
        });
        function addHoursToDate(date, hours) {
            date.setHours(date.getHours() + hours);
            return date;
        }
        function onMessageArrivedu(message) {
            var a = JSON.parse(message.payloadString); 
            console.log(a);
            table.clear();

            // Assuming 'a' is an array of event objects
            a.forEach(function(event) {
                var x1 = new Date(event.event_start);
                var x2 = new Date(event.event_acknowledge);
                var x3 = new Date(event.event_end);

                x1 = addHoursToDate(x1, 7);
                x2 = addHoursToDate(x2, 7);
                x3 = addHoursToDate(x3, 7);

                // Format the Date objects as strings (ISO format without milliseconds)
                var formattedX1 = x1.toISOString().split('.')[0];
                var formattedX2 = x2.toISOString().split('.')[0];
                var formattedX3 = x3.toISOString().split('.')[0];

                if (formattedX2 == '1970-01-01T07:00:00') {
                    var formattedX2 = '-'
                }
                var rowNode = table.row.add([
                    event.event_id,
                    event.event_desc,
                    formattedX1,
                    formattedX2,
                    formattedX3,
                    event.area_name
                ]).draw(false).node();
                
                // Check the condition and add or remove class
                if (event.event_status == 0) {
                    // Add class if the condition is true
                    rowNode.classList.add('event-nor');
                    rowNode.classList.remove('event-ack');
                    rowNode.classList.remove('event-unk');
                } else if (event.event_status == 1){
                    // Remove class if the condition is false (this is optional if you want to ensure no class is present)
                    rowNode.classList.remove('event-nor');
                    rowNode.classList.remove('event-ack');
                    rowNode.classList.add('event-unk')
                } else if (event.event_status == 3){
                    // Remove class if the condition is false (this is optional if you want to ensure no class is present)
                    rowNode.classList.remove('event-nor');
                    rowNode.classList.add('event-ack');
                    rowNode.classList.remove('event-unk')
                } 
            });             
        }
    });
    
</script>
<script>
    var map = L.map('map').setView([-6.2088, 106.8456], 10);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    @foreach($layer as $i)
    var marker = L.marker([{{$i->area_x}}, {{$i->area_y}}]).addTo(map)
    .bindTooltip("<b>{{$i->area_name}}</>", 
        {
            direction: 'right',
            offset: [0,0]
        }
    )
    .openTooltip();
    var detailUrl = '{{ route('detail', ['id' => $i->area_id]) }}';
    marker.on('click', function() {
        window.location.href = '{{ route('detail', ['id' => $i->area_id]) }}' ;
    });
    @endforeach
</script>
@endsection