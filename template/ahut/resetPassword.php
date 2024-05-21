<!DOCTYPE html>
<html lang="en">

<head>
  <title>Reset Password</title>
  <?php require_once (BASE_PATH . '/template/ahut/layouts/head-tag.php'); ?>
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-5">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?= asset('public/ahut/assets/images/img-01.png') ?>" alt="IMG">
        </div>

        <form method="post" action="<?= url('reset-password/' . $forgotToken) ?>" class="login100-form validate-form">
          <span class="login100-form-title">
            Reset Password
          </span>

          <?php
          $message = flash('reset_error');
          if (!empty($message)) {
            ?>

            <div class="mb-2 alert alert-danger text-center fs-20">
              <small class="form-text text-danger"> <?= $message ?> </small>
            </div>

            <?php
          }
          ?>



          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Send
            </button>
          </div>

          <div class="text-center p-t-90">
            <a class="txt2" href="<?= url('login') ?>">
              Login your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php require_once (BASE_PATH . '/template/ahut/layouts/script.php'); ?>