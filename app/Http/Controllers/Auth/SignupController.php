<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Http\Traits\GeneralServices;





class SignupController extends Controller
{
    use GeneralServices;
    public function index()

    {
        $data['code'] = '-';
        return view('auth.register');
    }
    public function post(Request $req){
        // dd($req->username);
        $response = Http::post('http://127.0.0.1:1880/porting/api/v1.0/web/auth/signup', [
            "ngecekweieumah"    => "wiixsdaqweAF!3213!414%!%%",
            "username"          => $req->username,
            "email"             => $req->email,
            "first_name"        => "msg.payload.first_name",
            "last_name"         => "msg.payload.last_name",
            "company"           => "msg.payload.company",
            "number"            => $req->number,
            "password"          => $req->password
            
        ]);
        $data = $response->json();
        $status = $data['status_code'];
        
        if ($status == 200) {
            $data['code'] = $data['status_desc'];
            return view('auth.register',$data);
        }else{
            $data['code'] = $data['status_desc'];
            return view('auth.register',$data); 
        }

    }
}