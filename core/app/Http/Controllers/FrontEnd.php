<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use DB;
use Session;
use Hash;
use Image; 
use Mail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

// use App\User;
// use App\AdminModel;
// use App\Admin;
use App\Cats;
use App\Tour;
use App\GeneralSetting;
use App\Slider;
use App\Partner;
use App\Social;
use App\Album;
use App\Albumimgs;
use App\Orders;

class FrontEnd extends Controller
{



    public function __construct(){
        $name = GeneralSetting::first();
        $this->site_title = $name->sitename;
        $this->page_title = 'Логин';
        $this->catlist = Cats::orderBy('id', 'ASC')->get();
        $this->General = $name;
        $this->Social = Social::first();
    }



    public function home(){
        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'HOME';

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        $data['Sliders'] = Slider::orderBy('id', 'ASC')->get();
        $data['featured'] = Tour::where('featured', '=', '1')->get();
        $data['Album'] = Album::get();
        $data['partner'] = Partner::get();


        return view('index', $data);

   }





    public function contact(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Contact';

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        return view('contact', $data);

   }


    public function contactSend(Request $request){

            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'message' => 'required',
            ]);

            if ($validator->fails()) {

            Session::flash('message','All Fields Are Required');        
            Session::flash('type', 'danger');  
            return redirect()->back();


            }else{


    $data = array(
        'abir_name' => Input::get('name'),
        'abir_phone' => Input::get('phone'),
        'abir_website' => Input::get('website'),
        'abir_message' => Input::get('message'),
    );


$sent = Mail::send('email', $data, function($message)
{
    $message->from(Input::get('email'));
    $message->to($this->General->email, '')->subject('Message From'.$this->General->sitename);
});

                Session::flash('Сообщение','Сообщение успешно отправлено');        
                Session::flash('type', 'success');  
                
            return redirect()->back();

                }

   }


    public function order($id){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Заказать сейчас';

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        return view('order', $data);

   }


    public function orderDo($id, Request $request){

            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'date' => 'required',
            'numppl' => 'required',
            ]);

            if ($validator->fails()) {

            Session::flash('Сообщение','Все поля обязательны для заполнения');        
            Session::flash('type', 'danger');  
            return redirect()->back();


            }else{


    $data = array(
        'name' => Input::get('name'),
        'tours_id' => $id,
        'address' => Input::get('address'),
        'mobile' => Input::get('mobile'),
        'email' => Input::get('email'),
        'dt' => Input::get('date'),
        'numppl' => Input::get('numppl'),
        'tm' => time(),
        'stat' => '0',
    );



        try {
            Orders::create($data);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', ' Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

                }

   }



    public function Tourview($id){

        $pp = Tour::findOrFail($id);


        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = $pp->name;

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        $data['tour'] = $pp;
       
        return view('tour', $data);

   }




    public function category($id){

        $pp = Cats::findOrFail($id);



        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = $pp->name;

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        $data['allproperty'] = $pp->tours()->paginate(9);  

        return view('list', $data);

   }



    public function albumview($id){

        $pp = Album::findOrFail($id);



        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = $pp->name;

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;

        $data['album'] = $pp;  

        $data['imgs'] = $pp->imgs()->paginate(10);  

        return view('album', $data);

   }









}
