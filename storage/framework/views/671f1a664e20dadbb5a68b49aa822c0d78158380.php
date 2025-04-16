
<!DOCTYPE html>

<html lang="en" >
    <!--begin::Head-->
<?php
$setting = DB::table('settings')->whereNull('deleted_at')->first();
$slogan = explode('@', $setting->login_slogan);
?>
<head>
    
        <title>Rukmani Software | Login</title>
        <meta charset="utf-8"/>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->

        
        
                    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
                            <link href="<?php echo e(asset('public/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
                            <link href="<?php echo e(asset('public/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
                        <!--end::Global Stylesheets Bundle-->
        
       
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
        
        
        
        
        
        
        
                        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
                <!--<script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js"></script>-->
                <!--<script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-messaging.js"></script>-->
                <!--<script src="<?php echo e(asset('public/firebase-messaging-sw.js')); ?>"></script>-->
                <!--<script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-app-compat.js"></script>-->

<script type="module">
  // Import the functions you need from the SDKs you need
  //import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-app.js";
//   import { initializeApp } from './firebase-config';
//   import { getMessaging, getToken, onMessage } from 'https://www.gstatic.com/firebasejs/9.15.0/firebase-messaging.js';
//   // TODO: Add SDKs for Firebase products that you want to use
//   // https://firebase.google.com/docs/web/setup#available-libraries

//   // Your web app's Firebase configuration
//   const firebaseConfig = {
//     apiKey: "AIzaSyAAhuFYQwFrjoBthuJhPkJ_pnIL90Gd5PY",
//     authDomain: "rukmani-software.firebaseapp.com",
//     projectId: "rukmani-software",
//     storageBucket: "rukmani-software.appspot.com",
//     messagingSenderId: "629949246411",
//     appId: "1:629949246411:web:ab9cc67dfa4562017ce44e"
//   };

//   // Initialize Firebase
//   const app = initializeApp(firebaseConfig);
  

// const messaging = getMessaging();

// function requestPermission() {
//   Notification.requestPermission().then(permission => {
//     if (permission === 'granted') {
//       console.log('Notification permission granted.');
//       return getToken(messaging, { vapidKey: 'BHPoRxvUijg9TrRoAuvvswtwbZrcXSDQ2Kgb9dll7YyinBuaSkMRPGaRVhZw3WzGzysospKdqoKbEQqCJj6mAV0' });
//     } else {
//       console.log('Unable to get permission.');
//     }
//   });
// }

// getToken(messaging, { vapidKey: 'BHPoRxvUijg9TrRoAuvvswtwbZrcXSDQ2Kgb9dll7YyinBuaSkMRPGaRVhZw3WzGzysospKdqoKbEQqCJj6mAV0' })
//   .then((currentToken) => {
//     if (currentToken) {
//       // Send the token to your application server.
//       alert(currentToken);
//       console.log('Token:', currentToken);
//     } else {
//       // Show permission request.
//       console.log('No registration token available. Request permission.');
//       requestPermission();
//     }
//   })
//   .catch((err) => {
//     console.error('An error occurred while retrieving token.', err);
//   });



</script>              
                
                <script type="module">

// import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js';
// import { getMessaging, getToken, onMessage } from 'https://www.gstatic.com/firebasejs/9.15.0/firebase-messaging.js';

// const firebaseConfig = {
// apiKey: "AIzaSyATKlqhNq8zobdN8196URskJm0TOODcvJo",
//     authDomain: "abizob-india-4c153.firebaseapp.com",
//     projectId: "abizob-india-4c153",
//     storageBucket: "abizob-india-4c153.appspot.com",
//     messagingSenderId: "59367755243",
//     appId: "1:59367755243:web:85c25721fad519d2b51dae",
//     measurementId: "G-WQKXMHZEV9"
// };

// const app = initializeApp(firebaseConfig);
// const messaging = getMessaging(app);



// // Request permission for notifications
// Notification.requestPermission().then(function (permission) {
//   if (permission === 'granted') {
//     console.log('Notification permission granted.');
//     getToken(messaging, { vapidKey: 'BFHJNVd8R4sHgYZjk0PhIJ6Ozq3gI4tlUX5pzgdPFNvVV4q8MvEnjPFYusp7Rz-JOsfv0RbEYowg0yNhDP7A1zg' }).then((currentToken) => {
//       if (currentToken) {
//         console.log('Current token: ', currentToken);
//         // Send the token to your application server
//         // ...
//       } else {
//         // Show permission request.
//         console.log('No registration token available. Request permission to generate one.');
//       }
//     }).catch((err) => {
//       console.error('An error occurred while retrieving token.', err);
//     });
//   } else {
//     console.log('Notification permission denied.');
//   }
// });

// // ... rest of your code

//   if ('serviceWorker' in navigator) {
//   navigator.serviceWorker.register('/firebase-messaging-sw.js')
//     .then(function(registration) {
//       console.log('Registration successful, scope is:', registration.scope);
//     })
//     .catch(function(err) {
//       console.log('Service worker registration failed, error:', err);
//     });
// }
             
                
  // Import the functions you need from the SDKs you need
//   import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.3/firebase-app.js";
//   import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.3/firebase-analytics.js";

  
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
//   const firebaseConfig = {
//     apiKey: "AIzaSyATKlqhNq8zobdN8196URskJm0TOODcvJo",
//     authDomain: "abizob-india-4c153.firebaseapp.com",
//     projectId: "abizob-india-4c153",
//     storageBucket: "abizob-india-4c153.appspot.com",
//     messagingSenderId: "59367755243",
//     appId: "1:59367755243:web:85c25721fad519d2b51dae",
//     measurementId: "G-WQKXMHZEV9"
//   };

   // firebase.initializeApp(firebaseConfig);

//const messaging = firebase.messaging();

// function requestPermission() {
//   console.log('Requesting permission...');
//   Notification.requestPermission().then((permission) => {
//     if (permission === 'granted') {
//       console.log('Notification permission granted.');
//       // Get the token
//       getToken();
//     } else {
//       console.log('Unable to get permission to notify.');
//     }
//   });
// }



  // Initialize Firebase
//   const app = initializeApp(firebaseConfig);
//   const analytics = getAnalytics(app);
//   const messaging = getMessaging(app);
  
// // Request permission to send notifications
// Notification.requestPermission().then((permission) => {
//   if (permission === 'granted') {
//     console.log('Notification permission granted.');

//     // Get the device token
//     getToken(messaging, { vapidKey: 'AIzaSyATKlqhNq8zobdN8196URskJm0TOODcvJo' }).then((currentToken) => {
//       if (currentToken) {
//         console.log('Device token:', currentToken);
//         // Send the token to your server and save it for later use
//       } else {
//         console.log('No registration token available. Request permission to generate one.');
//       }
//     }).catch((err) => {
//       console.log('An error occurred while retrieving token. ', err);
//     });
//   } else {
//     console.log('Unable to get permission to notify.');
//   }
// });


</script>
        
        
        
        
        
        
        
        
        
    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="app-blank" >
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
            
        
        <!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-lg-row flex-column-fluid">    
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">
                
<!--begin::Form-->
<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/" action="#">
    <!--begin::Heading-->
    <div class="text-center mb-11">
        
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">
            Sign In 
        </h1>
        <!--end::Title-->

        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">
            <?php echo e($setting->name ?? ''); ?>

        </div>
        <!--end::Subtitle--->
    </div>
    <!--begin::Heading-->

    <!--begin::Login options-->
    <div class="row g-3 mb-9">
        <!--begin::Col-->
        <div class="col-md-6">
            <!--begin::Google link--->
            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/svg/brand-logos/google-icon.svg'); ?>" class="h-15px me-3"/>   
                Sign in with Google
            </a>
            <!--end::Google link--->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6">
            <!--begin::Google link--->
            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/svg/brand-logos/apple-black.svg'); ?>" class="theme-light-show h-15px me-3"/>
                <img alt="Logo" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/svg/brand-logos/apple-black-dark.svg'); ?>" class="theme-dark-show h-15px me-3"/>     
                Sign in with Apple
            </a>
            <!--end::Google link--->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Login options-->

    <!--begin::Separator-->
    <div class="separator separator-content my-14">
        <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
    </div>
    <!--end::Separator-->

    <!--begin::Input group--->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Email" name="email" id="email" autocomplete="off" class="form-control bg-transparent"/> 
        <!--end::Email-->
    </div>

    <!--end::Input group--->
    <div class="fv-row mb-3">    
        <!--begin::Password-->
        <input type="password" placeholder="Password" name="password" id="password" autocomplete="off" class="form-control bg-transparent"/>
        <!--end::Password-->
    </div>
    <!--end::Input group--->

    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>

        <!--begin::Link-->
        <!--<a href="reset-password.html" class="link-primary">-->
        <!--    Forgot Password ?-->
        <!--</a>-->
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->    

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            
<!--begin::Indicator label-->
<span class="indicator-label">
    Sign In</span>
<!--end::Indicator label-->

<!--begin::Indicator progress-->
<span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
<!--end::Indicator progress-->        </button>
    </div>
    <!--end::Submit button-->

    <!--begin::Sign up-->
    <!--<div class="text-gray-500 text-center fw-semibold fs-6">-->
    <!--    Not a Member yet?-->

    <!--    <a href="sign-up.html" class="link-primary">-->
    <!--        Sign up-->
    <!--    </a>-->
    <!--</div>-->
    <!--end::Sign up-->
</form>
<!--end::Form--> 
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Form-->       

        <!--begin::Footer-->  
        <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
            <!--begin::Languages-->
            <div class="me-10">             
                <!--begin::Toggle-->
                <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                    <img  data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/united-states.svg'); ?>" alt=""/>
                    
                    <span data-kt-element="current-lang-name" class="me-1">English</span>

                    <span class="d-flex flex-center rotate-180">
                        <i class="ki-duotone ki-down fs-5 text-muted m-0"></i>                    </span>
                </button>
                <!--end::Toggle-->

                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                                            <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
                                <span class="symbol symbol-20px me-4">
                                    <img data-kt-element="lang-flag" class="rounded-1" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/united-states.svg'); ?>" alt=""/>
                                </span>
                                <span data-kt-element="lang-name">English</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                                            <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                <span class="symbol symbol-20px me-4">
                                    <img data-kt-element="lang-flag" class="rounded-1" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/spain.svg'); ?>" alt=""/>
                                </span>
                                <span data-kt-element="lang-name">Spanish</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                                            <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
                                <span class="symbol symbol-20px me-4">
                                    <img data-kt-element="lang-flag" class="rounded-1" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/germany.svg'); ?>" alt=""/>
                                </span>
                                <span data-kt-element="lang-name">German</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                                            <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                <span class="symbol symbol-20px me-4">
                                    <img data-kt-element="lang-flag" class="rounded-1" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/japan.svg'); ?>" alt=""/>
                                </span>
                                <span data-kt-element="lang-name">Japanese</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                                            <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
                                <span class="symbol symbol-20px me-4">
                                    <img data-kt-element="lang-flag" class="rounded-1" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/flags/france.svg'); ?>" alt=""/>
                                </span>
                                <span data-kt-element="lang-name">French</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                                    </div>
                <!--end::Menu-->           
            </div>
            <!--end::Languages--> 

            <!--begin::Links-->
            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                <a href="#" >Terms</a>

                <a href="#" >Plans</a>
                
                <a href="#" >Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Body-->
    
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/misc/auth-bg.png'); ?>)">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">          
            <!--begin::Logo-->
            <a href="<?php echo e(url('/')); ?>" class="mb-0 mb-lg-12">
                <img alt="Logo" src="<?php echo e(env('IMAGE_SHOW_PATH') . $setting->mini_logo); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH') . 'default/mini_logo.png'); ?>'" class="h-60px h-lg-75px"/>
            </a>    
            <!--end::Logo-->

            <!--begin::Image-->                
            <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/misc/auth-screens.png'); ?>" alt=""/>                 
            <!--end::Image-->

            <!--begin::Title-->
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7"> 
                <?php echo e($setting->name ?? ''); ?>

            </h1>  
            <!--end::Title-->
           
            <!--begin::Text-->
            <!--<div class="d-none d-lg-block text-white fs-base text-center">-->
            <!--    In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a> -->

            <!--    introduces a person they’ve interviewed <br/> and provides some background information about -->
                
            <!--    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a> -->
            <!--    and their <br/> work following this is a transcript of the interview.  -->
            <!--</div>-->
            <div class="d-none d-lg-block text-white fs-base text-center">
                <marquee direction="up" scrollamount="2" scrolldelay="250" loop="-1" width="100%" height="20px" class="text-center">
                <?php if(!empty($slogan)): ?>
                <?php $__currentLoopData = $slogan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slgn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($slgn ?? ''); ?><br><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </marquee>
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Aside-->
</div>
<!--end::Authentication - Sign-in-->
                         


                         </div>
<!--end::Root-->
        
        <!--begin::Javascript-->
        <script>
            var hostUrl = "../../../assets/index.html";        </script>

                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                            <script src="<?php echo e(asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
                            <script src="<?php echo e(asset('public/assets/js/scripts.bundle.js')); ?>"></script>
                        <!--end::Global Javascript Bundle-->
        
        
                    <!--begin::Custom Javascript(used for this page only)-->
                            <script src="<?php echo e(asset('public/assets/js/custom/authentication/sign-in/general.js')); ?>"></script>
                        <!--end::Custom Javascript-->
                <!--end::Javascript-->

                
                
                
            </body>
    <!--end::Body-->





</html><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/authentication/layouts/corporate/sign-in.blade.php ENDPATH**/ ?>