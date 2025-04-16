<?php $__env->startSection('content'); ?>
<style>

#mapview {height: 600px;} 
html,body {height: 100%;margin: 0;padding: 0;overscroll-behavior: none;}
</style>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSxphFJ6TBgTC0zCWpyaUKIRJ_REabBdk&libraries=places"></script>
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                                            
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 " 
     
         >

            <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            
    

<!--begin::Page title-->
<div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
        Customer List
            </h1>
    <!--end::Title-->

            
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    <a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">
                                Home                            </a>
                                            </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                                        
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    Customers                                            </li>
                                <!--end::Item-->
                                        
                    </ul>
        <!--end::Breadcrumb-->
    </div>
<!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
<!--end::Toolbar-->                                        
                    
<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid " >
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Card-->
<div class="card">


    <!--begin::Card body-->
    <div class="card-body p-0">
        <div id="mapview" data-customers="<?php echo e($data ?? ''); ?>"></div>
   </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

<!--begin::Modals-->
<!--begin::Modal - Customers - Add-->

<!--end::Modal - New Card--><!--end::Modals-->        </div>
        <!--end::Content container-->
    </div>
<!--end::Content-->	

                                    </div>

                                    
                           </div>
            <!--end:::Main-->

<script>
$(document).ready(function(){
    var customerData = $('#mapview').data('customers');
    var currentInfoWindow = null;
    var marker, customerlat, customerlon;
    var zoom = 10;
    initMap();
    
    function initMap() {
        const map = new google.maps.Map(document.getElementById("mapview"), {
            zoom,
            center: { lat: 26.954796696117377, lng: 75.77171519647352 },
        });
        
        $(customerData).each(function(index, value) {
            customerlat = JSON.parse(value.lat);
            customerlon = JSON.parse(value.lon);
            marker = new google.maps.Marker({
                position: { lat: customerlat, lng: customerlon },
                map: map
            });
         
             (function(marker, value) {
                            // Construct the info window content
                            var infoContent = "<div class='row' style='width:100%; align-items: center;'><div class='col-md-2 text-center'><img style='width:70px; height:70px; border-radius:50%' src='https://rukmanisoftware.com/admin9/rukmaniImage/AMC/" + value.photo + "'></div><div class='col-md-10'><b class='text-dark'>" + value.website_name + "</b><br>" + value.address + "</div></div>";
                            var infoWindow = new google.maps.InfoWindow();
                            infoWindow.setContent(infoContent);

                            // Add click event listener to the marker
                            marker.addListener("click", function() {
                                if (currentInfoWindow != null) {
                                    currentInfoWindow.close();
                                }
                                infoWindow.open(map, marker);
                                currentInfoWindow = infoWindow;
                            });
                        })(marker, value);
        });
    }
        
});

</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rukmanisoftware/public_html/web/resources/views/esh2/customers/listOnMap.blade.php ENDPATH**/ ?>