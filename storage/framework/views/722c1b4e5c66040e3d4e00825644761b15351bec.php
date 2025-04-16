<?php $__env->startSection('content'); ?>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Branch Started
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Branchs</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Branch Started</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="<?php echo e(url('esh2/branchs/list')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                    <i class="fa fa-eye me-3"></i> View
                </a>
            </div>
        </div>
        <!--end::Toolbar-->

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="branchs_add_form" class="form" action="<?php echo e(url('esh2/branchs/add')); ?>" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Branch Name</label>
                                        <input type="text" name="branch_name" id="branch_name" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Owner Name</label>
                                        <input type="text" name="owner_name" id="owner_name" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Branch Code</label>
                                        <input type="number" name="branch_code" id="branch_code" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Branch Code" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">GST Number</label>
                                        <input type="number" name="gst_no" id="gst_no" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="GST Number" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Mobile Number</label>
                                        <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Mobile Number" value=""/>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" required placeholder="Email" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Country</label>
                                        <select name="country" id="country" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                            <option value=""  selected>Select</option>
                                            <option value="India">India</option>
                                            <option value="Australia">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">State</label>
                                        <select name="state_id" id="state_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                            <option value=""  selected>Select</option>
                                            <option value="India">Rajasthan</option>
                                            <option value="delhi">delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">City</label>
                                        <select name="city_id" id="city_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                            <option value=""  selected>Select</option>
                                            <option value="Jaipur">Jaipur</option>
                                            <option value="Siker">Siker</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Pin Code</label>
                                        <input type="number" name="pin_code" id="pin_code" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Pin Code" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class=" fw-semibold fs-6 mb-2">Address</label>
                                        <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address" value="" /></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3">Discard</button>
                            <button type="button" id="addBranch" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    $('#addBranch').click(function() {
        let isValid = true;
        $('#branchs_add_form input[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid'); 
            } else {
                $(this).removeClass('is-invalid'); 
            }
        });

        if (!isValid) {
            toastr.error('Please fill in all required fields.', 'Validation Error', {
                positionClass: 'toast-top-right',
                closeButton: true,
                progressBar: true,
                timeOut: 3000
            });
            return; 
        }

        var formData = new FormData($("#branchs_add_form")[0]);
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            url: baseurl + '/esh2/branchs/add',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 1) {
                    Swal.fire({
                        text: "Branch has been successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn fw-bold btn-primary" },
                    }).then(function() {
                        window.location.href = "<?php echo e(url('esh2/branchs/list')); ?>"; 
                    });
                } else {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again. \n" + response.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn fw-bold btn-primary" },
                    });
                }
            }
        });
    });
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/branchs/add.blade.php ENDPATH**/ ?>