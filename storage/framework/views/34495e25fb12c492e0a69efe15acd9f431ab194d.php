<?php
$setting = DB::table('settings')->get()->first();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(!empty($setting)): ?> 
    <title><?php echo e($setting->name ?? ''); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$setting->left_logo ?? ''); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/mini_logo.png'); ?>'">
<?php endif; ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/all.min.css')); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .login-card-body,
    .register-card-body {
      background-color: #00000000;
      border-top: 0;
      color: #fff;
      padding: 20px;
      box-shadow: 12px 12px 6px #a5a5a5;
    }

    .card1 {
      position: relative;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #1b6899 !important;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    span {
      color: #09c5f2;
    }

    .btn.btn-primary {
      background: #09c5f2;
      border: 1px solid #09c5f2;
      color: #fff;
    }

    .btn.btn-primary:hover {
      border: 1px solid #ffffff;
      background: transparent;
      color: #ffffff;
    }
    
        i {
      color: white;
    }

    .main_logo {
      position: fixed;
      top: 10px;
      right: 40px;
      filter: drop-shadow(6px 5px 3px #7d7d7d);
    }

    .title {
      font-weight: 600;
      font-size: 18px;
      font-family: Georgia;
      letter-spacing: 3px;
      margin: -60px auto;
      margin-bottom: 1px;
      text-transform: capitalize;
      text-shadow: 5px 5px 4px gray;
    }
    
    .bg_image{
        background-image: url('<?php echo e(env('IMAGE_SHOW_PATH').'default/Icon_images/rm347-porpla-01.jpg'); ?>');
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    
    .title_card{
        margin-bottom: 20px;
        text-align: center;
    }
    
    
    @media  only screen and (max-width: 600px) {
            .bg_image{
                background-color: #e8e4d9;
                background-image:none;
            }
            
            .main_logo {
                top:50px;
                right: auto;
            }
            
            body{
                overflow:hidden;
            }
        }
  </style>
</head>

<body class="hold-transition login-page bg_image">
    <?php if(!empty($setting)): ?>
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$setting->left_logo ?? ''); ?>" alt="Company Logo" class="main_logo" width="100px">
    <?php endif; ?>
  <div class='title'><?php if(!empty($setting)): ?> <?php echo e($setting->name ?? ''); ?><?php endif; ?></div>

  <div class="login-box">

    <div class="card card1 mt-4">
      <div class="card-body login-card-body">
          <div class="title_card">
              <h3>Admin Login</h3>
          </div>
          
        <form action="<?php echo e(url('is-login')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo $__env->make('layout.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <input type="hidden" name="role" value="admin">
          <div class="input-group mb-3">
            <input type="text" name="user_name" class="form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="User  Name" value="<?php echo e(old('user_name')); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa fa-envelope"></i>
              </div>
            </div>
            <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
              <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" value="<?php echo e(old('password')); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="toggle-password"><i class="fa fa-eye"></i></span>
              </div>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
              <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>


          <div class="row">

            <div class="col-4"></div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <div class="col-4"></div>


          </div>
        </form>
        <div class="row mt-3">
          <div class="col-6"><a href="<?php echo e(url('forgot_password')); ?>" class="text-white"><i class="fa fa-key"></i> Forgot Password ?</a></div>
          <div class="col-6 text-right"><a href="<?php echo e(url('login')); ?>" class="text-white"><i class="fa fa-user"></i> Change Role!</a></div>
        </div </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $(".toggle-password").click(function() {
        var passwordInput = $("#password");
        var icon = $(this).find("i");

        if (passwordInput.attr("type") === "password") {
          passwordInput.attr("type", "text");
          icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
          passwordInput.attr("type", "password");
          icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
      });
    });
  </script>
  <!-- jQuery -->
  <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo e(URL::asset('public/assets/school/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(URL::asset('public/assets/school/js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH /home/rukmanisoftware/public_html/web/resources/views/auth/admin_login.blade.php ENDPATH**/ ?>