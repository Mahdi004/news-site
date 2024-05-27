<?php

namespace App;

use database\DataBases;

class Home
{

  public function index()
  {

    $db = new DataBases();
    $webSettinge = $db->select("SELECT * FROM settinge")->fetch();

    $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL")->fetchAll();

    $topSelectedPost = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,3")->fetchAll();

    $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 1 ORDER BY created_at DESC')->fetch();

    $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY created_at DESC LIMIT 0,6')->fetchAll();

    $bodyBaner = $db->select('SELECT * FROM banners LIMIT 0,1 ')->fetch();

    $populPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY view DESC LIMIT 0,3')->fetchAll();


    $sideBarSelected = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,1')->fetchAll();

    $sideBarBanner = $db->select('SELECT * FROM banners LIMIT 0,4')->fetch();

    $mostCommentPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY comment_count DESC LIMIT 0,4')->fetchAll();

    require_once (BASE_PATH . "/template/app/index.php");

  }

  public function show($id)
  {

  }

  public function category($id)
  {

  }

  public function commentStorm($request)
  {


  }

  protected function redirectBack()
  {

    header('Location: ' . $_SERVER['HTTP_REFERER']);

  }

}