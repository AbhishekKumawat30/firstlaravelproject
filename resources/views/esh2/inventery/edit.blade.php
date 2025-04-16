@extends('common.app')
@section('content')
    @php
        $getState = Helper::getState();
    @endphp
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack ">

                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Getting Started
                        </h1>
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted"><a href="{{ url('esh2/inventery/edit') }}" class="text-muted text-hover-primary">Home</a></li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Inventories</li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Getting Started</li>
                        </ul>
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
                <div class="text-end mt-1">
                    <a href="{{ url('esh2/inventery/list') }}" class="btn btn-primary d-flex align-items-center" style="font-size: 0.99rem; padding: 5px 10px;">
                        <i class="fa fa-arrow-left me-3"></i> Back
                    </a>
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl ">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <form id="Inventery_edit_form" action="{{ url('esh2/inventery/edit') . $data->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="company">Company</label>
                                            <select id="company" name="company" class="form-control">
                                                <option value="Select" {{ isset($data['company']) && $data['company'] == 'Select' ? 'selected' : '' }}>Select</option>
                                                <option value="Rukmani" {{ isset($data['company']) && $data['company'] == 'Rukmani' ? 'selected' : '' }}>Rukmani</option>
                                                <option value="Tirupati" {{ isset($data['company']) && $data['company'] == 'Tirupati' ? 'selected' : '' }}>Tirupati</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="item_name">Item Name</label>
                                            <input type="text" id="item_name" name="item_name" class="form-control" value="{{ $data['item_name'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="quantity_stock">Quantity Stock</label>
                                            <input type="number" id="quantity_stock" name="quantity_stock" class="form-control" value="{{ $data['quantity_stock'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="amount">Amount</label>
                                            <input type="number" id="amount" name="amount" class="form-control" value="{{ $data['amount'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="total_amount">Total Amount</label>
                                            <input type="number" id="total_amount" name="total_amount" class="form-control" value="{{ $data['total_amount'] ?? '' }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="available_stock">Available Stock</label>
                                            <input type="number" id="available_stock" name="available_stock" class="form-control" value="{{ $data['available_stock'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label for="date">Date</label>
                                            <input type="date" id="date" name="date" class="form-control" value="{{ $data['date'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3">Discard</button>
                                        <button type="button" id="editInventery" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Code to Calculate Total Amount -->
    <script>
        $(document).ready(function() {

            // Function to calculate total amount
            function calculateTotalAmount() {
                var quantityStock = parseFloat($('#quantity_stock').val()) || 0; // Default to 0 if empty
                var amount = parseFloat($('#amount').val()) || 0; // Default to 0 if empty
                var totalAmount = quantityStock * amount;
                $('#total_amount').val(totalAmount.toFixed(2)); // Set total amount in input, formatted to 2 decimal places
            }

            // Trigger the calculation when quantity_stock or amount fields are changed
            $('#quantity_stock, #amount').on('input', function() {
                calculateTotalAmount(); // Recalculate total amount on input change
            });

            // Initial calculation if fields have values
            calculateTotalAmount();

            $('#editInventery').click(function() {
                var formData = new FormData($("#Inventery_edit_form")[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: baseurl + '/esh2/inventery/edit/' + '{{ $data->id }}',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 1) {
                            Swal.fire({
                                text: "Inventory Updated Successfully!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                },
                            }).then(function() {
                                window.location.href = '/rusoft_web/esh2/inventery/list';
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected. Please try again.",
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
            });
        });
    </script>

    <script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>
@endsection
