<?php $__env->startSection('content'); ?>

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
                Enquiry List
                    </h1>
            <!--end::Title-->
            </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
                
            
                    <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" id="xx" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span class="path2"></span></i>               
                        Filter
                    </a>
                    <!--end::Menu toggle-->
                    
                    
        
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-md-1000px" data-kt-menu="true" id="kt_menu_668a8650bc1bb" >
            <!--begin::Header-->
            <div class="px-7 py-5 d-flex">
                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
            </div>
            <!--end::Header-->
        
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->
            
        
            <!--begin::Form-->
            <div class="px-7 py-5">
                <form action="<?php echo e(url('esh2/enquiry/list')); ?>" method="post" class="row">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-10 col-md-3">
                        <label class="form-label fw-semibold">Select Data</label>
                        <select class="form-control form-select form-select-solid" data-kt-select2="true" id="rows" name="rows">
                            <option value="">Select</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                            <option value="1500">1500</option>
                            <option value="2000">2000</option>
                            <option value="2500">2500</option>
                            <option value="3000">3000</option>
                            <option value="3500">3500</option>
                            <option value="4000">4000</option>
                            <option value="4500">4500</option>
                            <option value="5000">5000</option>
                            <option value="5500">5500</option>
                            <option value="6000">6000</option>
                        </select>  
                    </div>
                    
                    <div class="mb-10 col-md-4">
                        <label class="form-label fw-semibold">Enquiry Type</label>
                        <div>
                            <select name="type[]" class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="1">Client</option>
                                <option value="2">Contact</option>
                                <option value="3">Office Visit</option>
                                <option value="4">Interview</option>
                                <option value="5">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-10 col-md-5">
                        <label class="form-label fw-semibold">Department</label>
                        <div>
                            <select name="department_id[]" class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="1">School</option>
                                <option value="2">Coaching</option>
                                <option value="3">Library</option>
                                <option value="4">Hostel</option>
                                <option value="5">Website</option>
                                <option value="6">CRM</option>
                                <option value="7">Custom</option>
                            </select>
                        </div>
                    </div>
                    <!--begin::Input group-->
                    <div class="mb-10 col-md-6">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold">Status:</label>
                        <!--end::Label-->
            
                        <!--begin::Input-->
                        <div>
                            <select name="responceStatus[]" class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                <?php if(!empty($enquiryStatus)): ?>
                                <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($enquStatus->id ?? ''); ?>"><?php echo e($enquStatus->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    
                    <div class="mb-10 col-md-6">
                        <label class="form-label fw-semibold">By User</label>
                        <div>
                            <select name="user_id[]" class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                <?php if(!empty($user)): ?>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($use->id ?? ''); ?>"><?php echo e($use->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    
                    <!--<div class="mb-10 col-md-6">-->
                    <!--    <label class="form-label fw-semibold">Custom Filter</label>-->
                    <!--    <div>-->
                    <!--        <select name="custom_filter" class="form-select form-select-solid" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">-->
                    <!--            <option value="">Select</option>-->
                    <!--            <option value="1">Total Organic Enquiry</option>-->
                    <!--            <option value="2">Today Reminders</option>-->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--<div class="mb-10 col-md-6">-->
                    <!--    <label class="form-label fw-semibold">labels</label>-->
                    <!--    <div class="d-flex">-->
                    <!--        <?php if(!empty($label)): ?>-->
                    <!--        <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--            <div class="form-check form-check-custom form-check-solid">-->
                    <!--                <input class="form-check-input pointer" name="labes[]" type="checkbox" value="<?php echo e($labes->id ?? ''); ?>" style="border-radius:50%; background-color : <?php echo e($labes->color ?? ''); ?>"/>-->
                    <!--            </div> &nbsp; &nbsp; &nbsp; -->
                    <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <!--        <?php endif; ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary" >Apply</button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->        </div>
                <!--end::Filter menu-->
            
            
            <!--begin::Secondary button-->
                <!--end::Secondary button-->
            
            <!--begin::Primary button-->
                    <button class="d-flex btn btn-sm fw-bold btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_add_enquiry">
                    <i class="ki-duotone ki-plus fs-2"></i> Add        </button>
                <!--end::Primary button-->
        </div>
        <!--end::Actions-->
            
                
                </div>
                <!--end::Toolbar container-->
             
            </div>
        <!--end::Toolbar-->                                        
                <div class="align-items-center gap-2 gap-lg-3 p-3" style="overflow-x:scroll; width:auto; display:-webkit-inline-box;">
                    <form action="<?php echo e(url('esh2/enquiry/list')); ?>" method="post" class="align-content-center">
                        <?php echo csrf_field(); ?>
                    <button name="custom_filter" value="1" type="submit" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-info">Total Organic Leads</button> 
                    </form> &nbsp; 
                    <form action="<?php echo e(url('esh2/enquiry/list')); ?>" method="post" class="align-content-center">
                        <?php echo csrf_field(); ?>
                    <button name="custom_filter" value="2" type="submit" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Today Reminers</button> 
                    </form>&nbsp;  &nbsp;
                         

                        <?php if(!empty($label)): ?>
                        <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labelsearch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $labelCount = DB::table('enquiry_labels')->where('user_id', Session::get('id'))->whereRaw('FIND_IN_SET(?, label_id)', [$labelsearch->id])->whereNull('deleted_at')->count();
                            ?>
                            <form action="<?php echo e(url('esh2/enquiry/list')); ?>" method="post" class="align-content-center">
                                <?php echo csrf_field(); ?>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input type="hidden" name="labelsearch" value="<?php echo e($labelsearch->id ?? ''); ?>">
                                    <button type="submit" class="form-check-input pointer text-white" style="border-radius:50%; background-color : <?php echo e($labelsearch->color ?? ''); ?>"/><?php echo e($labelCount ?? ''); ?></button>
                                </div>  
                            </form>&nbsp; &nbsp; &nbsp;
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                </div>  
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl " style="padding : 0 !important">
            <!--begin::Card-->
<div class="card">
    <!--begin::Card header-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_enquiry" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Enquiry</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-enquiry-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_enquiry_form" class="form" action="#" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div 
                        class="scroll-y px-5 px-lg-10 row" 
                        id="kt_modal_add_user_scroll" 
                        data-kt-scroll="true" 
                        data-kt-scroll-activate="true" 
                        data-kt-scroll-max-height="auto" 
                        data-kt-scroll-dependencies="#kt_modal_add_user_header" 
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" 
                        data-kt-scroll-offset="300px"
                    >
                        <!--begin::Input group-->
                        
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Enquiry Type</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select id="type" class="form-control form-control-solid mb-3 mb-lg-0" name="type">
                                <option value="1">Client</option>
                                <option value="2">Contact</option>
                                <option value="3">Office Visit</option>
                                <option value="4">Interview</option>
                                <option value="5">Other</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-3">
                            <label class=" fw-semibold fs-6 mb-2">Department</label>
                            <select id="department_id" class="form-control form-select form-select-solid mb-3 mb-lg-0" name="department_id" >
                                <option value="">Select</option>
                                <option value="1">School</option>
                                <option value="2">Coaching</option>
                                <option value="3">Library</option>
                                <option value="4">Hostel</option>
                                <option value="5">Website</option>
                                <option value="6">CRM</option>
                                <option value="7">Custom</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        
                        <!--end::Input group-->
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Mobile</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="mobile" id="mobile" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile" value="" onkeypress="javascript:return isNumber(event)" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="mobile2" id="mobile2" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile 2" value="" onkeypress="javascript:return isNumber(event)" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Address</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address" value="" /></textarea>
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Remark</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="remark" id="remark" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remark" value="" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Reminder Date</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="datetime-local" name="reminder_date" id="reminder_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Reminder Date" value="" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="message" id="message" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Reminder Message" value="" /></textarea>
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7 col-md-6">
                            <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                            <select id="responce_status_id" class="form-control form-control-solid mb-3 mb-lg-0" name="responce_status_id">
                                <option value="0">Select</option>
                                <?php if(!empty($enquiryStatus)): ?>
                                <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($enStat->id ?? ''); ?>"><?php echo e($enStat->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        
                       <div class="fv-row mb-7 col-md-6">
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
                        
                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-enquiry-modal-action="cancel">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-enquiry-modal-action="submit">
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
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->       
        <!--end::Card toolbar-->
    

    <!--begin::Card body-->
    <div class="card-body py-4">
        <input type="text" id="myInput" class="form-control" placeholder="Search for names.." title="Search for names.." width="100%">
        <!--begin::Table-->
        
        
        
        
        
        
        
        
        
        
        
        
        <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
            <div id="" class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-middle table-row-dashed fs-7 dataTable" style="width: 1199.5px;" id="enquiryTable">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="">Action</th>
                            <th class="w-10px">Sr</th>
                            <th class="">Name</th>
                            <th class="">Mobile</th>
                            <th class="">Address</th>
                            <th class="">Reminder</th>
                            <th class="">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" id="tableBody">
                    <?php if(!empty($enquiry)): ?>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $enqStatus = $enquiryStatus->where('id', $enq->responce_status_id)->first();
                                $user = DB::table('users')->where('id', $enq->user_id)->whereNull('deleted_at')->get('name')->first();
                                $myLabel = DB::table('enquiry_labels')->where('enquiry_id', $enq->id)->where('user_id', Session::get('id'))->whereNull('deleted_at')->first();
                                $findLabel = !empty($myLabel) ? $myLabel->label_id : '';
                                $explodeLabel = !empty($findLabel) ? explode(',', $findLabel) : '';
                            ?>
                        
                        <tr data-id="<?php echo e($enq->id ?? ''); ?>" class="enquiryTr">
                            
                            <td class="pt-0 d-flex">  
                                <?php if(Session::get("role_id") == 1): ?> 
                                    <button class="btn btn btn-icon btn-danger me-2 mb-2 btn-outline btn-outline-dashed btn-outline-danger deleteEnquiry" data-info='<?php echo e($enq ?? ''); ?>'><i class="ki-duotone ki-trash"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span> <span class="path5"></span></i></button>
                                <?php endif; ?> 
                                <button class="btn btn btn-icon btn-info me-2 mb-2 btn-outline btn-outline-dashed btn-outline-info pulse pulse-info editEnquiry" data-info='<?php echo e($enq ?? ''); ?>' data-label="<?php echo e($findLabel ?? ''); ?>"><i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i><span class="pulse-ring"></span></button>
                            </td>
                            <td class="pt-0"><?php echo e($i++); ?></td>
                            <td class="pt-0 d-flex align-items-center"><div class="symbol symbol-circle symbol-50px overflow-hidden me-3"><a class="text-dark" target="blank" href="https://web.rusoft.in/esh2/enquiry/view/<?php echo e($enq->id ?? ''); ?>">
                                <?php if(!empty($enq->image)): ?>
                                    <div class="symbol-label"><img src="<?php echo e(env('IMAGE_SHOW_PATH') . 'esh2/enquiry/' . $enq->image); ?>" alt="Enquiry Image" class="w-100" /></div>
                                <?php else: ?>
                                    <div class="symbol-label fs-3 bg-light-danger text-danger"><?php echo e($enq->name[0] ?? ''); ?></div>
                                <?php endif; ?>
                                </a></div>
                                <div class="d-flex flex-column"><small><?php echo e($enq->name ?? ''); ?></small>
                                <?php if($enq->department_id == 1): ?>
                                    <span class="badge badge-light-success">School</span>
                                <?php elseif($enq->department_id == 2): ?>
                                    <span class="badge badge-light-info">Coaching</span>
                                <?php elseif($enq->department_id == 3): ?>
                                    <span class="badge badge-light-warning">Library</span>
                                <?php elseif($enq->department_id == 4): ?>
                                    <span class="badge badge-light-danger">Hostel</span>
                                <?php elseif($enq->department_id == 5): ?>
                                    <span class="badge badge-light-primary">Website</span>
                                <?php elseif($enq->department_id == 6): ?>
                                    <span class="badge badge-light-secondary">CRM</span>
                                <?php elseif($enq->department_id == 7): ?>
                                    <span class="badge badge-light-dark">Custom</span>
                                <?php else: ?>
                                <?php endif; ?>
                                </div>
                                <?php if(!empty($explodeLabel) && count($explodeLabel) > 0): ?>
                                <?php $__currentLoopData = $explodeLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $labelTable = DB::table('labels')->where('id', $lab)->where('status', 1)->whereNull('deleted_at')->first();
                                    ?>
                                  
                                    <i class="ki-duotone ki-flag fs-1" style="color : <?php echo e($labelTable->color ?? ''); ?>"><span class="path1"></span><span class="path2"></span></i>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                            <td class="pt-0"><small><a href="tel://<?php echo e($enq->mobile ?? ''); ?>"><?php echo e($enq->mobile ?? ''); ?></a> <br><a href="tel://<?php echo e($enq->mobile2 ?? ''); ?>"><?php echo e($enq->mobile2 ?? ''); ?></a> &nbsp; <a href="mailto:<?php echo e($enq->email ?? ''); ?>"><?php echo e($enq->email ?? ''); ?></a> Created : <?php echo e(date('d M Y', strtotime($enq->created_at))); ?></small></td>
                            <td class="pt-0"><small><?php echo e($enq->address ?? ''); ?></small></td>
                            <td class="pt-0 text-gray-800"><small><?php echo e(date('d-m-Y, h:i A', strtotime($enq->reminder_date)) ?? ''); ?><hr class="m-0"><span class="text-primary"><?php echo e($enq->message ?? ''); ?></span></small></td>
                            <td class="pt-0"><small><div class="badge badge-<?php echo e($enqStatus->color ?? ''); ?> fw-bold"><?php echo e($enqStatus->name ?? ''); ?></div><br> <?php if(date('Y-m-d', strtotime($enq->updated_at)) == date('Y-m-d')): ?> <span class="badge badge-light-success">Today <?php echo e(date('h:i A', strtotime($enq->updated_at))); ?></span>  <?php elseif(date('Y-m-d', strtotime($enq->updated_at)) == date('Y-m-d', strtotime("-1 days"))): ?> <span class="badge badge-light-warning">Yesterday <?php echo e(date('h:i A', strtotime($enq->updated_at))); ?></span> <?php else: ?> <?php echo e(date('l, d-m-Y, h:i A', strtotime($enq->updated_at))); ?> <?php endif; ?> | <?php echo e($user->name ?? ''); ?> </small></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>                    
                    
                </table>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        <!--end::Table-->    
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->        </div>
        <!--end::Content container-->

    </div>
</div>



<div class="modal fade" id="kt_modal_edit_enquiry" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Enquiry</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-enquiry-edit-modal-action="close" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_edit_enquiry_form" class="form" action="#" enctype="multipart/form-data">
                    <input type="hidden" id="enquiryId">
                    <!--begin::Scroll-->
                    <div 
                        class="scroll-y px-5 px-lg-10 row" 
                        id="kt_modal_add_user_scroll" 
                        data-kt-scroll="true" 
                        data-kt-scroll-activate="true" 
                        data-kt-scroll-max-height="auto" 
                        data-kt-scroll-dependencies="#kt_modal_add_user_header" 
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" 
                        data-kt-scroll-offset="300px"
                    >
                        <!--begin::Input group-->
                        
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Enquiry Type</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select id="enquiryType" class="form-control form-control-solid mb-3 mb-lg-0" name="type">
                                <option value="1">Client</option>
                                <option value="2">Contact</option>
                                <option value="3">Office Visit</option>
                                <option value="4">Interview</option>
                                <option value="5">Other</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-3">
                            <label class=" fw-semibold fs-6 mb-2">Department</label>
                            <select id="enquiryDepartment_id" class="form-control form-control-solid mb-3 mb-lg-0" name="department_id">
                                <option value="">Select</option>
                                <option value="1">School</option>
                                <option value="2">Coaching</option>
                                <option value="3">Library</option>
                                <option value="4">Hostel</option>
                                <option value="5">Website</option>
                                <option value="6">CRM</option>
                                <option value="7">Custom</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        
                        <!--end::Input group-->
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Mobile</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="mobile" id="enquiryMobile" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile" value="" onkeypress="javascript:return isNumber(event)" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-3">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="tel" name="mobile2" id="enquiryMobile2" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile 2" value="" onkeypress="javascript:return isNumber(event)" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" id="enquiryName" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="email" name="email" id="enquiryEmail" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Address</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="address" id="enquiryAddress" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address" value="" /></textarea>
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Remark</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="remark" id="enquiryRemark" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remark" value="" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Reminder Date</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="datetime-local" name="reminder_date" id="enquiryReminder_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Reminder Date" value="" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
                            <!--begin::Label-->
                            <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea name="message" id="enquiryMessage" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Reminder Message" value="" /></textarea>
                            <!--end::Input-->
                        </div>
                       
                        <div class="fv-row mb-7 col-md-6">
                            <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                            <select id="enquiryResponce_status_id" class="form-control form-control-solid mb-3 mb-lg-0" name="responce_status_id">
                                <option value="0">Select</option>
                                <?php if(!empty($enquiryStatus)): ?>
                                <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($enStatus->id ?? ''); ?>"><?php echo e($enStatus->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        
                        <div class="fv-row mb-7 col-md-6">
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
                                    <input type="file" name="enquiryImage" id="enquiryImage" accept="" />
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
                        
                        <div class="fv-row mb-7 col-md-6 d-flex">
                            <label class=" fw-semibold fs-6 mb-2">Mark Label</label> &nbsp; &nbsp; &nbsp; 

                            <?php if(!empty($label)): ?>
                            <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input pointer" name="label[]" id="checkLabel_<?php echo e($lab->id ?? ''); ?>" type="checkbox" value="<?php echo e($lab->id ?? ''); ?>" style="border-radius:50%; background-color : <?php echo e($lab->color ?? ''); ?>"/>
                                </div> &nbsp; &nbsp; &nbsp; 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-enquiry-edit-modal-action="close" data-bs-dismiss="modal">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-enquiry-edit-modal-action="submit">
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
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>


<script>
$(document).ready(function(){
 
    // var allDataLoaded = false; // Flag to check if all data is loaded
    // var requestTimeout = 60000; // 10 seconds timeout (in milliseconds)
    // var loadedIds = []; // Array to keep track of loaded IDs
    

    // function ShowEnquiryList() {
    //     if (allDataLoaded) {
    //         return; // Stop if all data is loaded
    //     }

    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    //         url: hostUrl + '/esh2/enquiry/list',
    //         method: 'post',
    //         data: { loaded_ids: loadedIds },
    //         timeout: requestTimeout, // Set the timeout duration
    //         success: function(data) {
                
    //                 $('#enquiryTable').append(data);
    //                 // Extract and store the IDs of the newly loaded rows
    //                 $(data).find('.enquiryTr').each(function() {
    //                     loadedIds.push($(this).data('id')); // Assuming each row has a data-id attribute
    //                 });
    //                 if ($(data).find('.enquiryTr').length === 0) {
    //                     alert('All data has been loaded.');
    //                     allDataLoaded = true;
    //                 } else {
    //                     ShowEnquiryList(); // Load more posts
    //                 }
                
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Failed to load enquiry. Please try again.\nError: ' + textStatus + '\nDetails: ' + errorThrown);
    //         }
    //     });
    // }

    // Initial load
    //ShowEnquiryList();    
    
    
    // function ShowEnquiryList() {
    //     // if (loading) return;
    //     // loading = true;
    //     //$('.table-responsive').css('filter','blur(1px)');
    //     var loadedTr = '';
        
        
    //     $.ajax({
    //             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    //         type:'post',
    //         url: hostUrl + '/esh2/enquiry/list',
    //         data: {name:1, last_id: loadedTr},
    //         success: function (data) {
    //             // if (data.trim() === '' || data.no_more_data) {
    //             //     toastr.info('All data has been loaded.');
    //             //     // No more data to load, stop further AJAX calls
    //             //     loading = false;
    //             //     return;
    //             // }
    //             $('.table-responsive').css('filter','blur(0px)');
    //             $('#kt_table_enquiry').append(data);
    //             $('.loadedTr').each(function(){
    //                 loadedTr = loadedTr + ',' + $(this).data('id');
    //             });
    //             toastr.info('Shinu');
    //             ShowEnquiryList();
    //         }
    //         // complete: function() {
    //         //     loading = false; // Reset loading state
    //         // }
    //     });
    // }
});
</script>
      
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
        <!--end::Global Javascript Bundle-->

                    <!--begin::Vendors Javascript(used for this page only)-->
                            <script src="<?php echo e(URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
                        <!--end::Vendors Javascript-->
                    
        
                    <!--begin::Custom Javascript(used for this page only)-->
                            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/table.js')); ?>"></script>
                            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/export-users.js')); ?>"></script>
                            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/add.js')); ?>"></script>
                            <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/edit.js')); ?>"></script>
                            <script src="<?php echo e(URL::asset('public/assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
                        <!--end::Custom Javascript-->
                      
    
<script>
$(document).ready(function(){

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // $("#enquiryReminder_date").flatpickr({
    //     enableTime: true,
    //     dateFormat: "Y-m-d H:i",
    // });
    
    $('.editEnquiry').click(function(){
        var dataInfo = $(this).data('info');
        var label = $(this).data('label');
     
        $('#enquiryId').val(dataInfo.id);
        $('#enquiryName').val(dataInfo.name);
        $('#enquiryMobile').val(dataInfo.mobile);
        $('#enquiryMobile2').val(dataInfo.mobile2);
        $('#enquiryEmail').val(dataInfo.email);
        $('#enquiryDepartment_id').val(dataInfo.department_id);
        $('#enquiryAddress').val(dataInfo.address);
        $('#enquiryRemark').val(dataInfo.remark);
        //$('#enquiryReminder_date').val(dataInfo.reminderDate);
        //$('#enquiryMessage').val(dataInfo.message);
        $('#enquiryResponce_status_id').val(dataInfo.responce_status_id);
        $('#enquiryType').val(dataInfo.type);
        $('#kt_modal_edit_enquiry').modal('show');
        
        if(label != null){
            var checkLabel = label.split(',');
            checkLabel.forEach(function(value, index){
                $('#checkLabel_' + value).attr('checked', true);
            });
        } 
    });



        $('.deleteEnquiry').click(function () {
            var deleteData = $(this).data('info');
            var deleteId = deleteData.id;
          Swal.fire({
            text: "Are you sure you want to delete selected enquiry?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
              confirmButton: "btn fw-bold btn-danger",
              cancelButton: "btn fw-bold btn-active-light-primary",
            },
          }).then(function (t) {
            t.value
            ? $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    	    url: baseurl + '/esh2/enquiry/delete',
    	    method : 'post',
            data: {deleteId : deleteId},
    	    success: function(response){
    	    
                response.status == 1
                  ? Swal.fire({
                      text: "You have deleted selected enquiry!.",
                      icon: "success",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    }).then(function (){
                        window.location.reload();
                    })
                  : "cancel" === t.dismiss &&
                    Swal.fire({
                      text: "Selected enquiry was not deleted. \n" + response.message,
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    });
    	    }
            })
            : "cancel" === t.dismiss &&
                    Swal.fire({
                      text: "Selected enquiry was not deleted.",
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: { confirmButton: "btn fw-bold btn-primary" },
                    });
          });
        });    
});
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/esh2/enquiry/list.blade.php ENDPATH**/ ?>