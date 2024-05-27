<?php

namespace Admin;
use database\DataBases;
class Post extends Admin{

  public function index(){

    $db = new DataBases();

  

    $posts = $db->select('SELECT posts.*, categories.name AS category_name , users.username AS user_name FROM((
    posts LEFT JOIN categories ON posts.cat_id = categories.id) LEFT JOIN users ON posts.user_id = users.id )');
    
    require_once (BASE_PATH ."/template/admin/posts/index.php");

  }

  public function create(){

    $db = new DataBases();
    $categorise = $db->select("SELECT * FROM categories ORDER BY `id`");

    require_once (BASE_PATH ."/template/admin/posts/create.php");

  }

  public function store($reques){

    $realTimestamp = substr($reques['published_at'], 0 , 10);
    $reques['published_at'] = date('Y/m/d H:i:s' , (int)$realTimestamp);
    $db = new DataBases();

    if($reques['cat_id'] != null){

      $reques['image'] = $this->seaveImage($reques['image'] , 'post-image');
      if($reques['image']){

        $reques = array_merge($reques , ['user_id' => 1]);
        $db->insert('posts', array_keys($reques) , $reques);
        $this->redirect('admin/post');

      }else{
        $this->redirect('admin/post');
      }


    }else{

      $this->redirect('admin/post');

    }
    

  }

  public function edit($id){

    $db = new DataBases();  
    $post = $db->select('SELECT * FROM posts WHERE id = ?;' ,[$id])->fetch();
    $categorise = $db->select('SELECT * FROM categories ORDER BY `id`');

    require_once (BASE_PATH . '/template/admin/posts/edit.php');

  
  }

  public function update( $reques, $id){
    date_default_timezone_set('Iran');
    $realTimestamp = substr($reques['published_at'] , 0 , 10);
    $reques['published_at'] = date('Y/m/d H:i:s' , (int)$realTimestamp);

    $db = new DataBases();  
    if($reques['cat_id'] != null){

      if($reques['image']['tmp_name'] != null){

        $post = $db->select('SELECT * FROM posts WHERE id = ?;' ,[$id])->fetch();
        $this->removImage($post['image']);

        
        $reques['image'] = $this->seaveImage($reques['image'] , 'post-image');

      }else{

        unset($reques['image']);

      }
      $reques = array_merge($reques, ['user_id' => 1]);
      $db->update('posts', $id , array_keys($reques), $reques);
      $this->redirect('admin/post');

    }else{

      $this->redirect('admin/post');

    }

  }

  public function delete($id){

    $db= new DataBases(); 
    $post = $db->select('SELECT * FROM posts WHERE id = ?;' ,[$id])->fetch();
    $this->removImage($post['image']);
    $db->delete('posts',$id);
    $this->redirect('admin/post');

  }

  public function selected($id){

    $db = new DataBases();
    $post = $db->select('SELECT * FROM posts WHERE id = ?;' ,[$id])->fetch();

    if(empty($post)){
      $this->redirect('admin/post');
    }
    if($post['selected'] == 1){

      $db->update('posts' , $id , ['selected'],[2]);

    }else{

      $db->update('posts' , $id , ['selected'],[1]);

    }
    
    $this->redirect('admin/post');

  }

  public function breakingNews($id){

    $db = new DataBases();  
    $post = $db->select('SELECT * FROM posts WHERE id = ?;' , [$id])->fetch();

    if(empty($post)){

      $this->redirect('admin/post');

    }
    if($post['breaking_news'] == 1){

      $db->update('posts', $id , ['breaking_news'],[2]);

    }else{
      $db->update('posts', $id , ['breaking_news'],[1]);
    }
    $this->redirect('admin/post');
  }
  public function status($id){

    $db = new DataBases();  
    $post = $db->select('SELECT * FROM posts WHERE id = ?;' , [$id])->fetch();

    if(empty($post)){

      $this->redirect('admin/post');

    }
    if($post['status'] == 'disable'){

      $db->update('posts', $id , ['status'],['enable']);

    }else{
      $db->update('posts', $id , ['status'],['disable']);
    }
    $this->redirect('admin/post');
  }
}