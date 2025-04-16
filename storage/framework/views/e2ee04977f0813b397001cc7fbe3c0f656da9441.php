<?php $__env->startSection('content'); ?>
    <?php
        $getState = Helper::getState();
    ?>
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            <?php echo e(isset($data) ? 'Edit FAQ' : 'Add FAQ'); ?>

                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">FAQs</li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted"><?php echo e(isset($data) ? 'Edit FAQ' : 'Add FAQ'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="text-end mt-1">
                    <a href="<?php echo e(url('esh2/faqs/view')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-arrow-left me-3"></i> Back
                    </a>
                </div>
            </div>

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body py-4">
                        <form id="faqs_add_form" class="form" action="<?php echo e(isset($data) ? url('esh2/faqs/edit/'.$data['id']) : url('esh2/faqs/add')); ?>" enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="faq_id" value="<?php echo e($data['id'] ?? ''); ?>" />

                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Question</label>
                                            <input type="text" name="question" id="question" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Question" value="<?php echo e($data['question'] ?? ''); ?>" />
                                            <span class="text-danger" id="question-error" style="display:none;">The question field is required.</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Answer</label>
                                            <input type="text" name="answer" id="answer" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Answer" value="<?php echo e($data['answer'] ?? ''); ?>" />
                                            <span class="text-danger" id="answer-error" style="display:none;">The answer field is required.</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Page Name</label>
                                            <select id="page_name" class="form-control form-control-solid mb-3 mb-lg-0" name="page_name">
                                                <option value="" disabled selected>Select a page</option>
                                                <?php $__currentLoopData = $pageNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($id); ?>" <?php echo e(($data->page_name ?? '') == $id ? 'selected' : ''); ?>><?php echo e($name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                <button type="button" id="addCustomer" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label"><?php echo e(isset($data) ? 'Update' : 'Submit'); ?></span>
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
            $('#addCustomer').click(function() {
                var formData = new FormData($("#faqs_add_form")[0]);
                var question = $('#question').val().trim();
                var answer = $('#answer').val().trim();

                // Reset error messages
                $('#question-error').hide();
                $('#answer-error').hide();

                var isValid = true;

                // Check if the Question field is empty
                if (question === '') {
                    $('#question-error').show();
                    isValid = false;
                }

                // Check if the Answer field is empty
                if (answer === '') {
                    $('#answer-error').show();
                    isValid = false;
                }

                if (isValid) {
                    var url = formData.get('faq_id') ? baseurl + '/esh2/faqs/edit/' + formData.get('faq_id') : baseurl + '/esh2/faqs/add';

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
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
                                    window.location.href = '/rusoft_web/esh2/faqs/view';
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
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/faqs/edit.blade.php ENDPATH**/ ?>