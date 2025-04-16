<?php
$getFeesGroup = Helper::getFeesGroup();
$classType = Helper::classType();
$getPermission = Helper::getPermission();


?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 pr-0 <?php echo e(($getPermission->add == 1) ? '' : 'd-none'); ?>">
          <div class="card card-outline card-orange mr-1">
            <div class="card-header bg-primary">
              <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('fees.Add Fees Master')); ?> </h3>
              <div class="card-tools">
                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>
            <a href="<?php echo e(url('students_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> Back</a>-->
              </div>

            </div>
            <form id="quickForm" action="<?php echo e(url('feesMasterAdd')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="row m-2">
                <div class="col-md-4">
                  <div class="form-group">
                    <label style="color:red;"><?php echo e(__('messages.Class')); ?>*</label>
                    <select class="form-control select2 <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="class_type_id" name="class_type_id">
                      <option value=""><?php echo e(__('messages.Select')); ?></option>
                      <?php if(!empty($classType)): ?>
                      <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($type->id); ?>"><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['class_type_id'];
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
                <div class="col-md-8">

                  <table class="_table" id="tableId">
                    <thead>
                      <tr>
                        <th colspan="3" style="color:red;"><?php echo e(__('fees.Fees Group')); ?>*</th>
                        <th colspan="4" style="color:red;"><?php echo e(__('messages.Amount')); ?>*</th>
                        <th colspan="4" style="color:red;"><?php echo e(__('Editable')); ?>*</th>
                        <th width="50px"></th>

                      </tr>
                    </thead>
                    <tbody id="table_body">
                      <tr id="appendRow_0">

                        <td colspan="3">
                          <select class="form-control select2 <?php $__errorArgs = ['fees_group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select_fees_group_id" id="fees_group_id" name="fees_group_id[]" Required>
                            <option value=""><?php echo e(__('messages.Select')); ?></option>
                            <?php if(!empty($getFeesGroup)): ?>
                            <?php $__currentLoopData = $getFeesGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </select>
                        </td>
                        <td colspan="3">
                          <input class="form-control amount_0  <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="amount[]" id="amount"  placeholder="Amount" onkeypress="javascript:return isNumber(event)">
                        </td>
                        <td colspan="3">
                            <input class="form-control change_box" data-amount_id="0" type="checkbox" name="editable[]" id="editable">
                            <input type="hidden" name="editable_value[]" class="close_edited_value" id="editable_value" value="0">
                        </td>
                        <td colspan="3">
                          <div class="action_container">
                            <button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>

              <div class="row m-2">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary"><?php echo e(__('messages.submit')); ?> </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="col-md-12 pl-0">
          <div class="card card-outline card-orange ml-1">
            <div class="card-header bg-primary">
              <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('fees.Fees Master List')); ?></h3>
              <div class="card-tools">
                <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?> </a>
              </div>
            </div>
            <div class="row m-2">
                    <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <lable>Class</lable>
                                    <select class="form-control" id="classTypeID" name="class_type_id">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <lable>&nbsp;</lable><br>
                                <button type="button" class="filterData btn btn-primary">Submit</button>
                            </div>
                            </div>
                    </div>
              <div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
                  <thead>
                    <tr role="row">
                      <th><?php echo e(__('messages.Sr.No.')); ?></th>
                      <th><?php echo e(__('messages.Class')); ?></th>
                      <th><?php echo e(__('fees.Fees Group')); ?></th>
                      <?php if($getPermission->edit == 1): ?>
                      <th><?php echo e(__('messages.Action')); ?></th>
                       <?php endif; ?>

                  </thead>
                  <tbody id="">

                    <?php if(!empty($dataview)): ?>
                    <?php
                    $i=1
                    ?>
                    <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="all_data" data-class="<?php echo e($item->class_type_id); ?>">
                      <td><?php echo e($i++); ?></td>
                      <td><?php echo e($item['ClassTypes']['name'] ??''); ?></td>
                      <td>
                          <?php
                            $allData = DB::table('fees_master')->select('fees_master.amount','fees_group.name as fees_group_name','fees_master.id as fees_master_id')->leftjoin('fees_group','fees_group.id','=','fees_master.fees_group_id')
                            ->select('fees_master.amount','fees_group.name as fees_group_name','fees_master.id','fees_master.fees_group_id')
                            ->where('class_type_id',$item->class_type_id)->where('fees_master.session_id',Session::get('session_id'))->whereNull('fees_master.deleted_at')->get();
                      
                          ?>
                        <?php if(!empty($allData)): ?>
                        <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p style="margin-bottom: 0%;"> <?php echo e($mydata->fees_group_name ?? ''); ?> = <span><?php echo e($mydata->amount ?? ''); ?></span> &nbsp;&nbsp;&nbsp;
                     <?php
               
                     $isDeleteAllowed1 = DB::table('fees_detail')->where('fees_group_id',$mydata->fees_group_id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->whereNull('deleted_at')->count();
                      $isDeleteAllowed2 = DB::table('fees_assign_details')->where('fees_group_id',$mydata->fees_group_id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->whereNull('deleted_at')->count();
                  
                     ?>
                     
                    <?php if(($isDeleteAllowed1+$isDeleteAllowed2) == 0): ?>
                        <a href="javascript:;" data-groupname='<?php echo e($mydata->id ?? ''); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData <?php echo e(($getPermission->deletes == 1) ? '' : 'd-none'); ?>"><i class="fa fa-remove text-danger" title="Delete"></i></a>
                    <?php endif; ?>
                    
                  
                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </td>
                      <?php if($getPermission->edit == 1): ?>
                      <td>
                        <a href="<?php echo e(url('feesMasterEdit')); ?>/<?php echo e($item['class_type_id'] ?? ''); ?>" class="text-success"><i class="fa fa-edit pl-2"></i></a>
                      </td>
                      <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
<style>
    .padding_table thead tr{
    background: #6639b5;
    color:white;
}
    
.padding_table th, .padding_table td{
     padding:5px;
     font-size:14px;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    count = 0;
    $(".removeprodtxtbx").eq(0).css("display", "none");
    $(document).on("click", "#clonebtn", function() {
        
      count++;
      var newRow = '<tr id="appendRow_' + count + '">'
        + '<td colspan="3">'
        + '<select class="form-control select2" id="fees_group_id" name="fees_group_id[]" Required>'
        + '<option value=""><?php echo e(__("messages.Select")); ?></option>'
        + '<?php if(!empty($getFeesGroup)): ?>'
        + '<?php $__currentLoopData = $getFeesGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'
        + '<option value="<?php echo e($type->id ?? ""); ?>"><?php echo e($type->name ?? ""); ?></option>'
        + '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'
        + '<?php endif; ?>'
        + '</select>'
        + '</td>'
        + '<td colspan="3">'
        + '<input class="form-control amount_'+ count +'" type="text" name="amount[]" id="amount" Required placeholder="Amount" onkeypress="javascript:return isNumber(event)">'
        + '</td>'
        +'<td colspan="3">'
        +'<input class="form-control change_box" data-amount_id="'+ count +'" type="checkbox" name="editable[]">'
        +'<input type="hidden" class="close_edited_value" name="editable_value[]" value="0">'
        +'</td>'
        + '<td colspan="3">'
        + '<div class="action_container">'
        + '<button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button>'
        + '<button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>'
        + '</div>'
        + '</td>'
        + '</tr>';

      $('#table_body').append(newRow);
      $(".removeprodtxtbx").eq(count).css("display", "block");
      $(".addmoreprodtxtbx").eq(count).css("display", "none");
      
    
    });

    $(document).on("click", "#removerow", function() {
      $(this).parents('tr').remove();
      count--;
      window.calculateSum(); // Assuming you have a function named "calculateSum" defined elsewhere.
    });
  });
  
  $(document).ready(function(){
     $('.filterData').click(function(){
        var classId = $('#classTypeID').find(':selected').val();
        var elements = $('.all_data');
        var count = elements.length;
        
        for (var i = 0; i < count; i++) {
            if(classId != ""){
            var class_type_id = elements.eq(i).data('class');
            if(class_type_id == classId){
                elements.eq(i).show();
            }else{
                elements.eq(i).hide();
            }
            }else{
                elements.eq(i).show();
            }
        }
     }); 
  });
</script>

<script>
$(document).ready(function(){
   $(document).on('click','.change_box',function(){
       var amount_id = $(this).data('amount_id');
       if($(this).prop('checked')){
           $(this).siblings('input').val(1);
           $('.amount_' + amount_id).val(0);
           $('.amount_' + amount_id).attr('type','hidden');
       }else{
           $(this).siblings('input').val(0);
           $('.amount_' + amount_id).val(0);
           $('.amount_' + amount_id).attr('type','text');
       }
   }); 
});
</script>

<script>
    $('.deleteData').click(function() {
    var delete_id = $(this).data('groupname');

    $('#delete_id').val(delete_id);
  });
</script>
<!-- The Modal -->
<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('feesMasterDelete')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <input type=hidden id="delete_id" name=delete_id>
          <h5 class="text-white"><?php echo e(__('messages.Are you sure you want to delete')); ?> ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>
          <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('messages.Delete')); ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/fees/fees_master/feesMaster.blade.php ENDPATH**/ ?>