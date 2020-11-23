<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../public/FrontEnd/PHPMailer/src/Exception.php';
require '../public/FrontEnd/PHPMailer/src/PHPMailer.php';
require '../public/FrontEnd/PHPMailer/src/SMTP.php';

class mailer {
    function sendMail($title, $desc, $userEmail) {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'baolkps08687@fpt.edu.vn';                     // SMTP username
        $mail->Password = '123zxz123A';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setLanguage('vi', '../public/FrontEnd/PHPMailer/language/phpmailer.lang-vi.php');
//Recipients
        $mail->CharSet = "utf-8";
        $mail->setFrom('no-reply@gmail.com', 'Form Golden Tours');
        $mail->addAddress($userEmail);               // Name is optional
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "$title";
//    $mail->Body = '<p>Bạn đã kích hoạt chức năng quên mật khẩu! Hãy click vào liên kết phía dưới để tiến hành đặt lại mật khẩu</p><a href = "http://localhost/php2/asm?act=change-pass-forgot&email=' . $userEmail . '&token=' . $token . '" > Đổi mật khẩu</a>';
        $mail->Body = "$desc";
        //send the message, check for errors
        if (!$mail->send()) {
            return 0;
        } else {
            return 1;
        }
    }

    function htmlRegister($email) {
        return `<!DOCTYPE html>
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
                background-image: url('http://127.0.0.1:8000/FrontEnd/assets/images/defaults/background/bg-footer.jpg');
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
                content: '';
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
                            'Mã Số khách Hàng' và mật khẩu truy cập để quản lý các dịch
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
                    <a href="/dang-nhap?email=emailuser@gmail.com" class="text-center">
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
        </html>
        `;
    }

    function htmlResetPass($email, $token) {
        return '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Reset Form</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .container {
                        width: 60%;
                        margin: 10px auto;
                        padding: 20px;
                        border: 1px solid #000;
                    }

                    header,
                    .btn {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    header {
                        display: flex;
                        justify-content: space-between;
                    }

                    ul {
                        list-style-type: none;
                    }

                    button {
                        padding: 10px;
                        background-color: #3598dc;
                        outline: none;
                        border: none;
                        border-radius: 8px;
                    }

                    @media only screen and (max-width: 768px) {
                        button {
                            width: 100%;
                        }
                        header {
                            display: block;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <headerstyle="justify-content: space-between;">
                        <a href="https://trinhduy.com">
                            <img src="https://trinhduy.com/view/images/logo.png" alt="Logo Sweet House">
                        </a>
                        <ul>
                            <li>
                                    <h3>Ftyler Group</h3>
                            </li>
                            <li>Công viên Phần Mềm Quang Trung</li>
                            <li>Tô Ký, Quận 12</li>
                        </ul>
                    </header>
                    <main class="content">
                        <h1 style="text-align: center; margin-bottom: 20px;">Đặt lại mật khẩu</h1>
                        <p style="margin-bottom: 20px;">Có vẻ như bạn đã kích hoạt chức năng quên mật khẩu tại Ftyler. Hãy nhấn vào nút bên dưới để tiến hành đặt
                            lại mật khẩu.</p>
                        <div class="btn">
                            <button>
                                <a style="text-decoration: none; color: #fff; font-size: 18px;" href = "https://trinhduy.com?act=change-pass-forgot&email=' . $email . '&token=' . $token . '" >Đặt lại mật khẩu</a>
                            </button>
                        </div>
                        <p>Nếu bạn không thực hiện hành động này có thể bỏ qua email này. Mật khẩu của bạn sẽ không bị thay đổi</p>
                    </main>
                </div>
            </body>
            </html>';
    }

    function htmlContact() {
        return '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Reset Form</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .container {
                        width: 60%;
                        margin: 10px auto;
                        padding: 20px;
                        border: 1px solid #000;
                    }

                    header,
                    .btn {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    header {
                        display: flex;
                        justify-content: space-between;
                    }

                    ul {
                        list-style-type: none;
                    }

                    button {
                        padding: 10px;
                        background-color: #3598dc;
                        outline: none;
                        border: none;
                        border-radius: 8px;
                    }

                    @media only screen and (max-width: 768px) {
                        button {
                            width: 100%;
                        }
                        header {
                            display: block;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <header style="justify-content: space-between;">
                        <a href="https://trinhduy.com">
                            <img src="https://trinhduy.com/view/images/logo.png" alt="Logo Sweet House">
                        </a>
                        <ul>
                            <li>
                                    <h3>Ftyler Group</h3>
                            </li>
                            <li>Công viên Phần Mềm Quang Trung</li>
                            <li>Tô Ký, Quận 12</li>
                        </ul>
                    </header>
                    <main class="content">
                        <h1 style="text-align: center; margin-bottom: 20px;">Thư hồi đáp</h1>
                        <p style="margin-bottom: 20px;">Cám ơn những đóng góp quý giá của bạn. Chúng tôi sẽ xem xét và trả lời bạn trong thời gian sớm nhất.</p>
                        <p style="margin-bottom: 20px;">Trong khi chờ đợi bạn có thể tham khảo những sản phẩm mới nhất của chúng tôi tại.</p>
                        <div class="btn" style="text-align: center;">
                            <button>
                                <a style="text-decoration: none; color: #fff; font-size: 18px;" href = "https://trinhduy.com/" >Trang chủ</a>
                            </button>
                        </div>
                    </main>
                </div>
            </body>
            </html>';
    }

}
?>