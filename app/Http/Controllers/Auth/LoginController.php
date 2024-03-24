<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Traits\GeneralServices;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\LUser;
use App\Models\LRole;
use App\Models\LRoute;
use App\Models\TPermission;
use Session;

class LoginController extends Controller
{
    use GeneralServices;
    public function index(Request $request){
        $data['title'] = 'Admin';
        return view('auth.login',$data);
    }

    public function post(Request $request)
    {
        $role = [
            'username' => 'Required',
            'password' => 'Required',
        ];
        

        $validateData = $this->ValidateRequest($request->all(), $role);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
       
        $password = $request['password'];
        $user = LUser::where('username', $request['username'])
                ->first();
        if($user!==null){
            $hashedPassword = $user['password'];
            if (Hash::check($password, $hashedPassword)) {
                $login = LUser::where('username', $request['username'])
                ->first();
                $page = TPermission::where('role_id',$login['role_id'])
                ->join('l_routes','t_permissions.route_id','l_routes.route_id')
                ->get();
                session::put('Pages',$page);
            } else {
                $login = null;
            }
        }else{
            Session::flush();
            return redirect()->back()->withErrors("username tidak tersedia");
        }
       
        if($login==null){
            Session::flush();
            return redirect()->back()->withErrors("password salah");
        }
       
        session::put('Users',$login);
        return redirect('/');
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}