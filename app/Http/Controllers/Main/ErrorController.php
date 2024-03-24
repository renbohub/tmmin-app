<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Traits\GeneralServices;
use Illuminate\Support\Facades\Http;
use Session;

class ErrorController extends Controller
{
    use GeneralServices;
    public function e404(Request $request){
       
        
        $data['tittle'] = 'Porting - Dashboard';
        return view('error.404',$data);
    }
    public function e403(Request $request){
       
        
        $data['tittle'] = 'Porting - Dashboard';
        return view('error.403',$data);
    }
    
   
}