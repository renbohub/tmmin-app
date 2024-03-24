@extends('layouts.layout-inspinia')   
    @section('content')
        <div class="container-fluid ">
            <div class="row pt-4">
              
              <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header pt-2 py-1"><h4>Reporting Option</h4></div>
                  <div class="card-body">
                    <form action="{{route('export.data')}}" method="post" id="report_option">
                      @csrf
                        <div class="mb-3" id="year">
                          <label for="year" class="form-label">Start From</label>
                          <input type="date" class="form-control"  name="date-start" requireds>
                        </div>
                        <div class="mb-3" id="year">
                          <label for="year" class="form-label">End Date</label>
                          <input type="date" class="form-control"  name="date-end" required>
                        </div>
                        <div class="mb-3" id="shift">
                          <label for="shift" class="from-label">Shift</label>
                          <div class="form-group" style="width: 100%!important">
                            <select id="example-getting-started" class="form-control" name="shift[]" multiple="multiple" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3" id="tank">
                          <label for="tank" class="from-label">Select Tank</label>
                          <div class="form-group" style="width: 100%!important; ">
                            <select id="example-getting-started" class="form-control" name="tank[]" multiple="multiple" style="height: 210px!important;" required>
                                <option value="t_3">tank 3</option>
                                <option value="t_4">tank 4</option>
                                <option value="t_5">tank 5</option>
                                <option value="t_6">tank 6</option>
                                <option value="t_7">tank 7</option>
                                <option value="t_8">tank 8</option>
                                <option value="t_10">tank 10</option>
                                <option value="t_17">tank 17</option>
                                <option value="t_21">tank 21</option>
                                <option value="t_22">tank 22</option>
                            </select>
                          </div>
                        </div>
                      <div class="mb-3" id="year">
                        <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
                      </div>
                    </form>
                    <form action="{{route('export.data.excel')}}" method="post" id="report_excel">
                      @csrf
                        <div class="mb-3" id="year">
                          
                          <input type="hidden" class="form-control"  name="date-start" value="{{ isset($payload['date-start']) ? $payload['date-start'] : '' }}" required>
                        </div>
                        <div class="mb-3" id="year">
                          
                          <input type="hidden" class="form-control"  name="date-end" value="{{ isset($payload['date-end']) ? $payload['date-end'] : '' }}" required>
                        </div>
                        <div class="mb-3" id="shift">
                          
                          <div class="form-group" style="width: 100%!important">
                            <select type="hidden" id="example-getting-started" class="form-control d-none" name="shift[]" multiple="multiple" required>
                                <option value="1" {{ isset($payload['shift']) && in_array('1', $payload['shift']) ? 'selected' : '' }}>1</option>
                                <option value="2" {{ isset($payload['shift']) && in_array('2', $payload['shift']) ? 'selected' : '' }}>2</option>
                                <option value="3" {{ isset($payload['shift']) && in_array('3', $payload['shift']) ? 'selected' : '' }}>3</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3" id="tank">
                          <div class="form-group" style="width: 100%!important; ">
                            <select type="hidden" id="example-getting-started" class="form-control d-none" name="tank[]" multiple="multiple" style="height: 210px!important;" required>
                                <option value="t_3" {{ isset($payload['tank']) && in_array('t_3', $payload['tank']) ? 'selected' : '' }}>tank 3</option>
                                <option value="t_4" {{ isset($payload['tank']) && in_array('t_4', $payload['tank']) ? 'selected' : '' }}>tank 4</option>
                                <option value="t_5" {{ isset($payload['tank']) && in_array('t_5', $payload['tank']) ? 'selected' : '' }}>tank 5</option>
                                <option value="t_6" {{ isset($payload['tank']) && in_array('t_6', $payload['tank']) ? 'selected' : '' }}>tank 6</option>
                                <option value="t_7" {{ isset($payload['tank']) && in_array('t_7', $payload['tank']) ? 'selected' : '' }}>tank 7</option>
                                <option value="t_8" {{ isset($payload['tank']) && in_array('t_8', $payload['tank']) ? 'selected' : '' }}>tank 8</option>
                                <option value="t_10" {{ isset($payload['tank']) && in_array('t_10', $payload['tank']) ? 'selected' : '' }}>tank 10</option>
                                <option value="t_17" {{ isset($payload['tank']) && in_array('t_17', $payload['tank']) ? 'selected' : '' }}>tank 17</option>
                                <option value="t_21" {{ isset($payload['tank']) && in_array('t_21', $payload['tank']) ? 'selected' : '' }}>tank 21</option>
                                <option value="t_22" {{ isset($payload['tank']) && in_array('t_22', $payload['tank']) ? 'selected' : '' }}>tank 22</option>
                            </select>
                          </div>
                        </div>
                      <div class="mb-3" id="year">
                        <button type="submit" class="btn btn-success" id="submitBtn">Export to Excel</button>
                      </div>
                        
                     
                    </form>
                    <div class="my-3">
                      <button id="pdfButton" class="btn btn-danger">Download PDF</button>
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
              <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-body" id="dvContainer">
                    <div id="chart_main"></div>
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
        <script src="https://appsforoffice.microsoft.com/lib/1/hosted/office.js"></script>
        <script src="{{asset('public/sites/js/jspdf.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example-getting-started').multiselect();
            });
        </script>
    @endsection
    @section('script')
    <script>
        var options = {
              series: [],
              chart: {
                height: 600,
                type: 'line',
                zoom: {
                    enabled: true
                },
                animations: {
                    enabled: false,
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
              type: 'datetime',
              labels: {
                style: {
                  colors: '#fff',
                }
              },

            },
            tooltip: {
                enabled: true,
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

        var a = @json($report);
        var b = @json($tank);
        var data = b;
            // console.log(data);
        const inputArray = data;
        const allKeys = ['t_3', 't_4', 't_5', 't_6','t_7','t_8','t_10','t_17','t_21','t_22'];
        const resultObject = {};
        allKeys.forEach(key => {
          resultObject[key] = inputArray.includes(key);
        });
       
                var data = a;
                var filter = resultObject;
                console.log(data);
                console.log(filter);
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
                    if(filter.t_3==true){ 
                      tank3 = data[i].tanki_3;
                      f3 = {
                        'x': dz,
                        'y': tank3
                      };
                      t3.push(f3);
                    }
                    if(filter.t_4==true){ 
                      tank4 = data[i].tanki_4;
                      f4 = {
                        'x': dz,
                        'y': tank4
                      };
                      t4.push(f4);
                    }
                    if(filter.t_5==true){ 
                      tank5 = data[i].tanki_5;
                      f5 = {
                        'x': dz,
                        'y': tank5
                      };
                      t5.push(f5);
                    }
                    if(filter.t_6==true){ 
                      tank6 = data[i].tanki_6;
                      f6 = {
                        'x': dz,
                        'y': tank6
                      };
                      t6.push(f6);
                    }
                    if(filter.t_7==true){ 
                      tank7 = data[i].tanki_7;
                      f7 = {
                        'x': dz,
                        'y': tank7
                      };
                      t7.push(f7);
                    }
                    if(filter.t_8==true){ 
                      tank8 = data[i].tanki_8;
                      f8 = {
                        'x': dz,
                        'y': tank8
                      };
                      t8.push(f8);
                    }
                    if(filter.t_10==true){ 
                      tank10 = data[i].tanki_10;
                      f10 = {
                        'x': dz,
                        'y': tank10
                      };
                      t10.push(f10);
                    }
                    if(filter.t_17==true){ 
                      tank17 = data[i].tanki_17;
                      f17 = {
                        'x': dz,
                        'y': tank17
                      };
                      t17.push(f17);
                    }
                    if(filter.t_21==true){ 
                      tank21 = data[i].tanki_21;
                      f21 = {
                        'x': dz,
                        'y': tank21
                      };
                      t21.push(f21);
                    }
                    if(filter.t_22==true){ 
                      tank22 = data[i].tanki_22;
                      f22 = {
                        'x': dz,
                        'y': tank22
                      };
                      t22.push(f22);
                    }  
                }
                console.log(t3);
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
              
                function generatePDF() {
                  var divContents = $("#dvContainer").html();
                  var printWindow = window.open('', '', 'height=400,width=800');
                  printWindow.document.write('<html><head><title>Graphic Content</title>');
                  printWindow.document.write('</head><body >');
                  printWindow.document.write(divContents);
                  printWindow.document.write('</body></html>');
                  printWindow.document.close();
                  printWindow.print();
                }

                // Event listener for button click to generate PDF
                document.getElementById('pdfButton').addEventListener('click', generatePDF);
      
    </script>
    @endsection
    
