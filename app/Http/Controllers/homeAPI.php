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
use App\comment;
use App\tinh;
use App\tintucTable;
use \App\mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class homeAPI extends Controller
{
  // ĐĂNG NHẬP
  public function loginPost(Request $request) {
    $request->validate(
      [
        'email' => 'required|email',
        'psw' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/'
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
    ]);
    $data = [
      'email' => $request->email,
      'password' => $request->psw,
    ];

    if(Auth::attempt(['email' => $request->email,
    'password' => $request->psw,'active'=> -1])) {
      $mail = new mailer;
      $title = 'Kích hoạt tài khoản';
      $mail->sendMail($title, 'http://127.0.0.1:8000/dang-nhap?email='.$request->email, $request->email);
      echo json_encode(['success' => false, 'message' => 'Tài khoản của bạn chưa được kích hoạt. Hãy kiểm tra email', 'redirect' => true, 'location' => '/dang-nhap']);
      return;
    }

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
      echo json_encode(['success' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng', 'redirect' => false, 'location' => '/dang-nhap']);
    }
  }
  // ĐĂNG KÝ
  public function registerPost(Request $request) {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email|unique:user',
        'psw_new_1' => ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/'],
        'psw_new_2' => ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/','same:psw_new_1'],
        'phone' => ['required','regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/','unique:user'],
        'gender' => 'nullable',
        'address' => 'required'
      ],
      [
        'required' => ':attribute không được để trống',
        'min' => ':attribute không được nhỏ hơn :min',
        'max' => ':attribute không được lớn hơn :max',
        'psw_new_1.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'psw_new_2.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'phone.regex' => ':attribute không hợp lệ',
        'confirmed' => ':attribute không giống nhau',
        'same' => "Mật khẩu cần phải giống nhau",
        'unique' => ":attribute đã được sử dụng"
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
    $data=[
      'name'=>$request->name,
      'email'=>$request->email,
      'password'=>bcrypt($request->psw_new_1),
      'phone'=>$request->phone,
      'address'=>$request->address,
      'role'=> 0,
      'active'=> -1
    ];
    UserTable::create($data);
    $mail = new mailer;
    $title = 'Kích hoạt tài khoản';
    $mail->sendMail($title, 'http://127.0.0.1:8000/dang-nhap?email='.$request->email, $request->email);
    echo json_encode(['success' => true, 'message' => 'Đăng ký thành công. Hãy kiểm tra email để kích hoạt tài khoản của bạn', 'redirect'=> true, 'location' => '/dang-nhap']);
  }
  // ĐỔI MẬT KHẨU
  public function changePswPost(Request $request) {
    $request->validate(
      [
        'psw_old' => 'required|min:6',
        'psw_new_1' => 'bail|required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/',
        'psw_new_2' => 'bail|required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/|same:psw_new_1'
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
  // ĐĂNG XUẤT
  public function logoutPost() {
    Auth::logout();
    Session::forget('account');
    echo json_encode(['success' => true, 'message' => 'Đăng xuất thành công. Bạn sẽ được đưa về trang chủ', 'redirect'=> true, 'location' => '/']);
  }

  //BÌNH LUẬN
  public function addComment(Request $request)
  {
    $data = array(
        'id_user' => $request->id_user,
        'id_news' => $request->id_news,
        'content' => $request->comment
    );
    comment::create($data);
    $showComment=comment::join('user','comment.id_user','=','user.id_user')->where('comment.id_news','=',$request->id_news)->orderby('id_comment','desc')->get();
    return $showComment;
  }
}
