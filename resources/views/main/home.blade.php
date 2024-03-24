@extends('layouts.layout-inspinia')   
@section('content')
    <div class="container-fluid">
        <div class="row pt-2">
            @foreach ($machine as $mc)
                <div class="col-12 col-lg-4 col-md-12 col-sm-12 px-1">
                    <div class="card">
                        <div class="card-header py-1">
                            <table class="table py-0 mb-0 table-borderless px-0">
                                <tbody>
                                <tr>
                                    <td class="align-middle ">
                                        {{$mc->machine_name}}
                                    </td>
                                    <td class="align-middle py-0 text-end" align="right">                           
                                        <a href="detail/{{$mc->id}}" class="btn btn-primary">Show Detail</a>           
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body py-0">
                            <div class="row">
                                <div class="col-8 py-0">
                                    <div id="chart-ef-{{$mc->id}}"></div>
                                </div>
                                <div class="col-4 pt-4">
                                    <div class="card mb-2">
                                        <div class="card-header py-1">
                                            Total OK
                                        </div>
                                        <div class="card-body py-2">
                                            <div id="total_ok{{$mc->id}}">0</div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="card-header py-1 ">
                                            Total NG
                                        </div>
                                        <div class="card-body py-2">
                                            <div id="total_ng{{$mc->id}}">0</div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="card-header py-1 ">
                                            Total Count RFID
                                        </div>
                                        <div class="card-body py-2">
                                            <div id="total_count{{$mc->id}}">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-0 px-0">
                            <table class="table py-0 mb-0">
                                <tbody>
                                    <tr>
                                        <td class="align-middle ">
                                            Type Part
                                        </td>
                                        <td class="align-middle py-1">                           
                                                   
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle ">
                                            Machine Number
                                        </td>
                                        <td class="align-middle py-1" >                           
                                                   
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-12 pr-0">
                                    <div class="card rounded-0">
                                        <div class="card-header py-1">Spindel #1</div>
                                        <div class="card-body p-0">
                                            <div id="spindel_chart_{{$mc->id}}1"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-12 col-lg-6 col-md-12 pl-0">
                                    <div class="card rounded-0">
                                        <div class="card-header py-1">Spindel #2</div>
                                        <div class="card-body p-0">
                                            <div id="spindel_chart_{{$mc->id}}2"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-12 col-lg-6 col-md-12 pr-0">
                                    <div class="card rounded-0">
                                        <div class="card-header py-1">Spindel #3</div>
                                        <div class="card-body p-0">
                                            <div id="spindel_chart_{{$mc->id}}3"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-12 col-lg-6 col-md-12 pl-0">
                                    <div class="card rounded-0">
                                        <div class="card-header py-1">Spindel #4</div>
                                        <div class="card-body p-0">
                                            <div id="spindel_chart_{{$mc->id}}4"></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')

<script>
//initial Setting
    //Chart EF
        var options = {
                series: [0],
                chart: {
                height: 280,
                type: 'radialBar',
                },
                legend: {
                    show: false,
                    labels: {
                        colors: undefined,
                        useSeriesColors: true
                    },
                },
                colors: ['#02d170'],
                plotOptions: {
                    radialBar: {
                        hollow: {
                        size: '60%',
                        },
                        dataLabels: {
                        show: 'true',
                            name: {
                                offsetY: -12,
                                show: true,
                                color: '#000',
                                fontSize: '14px'
                            },
                            value: {
                                offsetY: 10,
                                color: '#000',
                                fontSize: '24px',
                                show: true,
                            }
                        }
                    },         
                },
            labels: ['Performance'],
        };
    // END Chart EF

    //Chart SPINDEL
        var options1 = {
            series: [],
            chart: {
                height: 180,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                show: true,
                borderColor: '#90A4AE',
                strokeDashArray: 0,
                position: 'back',
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            legend: {
                labels: {
                    colors: '#ffffff', // Set legend text color to white
                },
            },
            xaxis: {

                labels: {
                    style: {
                        colors: '#fff'
                    }
                }
            },
            yaxis: {
                max: 20,
                min: 0,
                labels: {
                    style: {
                        colors: '#fff'
                    }
                }
            }
        };
    //End Chart SPINDEL
//End Inition Setting

</script>
@foreach ($machine as $mc2)
    <script>
          var chartp{{$mc2->id}} = new ApexCharts(document.querySelector("#chart-ef-{{$mc2->id}}"), options);
          chartp{{$mc2->id}}.render();
          //
          var chart{{$mc2->id}}1 = new ApexCharts(document.querySelector("#spindel_chart_{{$mc2->id}}1"), options1);
          chart{{$mc2->id}}1.render();
          var chart{{$mc2->id}}2 = new ApexCharts(document.querySelector("#spindel_chart_{{$mc2->id}}2"), options1);
          chart{{$mc2->id}}2.render();
          var chart{{$mc2->id}}3 = new ApexCharts(document.querySelector("#spindel_chart_{{$mc2->id}}3"), options1);
          chart{{$mc2->id}}3.render();
          var chart{{$mc2->id}}4 = new ApexCharts(document.querySelector("#spindel_chart_{{$mc2->id}}4"), options1);
          chart{{$mc2->id}}4.render();
    </script>s
@endforeach
@endsection
