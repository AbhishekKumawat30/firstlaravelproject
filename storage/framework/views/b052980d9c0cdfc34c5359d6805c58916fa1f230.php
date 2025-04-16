<?php $__env->startSection('content'); ?>

<?php
$getRole = DB::table('roles')->where('status', 1)->where('id', '!=', 8)->whereNull('deleted_at')->get();
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
                Creat User
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
                                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                                                
                                    <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                            Getting Started                                            </li>
                                        <!--end::Item-->
                                                
                            </ul>
                <!--end::Breadcrumb-->
            </div>
        <!--end::Page title-->
     
                </div>
                <!--end::Toolbar container-->
            </div>
        <!--end::Toolbar-->                                        

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Card-->
<div class="card">
   

    <!--begin::Card body-->
    <div class="card-body py-4">

<form id="kt_modal_add_user_form" class="form" action="<?php echo e(url('esh2/user/create')); ?>" enctype="multipart/form-data"  method="post" >
       <?php echo csrf_field(); ?>
                    <!--begin::Scroll-->
                    <div 
                        class="d-flex flex-column scroll-y px-5 px-lg-10" 
                        id="kt_modal_add_user_scroll" 
                        data-kt-scroll="true" 
                        data-kt-scroll-activate="true" 
                        data-kt-scroll-max-height="auto" 
                        data-kt-scroll-dependencies="#kt_modal_add_user_header" 
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" 
                        data-kt-scroll-offset="300px"
                    >
                    
                    <div class="row">

                        
                        <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Role</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select id="type" class="form-control form-control-solid mb-3 mb-lg-0" name="role_id">
                                <option value="">Select Role</option>
                                <?php if(!empty($getRole)): ?>
                                <?php $__currentLoopData = $getRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id ?? ''); ?>"><?php echo e($role->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Mobile</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="mobile" id="mobile" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile" value="" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="mobile2" id="mobile2" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile 2" value="" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Address</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address" value="" /></textarea>
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Remark</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="remark" id="remark" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remark" value="" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-md-3">
                       <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                            <!--end::Label-->

                            
                            <!--begin::Image placeholder-->
                            <style>
                            	.image-input-placeholder {
                            		background-image: url("<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image.svg'); ?>");
                            	}
                            
                            			[data-bs-theme="dark"] .image-input-placeholder {
                            			background-image: url("<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image-dark.svg'); ?>");
                            		}               
                            	</style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/avatars/300-6.jpg'); ?>);"></div>
                                <!--end::Preview existing avatar-->

                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" id="image" accept="" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->

                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                                </span>
                                <!--end::Cancel-->

                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        
                        
                        
                    </div> 
                      
                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3 " data-kt-users-modal-action="cancel">
                            Discard
                        </button>

                        <button type="button" class="btn btn-primary " id="submit_user" data-kt-users-modal-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>

<!--end::Table-->    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->        </div>
        <!--end::Content container-->

    </div>
</div>
<script>
$(document).ready(function(){
    
    $('#submit_user').click(function(){
    
        var userData = new FormData($("#kt_modal_add_user_form")[0]);
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    	    url: baseurl + '/esh2/user/create',
    	    method : 'post',
            data: userData,
            processData: false,
            contentType: false, 
    	    success: function(response){
                toastr.success('From submit');
            }
        });    
    
    });
});
</script>


      
    <!--begin::Vendors Javascript(used for this page only)-->
            <script src="<?php echo e(URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
        <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/user-management/users/list/table.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/user-management/users/list/export-users.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/user-management/users/list/add.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
        <!--end::Custom Javascript-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/esh2/user/createUser.blade.php ENDPATH**/ ?>