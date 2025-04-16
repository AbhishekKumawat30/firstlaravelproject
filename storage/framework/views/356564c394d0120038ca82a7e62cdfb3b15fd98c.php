<!-- Preloader -->
<!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo e(URL::asset('public/images/header-logo.png')); ?>" alt="Preloader_logo" height="100" width="200">
  </div>-->
  <!--<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                  <img src="<?php echo e(URL::asset('public/images/header-logo.png')); ?>" alt="">
                </div>
            </div>
        </div>
		</div>
  <script>/* 1. Proloder */
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });</script>
    -->
   
<?php
$getSetting = Helper::getSetting();
$getstudentbirthday = Helper::getstudentbirthday();
$getUsersBirthday = Helper::getUsersBirthday();
$getUser=Helper::getUser();
$getSession=Helper::getSession();
$getNewChat=Helper::getNewChat();
$getAllBranch = Helper::getAllBranch();
$roleName = DB::table('role')->whereNull('deleted_at')->find(Session::get('role_id'));
?>
<style>
.selectDesign{
    background-color: #6639b5;
    color: white;
    border: none;
}



    
    .marquee-parent {
      position: relative;
      width: 100%;
      overflow: hidden;
      height: 40px;
    display: flex;
    align-items: center;
    }
    .marquee-child {
      display: block;
      width: 100%;
      font-size: 18px;
      font-weight:600;
      color:white;
      height: 30px;
      position: absolute;
      animation: marquee 15s linear infinite; /* change 5s value to your desired speed */
    }
    .marquee-child:hover {
      animation-play-state: paused;
      cursor: pointer;
    }
    @keyframes  marquee {
      0% {
        left: 100%;
      }
      100% {
        left: -147px /* same as your text width */
      }
    }
    
</style>


<div class="col-md-12">
    <div class="marquee-parent bg-danger">
      <div class="marquee-child">
          <!--The software is currently in test mode, please do not make real entries.-->
          Modules [Certificate Panel, Send Message, Whatsapp Integration] On working. Other Modules are working properly You can make real entries.
      </div>
    </div>
</div>
                    
  <!-- Navbar -->
<div class="marquee_screen"></div>  
<nav class="main-header navbar navbar-expand navbar-white navbar-light p-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item ml-1">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(url('/')); ?>" class="nav-link"><?php echo e($getSetting['name'] ?? ''); ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block pt-2" style="padding-left: 130px;">
        <spam id="date" class="date"></spam> <spam id="time" class="time"></spam></a>
      </li>    
     
          
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto flex_centerd_profile">
       
        <?php if(Session::get('role_id') == 1): ?>
         <?php if(count($getstudentbirthday) > 0 || count($getUsersBirthday) > 0): ?>
        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('happy_birthday')); ?>" >
            
            <img  width="40px"
                style="margin-top:-8px" src="<?php echo e(env('IMAGE_SHOW_PATH').'default/birthday.webp'); ?>">
            </a>
            </li>
            
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" data-toggle="modal" data-target="#subModules" role="button">
                    <i class="fa fa-search"></i>
                </a>
            </li>
<!--        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fa fa-search"></i>
            </a>
            <div class="navbar-search-block">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" style="background: white !important;" onkeyup="SearchValue()" id="SearchItem" name="SearchItem" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fa fa-times"></i>
                    </button>
                    </div>
                    </div>
            </div>
        </li> -->
        <?php endif; ?>
        
         <li class="nav-item dropdown mt-2">
            <div class="Display_none_mobile">
            <a href="<?php echo e(url('clear-cache')); ?>"  class="text-white">&nbsp;  Cookie Clear &nbsp;  </a>
            </div>
        </li>
        <?php if(Session::get('role_id') == 1): ?>
     
      <div class="Display_none_mobile">
       <li class="nav-item dropdown mt-2 mr-2">
        <form action="<?php echo e(url('changeBranch')); ?>" method="POST"> 
        <?php echo csrf_field(); ?>
      <select class="selectDesign " id="branch_id" name="branch_id" onchange="this.form.submit()">
         <?php if(!empty($getAllBranch)): ?> 
         <!--<option value=""> All Branch</option>-->
              <?php $__currentLoopData = $getAllBranch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                 <option value="<?php echo e($branch->id ?? ''); ?> " <?php echo e(( $branch->id == Session::get('admin_branch_id')) ? 'selected' : ''); ?>><?php echo e($branch->branch_name ?? ''); ?> </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
         </select>
         </form>       
                
            
        </li>
        </div>
        <?php endif; ?>
        <li class="nav-item dropdown mt-2 mr-2">
        <form action="<?php echo e(url('changeLang')); ?>" method="POST"> 
        <?php echo csrf_field(); ?>
      <select class="selectDesign " id="lang" name="lang" onchange="this.form.submit()">
          <?php
          $languages = DB::table('languages')->whereNull('deleted_at')->get();
          ?>
          <?php if(!empty($languages)): ?> 
              <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->value ?? ''); ?>" <?php echo e(session()->get('locale') == $type->value ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
               
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
         </select>
         </form>       
                
            
        </li>
        <?php if(Session::get('role_id') != 1): ?>
        <div class="Display_none_mobile">
       <li class="nav-item dropdown mt-2 mr-2">
      <select class="selectDesign " id="sessionData" name="sessionData" disabled>
         <?php if(!empty($getSession)): ?> 
              <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
         </select>
        </li> 
        </div>
      <?php else: ?>
      <div class="Display_none_mobile">
       <li class="nav-item dropdown mt-2 mr-2">
        <form action="<?php echo e(url('sectionDataId')); ?>" method="POST"> 
        <?php echo csrf_field(); ?>
      <select class="selectDesign " id="sessionData" name="sessionData" onchange="this.form.submit()">
         <?php if(!empty($getSession)): ?> 
              <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
         </select>
         </form>       
                
            
        </li>
        </div>
        <?php endif; ?>
     
        <li class="nav-item dropdown mt-2">
            <div class="Display_none_mobile">
            <a href="" id="refresh" class="text-white btn btn-success btn-xs">Refresh!</a>
            </div>
        </li> 
        &nbsp;
        &nbsp;
         
        

<?php if(!empty(Session::get('id'))): ?>
      <li class="nav-item dropdown mobile_padding">
        <a class="user-panel" data-toggle="dropdown" href="#">
            <?php if(Session::get('role_id')==3): ?>  
                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" class="img-circle elevation-2" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'">
            <?php else: ?>
                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" class="img-circle elevation-2" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'">
            <?php endif; ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          
          <div class="row border-bottom mr-0">
            <div class="col-md-4 col-4">
               <?php if(Session::get('role_id')==3): ?>  
                <img class="profile_user_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
            <?php else: ?>
                <img class="profile_user_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
            <?php endif; ?> 
            </div>
            <div class="col-md-8 col-8 align_centerd">
                <div>
                <h4><?php echo e(Session::get('first_name') ?? ''); ?></h4>
                <p><?php echo e($roleName->name ?? ''); ?></p>           
            </div>    
            </div>
        </div>
        
           <a href="<?php echo e(url('profile/edit')); ?>/<?php echo e(Session::get('id') ?? ''); ?>"
                class="<?php echo e(url('profile/edit/'.Session::get('id'))  == URL::current() ? 'dropdown-item border-bottom back_active_header' : "dropdown-item border-bottom"); ?>">
             <i class="fa fa-user-circle mr-2"></i>Profile Setting
            
          </a>
          
          <a href="<?php echo e(url('change_password')); ?>"
          class="<?php echo e(url('change_password')  == URL::current() ? 'dropdown-item border-bottom back_active_header' : "dropdown-item border-bottom"); ?>">
            <i class="fa fa-key mr-2"></i>Change Password
            
          </a>
          
          <div class="dropdown-item border-bottom Display_none_PC">
            <div class="flex_row">
                <i class="fa fa-calendar-check-o mr-2"></i>
                    <form action="<?php echo e(url('sectionDataId')); ?>" method="POST"> 
                        <?php echo csrf_field(); ?>
                      <select class="form-control select" id="sessionData" name="sessionData" onchange="this.form.submit()">
                         <?php if(!empty($getSession)): ?> 
                              <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                         </select>
                    </form> 
            </div>
          </div>
          
          <a href="<?php echo e(url('logout')); ?>" class="dropdown-item border-bottom text-danger">
            <i class="fa fa-sign-out mr-2"></i> Log Out
            
          </a>
         
          
        </div>
      </li>

<?php endif; ?>

    </ul>
  </nav>

  <div class="modal fade" id="subModules">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <input type="text" id="find_value" name="find_value" class="form-control" placeholder="Search Modules">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body" id="sub_modules">
            No Data Found
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
/*$(document).ready(function(){
  $(".stuDetail").click(function(){
    $("#myModal").modal("toggle");
  });
});*/
</script>

<script>

$(document).ready(function(){
     var BASEURL = "<?php echo e(url('/')); ?>";
    $(document).on('keyup','#find_value',function(){
        var values = $(this).val();
            $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: BASEURL + '/get_modules',
                data: {name:values},
                success: function (data) {
                    if(data.length != 0){
                        // alert(JSON.stringify(data));
                    }else{
                        
                    }
                }
            });
    }); 
});
</script>


<script>
function SearchValue() {
    
    var BASEURL = "<?php echo e(url('/')); ?>";
    var SearchItem = $('#SearchItem').val();
   
    $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: BASEURL + '/all_students_search',
        data: {name:SearchItem},
        success: function (data) {

           $('.students_search').html('');
           $('.students_search').html(data);

        }
    });
   
}

</script>
  <script>
    var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;

function appendZero(value) {
    return "0" + value;
}

function theTime() {
    var d = new Date();
    document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US");
}

if (day < 10) {
    day = appendZero(day);
}

if (month < 10) {
    month = appendZero(month);
}

today = day + "-" + month + "-" + today.getFullYear();

document.getElementById("date").innerHTML = today;

var myVar = setInterval(function () {
    theTime();
}, 1000);

</script>  

  <style>
  
  @media  screen and (max-width:600px){
      .user-panel{
           padding: 0px 0px !important
        }
  }
      .solid {
            border: solid thin;
            margin: 4px ;
            width: 110px;
            height: 91px;      
      }
      
.center{
    margin-left: 33%;
}

.user-panel{
   padding:0px 1rem;
}
    .user-panel img {
        height: 2rem;
        width: 2rem;
        margin-top: 4px;
    }
  
.preloader{
/*background-color:#f7f7f7e8;
*/width:100%;height:100%;
position:fixed;top:0;
left:0;
right:0;
bottom:0;
z-index:999999;
-webkit-transition:.6s;
-o-transition:.6s;
transition:.6s;
margin:0 auto;
}
.preloader .preloader-circle{
width:169px;
height:169px;
position:relative;
border-style:solid;
border-width:1px;
border-top-color:#ff2020;
border-bottom-color:transparent;
border-left-color:transparent;
border-right-color:transparent;
z-index:10;
border-radius:50% ! important;
-webkit-box-shadow:0 1px 5px 0 rgba(35,181,185,0.15);
box-shadow:0 1px 5px 0 rgba(35,181,185,0.15);
background-color:#ffffff;
-webkit-animation:zoom 2000ms infinite ease;
animation:zoom 2000ms infinite ease;
-webkit-transition:.6s;
-o-transition:.6s;transition:.6s;
}
.preloader .preloader-circle2{
border-top-color:#0078ff;
}
.preloader .preloader-img{
position:absolute;top:50%;
z-index:200;
left:0;
right:0;
margin:0 auto;
text-align:center;
display:inline-block;
-webkit-transform:translateY(-50%);
-ms-transform:translateY(-50%);
transform:translateY(-50%);
padding-top:6px;
-webkit-transition:.6s;
-o-transition:.6s;
transition:.6s;
}
.preloader .preloader-img img{
max-width:163px
}.
.preloader .pere-text strong{
font-weight:800;
color:#dca73a;
text-transform:uppercase;
}
@-webkit-keyframes zoom
{0%{-webkit-transform:rotate(0deg);
transform:rotate(0deg);
-webkit-transition:.6s;
-o-transition:.6s;
transition:.6s}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg);
-webkit-transition:.6s;-o-transition:.6s;
transition:.6s}}
@keyframes  zoom{0%{-webkit-transform:rotate(0deg);
transform:rotate(0deg);
-webkit-transition:.6s;
-o-transition:.6s;
transition:.6s}100%{-webkit-transform:rotate(360deg);
transform:rotate(360deg);
-webkit-transition:.6s;
-o-transition:.6s;
transition:.6s;}}
.section-padding2{
padding-top:200px;
padding-bottom:200px;}
@media  only screen and (min-width: 1200px) and (max-width: 1600px)
{
.section-padding2{
padding-top:200px;
padding-bottom:200px;
}}
@media  only screen and (min-width: 992px) and (max-width: 1199px){
.section-padding2{
padding-top:200px;padding-bottom:200px;}}
@media  only screen and (min-width: 768px) and (max-width: 991px){
.section-padding2{padding-top:100px;padding-bottom:100px;
}}
@media  only screen and (min-width: 576px) and (max-width: 767px){
.section-padding2{padding-top:50px;padding-bottom:50px;
}}
@media (max-width: 575px){
.section-padding2{padding-top:50px;padding-bottom:50px}}
.padding-bottom{padding-bottom:250px;
}@media  only screen and (min-width: 1200px) and (max-width: 1600px)
{.padding-bottom{padding-bottom:250px;
}}
@media  only screen and (min-width: 992px) and (max-width: 1199px){
.padding-bottom{padding-bottom:150px;
}}
@media  only screen and (min-width: 768px) and (max-width: 991px){
.padding-bottom{padding-bottom:40px;
}}
@media  only screen and (min-width: 576px) and (max-width: 767px)
{.padding-bottom{padding-bottom:10px;
}}
@media (max-width: 575px){
.padding-bottom{padding-bottom:10px;}}
.lf-padding{
padding-left:60px;
padding-right:60px;
}
@media  only screen and (min-width: 992px) and (max-width: 1199px){
.lf-padding{
padding-left:60px;
padding-right:60px;
}}
@media  only screen and (min-width: 768px) and (max-width: 991px)
{.lf-padding{padding-left:30px;
padding-right:30px}}
@media  only screen and (min-width: 576px) and (max-width: 767px)
{.lf-padding{
padding-left:15px;
padding-right:15px;}}

.align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important;
}
.justify-content-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
}
.d-flex {
    display: -ms-flexbox !important;
    display: flex !important;
}

	</style><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/layout/header.blade.php ENDPATH**/ ?>