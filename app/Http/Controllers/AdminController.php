<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as Controller;
use DataTables;
use Session;
class AdminController extends Controller
{
    public function index(){
        $data['tittle'] = 'Porting - Dashboard';
        $data['layer'] = DB::table('list_area')
                          ->get();
        return view('pages.v_main',$data);
    }
    public function detail($id){
        $data['tittle'] = 'Porting - Dashboard';
        $data['layer'] = DB::table('list_code')
                          ->where("area_id",$id)
                          ->get();

        $data['area'] = DB::table('list_area')
                    ->where("area_id",$id)
                    ->first();
        return view('pages.v_detail',$data);
    }
    public function statistic($id){
        $data['tittle'] = 'Porting - Dashboard';
        $data['layer'] = DB::table('list_code')
                          ->where("area_id",$id)
                          ->get();

        $data['area'] = DB::table('list_area')
                    ->where("area_id",$id)
                    ->first();
        return view('pages.v_statistic',$data);
    }
    public function power($id){
        $data['tittle'] = 'Porting - Dashboard';
        $data['layer'] = DB::table('list_code')
                          ->where("area_id",$id)
                          ->get();

        $data['area'] = DB::table('list_area')
                    ->where("area_id",$id)
                    ->first();
        return view('pages.v_power',$data);
    }
    public function report($id){
        $data['tittle'] = 'Porting - Dashboard';
        $data['layer'] = DB::table('list_code')
                          ->where("area_id",$id)
                          ->get();

        $data['area'] = DB::table('list_area')
                    ->where("area_id",$id)
                    ->first();
        return view('pages.v_report',$data);
    }
  
}
