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
                        Certificate Started
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Certificate</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Certificate Started</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="{{ url('esh2/certificate/list') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
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
                                <div class="col-md-4">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" value="" required />
                                        <div id="name_error" class="text-danger" style="display: none;">The Name field is required.</div> <!-- Error message -->
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Upload Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control form-control-solid mb-3 mb-lg-0" required />
                                        <div id="photo_error" class="text-danger" style="display: none;">The Photo field is required.</div> <!-- Error message -->
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                            <button type="button" id="addcertificate" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Save</span>
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

            // Clear previous error messages
            $('#name_error').hide();
            $('#photo_error').hide();
            let isValid = true;

            // Get the values of the inputs
            var name = $('#name').val();
            var photo = $('#photo')[0].files.length;

            // Check if both fields are filled
            if (name === "") {
                $('#name_error').show();  // Show Name error message
                isValid = false;
            }
            if (photo === 0) {
                $('#photo_error').show();  // Show Photo error message
                isValid = false;
            }

            // If either field is invalid, prevent form submission
            if (!isValid) {
                return; // Don't submit the form
            }

            // If both fields are valid, submit the form via AJAX
            var formData = new FormData($("#branch_add_form")[0]);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') },
                url: baseurl + '/esh2/certificate/add',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {

                    if (response.status == 1) {
                        Swal.fire({
                            text: "Certificate has been successfully Updated!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" },
                        }).then(function () {
                            window.location.href = '/rusoft_web/esh2/certificate/list';
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

@endsection
