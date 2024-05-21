<?php

namespace Admin;
use database\DataBases;
class Users extends Admin{

  public function index(){

    $db = new DataBases();
    $users = $db->select('SELECT * FROM users ORDER BY `id`');

    require_once(BASE_PATH . '/template/admin/users/index.php');

  }

  public function edit($id){
    $db = new DataBases();
    $user = $db->select('SELECT * FROM users WHERE id = ?;', [$id])->fetch();

    require_once(BASE_PATH . '/template/admin/users/edit.php');

  }

  public function update($reques , $id){

    $db = new DataBases();
    $reques = ['username' => $reques['username'] , 'permission' => $reques['permission']];
    $db->update('users' , $id , array_keys($reques) , $reques );
    $this->redirect('admin/user');

  }

  public function delete($id){

    $db = new DataBases();
    $db->delete('users',$id);
    $this->redirect('admin/user');
  }

  public function change($id){

    
    $db = new DataBases();
    $user = $db->select('SELECT * FROM users WHERE id =?;',[$id])->fetch();
    if(empty($user)){
      $this->redirect('admin/user');
    }

    if($user['permission'] == 'user'){
      $db->update('users',$id, ['permission'] , ['admin']);
    }else{
      $db->update('users',$id, ['permission'] , ['user']);
    }

    $this->redirect('admin/user');
  }

}