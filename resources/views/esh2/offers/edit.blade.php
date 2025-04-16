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
                                Offers </li>
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
                    <a href="{{ url('esh2/offers/view') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
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


                        <form id="Offer_edit_form" action="#" method="post" enctype="multipart/form-data">
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
                                            <label for="from_date">From Date</label>
                                            <input type="date" id="from_date" name="from_date" class="form-control"
                                                value="{{ $data['from_date'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="to_date">To Date</label>
                                            <input type="date" id="to_date" name="to_date" class="form-control"
                                                value="{{ $data['to_date'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="photo">Upload Photo</label>
                                            <input type="date" id="photo" name="photo" class="form-control"
                                                value="{{ $data['photo'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <div class="col-md-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label for="promo_code">Promo Code </label>
                                            <input type="number" id="promo_code" name="promo_code" class="form-control"
                                                value="{{ $data['promo_code'] ?? '' }}">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="button" id="editOffer" class="btn btn-primary"
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
                                </div>   <!--end::Actions-->
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

            $('#editOffer').click(function() {

                var formData = new FormData($("#Offer_edit_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: baseurl + '/esh2/offers/edit/' + customerId,
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        response.status == 1 ?
                            Swal.fire({
                                text: "Offer New Details Updated Successfully!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/offers/view';
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
