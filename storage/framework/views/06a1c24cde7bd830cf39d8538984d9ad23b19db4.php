<?php
$classType = Helper::classType();
$getState = Helper::getState();
$getcitie = Helper::getCity();

$getCountry = Helper::getCountry();

?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-outline card-orange">
            <div class="card-header bg-primary flex_items_toggel">
              <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;<?php echo e(__('student.View Students Admission')); ?></h3>
              <div class="card-tools">
                <a href="<?php echo e(url('admissionAdd')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><span class="Display_none_mobile"><?php echo e(__('common.Add')); ?> </span></a>
                <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><span class="Display_none_mobile"><?php echo e(__('common.Back')); ?> </span></a>
              </div>

            </div>
            
            <form id="quickForm" action="<?php echo e(url('bulkIdPrint')); ?>" target='_blank'method="post">
              <?php echo csrf_field(); ?>
              <div class="row m-2">

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="State" class="required"><?php echo e(__('student.Admission No.')); ?></label>
                     <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                  </div>
                </div>
                <div class="col-md-2 d-none">
                  <div class="form-group">
                    <label for="State" class="required"><?php echo e(__('common.State')); ?></label>
                    <select class="form-control select2" id="state_id" name="state_id">
                      <option value="" ><?php echo e(__('common.Select')); ?></option>
                      <?php if(!empty($getState)): ?>
                      <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == $search['state_id']) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                    </select>
                  </div>
                </div>
                <div class="col-md-2 d-none">
                  <div class="form-group">
                    <label for="City"><?php echo e(__('common.City')); ?></label>
                    <select class="form-control select2" name="city_id" id="city_id">
                      <option value=""><?php echo e(__('common.Select')); ?></option>
                      <?php if(!empty($getcitie)): ?>
                      <?php $__currentLoopData = $getcitie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($city->id ?? ''); ?>" <?php echo e(($city->id == $search['city_id']) ? 'selected' : ''); ?>><?php echo e($city->name ?? ''); ?> <?php echo e($city->id ?? ''); ?></option>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label><?php echo e(__('common.Class')); ?></label>
                    <select class="select2 form-control" id="class_type_id1" name="class_type_id">
                      <option value="" selected><?php echo e(__('common.Select')); ?></option>
                      <?php if(!empty($classType)): ?>
                      <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label><?php echo e(__('common.Search By Keywords')); ?></label>
                    <input type="text" class="form-control" id="name_search" name="name" placeholder="<?php echo e(__('Ex. Student Name,Father Name, Mobile')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
                  </div>
                </div>
                <div class="col-md-2 ">
                <label class="text-white"><?php echo e(__('common.Generate')); ?></label>
                 <button type="submit" class="btn btn-primary" id="generate_ids"><?php echo e(__('Generate Bulk Ids')); ?></button>
               </div>

              </div>
            </form>

                <div class="row m-2">
              <div class="col-12" style="overflow-x:scroll;">
                <table id="studentList" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                    <tr role="row">
                      <th><?php echo e(__('common.SR.NO')); ?></th>
                      <th class="text-center">Image</th>
                      <th class="text-center"><?php echo e(__('student.Ad. No')); ?></th>
                      <th><?php echo e(__('common.Name')); ?></th>
                      <th><?php echo e(__('common.F Name')); ?></th>
                      <th><?php echo e(__('common.M Name')); ?></th>
                      <th><?php echo e(__('common.Class')); ?></th>
                      <th><?php echo e(__('common.Mobile')); ?></th>
                      <!--<th><?php echo e(__('student.Ad. Type')); ?></th>-->
                      <th><?php echo e(__('student.Ad. Date')); ?></th>
                      <th><?php echo e(__('common.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody id="product_list_show">

              
                  </tbody>
                </table>
              </div>
            </div>

            </div>
            </div>
            </div>
            </div>
            </section>
    </div>

            <!-- The Modal -->
            <div class="modal" id="Modal_id">
              <div class="modal-dialog">
                <div class="modal-content" style="background: #555b5beb;">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title text-white">Delete Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                  </div>

                  <!-- Modal body -->
                  <form action="<?php echo e(url('admissionDelete')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">



                      <input type="hidden" id="delete_id" name="delete_id">
                      <h5 class="text-white">Are you sure you want to delete ?</h5>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>


        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                        <form id="quickForm" action="<?php echo e(url('admissionView')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="row m-2">
        
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="State" class="required">Admission No.</label>
                             <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="Admission No." value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                          </div>
                        </div>
                        <div class="col-md-2 col-6">
                          <div class="form-group">
                            <label for="State" class="required"><?php echo e(__('messages.State')); ?></label>
                            <select class="form-control select2" id="state_id" name="state_id">
                              <option value=""><?php echo e(__('messages.Select')); ?></option>
                              <?php if(!empty($getState)): ?>
                              <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == $search['state_id']) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
        
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 col-6">
                          <div class="form-group">
                            <label for="City"><?php echo e(__('messages.City')); ?></label>
                            <select class="form-control select2" name="city_id" id="city_id">
                              <option value=""><?php echo e(__('messages.Select')); ?></option>
                              <?php if(!empty($getCity)): ?>
                              <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(($cities->id == $search['city_id']) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <?php if(Session::get('role_id') == 1): ?>
                        <div class="col-md-2 col-6">
                          <div class="form-group">
                            <label><?php echo e(__('messages.Class')); ?></label>
                            <select class="form-control select2" id="class_type_id" name="class_type_id">
                              <option value=""><?php echo e(__('messages.Select')); ?></option>
                              <?php if(!empty($classType)): ?>
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                       
                        <?php endif; ?>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label><?php echo e(__('messages.Search By Keywords')); ?></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('messages.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
                          </div>
                        </div>
                        <div class="col-md-1 text-center">
                          <button type="submit" class="btn btn-primary"><?php echo e(__('messages.Search')); ?></button>
                        </div>
        
                      </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
   
        
<div id="profileImgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img id="profileImg" src="" width="100%" height="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>        
        
            <script>

              $('#generate_ids').hide();
              $('#product_list_show').on('click', '.deleteData', function() {
                var delete_id = $(this).data('id');

                $('#delete_id').val(delete_id);
              });
              
                $('#product_list_show').on('click', '.profileImg', function() {
                    var profileImgUrl = $(this).data('img');
                    if(profileImgUrl != ''){
                        $('#profileImgModal').modal('show');
                        $('#profileImg').attr('src',profileImgUrl);
                    }
                });
                
                
                
                $( document ).ready(function() {
    $("#studentList").DataTable({
                  "lengthChange": false, "autoWidth": false,"lengthChange": true, // Default number of rows per page
                "lengthMenu": [10, 20, 50,100] ,
                 "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#studentList_wrapper .col-md-6:eq(0)');
});
             
              
            </script>
            <style>
                .profileImg {
                    width:50px;
                    height:50px;
                    border-radius:50%;
                }
              .card-header .nav-pills .nav-link {
                color: #db5b06;
              }
              
           
    .new-data {
        display: none; /* Initially hide the newly appended data */
    }

            </style>
            
            
            <script>
            $( document ).ready(function() {
                
                
                
                
                   $('#name_search').on('keyup', function() {
                        $('#class_type_id1').val('')
                         $('#admissionNo').val('')
                          
                          $('#class_type_id1').trigger('change');
                       var searchString = $('#name_search').val().toLowerCase();
                       $('table tr td').each(function() {
                           
                           var cellText = $(this).text().toLowerCase();
    if (cellText.indexOf(searchString) !== -1) {
        $(this).closest('tr').show().siblings().hide();
        return false; 
    }
});

if(searchString == '')
{
    $('#product_list_show').html('');
}
 });
                   $('#admissionNo').on('keyup', function() {
                       $('#class_type_id1').val('')
                         $('#class_type_id1').trigger('change'); 
                   
                    
            });
             $('#class_type_id1').change(function(event) {
                  $('#studentList').DataTable().destroy();
                 var count =1;
                 var allStudents = <?php echo json_encode($data, 15, 512) ?>;
                   var container = $('#product_list_show');
                   container.html('');
                   var class_type_id = $('#class_type_id1').val();
                   var admissionNo = $('#admissionNo').val();
                   
                  

                 allStudents.forEach(function(item,index) {
                     
                
            
               if(class_type_id != '' )
                     {

                if(parseInt(item.class_type_id) != parseInt(class_type_id))
                {
                 
return;
                }
               
                $('#generate_ids').show();
                     }
                     else{
                      $('#generate_ids').hide();
                     }
                     
                
                     if(admissionNo != '' )
                     {
                       
                           if(parseInt(admissionNo) != parseInt(item.admissionNo)  )
                     {
                          return;
                     }
                         
                     }
           
                if(item.image){
                    var image = "<?php echo e(env('IMAGE_SHOW_PATH').'profile/'); ?>" + item.image;
                    var dataimg = image;

                }else{
                    var image = "<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>";
                    var dataimg = '';
                }
             
                   var newData = $('<tr class="new-data">' +
    '<td>' + (count++) + '</td>' +
    '<td><img class="profileImg pointer" src="' + image + '" data-img="' + dataimg + '"></td>' +
    '<td>' + (item.admissionNo ?? '') + '</td>' +
    '<td>' + (item.first_name ?? '') + ' ' + (item.last_name ?? '') + '</td>' +
    '<td>' + (item.father_name ?? '')  + '</td>' +
    '<td>' + (item.mother_name ?? '')  + '</td>' +
    '<td>' + (item.class_name ?? '')  + '</td>' +
    '<td>' + (item.mobile ?? '')  + '</td>' +
    '<td>' + (item.admission_date ?? '')  + '</td>' +
    '<td>' +
        '<a class="btn btn-primary btn-xs" data-toggle="dropdown" title="Show Option"><i class="fa fa-bars"></i></a>' +
        '<ul class="dropdown-menu" style="">' +
            '<a href="<?php echo e(url('/')); ?>/admissionStudentPrint/'+item.id+'" target="blank">' +
                '<li class="dropdown-item text-success" title="Admission Form"><i class="fa fa-print text-success"></i> Ad. Print </li>' +
            '</a>' +
            '<a href="<?php echo e(url('/')); ?>/admissionStudentIdPrint/'+item.id+'" target="blank">' +
                '<li class="dropdown-item text-success" title="Admission Id"><i class="fa fa-credit-card text-success"></i> Id Print</li>' +
            '</a>' +
            '<a href="<?php echo e(url('/')); ?>/admissionEdit/'+item.id+'" target="_blank">' +
                '<li class="dropdown-item text-primary" title="Admission Edit" ><i class="fa fa-edit text-primary"></i> Edit</li>' +
            '</a>' +
            '<a href="javascript:;" data-id="'+item.id+'" data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData">' +
                '<li class="dropdown-item text-danger" title="Admission Delete"><i class="fa fa-trash-o text-danger"></i> Delete</li>' +
            '</a>' +
        '</ul>' +
        '<a href="<?php echo e(url('/')); ?>/studentDetail/'+item.id+'" class="btn btn-success btn-xs ml-3" target="_blank" title="Admission View"><i class="fa fa-eye"></i></a>' +
    '</td>' +
'</tr>');
      container.append(newData);
        var randomNumber = Math.floor(Math.random() * 700) + 1;
                   newData.fadeIn(randomNumber);
            });
            
            
           
            $('#studentList').DataTable({
                  "lengthChange": false, "autoWidth": false,"lengthChange": true, // Default number of rows per page
                "lengthMenu": [10, 20, 50,100] ,
                 "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#studentList_wrapper .col-md-6:eq(0)');

 });
 });


            </script>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/students/admission/view_2.blade.php ENDPATH**/ ?>