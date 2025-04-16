<?php $__env->startSection('content'); ?>
<?php
$getState = Helper::getState();
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
                Expense Started
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
                                                            Expenses                                            </li>
                                        <!--end::Item-->
                                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                                                
                                    <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                            Expense Started                                            </li>
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

    
        	<form id="expense_edit_form" action="<?php echo e(url('/esh2/expense/edit/{id}')); ?>" method="post" enctype="multipart/form-data">
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
                                <label class="required fw-semibold fs-6 mb-2">Form Date</label>
                                <!--end::Label-->
    
                                <!--begin::Input-->
                                <input type="date" name="form_date" id="form_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="form_date" value="<?php echo e($data['form_date'] ?? ''); ?>" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            </div>
                            
 <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">To Date</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="date" name="to_date" id="to_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Expense to_date" value="<?php echo e($data['to_date'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">User Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="user_name" id="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="user_name" value="<?php echo e($data['user_name'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Expense Date</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="expense_date" id="expense_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="expense_date" value="<?php echo e($data['expense_date'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Pay Status</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="pay_status" id="pay_status" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Pay Status" value="<?php echo e($data['pay_status'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="d-block fw-semibold fs-6 mb-5">Project Avatar</label>
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
                        </div>                        
                         <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="d-block fw-semibold fs-6 mb-5">Invoice Upload</label>
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
                                    <input type="file" name="invoiceimage" id="invoiceimage" accept="" />
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
                        </div> 
                    </div> 
                      
                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                            Discard
                        </button>

                        <button type="button" id="editExpense" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">
                                Update
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

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
        <!--end::Global Javascript Bundle-->
      

<script>
$(document).ready(function(){
    
    var expenseId = '<?php echo e($data->id ?? ''); ?>';

    $('#editExpense').click(function(){
    
        var formData = new FormData($("#expenses_edit_form")[0]);
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    	    url: baseurl + 'esh2/expense/edit/{id}' + expenseId,
    	    method : 'post',
            data: formData,
            processData: false,
            contentType: false, 
    	    success: function(response){
                
                response.status == 1
                  ? Swal.fire({
                      text: "Expense New Details Updated Successfully!",
                      icon: "success",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    }).then(function (){
                        window.location.href = '/esh2/expenses/list';
                    })
                  : "cancel" === t.dismiss &&
                    Swal.fire({
                      text: "Sorry, looks like there are some errors detected, please try again. \n" + response.message,
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    });
            }
        });    
    
    });
});
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/expense/edit.blade.php ENDPATH**/ ?>