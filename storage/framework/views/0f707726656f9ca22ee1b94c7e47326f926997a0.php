<?php
   $classType = Helper::classType();
    $getAttendanceStatus= Helper::getAttendanceStatus();
   
?>
 
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<input type="hidden" id="session_id" value="<?php echo e(Session::get('role_id') ?? ''); ?>">
 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-9">
    <div class="card card-outline card-orange">
         <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-calendar-check-o"></i> &nbsp;<?php echo e(__('student.Fill Students Attendance')); ?></h3>
        <div class="card-tools">
        <a href="<?php echo e(url('studentsAttendanceView')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?></a>
        <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?></a>
        </div>
        
        </div>         
          <?php if(count($classType) > 0): ?>
        <form id="quickForm" action="#" method="post" >
            <?php echo csrf_field(); ?> 
            <div class="row m-2">
                 <?php if(Session::get('role_id') == 1): ?>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="State" class="required"><?php echo e(__('student.Admission No.')); ?></label>
                     <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                  </div>
                </div>
                <?php endif; ?>
                <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('common.Class')); ?></label>
            			<select class="form-control select2" id="class_type_id" name="class_type_id" >
            			     <?php if(Session::get('role_id') != 2): ?>
            			<option value=""><?php echo e(__('common.Select')); ?></option>
            			<?php endif; ?>
                         <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>
            	 <?php if(Session::get('role_id') == 1): ?>
                <div class="col-md-4">
            		<div class="form-group">
            			<label><?php echo e(__('common.Search By Keywords')); ?></label>
            			<input type="text" class="form-control" id="searchName" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>"> 
            	    </div>
            	</div> 
            	<?php endif; ?>
                <div class="col-md-1 ">
                     <label for="" class="text-white"><?php echo e(__('common.Search')); ?></label>
            	    <button type="button" class="btn btn-primary" onclick="SearchValue()" ><?php echo e(__('common.Search')); ?></button>
            	</div>
            </div>
        </form>        

 
            <form id='myForm'action="<?php echo e(url('studentsAttendanceAdd')); ?>" method="post">
                <?php echo csrf_field(); ?> 
                <div class="row m-2">
                	<div class="col-md-2">
                		<div class="form-group">
                			<label class="text-danger"><?php echo e(__('common.Date')); ?>*</label>
                			<input class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> date_" type="date" id="date1" name="date" value="<?php echo e(date('Y-m-d')); ?>">
                              	<?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            						<span class="invalid-feedback" role="alert">
            							<strong><?php echo e($message); ?></strong>
            						</span>
            					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>            	    
                	    </div>
                	</div> 
                	<div class="col-md-9 mt-4" style="align-content: center;">
                	
                	<h5 id="today_event"></h5>
                
                	</div> 
                	</div> 
                
           
                	<div class="col-md-12">
             
            	
                
                  <table  class="table table-bordered table-striped border  dtr-inline  student_data">
                  <thead>
                  <tr role="row" class="colored_tr">
                            <th>Sr. No.</th>
                            <th><?php echo e(__('student.Admission No.')); ?></th>
                            <th><?php echo e(__('common.Name')); ?></th>
                            <th><?php echo e(__('common.Class')); ?></th>
                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                            <th><?php echo e(__('common.Mobile No.')); ?></th>
                            <th><?php echo e(__('student.Attendance')); ?></th>
                        </tr>
        
                    </thead>
                    <tbody class="student_list_show">
            
                    </tbody>
                </table>
                </div>
             
                <div class="row m-2 student_data" >
                    <div class="col-md-12 text-center"><button type="submit" class="btn btn-primary" ><?php echo e(__('student.Submit Attendance')); ?></button></div>
                </div>
                </div>
            </form>        
            
              <?php else: ?>
                <p class="text-center text-danger mt-2">You are not yet authorized for marking attendance .... please contact your administrator</p>
                  <?php endif; ?>
    </div>

    <div class="col-3" >

    <div class="card-header bg-primary text-center d-flex" style="border-radius:3px">
        <h6 style="padding-top: 6px;"><i class="fa fa-calendar"></i> &nbsp;Academic Calender</h6> 
        <a href="<?php echo e(url('add_weekend')); ?>" target="_blank" class="btn btn-primary  btn-sm mt-1 ml-2"><i class="fa fa-plus"></i></a>
     
        
        </div>
        <table class="table table-bordered" style="font-size:13px">
            <thead>
                <tr>
                    <!-- <th scope="col">Sr. No</th> -->
                    <th scope="col">Date</th>
                    <th scope="col">Day</th>
                    <th scope="col">Event</th>
                </tr>
            </thead>
            <tbody id="calendarTableBody">
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>
</div>


<!-- Loading screen modal -->
<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="w-100">
      <div class="modal-body text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only text-white">Loading...</span>
        </div>
        <p class="mt-2 text-white loading_text">Loading...</p>
      </div>
    </div>
  </div>
</div>

 <style>
    /* Centering the loader */
    .loader {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1050; /* Make sure this is higher than the modal backdrop */
    }
  </style>
<script>


var academicCalender  = [];
function AcademicCalender(){

  $.ajax({
    url: 'academic_calendar',
    method: 'GET',
    success: (data) => {
      academicCalender = data.data;
      loadAcademic()
    },
    error: (xhr, status, error) => {
      console.error('Error fetching academic calendar:', error);
      // Handle error scenario
    }
  });
 
}
AcademicCalender()

function loadAcademic(){

  $('#today_event').html('');
  var dateOfEvent = '';
   var attendaceStatus = '';
var checkDate = false;
// function formatDate(dateString) {
//     var eventDate = new Date(dateString);
//     var options = { day: '2-digit', month: 'short', year: 'numeric' };
//     return eventDate.toLocaleDateString('en-GB', options).replace(/ /g, '-');
// }




var filteredDates = academicCalender.map(function(event,index) {


  var eventDate = new Date(event.date);
  var currentDate = new Date($('#date1').val());
  var year = currentDate.getFullYear(); // Get the year (YYYY)
var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Get the month (MM), adding 1 because month is zero-indexed
var day = ('0' + currentDate.getDate()).slice(-2); // Get the day (DD)

// Format currentDate in YYYY-MM-DD format
var formattedDate2 = year + '-' + month + '-' + day;

  
  if (event.date === formattedDate2) {
    if(event.is_attendance_submitted == 0)
    {
    checkDate=true;
    attendaceStatus = event.attendance_status;
    dateOfEvent = event.date;
    } 
    $('#today_event').html("<span class='text-primary'>Event/Schedule On Selected Date Is </span>"+event.event_schedule);
     
    }

    var day = eventDate.getDate(); // Get the day of the month (1-31)
    var monthIndex = eventDate.getMonth(); // Get the month index (0-11)

    var monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    var formattedDate = day + '-' + monthNames[monthIndex];


    return {
        srno: index+1, // Assuming 'id' from academicCalenderObj represents Sr. No
        // date: formatDate(event.date),
        date:formattedDate,
        day: event.day,
        event: event.event_schedule,
        checkDate:checkDate
    };
});



if(checkDate)
{
$('.student_data').hide();
$('.loading_text').text('Please wait while system is auto submitting attendance ...')
$('#loadingModal').modal('show');

autoStudentAttendance();
}

function populateTable() {
    var tableBody = document.getElementById('calendarTableBody');
    
    // Clear existing rows
    tableBody.innerHTML = '';

    // Loop through filteredDates and create table rows
    filteredDates.forEach(function(event, index) {



      var row = `<tr class="${event.checkDate ? 'bg-primary blink' : ''}">
               <td>${event.date}</td>
               <td>${event.day}</td>
               <td>${event.event}</td>
           </tr>`;
        tableBody.innerHTML += row;
    });
}

// Call populateTable function to populate the table on page load
populateTable();


function autoStudentAttendance() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'autoStudentAttendance',
        type: 'POST',
        data:{date:dateOfEvent,attendanceStatus:attendaceStatus},
        success: function(response) {
            hideLoading(); 
            $('.student_data').show();
$('.loading_text').text('Loading ...');
SearchValue()
          
        },
        error: function(xhr, status, error) {
            hideLoading(); // Assuming hideLoading() is defined elsewhere
            // Handle error
            console.error('Error occurred while updating attendance:', error);
            console.error(xhr.responseText);
        }
    });
}
}





        // Show loading screen
  function showLoading() {
    $('#loadingModal').modal('show');
   
  }

  // Hide loading screen
  function hideLoading() {
    $('#loadingModal').modal('hide');
  }

    $('#myForm').submit(function(event) {
   
   showLoading();     
        var count = 0;
        var id= 0;
           var date = $('.date_').val();
          var attendance = [];
        event.preventDefault(); // Prevent default form submission
        $(".checkbox").each(function(){
    if ($(this).prop('checked')==true){ 
        id= $(this).val();
        attendance[count] = { 'time': $('#time_'+id).val() ,'email': $('.attendance_status_'+id).attr('data-email'),'name': $('.attendance_status_'+id).attr('data-name'),'mobile': $('.attendance_status_'+id).attr('data-mobile'),'admission_id' :$('.attendance_status_'+id).attr('data-admission_id') ,'class_type_id':$('.attendance_status_'+id).attr('data-class_type_id'),'attendance_status':$('.attendance_status_'+id).val()}
        count++;
    }
    
    
    
});

 $.ajax({
      headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            url: 'studentsAttendanceAdd',
            type: 'POST',
          //  contentType: 'application/json',
            data: {admission_ids :JSON.stringify(attendance),
            date:date
                
            }, // Send the entire form data
            success: function(response) {
                hideLoading()
              
             //   window.location.href ='<?php echo e(url('/')); ?>'+'/studentsAttendanceView';
            },
            error: function(xhr, status, error) {
                hideLoading()
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
    function SearchValue() {
         $('#loadingModal').modal('show');
        var name = $('#searchName').val();
        var class_type_id = $('#class_type_id :selected').val();
        var custom_date = $('#date1').val();
        var admissionNo = $('#admissionNo').val();
        var URL = "<?php echo e(url('/')); ?>";
        if(class_type_id > 0 || name != '' || admissionNo != ''){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: URL+'/SearchValueAtten',
            data: {custom_date:custom_date,class_type_id:class_type_id,name:name,admissionNo:admissionNo},
            success: function (data) {
                $('.student_list_show').html(data);
                 $('#loadingModal').modal('hide');
                 AcademicCalender()
            }
          });
        }else{
                toastr.error('Please put a value in minimum one column !');
                  $('#loadingModal').modal('hide');
            }               
    }; 
$( document ).ready(function() {
  $('#loadingModal').modal({
    backdrop: 'static',
    keyboard: false
})
     var role_id = "<?php echo e(Session::get('role_id')); ?>";
    if(role_id == 2){
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);        
    }
}); 
</script>  
<script>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

     <script>
             $(document).ready(function(){ 
                        $('#masterCheckbox').click(function(){
                            if($(this).prop('checked')){
                                $('.checkbox').prop('checked',true);
                            }else{
                                $('.checkbox').prop('checked',false);
                            }
                        });
                        $(document).on('click','.checkbox',function(){
                            var checkbox_length = $('.checkbox').length;
                            var checked_length = $('.checkbox:checked').length;
                            
                            if(checked_length === checkbox_length){
                                $('#masterCheckbox').prop('checked',true);
                            }else{
                                $('#masterCheckbox').prop('checked',false);
                            }
                        }); 
                    });
              </script>
              
              <style>
                  .colored_tr th{
                      padding:5px;
                  }
                  .colored_tr{
                      background:#673ab7;
                      font-size:14px;
                      color:white;
                      position:sticky;
                      top:0;
                  }
                  @keyframes  blink {
  0% {
    background-color: transparent; /* Start with transparent background */
  }
  50% {
    background-color: #007bff; /* Blink to primary color */
  }
  100% {
    background-color: transparent; /* Back to transparent */
  }
}

/* Apply animation to elements with bg-primary class */
.blink {
  animation: blink 1s infinite; /* Use the blink animation infinitely */
}
              </style>
         
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/students/attendance/attendance_add.blade.php ENDPATH**/ ?>