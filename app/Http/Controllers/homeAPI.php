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
    $request->validate(
      [
        'name' => 'required',
        'phone' => ['required','regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/','unique:user,phone,' . $account->id_user .',id_user'],
        'gender' => 'nullable',
        'address' => 'required'
      ],
      [
        'required' => ':attribute không được để trống',
        'phone.regex' => ':attribute không hợp lệ',
        'unique' => ":attribute đã được sử dụng"
      ],
      [
        'name' => 'Họ và Tên',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ'
      ]
    );
    $newPhone = $request->phone;
    $newGender = $request->gender;
    $newAddress = $request->address;
    $newName = $request->name;
    $email = $request->email;
    $user = userTable::where('email','=',  $email)->first();
    if($user) {
      userTable::where('email','=',  $email)->update(['name'=>$newName,'phone'=>$newPhone,'gender'=>$newGender,'address'=>$newAddress]);
      echo json_encode(['success' => true, 'message' => 'Quý khách đã cập nhật thành công', 'redirect' => true, 'location' => '/cap-nhat-tai-khoan']);
    } else {
      echo json_encode(['success' => false, 'message' => 'quý khách không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
    }
  }
  // LIÊN HỆ
  public function contactPost(Request $request) {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'content' => 'required'
      ],
      [
        'required' => ':attribute không được để trống',
      ],
      [
        'name' => 'Họ và Tên',
        'email' => 'Email',
        'content' => 'Lời nhắn'
      ]
    );
    $data = [
      'name' => $request->name,
      'email' => $request->email,
      'content' => $request->content,
    ];
    $email= $request->email;
    $name = $request->name;
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
                      <p style="margin:0;font-size:16px; margin-bottom: 15px;">Cảm ơn quý khách đã quan tâm đến dịch vụ của Golden Tours.</p>
                      <p style="margin:0;font-size:16px;">Quý khách đã gửi mail liên hệ với chúng tôi. Chúng tôi sẽ trả lời lại trong thời gian sớm nhất.</p>
                      <p style="margin:0;font-size:16px;">Nếu có bất kì thắc mắc nào xin vui lòng liên hệ tại <a href="#">đây</a> hoặc số điện thoại 0909123123</p>
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
        'created_at' =>  date("Y:m:d H:i:s")
      );
      comment::create($data);
      $showComment = comment::join('user','comment.id_user','=','user.id_user')
            ->select('user.url_avatar','user.name','comment.created_at','comment.content')
            ->where('comment.id_news','=',$request->id)
            ->orderby('id_comment','desc')
            ->get();
      return $showComment;
    } else if($request->type == 'tour') {
      $data = array(
        'id_user' => $request->id_user,
        'id_tour' => $request->id,
        'content' => $request->comment,
        'created_at' =>  date("Y:m:d H:i:s")
      );
      comment_tour::create($data);
      $showComment = comment_tour::join('user','user.id_user','=','comment_tour.id_user')
          ->select('user.url_avatar','user.name','comment_tour.created_at','comment_tour.content')
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
    return $showNewsLimit;
  }

  //COUPON
  public function checkCoupon(Request $request)
  {
      $showCouponOne=couponTable::where('code_coupon','=',$request->name_code)->first();
     if ($showCouponOne) {
        $date_start = explode("-", $showCouponOne->date_start);
        $dayEnd = strtotime(date('m/d/Y',strtotime(Carbon::now())));
        $dayStart =strtotime(date('d/m/Y',strtotime($date_start[1])));
          if ($dayEnd>$dayStart && $showCouponOne->quantity!=0) {
              return 1;
          } else {
              return $showCouponOne;
          }
     }else{
        return 0;
     }

  }
  //Passenger
  public function addPassenger(Request $request)
  {
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
      }
      return 1;
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
          <ul style="text-align: left;width: 100%;float: left;font-size:18px">
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
}
