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
                            Getting Started
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
                                Getting Started </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
                <div class="text-end mt-1">
                    <a href="{{ url('esh2/students/view') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-arrow-left me-3"></i> Back
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


                        <form id="Students_edit_form" action="#" method="post" enctype="multipart/form-data">
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
                                            <label for="name">Name </label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $data['name'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="mobile">Mobile </label>
                                            <input type="number" id="mobile" name="mobile" class="form-control"
                                                value="{{ $data['mobile'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="email">Email </label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $data['email'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="dob">DOB</label>
                                            <input type="date" id="dob" name="dob" class="form-control"
                                                value="{{ $data['dob'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="aadhar">Aadhar </label>
                                            <input type="number" id="aadhar" name="aadhar" class="form-control"
                                                value="{{ $data['aadhar'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="father_name">Father Name </label>
                                            <input type="text" id="father_name" name="father_name" class="form-control"
                                                value="{{ $data['father_name'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="father_mobile">Father Mobile </label>
                                            <input type="text" id="father_mobile" name="father_mobile"
                                                class="form-control" value="{{ $data['father_mobile'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="mother_name">Mother Name </label>
                                            <input type="text" id="mother_name" name="mother_name" class="form-control"
                                                value="{{ $data['mother_name'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="address">Address </label>
                                            <input type="address" id="address" name="address" class="form-control"
                                                value="{{ $data['address'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="photo">Upload Photo</label>
                                            <input type="file" id="photo" name="photo" class="form-control"
                                                value="{{ $data['photo'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>



                                    <!--begin::Actions-->
                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="button" id="editStudents" class="btn btn-primary"
                                            data-kt-users-modal-action="submit">
                                            <span class="indicator-label">
                                                Update
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

            var customerId = '{{ $data->id ?? '' }}';

            $('#editStudents').click(function() {

                var formData = new FormData($("#Students_edit_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: baseurl + '/esh2/students/edit/' + customerId,
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        response.status == 1 ?
                            Swal.fire({
                                text: "Student New Details Updated Successfully!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/students/view';
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
@endsection
