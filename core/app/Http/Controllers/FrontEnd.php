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
use Illuminate\Support\Facades\Cookie;

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
use App\User;

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
        $this->initData($data);
        $data['page_title'] = 'HOME';

        $data['Sliders'] = Slider::orderBy('id', 'ASC')->get();
        $data['featured'] = Tour::where('featured', '=', '1')->get();
        $data['Album'] = Album::get();
        $data['partner'] = Partner::get();


        return view('index', $data);

   }

    public function tourFilter(){
        $data = [];
        $this->initData($data);
        $data['page_title'] = 'HOME';

        $tour_name=Input::get('tour_name');
        $min_price=Input::get('min_price');
        $max_price=Input::get('max_price');
        $days=Input::get('days');
        // die("'$tour_name'-'$min_price'-'$max_price'-'$days'");
        
        $tours_query = Tour::where('featured', '=', '1');
        if($tour_name <> ''){
            $tours_query = $tours_query->where('name', 'like', "%$tour_name%");
        }
        if($min_price <> ''){
            $tours_query = $tours_query->where('rate', '>=', $min_price);
        }
        if($max_price <> ''){
            $tours_query = $tours_query->where('rate', '<=', $max_price);
        }
        if($days <> ''){
            $tours_query = $tours_query->where('dur', '=', $days);
        }
        
        $data['Sliders'] = Slider::orderBy('id', 'ASC')->get();
        $data['featured'] = $tours_query->get();
        $data['Album'] = Album::get();
        $data['partner'] = Partner::get();


        return view('index', $data);

    }




    public function contact(){

        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Contact';

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

        try{
        $user = User::findOrFail(Auth::user()->id);
        }
        catch (\Exception $e) {
            return redirect('/registration')
                ->withErrors(array("Для заказа тура необходимо зарегистрироваться"));
        }

        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Заказать сейчас';

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
        $this->initData($data);
        $data['page_title'] = $pp->name;

        $data['tour'] = $pp;
       
        return view('tour', $data);

   }




    public function category($id){

        $pp = Cats::findOrFail($id);

        $data = [];
        $this->initData($data);
        $data['page_title'] = $pp->name;

        $data['allproperty'] = $pp->tours()->paginate(9);  

        return view('list', $data);

    }

    public function categoryFilter($id){

        $pp = Cats::findOrFail($id);

        $data = [];
        $this->initData($data);
        $data['page_title'] = $pp->name;

        $tour_name=Input::get('tour_name');
        $min_price=Input::get('min_price');
        $max_price=Input::get('max_price');
        $days=Input::get('days');
        // die("'$tour_name'-'$min_price'-'$max_price'-'$days'");
        
        $tours_query = Tour::where('parent', '=', $id);
        if($tour_name <> ''){
            $tours_query = $tours_query->where('name', 'like', "%$tour_name%");
        }
        if($min_price <> ''){
            $tours_query = $tours_query->where('rate', '>=', $min_price);
        }
        if($max_price <> ''){
            $tours_query = $tours_query->where('rate', '<=', $max_price);
        }
        if($days <> ''){
            $tours_query = $tours_query->where('dur', '=', $days);
        }
        
        $data['allproperty'] = $tours_query->paginate(9);  

        return view('list', $data);
    }

    public function albumview($id){

        $pp = Album::findOrFail($id);



        $data = [];
        $this->initData($data);
        $data['page_title'] = $pp->name;

        $data['album'] = $pp;  

        $data['imgs'] = $pp->imgs()->paginate(10);  

        return view('album', $data);

   }


   public function registration(){

        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Register';

        return view('registration', $data);
    }

    private function initData(&$data){
        $data['site_title'] = $this->site_title;

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;
        $data['user'] = Auth::user();
    }


}
