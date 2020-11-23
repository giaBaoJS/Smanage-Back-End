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
      if($mail->sendMail($title, 'http://127.0.0.1:8000/dang-nhap?email='.$request->email, $request->email) === 1) {
        echo json_encode(['success' => false, 'message' => 'Tài khoản của bạn chưa được kích hoạt. Hãy kiểm tra email', 'redirect' => true, 'location' => '/dang-nhap']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/dang-nhap']);
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
    $email = $request->email;
    $mail = new mailer;
    $title = 'Kích hoạt tài khoản';
    $desc = '<!DOCTYPE html>
              <html lang="en">
                <head>
                  <meta charset="UTF-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <title>Đăng ký</title>
                  <link
                    rel="icon"
                    type="image/png"
                    href="http://127.0.0.1:8000/favicon.ico"
                  />
                  <link
                    rel="stylesheet"
                    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                  />
                  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                  <style>
                    * {
                      margin:0;
                      padding:0;
                      box-sizing:border-box;
                    }
                    .wapper-mail .title-1 {
                      text-align: center;
                    }
                    .wapper-mail .section-1 {
                      height: 40px;
                      background: #0cc9da;
                      color: #fff;
                      padding-top: 0.2rem;
                      padding-left: 1rem;
                      font-size: 1.6rem;
                    }
                    .wapper-mail .section-2 {
                      padding-left: 2rem;
                      padding-right: 4rem;
                    }
                    .wapper-mail .section-2 p span {
                      font-weight: 600;
                    }
                    .wapper-mail .section-2 .text-1 {
                      line-height: 30px;
                    }
                    .wapper-mail .boder {
                      border: 1px solid #8f8e8e;
                    }
                    .wapper-mail .boder .header-mail {
                      padding-top: 1rem;
                      border-bottom: 1px solid #8f8e8e;
                      margin-bottom: 1rem;
                    }
                    .wapper-mail .boder .header-mail ul li span {
                      color: #747474;
                      font-weight: 300;
                    }
                    .wapper-mail .footer-main {
                      padding: 20px 0px !important;
                    }
                    .wapper-mail .footer-main h3 {
                      margin-bottom: 5px;
                    }
                    .wapper-mail .footer-main img {
                      margin-bottom: 2px;
                    }
              
                    .title-mail h4 {
                      font-weight: 500;
                      font-size: 20px;
                      color: #58595b;
                    }
              
                    table {
                      border: 1px solid #58595b;
                      text-align: center;
                      width:100%;
                    }
                    table th {
                      border-right: 1px solid #58595b;
                    }
                    table td {
                      border-right: 1px solid #58595b;
                    }
              
                    button {
                      width: 200px;
                      background: #0cc9da;
                      color: #fff;
                      height: 40px;
                      border-radius: 20px;
                      border: none;
                      margin-bottom: 2rem;
                      margin-left: 26rem;
                      text-align: center;
                      font-size: 1.2rem;
                      cursor: pointer;
                      font-weight: 600;
                    }
                    button:hover {
                      background: #0cacbb;
                    }
              
                    .thanh-toan p span {
                      font-weight: 600;
                    }
              
                    .wraper-mail-checkout .section-1 {
                      height: 40px;
                      background: #0cc9da;
                      color: #fff;
                      padding-top: 0.2rem;
                      padding-left: 1rem;
                      font-size: 1.6rem;
                    }
                    .wraper-mail-checkout button {
                      width: 200px;
                      background: #0cc9da;
                      color: #fff;
                      height: 40px;
                      border-radius: 20px;
                      border: none;
                      margin-bottom: 2rem;
                      margin-left: 26rem;
                      text-align: center;
                      font-size: 1.2rem;
                      cursor: pointer;
                      font-weight: 600;
                    }
                    .wraper-mail-checkout button:hover {
                      background: #0cacbb;
                    }
              
                    footer .footer-main {
                      padding: 100px 0;
                      font-size: 12px;
                      color: #8e8e8e;
                      background-color: #121212;
                      background-image: url("http://127.0.0.1:8000/FrontEnd/assets/images/defaults/background/bg-footer.jpg");
                      background-repeat: repeat;
                      background-attachment: fixed;
                      background-position: center;
                      background-size: cover;
                    }
                    footer .footer-main img {
                      max-width: 150px;
                      max-height: 65px;
                      margin: 0 auto;
                      display: block;
                      margin-bottom: 90px;
                    }
                    footer .footer-main ul li {
                      padding: 0 0 25px;
                      line-height: 24px;
                    }
                    footer .footer-main h3 {
                      font-size: 17px;
                      margin-bottom: 30px;
                      text-transform: capitalize;
                      color: #fff;
                    }
                    footer .footer-main p {
                      line-height: 24px;
                    }
                    footer .footer-main .list-mien li a {
                      text-decoration: none;
                      position: relative;
                      display: block;
                      padding: 0 0 0px 20px;
                      -webkit-transition: all 0.6s ease;
                      -o-transition: all 0.6s ease;
                      transition: all 0.6s ease;
                      color: #8e8e8e;
                    }
                    footer .footer-main .list-mien li a:hover {
                      color: #ffdd00;
                    }
                    footer .footer-main .list-mien li a:before {
                      width: 5px;
                      height: 5px;
                      border-radius: 100%;
                      font-size: 7px;
                      position: absolute;
                      left: 0;
                      content: "";
                      background: #f1d354;
                      top: 50%;
                      -webkit-transform: translateY(-50%);
                      -ms-transform: translateY(-50%);
                      transform: translateY(-50%);
                    }
                    footer .footer-main .list-icon-social {
                      margin-left: -30px;
                    }
                    footer .footer-main .list-icon-social li {
                      display: inline-block;
                      padding-right: 5px;
                      padding-left: 5px;
                    }
                    footer .footer-main .list-icon-social li a {
                      font-size: 18px;
                      padding: 0 8px;
                      color: #ffdd00;
                    }
                    footer .footer-main .list-icon-social li a:hover {
                      color: #ffffff;
                    }
                    footer .copyright {
                      background-color: #121212;
                      padding: 25px 0;
                      text-align: center;
                    }
                    footer .copyright p {
                      color: #ffdd00;
                    }
              
                    @media screen and (max-width: 480px) {
                      footer .footer-main {
                        text-align: center;
                      }
                      footer .footer-main .list-mien li a {
                        padding-left: 0;
                      }
                      footer .footer-main .list-mien li a:before {
                        content: unset;
                      }
                      footer .footer-main .list-mien li:hover a::before {
                        content: unset;
                      }
                      footer .footer-main .list-icon-social {
                        margin-left: 0;
                      }
                    }
                  </style>
                </head>
              
                <body>
                  <div class="wapper-mail">
                    <div class="container">
                      <div class="boder">
                        <div class="header-mail">
                          <div class="row">
                            <div class="col-6">
                              <div class="main-logo text-center">
                                <a href="#"
                                  ><img
                                    class="img-fluid"
                                    src="http://127.0.0.1:8000/FrontEnd/assets/images/defaults/logo-1.png"
                                    width="150px"
                                    alt="logo"
                                /></a>
                              </div>
                            </div>
                            <div class="col-6">
                              <ul class="pt-2">
                                <li>
                                  <i class="fas fa-phone-volume mr-1"></i>Số điện thoại:<span>
                                    0904047470</span
                                  >
                                </li>
                                <li>
                                  <i class="fas fa-envelope mr-1"></i>Email:
                                  <span>goldentours@gmail.com</span>
                                </li>
                                <li>
                                  <i class="fab fa-chrome mr-1"></i>Website:<span>
                                    <a href="http://127.0.0.1:8000/">goldentours.com</a></span
                                  >
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="wraper-mail">
                          <section class="section-1 mb-3">
                            <div class="container">
                              <div class="row">
                                <div class="title-1">
                                  <h3>Đăng ký thành công: DuyTrinh</h3>
                                </div>
                              </div>
                            </div>
                          </section>
                          <section class="section-2 mb-3">
                            <div class="container">
                              <div class="row">
                                <div class="title-mail">
                                  <h4>Kính chào quý khách!</h4>
                                </div>
                                <p class="text-1 mr-1">
                                  - Nhằm nâng cao tính chuyên nghiệp trong việc hỗ trợ khách
                                  hàng, chúng tôi cung cấp mỗi khách hàng đăng ký dịch vụ một
                                  "Mã Số khách Hàng" và mật khẩu truy cập để quản lý các dịch
                                  vụ mà quý khách đã đăng ký sử dụng tại Golden Tours. Website
                                  <a href="http://127.0.0.1:8000/">https://goldentours.vn</a> online 24/7 sẽ mang lại thuận tiện
                                  cho quý khách trong việc sử dụng và quản lý các dịch vụ đăng
                                  ký tại Golden Tours.
                                </p>
                              </div>
                            </div>
                          </section>
                          <section class="section-3 mb-3 px-3">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">STT</th>
                                  <th scope="col">Tài Khoản</th>
                                  <th scope="col">Mật Khẩu</th>
                                  <th scope="col">Email</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>duytrinh2508</td>
                                  <td>123456789</td>
                                  <td>duytrinh2508@gmail.com</td>
                                </tr>
                              </tbody>
                            </table>
                          </section>
                          <a  class="text-center" href="http://127.0.0.1:8000/dang-nhap?email=' . $email . '">
                            <button>kích hoạt tài khoản</button>
                          </a>
                        </div>
                        <footer>
                          <div class="footer-main">
                            <div class="container">
                              <a href="#"
                                ><img
                                  class="img-fluid"
                                  src="../assets/images/defaults/logofooter.png"
                                  alt=""
                              /></a>
                              <div class="row">
                                <div class="col-md-6 text-center">
                                  <h3>Trụ sở chính:</h3>
                                  <p>635 Nguyễn Văn Quá, Quận 12, Tp Hồ Chí Minh</p>
                                </div>
                                <div class="col-md-6 text-center">
                                  <h3>Mạng xã hội</h3>
                                  <ul class="list-icon-social">
                                    <li>
                                      <a href="#" class="link facebook">
                                        <i class="fab fa-facebook"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#" class="link twitter">
                                        <i class="fab fa-twitter"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#" class="link pinterest">
                                        <i class="fab fa-pinterest-p"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#" class="link google">
                                        <i class="fab fa-google"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="copyright">
                            <p>@ Copyright Golden Tours</p>
                          </div>
                        </footer>
                      </div>
                    </div>
                  </div>
                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                </body>
              </html>';
    if($mail->sendMail($title, $desc, $email) === 1) {
      UserTable::create($data);
      echo json_encode(['success' => true, 'message' => 'Đăng ký thành công. Hãy kiểm tra email để kích hoạt tài khoản của bạn', 'redirect'=> true, 'location' => '/dang-nhap']);
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

      $mail = new mailer;
      $title = 'Tìm lại mật khẩu';
      $desc = '<a href="http://127.0.0.1:8000/doi-quen-mat-khau?email=' . $email . '&token=' . $token . '">Quên mật khẩu</a>';
      echo $desc;
      // if($mail->sendMail($title, $desc, $email) === 1) {
      //   echo json_encode(['success' => true, 'message' => 'Tìm mật khẩu thành công. Hãy kiểm tra email để kích hoạt tài khoản của bạn', 'redirect'=> true, 'location' => '/dang-nhap']);
      // } else {
      //   echo json_encode(['success' => false, 'message' => 'Đã có lỗi trong khi gửi mail', 'redirect'=> true, 'location' => '/doi-mat-khau']);
      // }
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
        echo json_encode(['success' => false, 'message' => 'Bạn không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
        return;
      }
      Session::forget('account');
      $hashedNewPass = bcrypt($newPsw); //băm mật khẩu mới
      userTable::where('email','=', $email)->update(['password'=>$hashedNewPass,'token'=>'','expired'=>'']);
      echo json_encode(['success' => true, 'message' => 'Bạn đã đổi mật khẩu thành công', 'redirect' => true, 'location' => '/dang-nhap']);
    }else{
      echo json_encode(['success' => false, 'message' => 'Bạn không đủ điều kiện thực hiện hành động này', 'redirect' => true, 'location' => '/']);
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
