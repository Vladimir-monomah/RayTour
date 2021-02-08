<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\GeneralSetting;

class AdminGuestController extends Controller
{





    public function __construct()
    {
        $this->site_title = 'Admin';
        $this->page_title = 'Login';
    }


   public function index()
   {

    $data['general'] = GeneralSetting::first();
    $data['yy'] = date("Y");
    return view('admin.login', $data);
   }






    public function authenticate(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
          ])
        ) {
            // Authentication passed...
            return redirect('admin/dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }













    public function register()
    {
        if (Auth::check()) {
            redirect('dashboard');
        }
        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Register';

        return view('admin/register', $data);
    }







}
