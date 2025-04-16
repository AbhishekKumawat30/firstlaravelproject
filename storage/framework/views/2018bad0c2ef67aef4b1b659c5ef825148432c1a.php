<?php
$setting = DB::table('settings')->get()->first();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e($setting->name ?? ''); ?></title>
        <link rel="icon" type="image/x-icon" href="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$setting->left_logo); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/mini_logo.png'); ?>'">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/adminlte.min.css')); ?>">    
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/all.min.css')); ?>">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/tempusdominus-bootstrap-4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/icheck-bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/jqvmap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/mobilescreen.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/OverlayScrollbars.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/daterangepicker.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/summernote-bs4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/dataTables.bootstrap4.css')); ?>">
        <!--<link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/responsive.bootstrap4.css')); ?>">-->
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/buttons.bootstrap4.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/common.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/richtexteditor.css')); ?>" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/select2.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/select2-bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">    
    <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    </head>
    <style>
        .centered_flex{
            display:flex;
            margin-bottom:10px;
        }
        
        .centered_flex i{
            font-size: 34px;
        }
        
        .centered_flex p{
           margin-bottom: 0px; 
           font-size: 20px;
           margin-left:10px;
           font-weight:600;
        }
        
        .error_message_whatsapp{
            font-weight: 400;
            text-transform: capitalize;
            line-height: 20px;
            margin-bottom: 20px;
        }
        
        .modal_btn{
            border: none;
            padding: 5px 20px;
            color: black;
            font-weight: 600;
        }
        
        .whatsapp_note{
            margin-bottom: 0px;
            font-size: 10px;
            text-transform: uppercase;
        }
        
    </style>
    
    
    <?php
    $cur_route = Route::getFacadeRoot()->current()->uri();
    ?>
    <body class="sidebar-mini layout-fixed sidebar-collapse">
        <div class="wrapper">
            <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(Session()->get('role_id') ==3): ?>
                <?php echo $__env->make('layout.student_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php echo $__env->make('layout.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <script>
                /*$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });*/
                //var URL  = "<?php echo e(url('/')); ?>";
            </script>
            
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery-ui.min.js')); ?>"></script>
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.dataTables.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/dataTables.bootstrap4.js')); ?>"></script>
            <!--<script src="<?php echo e(URL::asset('public/assets/school/js/dataTables.responsive.js')); ?>"></script>-->
            <script src="<?php echo e(URL::asset('public/assets/school/js/bootstrap.bundle.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/Chart.min.js')); ?>"></script>
            <!--<script src="<?php echo e(URL::asset('public/assets/school/js/sparkline.js')); ?>"></script>-->
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.vmap.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.vmap.usa.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.knob.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/moment.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/daterangepicker.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/summernote-bs4.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.overlayScrollbars.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/pdfmake.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/demo.js')); ?>"></script>
            <!--<script src="<?php echo e(URL::asset('public/assets/school/js/dashboard.js')); ?>"></script>-->
            <script src="<?php echo e(URL::asset('public/assets/school/js/bootstrap5.js')); ?>"></script>   
            
            <!--<script src="<?php echo e(URL::asset('public/assets/school/js/ckediter.js')); ?>"></script>-->
<!--            <script src="<?php echo e(URL::asset('public/assets/school/js/responsive.bootstrap4.js')); ?>"></script>
-->            <script src="<?php echo e(URL::asset('public/assets/school/js/dataTables.buttons.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/buttons.bootstrap4.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/buttons.html5.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/buttons.print.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/buttons.colVis.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.validate.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/additional-methods.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/adminlte.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/toastr.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/select2.full.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/jszip.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/vfs_fonts.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/richtexteditor.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/school/js/richtexteditor_all_plugins.js')); ?>"></script>
            <!--<script src="<?php echo e(URL::asset('public/assets/school/js/adminlte.min.js?v=3.2.0')); ?>"></script>-->
    
            <!--<script nonce="13793727-1378-4506-ac7e-88e6851a25a2">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>-->
    
        <script type="text/javascript">
        
            $(function () {
                $("#example1").DataTable({
                  "lengthChange": false, "autoWidth": false,
                 "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                //   "responsive": true,
                });
            });
            
            $(document).ready(function(){
                if ($(window).width() < 400) {
                    $('#example1').addClass('table-responsive nowrap');
                    $("#example1 tr td").css('padding', '10px');
                }
            });
            
            function isNumber(evt){
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            
                 return true;
            }
                  
            $(function () {
                $('.select2').select2()
                
                $('.select2bs4').select2({
                  theme: 'bootstrap4'
                })
            
            })
            
            $(function () {
                $('#compose-textarea').summernote()
            })
        </script>
                
        <script>
        $('#country_id').on('change', function(e){
                var baseurl = "<?php echo e(url('/')); ?>";
            	var country_id = $(this).val();
                $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            	  url: baseurl+'/countryData/'+country_id,
            	  success: function(data){
            			$("#state_id").html(data);
            	  }
            	});
            	
            });
        $('#state_id').on('change', function(e){
                var baseurl = "<?php echo e(url('/')); ?>";
            	var state_id = $(this).val();
                $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            	  url: baseurl+'/stateData/'+state_id,
            	  success: function(data){
            			$("#city_id").html(data);
            	  }
            	});
            	
            });
            
        $('#class_type_id').on('change', function(e){
            var baseurl = "<?php echo e(url('/')); ?>";
        	var class_type_id = $(this).val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        	    url: baseurl + '/subjectGetData/' + class_type_id,
        	    success: function(data){
        			$("#subject_id").html(data);
        	    }
        	});
        });            
        </script>
    
       
        
        <script>
        
        var timer2 = "5:01";
var interval = setInterval(function() {


  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) 
  {
  clearInterval(interval);
   location.reload();
  }
  
  
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  

  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
    //console.log(minutes + ':' + seconds);
}, 1000);

    $(document).on( "mousemove keypress", function () {
 timer2 = "5:01";
 
 
});


</script>

<script>
    $(document).ready(function(){
        var whatsapp_error = "<?php echo e(Session::get('whatsapp_error')); ?>";
        
        if(whatsapp_error != ""){
            $('#whatsapp_error_modal').modal('show');
        }
        
        $('.change_status').click(function(){
            var action = $(this).data('action');
            var whatsapp_error_respose_id = $('#whatsapp_error_respose_id').val();
            
            if(whatsapp_error_respose_id != ""){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/whatsapp_api_response',
                    data: {
                        action: action,
                        whatsapp_error_respose_id: whatsapp_error_respose_id
                    },
                    success: function(data) {
                    //   alert(JSON.stringify(data));
                    }
                });
            }
        });
    });
</script>

<div class="modal fade" id="whatsapp_error_modal">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-body">
        <div class="col-md-12">
            <div class="centered_flex">
                <i class="fa fa-exclamation-triangle text-warning"></i>
                <p>WhatsApp API Message Sending Failure</p>
            </div>
        </div>
        
        <div class="col-md-12">
            <p id="whatsapp_error_message" class="error_message_whatsapp"><?php echo e(Session::get('whatsapp_error') ?? ''); ?></p>
            <input type="hidden" id="whatsapp_error_respose_id" value="<?php echo e(Session::get('whatsapp_error_respose_id') ?? ''); ?>">
        </div>
        
        <div class="col-md-12 text-right">
            <button class="modal_btn bg-white change_status" data-action="Discard" data-bs-dismiss="modal">Discard</button>
            <button class="modal_btn bg-warning change_status" data-action="Confirm" data-bs-dismiss="modal">Confirm</button>
        </div>
        
        <hr>
        
        <div class="col-md-12">
            <p class="whatsapp_note">
                Please Contact your Service Provider.
            </p>
        </div>
    </div>
  </div>
</div>
</div>

    </body>
</html>
<?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/layout/app.blade.php ENDPATH**/ ?>