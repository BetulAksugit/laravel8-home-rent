<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\House;
use App\Models\Image;
use App\Models\Message;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public static function getsetting()
    {
        return Setting::first();
    }

    public function index(){
        $setting=Setting::first();
        $slider=House::select('id','title','image','slug','category_id','metrekare','phone','odasayisi','address','price')->where('status','=','True')->limit(6)->get();
        $daily=House::select('id','title','image','slug')->where('status','=','True')->limit(4)->inRandomOrder()->get();
        $last=House::select('id','title','image','slug','price')->where('status','=','True')->limit(4)->orderByDesc('id')->get();
        $picked=House::select('id','title','image','slug','price')->where('status','=','True')->limit(4)->inRandomOrder()->get();
        $data=[
            'setting'=>$setting,
            'daily'=>$daily,
            'last'=>$last,
            'picked'=>$picked,
            'slider'=>$slider,
            'page'=>'home'

        ];
        return view('home.index',$data);
    }

    public function gethouse(Request $request)
    {
        $search=$request->input('search');
        $count=House::where('title','like','%'.$search.'%')->get()->count();
        if($count==1)
        {
            $data=House::where('title','like','%'.$search.'%')->first();
            return redirect()->route('house',['id'=>$data->id,'slug'=>$data->slug]);
        }
        else
        {
            return redirect()->route('houselist',['search'=>$search]);
        }


    }
    public function houselist($search){
        $datalist=House::where('title','like','%'.$search.'%')->get();
        $setting=Setting::first();

        return view('home.search_houses',['search'=>$search,'datalist'=>$datalist,'setting'=>$setting]);

    }

    public function categoryhouses($id,$slug){
        $setting=Setting::first();
        $datalist=House::where('category_id',$id)->get();
        $data=Category::find($id);

        return view('home.category_houses',['data'=>$data,'datalist'=>$datalist,'setting'=>$setting]);

    }
    public function house($id,$slug){
        $setting=Setting::first();
        $data=House::find($id);
        $reviews=Review::where('house_id',$id)->get();
        $datalist=Image::where('house_id',$id)->get();
        return view('home.house_detail',['setting'=>$setting,'data'=>$data,'datalist'=>$datalist,'reviews'=>$reviews]);

    }

    public function sendreview(Request $request,$id)
    {
        $data = new Review;

        $data->user_id = Auth::id();
        $house = House::find($id);
        $data->house_id=$id;
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->IP = $_SERVER['REMOTE_ADDR'];

        $data->save();

        return redirect()->route('house',['id'=>$house->id,'slug'=>$house->slug])->with('success','Mesajınız kaydedilmiştir');
    }



    public function sendmessage(Request $request)
    {
        $data = new Message();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');


        $data->save();

        return redirect()->route('contact')->with('success','Mesajınız kaydedilmiştir');
    }
    public function aboutus(){
        $setting=Setting::first();
        return view('home.about',['setting'=>$setting,'page'=>'home']);
    }
    public function contact(){
        $setting=Setting::first();
        return view('home.contact',['setting'=>$setting,'page'=>'home']);
    }

    public function references(){
        $setting=Setting::first();
        return view('home.references',['setting'=>$setting,'page'=>'home']);
    }
    public function faq(){
        $setting=Setting::first();
        $datalist=Faq::all()->sortBy('position');
        return view('home.faq',['datalist'=>$datalist,'setting'=>$setting]);
    }
    public function login(){
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
            return view('admin.login');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
