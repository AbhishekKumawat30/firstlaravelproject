@extends('common.app')
@section('content')
@php
    $homesliderId = $homeslider->id; // The ID of the homeslider being edited
@endphp
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">Edit Homeslider</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Homeslider</li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Edit</li>
                    </ul>
                </div>
            </div>
            <div class="text-end mt-1">
                <a href="{{ url('esh2/homeslider/list') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                    <i class="fa fa-arrow-left me-3"></i> Back
                </a>
            </div>
        </div>
        <!-- End Toolbar -->                                        

        <!-- Content Container -->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body py-4">
                    <form id="homeslider_edit_form" class="form" action="{{ url('esh2/homeslider/edit') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-solid" placeholder="Name" value="{{ $homeslider->name }}" />
                                        <div id="name_error" class="text-danger mt-2" style="display: none;">The name field is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Upload Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control form-control-solid" />
                                        <div id="photo_error" class="text-danger mt-2" style="display: none;">The photo field is required.</div>
                                        @if($homeslider->photo)
                                            <img src="{{ asset('path/to/photos/' . $homeslider->photo) }}" alt="Current Photo" class="img-thumbnail mt-2" style="width: 100px;">
                                        @endif
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3">Discard</button>
                            <button type="button" id="editHomeslider" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Content Container -->

    </div>
</div>

<!-- Global Javascript Bundle -->
<script src="{{ asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('public/assets/js/scripts.bundle.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#editHomeslider').click(function () {
            // Hide any previous error messages
            $('#name_error').hide();
            $('#photo_error').hide();

            // Get the values of the fields
            var name = $('#name').val();
            var photo = $('#photo')[0].files.length;

            var valid = true;

            // Validate Name only if it is being changed
            if (name === "" && $('#name').val() !== "{{ $homeslider->name }}") {
                $('#name_error').show();
                valid = false;
            }

            // Validate Photo only if it is being changed
            if (photo === 0 && $('#photo')[0].files.length > 0) {
                $('#photo_error').show();
                valid = false;
            }

            // If at least one field is being updated, submit the form
            if (valid) {
                var formData = new FormData($("#homeslider_edit_form")[0]);
                var homesliderId = '{{ $homesliderId }}';

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ url("esh2/homeslider/edit") }}/' + homesliderId,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status === 1) {
                            Swal.fire({
                                text: "Homeslider has been successfully updated!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" },
                            }).then(function () {
                                window.location.href = '{{ url("esh2/homeslider/list") }}';
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
