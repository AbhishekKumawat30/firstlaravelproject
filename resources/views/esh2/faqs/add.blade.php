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
                            Add Started
                        </h1>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Faqs</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Add Started</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <div class="text-end mt-1">
                    <a href="{{ url('esh2/faqs/view') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
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

                        <form id="faqs_add_form" class="form" action="{{ url('esh2/faqs/add') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Question </label>
                                            <input type="text" name="question" id="question"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Question" value="" />
                                            <div id="question_error" class="text-danger mt-2" style="display: none;">The question field is required.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Answer</label>
                                            <input type="text" name="answer" id="answer"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Answer" value="" />
                                            <div id="answer_error" class="text-danger mt-2" style="display: none;">The answer field is required.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Page Name</label>
                                            <select id="page_name" class="form-control form-control-solid mb-3 mb-lg-0"
                                                name="page_name">
                                                <option value="">Home</option>
                                                <option value="1">TDS Return</option>
                                                <option value="2">GST Registration</option>
                                                <!-- Add other options here -->
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                    Discard
                                </button>

                                <button type="button" id="addCustomer" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->

        </div>
    </div>

    <script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#addCustomer').click(function() {
                // Hide any previous error messages
                $('#question_error').hide();
                $('#answer_error').hide();

                var question = $('#question').val();
                var answer = $('#answer').val();

                var valid = true;

                // Validate Question field
                if (question.trim() === "") {
                    $('#question_error').show();
                    valid = false;
                }

                // Validate Answer field
                if (answer.trim() === "") {
                    $('#answer_error').show();
                    valid = false;
                }

                if (valid) {
                    // Proceed with the form submission using AJAX
                    var formData = new FormData($("#faqs_add_form")[0]);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ url('esh2/faqs/add') }}',
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
@endsection
