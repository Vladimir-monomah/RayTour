<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Session;
use Hash;
use Image; 

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\AdminModel;
use App\Admin;
use App\Cats;
use App\Tour;
use App\MoreImages;
use App\GeneralSetting;
use App\Slider;
use App\Partner;
use App\Social;
use App\FootHead;
use App\FooterMenu;
use App\Album;
use App\Albumimgs;
use App\Orders;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => [
            'logout',
            'userOrders',
            'editProfile',
            'editProfileView',
            'changePassword',
            'changePasswordView'
            ]]);

        $name = GeneralSetting::first();
        $this->site_title = $name->sitename;
        $this->catlist = Cats::orderBy('id', 'ASC')->get();
        $this->General = $name;
        $this->Social = Social::first();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
    }

    
    public function registration(Request $request){

        if ($this->validator($request->all())->fails()) {

            Session::flash('Сообщение','Все поля обязательны для заполнения');        
            Session::flash('type', 'danger');  
            return redirect()->back();


        }else{
            $data = array(
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'password' => hash('sha256', Input::get('password')),
                'phone' => Input::get('phone'),
                'city' => Input::get('city'),
                'address' => Input::get('address')
            );

            try {
                User::create($data);
                session::flash('Сообщение', 'регистрация прошла успешно.');
                Session::flash('type', 'success');
                return redirect()->back();

            } catch (\PDOException $e) {
                session::flash('Сообщение', ' Возникла проблема, попробуйте еще раз!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }
        }
    }

    public function signUp(Request $request){
        $user = User::where('email', '=', Input::get('email'))
            ->where('password', '=', hash('sha256', Input::get('password')))
            ->first();
        if ($user === null){            
            session::flash('Ошибка', ' Неправильный email или пароль!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
        else {
            Auth::login($user, $remember = true);
            return redirect()->to('/profile');
        }
    }

    public function profile(Request $request){
        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Profile';

        return view('profile', $data);
    }

    public function userOrders(){      
        try{  
        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Список заказов';

        $user = Auth::user();
        $data['orders'] = DB::table('orrdr')
            ->leftJoin('tours', function($join){
                $join->on('orrdr.tours_id', '=', 'tours.id');
            })
            ->where('email', $user->email)
            ->select(DB::raw('tours.name as tour_name'), DB::raw('orrdr.*'))
            ->orderBy('id', 'ASC')
            ->paginate(1000);
        
        return view('listorder', $data);
                
        } catch (\Exception $e) {
            die($e);
        }
    }

    
    public function editProfile(Request $request){
        try {            
            $user = User::findOrFail(Auth::user()->id);

            $validator = Validator::make($request->all(), [
                'name' =>    'required',
                'email' =>   'required',
                'phone' =>   'required',
                'city' =>    'required',
                'address' => 'required'
            ]);

            if ($validator->fails()) {
                Session::flash('Сообщение','Все поля обязательны для заполнения');        
                Session::flash('type', 'danger');  
                return redirect()->back();
            }else{
                DB::update('update orrdr set email=? where email=?', [Input::get('email'), $user->email]);

                $input = [
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'phone' => Input::get('phone'),
                    'city' => Input::get('city'),
                    'address' => Input::get('address')
                        ];

                $user->fill($input)->save(); //////////// UPDATE

                session::flash('Сообщение', 'Профиль успешно изменён.');
                Session::flash('type', 'success');
                return redirect()->back();
            }
        } catch (\PDOException $e) {
            session::flash('Сообщение', ' Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function editProfileView(Request $request)   {
        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Редактирование профиля';

        return view('editprofile', $data);
    }

    public function changePassword(Request $request){        
        $validator = Validator::make($request->all(), [
            'oldpassword' =>    'required',
            'newpassword' =>   'required',
            'repeatepassword' =>   'required'
        ]);
        if ($validator->fails()) {
            Session::flash('Сообщение','Все поля обязательны для заполнения');        
            Session::flash('type', 'danger');  
            return redirect()->back();
        }

        $user = User::findOrFail(Auth::user()->id);
        if(hash('sha256', Input::get('oldpassword')) != $user->password)
        {            
            Session::flash('Сообщение','Старый пароль не совпадает с текущим');        
            Session::flash('type', 'danger');  
            return redirect()->back();
        }

        if(Input::get('newpassword') != Input::get('repeatepassword'))
        {            
            Session::flash('Сообщение','Новые пароли не совпадают');        
            Session::flash('type', 'danger');  
            return redirect()->back();
        }

        try {
            $input = [
                'password' => hash('sha256', Input::get('newpassword'))
            ];
            $user->fill($input)->save();
            session::flash('Сообщение', 'Смена пароля прошла успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', ' Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function changePasswordView(Request $request){
        $data = [];
        $this->initData($data);
        $data['page_title'] = 'Изменение пароля';

        return view('changepassword', $data);
    }

    public function logout(Request $request){
        Auth::logout();
        
        $session = $request->session();
        $session->invalidate();
        $session->regenerateToken();
        
        return redirect('/');
    }

    private function initData(&$data){
        $data['site_title'] = $this->site_title;

        $data['catlist'] = $this->catlist;
        $data['General'] = $this->General;
        $data['Social'] = $this->Social;
        $data['user'] = Auth::user();
    }
}

?>