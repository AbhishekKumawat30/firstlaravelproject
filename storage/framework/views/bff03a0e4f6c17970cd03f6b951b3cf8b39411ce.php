<?php $__env->startSection('content'); ?>
<?php
$getState = Helper::getState();
?>
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Expense Started
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Expenses</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Expense Started</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="<?php echo e(url('esh2/expenses/list')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                    <i class="fa fa-eye me-3"></i> View
                </a>
            </div>
        </div>
        <!--end::Toolbar-->

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="expenses_add_form" class="form" action="<?php echo e(url('esh2/expenses/add')); ?>" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Expense Type</label>
                                        <input type="text" name="expense_type" id="expense_type" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Expense Name</label>
                                        <input type="text" name="expense_name" id="expense_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Expense Name" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Users</label>
                                        <input type="text" name="user_name" id="user_name" class="form-control form-control-solid mb-3 mb-lg-0" required placeholder="Users" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Date</label>
                                        <input type="date" name="date" id="date" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Quantity" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Rate</label>
                                        <input type="number" name="rate" id="rate" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Rate" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Total</label>
                                        <input type="number" name="total" id="total" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Total" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Attach Document</label>
                                        <input type="text" name="attachment" id="attachment" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Total Amount</label>
                                        <input type="number" name="total_amt" id="total_amt" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" placeholder="Total Amount" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class=" fw-semibold fs-6 mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description" value="" /></textarea>
                                    </div>
                                </div>
                               
                                
                                
                            </div>
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3">Discard</button>
                            <button type="button" id="addExpense" class="btn btn-primary">Submit</button>
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
    function calculateTotalAmount() {
        var quantity = parseFloat($('#quantity').val());
        var rate = parseFloat($('#rate').val());
        
        if (!isNaN(quantity) && !isNaN(rate)) {
            var totalAmount = quantity * rate;
            $('#total').val(totalAmount.toFixed());
            $('#total_amt').val(totalAmount.toFixed(2)); 
        } else {
            $('#total').val(''); 
            $('#total_amt').val(''); 
        }
    }

    $('#quantity, #rate').on('input', function() {
        calculateTotalAmount();
    });

    $('#addExpense').click(function() {
        let isValid = true;
        $('#expenses_add_form input[required]').each(function() {
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

        var formData = new FormData($("#expenses_add_form")[0]);
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            url: baseurl + '/esh2/expenses/add',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 1) {
                    Swal.fire({
                        text: "Expense has been successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn fw-bold btn-primary" },
                    }).then(function() {
                        window.location.href = "<?php echo e(url('esh2/expenses/list')); ?>"; 
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

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/expenses/add.blade.php ENDPATH**/ ?>