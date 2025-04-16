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
                    <i class="fa fa-arrow-left me-3"></i> Back
                </a>
            </div>
        </div>
        <!--end::Toolbar-->                                        

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="branch_edit_form" class="form" action="{{ url('esh2/certificate/edit') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" value="{{ $data['name'] ?? '' }}" required />
                                        <span id="name-error" class="text-danger d-none">The name field is required.</span>
                                    </div>
                                </div>
                                
                                <!-- Adjusted the column layout to move the photo preview to the right side -->
                                <div class="col-md-8 d-flex align-items-center justify-content-between">
                                    <div class="fv-row mb-7 w-100">
                                        <label class="required fw-semibold fs-6 mb-2">Upload Photo</label>
                                        <div class=" align-items-center d-flex" style="align-items: start !important;justify-content:space-between;">
                                            <!-- File input for the photo -->
                                            <input type="file" name="photo" id="photo" class="form-control form-control-solid mb-3 w-75" required />
                                            
                                            <!-- Photo preview displayed to the right -->
                                            <div id="photo-preview" class="mt-3 d-inline" style="max-width: 100px; height: auto;margin-top:0 !important;">
                                                @if(isset($data['photo']) && !empty($data['photo']))
                                                    <img src="{{ asset('public/images/certificate_photos/'.$data['photo']) }}" alt="Uploaded Photo" width="100">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                            <button type="button" id="editcertificate" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">update</span>
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

        // Display preview of the uploaded image
        $('#photo').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photo-preview').html('<img src="' + e.target.result + '" width="100" alt="Uploaded Photo">');
            };
            reader.readAsDataURL(this.files[0]);
        });

        $('#editcertificate').click(function () {

            // Check if the name field is empty and show error message
            var name = $('#name').val();
            if (name === '') {
                $('#name-error').removeClass('d-none');  // Show the error message
                return; // Prevent the form from being submitted
            } else {
                $('#name-error').addClass('d-none'); // Hide the error message
            }

            var formData = new FormData($("#branch_edit_form")[0]);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') },
                url: '{{ url("esh2/certificate/edit") }}/' + '{{ $data->id }}',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {

                    response.status == 1
                        ? Swal.fire({
                            text: "Certificate has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" },
                        }).then(function () {
                            window.location.href = '/rusoft_web/esh2/certificate/list';
                        })
                        : "cancel" === t.dismiss &&
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again. \n" + response.message,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" },
                        });
                }
            });

        });
    });
</script>

@endsection
