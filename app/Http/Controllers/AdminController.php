<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function display(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
        return view('admin.login');
    }
    public function authadmin(Request $request)
    {
        $name=$request->post('username');
        $password=$request->post('password');

        $result=Admin::where(['username'=>$name])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('fail','***Please Enter the correct password***');
                return redirect('digisoft');
            }

        }
        else{
            $request->session()->flash('fail','***Please enter valid login details***');
            return redirect('digisoft');
        }
    }
    public function dashboard()
    {
      
        return view('admin.dashboard');
    }
    public function adminlogout(Request $request)
    {
        session()->forget('ADMIN_LOGIN', true);
        session()->forget('ADMIN_ID');
        session()->flash('fail', 'Logout Succesfull.');
        return redirect('digisoft');
    }

}
