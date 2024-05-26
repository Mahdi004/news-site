<?php 

namespace App;

class Home {

  public function index(){

    require_once (BASE_PATH . "/template/app/index.php");

  }

  public function show($id){

  }

  public function category($id){

  }

  public function commentStorm($request){


  }

  protected function redirectBack(){

    header('Location: ' . $_SERVER['HTTP_REFERER']);

  }

}