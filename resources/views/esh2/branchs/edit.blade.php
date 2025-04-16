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
                            Branch Started
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
                                Branchs </li>
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
                    <a href="{{ url('esh2/branchs/list') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
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


                        <form id="Branch_edit_form" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- Branch Name -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="branch_name">Branch Name</label>
                                            <input type="text" name="branch_name" id="branch_name" class="form-control form-control-solid mb-3 mb-lg-0" required value="{{ $data['branch_name'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Owner Name -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="owner_name">Owner Name</label>
                                            <input type="text" name="owner_name" id="owner_name" class="form-control form-control-solid mb-3 mb-lg-0" required value="{{ $data['owner_name'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Branch Code -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="branch_code">Branch Code</label>
                                            <input type="number" name="branch_code" id="branch_code" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" value="{{ $data['branch_code'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- GST Number -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="gst_no">GST Number</label>
                                            <input type="number" name="gst_no" id="gst_no" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" value="{{ $data['gst_no'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Mobile Number -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="mobile_no">Mobile Number</label>
                                            <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" value="{{ $data['mobile_no'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Email -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" required value="{{ $data['email'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Country -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="country">Country</label>
                                            <select name="country" id="country" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                                <option value="" {{ empty($data['country']) ? 'selected' : '' }}>Select</option>
                                                <option value="India" {{ $data['country'] == 'India' ? 'selected' : '' }}>India</option>
                                                <option value="Australia" {{ $data['country'] == 'Australia' ? 'selected' : '' }}>Australia</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- State -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                                <option value="" {{ empty($data['state_id']) ? 'selected' : '' }}>Select</option>
                                                <option value="Rajasthan" {{ $data['state_id'] == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
                                                <option value="Delhi" {{ $data['state_id'] == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- City -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="city_id">City</label>
                                            <select name="city_id" id="city_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                                <option value="" {{ empty($data['city_id']) ? 'selected' : '' }}>Select</option>
                                                <option value="Jaipur" {{ $data['city_id'] == 'Jaipur' ? 'selected' : '' }}>Jaipur</option>
                                                <option value="Siker" {{ $data['city_id'] == 'Siker' ? 'selected' : '' }}>Siker</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Pin Code -->
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2" for="pin_code">Pin Code</label>
                                            <input type="number" name="pin_code" id="pin_code" class="form-control form-control-solid mb-3 mb-lg-0" required onkeypress="javascript:return isNumber(event)" value="{{ $data['pin_code'] ?? '' }}" />
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <!-- Address -->
                                        <div class="fv-row mb-7">
                                            <label class="fw-semibold fs-6 mb-2" for="address">Address</label>
                                            <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address">{{ $data['address'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>
                                        <button type="submit" id="editBranch" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Update</span>
                                            <span class="indicator-progress">
                                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>  <!--end::Actions-->
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

            var branchsId = '{{ $data->id ?? '' }}';

            $('#editBranch').click(function() {

                var formData = new FormData($("#Branch_edit_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: baseurl + '/esh2/branchs/edit/' + branchsId,
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        response.status == 1 ?
                            Swal.fire({
                                text: "Branch New Details Updated Successfully!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "stbtn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/branchs/list';
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
