<?php

namespace Admin;
use database\DataBases;

class Websetting extends Admin{

  public function index(){

    $db = new DataBases();
    $websetting = $db->select('SELECT * FROM settinge ORDER BY `id`')->fetch();
    require_once (BASE_PATH . '/template/admin/websetting/index.php');
  }

  public function edit(){
    
    $db = new DataBases();
    $websetting = $db->select('SELECT * FROM settinge ')->fetch();
    require_once (BASE_PATH . '/template/admin/websetting/edit.php');

  }

  public function update($reques){

    $db = new DataBases();
    $setting = $db->select('SELECT * FROM settinge')->fetch();

    if($reques['logo']['tmp_name'] != ''){

      $reques['logo'] = $this->seaveImage($reques['logo'] , 'setting' , 'logo');

    }else{

      unset($reques['logo']);

    }
    if($reques['icon']['tmp_name'] != ''){

      $reques['icon'] = $this->seaveImage($reques['icon'] , 'setting' , 'icon');

    }else{

      unset($reques['icon']);

    }
    if(!empty($setting)){

      $db->update('settinge' , $setting['id'] , array_keys($reques) , $reques);

    }else{

      $db->insert('settinge' , array_keys($reques) , $reques);

    }
    $this->redirect('admin/websetting');
    


  }
}