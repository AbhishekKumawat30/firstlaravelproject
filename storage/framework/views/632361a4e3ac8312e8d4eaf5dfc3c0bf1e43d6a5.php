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
                            Role Started
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="<?php echo e(url('/')); ?>" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Role</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Role Started</li>
                        </ul>
                    </div>
                </div>
                <div class="text-end mt-1">
                    <a href="<?php echo e(url('esh2/roles/list')); ?>" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-arrow-left me-3"></i> Back
                    </a>
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body py-4">
                        <form id="branch_edit_form" class="form" action="<?php echo e(url('esh2/roles/edit')); ?>"
                            enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-offset="300px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name"
                                                value="<?php echo e($data['name'] ?? ''); ?>" required />
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3"
                                    data-kt-users-modal-action="cancel">Discard</button>
                                <button type="button" id="editroles" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                    <span class="indicator-label">update</span>
                                    <span class="indicator-progress">Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo e(URL::asset('public/assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/scripts.bundle.js')); ?>"></script>
    <!--end::Global Javascript Bundle-->


    <script>
        $(document).ready(function() {

            $('#editroles').click(function() {

                var formData = new FormData($("#branch_edit_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: '<?php echo e(url('esh2/roles/edit')); ?>/' + '<?php echo e($data->id); ?>',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        response.status == 1 ?
                            Swal.fire({
                                text: "Role has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/roles/list';
                            }) :
                            "cancel" === t.dismiss &&
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again. \n" +
                                    response.message,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            });
                    }
                });

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/esh2/roles/edit.blade.php ENDPATH**/ ?>