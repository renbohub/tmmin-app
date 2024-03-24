<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Production Dashboard</title>

    <link href="{{asset('public/sites/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/css/bootstrap-multiselect.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/sites/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('public/sites/js/mqtt.js')}}"></script>
    <script src="{{asset('public/sites/js/apex.js')}}"></script>
    <script src="{{asset('public/sites/js/jquery-3.1.1.min.js')}}"></script>
    <link href="{{asset('public/sites/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/sites/js/multiselect/dist/filter_multi_select.css')}}" />
    <script src="{{asset('public/sites/js/multiselect/dist/filter-multi-select-bundle.min.js')}}"></script>

</head>

<body class="top-navigation" style="background-color: rgb(229, 225, 225)">        
            <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation" style="z-index: 999!important">

                    <a href="#" class="navbar-brand">PORTING</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>

                <div class="navbar-collapse collapse justify-content-center" id="navbar" >
                    <ul class="nav justify-content-center">
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Main Dashboard</a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="{{url('/')}}">Main Dashboard</a></li>
                               
                            </ul>
                        </li>
                        <li class="">
                            <a aria-expanded="false" role="button" href="{{url('work-order')}}">Work Order</a>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Machine Health</a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="{{url('preventive-maintenance')}}">Preventive Maintenance</a></li>
                                <li><a href="{{url('realtime-parameter')}}">Realtime Parameter</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Data Integration</a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="{{url('open-api')}}">Open API</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a aria-expanded="false" role="button" href="{{url('/report')}}">Report</a>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data</a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="{{route('edit.shift')}}">Data Shift</a></li>
                                <li><a href="{{route('edit.user')}}">User Management</a></li>
                                <li><a href="{{route('edit.permission')}}">Edit Permission</a></li>
                            </ul>
                        </li>

                    </ul>
                    
                </div>
                <div class="">
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="{{route('logout-action')}}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        
        <div class="">
            @yield('content')
        </div>
        

        </div>
        </div>



    <script src="{{asset('public/sites/js/popper.min.js')}}"></script>
    <script src="{{asset('public/sites/js/bootstrap.js')}}"></script>
    
    <script src="{{asset('public/sites/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('public/sites/js/inspinia.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/pace/pace.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('public/sites/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('public/sites/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- ChartJS-->
    

    <!-- Peity -->
    <script src="{{asset('public/sites/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <!-- Peity demo -->
    <script src="{{asset('public/sites/js/demo/peity-demo.js')}}"></script>
    <script src="{{asset('public/sites/js/bootstrap-multiselect.js')}}"></script>

    @yield('script')
  

</body>

</html>
