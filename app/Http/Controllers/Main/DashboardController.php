<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Traits\GeneralServices;
use App\Exports\ReportExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Session;

class DashboardController extends Controller
{
    use GeneralServices;
    public function index(Request $request){        
        $data['tittle'] = 'Porting - Dashboard';
        $data['machine'] = DB::table('l_machine')
                            ->selectRaw('*')
                            ->get();
        return view('main.home',$data);
    } 
     public function detail(Request $request){        
        $data['tittle'] = 'Porting - Dashboard';
    
        return view('main.detail',$data);
    }
    public function report(){
         $data['report'] = [];
         $data['tittle'] = 'Porting - Report';
         $data['payload'] = [];
         $data['tank'] = [];
         $data['report'] = [];
         return view('main.report',$data);
    }
    public function reportData(Request $request){  
        $data['tittle'] = 'Porting - Report';
        $payload = $request->all();
        $shift = $payload['shift'];
        $tank = $payload['tank'];
        $data['tank'] = $tank;
        $data['payload'] = $payload;
        $shift1_start = '00:00:00';
        $shift2_start = '00:00:00';
        $shift3_start = '23:59:59';
        $shift1_end = '00:00:00';
        $shift2_end = '00:00:00';
        $shift3_end = '00:00:00';
        $data_shift = DB::table('list_shift')
                        ->selectRaw('*')
                        ->whereIn('shift_no',$shift)
                        ->get();
      
        foreach ($data_shift as $row) {
            if($row->shift_no == 1){
                $shift1_start = $row->shift_start;
                $shift1_end = $row->shift_end;
            }
            if($row->shift_no == 2){
                $shift2_start = $row->shift_start;
                $shift2_end = $row->shift_end;
            }
            if($row->shift_no == 3){
                $shift3_start = $row->shift_start;
                $shift3_end = $row->shift_end;
            }
        }
        $query = DB::table('t_log_tanki')
                    ->whereDate('last_update', '>=', $request['date-start'])
                    ->whereDate('last_update', '<=', $request['date-end'])
                    ->where(function ($query) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end) {
                        $query->where(function ($subquery)  use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                $subquery->whereTime('last_update', '>=', $shift1_start)
                                         ->whereTime('last_update', '<=', $shift1_end);
                                })
                                ->orWhere(function ($subquery) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                    $subquery->whereTime('last_update', '>=', $shift2_start)
                                             ->whereTime('last_update', '<=', $shift2_end);
                                })
                                ->orWhere(function ($subquery) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                    $subquery->whereRaw('(time(last_update) >= "'.$shift3_start.'" and time(last_update) <= "23:59:59") or (time(last_update) <= "'.$shift3_end.'" and time(last_update) >= "00:00:00")');
                                });
                        })
                    ->get();
        
        $data['report'] = $query;
        // $dataExcel = $query;
        $dataExcel = $query->map(function ($user) {
            return [
                'No' => $user->id,
                'Time' => $user->last_update,
                'Tanki 3' => $user->tanki_3,
                'Tanki 4' => $user->tanki_4,
                'Tanki 5' => $user->tanki_5,
                'Tanki 6' => $user->tanki_6,
                'Tanki 7' => $user->tanki_7,
                'Tanki 8' => $user->tanki_8,
                'Tanki 10' => $user->tanki_10,
                'Tanki 17' => $user->tanki_17,
                'Tanki 21' => $user->tanki_21,
                'Tanki 22' => $user->tanki_22,
            ];
        });
        
        return view('main.report',$data);
        return Excel::download(new ReportExcel($dataExcel), 'data.xlsx');
       
    }
    public function reportDataExcel(Request $request){  
        $data['tittle'] = 'Porting - Report';
        $payload = $request->all();
        $shift = $payload['shift'];
        $tank = $payload['tank'];
        $data['tank'] = $tank;
        $data['payload'] = array_values($payload);
        $shift1_start = '00:00:00';
        $shift2_start = '00:00:00';
        $shift3_start = '23:59:59';
        $shift1_end = '00:00:00';
        $shift2_end = '00:00:00';
        $shift3_end = '00:00:00';

        $data_shift = DB::table('list_shift')
                        ->selectRaw('*')
                        ->whereIn('shift_no',$shift)
                        ->get();
      
        foreach ($data_shift as $row) {
            if($row->shift_no == 1){
                $shift1_start = $row->shift_start;
                $shift1_end = $row->shift_end;
            }
            if($row->shift_no == 2){
                $shift2_start = $row->shift_start;
                $shift2_end = $row->shift_end;
            }
            if($row->shift_no == 3){
                $shift3_start = $row->shift_start;
                $shift3_end = $row->shift_end;
            }
        }
        $query = DB::table('t_log_tanki')
                    ->whereDate('last_update', '>=', $request['date-start'])
                    ->whereDate('last_update', '<=', $request['date-end'])
                    ->where(function ($query) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end) {
                        $query->where(function ($subquery)  use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                $subquery->whereTime('last_update', '>=', $shift1_start)
                                         ->whereTime('last_update', '<=', $shift1_end);
                                })
                                ->orWhere(function ($subquery) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                    $subquery->whereTime('last_update', '>=', $shift2_start)
                                             ->whereTime('last_update', '<=', $shift2_end);
                                })
                                ->orWhere(function ($subquery) use ($shift1_start, $shift2_start, $shift3_start,$shift1_end, $shift2_end, $shift3_end)  {
                                    $subquery->whereRaw('(time(last_update) >= "'.$shift3_start.'" and time(last_update) <= "23:59:59") or (time(last_update) <= "'.$shift3_end.'" and time(last_update) >= "00:00:00")');
                                });
                        })
                    ->get();
        
        $data['report'] = $query;
        // $dataExcel = $query;
        $dataExcel = $query->map(function ($user) use ($tank) {
            return [
                'No' => $user->id,
                'Time' => $user->last_update,
                'Tanki 3' => in_array('t_3', $tank) ? $user->tanki_3 : 0,
                'Tanki 4' => in_array('t_4', $tank) ? $user->tanki_4 : 0,
                'Tanki 5' => in_array('t_5', $tank) ? $user->tanki_5 : 0,
                'Tanki 6' => in_array('t_6', $tank) ? $user->tanki_6 : 0,
                'Tanki 7' => in_array('t_7', $tank) ? $user->tanki_7 : 0,
                'Tanki 8' => in_array('t_8', $tank) ? $user->tanki_8 : 0,
                'Tanki 10' => in_array('t_10', $tank) ? $user->tanki_10 : 0,
                'Tanki 17' => in_array('t_17', $tank) ? $user->tanki_17 : 0,
                'Tanki 21' => in_array('t_21', $tank) ? $user->tanki_21 : 0,
                'Tanki 22' => in_array('t_22', $tank) ? $user->tanki_22 : 0,
            ];
        });

        
        return Excel::download(new ReportExcel($dataExcel), 'data.xlsx');
        return view('main.report',$data);
    }
    
    public function reportAlarm(){
        $data['report'] = [];
        $data['tittle'] = 'Porting - Report';
        
        return view('main.alarm',$data);
   }
   public function reportAlarmAct(Request $request){
       $data['tittle'] = 'Porting - Report';
       $payload = $request->all();
       $query = DB::table('t_alarm_log')
                   ->whereDate('start_alarm', '>=', $payload['date-start'])
                   ->whereDate('start_alarm', '<=', $payload['date-end'])
                   ->get();
       $data['report'] = $query;
       
       return view('main.alarm',$data);
   }
    public function exportData(Request $request)
    {
        $payload = $request->all();
        dd($payload);
        $data1['tittle'] = 'Porting - Report';
        $query = Http::get('http://127.0.0.1:1880/porthings/api/v1.0/web/generate/report',$payload);
            $data = $query -> json();
            return Excel::download(new ReportExcel($data), 'chart.xlsx');
               // Handle API request failure
        return redirect()->route('export.form')->with('error', 'Failed to fetch data from API.');
    }
}