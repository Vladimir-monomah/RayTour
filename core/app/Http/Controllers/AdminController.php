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



class AdminController extends Controller
{

    public function __construct(){
        $this->site_title = 'Admin';
        $this->page_title = 'Login';
    }


    public function dashboard(){
        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Панель администратора';
        $data['num_cat'] = Cats::query()->count();
        $data['num_tour'] = Tour::query()->count();
        $data['num_order'] = Orders::query()->count();
        return view('admin.home', $data);

   }


    public function changepassform(){
        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Change Password';
        return view('admin.changepass', $data);

   }



    public function makechangepass(Request $request){


        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);

            $validator = Validator::make($request->all(), [
            'newpassword' => 'required|min:4',
            'passwordagain' => 'required|min:4',
            'currentpassword' => 'required',
            ]);

            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            }else{



if (Hash::check($request->currentpassword, Auth::guard('admin')->user()->password)) {

          if(Input::get('newpassword')==Input::get('passwordagain')){

              $input = [
               'password' => Hash::make($request->newpassword)
                       ];

                $admin->fill($input)->save(); //////////// UPDATE

                Session::flash('Сообщение','Пароль успешно изменен');        
                Session::flash('type', 'success');  
                return redirect()->back();
                }else{
                Session::flash('Сообщение','Новый пароль не совпадает с подтверждением пароля');  
                Session::flash('type', 'danger');
                return redirect()->back();
                }

}else{
Session::flash('Сообщение','Текущий пароль неверен');  
Session::flash('type', 'danger');
return redirect()->back();
}

       
                  } //valid
}







//////------------------------------>>>>>>>>>>>>>>> CAT


    public function catOperation(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{

                $cat = [];
                $cat['name'] = $request->input('name');
                $cat['id'] = $request->input('id');

if ($cat['id']==0) {


        $exist = Cats::where('name', '=', Input::get('name'))->first();
        if ($exist === null) {

                try {
                Cats::create($cat);
                session()->flash('Сообщение', 'Добавлено успешно.');
                Session::flash('type', 'success');
                return redirect()->back();
                } catch (\PDOException $e) {
                session()->flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
                Session::flash('type', 'danger');
                return redirect()->back();
                }

        }else{
            Session::flash('Сообщение', "Имя уже существует !!!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }

}else{
        $catdetails = Cats::findOrFail($cat['id']);

$exist = Cats::where('name', '=', Input::get('name'))->where('id', '<>', $cat['id'])->first();
if ($exist === null) {

            $input = $request->all();
            $catdetails->fill($input)->save();
            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();

}else{
            Session::flash('Сообщение', "Имя уже существует !!!");
            Session::flash('type', 'danger');
            return redirect()->back();
}






}
     
     
 }////valid

}



    public function catview(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Список категорий';
        $data['catlist'] = Cats::orderBy('id', 'ASC')->paginate(100);
        return view('admin.listcat', $data);


   }


  public function catDelete(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $cat = Cats::findOrFail($request->input('id'));
            $cat->delete();
            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }
//////------------------------------>>>>>>>>>>>>>>> CAT







//////------------------------------>>>>>>>>>>>>>>> TOUR


    public function TourAdd(){


        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Добавить новый тур';
        $data['cat'] = Cats::query()->get();
        $data['general'] = GeneralSetting::first();
       return view('admin.addtour', $data);

   }


    public function TourAdded(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'rate' => 'required|numeric',
            'dur' => 'required',
            'loc' => 'required',
            'cat' => 'required',
            'description' => 'required',
            'inc' => 'required',
            'exc' => 'required',
            'mainimage' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{


            $FileName = time().".jpg";
            $destinationPath = 'tourimages/';
            $request->file('mainimage')->move($destinationPath, $FileName);

            $img = Image::make($destinationPath.$FileName);
            $img->resize(1200, 800);
            $img->save($destinationPath.$FileName);


        $Tour = Input::except('_method', '_token');
        $Tour['parent'] = $request->input('cat');
        $Tour['img'] = $FileName;


        try {
            Tour::create($Tour);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }



     
                }///valid

}


    public function TourView(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Tour List';
        $data['TourList'] = Tour::orderBy('id', 'ASC')->paginate(1000);
        return view('admin.listtour', $data);

   }



    public function TourEdit($id){

        $tour= Tour::findOrFail($id);

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Изменить свойство';
        $data['cat'] = Cats::query()->get();
        $data['general'] = GeneralSetting::first();
        $data['tour'] = $tour;
        return view('admin.edittour', $data);


   }



    public function TourUpdate($id, Request $request){

        $pro= Tour::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'rate' => 'required|numeric',
            'dur' => 'required',
            'loc' => 'required',
            'cat' => 'required',
            'description' => 'required',
            'inc' => 'required',
            'exc' => 'required',
        ]);

        // if validation fails, redirect back with errors
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{


 $Tour = Input::except('_method', '_token');
        $Tour['parent'] = $request->input('cat');


        if($request->hasFile('mainimage')){


            $fileName = time().".jpg";
            $destinationPath = 'tourimages/';
            $request->file('mainimage')->move($destinationPath, $fileName);

            $img = Image::make($destinationPath.$fileName);
            $img->resize(1200, 800);
            $img->save($destinationPath.$fileName);

            $Tour['img'] = $fileName;

}


            $pro->fill($Tour)->save();

            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();

            }

   }




  public function TourDelete(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $property = Tour::findOrFail($request->input('id'));
            $property->delete();
            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }








  public function TourFeatured(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

        $prop = Tour::findOrFail($request->input('id'));
        $prop->featured = !$prop->featured;
        $prop->save();

            session()->flash('Сообщение', 'Успешно Обновлено.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }

//////------------------------------>>>>>>>>>>>>>>> TOUR







//////------------------------------>>>>>>>>>>>>>>> SETTINGS





    public function generalsetting(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'General Setting';
        $data['info'] = GeneralSetting::where('id', '=', '1')->first();
        return view('admin.setgeneral', $data);

   }




    public function generalsettingUpdate(Request $request){
      $catdetails = GeneralSetting::first();


        $validator = Validator::make($request->all(), [
            'sitename' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'currency' => 'required',
           ]);

        // if validation fails, redirect back with errors
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{


            $input = Input::except('_method', '_token');
            $catdetails->fill($input)->save();
            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();



}//valid


   }






    public function logo(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Настройка логотипа';
        return view('admin.setlogo', $data);

   }





    public function logoUpload(Request $request){

        if($request->hasFile('image')){

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:png',
           ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{
            $fileName = "logo.png";
            $destinationPath = 'frontend/images/';
            $request->file('image')->move($destinationPath, $fileName);


        Session::flash('Сообщение', "Успешно Обновлено !!!");
        Session::flash('type', 'success');
        return redirect()->back();
}

}else{
            Session::flash('Сообщение', "Пожалуйста, выберите файл для загрузки !!!");
            Session::flash('type', 'danger');
            return redirect()->back();

}

   }





    public function flogo(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Настройка логотипа нижнего колонтитула';
        return view('admin.setlogof', $data);

   }





    public function flogoUpload(Request $request){

        if($request->hasFile('image')){

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:png',
           ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{
            $fileName = "footer-logo.png";
            $destinationPath = 'frontend/images/';
            $request->file('image')->move($destinationPath, $fileName);


        Session::flash('Сообщение', "Успешно Обновлено !!!");
        Session::flash('type', 'success');
        return redirect()->back();
}

}else{
            Session::flash('Сообщение', "Пожалуйста, выберите файл для загрузки !!!");
            Session::flash('type', 'danger');
            return redirect()->back();

}

   }




    public function slider(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Slider Setting';
        $data['sliders'] = Slider::orderby('id', 'ASC')->get();
        return view('admin.setslider', $data);
   }




    public function sliderUpload(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{


            $fileName = time().".jpg";
            $destinationPath = 'frontend/images/slider/';
            $request->file('image')->move($destinationPath, $fileName);

            $img = Image::make($destinationPath.$fileName);
            $img->resize(1200, 600);
            $img->save($destinationPath.$fileName);


        $slider = [];
        $slider['btxt'] = $request->input('boldtxt');
        $slider['stxt'] = $request->input('smalltxt');
        $slider['img'] = $fileName;




        try {
            Slider::create($slider);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }



     
                }

}



  public function SliderDelete(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $property = Slider::findOrFail($request->input('id'));
            $property->delete();
            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }






    public function topimg(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Настройка верхнего изображения';
        return view('admin.settopimg', $data);

   }





    public function topimgUpload(Request $request){


        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,jpg,png',
           ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{
            $fileName = "inner-banner.jpg";
            $destinationPath = 'frontend/images/';
            $request->file('image')->move($destinationPath, $fileName);

            $img = Image::make($destinationPath.$fileName);
            $img->resize(1920, 320);
            $img->save($destinationPath.$fileName);

        Session::flash('Сообщение', "Успешно Обновлено !!!");
        Session::flash('type', 'success');
        return redirect()->back();
}



   }







    public function partner(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Добавить логотип партнера';
        $data['partnerimg'] = Partner::orderby('id', 'ASC')->get();
        return view('admin.setpartner', $data);
   }


    public function partnerUpload(Request $request){

       
    $files = Input::file('images');
    $file_count = count($files);
    $uploadcount = 0;
    foreach($files as $file) {
      $rules = array('file' => 'required|mimes:jpeg,jpg,png');
      $validator = Validator::make(array('file'=> $file), $rules);
      if($validator->passes()){
    
        $destinationPath = 'frontend/images/partner/';

        $rr = rand(100000,999999);
        $picture = date('ymdHis').$rr;
        $filename = $picture.".jpg";
        $upload_success = $file->move($destinationPath, $filename);


$img = Image::make($destinationPath.$filename);
$img->resize(300, 200);
$img->save($destinationPath.$filename);


            $mimgs = [];
            $mimgs['img'] = $filename;

            Partner::create($mimgs);


        $uploadcount ++;
      }
    }
    if($uploadcount == $file_count){

        session::flash('Сообщение', "$uploadcount Изображения загружены успешно!");
        Session::flash('type', 'success');
        return redirect()->back();

    } 
    else {
        return redirect()->back()->withInput()->withErrors($validator);
    }
  


}




  public function partnerDelete(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $pp = Partner::findOrFail($request->input('id'));
            $pp->delete();
            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }








    public function social(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Социальные сети';
        $data['info'] = Social::where('id', '=', '1')->first();
        return view('admin.setsocial', $data);

   }




    public function socialUpdate(Request $request){
      $soc = Social::first();


            $input = Input::except('_method', '_token');
            $soc->fill($input)->save();
            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();



   }




    public function homesetting(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Social Setting';
        $data['info'] = GeneralSetting::where('id', '=', '1')->first();
        return view('admin.sethome', $data);

   }




    public function homesettingUpdate(Request $request){
      $soc = GeneralSetting::first();


//            $input = Input::except('_method', '_token');


 if ($soc)
 {
      $soc->head = $request['head'];
      $soc->txt = $request['txt'];
      $soc->about = $request['about'];
      $soc->save();
            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();
 }else{

            Session::flash('Сообщение', "ОШИБКА, попробуйте еще раз !!!");
            Session::flash('type', 'danger');
            return redirect()->back();
 }






   }




    public function footer(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Настройка меню нижнего колонтитула';
        $data['info'] = FootHead::where('id', '=', '1')->first();
        $data['menulist'] = FooterMenu::orderBy('id', 'ASC')->paginate(0);
        return view('admin.setfooter', $data);

   }




    public function footerUpdate(Request $request){
      $foterhead = FootHead::first();


            $input = Input::except('_method', '_token');
            $foterhead->fill($input)->save();
            Session::flash('Сообщение', "Название заголовка Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();



   }





    public function addfoter(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{

        $fmenu = [];
        $fmenu['name'] = $request->input('name');
        $fmenu['parent'] = $request->input('parent');



        try {
            FooterMenu::create($fmenu);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

                }

}




  public function deletefootmenu(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $fmenu = FooterMenu::findOrFail($request->input('id'));
            $fmenu->delete();
            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }





    public function editfootmenu($id){

        $footmenu= FooterMenu::findOrFail($id);

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Изменить меню нижнего колонтитула';
        $data['details'] = $footmenu;
        return view('admin.footermenuedit', $data);


   }



    public function editfootmenuUpdate($id, Request $request){

        $footmenu = FooterMenu::findOrFail($id);


            $input = $request->all();
            $footmenu->fill($input)->save();
            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();


   }






//////------------------------------>>>>>>>>>>>>>>> SETTINGS



    public function AddAlbums(){


        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Добавить новый альбом';
       return view('admin.addalbum', $data);

   }


    public function AddAlbumsDo(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mainimage' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{


            $FileName = time().".jpg";
            $destinationPath = 'frontend/images/albums/';
            $request->file('mainimage')->move($destinationPath, $FileName);

            $img = Image::make($destinationPath.$FileName);
            $img->resize(800, 400);
            $img->save($destinationPath.$FileName);


        $Album = Input::except('_method', '_token');
        $Album['img'] = $FileName;


        try {
            Album::create($Album);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }



     
                }///valid

}


    public function ShowAlbums(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Список альбомов';
        $data['AlbumList'] = Album::orderBy('id', 'ASC')->paginate(1000);
        return view('admin.listalbum', $data);

   }



    public function editalbum($id){

        $alb= Album::findOrFail($id);

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Редактировать альбом';
        $data['album'] = $alb;
        return view('admin.editalbum', $data);


   }



    public function editalbumDo($id, Request $request){

        $pro= Album::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'name' => 'required',
         ]);

        // if validation fails, redirect back with errors
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }else{


 $Tour = Input::except('_method', '_token');

        if($request->hasFile('mainimage')){

unlink('frontend/images/albums/'.$pro['img']);
            $fileName = time().".jpg";
            $destinationPath = 'frontend/images/albums/';
            $request->file('mainimage')->move($destinationPath, $fileName);

            $img = Image::make($destinationPath.$fileName);
            $img->resize(800, 400);
            $img->save($destinationPath.$fileName);

            $Tour['img'] = $fileName;

}


            $pro->fill($Tour)->save();

            Session::flash('Сообщение', "Успешно Обновлено !!!");
            Session::flash('type', 'success');
            return redirect()->back();

            }

   }




  public function deleteAlbum(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $alb = Album::findOrFail($request->input('id'));
            $alb->delete();

unlink('frontend/images/albums/'.$alb['img']);

            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }




    public function viewalbum($id){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Просмотр изображений альбома';
        $data['imgs'] = Albumimgs::where('parent', $id)->paginate(1000);
        return view('admin.viewalbum', $data);

   }



    public function viewalbumDo($id, Request $request){

        $validator = Validator::make($request->all(), [
            'mainimage' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{


            $FileName = time().".jpg";
            $destinationPath = 'frontend/images/albumdetails/';
            $request->file('mainimage')->move($destinationPath, $FileName);

            $img = Image::make($destinationPath.$FileName);
            $img->resize(1600, 1200);
            $img->save($destinationPath.$FileName);


        $Album = Input::except('_method', '_token');
        $Album['img'] = $FileName;
        $Album['parent'] = $id;


        try {
            Albumimgs::create($Album);
            session::flash('Сообщение', 'Добавлено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session::flash('Сообщение', 'Возникла проблема, попробуйте еще раз!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }



     
                }///valid

}




  public function deleteAlbumImg(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('Сообщение', 'Ой, неверный запрос!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{

            $alb = Albumimgs::findOrFail($request->input('id'));
            $alb->delete();

unlink('frontend/images/albumdetails/'.$alb['img']);

            session()->flash('Сообщение', 'Удалено успешно.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }




    public function orders(){

        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Список заказа';
        $data['orders'] = Orders::orderBy('id', 'ASC')->paginate(1000);
        return view('admin.listorder', $data);

   }

    public function vieworder($id){
$ord = Orders::findOrFail($id);

if (Input::get('action')) {

$input = [
'stat' => Input::get('do')
];

$ord->fill($input)->save(); //////////// UPDATE

    session()->flash('Сообщение', 'Успешно Обновлено.');
    Session::flash('type', 'success');
}



        $data = [];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Информация для заказа';
        $data['ord'] = Orders::findOrFail($id);
        $data['odt'] = date("jS F Y",$ord['tm']);
        return view('admin.orderdetails', $data);

   }



//////------------------------------>>>>>>>>>>>>>>> Albums


///-








    public function logout()
    {
        Auth::guard('admin')->logout();
       session()->flash('Сообщение', 'Вы только что вышли из системы!');
        return redirect('/admin');
    }



}

