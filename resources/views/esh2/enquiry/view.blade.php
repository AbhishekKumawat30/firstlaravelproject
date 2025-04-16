@extends('common.app')
@section('content')
@php
    $resStatus = DB::table('enquiry_status')->where('id',$enquiry->responce_status_id)->first();
    $involvedUser = DB::table('users')->whereIn('id', $history->pluck('user_id'))->get();
@endphp
<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
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
                Enquiry History
                    </h1>
            <!--end::Title-->
            </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
               
            
            <!--begin::Primary button-->
                    <a href="{{ url('esh2/enquiry/list') }}" class="d-flex btn btn-sm fw-bold btn-primary" >
                    <i class="ki-duotone ki-left fs-2"></i> Back        </a>
                <!--end::Primary button-->
        </div>
        <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
        <!--end::Toolbar-->                                        


<div id="kt_app_content" class="app-content  flex-column-fluid ">
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
        
<!--begin::Card-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Summary-->
        

<!--begin::User Info-->
<div class="d-flex flex-center flex-column py-5">
    <!--begin::Avatar-->
    <div class="symbol symbol-100px symbol-circle mb-7">
        @if(!empty($enquiry->image))
        <img src="{{ env('IMAGE_SHOW_PATH') . 'esh2/enquiry/' . $enquiry->image }}" alt="image">
        @else
            <div class="symbol-label fs-3 bg-light-danger text-danger">{{ $enquiry->name[0] ?? '' }}</div>
        @endif
    </div>
    <!--end::Avatar-->

    <!--begin::Name-->
    <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
        {{ $enquiry->name ?? '' }}    </a>
    <!--end::Name-->

    <!--begin::Position-->
    <div class="mb-9">
        <!--begin::Badge-->
        <div class="badge badge-lg badge-light-{{ $resStatus->color ?? '' }} d-inline">{{ $resStatus->name ?? '' }}</div>
        <!--begin::Badge-->
    </div>
    <!--end::Position-->

    <!--begin::Info-->
    <!--begin::Info heading-->
    <div class="fw-bold mb-3">
        User Updates

        <span class="ms-2" ddata-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week.">
            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>        </span>
    </div>
    <!--end::Info heading-->

    <div class="d-flex flex-wrap flex-center">
        <!--begin::Stats-->
        @if(!empty($involvedUser))
        @foreach($involvedUser as $inUser)
            @php
                $attemptedCount = DB::table('enquiry_historys')->where('enquiry_id', $enquiry->id)->where('user_id', $inUser->id)->count();
            @endphp
        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
            <div class="fs-4 fw-bold text-gray-700">
                <span class="w-75px">{{ $attemptedCount ?? '0' }}</span>
                <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span class="path2"></span></i>            </div>
            <div class="fw-semibold text-muted">{{ $inUser->name ?? '' }}</div>
        </div>
        @endforeach
        @endif
        <!--end::Stats-->
    </div>
    <!--end::Info-->
</div>
<!--end::User Info-->        <!--end::Summary-->

        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                Details
                <span class="ms-2 rotate-180">
                    <i class="ki-duotone ki-down fs-3"></i>                </span>
            </div>

        </div>
        <!--end::Details toggle-->

        <div class="separator"></div>

        <!--begin::Details content-->
        <div id="kt_user_view_details" class="collapse show">
            <div class="pb-5 fs-6">
                @if(!empty($enquiry->mobile))
                    <div class="fw-bold mt-5">Mobile</div>
                    <div class="text-gray-600"><a href="tel://{{ $enquiry->mobile ?? '' }}" class="text-gray-600 text-hover-primary">{{ $enquiry->mobile ?? '' }}</a></div>
                @endif
                
                @if(!empty($enquiry->mobile2))
                    <div class="fw-bold mt-5">Mobile 2</div>
                    <div class="text-gray-600"><a href="tel://{{ $enquiry->mobile2 ?? '' }}" class="text-gray-600 text-hover-primary">{{ $enquiry->mobile2 ?? '' }}</a></div>
                @endif
                
                @if(!empty($enquiry->email))
                    <div class="fw-bold mt-5">Email</div>
                    <div class="text-gray-600"><a href="mailto://{{ $enquiry->email ?? '' }}" class="text-gray-600 text-hover-primary">{{ $enquiry->email ?? '' }}</a></div>
                @endif
                
                @if(!empty($enquiry->address))
                    <div class="fw-bold mt-5">Address</div>
                    <div class="text-gray-600">{{ $enquiry->address ?? '' }}</div>
                @endif
                
                @if(!empty($enquiry->department_id))
                    <div class="fw-bold mt-5">Department</div>
                    <div class="text-gray-600">@if($enquiry->department_id == 1) School @elseif($enquiry->department_id == 2) Coaching @elseif($enquiry->department_id == 3) Library @elseif($enquiry->department_id == 4) Hostel @elseif($enquiry->department_id == 5) Website @elseif($enquiry->department_id == 6) CRM @elseif($enquiry->department_id == 7) Custom @else {{ $enquiry->department_id ?? '' }} @endif</div>
                @endif
                
                @if(!empty($enquiry->type))
                    <div class="fw-bold mt-5">Type</div>
                    <div class="text-gray-600">@if($enquiry->type == 1) Client @elseif($enquiry->type == 2) Contact @elseif($enquiry->type == 3) Office Visit @elseif($enquiry->type == 4) Interview @elseif($enquiry->type == 5) Other @else {{ $enquiry->type ?? '' }} @endif</div>
                @endif
            </div>
        </div>
        <!--end::Details content-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

</div>
    <!--end::Sidebar-->

    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-15">
        

                <!--begin::Card-->
<div class="card card-flush mb-6 mb-xl-9">

    <!--begin::Card body-->
    <div class="card-body p-9 pt-4">
       
<div class="row pt-2">
                                @if($history->count() > 0)
                                <div class="col-md-12 bg-light-info pt-2" id="capture">
                                    @php
                                        $lastKey = $history->keys()->last();
                                  
                                    @endphp
                                    
                                    @foreach($history as $key => $item)
                                        @php
                                            $user = DB::table('users')->where('id',$item->user_id)->first();
                                            $status = DB::table('enquiry_status')->where('id',$item->responce_status_id)->first();
                                        @endphp
                                    <div class="row border-bottom border-primary pb-2">
                                        <div class="col-md-12">
                                            <p>{{ date('l, d-M-y, h:i A', strtotime($item->updated_at)) }} | Enquiry @if($key == $lastKey) Created @else Updated @endif by {{ $user->name ?? '' }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Updates :</p>
                                        </div>
                                        <div class="col-md-10 d-flex flex-wrap">
                                            @if(!empty($item->type)) <span class="m-1 p-1 bg-light-success">Type : @if($item->type == 1) Client @elseif($item->type == 2) Contact @elseif($item->type == 3) Office Visit @elseif($item->type == 4) Interview @elseif($item->type == 5) Other @else {{ $item->type ?? '' }} @endif</span> @endif
                                            @if(!empty($item->name)) <span class="m-1 p-1 bg-light-success">Name : {{ $item->name ?? '' }}</span> @endif
                                            @if(!empty($item->mobile)) <span class="m-1 p-1 bg-light-success">Mobile : {{ $item->mobile ?? '' }}</span> @endif
                                            @if(!empty($item->mobile2)) <span class="m-1 p-1 bg-light-success">Mobile 2 : {{ $item->mobile2 ?? '' }}</span> @endif
                                            @if(!empty($item->email)) <span class="m-1 p-1 bg-light-success">Email : {{ $item->email ?? '' }}</span> @endif
                                            @if(!empty($item->department_id)) <span class="m-1 p-1 bg-light-success">Department : @if($item->department_id == 1) School @elseif($item->department_id == 2) Coaching @elseif($item->department_id == 3) Library @elseif($item->department_id == 4) Hostel @elseif($item->department_id == 5) Website @elseif($item->department_id == 6) CRM @elseif($item->department_id == 7) Custom @else {{ $item->department_id ?? '' }} @endif</span> @endif
                                            @if(!empty($item->address)) <span class="m-1 p-1 bg-light-success">Address : {{ $item->address ?? '' }}</span> @endif
                                            @if(!empty($item->reminder_date)) <span class="m-1 p-1 bg-light-success">Reminder Date : {{ date('d-m-Y h:i A', strtotime($item->reminder_date)) ?? '' }}</span> @endif
                                            @if(!empty($item->remark)) <span class="m-1 p-1 bg-light-success">Remark : {{ $item->remark ?? '' }}</span> @endif
                                            @if(!empty($item->responce_status_id)) <span class="m-1 p-1 bg-light-success">Response Status : {{ $status->name ?? '' }}</span> @endif
                                            @if(!empty($item->status)) <span class="m-1 p-1 bg-light-success">Status : {{ $status->name ?? '' }}</span> @endif
                                        </div>
                                        @if(!empty($item->message))
                                        <div class="col-md-2 col-3">
                                            <p>Message :</p>
                                        </div>
                                        <div class="col-md-10 col-9">
                                            <p><b> {{ $item->message ?? '' }} </b></p>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach

                                </div>
                                <div class="col-md-12 col-12 text-center pt-3">
                                    <button class="btn btn-sm fw-bold btn-info me-2 mb-2" id="downloadBtn"><i class="ki-duotone ki-black-down"></i> Download</button>
                                </div>
                                @endif
                            </div>
       
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
 

    </div>
    <!--end::Content-->
</div>
<!--end::Layout-->
 
</div>
        <!--end::Content container-->
    </div>


    </div>
</div>




      
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="{{ URL::asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
            <script src="{{ URL::asset('public/assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>         
<script type="text/javascript">
  
    function capture() {
  const captureElement = document.querySelector('#capture')
  html2canvas(captureElement)
    .then(canvas => {
      canvas.style.display = 'none'
      document.body.appendChild(canvas)
      return canvas
    })
    .then(canvas => {
      const image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream')
      const a = document.createElement('a')
      a.setAttribute('download', 'Enquiry-History.png')
      a.setAttribute('href', image)
      a.click()
      canvas.remove()
    })
}

const btn = document.querySelector('#downloadBtn')
btn.addEventListener('click', capture)
</script>

 
 

   

@endsection 