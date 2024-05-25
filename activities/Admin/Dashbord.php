<?php 

namespace Admin;
use database\DataBases;

class Dashbord extends Admin{

  public function index(){

    $db = new DataBases();
    $categoryCount = $db->select('SELECT COUNT(*) FROM Categories')->fetch();
    $usersCount = $db->select('SELECT COUNT(*) FROM users WHERE permission = "user" ')->fetch();
    $adminsCount = $db->select('SELECT COUNT(*) FROM users WHERE permission = "admin" ')->fetch();
    $postsCount = $db->select('SELECT COUNT(*) FROM posts')->fetch();
    $postViews = $db->select('SELECT SUM(view) FROM posts ')->fetch();
    $commentCount = $db->select('SELECT COUNT(*) FROM comments')->fetch();
    $commentUnseen = $db->select('SELECT COUNT(*) FROM comments WHERE status = "unseen" ')->fetch();
    $commentApproved = $db->select('SELECT COUNT(*) FROM comments WHERE status = "approved"')->fetch();



    $MostViewedPosts = $db->select('SELECT * FROM posts ORDER BY  view DESC')->fetchAll(); 

    require_once (BASE_PATH ."/template/admin/dashbord/index.php");

  }
}