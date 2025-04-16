<?php $__env->startSection('content'); ?>
<?php
    $resStatus = DB::table('enquiry_status')->where('id',$enquiry->responce_status_id)->first();
    $involvedUser = DB::table('users')->whereIn('id', $history->pluck('user_id'))->get();
?>
<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
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
                Enquiry History
                    </h1>
            <!--end::Title-->
            </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
               
            
            <!--begin::Primary button-->
                    <a href="<?php echo e(url('esh2/enquiry/list')); ?>" class="d-flex btn btn-sm fw-bold btn-primary" >
                    <i class="ki-duotone ki-left fs-2"></i> Back        </a>
                <!--end::Primary button-->
        </div>
        <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
        <!--end::Toolbar-->                                        


<div id="kt_app_content" class="app-content  flex-column-fluid ">
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
        
<!--begin::Card-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Summary-->
        

<!--begin::User Info-->
<div class="d-flex flex-center flex-column py-5">
    <!--begin::Avatar-->
    <div class="symbol symbol-100px symbol-circle mb-7">
        <?php if(!empty($enquiry->image)): ?>
        <img src="<?php echo e(env('IMAGE_SHOW_PATH') . 'esh2/enquiry/' . $enquiry->image); ?>" alt="image">
        <?php else: ?>
            <div class="symbol-label fs-3 bg-light-danger text-danger"><?php echo e($enquiry->name[0] ?? ''); ?></div>
        <?php endif; ?>
    </div>
    <!--end::Avatar-->

    <!--begin::Name-->
    <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
        <?php echo e($enquiry->name ?? ''); ?>    </a>
    <!--end::Name-->

    <!--begin::Position-->
    <div class="mb-9">
        <!--begin::Badge-->
        <div class="badge badge-lg badge-light-<?php echo e($resStatus->color ?? ''); ?> d-inline"><?php echo e($resStatus->name ?? ''); ?></div>
        <!--begin::Badge-->
    </div>
    <!--end::Position-->

    <!--begin::Info-->
    <!--begin::Info heading-->
    <div class="fw-bold mb-3">
        User Updates

        <span class="ms-2" ddata-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week.">
            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>        </span>
    </div>
    <!--end::Info heading-->

    <div class="d-flex flex-wrap flex-center">
        <!--begin::Stats-->
        <?php if(!empty($involvedUser)): ?>
        <?php $__currentLoopData = $involvedUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $attemptedCount = DB::table('enquiry_historys')->where('enquiry_id', $enquiry->id)->where('user_id', $inUser->id)->count();
            ?>
        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
            <div class="fs-4 fw-bold text-gray-700">
                <span class="w-75px"><?php echo e($attemptedCount ?? '0'); ?></span>
                <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span class="path2"></span></i>            </div>
            <div class="fw-semibold text-muted"><?php echo e($inUser->name ?? ''); ?></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <!--end::Stats-->
    </div>
    <!--end::Info-->
</div>
<!--end::User Info-->        <!--end::Summary-->

        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                Details
                <span class="ms-2 rotate-180">
                    <i class="ki-duotone ki-down fs-3"></i>                </span>
            </div>

        </div>
        <!--end::Details toggle-->

        <div class="separator"></div>

        <!--begin::Details content-->
        <div id="kt_user_view_details" class="collapse show">
            <div class="pb-5 fs-6">
                <?php if(!empty($enquiry->mobile)): ?>
                    <div class="fw-bold mt-5">Mobile</div>
                    <div class="text-gray-600"><a href="tel://<?php echo e($enquiry->mobile ?? ''); ?>" class="text-gray-600 text-hover-primary"><?php echo e($enquiry->mobile ?? ''); ?></a></div>
                <?php endif; ?>
                
                <?php if(!empty($enquiry->mobile2)): ?>
                    <div class="fw-bold mt-5">Mobile 2</div>
                    <div class="text-gray-600"><a href="tel://<?php echo e($enquiry->mobile2 ?? ''); ?>" class="text-gray-600 text-hover-primary"><?php echo e($enquiry->mobile2 ?? ''); ?></a></div>
                <?php endif; ?>
                
                <?php if(!empty($enquiry->email)): ?>
                    <div class="fw-bold mt-5">Email</div>
                    <div class="text-gray-600"><a href="mailto://<?php echo e($enquiry->email ?? ''); ?>" class="text-gray-600 text-hover-primary"><?php echo e($enquiry->email ?? ''); ?></a></div>
                <?php endif; ?>
                
                <?php if(!empty($enquiry->address)): ?>
                    <div class="fw-bold mt-5">Address</div>
                    <div class="text-gray-600"><?php echo e($enquiry->address ?? ''); ?></div>
                <?php endif; ?>
                
                <?php if(!empty($enquiry->department_id)): ?>
                    <div class="fw-bold mt-5">Department</div>
                    <div class="text-gray-600"><?php if($enquiry->department_id == 1): ?> School <?php elseif($enquiry->department_id == 2): ?> Coaching <?php elseif($enquiry->department_id == 3): ?> Library <?php elseif($enquiry->department_id == 4): ?> Hostel <?php elseif($enquiry->department_id == 5): ?> Website <?php elseif($enquiry->department_id == 6): ?> CRM <?php elseif($enquiry->department_id == 7): ?> Custom <?php else: ?> <?php echo e($enquiry->department_id ?? ''); ?> <?php endif; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($enquiry->type)): ?>
                    <div class="fw-bold mt-5">Type</div>
                    <div class="text-gray-600"><?php if($enquiry->type == 1): ?> Client <?php elseif($enquiry->type == 2): ?> Contact <?php elseif($enquiry->type == 3): ?> Office Visit <?php elseif($enquiry->type == 4): ?> Interview <?php elseif($enquiry->type == 5): ?> Other <?php else: ?> <?php echo e($enquiry->type ?? ''); ?> <?php endif; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <!--end::Details content-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

</div>
    <!--end::Sidebar-->

    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-15">
        

                <!--begin::Card-->
<div class="card card-flush mb-6 mb-xl-9">

    <!--begin::Card body-->
    <div class="card-body p-9 pt-4">
       
<div class="row pt-2">
                                <?php if($history->count() > 0): ?>
                                <div class="col-md-12 bg-light-info pt-2" id="capture">
                                    <?php
                                        $lastKey = $history->keys()->last();
                                  
                                    ?>
                                    
                                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $user = DB::table('users')->where('id',$item->user_id)->first();
                                            $status = DB::table('enquiry_status')->where('id',$item->responce_status_id)->first();
                                        ?>
                                    <div class="row border-bottom border-primary pb-2">
                                        <div class="col-md-12">
                                            <p><?php echo e(date('l, d-M-y, h:i A', strtotime($item->updated_at))); ?> | Enquiry <?php if($key == $lastKey): ?> Created <?php else: ?> Updated <?php endif; ?> by <?php echo e($user->name ?? ''); ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Updates :</p>
                                        </div>
                                        <div class="col-md-10 d-flex flex-wrap">
                                            <?php if(!empty($item->type)): ?> <span class="m-1 p-1 bg-light-success">Type : <?php if($item->type == 1): ?> Client <?php elseif($item->type == 2): ?> Contact <?php elseif($item->type == 3): ?> Office Visit <?php elseif($item->type == 4): ?> Interview <?php elseif($item->type == 5): ?> Other <?php else: ?> <?php echo e($item->type ?? ''); ?> <?php endif; ?></span> <?php endif; ?>
                                            <?php if(!empty($item->name)): ?> <span class="m-1 p-1 bg-light-success">Name : <?php echo e($item->name ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->mobile)): ?> <span class="m-1 p-1 bg-light-success">Mobile : <?php echo e($item->mobile ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->mobile2)): ?> <span class="m-1 p-1 bg-light-success">Mobile 2 : <?php echo e($item->mobile2 ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->email)): ?> <span class="m-1 p-1 bg-light-success">Email : <?php echo e($item->email ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->department_id)): ?> <span class="m-1 p-1 bg-light-success">Department : <?php if($item->department_id == 1): ?> School <?php elseif($item->department_id == 2): ?> Coaching <?php elseif($item->department_id == 3): ?> Library <?php elseif($item->department_id == 4): ?> Hostel <?php elseif($item->department_id == 5): ?> Website <?php elseif($item->department_id == 6): ?> CRM <?php elseif($item->department_id == 7): ?> Custom <?php else: ?> <?php echo e($item->department_id ?? ''); ?> <?php endif; ?></span> <?php endif; ?>
                                            <?php if(!empty($item->address)): ?> <span class="m-1 p-1 bg-light-success">Address : <?php echo e($item->address ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->reminder_date)): ?> <span class="m-1 p-1 bg-light-success">Reminder Date : <?php echo e(date('d-m-Y h:i A', strtotime($item->reminder_date)) ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->remark)): ?> <span class="m-1 p-1 bg-light-success">Remark : <?php echo e($item->remark ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->responce_status_id)): ?> <span class="m-1 p-1 bg-light-success">Response Status : <?php echo e($status->name ?? ''); ?></span> <?php endif; ?>
                                            <?php if(!empty($item->status)): ?> <span class="m-1 p-1 bg-light-success">Status : <?php echo e($status->name ?? ''); ?></span> <?php endif; ?>
                                        </div>
                                        <?php if(!empty($item->message)): ?>
                                        <div class="col-md-2 col-3">
                                            <p>Message :</p>
                                        </div>
                                        <div class="col-md-10 col-9">
                                            <p><b> <?php echo e($item->message ?? ''); ?> </b></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <div class="col-md-12 col-12 text-center pt-3">
                                    <button class="btn btn-sm fw-bold btn-info me-2 mb-2" id="downloadBtn"><i class="ki-duotone ki-black-down"></i> Download</button>
                                </div>
                                <?php endif; ?>
                            </div>
       
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
 

    </div>
    <!--end::Content-->
</div>
<!--end::Layout-->
 
</div>
        <!--end::Content container-->
    </div>


    </div>
</div>




      
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
        <!--end::Global Javascript Bundle-->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>         
<script type="text/javascript">
  
    function capture() {
  const captureElement = document.querySelector('#capture')
  html2canvas(captureElement)
    .then(canvas => {
      canvas.style.display = 'none'
      document.body.appendChild(canvas)
      return canvas
    })
    .then(canvas => {
      const image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream')
      const a = document.createElement('a')
      a.setAttribute('download', 'Enquiry-History.png')
      a.setAttribute('href', image)
      a.click()
      canvas.remove()
    })
}

const btn = document.querySelector('#downloadBtn')
btn.addEventListener('click', capture)
</script>

 
 

   

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/enquiry/view.blade.php ENDPATH**/ ?>