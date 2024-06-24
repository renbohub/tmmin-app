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
    public function realtimeData(Request $request)
    {
        if($request['id']==1){
            $query = DB::select('SELECT * FROM char_imam016 ORDER BY id DESC lIMIT 1');
            $char = $query[0]->data_rfid;
            $q1 = DB::select('SELECT * FROM t_limit_torque where id = 1');
            $lower = $q1[0]->lower;
            $upper = $q1[0]->upper;
            $q2 = DB::select('SELECT SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) between '.$lower.' and '.$upper.' THEN 1 else 0 end) as total_ok , SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) < '.$lower.' or CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) > '.$upper.' THEN 1 else 0 end) as total_ng FROM char_imam016');
            $total_ok = $q2[0]->total_ok;
            $total_ng = $q2[0]->total_ng;
            $q3 = DB::select('SELECT count(data_rfid) as total_rfid FROM char_imam016 GROUP BY data_rfid');
            $total_rfid = count($q3);
            $data = DB::table('char_imam016')
                    ->selectRaw('`datetime` as ts ,SUBSTRING(`data_rfid` , 7,7) as engine_no,SUBSTRING(`data_rfid` , 23,5) as model, CONVERT(SUBSTRING(`data_nut_runner` , 16,2), FLOAT) as screw_no , CONVERT(SUBSTRING(`data_nut_runner` , 18,1),FLOAT) as spindel, CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) as torque ,CONVERT(SUBSTRING(`data_nut_runner` , 26,7),FLOAT) * 1000 as `time` ,CONVERT(SUBSTRING(`data_nut_runner` , 35,5),FLOAT)  as `angle` , SUBSTRING(`data_nut_runner` , 40,4) as ng_code')
                    ->where('data_rfid',$char)
                    ->orderBy('id','ASC')
                    ->get();
            return response()->json(['machine_no'=>'imam016','data' => $data,'lower' => $lower,'upper' => $upper,'total_ok' => $total_ok,'total_ng' => $total_ng,'total_rfid' => $total_rfid]);
        }else if($request['id']==2){
            $query = DB::select('SELECT * FROM char_imam014 ORDER BY id DESC lIMIT 1');
            $char = $query[0]->data_rfid;
            $q1 = DB::select('SELECT * FROM t_limit_torque where id = 2');
            $lower = $q1[0]->lower;
            $upper = $q1[0]->upper;
            $q2 = DB::select('SELECT SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) between '.$lower.' and '.$upper.' THEN 1 else 0 end) as total_ok , SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) < '.$lower.' or CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) > '.$upper.' THEN 1 else 0 end) as total_ng FROM char_imam014');
            $total_ok = $q2[0]->total_ok;
            $total_ng = $q2[0]->total_ng;
            $q3 = DB::select('SELECT count(data_rfid) as total_rfid FROM char_imam014 GROUP BY data_rfid');
            $total_rfid = count($q3);
            $data = DB::table('char_imam014')
                    ->selectRaw('`datetime` as ts ,SUBSTRING(`data_rfid` , 7,7) as engine_no,SUBSTRING(`data_rfid` , 23,5) as model, CONVERT(SUBSTRING(`data_nut_runner` , 16,2), FLOAT) as screw_no , CONVERT(SUBSTRING(`data_nut_runner` , 18,1),FLOAT) as spindel, CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) as torque ,CONVERT(SUBSTRING(`data_nut_runner` , 26,7),FLOAT) * 1000 as `time` ,CONVERT(SUBSTRING(`data_nut_runner` , 35,5),FLOAT)  as `angle` , SUBSTRING(`data_nut_runner` , 40,4) as ng_code')
                    ->where('data_rfid',$char)
                    ->orderBy('id','ASC')
                    ->get();
            return response()->json(['machine_no'=>'imam014','data' => $data,'lower' => $lower,'upper' => $upper,'total_ok' => $total_ok,'total_ng' => $total_ng,'total_rfid' => $total_rfid]);
        }else if($request['id']==3){
            $query = DB::select('SELECT * FROM char_imam004 ORDER BY id DESC lIMIT 1');
            $char = $query[0]->data_rfid;
            $q1 = DB::select('SELECT * FROM t_limit_torque where id = 3');
            $lower = $q1[0]->lower;
            $upper = $q1[0]->upper;
            $q2 = DB::select('SELECT SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) between '.$lower.' and '.$upper.' THEN 1 else 0 end) as total_ok , SUM(case when CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) < '.$lower.' or CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) > '.$upper.' THEN 1 else 0 end) as total_ng FROM char_imam004');
            $total_ok = $q2[0]->total_ok;
            $total_ng = $q2[0]->total_ng;
            $q3 = DB::select('SELECT count(data_rfid) as total_rfid FROM char_imam004 GROUP BY data_rfid');
            $total_rfid = count($q3);
            $data = DB::table('char_imam004')
                    ->selectRaw('`datetime` as ts ,SUBSTRING(`data_rfid` , 7,7) as engine_no,SUBSTRING(`data_rfid` , 23,5) as model, CONVERT(SUBSTRING(`data_nut_runner` , 16,2), FLOAT) as screw_no , CONVERT(SUBSTRING(`data_nut_runner` , 18,1),FLOAT) as spindel, CONVERT(SUBSTRING(`data_nut_runner` , 19,7),FLOAT) as torque ,CONVERT(SUBSTRING(`data_nut_runner` , 26,7),FLOAT) * 1000 as `time` ,CONVERT(SUBSTRING(`data_nut_runner` , 35,5),FLOAT)  as `angle` , SUBSTRING(`data_nut_runner` , 40,4) as ng_code')
                    ->where('data_rfid',$char)
                    ->orderBy('id','ASC')
                    ->get();
            return response()->json(['machine_no'=>'imam004','data' => $data,'lower' => $lower,'upper' => $upper,'total_ok' => $total_ok,'total_ng' => $total_ng,'total_rfid' => $total_rfid]);
        }
    }
}
