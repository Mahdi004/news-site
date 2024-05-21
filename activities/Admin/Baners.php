<?php 

namespace Admin;
use database\DataBases;

class Baner extends Admin{

  public function index(){

    $db = new DataBases();
    $banners = $db->select('SELECT * FROM banners ORDER BY `id`;');

    require_once (BASE_PATH ."/template/admin/baners/index.php");

  }

  public function create(){

    require_once (BASE_PATH ."/template/admin/baners/create.php");

  }
  public function store($reques){

    $db = new DataBases();

    $reques['image'] =  $this->seaveImage($reques['image'] , 'banner-image');
    if($reques['image']){

      $db->insert('banners', array_keys($reques) , $reques);
      $this->redirect('admin/baners');

    }else{
      $this->redirect('admin/baners');
    }

  }

  public function edit($id){

    $db = new DataBases();
    $banner = $db->select('SELECT * FROM banners WHERE id = ?;',[$id])->fetch();
    require_once (BASE_PATH .'/template/admin/baners/edit.php');

  }
  public function update($reques, $id){


    $db = new DataBases();
    if($reques['image']['tmp_name'] != null){

      $baners = $db->select('SELECT * FROM banners WHERE id = ?;' ,[$id])->fetch();
      $this->removImage($baners['image']);

      $reques['image'] = $this->seaveImage($reques['image'] , 'banner-image');

    }else{
      unset($reques['image']);
    }
    $db->update('banners', $id , array_keys($reques), $reques);
    $this->redirect('admin/baners');

  }

  public function delete($id){

    $db = new DataBases();
    $db->delete('banners' , $id);
    $this->redirect('admin/baners');


  }



}