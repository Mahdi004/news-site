<?php 

use Ahut\Ahut;

// session start

session_start();

// config
define("BASE_PATH", __DIR__);

define ("CURRENT_DUMAIN", currentDumain() . "/khabari");

define ("DISPLY_ERROR" ,  true);

define ("DB_HOST" , "localhost");

define ("DB_NAME" , "project");

define ("DB_USERNAME" , "root");

define ("DB_PASSWORD" , "");


// mail
define('MAIL_HOST','smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME','critohonest09@gmail.com');
define('MAIL_PASSWORD','aixz swcl arvc zlsd ');
define('MAIL_PORT', 587);
define('SENDER_MAIL','critohonest09@gmail.com');
define('SENDER_NAME', 'دوره آنلاین php جامع');

require_once 'database/DataBases.php';
require_once 'activities/Admin/Admin.php';  
require_once 'activities/Admin/Category.php';
require_once 'activities/Admin/Post.php';
require_once 'activities/Admin/Baners.php';
require_once 'activities/Admin/Comments.php';
require_once 'activities/Admin/Users.php';
require_once 'activities/Admin/Menu.php';
require_once 'activities/Admin/Websetting.php';

// $db = new database\DataBases;

// Ahut
require_once 'activities/Ahut/Ahut.php';

// helpers


spl_autoload_register(function($className){

  $pat = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
  include $pat . $className . '.php';

});

function jalaliData($data){

  return Parsidev\Jalali\jdate::forge($data)->format('datetime');

}

// echo jalaliData('today');


function uri($reservation , $class , $method , $requestmethod = "GET"){

  // Reservation uri array
  
  $currentUrl = explode('?' , currenturl())[0];
  $currentUrl = str_replace(CURRENT_DUMAIN , '' , $currentUrl);
  $currentUrl = trim($currentUrl,'/');

  $currentUrlArray = explode('/' , $currentUrl);
  $currentUrlArray = array_filter($currentUrlArray);
  
  $reservation = trim($reservation ,'/');
  $reservationArray = explode('/' , $reservation);
  $reservationArray = array_filter($reservationArray);
  
  if(sizeof($currentUrlArray) != sizeof($reservationArray) || methodField() != $requestmethod){
    return false;
  }

  $paramters = [];

  for($key = 0 ; $key < sizeof($currentUrlArray) ; $key++){

    if($reservationArray[$key][0] == '{' && $reservationArray[$key][strlen($reservationArray[$key]) -1] == "}" ){

      array_push($paramters , $currentUrlArray[$key]);

    }elseif($currentUrlArray[$key] !== $reservationArray[$key] ){

      return false;

    }

  }

  if(methodField() == 'POST'){

    $reques = isset($_FILES) ? array_merge($_POST , $_FILES ) : $_POST;
    $paramters = array_merge([$reques] , $paramters);
    
  }

  $object = new $class;

  call_user_func_array(array($object, $method), $paramters);
  exit();
  
}

// uri("/admin/catgury/" , 'catgury' , 'index');

function protocol(){

  return stripos($_SERVER['SERVER_PROTOCOL'] , 'https') == true ? 'https://':'http://';

}


function currentDumain(){
  
  return protocol() . $_SERVER['HTTP_HOST'];

} 

function asset($src){

  $domni = trim(CURRENT_DUMAIN , "/ ");

  $src = $domni ."/" . trim($src , "/");

  return $src;

}
function url($url){

  $domni = trim(CURRENT_DUMAIN , "/ ");

  $url = $domni ."/" . trim($url , "/ ");

  return $url;

}

function currenturl(){

  return currentDumain() . $_SERVER['REQUEST_URI'];


}

function methodField(){

  return $_SERVER['REQUEST_METHOD'];

}

function displyError($displyError){

  if($displyError){
    ini_set('disply_error' , 1);
    ini_set('disply_satrup_error' , 1);
    error_reporting(E_ALL);
  }else{
    
    ini_set('disply_error' , 0);
    ini_set('disply_satrup_error' , 0);
    error_reporting(0);

  }

}

displyError(DISPLY_ERROR);


global $flashMassege ; 

if(isset($_SESSION['flash_massege'])){

  $flashMassege = $_SESSION['flash_massege'];
  
  unset($_SESSION['flash_massege']);
  
}


function flash($name , $vlaue = null){

  if($vlaue === null){

    global $flashMassege;

    $massege = isset($flashMassege[$name]) ? $flashMassege[$name] : '' ; 

    return $massege;
  }else{

    $_SESSION['flash_massege'][$name] = $vlaue;

  }

}

// flash('login_error','رمز شما نامعتبر هستش دوباره تلاش کنید');

// echo flash('login_error');


function dd($var){
  echo '<pre>';
  var_dump($var);
  die();
}

// category
uri('admin/category' , 'Admin\Category' , 'index');
uri('admin/category/create' , 'Admin\Category' , 'create');
uri('admin/category/store' , 'Admin\Category' , 'store' , 'POST');
uri('admin/category/edit/{id}' , 'Admin\Category' , 'edit');
uri('admin/category/update/{id}' , 'Admin\Category' , 'update' , 'POST');
uri('admin/category/delete/{id}' , 'Admin\Category' , 'delete');

// posts
uri('admin/post' , 'Admin\Post' , 'index');
uri('admin/post/create' , 'Admin\Post' , 'create');
uri('admin/post/store' , 'Admin\Post' , 'store' , 'POST');
uri('admin/post/edit/{id}' , 'Admin\Post' , 'edit');
uri('admin/post/update/{id}' , 'Admin\Post' , 'update' , 'POST');
uri('admin/post/delete/{id}' , 'Admin\Post' , 'delete');
uri('admin/post/selected/{id}' , 'Admin\Post' , 'selected');
uri('admin/post/breaking-news/{id}' , 'Admin\Post' , 'breakingNews');
uri('admin/post/status/{id}' , 'Admin\Post' , 'status');

// baners
uri('admin/baners' , 'Admin\Baner' , 'index');
uri('admin/baners/create' , 'Admin\Baner' , 'create');
uri('admin/baners/store' , 'Admin\Baner' , 'store' , 'POST');
uri('admin/baners/edit/{id}' , 'Admin\Baner' , 'edit');
uri('admin/baners/update/{id}' , 'Admin\Baner' , 'update' , 'POST');
uri('admin/baners/delete/{id}' , 'Admin\Baner' , 'delete');

// comments
uri('admin/comments' , 'Admin\Comments' , 'index');
uri('admin/comments/show/{id}' , 'Admin\Comments' , 'show');
uri('admin/comments/status/{id}' , 'Admin\Comments' , 'status');


// users
uri('admin/user' , 'Admin\Users' , 'index');
uri('admin/user/edit/{id}' , 'Admin\Users' , 'edit');
uri('admin/user/update/{id}' , 'Admin\Users' , 'update' , 'POST');
uri('admin/user/delete/{id}' , 'Admin\Users' , 'delete');
uri('admin/user/change/{id}' , 'Admin\Users' , 'change');

// menu
uri('admin/menu' , 'Admin\Menu' , 'index');
uri('admin/menu/create' , 'Admin\Menu' , 'create');
uri('admin/menu/store' , 'Admin\Menu' , 'store' , 'POST');
uri('admin/menu/edit/{id}' , 'Admin\Menu' , 'edit');
uri('admin/menu/update/{id}' , 'Admin\Menu' , 'update' , 'POST');
uri('admin/menu/delete/{id}' , 'Admin\Menu' , 'delete');

// web setting
uri('admin/websetting' , 'Admin\Websetting' , 'index');
uri('admin/websetting/edit' , 'Admin\Websetting' , 'edit');
uri('admin/websetting/update' , 'Admin\Websetting' , 'update' , 'POST');

// ahut

uri('register' , 'Ahut\Ahut' , 'register');
uri('register/store' , 'Ahut\Ahut' , 'registerStore' , 'POST');
uri('activation/{verify_token}' , 'Ahut\Ahut' , 'activation');
uri('login' , 'Ahut\Ahut' , 'login');
uri('check-login' , 'Ahut\Ahut' , 'checkLogin' , 'POST');
uri('logout' , 'Ahut\Ahut' , 'logout');
uri('forgot' , 'Ahut\Ahut' , 'forgot');
uri('forgot/request' , 'Ahut\Ahut' , 'forgotRequest' , 'POST');
uri('reset-password-form/{forgor_token}' , 'Ahut\Ahut' , 'resetPasswordView');
uri('reset-password/{forgor_token}' , 'Ahut\Ahut' , 'resetPassword' , 'POST');


echo '404 - not finde';