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
                Getting Started
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

    
        	<form id="customers_edit_form" action="#" method="post" enctype="multipart/form-data">
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
                                <label class="required fw-semibold fs-6 mb-2">Customer Status</label>
                                <!--end::Label-->
    
                                <!--begin::Input-->
                                <select id="clint_status" class="form-control form-control-solid mb-3 mb-lg-0" name="clint_status">
                                    <option value="1" >Confirm</option>
    								<option value="0" >Demo</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            </div>
                            
 <div class="col-md-3">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Customer Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Customer name" value="<?php echo e($data['name'] ?? ''); ?>" />
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
                            <input type="tel" name="mobile" id="mobile" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)" placeholder="Mobile" value="<?php echo e($data['mobile'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="mobile2" id="mobile2" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)" placeholder="Mobile 2" value="<?php echo e($data['mobile2'] ?? ''); ?>" />
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
                            <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="<?php echo e($data['email'] ?? ''); ?>" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Project Name</label>
                                <input type="text" name="project_name" id="project_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Project Name" value="<?php echo e($data['project_name'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Project Link</label>
                                <input type="text" name="project_link" id="project_link" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Project Link" value="<?php echo e($data['project_link'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Domain Name</label>
                                <input type="text" name="domain_name" id="domain_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Domain Name" value="<?php echo e($data['domain_name'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Project Mode</label>
                                <select id="project_mode" class="form-control form-control-solid mb-3 mb-lg-0" name="project_mode">
                                    <option value="">Select</option>
                                    <option value="1" <?php echo e(1 == old('project_mode', $data->project_mode) ? 'selected' : ''); ?>>Online</option>
                                    <option value="2" <?php echo e(2 == old('project_mode', $data->project_mode) ? 'selected' : ''); ?>>Offline</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Project Type</label>
                                <select id="project_type" class="form-control form-control-solid mb-3 mb-lg-0" name="project_type">
                                    <option value=""  <?php echo e(0 == old('project_type', $data->project_type) ? 'selected' : ''); ?>>Select</option>
                                    <option value="1" <?php echo e(1 == old('project_type', $data->project_type) ? 'selected' : ''); ?>>Website</option>
                                    <option value="2" <?php echo e(2 == old('project_type', $data->project_type) ? 'selected' : ''); ?>>School</option>
                                    <option value="3" <?php echo e(3 == old('project_type', $data->project_type) ? 'selected' : ''); ?>>APK</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Registration Date</label>
                                <input type="date" name="registration_date" id="registration_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="<?php echo e($data['registration_date'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Domain Expiry Date</label>
                                <input type="date" name="domain_expire_date" id="domain_expire_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="<?php echo e($data['domain_expire_date'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">AMC Date</label>
                                <input type="date" name="amc_date" id="amc_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="<?php echo e($data['emc_date'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">AMC Amount</label>
                                <input type="tel" name="amc_amount" id="amc_amount" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)" placeholder="AMC Amount" value="<?php echo e($data['amc_amount'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">State</label>
                                <select id="state_id" class="form-control form-control-solid mb-3 mb-lg-0" name="state_id">
                                    <option value="">Select</option>
                                    <?php if(!empty($getState)): ?>
                                    <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id ?? ''); ?>"  <?php echo e($state->id == old('state_id', $data->state_id) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">District</label>
                                <select id="city_id" class="form-control form-control-solid mb-3 mb-lg-0" name="city_id">
                                    <option value="">Select</option>
                                    <?php if(!empty($getCity)): ?> 
                                    <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e($cities->id == old('city_id', $data->city_id) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Student Count</label>
                                <input type="tel" name="student_count" id="student_count" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)" placeholder="Student Count" value="<?php echo e($data['student_count'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">User Count</label>
                                <input type="tel" name="user_count" id="user_count" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)" placeholder="User Count" value="<?php echo e($data['user_count'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Branch Count</label>
                                <input type="tel" name="branch_count" id="branch_count" class="form-control form-control-solid mb-3 mb-lg-0" onkeypress="javascript:return isNumber(event)"  placeholder="Branch Count" value="<?php echo e($data['branch_count'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">User Name</label>
                                <input type="text" name="userName" id="userName" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="User Name" value="<?php echo e($data['userName'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" value="<?php echo e($data['password'] ?? ''); ?>" />
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class=" fw-semibold fs-6 mb-2">Address</label>
                                <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address" value="<?php echo e($data['address'] ?? ''); ?>" /><?php echo e($data['address'] ?? ''); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                                <label class=" fw-semibold fs-6 mb-2">Plan Details</label>
                                <textarea name="plan_details" id="plan_details" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Plan Details" value="<?php echo e($data['plan_details'] ?? ''); ?>" /><?php echo e($data['plan_details'] ?? ''); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Remark</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="remark" id="remark" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remark" value="<?php echo e($data['remark'] ?? ''); ?>" /><?php echo e($data['remark'] ?? ''); ?></textarea>
                            <!--end::Input-->
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

                        <button type="button" id="editCustomer" class="btn btn-primary" data-kt-users-modal-action="submit">
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
    
    var customerId = '<?php echo e($data->id ?? ''); ?>';

    $('#editCustomer').click(function(){
    
        var formData = new FormData($("#customers_edit_form")[0]);
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    	    url: baseurl + '/esh2/customers/edit/' + customerId,
    	    method : 'post',
            data: formData,
            processData: false,
            contentType: false, 
    	    success: function(response){
                
                response.status == 1
                  ? Swal.fire({
                      text: "Customer New Details Updated Successfully!",
                      icon: "success",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    }).then(function (){
                        window.location.href = '/esh2/customers/list';
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
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/esh2/customers/edit.blade.php ENDPATH**/ ?>