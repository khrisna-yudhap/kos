<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Color Admin | Login Page</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?= base_url('assets/admin') ?>/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- end #page-loader -->

  <!-- begin login-cover -->
  <div class="login-cover">
    <div class="login-cover-image" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-12.jpg)" data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
  </div>
  <!-- end login-cover -->

  <!-- begin #page-container -->
  <div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
      <!-- begin brand -->
      <div class="login-header">
        <div class="brand">
          <span class="logo"></span> <b>Color</b> Admin
          <small>responsive bootstrap 4 admin template</small>
        </div>
        <div class="icon">
          <i class="fa fa-lock"></i>
        </div>
      </div>
      <!-- end brand -->
      <!-- begin login-content -->
      <div class="login-content">
        <form method="POST" action="<?= site_url('login/login_do') ?>" class="margin-bottom-0">
          <div class="form-group m-b-20">
            <input type="text" name="username" class="form-control form-control-lg" placeholder="Email Address" required />
          </div>
          <div class="form-group m-b-20">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
          </div>
          <div class="checkbox checkbox-css m-b-20">
            <input type="checkbox" id="remember_checkbox" />
            <label for="remember_checkbox">
              Remember Me
            </label>
          </div>
          <div class="login-buttons">
            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
          </div>
          <!-- <div class="m-t-20">
            Not a member yet? Click <a href="javascript:;">here</a> to register.
          </div> -->
        </form>
      </div>
      <!-- end login-content -->
    </div>
    <!-- end login -->

    <!-- begin login-bg -->
    <!-- <ul class="login-bg-list clearfix">
      <li class="active"><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-17.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-17.jpg)"></a></li>
      <li><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-16.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-16.jpg)"></a></li>
      <li><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-15.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-15.jpg)"></a></li>
      <li><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-14.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-14.jpg)"></a></li>
      <li><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-13.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-13.jpg)"></a></li>
      <li><a href="javascript:;" data-click="change-bg" data-img="<?= base_url('assets/admin') ?>/img/login-bg/login-bg-12.jpg" style="background-image: url(<?= base_url('assets/admin') ?>/img/login-bg/login-bg-12.jpg)"></a></li>
    </ul> -->
    <!-- end login-bg -->

  </div>
  <!-- end page container -->

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?= base_url('assets/admin') ?>/js/app.min.js"></script>
  <script src="<?= base_url('assets/admin') ?>/js/theme/default.min.js"></script>
  <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?= base_url('assets/admin') ?>/js/demo/login-v2.demo.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>