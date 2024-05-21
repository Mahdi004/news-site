<?php

require_once (BASE_PATH ."/template/admin/layouts/haeder.php");

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  
  </div>
</div>
<section class="table-responsive">
  <table class="table table-striped table-sm">
    <caption>List of comments</caption>
    <thead>
      <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Post Name</th>
        <th>Comment</th>
        <th>Status</th>
        <th>Setting</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment) { ?>
        <tr>
          <td>
            <a href="<?= url('admin/comments/show/' . $comment['id']) ?>"><?= $comment['id'] ?></a>
          </td>
          <td>
            <?= $comment['user_name'] ?>
          </td>
          <td>
            <?= $comment['post_name'] ?>
          </td>
          <td>
            <?= substr($comment['comments'], 0, 35) ?>...
          </td>
          <td>
            <?= $comment['status'] ?>
          </td>
          <td>
            <?php if ($comment['status'] == 'unseen') { ?>
              <a role="button" class="btn btn-sm btn-success text-white"
                href="<?= url('admin/comments/status/' . $comment['id']) ?>">click to approved</a>
            <?php
            } else {
              ?>
              <a role="button" class="btn btn-sm btn-warning text-white"
                href="<?= url('admin/comments/status/' . $comment['id']) ?>">click not to approved</a>
              <?php
            }
            ?>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</section>



<?php

require_once (BASE_PATH ."/template/admin/layouts/haeder.php");

?>