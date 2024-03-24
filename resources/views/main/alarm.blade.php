@extends('layouts.layout-inspinia')   
    @section('content')
    <link href="{{asset('public/sites/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <div class="container-fluid ">
            <div class="row pt-4">
              
              <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header pt-2 py-1"><h4>Filter</h4></div>
                  <div class="card-body">
                    <form action="{{route('alarm.report')}}" method="post" id="report_option">
                      @csrf
                      <div class="mb-3" id="year">
                        <label for="year" class="form-label">Start From</label>
                        <input type="date" class="form-control"  name="date-start">
                      </div>
                      <div class="mb-3" id="year">
                        <label for="year" class="form-label">End Date</label>
                        <input type="date" class="form-control"  name="date-end">
                      </div>
                     
                      <div class="mb-3" id="year">
                        <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
                      </div>
                      
                      
                     
                    </form>
                     
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
                  <div class="card-header pt-2 py-1"><h4>Alarm Log</h4></div>
                  <div class="card-body">
                    <table class="table text-nowrap w-100 " id="alarm-table">
                      <thead>
                          <tr>
                              <th style="color: black">id</th>
                              <th style="color: black">Start</th>
                              <th style="color: black">End</th>
                              <th style="color: black">Desc</th>
                              <th style="color: black">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($report as $item)
                        <tr>
                            <td style="color: black">{{ $item->id }}</td>
                            <td style="color: black">{{ $item->start_alarm }}</td>
                            <td style="color: black">{{ $item->end_alarm }}</td>
                            <td style="color: black">{{ $item->desc}}</td>
                            <td style="color: black">{{ $item->status }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  
                  
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
    <!-- Include DataTables CSS and JS -->

    @section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Include DataTables Buttons CSS and JS -->
<!-- required js -->
<script src="{{asset('public/sites/plugins/datatables.net/js/jquerydataTables.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/sites/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        $('#alarm-table').DataTable({
          dom: 'Bfrtip', // Buttons extension
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
  </script>
    @endsection
    
