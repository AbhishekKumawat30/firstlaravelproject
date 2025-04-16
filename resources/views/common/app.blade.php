@php
$setting = DB::table('settings')->whereNull('deleted_at')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>     
        <meta name="csrf-token" content="{{ csrf_token() }}">
       <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{ asset('public/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->
        
        <script>
            var baseurl = "{{ url('/') }}";
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>

        
    </head>
 
    <body  id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
            @include('common.header')
            @include('common.sidebar')
            @include('common.message')
            @yield('content')
            @include('common.footer')

            <script>
                var hostUrl = "{{ url('/') }}";  
                $('#state_id').on('change', function(e){
                    var baseurl = "{{ url('/') }}";
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
            <!--<script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>-->
            <!--<script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>-->
        <!--end::Global Javascript Bundle-->
        <!--<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>-->
        <script>
        //   const beamsClient = new PusherPushNotifications.Client({
        //     instanceId: 'b862c2f0-696a-4d4a-953f-8256712c94f9',
        //   });
        
        //   beamsClient.start()
        //     .then((beamsClient) => beamsClient.getDeviceId())
        //       .then((deviceId) =>
        //         console.log("Successfully registered with Beams. Device ID:", deviceId)
        //       )
        //     .then(() => beamsClient.addDeviceInterest('default'))
        //     .then(() => console.log('Successfully registered and subscribed!'))
        //     .catch(console.error);
        </script>
        <!--<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>-->
        <!--<script src="{{ URL::asset('public/assets/js/pusher.min.js') }}"></script>-->
        <script>
        $(document).ready(function(){

            // Enable pusher logging - don't include this in production
            //Pusher.logToConsole = true;
        
            // var pusher = new Pusher('e8de249ccdd6b1228434', {
            //   cluster: 'ap2',
            //   encrypted: true
            // });
            
            //var channel = pusher.subscribe('sent');
            // channel.bind('App\\Events\\StatusLiked', function(data) {
            //     console.log('Received event:', data);
            //   alert(JSON.stringify(data));
            // });
            // channel.bind('sent', function(data) {
            //   console.log('Received data:', data);
            // });
           
            
        });
        </script>
        <script>
        // $(document).ready(function(){
        //     var pusher = new Pusher('e8de249ccdd6b1228434', {
        //   	 	cluster: 'ap2',
        // 		encrypted: true
        //     });
        //     var channel = pusher.subscribe('sent');
        //     channel.bind('App\\Events\\StatusLiked', function(data) {
        //         alert(JSON.stringify(data));
        //     });
        // });
        </script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
        $(document).ready(function(){
            var pusher = new Pusher('e8de249ccdd6b1228434', {
          	 	cluster: 'ap2',
        		encrypted: true
            });
            var channel = pusher.subscribe('sent');
            var audio = new Audio('https://web.rusoft.in/webimage/assets/media/avratz.mp3');
            channel.bind('App\\Events\\StatusLiked', function(data) {
                
                    audio.play();
                	      //alert(data.message);
                    
                }); 
                
        });
        </script>
            </div>
        </div>                
    </body>
</html>
