<?php

require_once (BASE_PATH . '/template/admin/layouts/haeder.php');

?>

</section>
<section class="row my-3">
  <section class="col-12">

    <form method="post" action="<?= url('admin/baners/update/' . $banner['id']) ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control" id="url" name="url"  value="<?= $banner['url'] ?>">
      </div>

      <div class="form-group">
        <img style="width: 100px;" src="" alt="">
        <hr />
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control-file">
      </div>

      <button type="submit" class="btn btn-primary btn-sm">update</button>
    </form>
  </section>
</section>


<?php

require_once (BASE_PATH . '/template/admin/layouts/footer.php');

?>