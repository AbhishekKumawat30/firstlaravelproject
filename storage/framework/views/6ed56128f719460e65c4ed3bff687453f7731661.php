<?php $__env->startSection('content'); ?>
      
        <!--begin::Wrapper-->

            
       
            
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                                            
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 " 
     
         >

            <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            
    

<!--begin::Page title-->
<div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
        Customer List
            </h1>
    <!--end::Title-->

            
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    <a href="/metronic8/demo1/index.html" class="text-muted text-hover-primary">
                                Home                            </a>
                                            </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                                        
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    Customers                                            </li>
                                <!--end::Item-->
                                        
                    </ul>
        <!--end::Breadcrumb-->
    </div>
<!--end::Page title-->
<!--begin::Actions-->
<div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
        <div class="m-0">
            <!--begin::Menu toggle-->
            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span class="path2"></span></i>               
                Filter
            </a>
            <!--end::Menu toggle-->
            
            

<!--begin::Menu 1-->
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_66854a6519afd">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
    </div>
    <!--end::Header-->

    <!--begin::Menu separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Menu separator-->
    

    <!--begin::Form-->
    <div class="px-7 py-5">
        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Status:</label>
            <!--end::Label-->

            <!--begin::Input-->
            <div>
                <select class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_66854a6519afd" data-allow-clear="true">
                    <option></option>
                    <option value="1">Approved</option>
                    <option value="2">Pending</option>
                    <option value="2">In Process</option>
                    <option value="2">Rejected</option>
                </select>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Member Type:</label>
            <!--end::Label-->

            <!--begin::Options-->
            <div class="d-flex">
                <!--begin::Options-->    
                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                    <input class="form-check-input" type="checkbox" value="1"/>
                    <span class="form-check-label">
                        Author
                    </span>
                </label>
                <!--end::Options-->    

                <!--begin::Options-->    
                <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
                    <span class="form-check-label">
                        Customer
                    </span>
                </label>
                <!--end::Options-->    
            </div>        
            <!--end::Options-->    
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Notifications:</label>
            <!--end::Label-->

            <!--begin::Switch-->
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
                <label class="form-check-label">
                    Enabled
                </label>
            </div>
            <!--end::Switch-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>

            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Form-->
</div>
<!--end::Menu 1-->        </div>
        <!--end::Filter menu-->
    
    
    <!--begin::Secondary button-->
        <!--end::Secondary button-->
    
    <!--begin::Primary button-->
            <a href="#" class="btn btn-sm fw-bold btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
            Create        </a>
        <!--end::Primary button-->
</div>
<!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
<!--end::Toolbar-->                                        
                    
<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid " >
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Customers" />
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
    <!--begin::Filter-->
    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>        Filter
    </button>
    <!--begin::Menu 1-->
<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
    </div>
    <!--end::Header-->

    <!--begin::Separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Separator-->

    <!--begin::Content-->
    <div class="px-7 py-5">
        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fs-5 fw-semibold mb-3">Month:</label>
            <!--end::Label-->

            <!--begin::Input-->
            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
                <option></option>
                <option value="aug">August</option>
                <option value="sep">September</option>
                <option value="oct">October</option>
                <option value="nov">November</option>
                <option value="dec">December</option>
            </select>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fs-5 fw-semibold mb-3">Payment Type:</label>
            <!--end::Label-->

            <!--begin::Options-->
            <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                <!--begin::Option-->
                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                    <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                    <span class="form-check-label text-gray-600">
                        All
                    </span>
                </label>
                <!--end::Option-->

                <!--begin::Option-->
                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                    <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                    <span class="form-check-label text-gray-600">
                        Visa
                    </span>
                </label>
                <!--end::Option-->

                <!--begin::Option-->
                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                    <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                    <span class="form-check-label text-gray-600">
                        Mastercard
                    </span>
                </label>
                <!--end::Option-->

                <!--begin::Option-->
                <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" name="payment_type" value="american_express" />
                    <span class="form-check-label text-gray-600">
                        American Express
                    </span>
                </label>
                <!--end::Option-->
            </div>
            <!--end::Options-->            
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>

            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Content-->
</div>
<!--end::Menu 1-->    <!--end::Filter-->

    <!--begin::Export-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
        <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i>        Export
    </button>
    <!--end::Export-->

    <!--begin::Add customer-->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
        Add Customer
    </button>
    <!--end::Add customer-->
</div>
<!--end::Toolbar-->

<!--begin::Group actions-->
<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
    <div class="fw-bold me-5">
        <span class="me-2" data-kt-customer-table-select="selected_count"></span> Selected
    </div>

    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
        Delete Selected
    </button>
</div>
<!--end::Group actions-->        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        
<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                </div>
            </th>
            <th class="min-w-125px">Customer Name</th>
            <th class="min-w-125px">Email</th>            
            <th class="min-w-125px">Company</th>
            <th class="min-w-125px">Payment Method</th>
            <th class="min-w-125px">Created Date</th>
            <th class="text-end min-w-70px">Actions</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
                                <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td>
                    <a href="/metronic8/demo1/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
                </td>
                <td>
                    <a href="#" class="text-gray-600 text-hover-primary mb-1">smith@kpmg.com</a>
                </td>
                <td>
                    -                </td>
                <td data-filter="mastercard">
                    <img src="/metronic8/demo1/assets/media/svg/card-logos/mastercard.svg" class="w-35px me-3" alt="" />
                    **** 5989                </td>
                <td>
                    14 Dec 2020, 8:43 pm                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>         
                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="/metronic8/demo1/apps/customers/view.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->
    
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->
                </td>
            </tr>
            </tbody>
</table>
<!--end::Table-->    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

<!--begin::Modals-->
<!--begin::Modal - Customers - Add-->

<!--end::Modal - New Card--><!--end::Modals-->        </div>
        <!--end::Content container-->
    </div>
<!--end::Content-->	

                                    </div>
                <!--end::Content wrapper-->

                                    
                           </div>
            <!--end:::Main-->

            
        <!--end::Wrapper-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/esh2/customers/list.blade.php ENDPATH**/ ?>