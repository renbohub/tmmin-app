<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealtimeDataController extends Controller
{
    public function realtimeValve(Request $request)
    {
        // Your logic to handle the Ajax request
        $data = DB::select('SELECT * FROM t_valve_realtime');

        return response()->json(['data' => $data]);
    }
    public function realtimeTank(Request $request)
    {
        // Your logic to handle the Ajax request
        $data = DB::select('SELECT * FROM t_tanki_volume');

        return response()->json(['data' => $data]);
    }
    public function graphicTank(Request $request)
    {
        // Your logic to handle the Ajax request
        $filter = $request['option'];
        $data = DB::select('SELECT * FROM t_log_tanki order by id desc limit 200');
       
        return response()->json(['data' => $data,'filter'=> $filter]);
    }
    
    public function graphicTankDetail(Request $request)
    {
        
        $data = DB::select('SELECT * FROM t_tanki_graphic');
       
        return response()->json(['data' => $data]);
    }
    public function imam16(Request $request)
    {
        
        $query = DB::select('SELECT * FROM char_imam016 ORDER BY id DESC lIMIT 1');
        $char = $query[0]->char;
        $data = DB::table('char_imam016')
                ->where(`char`,$char);
        return response()->json(['data' => $data]);
    }
}
