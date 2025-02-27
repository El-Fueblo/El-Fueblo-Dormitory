<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/MercuryGMS.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page text-sm">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-6 loginbgcol1 d-none d-sm-block">
<img src="<?php echo base_url(); ?>assets/backend/dist/img/cover.jpg" class="loginbg">
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 loginbgcol2 h-100 d-flex justify-content-center align-items-center">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>El Fueblo Dormitory</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  <div class="card-body login-card-body">
  <h4 class="text_center"><?php echo $options['dhp_name']; ?></h4>
    <p class="login-box-msg" id="loginmsg"><?php echo $lang['sign_in_title']; ?></p>
			<?php 
			echo validation_errors('<p class="alert alert-danger">'); 
			?>
			<?php
			if($errmsg == 'err1')
			{
				echo"<p class='alert alert-danger'>".$lang['invalid_login']."</p>";
			}
			?>

    <?php
    $attributes = array('id' => 'login');
    echo form_open_multipart("admin/ulogin", $attributes); 
    ?>
      <div class="input-group mb-3">
        <input type="email" name="user_email" class="form-control" placeholder="<?php echo $lang['email']; ?>">
        <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="user_password" class="form-control" placeholder="<?php echo $lang['password']; ?>">
        <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-12" class="floatright">
          <button type="submit" class="btn btn-primary btn-block"><?php echo $lang['signin']; ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<?php
if(isset($options['enable_registration']) && $options['enable_registration'] == true)
{
?>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
        <div class="col-12" class="floatright">
          <a href="<?php echo $burl; ?>admin/register" class="btn btn-success btn-block text-white"><?php echo $lang['register']; ?></a>
        </div>
    </div>
<?php
}
?>
  </div>
</div>
  <!-- /.login-box-body -->

</div>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/backend/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/dist/js/MercuryGMS.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
