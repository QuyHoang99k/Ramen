<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.index',compact('categories','sliders','products'));
    }
    public function UserLogout()
    {
       Auth::logout();
       return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Cập Nhật Hồ Sơ của bạn thành công',
            'alert-type'=>'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }
    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);
        $notification = array(
            'message' => 'Thay đổi mật khẩu của bạn thành công',
            'alert-type'=>'success'
        );
        $error = array(
            'message' => ' Mật khẩu của bạn không khớp vui lòng nhập lại',
            'alert-type'=>'error'
        );
		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('dashboard')->with($notification);
		}else{
			return redirect()->back()->with($error);
		}
    }
}
