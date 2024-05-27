<?php
require_once (BASE_PATH . '/template/admin/layouts/haeder.php');
?>

<section class="pt-3 pb-1 mb-2 border-bottom">
  <h1 class="h5">Set Web Setting</h1>
</section>

<section class="row my-3">
  <section class="col-12">

    <form method="post" action="<?= url('admin/websetting/update') ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"  value="<?= $websetting['title']?>"
          autofocus>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $websetting['description']?>" autofocus>
      </div>

      <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" class="form-control" id="keywords" name="keywords" value="<?= $websetting['keywords']?>" autofocus>
      </div>


      <div class="form-group">

        <img style="width: 100px;" src="" alt="">
        <hr />

        <label for="logo">Logo</label>
        <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
      </div>

      <div class="form-group">

        <img style="width: 100px;" src="" alt="">
        <hr />

        <label for="icon">Icon</label>
        <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
      </div>

      <div class="form-group">
        <label for="keywords">Facebook</label>
        <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $websetting['facebook']?>" autofocus>
      </div>
      <div class="form-group">
        <label for="keywords">Twitter</label>
        <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $websetting['twitter']?>" autofocus>
      </div>
      <div class="form-group">
        <label for="keywords">Telegram</label>
        <input type="text" class="form-control" id="telegram" name="telegram" value="<?= $websetting['telegram']?>" autofocus>
      </div>
      <div class="form-group">
        <label for="keywords">Instagram</label>
        <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $websetting['instagram']?>" autofocus>
      </div>
      <div class="form-group">
        <label for="keywords">PhoneNumber</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $websetting['phone_number']?>" autofocus>
      </div>
      <div class="form-group">
        <label for="keywords">EmailAdres</label>
        <input type="text" class="form-control" id="email_adres" name="email_adres" value="<?= $websetting['email_adres']?>" autofocus>
      </div>

      <button type="submit" class="btn btn-primary btn-sm">set</button>
    </form>
  </section>
</section>
<?php
require_once (BASE_PATH . '/template/admin/layouts/haeder.php');
?>