<?php

namespace Ahut;

use database\DataBases;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Ahut
{

  protected function ridarect($url)
  {

    header('Location: ' . trim(CURRENT_DUMAIN, '/ ') . '/' . trim($url, '/ '));
    exit;

  }

  protected function ridarectBace()
  {

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

  }


  private function hash($password)
  {

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashPassword;
  }

  private function random()
  {
    return bin2hex(openssl_random_pseudo_bytes(32));
  }

  private function activationMessage($usernam, $verifyToken)
  {

    $message = '
    <h1>فعال سازی حساب کار بری</h1>
    <p>عریز برای فعال سازی حساب کار بری خود رویه لینک زیر کلیک کنید  ' . $usernam . '</p>
    <di><a href="' . url("activation/" . $verifyToken) . '">فعال سازی حساب کاربری</a></di>
    ';
    return $message;
  }

  private function forgotMessage($usernam, $forgotToken)
  {

    $message = '
    <h1>فراموشی رمز عبور</h1>
    <p> عزیز برای تغییر رمز عبور خود رویه لینک زیر کلیک کنید  ' . $usernam . '</p>
    <di><a href="' . url("reset-password-form/" . $forgotToken) . '">باز یابی رمز عبور</a></di>
    ';
    return $message;

  }
  private function sendMail($emailAddress, $subject, $body)
  {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
      $mail->CharSet = "UTF-8"; //Enable verbose debug output
      $mail->isSMTP(); //Send using SMTP
      $mail->Host = MAIL_HOST; //Set the SMTP server to send through
      $mail->SMTPAuth = SMTP_AUTH; //Enable SMTP authentication
      $mail->Username = MAIL_USERNAME; //SMTP username
      $mail->Password = MAIL_PASSWORD; //SMTP password
      $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
      $mail->Port = MAIL_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom(SENDER_MAIL, SENDER_NAME);
      $mail->addAddress($emailAddress);


      //Content
      $mail->isHTML(true); //Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body = $body;

      $result = $mail->send();
      echo 'Message has been sent';
      return $result;
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }

  }

  public function register()
  {
    require_once (BASE_PATH . '/template/ahut/register.php');
  }

  public function registerStore($reques)
  {

    if (empty($reques['username']) || empty($reques['email']) || empty($reques['password'])) {
      flash('register_error', 'همه فیلد ها اجباری هستن');
      $this->ridarectBace();
    } else if (strlen($reques['password']) < 8) {
      flash('register_error', 'رمز عبور باید بیشتر از 8 کارکتر باشد');
      $this->ridarectBace();
    } else if (!filter_var($reques['email'], FILTER_VALIDATE_EMAIL)) {
      flash('register_error', 'ایمیل شما درست وارد نشده است');
      $this->ridarectBace();
    } else {
      $db = new DataBases();
      $user = $db->select('SELECT * FROM users WHERE email = ?', [$reques['email']])->fetch();

      if ($user != null) {
        flash('register_error', 'این حساب قبلا ثبت نام کرده');
        $this->ridarectBace();
      } else {
        $randomToken = $this->random();
        $activationMessage = $this->activationMessage($reques['username'], $randomToken);
        $result = $this->sendMail($reques['email'], 'فعال سازی حساب کاربری', $activationMessage);
        if ($result) {
          $reques['verify_token'] = $randomToken;
          $reques['password'] = $this->hash($reques['password']);
          $db->insert('users', array_keys($reques), $reques);
          $this->ridarect('login');
        } else {
          flash('register_error', 'ارسال ایمیل با مشکل مواجه شده است دوباره تلاش کنید');
          $this->ridarectBace();
        }
      }
    }

  }
  public function activation($verifyToken)
  {

    $db = new DataBases();
    $user = $db->select('SELECT * FROM users WHERE verify_token = ? AND is_active = 0;', [$verifyToken])->fetch();
    if ($user == null) {
      $this->ridarectBace();
    } else {
      $result = $db->update('users', $user['id'], ['is_active'], [1]);
      $this->ridarect('login');
    }

  }

  public function login()
  {
    require_once (BASE_PATH . '/template/ahut/login.php');
  }

  public function checkLogin($reques)
  {

    if (empty($reques['email']) || empty($reques['password'])) {

      flash('login_error', 'همه فیلد ها باید پر شود');
      $this->ridarectBace();

    } else {
      $db = new DataBases();
      $user = $db->select('SELECT * FROM users WHERE email = ?', [$reques['email']])->fetch();

      if ($user != null) {

        if (password_verify($reques['password'], $user['password']) && $user['is_active'] == 1) {

          $_SESSION['user'] = $user['id'];
          $this->ridarect('admin');

        } else {
          flash('login_error', 'ورود انجام نشد دوباره تلاش کنید');
          $this->ridarectBace();
        }

      } else {
        flash('login_error', 'این حساب کار بری وجود ندارد');
        $this->ridarectBace();
      }
    }
  }
  public function checkAdmin()
  {
    if (isset($_SESSION['user'])) {

      $db = new DataBases();
      $user = $db->select('SELECT * FROM users WHERE id = ?', [$_SESSION['user']])->fetch();
      if ($user != null) {

        if ($user['permission'] != 'admin') {

          $this->ridarect('home');

        }

      } else {

        $this->ridarect('home');

      }

    } else {

      $this->ridarect('home');

    }
  }

  public function logout()
  {

    if (isset($_SESSION['user'])) {

      unset($_SESSION['user']);
      session_destroy();
    }

    $this->ridarect('home');

  }


  public function forgot()
  {
    require_once (BASE_PATH . '/template/ahut/forgot.php');
  }

  public function forgotRequest($reques)
  {

    if (empty($reques['email'])) {
      flash('forgot_error', 'ایمیل الزامی میباشید');
      $this->ridarectBace();
    } else if (!filter_var($reques['email'], FILTER_VALIDATE_EMAIL)) {
      flash('forgot_error', 'ایمیل معتبری وارد نشده است');
      $this->ridarectBace();
    } else {
      $db = new DataBases();
      $user = $db->select('SELECT * FROM users WHERE email = ?', [$reques['email']])->fetch();

      if ($user == null) {
        flash('forgot_error', 'حساب کار بری وجود ندارد');
        $this->ridarectBace();
      } else {

        $randomToken = $this->random();
        $forgotMessage = $this->forgotMessage($user['username'], $randomToken);
        $result = $this->sendMail($reques['email'], 'باز یاببی رمز عبور', $forgotMessage);

        if ($result) {

          date_default_timezone_set('Asia/Tehran');
          $db->update('users', $user['id'], ['forgor_token', 'forgor_token_expire'], [$randomToken, date('Y-m-d H:i:s', strtotime('+15  minutes'))]);
          $this->ridarect('login');
        } else {
          flash('forgot_error', 'ایمیل ارسال نشد');
          $this->ridarectBace();
        }
      }
    }
  }

  public function resetPasswordView($forgotToken)
  {

    require_once (BASE_PATH . '/template/ahut/resetPassword.php');

  }

  public function resetPassword($reques, $forgotToken)
  {

    if (!isset($reques['password']) || strlen($reques['password'] < 8)){

      flash('reset_error', 'رمز عبور باید بیشتر از 8 کارکتر باشد');
      $this->ridarectBace();
    } else {
      $db = new DataBases();
      $user = $db->select('SELECT * FROM users WHERE forgor_token = ?', [$forgotToken])->fetch();
      if ($user == null) {
        flash('reset_error', 'کاربر یافت نشد');
        $this->ridarectBace();
      } else {

        date_default_timezone_set('Asia/Tehran');
        if($user['forgor_token_expire'] < date('Y-m-d H:i:s')){

          flash('reset_error', 'زمان شما به اتمام رسیده دوباره تلاش کنید');
          $this->ridarectBace();

        }
        if($user){

          $db->update('users' , $user['id'] , ['password'] , [$this->hash($reques['password'])]);
          $this->ridarect('login'); 

        }else{
          flash('reset_error', 'کاربر یافت نشد');
          $this->ridarectBace();
        }

      }
    }

  }
}
