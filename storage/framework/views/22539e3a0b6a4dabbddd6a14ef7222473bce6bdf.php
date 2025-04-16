<?php $__env->startSection('content'); ?>

    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Homeslider List
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">


                        <!--begin::Filter menu-->
                        <div class="m-0">
                            <!--begin::Menu toggle-->
                            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" id="xx"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                                Filter
                            </a>
                            <!--end::Menu toggle-->



                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-md-1000px" data-kt-menu="true"
                                id="kt_menu_668a8650bc1bb">
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
                                    <form action="<?php echo e(url('esh2/homeslider/list')); ?>" method="post" class="row">
                                        <?php echo csrf_field(); ?>

                                        <div class="mb-10 col-md-3">
                                            <label class="form-label fw-semibold">Select Data</label>
                                            <select class="form-control form-select form-select-solid"
                                                data-kt-select2="true" id="rows" name="rows">
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
                                            <label class="form-label fw-semibold">Certificate Type</label>
                                            <div>
                                                <select name="type[]" class="form-select form-select-solid" multiple
                                                    data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
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
                                                <select name="department_id[]" class="form-select form-select-solid"
                                                    multiple data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
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
                                                <select name="responceStatus[]" class="form-select form-select-solid"
                                                    multiple data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    <?php if(!empty($enquiryStatus)): ?>
                                                        <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($enquStatus->id ?? ''); ?>">
                                                                <?php echo e($enquStatus->name ?? ''); ?></option>
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
                                                <select name="user_id[]" class="form-select form-select-solid" multiple
                                                    data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    <?php if(!empty($user)): ?>
                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($use->id ?? ''); ?>"><?php echo e($use->name ?? ''); ?>

                                                            </option>
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
                                        <!--        <?php if(!empty($label)): ?>
    -->
                                        <!--        <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    -->
                                        <!--            <div class="form-check form-check-custom form-check-solid">-->
                                        <!--                <input class="form-check-input pointer" name="labes[]" type="checkbox" value="<?php echo e($labes->id ?? ''); ?>" style="border-radius:50%; background-color : <?php echo e($labes->color ?? ''); ?>"/>-->
                                        <!--            </div> &nbsp; &nbsp; &nbsp; -->
                                        <!--
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                        <!--
    <?php endif; ?>-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                        </div>
                        <!--end::Filter menu-->


                        <!--begin::Secondary button-->
                        <!--end::Secondary button-->

                        <!--begin::Primary button-->
                        <a href="<?php echo e(url('esh2/homeslider/add')); ?>" class="d-flex btn btn-sm fw-bold btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i> Add </a>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->


                </div>
                <!--end::Toolbar container-->

            </div>
            <!--end::Toolbar-->
            <div class="align-items-center gap-2 gap-lg-3 p-3"
                style="overflow-x:scroll; width:auto; display:-webkit-inline-box;">
                <form action="<?php echo e(url('esh2/homeslider/list')); ?>" method="post" class="align-content-center">
                    <?php echo csrf_field(); ?>
                    <button name="custom_filter" value="1" type="submit"
                        class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-info">Total Organic
                        Leads</button>
                </form> &nbsp;
                <form action="<?php echo e(url('esh2/homeslider/list')); ?>" method="post" class="align-content-center">
                    <?php echo csrf_field(); ?>
                    <button name="custom_filter" value="2" type="submit"
                        class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Today
                        Reminers</button>
                </form>&nbsp; &nbsp;


                <?php if(!empty($label)): ?>
                    <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labelsearch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $labelCount = DB::table('enquiry_labels')
                                ->where('user_id', Session::get('id'))
                                ->whereRaw('FIND_IN_SET(?, label_id)', [$labelsearch->id])
                                ->whereNull('deleted_at')
                                ->count();
                        ?>
                        <form action="<?php echo e(url('esh2/homeslider/list')); ?>" method="post" class="align-content-center">
                            <?php echo csrf_field(); ?>
                            <div class="form-check form-check-custom form-check-solid">
                                <input type="hidden" name="labelsearch" value="<?php echo e($labelsearch->id ?? ''); ?>">
                                <button type="submit" class="form-check-input pointer text-white"
                                    style="border-radius:50%; background-color : <?php echo e($labelsearch->color ?? ''); ?>" /><?php echo e($labelCount ?? ''); ?></button>
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
                                    <h2 class="fw-bold">Add Homeslider</h2>
                                    <!--end::Modal title-->

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-enquiry-modal-action="close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->

                                <!--begin::Modal body-->
                                <div class="modal-body px-5 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_enquiry_form" class="form" action="#"
                                        enctype="multipart/form-data">
                                        <!--begin::Scroll-->
                                        <div class="scroll-y px-5 px-lg-10 row" id="kt_modal_add_user_scroll"
                                            data-kt-scroll="true" data-kt-scroll-activate="true"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                            data-kt-scroll-offset="300px">
                                            <!--begin::Input group-->

                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 col-md-3">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Homeslider Type</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <select id="type"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" name="type">
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
                                                <select id="department_id"
                                                    class="form-control form-select form-select-solid mb-3 mb-lg-0"
                                                    name="department_id">
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

                                            <div class="fv-row mb-7 col-md-6">
                                                <!--begin::Label-->
                                                <label class=" fw-semibold fs-6 mb-2">Reminder Date</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="datetime-local" name="reminder_date" id="reminder_date"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Reminder Date" value="" />
                                                <!--end::Input-->
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <!--begin::Label-->
                                                <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <textarea name="message" id="message" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Reminder Message" value="" /></textarea>
                                                <!--end::Input-->
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                                                <select id="responce_status_id"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    name="responce_status_id">
                                                    <option value="0">Select</option>
                                                    <?php if(!empty($enquiryStatus)): ?>
                                                        <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($enStat->id ?? ''); ?>">
                                                                <?php echo e($enStat->name ?? ''); ?></option>
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
                                                <div class="image-input image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/avatars/300-6.jpg'); ?>);">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image" id="image"
                                                            accept="" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
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
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-enquiry-modal-action="cancel">
                                                Discard
                                            </button>

                                            <button type="submit" class="btn btn-primary"
                                                data-kt-enquiry-modal-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
                        <input type="text" id="myInput" class="form-control" placeholder="Search for names.."
                            title="Search for names.." width="100%">
                        <!--begin::Table-->












                        <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="" class="table-responsive">
                                <table
                                    class="table table-hover table-striped table-bordered align-middle table-row-dashed fs-7 dataTable"
                                    style="width: 1199.5px;" id="enquiryTable">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="">Action</th>
                                            <th class="w-10px">Sr. No.</th>
                                            <th class="">Name</th>
                                            <th class="">Photo</th>
                                            <th class="">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tableBody">
                                        <?php if(!empty($data)): ?>
                                            <?php
                                                $i = 1;
                                            ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($enq->id ?? ''); ?>" class="enquiryTr">

                                                    <td class="pt-0 d-flex">

                                                        <!-- Edit Button -->
                                                        <a target="_blank"
                                                            href="<?php echo e(url('esh2/homeslider/edit')); ?>/<?php echo e($enq->id); ?>"
                                                            class="btn btn-icon btn-info me-2 mb-2 btn-outline btn-outline-dashed btn-outline-info pulse pulse-info">
                                                            <i class="ki-duotone ki-pencil fs-7"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                            <span class="pulse-ring"></span>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="<?php echo e(url('esh2/homeslider/delete/' . $enq->id)); ?>"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this Homeslider?');">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit"
                                                                class="btn btn-icon btn-danger mb-2 btn-outline btn-outline-dashed btn-outline-danger pulse pulse-danger">
                                                                <i class="ki-duotone ki-trash fs-7"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i>
                                                                <span class="pulse-ring"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="pt-0"><?php echo e($i++); ?></td>
                                                    <td class="pt-0 align-items-center">

                                                        <?php echo e($enq->name ?? ''); ?> <br> <small>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo e(env('IMAGE_SHOW_PATH') . 'esh2/homeslider/' . $enq->photo); ?>"
                                                            alt="Enquiry Image" style="width: 100px; height: 100px;" />
                                                    </td>
                                                    <td>
                                                        <?php if($enq->status == 1): ?>
                                                            <button data-bs-toggle="modal" data-bs-target="#statusModal"
                                                                data-id="<?php echo e($enq['id'] ?? ''); ?>"
                                                                class="btn btn-light-success w-70 btn btn-primary btn-sm Status"
                                                                data-status="0">Active</button>
                                                        <?php else: ?>
                                                            <button data-bs-toggle="modal" data-bs-target="#statusModal"
                                                                data-id="<?php echo e($enq['id'] ?? ''); ?>"
                                                                class="btn btn-light-danger w-70 btn btn-primary btn-sm Status"
                                                                data-status="1">Inactive</button>
                                                        <?php endif; ?>
                                                    </td>


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
                <!--end::Card-->
            </div>
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
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-enquiry-edit-modal-action="close"
                        data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body px-5 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_edit_enquiry_form" class="form" action="#" enctype="multipart/form-data">
                        <input type="hidden" id="enquiryId">
                        <!--begin::Scroll-->
                        <div class="scroll-y px-5 px-lg-10 row" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Enquiry Type</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <select id="enquiryType" class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="type">
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
                                <select id="enquiryDepartment_id" class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="department_id">
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












                            <div class="fv-row mb-7 col-md-6">
                                <!--begin::Label-->
                                <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <textarea name="message" id="enquiryMessage" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Reminder Message" value="" /></textarea>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                                <select id="enquiryResponce_status_id"
                                    class="form-control form-control-solid mb-3 mb-lg-0" name="responce_status_id">
                                    <option value="0">Select</option>
                                    <?php if(!empty($enquiryStatus)): ?>
                                        <?php $__currentLoopData = $enquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($enStatus->id ?? ''); ?>"><?php echo e($enStatus->name ?? ''); ?>

                                            </option>
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
                                <div class="image-input image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url(<?php echo e(env('IMAGE_SHOW_PATH') . 'assets/media/avatars/300-6.jpg'); ?>);">
                                    </div>
                                    <!--end::Preview existing avatar-->

                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="enquiryImage" id="enquiryImage" accept="" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                    <!--end::Cancel-->

                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
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
                                            <input class="form-check-input pointer" name="label[]"
                                                id="checkLabel_<?php echo e($lab->id ?? ''); ?>" type="checkbox"
                                                value="<?php echo e($lab->id ?? ''); ?>"
                                                style="border-radius:50%; background-color : <?php echo e($lab->color ?? ''); ?>" />
                                        </div> &nbsp; &nbsp; &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                        <!--end::Scroll-->

                        <!--begin::Actions-->
                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-enquiry-edit-modal-action="close"
                                data-bs-dismiss="modal">
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




    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="<?php echo e(URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <!--end::Vendors Javascript-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/table.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/export-users.js')); ?>">
    </script>
    <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/add.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/edit.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
    <!--end::Custom Javascript-->


    <script>
        $(document).ready(function() {

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

            $('.editEnquiry').click(function() {
                var dataInfo = $(this).data('info');

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

                if (dataInfo.label != null) {
                    var checkLabel = dataInfo.label.split(',');
                    checkLabel.forEach(function(value, index) {
                        $('#checkLabel_' + value).attr('checked', true);
                    });
                }
            });



            $('.deleteEnquiry').click(function() {
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
                }).then(function(t) {
                    t.value ?
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: baseurl + '/esh2/enquiry/delete',
                            method: 'post',
                            data: {
                                deleteId: deleteId
                            },
                            success: function(response) {

                                response.status == 1 ?
                                    Swal.fire({
                                        text: "You have deleted selected enquiry!.",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary"
                                        },
                                    }).then(function() {
                                        window.location.reload();
                                    }) :
                                    "cancel" === t.dismiss &&
                                    Swal.fire({
                                        text: "Selected enquiry was not deleted. \n" +
                                            response.message,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary"
                                        },
                                    });
                            }
                        }) :
                        "cancel" === t.dismiss &&
                        Swal.fire({
                            text: "Selected enquiry was not deleted.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            },
                        });
                });
            });
            // Status Ajax Start

            $('.Status').click(function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                // Show confirmation alert
                Swal.fire({
                    text: "Are you sure you want to change the status of the selected data?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, change!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn btn-sm fw-bold btn-danger",
                        cancelButton: "btn btn-sm fw-bold btn-active-light-primary",
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with AJAX if the user confirmed
                        let formData = {
                            status_id: status,
                            id: id
                        };
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: "<?php echo e(url('esh2/homeslider/statusChange')); ?>",
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                if (response.success) {
                                    let btn = $('button[data-id="' + response.id +
                                    '"]');
                                    if (response.status == 1) {
                                        btn.removeClass('btn-light-danger').addClass(
                                                'btn-light-success').text('Active')
                                            .data('status', 0);
                                    } else {
                                        btn.removeClass('btn-light-success').addClass(
                                                'btn-light-danger').text('Inactive')
                                            .data('status', 1);
                                    }
                                    $('#statusModal').modal('hide');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
            // Status Ajax End
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/homeslider/list.blade.php ENDPATH**/ ?>