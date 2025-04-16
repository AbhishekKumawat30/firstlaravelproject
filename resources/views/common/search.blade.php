
@if(!empty($enquiry) && $enquiry->count() > 0)
<div id="" class="dt-container dt-bootstrap5 dt-empty-footer">
    <div id="" class="table-responsive">
        <table class="table table-hover table-striped align-middle table-row-dashed fs-7 dataTable" id="" style="width: 1199.5px;">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="">Action</th>
                    <th class="w-10px">Sr</th>
                    <th class="">Name</th>
                    <th class="">Mobile</th>
                    <th class="">Address</th>
                    <th class="">Reminder</th>
                    <th class="">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold" id="">
                @php
                    $i = 1;
                @endphp
                @foreach($enquiry as $enq)
                    @php
                        $enqStatus = $enquiryStatus->where('id', $enq->responce_status_id)->first();
                        $user = DB::table('users')->where('id', $enq->user_id)->whereNull('deleted_at')->get('name')->first();
                    @endphp
                
                <tr>
                    <td>
                        <form action="{{ url('esh2/enquiry/list') }}" method="post">
                            @csrf
                        <button type="submit" name="searchEnquiryId" value="{{ $enq->id ?? '' }}" class="btn btn btn-icon btn-info me-2 mb-2 btn-outline btn-outline-dashed btn-outline-primary pulse pulse-primary"><i class="ki-duotone ki-magnifier fs-1"><span class="path1"></span><span class="path2"></span></i><span class="pulse-ring"></span></button>
                        </form>
                    </td>
                    <td class="pt-0">{{ $i++ }}</td>
                    <td class="pt-0 d-flex align-items-center"><div class="symbol symbol-circle symbol-50px overflow-hidden me-3"><a class="text-dark" target="blank" href="https://web.rusoft.in/esh2/enquiry/view/{{ $enq->id ?? '' }}">
                        @if(!empty($enq->image))
                            <div class="symbol-label"><img src="{{ env('IMAGE_SHOW_PATH') . 'esh2/enquiry/' . $enq->image }}" alt="Enquiry Image" class="w-100" /></div>
                        @else
                            <div class="symbol-label fs-3 bg-light-danger text-danger">{{ $enq->name[0] ?? '' }}</div>
                        @endif
                        </a></div><div class="d-flex flex-column"><small>{{ $enq->name ?? '' }}</small>
                        @if($enq->department_id == 1)
                            <span class="badge badge-light-success">School</span>
                        @elseif($enq->department_id == 2)
                            <span class="badge badge-light-info">Coaching</span>
                        @elseif($enq->department_id == 3)
                            <span class="badge badge-light-warning">Library</span>
                        @elseif($enq->department_id == 4)
                            <span class="badge badge-light-danger">Hostel</span>
                        @elseif($enq->department_id == 5)
                            <span class="badge badge-light-primary">Website</span>
                        @elseif($enq->department_id == 6)
                            <span class="badge badge-light-secondary">CRM</span>
                        @elseif($enq->department_id == 7)
                            <span class="badge badge-light-dark">Custom</span>
                        @else
                        @endif
                        
                    </div></td>
                    <td class="pt-0"><small><a href="tel://{{ $enq->mobile ?? '' }}">{{ $enq->mobile ?? '' }}</a> <br><a href="tel://{{ $enq->mobile2 ?? '' }}">{{ $enq->mobile2 ?? '' }}</a> &nbsp; <a href="mailto:{{ $enq->email ?? '' }}">{{ $enq->email ?? '' }}</a></small></td>
                    <td class="pt-0"><small>{{ $enq->address ?? '' }}</small></td>
                    <td class="pt-0 text-gray-800"><small>{{ $enq->reminder_date ?? '' }}<hr class="m-0"><span class="text-primary">{{ $enq->message ?? '' }}</span></small></td>
                    <td class="pt-0"><small><div class="badge badge-light-{{ $enqStatus->color ?? '' }} fw-bold">{{ $enqStatus->name ?? '' }}</div><br>{{ $user->name ?? '' }} | {{ date('l d/m/Y h:i a', strtotime($enq->updated_at)) ?? '' }}</small></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif