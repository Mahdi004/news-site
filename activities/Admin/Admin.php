<?php 


namespace Admin;
use Ahut\Ahut;



class Admin{

  public $currentDomain = CURRENT_DUMAIN;
  public $basPhat = BASE_PATH;
  function __construct(){
    
    $ahut = new Ahut();
    $ahut->checkAdmin();
    
  }

  protected function redirect($url){

    header('Location: '. trim($this->currentDomain, '/ ') . '/' . trim($url,'/ '));
    exit;
  }
 
  protected function redirectBack($url){

    header('Location: ' . $_FILES['HTTP_REFERER']);
    exit;
  }


  protected function seaveImage($image , $imagePath , $imageName = null){

    if($imageName){

      $extiosnt = explode('/' , $image['type'])[1];
      $imageName = $imageName . '.' . $extiosnt;

    }else{

      $extiosnt = explode('/' , $image['type'])[1];
      $imageName = date('Y_m_d_H_i_s') . '.' . $extiosnt;

    }

    $imageTmp = $image['tmp_name'];
    $imagePath = 'public/' . $imagePath . '/';
    
    if(is_uploaded_file($imageTmp)){

      if(move_uploaded_file( $imageTmp ,$imagePath . $imageName )){

        return $imagePath . $imageName;

      }else{

        return false;

      }

    }else{
      return false;
    }

    
  }
  protected function removImage($path){

    $path = trim($path,'/');
    if(file_exists( $path )){

      unlink( $path );

    }


  } 



}