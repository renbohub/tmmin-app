@extends('layouts.layout-inspinia')   
    @section('content')
    <style>
      .over-flow{
          width: 100%!important;
          overflow-x: auto;
          display: flex;
      }
      .isi{
          min-width: 1200px;
          max-width: 1900px;
      }
      .main-img{
          z-index: -99;
      }
      .field{
        position: relative;
        padding-left: 22%;
      }
      .text-item{
        position: relative;
      }
      .wd-100{
          position: absolute;
      
      }
      .wd-text{
          position: absolute;
          width: 100%;
          padding-top: 25%;
          color: black;
      }
    </style> 
      <div id="content" class="app-content pt-2 px-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-theme bg-opacity-50"> Line 1 Monitoring</div>
                    <div class="card-body px-0 py-0">
                        <div class="row">
                            <div class="col-12 col-lg-9 pe-lg-0 col-md-12">
                                <div class="card">
                                    <div class="card-header bg-theme bg-opacity-25"> Compare Graphic</div>
                                    <div class="card-body bg-white bg-opacity-0">
                                      <div id="chart_main"></div>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                    <div class="card-footer text-end my-0">
                                      <label for=""> Select View Data: </label>
                                      <form id="checkboxForm">
                                        
                                        <label>
                                            <input type="checkbox" name="checkbox1" value="t_3" > Tank 3
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox2" value="t_4" > Tank 4
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox3" value="t_5" > Tank 5
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox1" value="t_6" > Tank 6
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox2" value="t_7" > Tank 7
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox3" value="t_8" > Tank 8
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox1" value="t_10" > Tanki 10
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox2" value="t_17" > Tanki 17
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox3" value="t_21" > Tanki 21
                                        </label>
                                        <label>
                                            <input type="checkbox" name="checkbox1" value="t_22" > Tanki 22
                                        </label>
                                        <div id="selectedOptions"></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 ps-lg-0 col-md-12">
                              <div class="card">
                                  
                                  <div class="card-body bg-white bg-opacity-0 p-0">
                                    <div class="row">
                                      <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-theme bg-opacity-25"> Tank 21</div>
                                            <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                            <div id="chart_9"></div>
                                            </div>
                                            <div class="card-arrow">
                                                <div class="card-arrow-top-left"></div>
                                                <div class="card-arrow-top-right"></div>
                                                <div class="card-arrow-bottom-left"></div>
                                                <div class="card-arrow-bottom-right"></div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-theme bg-opacity-25"> Tank 22</div>
                                            <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                            <div id="chart_10"></div>
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
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 pe-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25"> Tank 3</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_1"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 p-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25"> Tank 4</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_2"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 p-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25">Tank 5</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_3"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 ps-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25">Tank 6</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_4"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 pe-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25"> Tank 7</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_5"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 p-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25"> Tank 8</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_6"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 p-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25">Tank 10</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_7"></div>
                                  </div>
                                  <div class="card-arrow">
                                      <div class="card-arrow-top-left"></div>
                                      <div class="card-arrow-top-right"></div>
                                      <div class="card-arrow-bottom-left"></div>
                                      <div class="card-arrow-bottom-right"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-3 ps-lg-0 col-md-12">
                              <div class="card">
                                  <div class="card-header bg-theme bg-opacity-25">Tank 17</div>
                                  <div class="card-body bg-white bg-opacity-0 py-0 my-0">
                                  <div id="chart_8"></div>
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
    <script>
    var options = {
          series: [],
          chart: {
            height: 180,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
              export: {
                csv: {
                  filename: undefined,
                  columnDelimiter: ',',
                  headerCategory: 'category',
                  headerValue: 'value',
                  dateFormatter(timestamp) {
                    return new Date(timestamp).toDateString()
                  }
                },
                svg: {
                  filename: undefined,
                },
                png: {
                  filename: undefined,
                }
              },
            },
            animations: {
                enabled: false,
            }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: '',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          type : 'datetime',
          labels: {
            style: {
              colors: '#fff',
            }
          },

        },
        tooltip: {
            enabled: false,
        },
        yaxis: {
            labels: {
                style: {
                    colors: ['#fff']
                }
            }
        },
        legend: {
            labels: {
                colors: '#fff'
            }
        }
    };

    // render chart
    var chart = new ApexCharts(document.querySelector("#chart_main"), options);
    chart.render();

    var chart_1 = new ApexCharts(document.querySelector("#chart_1"), options); chart_1.render();
    var chart_2 = new ApexCharts(document.querySelector("#chart_2"), options); chart_2.render();
    var chart_3 = new ApexCharts(document.querySelector("#chart_3"), options); chart_3.render();
    var chart_4 = new ApexCharts(document.querySelector("#chart_4"), options); chart_4.render();
    var chart_5 = new ApexCharts(document.querySelector("#chart_5"), options); chart_5.render();
    var chart_6 = new ApexCharts(document.querySelector("#chart_6"), options); chart_6.render();
    var chart_7 = new ApexCharts(document.querySelector("#chart_7"), options); chart_7.render();
    var chart_8 = new ApexCharts(document.querySelector("#chart_8"), options); chart_8.render();
    var chart_9 = new ApexCharts(document.querySelector("#chart_9"), options); chart_9.render();
    var chart_10 = new ApexCharts(document.querySelector("#chart_10"), options); chart_10.render();

    chart.updateOptions({
      chart:{
        height:340
      }
    })

    function getRealtimeTank() {
        var checkboxes = document.querySelectorAll('#checkboxForm input[type="checkbox"]');
        // Filter and create an array of selected checkbox values
        var selectedOptions = Array.from(checkboxes)
          .filter(checkbox => checkbox.checked)
          .map(checkbox => checkbox.value);
        // Display the selected options
        var data = selectedOptions;
            // console.log(data);
        const inputArray = data;
        const allKeys = ['t_3', 't_4', 't_5', 't_6','t_7','t_8','t_10','t_17','t_21','t_22'];
        const resultObject = {};
        allKeys.forEach(key => {
          resultObject[key] = inputArray.includes(key);
        });

             
        $.ajax({
            url: '{{route("graphic.tank")}}',
            type: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
              option: resultObject
            },
            success: function(response) {
                var data = response.data;
                var filter = response.filter;
             
                t3 = [];
                t4 = [];
                t5 = [];
                t6 = [];
                t7 = [];
                t8 = [];
                t10 = [];
                t17 = [];
                t21 = [];
                t22 = [];
                
                for (let i = data.length -1 ; i > 0 ; i--) {
                  // tanki 3
                  
                       
                    const originalDate = new Date(data[i].last_update);
                    const newDate = new Date(originalDate);                   // Adding 5 hours
                    newDate.setHours(newDate.getHours() + 7);

                    d = newDate.toISOString();

                    dt = d.split('T')[1];

                    dz = d;
                    if(filter.t_3=='true'){ 
                      tank3 = data[i].tanki_3;
                      f3 = {
                        'x': dz,
                        'y': tank3
                      };
                      t3.push(f3);
                    }
                    if(filter.t_4=='true'){ 
                      tank4 = data[i].tanki_4;
                      f4 = {
                        'x': dz,
                        'y': tank4
                      };
                      t4.push(f4);
                    }
                    if(filter.t_5=='true'){ 
                      tank5 = data[i].tanki_5;
                      f5 = {
                        'x': dz,
                        'y': tank5
                      };
                      t5.push(f5);
                    }
                    if(filter.t_6=='true'){ 
                      tank6 = data[i].tanki_6;
                      f6 = {
                        'x': dz,
                        'y': tank6
                      };
                      t6.push(f6);
                    }
                    if(filter.t_7=='true'){ 
                      tank7 = data[i].tanki_7;
                      f7 = {
                        'x': dz,
                        'y': tank7
                      };
                      t7.push(f7);
                    }
                    if(filter.t_8=='true'){ 
                      tank8 = data[i].tanki_8;
                      f8 = {
                        'x': dz,
                        'y': tank8
                      };
                      t8.push(f8);
                    }
                    if(filter.t_10=='true'){ 
                      tank10 = data[i].tanki_10;
                      f10 = {
                        'x': dz,
                        'y': tank10
                      };
                      t10.push(f10);
                    }
                    if(filter.t_17=='true'){ 
                      tank17 = data[i].tanki_17;
                      f17 = {
                        'x': dz,
                        'y': tank17
                      };
                      t17.push(f17);
                    }
                    if(filter.t_21=='true'){ 
                      tank21 = data[i].tanki_21;
                      f21 = {
                        'x': dz,
                        'y': tank21
                      };
                      t21.push(f21);
                    }
                    if(filter.t_22=='true'){ 
                      tank22 = data[i].tanki_22;
                      f22 = {
                        'x': dz,
                        'y': tank22
                      };
                      t22.push(f22);
                    }  
                   
                

                }
                chart.updateSeries([{
                    name: 'Tanki 3',
                    data: t3
                },{
                    name: 'Tanki 4',
                    data: t4
                },{
                    name: 'Tanki 5',
                    data: t5
                },{
                    name: 'Tanki 6',
                    data: t6
                },{
                    name: 'Tanki 7',
                    data: t7
                },{
                    name: 'Tanki 8',
                    data: t8
                },{
                    name: 'Tanki 10',
                    data: t10
                },{
                    name: 'Tanki 17',
                    data: t17
                },{
                    name: 'Tanki 21',
                    data: t21
                },{
                    name: 'Tanki 22',
                    data: t22
                }]);
                
                
            }
        });
    };
    setInterval(getRealtimeTank, 2000);

    function getRealtimeTankD() {
        $.ajax({
            url: '{{route("graphic.tank.detail")}}',
            type: 'POST',
            data: {
              _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                var data = response.data;
                console.log(data);
                t3 = [];
                t4 = [];
                t5 = [];
                t6 = [];
                t7 = [];
                t8 = [];
                t10 = [];
                t17 = [];
                t21 = [];
                t22 = [];
                
                for (let i = 0 ; i < data.length; i++) {
                  // tanki 3
                    tank3 = data[i].tanki_3;
                    tank4 = data[i].tanki_4;
                    tank5 = data[i].tanki_5;
                    tank6 = data[i].tanki_6;
                    tank7 = data[i].tanki_7;
                    tank8 = data[i].tanki_8;
                    tank10 = data[i].tanki_10;
                    tank17 = data[i].tanki_17;
                    tank21 = data[i].tanki_21;
                    tank22 = data[i].tanki_22;
                       
                    const originalDate = new Date(data[i].last_update);
                    const newDate = new Date(originalDate);                   // Adding 5 hours
                    newDate.setHours(newDate.getHours() + 7);

                    d = newDate.toISOString();

                    dt = d.split('T')[1];
                    dz = data[i].last_update;

                    f3 = {
                        'x': dz,
                        'y': tank3
                    }
                    f4 = {
                        'x': dz,
                        'y': tank4
                    }

                    f5 = {
                        'x': dz,
                        'y': tank5
                    }
                    f6 = {
                        'x': dz,
                        'y': tank6
                    }

                    f7 = {
                        'x': dz,
                        'y': tank7
                    }
                    f8 = {
                        'x': dz,
                        'y': tank8
                    }

                    f10 = {
                        'x': dz,
                        'y': tank10
                    }
                    f17 = {
                        'x': dz,
                        'y': tank17
                    }

                    f21 = {
                        'x': dz,
                        'y': tank21
                    }
                    f22 = {
                        'x': dz,
                        'y': tank22
                    }
                  
                    t3.push(f3);
                    t4.push(f4);
                    t5.push(f5);
                    t6.push(f6);
                    t7.push(f7);
                    t8.push(f8);
                    t10.push(f10);
                    t17.push(f17);
                    t21.push(f21);
                    t22.push(f22);
                   
                

                }
                chart_1.updateSeries([{
                    name: 'Tanki 3',
                    data: t3
                }]);
                chart_2.updateSeries([{
                    name: 'Tanki 4',
                    data: t4
                }]);
                chart_3.updateSeries([{
                    name: 'Tanki 5',
                    data: t5
                }]);
                chart_4.updateSeries([{
                    name: 'Tanki 6',
                    data: t6
                }]);
                chart_5.updateSeries([{
                    name: 'Tanki 7',
                    data: t7
                }]);
                chart_6.updateSeries([{
                    name: 'Tanki 8',
                    data: t8
                }]);
                chart_7.updateSeries([{
                    name: 'Tanki 10',
                    data: t10
                }]);
                chart_8.updateSeries([{
                    name: 'Tanki 17',
                    data: t17
                }]);
                chart_9.updateSeries([{
                    name: 'Tanki 21',
                    data: t21
                }]);
                chart_10.updateSeries([{
                    name: 'Tanki 22',
                    data: t22
                }]);
            }
        });
    };
    setInterval(getRealtimeTankD, 5000);
  </script>
    @endsection
    
