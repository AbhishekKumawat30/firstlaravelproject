@extends('common.app')
@section('content')

    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Student List
                        </h1>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <div class="m-0">
                            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" id="xx"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                                Filter
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown w-md-1000px" data-kt-menu="true"
                                id="kt_menu_668a8650bc1bb">
                                <div class="px-7 py-5 d-flex">
                                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5">
                                    <form action="{{ url('esh2/enquiry/list') }}" method="post" class="row">
                                        @csrf

                                        <div class="mb-10 col-md-3">
                                            <label class="form-label fw-semibold">Select Data</label>
                                            <select class="form-control form-select form-select-solid"
                                                data-kt-select2="true" id="rows" name="rows">
                                                <option value="">Select</option>
                                                <option value="500">500</option>
                                                <option value="1000">1000</option>
                                                <option value="1500">1500</option>
                                                <option value="2000">2000</option>
                                                <option value="2500">2500</option>
                                                <option value="3000">3000</option>
                                                <option value="3500">3500</option>
                                                <option value="4000">4000</option>
                                                <option value="4500">4500</option>
                                                <option value="5000">5000</option>
                                                <option value="5500">5500</option>
                                                <option value="6000">6000</option>
                                            </select>
                                        </div>

                                        <div class="mb-10 col-md-4">
                                            <label class="form-label fw-semibold">Enquiry Type</label>
                                            <div>
                                                <select name="type[]" class="form-select form-select-solid" multiple
                                                    data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    <option value="">Select</option>
                                                    <option value="1">Client</option>
                                                    <option value="2">Contact</option>
                                                    <option value="3">Office Visit</option>
                                                    <option value="4">Interview</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-10 col-md-5">
                                            <label class="form-label fw-semibold">Department</label>
                                            <div>
                                                <select name="department_id[]" class="form-select form-select-solid"
                                                    multiple data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    <option value="">Select</option>
                                                    <option value="1">School</option>
                                                    <option value="2">Coaching</option>
                                                    <option value="3">Library</option>
                                                    <option value="4">Hostel</option>
                                                    <option value="5">Website</option>
                                                    <option value="6">CRM</option>
                                                    <option value="7">Custom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-10 col-md-6">
                                            <label class="form-label fw-semibold">Status:</label>
                                            <div>
                                                <select name="responceStatus[]" class="form-select form-select-solid"
                                                    multiple data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    @if (!empty($enquiryStatus))
                                                        @foreach ($enquiryStatus as $enquStatus)
                                                            <option value="{{ $enquStatus->id ?? '' }}">
                                                                {{ $enquStatus->name ?? '' }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-10 col-md-6">
                                            <label class="form-label fw-semibold">By User</label>
                                            <div>
                                                <select name="user_id[]" class="form-select form-select-solid" multiple
                                                    data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option"
                                                    data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">
                                                    @if (!empty($user))
                                                        @foreach ($user as $use)
                                                            <option value="{{ $use->id ?? '' }}">{{ $use->name ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <!--<div class="mb-10 col-md-6">-->
                                        <!--    <label class="form-label fw-semibold">Custom Filter</label>-->
                                        <!--    <div>-->
                                        <!--        <select name="custom_filter" class="form-select form-select-solid" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_668a8650bc1bb" data-allow-clear="true">-->
                                        <!--            <option value="">Select</option>-->
                                        <!--            <option value="1">Total Organic Enquiry</option>-->
                                        <!--            <option value="2">Today Reminders</option>-->
                                        <!--        </select>-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                        <!--<div class="mb-10 col-md-6">-->
                                        <!--    <label class="form-label fw-semibold">labels</label>-->
                                        <!--    <div class="d-flex">-->
                                        <!--        @if (!empty($label))
    -->
                                        <!--        @foreach ($label as $labes)
    -->
                                        <!--            <div class="form-check form-check-custom form-check-solid">-->
                                        <!--                <input class="form-check-input pointer" name="labes[]" type="checkbox" value="{{ $labes->id ?? '' }}" style="border-radius:50%; background-color : {{ $labes->color ?? '' }}"/>-->
                                        <!--            </div> &nbsp; &nbsp; &nbsp; -->
                                        <!--
    @endforeach-->
                                        <!--
    @endif-->


                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('esh2/students/add') }}" class="d-flex btn btn-sm fw-bold btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i> Add </a>
                    </div>
                </div>
            </div>
            <div class="align-items-center gap-2 gap-lg-3 p-3"
                style="overflow-x:scroll; width:auto; display:-webkit-inline-box;">
                <form action="{{ url('esh2/enquiry/list') }}" method="post" class="align-content-center">
                    @csrf
                    <button name="custom_filter" value="1" type="submit"
                        class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-info">Total Organic
                        Leads</button>
                </form> &nbsp;
                <form action="{{ url('esh2/enquiry/list') }}" method="post" class="align-content-center">
                    @csrf
                    <button name="custom_filter" value="2" type="submit"
                        class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">Today
                        Reminers</button>
                </form>&nbsp; &nbsp;


                @if (!empty($label))
                    @foreach ($label as $labelsearch)
                        @php
                            $labelCount = DB::table('enquiry_labels')
                                ->where('user_id', Session::get('id'))
                                ->whereRaw('FIND_IN_SET(?, label_id)', [$labelsearch->id])
                                ->whereNull('deleted_at')
                                ->count();
                        @endphp
                        <form action="{{ url('esh2/enquiry/list') }}" method="post" class="align-content-center">
                            @csrf
                            <div class="form-check form-check-custom form-check-solid">
                                <input type="hidden" name="labelsearch" value="{{ $labelsearch->id ?? '' }}">
                                <button type="submit" class="form-check-input pointer text-white"
                                    style="border-radius:50%; background-color : {{ $labelsearch->color ?? '' }}" />{{ $labelCount ?? '' }}</button>
                            </div>
                        </form>&nbsp; &nbsp; &nbsp;
                    @endforeach
                @endif
            </div>
            <div id="kt_app_content_container" class="app-container  container-xxl " style="padding : 0 !important">
                <div class="card">
                    <div class="modal fade" id="kt_modal_add_enquiry" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <h2 class="fw-bold">Add Enquiry</h2>
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-enquiry-modal-action="close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </div>
                                </div>
                                <div class="modal-body px-5 my-7">
                                    <form id="kt_modal_add_enquiry_form" class="form" action="#"
                                        enctype="multipart/form-data">
                                        <div class="scroll-y px-5 px-lg-10 row" id="kt_modal_add_user_scroll"
                                            data-kt-scroll="true" data-kt-scroll-activate="true"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                            data-kt-scroll-offset="300px">
                                            <div class="fv-row mb-7 col-md-3">
                                                <label class="required fw-semibold fs-6 mb-2">Enquiry Type</label>
                                                <select id="type"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" name="type">
                                                    <option value="1">Client</option>
                                                    <option value="2">Contact</option>
                                                    <option value="3">Office Visit</option>
                                                    <option value="4">Interview</option>
                                                    <option value="5">Other</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>

                                            <div class="fv-row mb-7 col-md-3">
                                                <label class=" fw-semibold fs-6 mb-2">Department</label>
                                                <select id="department_id"
                                                    class="form-control form-select form-select-solid mb-3 mb-lg-0"
                                                    name="department_id">
                                                    <option value="">Select</option>
                                                    <option value="1">School</option>
                                                    <option value="2">Coaching</option>
                                                    <option value="3">Library</option>
                                                    <option value="4">Hostel</option>
                                                    <option value="5">Website</option>
                                                    <option value="6">CRM</option>
                                                    <option value="7">Custom</option>
                                                </select>
                                            </div>
                                            <div class="fv-row mb-7 col-md-3">
                                                <label class="required fw-semibold fs-6 mb-2">Mobile</label>
                                                <input type="tel" name="mobile" id="mobile"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Mobile" value=""
                                                    onkeypress="javascript:return isNumber(event)" />
                                            </div>

                                            <div class="fv-row mb-7 col-md-3">
                                                <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>
                                                <input type="tel" name="mobile2" id="mobile2"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Mobile 2" value=""
                                                    onkeypress="javascript:return isNumber(event)" />
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Full name" value="" />
                                            </div>
                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Email</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="example@domain.com" value="" />
                                            </div>
                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Address</label>
                                                <textarea name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address"
                                                    value="" /></textarea>
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Remark</label>
                                                <input type="text" name="remark" id="remark"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Remark" value="" />
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Reminder Date</label>
                                                <input type="datetime-local" name="reminder_date" id="reminder_date"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Reminder Date" value="" />
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>
                                                <textarea name="message" id="message" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Reminder Message" value="" /></textarea>
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                                                <select id="responce_status_id"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    name="responce_status_id">
                                                    <option value="0">Select</option>
                                                    @if (!empty($enquiryStatus))
                                                        @foreach ($enquiryStatus as $enStat)
                                                            <option value="{{ $enStat->id ?? '' }}">
                                                                {{ $enStat->name ?? '' }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="fv-row mb-7 col-md-6">
                                                <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url("{{ env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image.svg' }}");
                                                    }

                                                    [data-bs-theme="dark"] .image-input-placeholder {
                                                        background-image: url("{{ env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image-dark.svg' }}");
                                                    }
                                                </style>
                                                <div class="image-input image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url({{ env('IMAGE_SHOW_PATH') . 'assets/media/avatars/300-6.jpg' }});">
                                                    </div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <input type="file" name="image" id="image"
                                                            accept="" />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                </div>

                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            </div>

                                        </div>



                                        <div class="text-center pt-10">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-enquiry-modal-action="cancel">
                                                Discard
                                            </button>

                                            <button type="submit" class="btn btn-primary"
                                                data-kt-enquiry-modal-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>












                    <div class="card-body py-4">
                        <input type="text" id="myInput" class="form-control" placeholder="Search for names.."
                            title="Search for names.." width="100%">


                        <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="" class="table-responsive">
                                <table
                                    class="table table-hover table-striped table-bordered align-middle table-row-dashed fs-7 dataTable"
                                    style="width: 1199.5px;" id="enquiryTable">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="">Action</th>
                                            <th class="w-10px">Sr. No.</th>
                                            <th>Photo</th>
                                            <th class="">Name</th>
                                            <th class="">Mobile</th>
                                            <th class="">Email </th>
                                            <th class="">Aadhar </th>
                                            <th class="">Father Name</th>
                                            <th class="">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tableBody">
                                        @if (!empty($data))
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data as $enq)
                                                <tr data-id="{{ $enq->id ?? '' }}" class="enquiryTr">

                                                    <td class="pt-0 d-flex">


                                                        <a target="_blank"
                                                            href="{{ url('esh2/students/edit') }}/{{ $enq->id }}"
                                                            class="btn btn-icon btn-info me-2 mb-2 btn-outline btn-outline-dashed btn-outline-info pulse pulse-info">
                                                            <i class="ki-duotone ki-pencil fs-7"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                            <span class="pulse-ring"></span>
                                                        </a>


                                                        <form action="{{ url('esh2/students/delete/' . $enq->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this Students?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-icon btn-danger mb-2 btn-outline btn-outline-dashed btn-outline-danger pulse pulse-danger">
                                                                <i class="ki-duotone ki-trash fs-7"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i>
                                                                <span class="pulse-ring"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="pt-0">{{ $i++ }}</td>
                                                    <td>
                                                        <img src="{{ env('IMAGE_SHOW_PATH') . 'esh2/students/' . $enq->photo }}"
                                                            alt="Enquiry Image" style="width: 50px; height: 100px;" />
                                                    </td>
                                                    <td class="pt-0 align-items-center">

                                                        {{ $enq->name ?? '' }}
                                                    </td>
                                                    <td class="pt-0">
                                                        <small><a
                                                                href="tel://{{ $enq->mobile ?? '' }}">{{ $enq->mobile ?? '' }}</a></small>
                                                    </td>

                                                    <td class="pt-0"><small>{{ $enq->email ?? '' }}</small></td>
                                                    <td class="pt-0"><small>{{ $enq->aadhar ?? '' }}</small></td>
                                                    <td class="pt-0"><small>{{ $enq->father_name ?? '' }}</small></td>
                                                    <td>
                                                        @if ($enq->status == 1)
                                                            <button data-bs-toggle="modal" data-bs-target="#statusModal"
                                                                data-id="{{ $enq['id'] ?? '' }}"
                                                                class="btn btn-light-success w-70 btn btn-primary btn-sm Status"
                                                                data-status="0">Active</button>
                                                        @else
                                                            <button data-bs-toggle="modal" data-bs-target="#statusModal"
                                                                data-id="{{ $enq['id'] ?? '' }}"
                                                                class="btn btn-light-danger w-70 btn btn-primary btn-sm Status"
                                                                data-status="1">Inactive</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>













                    </div>

                </div>

            </div>


        </div>
    </div>
    <div class="modal fade" id="kt_modal_edit_enquiry" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold">Edit Enquiry</h2>

                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-enquiry-edit-modal-action="close"
                        data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>

                </div>



                <div class="modal-body px-5 my-7">

                    <form id="kt_modal_edit_enquiry_form" class="form" action="#" enctype="multipart/form-data">
                        <input type="hidden" id="enquiryId">

                        <div class="scroll-y px-5 px-lg-10 row" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">



                            <div class="fv-row mb-7 col-md-3">

                                <label class="required fw-semibold fs-6 mb-2">Enquiry Type</label>



                                <select id="enquiryType" class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="type">
                                    <option value="1">Client</option>
                                    <option value="2">Contact</option>
                                    <option value="3">Office Visit</option>
                                    <option value="4">Interview</option>
                                    <option value="5">Other</option>
                                </select>

                            </div>

                            <div class="fv-row mb-7 col-md-3">
                                <label class=" fw-semibold fs-6 mb-2">Department</label>
                                <select id="enquiryDepartment_id" class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="department_id">
                                    <option value="">Select</option>
                                    <option value="1">School</option>
                                    <option value="2">Coaching</option>
                                    <option value="3">Library</option>
                                    <option value="4">Hostel</option>
                                    <option value="5">Website</option>
                                    <option value="6">CRM</option>
                                    <option value="7">Custom</option>
                                </select>
                            </div>



                            <div class="fv-row mb-7 col-md-3">

                                <label class="required fw-semibold fs-6 mb-2">Mobile</label>



                                <input type="tel" name="mobile" id="enquiryMobile"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile"
                                    value="" onkeypress="javascript:return isNumber(event)" />

                            </div>

                            <div class="fv-row mb-7 col-md-3">

                                <label class=" fw-semibold fs-6 mb-2">Mobile 2</label>



                                <input type="tel" name="mobile2" id="enquiryMobile2"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mobile 2"
                                    value="" onkeypress="javascript:return isNumber(event)" />

                            </div>

                            <div class="fv-row mb-7 col-md-6">

                                <label class="required fw-semibold fs-6 mb-2">Full Name</label>

                                <input type="text" name="name" id="enquiryName"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"
                                    value="" />
                            </div>
                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Email</label>

                                <input type="email" name="email" id="enquiryEmail"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"
                                    value="" />
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Address</label>

                                <textarea name="address" id="enquiryAddress" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Address" value="" /></textarea>
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Remark</label>

                                <input type="text" name="remark" id="enquiryRemark"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Remark"
                                    value="" />
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Reminder Date</label>

                                <input type="datetime-local" name="reminder_date" id="enquiryReminder_date"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Reminder Date"
                                    value="" />
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Reminder Message</label>

                                <textarea name="message" id="enquiryMessage" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Reminder Message" value="" /></textarea>
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class=" fw-semibold fs-6 mb-2">Response Status</label>
                                <select id="enquiryResponce_status_id"
                                    class="form-control form-control-solid mb-3 mb-lg-0" name="responce_status_id">
                                    <option value="0">Select</option>
                                    @if (!empty($enquiryStatus))
                                        @foreach ($enquiryStatus as $enStatus)
                                            <option value="{{ $enStatus->id ?? '' }}">{{ $enStatus->name ?? '' }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="fv-row mb-7 col-md-6">
                                <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>

                                <style>
                                    .image-input-placeholder {
                                        background-image: url("{{ env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image.svg' }}");
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url("{{ env('IMAGE_SHOW_PATH') . 'assets/media/svg/files/blank-image-dark.svg' }}");
                                    }
                                </style>

                                <div class="image-input image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ env('IMAGE_SHOW_PATH') . 'assets/media/avatars/300-6.jpg' }});">
                                    </div>

                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <input type="file" name="enquiryImage" id="enquiryImage" accept="" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>

                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>

                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                </div>

                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>

                            <div class="fv-row mb-7 col-md-6 d-flex">
                                <label class=" fw-semibold fs-6 mb-2">Mark Label</label> &nbsp; &nbsp; &nbsp;

                                @if (!empty($label))
                                    @foreach ($label as $lab)
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input pointer" name="label[]"
                                                id="checkLabel_{{ $lab->id ?? '' }}" type="checkbox"
                                                value="{{ $lab->id ?? '' }}"
                                                style="border-radius:50%; background-color : {{ $lab->color ?? '' }}" />
                                        </div> &nbsp; &nbsp; &nbsp;
                                    @endforeach
                                @endif
                            </div>

                        </div>

                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-enquiry-edit-modal-action="close"
                                data-bs-dismiss="modal">
                                Discard
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-enquiry-edit-modal-action="submit">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>

    <script src="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/table.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/export-users.js') }}">
    </script>
    <script src="{{ URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/add.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/custom/apps/enquiry-management/enquiry/list/edit.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <script>
        $(document).ready(function() {

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableBody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });



            $('.editEnquiry').click(function() {
                var dataInfo = $(this).data('info');

                $('#enquiryId').val(dataInfo.id);
                $('#enquiryName').val(dataInfo.name);
                $('#enquiryMobile').val(dataInfo.mobile);
                $('#enquiryMobile2').val(dataInfo.mobile2);
                $('#enquiryEmail').val(dataInfo.email);
                $('#enquiryDepartment_id').val(dataInfo.department_id);
                $('#enquiryAddress').val(dataInfo.address);
                $('#enquiryRemark').val(dataInfo.remark);

                $('#enquiryResponce_status_id').val(dataInfo.responce_status_id);
                $('#enquiryType').val(dataInfo.type);
                $('#kt_modal_edit_enquiry').modal('show');

                if (dataInfo.label != null) {
                    var checkLabel = dataInfo.label.split(',');
                    checkLabel.forEach(function(value, index) {
                        $('#checkLabel_' + value).attr('checked', true);
                    });
                }
            });




            $('.deleteEnquiry').click(function() {
                var deleteData = $(this).data('info');
                var deleteId = deleteData.id;
                Swal.fire({
                    text: "Are you sure you want to delete selected enquiry?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function(t) {
                    t.value ?
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: baseurl + '/esh2/enquiry/delete',
                            method: 'post',
                            data: {
                                deleteId: deleteId
                            },
                            success: function(response) {

                                response.status == 1 ?
                                    Swal.fire({
                                        text: "You have deleted selected enquiry!.",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary"
                                        },
                                    }).then(function() {
                                        window.location.reload();
                                    }) :
                                    "cancel" === t.dismiss &&
                                    Swal.fire({
                                        text: "Selected enquiry was not deleted. \n" +
                                            response.message,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary"
                                        },
                                    });
                            }
                        }) :
                        "cancel" === t.dismiss &&
                        Swal.fire({
                            text: "Selected enquiry was not deleted.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            },
                        });
                });
            });


            $('.Status').click(function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                Swal.fire({
                    text: "Are you sure you want to change the status of the selected data?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, change!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn btn-sm fw-bold btn-danger",
                        cancelButton: "btn btn-sm fw-bold btn-active-light-primary",
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formData = {
                            status_id: status,
                            id: id
                        };
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: "{{ url('esh2/certificate/statusChange') }}",
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                if (response.success) {
                                    let btn = $('button[data-id="' + response.id +
                                        '"]');
                                    if (response.status == 1) {
                                        btn.removeClass('btn-light-danger').addClass(
                                                'btn-light-success').text('Active')
                                            .data('status', 0);
                                    } else {
                                        btn.removeClass('btn-light-success').addClass(
                                                'btn-light-danger').text('Inactive')
                                            .data('status', 1);
                                    }
                                    $('#statusModal').modal('hide');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
