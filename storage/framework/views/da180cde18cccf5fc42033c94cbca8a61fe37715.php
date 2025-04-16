
<?php $__env->startSection('content'); ?>
    <?php
        $getState = Helper::getState();
    ?>
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack ">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Add Started
                        </h1>

                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted"><a href="<?php echo e(url('esh2/inventery/add')); ?>" class="text-muted text-hover-primary">Home</a></li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Inventory</li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Add Started</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
                <div class="text-end mt-1">
                    <a href="<?php echo e(url('esh2/inventery/list')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-eye me-3"></i> View
                    </a>
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl ">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <form id="inventery_add_form" class="form" action="<?php echo e(url('esh2/inventery/add')); ?>" enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?> 
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Company</label>
                                            <select name="company" id="company" class="form-control form-control-solid mb-3 mb-lg-0 required">
                                                <option value="Select">Select</option>
                                                <option value="Rukmani">Rukmani</option>
                                                <option value="Tirupati">Tirupati</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Item Name</label>
                                            <input type="text" name="item_name" id="item_name" class="form-control form-control-solid mb-3 mb-lg-0 required" placeholder="Item Name" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Quantity Stock</label>
                                            <input type="tel" name="quantity_stock" id="quantity_stock" class="form-control form-control-solid mb-3 mb-lg-0 required" onkeypress="javascript:return isNumber(event)" placeholder="Quantity Stock" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Amount</label>
                                            <input type="tel" name="amount" id="amount" class="form-control form-control-solid mb-3 mb-lg-0 required" onkeypress="javascript:return isNumber(event)" placeholder="Amount" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Total Amount</label>
                                            <input type="tel" name="total_amount" id="total_amount" class="form-control form-control-solid mb-3 mb-lg-0 required" onkeypress="javascript:return isNumber(event)" placeholder="Total Amount" value="" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Available Stock</label>
                                            <input type="tel" name="available_stock" id="available_stock" class="form-control form-control-solid mb-3 mb-lg-0 required" onkeypress="javascript:return isNumber(event)" placeholder="Available Stock" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Date</label>
                                            <input type="date" name="date" id="date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="dd-mm-yyyy" value="" />
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
                                <button type="button" id="addInventery" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
    </div>

    <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            // Function to calculate Total Amount
            function calculateTotalAmount() {
                var quantityStock = $('#quantity_stock').val();
                var amount = $('#amount').val();
                if(quantityStock && amount) {
                    var totalAmount = parseFloat(quantityStock) * parseFloat(amount);
                    $('#total_amount').val(totalAmount.toFixed(2)); // Update Total Amount field
                } else {
                    $('#total_amount').val(''); // Clear the Total Amount field if input is invalid
                }
            }

            // Trigger calculation on input change
            $('#quantity_stock, #amount').on('input', function() {
                calculateTotalAmount();
            });

            $('#addInventery').click(function() {
                var formData = new FormData($("#inventery_add_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: baseurl + '/esh2/inventery/add',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 1) {
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/inventery/list';
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again. \n" + response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            });
                        }
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/inventery/add.blade.php ENDPATH**/ ?>