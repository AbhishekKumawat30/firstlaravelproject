@extends('common.app')
@section('content')
    @php
        $getState = Helper::getState();
    @endphp
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            add Started
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('/') }}" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Students </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                add Started </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
                <div class="text-end mt-1">
                    <a href="{{ url('esh2/students/view') }}" class="btn btn-primary d-flex align-items-center"
                        style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-eye me-3"></i> View
                    </a>
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Card-->
                <div class="card">


                    <!--begin::Card body-->
                    <div class="card-body py-4">

                        <form id="customers_add_form" class="form" action="{{ url('esh2/students/add') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <div class="row">
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" name="name" id="name"
                                                class="form-control form-control-solid mb-3 mb-lg-0 required"
                                                placeholder="Name" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Mobile</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="tel" name="mobile" id="mobile"
                                                class="form-control form-control-solid mb-3 mb-lg-0 required"
                                                onkeypress="javascript:return isNumber(event)" placeholder="91+"
                                                value="" />
                                            <!--end::Input-->
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email"
                                                value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>


                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">DOB</label>
                                            <input type="date" name="dob" id="dob"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="dd-mm-yyyy" value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Aadhar</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="tel" name="aadhar" id="aadhar"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                onkeypress="javascript:return isNumber(event)" placeholder="123-456-789-101"
                                                value="" />
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Father Name</label>
                                            <input type="text" name="father_name" id="father_name"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Father name" value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Father Mobile</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="tel" name="father_mobile" id="father_mobile"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                onkeypress="javascript:return isNumber(event)" placeholder="Father Mobile"
                                                value="" />
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Mother Name</label>
                                            <input type="text" name="mother_name" id="mother_name"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Mother Name" value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class=" fw-semibold fs-6 mb-2 required">Address</label>
                                            <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address"
                                                value="" /></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Upload Photo</label>
                                            <input type="file" name="photo" id="photo"
                                                class="form-control form-control-solid mb-3 mb-lg-0" accept="image/*" />
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

                                <button type="button" id="addCustomer" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>

                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->

        </div>
    </div>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->


    <script>
        $(document).ready(function() {

            $('#addCustomer').click(function() {

                // Clear previous error messages and red borders
                $(".form-control").removeClass("is-invalid");
                $(".invalid-feedback").remove();

                var valid = true;

                // Loop through each required input field and check if it's empty
                $('input.required, textarea.required').each(function() {
                    if ($(this).val() == '') {
                        valid = false;
                        $(this).addClass('is-invalid');
                        $(this).after(
                        '<div class="invalid-feedback">This field is required.</div>');
                    }
                });

                // If the form is valid, submit it
                if (valid) {
                    var formData = new FormData($("#customers_add_form")[0]);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        url: baseurl + '/esh2/students/add',
                        method: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            response.status == 1 ?
                                Swal.fire({
                                    text: "Form has been successfully submitted!",
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    },
                                }).then(function() {
                                    window.location.href = '/rusoft_web/esh2/students/view';
                                }) :
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
                }
            });
        });
    </script>
@endsection
