<?php 

namespace Admin;
use database\DataBases;

class Comments extends Admin{

  public function index(){

    $db = new DataBases();
    $comments = $db->select('SELECT comments.*, users.username AS user_name , posts.title AS post_name FROM((
    comments LEFT JOIN users ON comments.user_id = users.id) LEFT JOIN posts ON comments.post_id = posts.id)');

    require_once (BASE_PATH ."/template/admin/comments/index.php");
    
  }
  
  public function show(){
    
    $db = new DataBases();
    $comments = $db->select('SELECT comments.*, users.username AS user_name , posts.title AS post_name FROM((
      comments LEFT JOIN users ON comments.user_id = users.id) LEFT JOIN posts ON comments.post_id = posts.id)');
    require_once (BASE_PATH ."/template/admin/comments/show.php");
  
  }

  public function status($id){

    $db = new DataBases();
    $comment = $db->select("SELECT * FROM comments WHERE id = ?;",[$id])->fetch();
    
    if(empty($comment)){
      $this->redirect("admin/comments");
    }

    if($comment['status'] == 'unseen'){

      $db->update('comments' , $id , ['status'], ['approved']);
    }else{
      
      $db->update('comments' , $id , ['status'], ['unseen']);
    }
    
    $this->redirect('admin/comments');

  }

}