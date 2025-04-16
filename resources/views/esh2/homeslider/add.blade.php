@extends('common.app')
@section('content')
@php
    $getState = Helper::getState();
@endphp

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Homeslider Started
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Homeslider</li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Homeslider Started</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="{{ url('esh2/homeslider/list') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                    <i class="fa fa-eye me-3"></i> View
                </a>
            </div>
        </div>
        <!--end::Toolbar-->                                        

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="branch_add_form" class="form" action="{{ url('esh2/certificate/add') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required />
                                        <div id="name_error" class="text-danger mt-2" style="display: none;">The name field is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Upload Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                        <div id="photo_error" class="text-danger mt-2" style="display: none;">The photo field is required.</div>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3">Discard</button>
                            <button type="button" id="addcertificate" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
<script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<script>
    $(document).ready(function () {
        
        $('#addcertificate').click(function () {
            var name = $('#name').val();
            var photo = $('#photo').val();
            var valid = true;

            // Reset previous error messages
            $('#name_error').hide();
            $('#photo_error').hide();

            // Validate name field
            if (!name) {
                $('#name_error').show();
                valid = false;
            }

            // Validate photo field
            if (!photo) {
                $('#photo_error').show();
                valid = false;
            }

            // If validation passes, submit the form
            if (valid) {
                var formData = new FormData($("#branch_add_form")[0]);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ url('esh2/homeslider/add') }}', // Ensure the URL is correct
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status == 1) {
                            Swal.fire({
                                text: "Homeslider has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" },
                            }).then(function () {
                                window.location.href = '{{ url('esh2/homeslider/list') }}'; // Redirect after successful submission
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected. Please try again. \n" + response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" },
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            text: "An unexpected error occurred. Please try again later.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" },
                        });
                    }
                });
            }
        });
    });
</script>

@endsection
