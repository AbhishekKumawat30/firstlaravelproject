<?php $__env->startSection('content'); ?>
<?php
    $getState = Helper::getState();
?>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Expense Started
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted"><a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">Home</a></li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Expenses</li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Expense Started</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="<?php echo e(url('esh2/expenses/list')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                    <i class="fa fa-arrow-left me-3"></i> Back
                </a>
            </div>
        </div>

        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="expenses_edit_form" class="form" action="<?php echo e(url('esh2/expenses/edit')); ?>" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll">
                            <div class="row">
                                <?php $__currentLoopData = [
                                    'expense_type' => 'Expense Type',
                                    'expense_name' => 'Expense Name',
                                    'user_name' => 'Users',
                                    'date' => 'Date',
                                    'quantity' => 'Quantity',
                                    'rate' => 'Rate',
                                    'total' => 'Total',
                                    'attachment' => 'Attach Document',
                                    'total_amt' => 'Total Amount'
                                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2"><?php echo e($label); ?></label>
                                            <input type="<?php echo e($field === 'date' ? 'date' : 'text'); ?>" name="<?php echo e($field); ?>" id="<?php echo e($field); ?>"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   value="<?php echo e($data[$field] ?? ''); ?>" required />
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-md-3">
                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Description</label>
                                        <textarea name="description" id="description" class="form-control form-control-solid mb-3 mb-lg-0"
                                                  placeholder="Description"><?php echo e($data['description'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3">Discard</button>
                            <button type="button" id="editExpense" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>

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
        $('#editExpense').click(function() {
            var formData = new FormData($("#expenses_edit_form")[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo e(url("esh2/expenses/edit")); ?>/' + '<?php echo e($data->id); ?>',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire({
                            text: "Expense New Details Updated Successfully!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        }).then(function() {
                            window.location.href = '<?php echo e(url("esh2/expenses/list")); ?>';
                        });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.\n" + response.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/expenses/edit.blade.php ENDPATH**/ ?>