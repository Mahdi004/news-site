<?php
require_once (BASE_PATH . '/template/admin/layouts/haeder.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h5"><i class="fas fa-newspaper"></i> Website Setting</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a role="button" href="<?= url('/admin/websetting/edit') ?>" class="btn btn-sm btn-success">set web setting</a>
  </div>
</div>
<section class="table-responsive">
  <table class="table table-striped table-sm">
    <caption>Website setting</caption>
    <thead>
      <tr>
        <th>name</th>
        <th>value</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Title</td>
        <td>
          <?= $websetting['title'] ?>
        </td>
      </tr>
      <tr>
        <td>Description</td>
        <td>
          <?= $websetting['description'] ?>
        </td>
      </tr>
      <tr>
        <td>Key words</td>
        <td>
          <?= $websetting['keywords'] ?>
        </td>
      </tr>
      <tr>
        <td>Logo</td>
        <td><img src="<?= asset($websetting['logo']) ?>" alt="" width="100px" height="100px"></td>
      </tr>
      <tr>
        <td>Icon</td>
        <td><img src="<?= asset($websetting['icon']) ?>" alt="" width="100px" height="100px"> </td>
      </tr>
      <tr>
        <td>Facebook</td>
        <td>
          <?= $websetting['facebook'] ?>
        </td>
      </tr>
      <tr>
        <td>Twitter</td>
        <td>
          <?= $websetting['twitter'] ?>
        </td>
      </tr>
      <tr>
        <td>Telegram</td>
        <td>
          <?= $websetting['telegram'] ?>
        </td>
      </tr>
      <tr>
        <td>Instagram</td>
        <td>
          <?= $websetting['instagram'] ?>
        </td>
      </tr>
      <tr>
        <td>PhoneNumber</td>
        <td>
          <?= $websetting['phone_number'] ?>
        </td>
      </tr>
      <tr>
        <td>EmailAdres</td>
        <td>
          <?= $websetting['email_adres'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</section>
<?php
require_once (BASE_PATH . '/template/admin/layouts/footer.php');
?>