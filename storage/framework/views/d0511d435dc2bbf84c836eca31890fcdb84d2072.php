<?php
$setting = DB::table('settings')->whereNull('deleted_at')->first();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rukmani Software | Web</title>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta charset="utf-8"/>
        <meta name="description" content="
            The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, 
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. 
            Grab your copy now and get life-time updates for free.
        "/>
        <meta name="keywords" content="
            metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, 
            Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, 
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, 
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        "/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
        <meta property="og:url" content="https://keenthemes.com/metronic"/>
        <meta property="og:site_name" content="Metronic by Keenthemes" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
        <link rel="shortcut icon" href="<?php echo e(env('IMAGE_SHOW_PATH') . $setting->mini_logo); ?>" /><link rel="icon" href="<?php echo e(env('IMAGE_SHOW_PATH') . 'default/mini_logo.png'); ?>" type="image/x-icon" />

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>      
        <!--end::Fonts-->
         <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="<?php echo e(asset('public/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('public/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('public/assets/css/custom.css')); ?>" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->
        
        <script>
            var baseurl = "<?php echo e(url('/')); ?>";
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
    </head>
 
    <body  id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
            <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <script>
                var hostUrl = "<?php echo e(url('/')); ?>";  
                $('#state_id').on('change', function(e){
                    var baseurl = "<?php echo e(url('/')); ?>";
                	var state_id = $(this).val();
                    $.ajax({
                         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                	  url: baseurl+'/cityData/' + state_id,
                	  success: function(data){
                			$("#city_id").html(data);
                	  }
                	});
                });
                
                function isNumber(evt){
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                        return true;
                }
                
                document.addEventListener('keydown', function(event) {
                    if (event.metaKey && event.key === '/' || event.ctrlKey && event.key === '/') {
                        event.preventDefault(); 
                        $('#kt_modal_scrollable_search').modal('show');
                        setTimeout(function(){
                            $('#modal_scrollable_search').focus();
                        }, 500);
                    }
                });
                
                $('#modal_scrollable_search_btn').click(function(){
                    setTimeout(function(){
                        $('#modal_scrollable_search').focus();
                    }, 500);
                });
                
                function SearchValue() {
                    var modal_scrollable_search = $('#modal_scrollable_search').val();
                    $('.modal-body').css('filter','blur(1px)');
                    $.ajax({
                            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                        type:'post',
                        url: hostUrl + '/search',
                        data: {name:modal_scrollable_search},
                        success: function (data) {
                            $('.modal-body').css('filter','blur(0px)');
                            $('#modal_scrollable_search_data').html('');
                            $('#modal_scrollable_search_data').html(data);
                        }
                    });
                }
            </script>
        <!--begin::Theme mode setup on page load-->
        <script>
        	var defaultThemeMode = "light";
        	var themeMode;
        
        	if ( document.documentElement ) {
        		if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
        			themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        		} else {
        			if ( localStorage.getItem("data-bs-theme") !== null ) {
        				themeMode = localStorage.getItem("data-bs-theme");
        			} else {
        				themeMode = defaultThemeMode;
        			}			
        		}
        
        		if (themeMode === "system") {
        			themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        		}
        
        		document.documentElement.setAttribute("data-bs-theme", themeMode);
        	}            
        </script>
        <!--end::Theme mode setup on page load-->  
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <!--<script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>-->
            <!--<script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>-->
        <!--end::Global Javascript Bundle-->
        <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
        <script>
          const beamsClient = new PusherPushNotifications.Client({
            instanceId: 'b862c2f0-696a-4d4a-953f-8256712c94f9',
          });
        
          beamsClient.start()
            .then((beamsClient) => beamsClient.getDeviceId())
              .then((deviceId) =>
                console.log("Successfully registered with Beams. Device ID:", deviceId)
              )
            .then(() => beamsClient.addDeviceInterest('default'))
            .then(() => console.log('Successfully registered and subscribed!'))
            .catch(console.error);
        </script>
            </div>
        </div>                
    </body>
</html>
<?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/common/app.blade.php ENDPATH**/ ?>