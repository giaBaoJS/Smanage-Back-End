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
use App\bill;
use App\tour;
use App\passenger;
use App\comment_tour;
use App\billdoitac;
use App\doitacTable;
use App\tinh;
use App\tintucTable;
use \App\mailer;
use App\payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
date_default_timezone_set("Asia/Ho_Chi_Minh");
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
    if($request->prev_url) {
      $location = $request->prev_url;
    }
    if(Auth::attempt(['email' => $request->email,
    'password' => $request->psw,'active'=> -1])) {
      $user = UserTable::where('email','=',$request->email)->first();
      $email = $user->email;
      $name = $user->name;
      $phone = $user->phone;
      $address = $user->address;
      $mail = new mailer;
      $title = '[GOLDEN TOURS] Kích hoạt tài khoản';
      $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
        <div style="max-width:1000px;margin:auto;background:#ffffff">
          <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
            <div style="width:70px;margin-top:15px; margin: 0 auto;">
              <img src="http://127.0.0.1:8000/FrontEnd/assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
                class="CToWUd">
            </div>
          </div>
          <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
            <div style="padding:35px 15px">
              <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
              <br>
              <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý khách đã quan tâm đến dịch vụ của Golden Tours.
                <span style="font-weight: 500;color: #ff0000;">Quý khách đã đăng ký thành công.</span>
              </p>
              <p style="margin:0;font-size:16px">Tài khoản của quý khách cần được kích hoạt, click vào nút sau để kích hoạt tài
                khoản.</p>
              <div style="padding:40px;margin:auto;text-align:center">
                <a href="http://127.0.0.1:8000/dang-nhap?email=' . $email . '"
                  style="width:fit-content;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
                  target="_blank">Kích hoạt tài khoản</a>
              </div>
              <br>
            </div>
            <div style="border-top:1.5px solid #f1f1f1"></div>
            <div style="padding:10px 15px">
              <h4 style="color:#000">THÔNG TIN TÀI KHOẢN </h4>
              <div style="padding:0px 30px">
                <table style="width:100%; font-size: 16px;">
                  <tbody>
                    <tr>
                      <td>
                        <b>Họ tên: </b>'.$name.'
                      </td>
                      <td>
                        <b>Email: </b>
                        <a style="color: #000; text-decoration: none;" href="#" target="_blank">'.$email.'</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Tình trạng: </b>chưa kích hoạt.
                      </td>
                      <td>
                        <b>Số điện thoại: </b> '.$phone.'
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Địa chỉ : </b>
                        '.$address.'
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div style="border-top:1.5px solid #f1f1f1"></div>
          </div>
          <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
            <div style="float:left;width:50%">
              <ul style="list-style:none;margin:0;padding:0">
                <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                    href="#"><b>Goldentours/8845</b></a></li>
                <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                    target="_blank"><b>Goldentours.com</b></a></li>
                <li>Số điện thoại: <b>0904047470</b></li>
              </ul>
            </div>
          </div>
        </div>
      </div>';
      if($mail->sendMail($title, $desc, $email) === 1) {
        echo json_encode(['success' => false, 'message' => 'Tài khoản của quý khách chưa được kích hoạt. Hãy kiểm tra email', 'redirect' => true, 'location' => $location ?? '/dang-nhap']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => $location ?? '/dang-nhap']);
      }
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
        echo json_encode(['success' => true, 'message' => 'Đăng nhập thành công', 'redirect'=> true, 'location' => $location ?? '/']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng', 'redirect' => false, 'location' => $location ?? '/dang-nhap']);
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
      'active'=> -1,
      'created_at' =>  date("Y:m:d H:i:s")
    ];
    $email = $request->email;
    $name = $request->name;
    $phone = $request->phone;
    $address = $request->address;
    $mail = new mailer;
    $title = '[GOLDEN TOURS] Kích hoạt tài khoản';
    $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
      <div style="max-width:1000px;margin:auto;background:#ffffff">
        <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
          <div style="width:70px;margin-top:15px; margin: 0 auto;">
            <img src="http://127.0.0.1:8000/FrontEnd/assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
              class="CToWUd">
          </div>
        </div>
        <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
          <div style="padding:35px 15px">
            <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
            <br>
            <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý khách đã quan tâm đến dịch vụ của Golden Tours.
              <span style="font-weight: 500;color: #ff0000;">Quý khách đã đăng ký thành công.</span>
            </p>
            <p style="margin:0;font-size:16px">Tài khoản của quý khách cần được kích hoạt, click vào nút sau để kích hoạt tài
              khoản.</p>
            <div style="padding:40px;margin:auto;text-align:center">
              <a href="http://127.0.0.1:8000/dang-nhap?email=' . $email . '"
                style="width:fit-content;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
                target="_blank">Kích hoạt tài khoản</a>
            </div>
            <br>
          </div>
          <div style="border-top:1.5px solid #f1f1f1"></div>
          <div style="padding:10px 15px">
            <h4 style="color:#000">THÔNG TIN TÀI KHOẢN </h4>
            <div style="padding:0px 30px">
              <table style="width:100%; font-size: 16px;">
                <tbody>
                  <tr>
                    <td>
                      <b>Họ tên: </b>'.$name.'
                    </td>
                    <td>
                      <b>Email: </b>
                      <a style="color: #000; text-decoration: none;" href="#" target="_blank">'.$email.'</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>Tình trạng: </b>chưa kích hoạt.
                    </td>
                    <td>
                      <b>Số điện thoại: </b> '.$phone.'
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>Địa chỉ : </b>
                      '.$address.'
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div style="border-top:1.5px solid #f1f1f1"></div>
        </div>
        <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
          <div style="float:left;width:50%">
            <ul style="list-style:none;margin:0;padding:0">
              <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                  href="#"><b>Goldentours/8845</b></a></li>
              <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                  target="_blank"><b>Goldentours.com</b></a></li>
              <li>Số điện thoại: <b>0904047470</b></li>
            </ul>
          </div>
        </div>
      </div>
    </div>';
    if($mail->sendMail($title, $desc, $email) === 1) {
      UserTable::create($data);
      echo json_encode(['success' => true, 'message' => 'Đăng ký thành công. Hãy kiểm tra email để kích hoạt tài khoản của quý khách', 'redirect'=> true, 'location' => '/dang-nhap']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/dang-ky']);
    }
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
  // QUÊN MẬT KHẨU
  public function forgotPswPost(Request $request) {
    $request->validate(
      [
        'email' => 'required|email',
      ],
      [
        'required' => ':attribute Không được để trống',
    ],
    [
      'email' => 'Email',
    ]);
    $email = $request->email;
    $user = userTable::where('email','=',$email)->first();
    if ($user) {
      $token = base64_encode("random_bytes(32)"); //tạo 1 chuỗi token random

      $hashedToken = bcrypt($token); //hash token

      $expires = date('U') + 600; // 10 phút

      userTable::where('email','=',$email)->update(['token'=> $hashedToken,'expired'=>$expires]); //upload token đã hash lên database

      $name = $user->name;
      $mail = new mailer;
      $title = '[GOLDEN TOURS] Tìm mật khẩu';
      $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
                  <div style="max-width:1000px;margin:auto;background:#ffffff">
                    <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
                      <div style="width:70px;margin-top:15px; margin: 0 auto;">
                        <img src="http://127.0.0.1:8000/FrontEnd/assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
                          class="CToWUd">
                      </div>
                    </div>
                    <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
                      <div style="padding:35px 15px">
                        <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
                        <br>
                        <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý khách đã quan tâm đến dịch vụ của Golden Tours.
                          <span style="font-weight: 500;color: #ff0000;">Quý khách đang thực hiện chức năng tìm lại mật khẩu.</span>
                        </p>
                        <p style="margin:0;font-size:16px">Nếu quý khách không thực hiện việc này xin nhấn vào <a href="http://127.0.0.1:8000/doi-mat-khau">đây</a> để thực hiện việc đổi mật khẩu. Nếu Quý khách đang thực chức năng tìm lại mật khẩu thì xin click vào nút phía dưới.</p>
                        <div style="padding:40px;margin:auto;text-align:center">
                          <a href="http://127.0.0.1:8000/doi-quen-mat-khau?email=' . $email . '&token=' . $token . '"
                            style="width:fit-content;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
                            target="_blank">Tìm lại mật khẩu</a>
                        </div>
                        <br>
                      </div>
                    </div>
                    <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
                      <div style="float:left;width:50%">
                        <ul style="list-style:none;margin:0;padding:0">
                          <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                              href="#"><b>Goldentours/8845</b></a></li>
                          <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                              target="_blank"><b>Goldentours.com</b></a></li>
                          <li>Số điện thoại: <b>0904047470</b></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>';
      if($mail->sendMail($title, $desc, $email) === 1) {
        echo json_encode(['success' => true, 'message' => 'Tìm mật khẩu thành công. Hãy kiểm tra email để kích hoạt tài khoản của quý khách', 'redirect'=> true, 'location' => '/dang-nhap']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/doi-mat-khau']);
      }
    }else{
      echo json_encode(['success' => false, 'message' => 'Email không chính xác', 'redirect' => true, 'location' => '/doi-mat-khau']);
    }
  }
  // THỰC HIỆN ĐỔI MẬT KHẨU KHI NGƯỜI DÙNG THỰC HIỆN CHỨC NĂNG QUÊN MẬT KHẨU
  public function changeForgotPswPost(Request $request) {
    $request->validate(
      [
        'psw_new_1' => ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/'],
        'psw_new_2' => ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/','same:psw_new_1'],
      ],
      [
        'required' => ':attribute không được để trống',
        'psw_new_1.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'psw_new_2.regex' => ':attribute phải từ 8 ký tự (Hoa, thường, 0-9)',
        'same' => "Mật khẩu cần phải giống nhau",
      ],
      [
        'psw_new_1' => 'Mật khẩu',
        'psw_new_2' => 'Nhập lại mật khẩu',
      ]
    );
    $newPsw = $request->psw_new_2;
    $email = $request->email;
    $token = $request->token;
    $user = userTable::where('email','=', $email)->first();
    $isExpired = $user->expired;
    $hashToken = $user->token;
    $isSameToken = Hash::check($token, $hashToken);

    if ($user) {
      if ($isExpired < date('U') || !$isSameToken ) {
        echo json_encode(['success' => false, 'message' => 'quý khách không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
        return;
      }
      Session::forget('account');
      $hashedNewPass = bcrypt($newPsw); //băm mật khẩu mới
      userTable::where('email','=', $email)->update(['password'=>$hashedNewPass,'token'=>'','expired'=>'']);
      echo json_encode(['success' => true, 'message' => 'Quý khách đã đổi mật khẩu thành công', 'redirect' => true, 'location' => '/dang-nhap']);
    }else{
      echo json_encode(['success' => false, 'message' => 'quý khách không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
    }
  }
  // CẬP NHẬT THÔNG TIN TÀI KHOẢN
  public function updateAccountPost(Request $request) {
    $account = Session::get('account');
    if($request->avatar !== 'undefined') {
      $request->validate(
        [
          'name' => 'required',
          'phone' => ['required','regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/','unique:user,phone,' . $account->id_user .',id_user'],
          'gender' => 'nullable',
          'address' => 'required',
          'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ],
        [
          'required' => ':attribute không được để trống',
          'phone.regex' => ':attribute không hợp lệ',
          'unique' => ":attribute đã được sử dụng",
          'mimes' => ":attribute chỉ được sử dụng đuôi 'jpeg,jpg,png,gif'"
        ],
        [
          'name' => 'Họ và Tên',
          'phone' => 'Số điện thoại',
          'address' => 'Địa chỉ',
          'avatar'=>'Hình đại diện'
          ]
      );
    } else {
      $request->validate(
        [
          'name' => 'required',
          'phone' => ['required','regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/','unique:user,phone,' . $account->id_user .',id_user'],
          'gender' => 'nullable',
          'address' => 'required',
        ],
        [
          'required' => ':attribute không được để trống',
          'phone.regex' => ':attribute không hợp lệ',
          'unique' => ":attribute đã được sử dụng",
        ],
        [
          'name' => 'Họ và Tên',
          'phone' => 'Số điện thoại',
          'address' => 'Địa chỉ',
          ]
      );
    }

    $newPhone = $request->phone;
    $newGender = $request->gender;
    $newAddress = $request->address;
    $newName = $request->name;
    $email = $request->email;
    $path = '';
    $file = $request->avatar;

    if ($file !== 'undefined') {
      $path = $file->getClientOriginalName();
      $file->move('BackEnd/assets/images/users/', $path);
    } else {
      $path=  $account->url_avatar ? $account->url_avatar : 'user.png';
    }
    $user = userTable::where('email','=',  $email)->first();
    if($user) {
      userTable::where('email','=',  $email)->update(['name'=>$newName,'phone'=>$newPhone,'gender'=>$newGender,'address'=>$newAddress,'url_avatar'=>$path]);
      $newUser = userTable::where('email','=',  $email)->first();
      session(['account' => $newUser]);
      echo json_encode(['success' => true, 'message' => 'Quý khách đã cập nhật thành công', 'redirect' => true, 'location' => '/cap-nhat-tai-khoan']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Quý khách không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
    }
  }
  // LIÊN HỆ
  public function contactPost(Request $request) {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'content' => 'required',
        'phone' => 'required'
      ],
      [
        'required' => ':attribute không được để trống',
      ],
      [
        'name' => 'Họ và Tên',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'content' => 'Lời nhắn',
      ]
    );
    $data = [
      'name' => $request->name,
      'email' => $request->email,
      'content' => $request->content,
      'phone' => $request->phone,
    ];
    $email= $request->email;
    $name = $request->name;
    $phone = $request->phone;
    $mail = new mailer;
    $title = '[GOLDEN TOURS] Liên Hệ';
    $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
                <div style="max-width:1000px;margin:auto;background:#ffffff">
                  <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
                    <div style="width:70px;margin-top:15px; margin: 0 auto;">
                      <img src="http://127.0.0.1:8000/FrontEnd/assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
                        class="CToWUd">
                    </div>
                  </div>
                  <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
                    <div style="padding:35px 15px">
                      <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
                      <br>
                      <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý khách đã quan tâm đến dịch vụ của <b>Golden Tours.</b></p>
                      <p style="margin:0;font-size:16px;">Quý khách đã gửi mail liên hệ với chúng tôi. Chúng tôi sẽ liện hệ với quý khách qua số điện thoại mà quý khách đã cung cấp: <b>'.$phone.'</b> trong thời gian sớm nhất.</p>
                      <p style="margin:0;font-size:16px;">Nếu có bất kì thắc mắc nào xin vui lòng liên hệ tại <a href="#">đây</a> hoặc số điện thoại <b>0909123123</b></p>
                      <br>
                    </div>
                  </div>
                  <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
                    <div style="float:left;width:50%">
                      <ul style="list-style:none;margin:0;padding:0">
                        <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                            href="#"><b>Goldentours/8845</b></a></li>
                        <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                            target="_blank"><b>Goldentours.com</b></a></li>
                        <li>Số điện thoại: <b>0904047470</b></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>';
    if($mail->sendMail($title, $desc, $email) === 1) {
      contact::create($data);
      echo json_encode(['success' => true, 'message' => 'Gửi liên hệ thành công. Chúng tôi sẽ liên lạc lại với quý khách sớm nhất. Xin cảm ơn', 'redirect'=> true, 'location' => '/']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/lien-he']);
    }

  }
  // ĐĂNG XUẤT
  public function logoutPost() {
    if(Auth::check()) {
      Auth::logout();
      Session::forget('account');
      echo json_encode(['success' => true, 'message' => 'Đăng xuất thành công. quý khách sẽ được đưa về trang chủ', 'redirect'=> true, 'location' => '/']);
    }
    // else {
    //   echo json_encode(['success' => false, 'message' => 'Đăng xuất không thành công. quý khách sẽ được đưa về trang chủ', 'redirect'=> true, 'location' => '/']);
    // }
  }
  // BÌNH LUẬN
  public function addComment(Request $request)
  {
    if($request->type == 'news') {
      $data = array(
        'id_user' => $request->id_user,
        'id_news' => $request->id,
        'content' => $request->comment,
        'rating'=> $request->rate ?? 5,
        'created_at' =>  date("Y:m:d H:i:s")
      );
      comment::create($data);
      $showComment = comment::join('user','comment.id_user','=','user.id_user')
            ->select('user.url_avatar','user.name','comment.created_at','comment.content','comment.rating')
            ->where('comment.id_news','=',$request->id)
            ->orderby('id_comment','desc')
            ->get();
      return $showComment;
    } else if($request->type == 'tour') {
      $data = array(
        'id_user' => $request->id_user,
        'id_tour' => $request->id,
        'content' => $request->comment,
        'rating'=> $request->rate ?? 5,
        'created_at' =>  date("Y:m:d H:i:s")
      );
      comment_tour::create($data);
      $showComment = comment_tour::join('user','user.id_user','=','comment_tour.id_user')
          ->select('user.url_avatar','user.name','comment_tour.created_at','comment_tour.content','comment_tour.rating')
          ->where('comment_tour.id_tour','=',$request->id)
          ->orderby('id_comment_tour','desc')
          ->get();
      return $showComment;
    }

  }
  // PHÂN TRANG BÌNH LUẬN
  public function paginationCmts(Request $request) {
    if($request->type==='news') {
      $gioihansp = ($request->pageCmts - 1) * 4;
      $showComment=comment::join('user','user.id_user','=','comment.id_user')->where('comment.id_news','=',$request->id)->orderby('id_comment','desc')->get();
      $showCommentLimit=comment::join('user','user.id_user','=','comment.id_user')->where('comment.id_news','=',$request->id)->orderby('id_comment','desc')->offset($gioihansp)->limit(4)->get();
      return $showComment;
    } else if($request->type==='tour') {
      $gioihansp = ($request->pageCmts - 1) * 4;
      $showComment=comment_tour::join('user','user.id_user','=','comment_tour.id_user')->where('comment_tour.id_tour','=',$request->id)->orderby('id_comment_tour','desc')->get();
      $showCommentLimit=comment_tour::join('user','user.id_user','=','comment_tour.id_user')->where('comment_tour.id_tour','=',$request->id)->orderby('id_comment_tour','desc')->offset($gioihansp)->limit(4)->get();
      return $showComment;
    }

  }
  // PHÂN TRANG TIN TỨC
  public function paginationNews(Request $request) {
    // $showMien=mien::all();
    // $showTinh=tinh::all();
    // $showNews=tintucTable::join('user','news.id_user','=','user.id_user')->get();
    // $showNewsHighlights=tintucTable::orderby('id_news','desc')->limit(3)->get();
    // return view('front-end/pages/news/news',['showNews'=>$showNews,'showNewsHighlights'=>$showNewsHighlights,'showMien'=>$showMien,'showTinh'=>$showTinh]);
    $gioihansp = ($request->pageNews - 1) * 4;
    $showNewsLimit=tintucTable::join('user','news.id_user','=','user.id_user')->offset($gioihansp)->limit(6)->get();
    $showComment=comment::join('user','user.id_user','=','comment.id_user')->get();
    return [$showNewsLimit, $showComment];
  }
  // TÌM LỊCH SỬ KHÔNG ĐĂNG NHẬP BẰNG SỐ ĐIỆN THOẠI
  public function findHistoryPost(Request $request) {
    $user = userTable::where('phone','=',$request->phone)->first();
    if($user) {
      $bill = bill::where('id_user','=',$user->id_user)->get();
      if(count($bill)) {
        session(['find-history' => $request->phone]);
        echo json_encode(['success' => true, 'message' => 'Đã tìm ra lịch sử đặt tour', 'redirect'=> true, 'location' => '/lich-su-2']);
      } else {
        echo json_encode(['success' => true, 'message' => 'Bạn chưa từng đặt tour tại Golden Tours. Hãy nhanh chóng đặt tour đi nào', 'redirect'=> false, 'location' => '/']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Số điện thoại không chính xác hoặc chưa sử dụng đặt tour', 'redirect'=> false, 'location' => '/']);
    }
    // return view('front-end/auth/history',['bill'=>$bill,'showMien'=>$this->showMien]);
  }
  //COUPON
  public function checkCoupon(Request $request)
  {
      $showCouponOne=couponTable::where('code_coupon','=',$request->name_code)->where('id_doitac','=',$request->id_doitac)->first();
     if ($showCouponOne) {
        // $date_start = explode("-", $showCouponOne->date_start);
        // $dayEnd = strtotime(date('m/d/Y',strtotime(Carbon::now())));
        // $dayStart =strtotime(date('d/m/Y',strtotime($date_start[1])));
        //   if ($dayEnd>$dayStart && $showCouponOne->quantity!=0) {
        //       return 1;
        //   } else {
        //       return $showCouponOne;
        //   }
        if ($showCouponOne->status==0) {
            return 1;
        }else{
            return $showCouponOne;
        }

     }else{
        return 0;
     }

  }
  //Passenger
  public function addPassenger(Request $request)
  {
      if (!session('stepCheckout')) {
        $showBill=bill::orderby('id_bill','desc')->limit(1)->first();
        foreach ($request->mang as $t) {
          $data = array(
              'id_bill' => $showBill->id_bill,
              'name_passenger' => $t['name_passenger'],
              'address_passenger' => $t['address_passenger'],
              'phone_passenger' => $t['phone_passenger'],
              'gender_passenger' => $t['gender_passenger'],
              'country_passenger' => $t['country_passenger'],
              'passport_passenger' => $t['passport_passenger'],
          );
          passenger::create($data);
          $kt=array(
            'checkBill'=>1,
          );
        session(['stepCheckout'=>$kt]);
        }
        return 1;
      }else{
        return 0;
      }

  }
  public function addPayment(Request $request)
  {
    $showBill=bill::find($request->id_bill);
    $showUser=userTable::find($showBill->id_user);
    $showPTTT=payment::find($request->id_payment);
    $showTour=tour::find($showBill->id_tour);
    $showPass=passenger::where('id_bill','=',$showBill->id_bill)->get();
    $showBill->id_payment=$request->id_payment;
    $showBill->save();
    $email = $showUser->email;
    $name = $showUser->name;
    $payment=$showPTTT->name_payment;
    $tourDstart=$showTour->date_start;
    $time=$showTour->time;
    $quantity=$showBill->quantity_adults+$showBill->quantity_children;
    $total=number_format($showBill->total_price,0,'','.');
    $mail = new mailer;
    $title = '[GOLDEN TOURS] Đặt tour du lịch thành công';
    $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
    <div style="max-width:1000px;margin:auto;background:#ffffff">
      <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
        <div style="width:70px;margin-top:15px; margin: 0 auto;">
          <img src="BackEnd/assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
            class="CToWUd">
        </div>
      </div>
      <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
        <div style="padding:35px 15px">
          <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
          <br>
          <p style="margin:0;font-size:16px; margin-bottom: 15px;"> Phương thức Thanh toán: '.$payment.'.
            <!-- <span style="font-weight: 500;color: #ff0000;">Bạn đã đăng ký tour thành công .</span> -->
          </p>
          <p style="margin:20px 0px;font-size:16px">Kính chào quý khách!
            - Cảm ơn quý Khách đã sử dụng dịch vụ của Golden Tours. Quý khách cần thanh toán trước ngày '.$tourDstart.'.</p>
          <p style="margin:20px 0px;font-size:16px">- Quý khách cần hổ trọ vui lòng liên hệ: website
            https://goldentours.vn online 24/7 sẽ mang lại thuận tiện cho quý khách trong việc sử dụng và quản lý các dịch
            vụ đăng ký tại Golden Tours.</p>
          <p style="margin:20px 0px;font-size:16px">- Website https://goldentours.vn online 24/7 sẽ mang lại thuận tiện
            cho quý khách trong việc sử dụng và quản lý các dịch vụ đăng ký tại Golden Tours.</p>
          <div style="margin:auto;text-align:center">
          <ul style="text-align: left;width: 100%;float: left;font-size:16px">
                <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>STT: </strong><span>'.$showBill['id_bill'].'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong style="text-align: right;">Tên KH Đặt tour: </strong><span>'.$name.'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>Tên tour: </strong><span>'.$showTour['name_tour'].'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>Thời gian đi: </strong><span>'.$time.'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>Ngày đi : </strong><span>'.$showTour['date_start'].'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>Ngày về: </strong><span>'.$showTour['date_end'].'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>SL:</strong> <span>'.$quantity.'</span></li>
                  <li style="padding:8px;list-style: none;width: 45%;float: left;"><strong>Giá tiền: </strong> <span>'.$showTour['price'].' VNĐ</span></li>
          </ul>
            <table style="width:100%;border-collapse:collapse; margin-bottom: 20px;">
              <thead style="color:#ffffff;background:#7376c0;text-align:left">
                <tr style="padding:8px">
                  <th style="padding:8px">STT</th>
                  <th style="padding:8px">Tên KH</th>
                  <th style="padding:8px">Địa chỉ</th>
                  <th style="padding:8px">Điện thoại</th>
                  <th style="padding:8px">Giới tính</th>
                  <th style="padding:8px">Thành phố</th>
                  <th style="padding:8px">Passport</th>
                </tr>
              </thead>
              <tbody style="text-align:left">';
            foreach ($showPass as $p) {
                if ($p['gender_passenger']==1) {
                   $gen='Nam';
                }else{
                    $gen='Nữ';
                }
               $desc .=' <tr style="background-color:#eaeaea;border-bottom:1px solid #d4d4d4">
               <td style="padding:8px;width:5%">'.$p['id_passenger '].'</td>
               <td style="padding:8px;width:15%">'.$p['name_passenger'].'</td>
               <td style="padding:8px;width:15%">'.$p['address_passenger'].'</td>
               <td style="padding:8px;width:15%">'.$p['phone_passenger'].'</td>
               <td style="padding:8px;width:10%">'.$gen.'</td>
               <td style="padding:8px;width:20%">'.$p['country_passenger'].'</td>
               <td style="padding:8px;width:20%">'.$p['passport_passenger'].'</td>
             </tr>';
            }
            $desc.='
              </tbody>
              <tfoot>

                <tr>
                  <td colspan="4"></td>
                  <td colspan="3" style="color:black;background:#cfc9c9;text-align:center; padding: 10px;">Tổng:
                    '.$total.'
                    VNĐ
                  </td>
                </tr>
              </tfoot>
            </table>
            <div style="text-align: left;">
              <p>
                -Phương thức thanh toán: Ngân Hàng VietcomeBank(chi nhánh Tân Bình) 012200456.
              </p>
              <p style="margin-bottom: 25px">
                -Thanh toán qua momo: 0904047470 (username_mã tour_ số tiền).
              </p>

            </div>

            <a href=" #"
              style="width:fit-content;margin:10px;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
              target="_blank">Quay về trang chủ</a>
          </div>
          <br>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
        <div style="padding:10px 15px">
          <h4 style="color:#000">THÔNG TIN TÀI KHOẢN </h4>
          <div style="padding:0px 30px">
            <table style="width:100%">
              <tbody>
                <tr>
                  <td>
                    <b>Tài khoản: </b>Duytrinh2508
                  </td>
                  <td>
                    <b>Email: </b>
                    <a style="color: #000; text-decoration: none;" href="#" target="_blank">Duytrinh2508@gmail.com</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Tình trạng: </b>Gia hạn.
                  </td>
                  <td>
                    <b>Số điện thoại: </b> 0904047470
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Địa chỉ : </b>
                    666 Nguyễn Văn Quá, Q12, TP Hồ Chí Minh.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
      </div>
      <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
        <div style="float:left;width:50%">
          <ul style="list-style:none;margin:0;padding:0">
            <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                href="#"><b>Goldentours/8845</b></a></li>
            <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                target="_blank"><b>Goldentours.com</b></a></li>
            <li>Số điện thoại: <b>0904047470</b></li>
          </ul>
        </div>
      </div>
    </div>
  </div>';
    if($mail->sendMail($title, $desc, $email) === 1) {
      echo json_encode(['success' => false, 'message' => 'Tài khoản của quý khách chưa được kích hoạt. Hãy kiểm tra email', 'redirect' => true, 'location' => $location ?? '/dang-nhap']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => $location ?? '/dang-nhap']);
    }
  }
  public function billDetail($id)
  {
     $showBill=bill::join('tours','bill.id_tour','=','tours.id_tour')->where('bill.id_bill','=',$id)->first();
     return $showBill;
  }
  public function passDetail($id)
  {
     $showPass=passenger::where('id_bill','=',$id)->get();
     return $showPass;
  }
  public function createPartnerDemo(Request $request)
  {
    $data = array(
        'name' =>$request->name,
        'address_doitac' => $request->diachi,
        'phone_doitac' => $request->sdt,
        'email_doitac' => $request->email,
        'slogan' => $request->slogan,
    );
    doitacTable::create($data);
    $showDoitac=doitacTable::orderby('id_doitac','desc')->first();
    $userDT=userTable::find(session('account')->id_user);
    $userDT->id_doitac=$showDoitac->id_doitac;
    $userDT->created_at=Carbon::now();
    $userDT->role=1;
    $userDT->active=1;
    $userDT->save();
    $databill = array(
        'id_doitac' =>$showDoitac->id_doitac,
        'id_user' => session('account')->id_user,
        'price_billdoitac' =>0,
        'catalog_doitac' => $request->catalog_doitac,
    );
    billdoitac::create($databill);
    $email= session('account')->email;
    $name = session('account')->name;
    $mail = new mailer;
    $title = '[GOLDEN TOURS] Đăng ký đối tác thành công';
    $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
    <div style="max-width:1000px;margin:auto;background:#ffffff">
      <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
        <div style="width:70px;margin-top:15px; margin: 0 auto;">
          <img src="../../assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
            class="CToWUd">
        </div>
      </div>
      <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
        <div style="padding:35px 15px">
          <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào quý công ty '.$request['name'].'</b></p>
          <br>
          <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý công ty đã quan tâm và trở thành đối tác của
            Golden
            Tours.
            <span style="font-weight: 500;color: #ff0000;">Bạn đã đăng ký thành công.</span>
          </p>
          <p style="margin:0;font-size:16px">Tài khoản của bạn đã được kích hoạt thành tài khoản đối tác, Bạn có 7 ngày để trở thành đối tác của Goldentours.</p>
          <div style="padding:40px;margin:auto;text-align:center">
            <a href="#"
              style="width:fit-content;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
              target="_blank">Quay lại trang chủ</a>
          </div>
          <br>
          <!-- <p style="margin:0;font-size:16px">Để xem chi tiết đơn hàng của mình tại
              <a href="pncompany.online" style="text-decoration:none" target="_blank">pncompany.online</a>, bạn có thể
              <a href="pncompany.online" style="text-decoration:none" target="_blank"><b>nhấn vào đây</b></a>
            </p> -->
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
        <div style="padding:10px 15px">
          <h4 style="color:#000">THÔNG TIN TÀI KHOẢN </h4>
          <!-- <span style="color:#989898">(Ngày đặt ....)</span> -->
          <div style="padding:0px 30px">
            <!-- <div style="width:100%">
              <b>Thông tin thanh toán</b>
            </div> -->
            <table style="width:100%">
              <tbody>
                <tr>
                  <td>
                    <b>Tài khoản: </b>Duytrinh2508
                  </td>
                  <td>
                    <b>Email: </b>
                    <a style="color: #000; text-decoration: none;" href="#" target="_blank">Duytrinh2508@gmail.com</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Tình trạng: </b>chưa kích hoạt.
                  </td>
                  <td>
                    <b>Số điện thoại: </b> 0904047470
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Địa chỉ : </b>
                    666 Nguyễn Văn Quá, Q12, TP Hồ Chí Minh.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
      </div>
      <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
        <div style="float:left;width:50%">
          <ul style="list-style:none;margin:0;padding:0">
            <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                href="#"><b>Goldentours/8845</b></a></li>
            <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                target="_blank"><b>Goldentours.com</b></a></li>
            <li>Số điện thoại: <b>0904047470</b></li>
          </ul>
        </div>
      </div>
    </div>
  </div>';
    if($mail->sendMail($title, $desc, $email) === 1) {
        return 1;
      echo json_encode(['success' => true, 'message' => 'Gửi liên hệ thành công. Chúng tôi sẽ liên lạc lại với quý khách sớm nhất. Xin cảm ơn', 'redirect'=> true, 'location' => '/']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/lien-he']);
    }
  }
  public function createPartner(Request $request)
  {
    $data = array(
        'name' =>$request->name,
        'address_doitac' => $request->diachi,
        'phone_doitac' => $request->sdt,
        'email_doitac' => $request->email,
        'slogan' => $request->slogan,
    );
    doitacTable::create($data);
    $showDoitac=doitacTable::orderby('id_doitac','desc')->first();
    $userDT=userTable::find(session('account')->id_user);
    $userDT->id_doitac=$showDoitac->id_doitac;
    $userDT->created_at=Carbon::now();
    $userDT->role=1;
    $userDT->active=2;
    $userDT->save();
    if ($request->catalog_doitac==1) {
        $price_billdoitac=500000;
    } else {
        $price_billdoitac=5500000;
    }
    $databill = array(
        'id_doitac' =>$showDoitac->id_doitac,
        'id_user' => session('account')->id_user,
        'price_billdoitac' =>$price_billdoitac,
        'catalog_doitac' => $request->catalog_doitac,
    );
    billdoitac::create($databill);
   return 1;
  }
    public function paymentPart(Request $request)
    {
       $showbill=billdoitac::orderby('id_billdoitac','desc')->first();
       $showbill->id_payment=$request->id_payment;
       $showbill->save();
       $showbillNew=billdoitac::orderby('id_billdoitac','desc')->first();
    $email= session('account')->email;
    $name = session('account')->name;
    $mail = new mailer;
    $title = '[GOLDEN TOURS] Đăng ký đối tác thành công';
    $desc = '<div style="background-color:#f8f8f8;font-family:sans-serif;padding:15px">
    <div style="max-width:1000px;margin:auto;background:#ffffff">
      <div style="background-color:#fff;padding:10px 30px;color:#fff;display:flex;border-bottom:1px solid #d4d4d4">
        <div style="width:70px;margin-top:15px; margin: 0 auto;">
          <img src="../../assets/images/defaults/logo-1.png" style="height:auto;object-fit:contain;width:150px ;"
            class="CToWUd">
        </div>
      </div>
      <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
        <div style="padding:35px 15px">
          <p style="margin:0;font-size:16px; color: #ff0000;"><b>Xin chào '.$name.'</b></p>
          <br>
          <p style="margin:0;font-size:16px; margin-bottom: 15px;"> Thanh toán thành công: Đối Tác
            <!-- <span style="font-weight: 500;color: #ff0000;">Bạn đã đăng ký thành công.</span> -->
          </p>
          <p style="margin:20px 0px;font-size:16px">- Cảm ơn quý đối tác đã tin tưởng trở thành đối tác của Golden Tours.
          </p>
          <p style="margin:20px 0px;font-size:16px">- Nhằm nâng cao tính chuyên nghiệp trong việc hỗ trợ khách hàng, chúng
            tôi
            cung cấp mỗi khách hàng đăng ký dịch vụ một "Mã Số khách Hàng" và mật khẩu truy cập để quản lý các dịch vụ mà
            quý khách đã đăng ký sử dụng tại golden Tours.</p>
          <p style="margin:20px 0px;font-size:16px">- Website https://goldentours.vn online 24/7 sẽ mang lại thuận tiện
            cho quý khách trong việc sử dụng và quản lý các dịch vụ đăng ký tại Golden Tours.</p>
          <div style="padding:40px;margin:auto;text-align:center">
            <table style="width:100%;border-collapse:collapse; margin-bottom: 20px;">
              <thead style="color:#ffffff;background:#7376c0;text-align:left">
                <tr style="padding:8px">
                  <th style="padding:8px">ID</th>
                  <th style="padding:8px">Tài khoản</th>
                  <th style="padding:8px">Email</th>
                  <th style="padding:8px">Ngày đăng ký</th>
                  <th style="padding:8px">Ngày hết hạn</th>
                  <th style="padding:8px">Tổng giá</th>

                </tr>
              </thead>
              <tbody style="text-align:left">
                <tr style="background-color:#eaeaea;border-bottom:1px solid #d4d4d4">
                  <td style="padding:8px;width:10%">1</td>
                  <td style="padding:8px;width:15%">'.$name.'</td>
                  <td style="padding:8px;width:15%">'.$email.'</td>
                  <td style="padding:8px;width:20%">'.$showbillNew['created_at'].'</td>
                  <td style="padding:8px;width:20%">20-11-2021</td>
                  <td style="padding:8px;width:20%">'.number_format($showbillNew['price_billdoitac'],0,'',',').' VNĐ</td>
                </tr>
              </tbody>

            </table>
            <a href="#"
              style="width:fit-content;background-image:linear-gradient(to right,#0ac9db,#e5d25a);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
              target="_blank">Quay về trang chủ</a>
          </div>
          <br>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
        <div style="padding:10px 15px">
          <h4 style="color:#000">THÔNG TIN TÀI KHOẢN </h4>
          <!-- <span style="color:#989898">(Ngày đặt ....)</span> -->
          <div style="padding:0px 30px">
            <!-- <div style="width:100%">
              <b>Thông tin thanh toán</b>
            </div> -->
            <table style="width:100%">
              <tbody>
                <tr>
                  <td>
                    <b>Tài khoản: </b>Duytrinh2508
                  </td>
                  <td>
                    <b>Email: </b>
                    <a style="color: #000; text-decoration: none;" href="#" target="_blank">Duytrinh2508@gmail.com</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Tình trạng: </b>Đã thanh toán.
                  </td>
                  <td>
                    <b>Số điện thoại: </b> 0904047470
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Địa chỉ : </b>
                    666 Nguyễn Văn Quá, Q12, TP Hồ Chí Minh.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
        <!-- <div style="padding:10px 15px">
          <h4 style="color:#8083c5">CHI TIẾT ĐƠN HÀNG</h4>
          <table style="width:100%;border-collapse:collapse">
            <thead style="color:#ffffff;background:#7376c0;text-align:left">
              <tr style="padding:8px">
                <th style="padding:8px">ID</th>
                <th style="padding:8px">Sản phẩm</th>
                <th style="padding:8px">Hình</th>
                <th style="padding:8px;text-align:left">SL</th>
                <th style="padding:8px;text-align:right">Giá</th>
                <th style="padding:8px;text-align:right">Tổng</th>
              </tr>
            </thead>
            <tbody style="text-align:left">
              <tr style="background-color:#eaeaea;border-bottom:1px solid #d4d4d4">
                <td style="padding:8px;width:10%">1</td>
                <td style="padding:8px;width:30%">Rust</td>
                <td style="padding:8px;width:15%">img</td>
                <td style="padding:8px;text-align:left;width:5%"><b>1</b></td>
                <td style="padding:8px;text-align:right;width:20%;white-space:nowrap">279.000 đ</td>
                <td style="padding:8px;text-align:right;width:20%;white-space:nowrap">279.000 đ</td>
              </tr>
            </tbody>
            <tfoot style="text-align:right">
              <tr style="background-color:#eaeaea">
                <td style="padding:8px;text-align:right" colspan="5"><b>Thành tiền</b></td>
                <td style="padding:8px;text-align:right">279.000 đ</td>
              </tr>
              <tr style="background-color:#eaeaea">
                <td style="padding:8px;text-align:right" colspan="5"><b>Tổng đơn hàng </b></td>
                <td style="padding:8px;text-align:right">279.000 đ</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div style="padding:40px;margin:auto;text-align:center">
          <a href="#"
            style="width:fit-content;background-image:linear-gradient(to right,#9a9ccf,#6e71b6);color:#fff;font-weight:bold;text-align:center;padding:10px 12px;border-radius:2px;margin:auto;font-size:large;text-decoration:none"
            target="_blank">Tiếp tục mua sắm</a>
        </div>
        <div style="border-top:1.5px solid #f1f1f1"></div>
        <div style="background-color:#fff;padding:5px 20px;color:#000;border-radius:0px 0px 2px 2px">
          <div style="padding:35px 15px">
            <p style="margin:0;font-size:16px">Nếu gặp bất cứ vấn đề gì xin hãy phản hồi lại thư này cho chúng tôi biết.
            </p>
            <br>
            <p style="margin:0;font-size:16px">Trân trọng,</p>
            <p style="margin:0;font-size:16px">Golden Tours</p>
          </div>
        </div> -->
      </div>
      <div style="clear:both;overflow:hidden;margin-top:15px;padding:40px 30px;background-color:#eee;border-radius:2px">
        <div style="float:left;width:50%">
          <ul style="list-style:none;margin:0;padding:0">
            <li style="margin-bottom:8px;font-size:15px">Fanpage <a style="text-decoration:none; color: #000;"
                href="#"><b>Goldentours/8845</b></a></li>
            <li style="margin-bottom:8px;font-size:15px">Website: <a style="text-decoration:none; color: #000;" href="#"
                target="_blank"><b>Goldentours.com</b></a></li>
            <li>Số điện thoại: <b>0904047470</b></li>
          </ul>
        </div>
      </div>
    </div>
  </div>';
    if($mail->sendMail($title, $desc, $email) === 1) {
        return 1;
      echo json_encode(['success' => true, 'message' => 'Gửi liên hệ thành công. Chúng tôi sẽ liên lạc lại với quý khách sớm nhất. Xin cảm ơn', 'redirect'=> true, 'location' => '/']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/lien-he']);
    }
    }
    //SEARCH TOUR
    // public function searchTour(Request $request)
    // {
    //     if ($request->id_search==1) {
    //         $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
    //         ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('price','asc')->get();
    //         return $showTour;
    //     }
    //     if ($request->id_search==2) {
    //         $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
    //         ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('price','desc')->get();
    //         return $showTour;
    //     }
    //     if ($request->id_search==3) {
    //         $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
    //         ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('id_tour','desc')->get();
    //         return $showTour;
    //     }

    // }
}
