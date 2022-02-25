<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdminController extends Controller
{
    public function index(Request $request){
        if($request->getMethod() == 'POST'){

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'status'=>1
            ];

            if ( Auth::guard('admin')->attempt($credentials, true) ) {
                // đi tới trang admin
                return redirect(Route('backend.index'));
            }


            return back()->withErrors([
                'error' => 'Please check your password and email.',
            ]);

        }
        return view('components.backend.login.index');
    }
    public function logout()
    {
        if ( Auth()->guard('admin')->user()->id ) {
            Auth()->guard('admin')->logout();
        }
        return redirect(Route('admin.backend.login'));
    }
}
