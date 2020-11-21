<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\userTable;
use App\couponTable;
use App\mien;
use App\contact;
use App\gallerytable;
use App\slider;
use App\tinh;
use App\tintucTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class homeAPI extends Controller
{
  public function loginPost(Request $request)
  {
    $request->validate(
      [
        'email' => 'required|email',
        'psw' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/'
        // 'psw' => 'required|min:6'
      ],
      [
        'required' => ':attribute Không được để trống',
        'min' => ':attribute Không được nhỏ hơn :min',
        'max' => ':attribute Không được lớn hơn :max',
        'regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)'
    ],
    [
      'email' => 'Email',
      'psw' => 'Mật khẩu',
  ]
    ); 
    $data = [
      'email' => $request->email,
      'password' => $request->psw
    ];
    if (Auth::attempt($data))   {
        if (Auth::check()) {
          session(['account' => Auth::user()]); 
          // if ($request->checkbox == "true") {
          //     Cookie::queue('email', $request->email, 1000);
          //     Cookie::queue('password', $request->password, 1000);
          // } else {
          //     $email = Cookie::forget('email');
          //     $password = Cookie::forget('password');
          //     return redirect('/')->withCookie($email)->withCookie($password);
          // }
          echo json_encode(['success' => true, 'message' => 'Đăng nhập thành công', 'redirect'=> true, 'location' => '/']);
        }
    } else {
      echo json_encode(['success' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng']);
    }
  }
  public function registerPost(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'psw_new_1' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',
        'psw_new_2' => 'required|min:6|same:psw_new_1|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',
        'phone' => 'required|regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/',
        'gender' => 'nullable',
        'address' => 'required'
      ],
      [
        'required' => ':attribute không được để trống',
        'min' => ':attribute không được nhỏ hơn :min',
        'max' => ':attribute không được lớn hơn :max',
        'psw_new_1.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'psw_new_2.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'confirmed' => ':attribute không giống nhau',
        'same' => "Mật khẩu mới cần giống nhau"
      ],
      [
        'name' => 'Họ và Tên',
        'email' => 'Email',
        'psw_new_1' => 'Mật khẩu',
        'psw_new_2' => 'Nhập lại mật khẩu',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ'
      ]
    ); 
    $getEmail=UserTable::where('email','=',$request->email)->get();
    if (count($getEmail)>0) {
        return 1;
    }else{
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
        ];
        UserTable::create($data);
        return 0;
    }
    
  }
  public function changePswPost(Request $request) {
    $request->validate(
      [
        'psw_old' => 'required|min:6',
        // 'psw' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/'
        'psw_new_1' => 'required|min:6|',
        'psw_new_2' => 'required|min:6|same:psw_new_1'
      ],
      [
        'required' => ':attribute không được để trống',
        'min' => ':attribute không được nhỏ hơn :min',
        'max' => ':attribute không được lớn hơn :max',
        'regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'confirmed' => ':attribute không giống nhau',
        'same' => "Mật khẩu mới cần giống nhau"
      ],
      [
      'psw_old' => 'Mật khẩu cũ',
      'psw_new_1' => 'Mật khẩu mới',
      'psw_new_2' => 'Nhập lại mật khẩu mới',
      ]
    ); 
    $account = Session::get('account');
    $data = [
      'email' => $account->email,
      'password' => $request->psw_old
    ];
    if (Auth::attempt($data)) {
      if (Auth::check()) {
        UserTable::where('email','=',$account->email)->update(array(
          'password'=>bcrypt($request->psw_new_1),
        ));
        Session::forget('account');
        echo json_encode(['success' => true, 'message' => 'Thay đổi mật khẩu thành công', 'redirect' => true, 'location' => '/dang-nhap']);
      }
    }else{
      echo json_encode(['success' => false, 'message' => 'Xin hãy kiểm tra lại thông tin đã nhập', 'redirect' => false, 'location' => '/doi-mat-khau']);
    }
  }
}