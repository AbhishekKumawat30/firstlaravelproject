<!DOCTYPE html>
<html>
<head>
<title>Sudent Id</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);

?>
<body>
    <style>
        
         body {
        font-family: Arial, sans-serif;
        font-size:12px;
        display: flex;
        align-items: center;
        justify-content: center;
      /* font-family: none; */
      /* max-width:885px; */
      /* margin: 25px auto ; */
      /* padding: 10px; */
    /*border: 0.5px solid; */
   }
    .ltr{
        text-align: left; 
    }
    .rtr{
       text-align: right; 
    }
    .ctc{
       text-align: center; 
    }
    .student_img {
        width: 184px;
    position: absolute;
    top: 143px;
    height: 208px;
    right: 36px;
    border-radius: 10px;
    box-shadow: 0px 0px 6px gray;
    }

    .idCard_img{
    background-image: url('<?php echo e(env("IMAGE_SHOW_PATH")."/Sudent_Id_img/ID Card-2.jpg"); ?>');
    width: 491px;
    height: 696px;
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
    }
    @media  print{@page  {size: landscape}}


    .student_name {
        position: absolute;
    top: 375px;
    left: 175px;
    text-align: center;
    font-weight: 600;
    font-size: 15px;
    }
    .student_Fname {
        position: absolute;
    top: 409px;
    left: 175px;
    text-align: center;
    font-weight: 600;
    font-size: 15px;
    }
    .student_Dob {
        position: absolute;
        top: 443px;
        left: 175px;
        text-align: center;
        font-weight: 600;
        font-size: 15px;
    }
    .student_Class {
        position: absolute;
        top: 475px;
        left: 175px;
        text-align: center;
        font-weight: 600;
        font-size: 15px;
    }
    .student_Add {
        position: absolute;
        top: 507px;
        left: 175px;
        text-align: left;
        font-weight: 600;
        font-size: 15px;
    }
    .student_mob {
        position: absolute;
        top: 608px;
        left: 175px;
        text-align: center;
        font-weight: 600;
        font-size: 15px;
    }
    </style>
    <div class="idCard_img">
    <img class="student_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$data['image'] ?? ''); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">

    <p  class="student_name"><?php echo e($data['first_name'] ?? ''); ?> <?php echo e($data['last_name'] ?? ''); ?></p>

    <p  class="student_Fname"><?php echo e($data['father_name'] ?? ''); ?></p>

    <p  class="student_Dob"><?php echo e(date('d-m-Y', strtotime($data['dob'])) ?? ''); ?></p>

    <p  class="student_Class"><?php echo e($data['ClassTypes']['name'] ?? '-'); ?></p>

    <p  class="student_Add">
    <?php if(!empty($data['address'])): ?>
            
            <?php echo e($data['address'] ?? ''); ?>

             <?php else: ?>
             -
             <?php endif; ?>
    </p>

    <p  class="student_mob"><?php echo e($data['mobile'] ?? '-'); ?></p>
        </div>
</body>

</html><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/master/printFilePanel/StudentManagement/template06.blade.php ENDPATH**/ ?>