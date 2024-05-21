<?php 

namespace Admin;
use database\DataBases;

class Menu extends Admin{

  public function index(){

    $db = new DataBases();
    $menus = $db->select('SELECT m1.* , m2.name AS parent_name FROM menus m1  LEFT JOIN menus m2 ON m1.parent_id = m2.id');
    require_once (BASE_PATH . '/template/admin/menu/index.php');

  }

  public function create(){

    $db = new DataBases();
    $menus = $db->select('SELECT * FROM menus WHERE parent_id  IS NULL ORDER BY `id`');
    
    require_once (BASE_PATH . '/template/admin/menu/create.php');

  }
  public function store($reques){

    $db = new DataBases();
    $db->insert('menus' , array_keys($reques) , $reques);
    $this->redirect('admin/menu');


  }

  public function edit($id){
    $db = new DataBases(); 
    $menu = $db->select('SELECT * FROM menus WHERE id = ?;', [$id])->fetch();
    $menus = $db->select('SELECT * FROM menus WHERE parent_id  IS NULL ');
    require_once (BASE_PATH . '/template/admin/menu/edit.php');

  }

  public function update($reques , $id){

    $db = new DataBases();
    $db->update('menus', $id, array_keys($reques) , $reques);
    $this->redirect('admin/menu');

  }
  public function delete($id){

    $db = new DataBases();
    $db->delete('menus' ,$id);
    $this->redirect('admin/menu');

  }
}