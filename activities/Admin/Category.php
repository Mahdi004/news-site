<?php

namespace Admin;

use database\DataBases;

class Category extends Admin
{

public function index()
  {

    $db = new DataBases;

    $categories = $db->select('SELECT * FROM categories  ORDER BY `id` ');

    require_once (BASE_PATH . '/template/admin/categories/index.php');
  }

public function create()
  {

    require_once (BASE_PATH . '/template/admin/categories/create.php');

  }

public function store($reques)
  {

    $db = new DataBases;
    $db->insert('categories', array_keys($reques), $reques);
    $this->redirect('admin/category');

  }

public function edit($id)
  {
    $db = new DataBases;
    $category = $db->select('SELECT * FROM categories WHERE id = ?', [$id])->fetch();
    require_once (BASE_PATH . '/template/admin/categories/edit.php');
  }

public function update($reques, $id)
  {

    $db = new DataBases;
    $db->update('categories', $id, array_keys($reques), $reques);
    $this->redirect('admin/category');
    
  }
  
public function delete($id)
  {
    
    $db = new DataBases;
    $db->delete('categories', $id);
    $this->redirect('admin/category');
    
  }
}