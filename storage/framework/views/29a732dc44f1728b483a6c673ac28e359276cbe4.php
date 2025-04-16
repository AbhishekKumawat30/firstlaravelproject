 <?php

    $getFeesType = Helper::feesType();
    $getPaymentMode = Helper::getPaymentMode();
    $firstAmount = $data['FeesAssign']->total_amount;
    $feesDetails = DB::table('fees_assign_details')
                ->where('session_id',Session::get('session_id'))
                ->where('branch_id',Session::get('branch_id'))
                ->where('fees_assign_id',$data['FeesAssign']->id)
                ->whereNull('deleted_at')
                ->get();
?>             
        
 
 <div class="row mb-3">
     <div class="col-12 col-md-12 text-center p-2"> <h3 class="colored_header"><?php echo e(__('fees.Fees Pay')); ?></h3></div>
    <div class="col-12 col-md-7">
        <div class="card">
     
               <?php if(!empty($data['FeesCollect']->amount)): ?>
               <?php
                    $remainingAmt = ($data['FeesAssign']->total_amount - $data['FeesAssign']->total_discount) - $data['FeesCollect']->amount;
                    $firstAmount = $remainingAmt;
                   
                ?>
                
                <?php else: ?>
                
                <?php
                 $remainingAmt = $data['FeesAssign']->total_amount - $data['FeesAssign']->total_discount;
                $firstAmount = $remainingAmt;
            
         
            ?>
            
            <?php endif; ?>

                   
           
                <div class"card-body">
                    
                    
                     <form id='myForm' method="post">
                        <?php echo csrf_field(); ?>
                        <input  type="hidden" id="admission_id" name="admission_id" value="<?php echo e($data['stuData']['id']); ?>" />
                        <input  type="hidden" id="email" name="email" value="<?php echo e($data['stuData']['email']); ?>" />
                        <input  type="hidden" id="mobile" name="mobile" value="<?php echo e($data['stuData']['mobile']); ?>" />
                        <input  type="hidden" id="class_type_id1" name="class_type_id" value="<?php echo e($data['stuData']['class_type_id']); ?>" />
                   
                        <div id='add_head_row'>
                    <div class="row m-2 head_row" id='head_row'>
                        <div class="col-md-3">
                            <label class="text-danger"><?php echo e(__('Select Head')); ?>*</label>
                            <select class="form-control selected_head" data-key1='0' name="selected_head[]" required>
                                <?php if(!empty($feesDetails)): ?>
                                 <option value="">Select Group</option>
                                     <?php $__currentLoopData = $feesDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$fees->fees_group_id)->first();
                            ?>

                                    <option value="<?php echo e($feesGroup->id); ?>"><?php echo e($feesGroup->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>  
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label><?php echo e(__('fees.Receipt No.')); ?></label>
                            <input type="text" class="form-control" placeholder="<?php echo e(__('fees.Receipt No.')); ?>" name="slip_no[]"  value="<?php echo e($data['BillCounter']['counter']+1 ?? ''); ?>" onkeypress="javascript:return isNumber(event)"  readonly>
                        </div>
                        <div class="col-md-3 d-none">
                            <label><?php echo e(__('fees.Remaining Amount')); ?></label>
                            
                  
                            <input type="text" class="form-control"  placeholder="<?php echo e(__('fees.Remaining Amount')); ?>" id="remain_amount" name="remain_amount[]" onkeypress="javascript:return isNumber(event)" value="<?php echo e($firstAmount ?? ''); ?>" readonly>
                        
                        </div>
                         <div class="col-md-2">
                            <label class="text-danger"><?php echo e(__('common.Amount')); ?>*</label>
                            <input type="tel" class="form-control change_amount"  placeholder="<?php echo e(__('common.Amount')); ?>" id="amount_0" name="amount[]" onkeypress="javascript:return isNumber(event)"  required>
                        </div>
                        
                        <!--<div class="col-md-3">-->
                        <!--    <label><?php echo e(__('fees.Final Amount')); ?></label>-->
                        <!--    <input type="text" class="form-control" placeholder="<?php echo e(__('fees.Final Amount')); ?>" id="pay_amt" name="pay_amt[]" value="<?php echo e($firstAmount ?? ''); ?>" readonly required>-->
                        <!--</div>-->
                        <div class="col-md-2">
                            <label class='text-white mb-1'><?php echo e(__('Add Row')); ?></label>
                          <div class="action_container">
                           
                            <button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow" >Delete Head</button>
                          </div>
                        </div>
                        
                    </div>
                    </div>
                        <hr>
                        <div class="row m-2">
                        <div class="col-md-4">
                            <label class="text-danger"><?php echo e(__('fees.Payment Mode')); ?>*</label>
                            <select class="form-control" id="payment_mode_id" name="payment_mode_id" required>
                                <?php if(!empty($getPaymentMode)): ?>
                                    <?php $__currentLoopData = $getPaymentMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>  
                            </select>
                        </div>
                        
                        <div class="col-md-3" id="transition_id_input" style="display:none;">
                            <label>Transaction Id</label>
                            <input type="text" class="form-control" placeholder="Transaction Id" id="transition_id" name="transition_id">
                        </div>
                        <div class="col-md-3" id="bank_name_input" style="display:none;">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" placeholder="Bank Name" id="bank_name" name="bank_name">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="text-danger"><?php echo e(__('Payment Date')); ?>*</label>
                            <input type='date' class='form-control' name='date' value="<?php echo e(date('Y-m-d')); ?>" />
                        </div>
                        
                        <!--<div class="col-md-4 transaction_slip d-none">-->
                        <!--    <label><?php echo e(__('fees.Transaction Slip')); ?></label>-->
                        <!--    <input type="file" class="form-control"  id="transaction_slip" name="transaction_slip" >-->
                        <!--</div>-->
                    </div>
                  
                        <div class="row p-2 ">
                   
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i><?php echo e(__('Add Head')); ?> </button>
                           <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i><?php echo e(__('fees.Collect')); ?> </button>
                        <!--<button type="submit" class="btn btn-primary" formtarget="blank" name="print" value="print"><i class="fa fa-money"></i> <?php echo e(__('fees.Collect & Print')); ?></button>-->
                        </div>
                        </div>
                    </form>
            </div>
            
        </div>
    </div>
    <div class="col-12 col-md-5">
        <div class="card">
            <div class="card-body padding_body">
                <p class="heading_text mb-0">Fees Structure :- </p>
               
                    <table class="table table-bordered padding_table">
                        <thead>
                            <tr>
                                <th>Fees Type</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Paid</th>
                                <th>Pending</th>
                                <!--<th>Breakdown</th>-->
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                $total_amount = 0;
                                $total_discount = 0;
                                $total_paid = 0;
                                $total_pending = 0;
                            ?>
                            <?php $__currentLoopData = $feesDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$fees->fees_group_id)->first();
                            ?>
                            <div class="col-md-12">
                                <tr>
                                    <td><?php echo e($feesGroup->name ?? ''); ?></td>
                                    <td>₹ <?php echo e($fees->fees_group_amount ?? ''); ?></td>
                                    <td>₹ <?php echo e($fees->discount ?? 0); ?></td>
                                    <td>
                                        <?php if(!empty($feesGroup)): ?>
                                        
                                        <?php
                                            $paid = DB::table('fees_detail')->whereNull('deleted_at')->where('admission_id',$fees->admission_id)->where('fees_group_id',$feesGroup->id)->sum('paid_amount');
                                        ?>
                                                                                
                                        <?php endif; ?>
                                        
                                        ₹ <?php echo e($paid ?? 0); ?>

                                    </td>
                                    
                                    <?php
                                        $pending_amount = (($fees->fees_group_amount) - ($fees->discount)) - ($paid);
                                    ?>
                                
                                <td id="pending_by_group_id_<?php echo e($feesGroup->id ?? ''); ?>" class="<?php echo e($pending_amount == 0 ? 'bg-success' : ''); ?>"  data-pending_amount='<?php echo e($pending_amount ?? "0"); ?>'>₹ <?php echo e($pending_amount ?? "0"); ?></td>
                                        
                                    <?php
                                        $total_amount += $fees->fees_group_amount ?? 0;
                                        $total_discount += $fees->discount ?? 0;
                                        $total_paid += $paid ?? 0;
                                    ?>
                            
                                    <!--<td class="text-center">
                                        <?php if(!empty($fees->fees_breakdown)): ?>
                                            <a href="<?php echo e(url('fees_breakdown_details')); ?>/<?php echo e($fees->id); ?>" target="_blank"><button class="btn btn-xs btn-primary"><i class="fa fa-print"></i></button></a>
                                            <?php else: ?>
                                            <p class="mb-0">NA</p>
                                        <?php endif; ?>
                                    </td>-->
                                </tr>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        
                        <tfoot class="tfoot_tr">
                            <tr>
                                <td>Total</td>
                                <td>₹ <?php echo e($total_amount ?? ''); ?></td>
                                <td>₹ <?php echo e($total_discount ?? ''); ?></td>
                                <td>₹ <?php echo e($total_paid ?? ''); ?></td>
                                <td>₹ <?php echo e((($total_amount ?? '0') - ($total_discount ?? '0')) - ($total_paid ?? '0')); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>        
</div>

       
<div class="card">
    <div class="card-body">
        <div class="row m-2">
        <!--<div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    <?php
                        //dd($data['stuData']);
                    ?>
                 
                    <img src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$data['stuData']['image']); ?>" width="100" height="100" style="border: 2px solid lavenderblush;border-radius: 10px;padding: 10px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                </div>
                <div class="col-md-9">
                    <table class="table table-bordered table-striped dataTable dtr-inline small_td">
                        <tr>
                            <td><b><?php echo e(__('common.Name')); ?></b></td>
                            <td><?php echo e($data['stuData']['first_name'] ?? ''); ?> <?php echo e($data['stuData']['last_name'] ?? ''); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo e(__('common.Class')); ?></b></td>
                            <td><?php echo e($data['stuData']['ClassTypes']['name'] ?? ''); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo e(__('common.Mobile')); ?></b></td>
                            <td><?php echo e($data['stuData']['mobile'] ?? ''); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo e(__('common.Fathers Name')); ?></b></td>
                            <td><?php echo e($data['stuData']['father_name'] ?? ''); ?></td>
                        </tr>
                    </table>                        
                </div>
            </div>
        </div>-->
        <!--<div class="col-md-6">-->
        <!--    <table class="table table-bordered table-striped dataTable dtr-inline small_td">-->
        <!--        <tr>-->
        <!--            <td><b><?php echo e(__('fees.Total Amount')); ?></b></td>-->
        <!--            <td>₹ <span id="total_assign_amt"><?php echo e(($data['FeesAssign']->total_amount ?? 0 )- ($data['FeesAssign']->total_discount ?? 0)); ?></span> /-</td>-->
        <!--        </tr>-->
                
        <!--        <tr>-->
        <!--            <td><b><?php echo e(__('fees.Paid Amount')); ?></b></td>-->
        <!--            <td>₹ -->
        <!--            <?php if(!empty($data['FeesCollect']->amount)): ?>-->
        <!--            <?php echo e($data['FeesCollect']->amount-$data['FeesCollect']->discount ?? ''); ?>-->
        <!--            <?php else: ?>-->
        <!--            0-->
        <!--            <?php endif; ?>-->
        <!--            /-</td>-->
        <!--        </tr>-->
                
        <!--        <tr>-->
        <!--            <td><b><?php echo e(__('fees.Due Amount')); ?></b></td>-->
        <!--            <td>₹-->
        <!--            <span id="remainingAmt"><?php if(!empty($firstAmount)): ?><?php echo e($firstAmount ?? ''); ?><?php else: ?> 0 <?php endif; ?></span>-->
        <!--            </td>-->
        <!--        </tr>-->
        <!--    </table>-->
           
        <!--</div>-->
    
    </div>
    <div class="row">
        <div class="col-md-12 text-left"> 
            <p class="heading_text mb-2">Fee Receipts :-</p>
        </div>
        <div class="col-md-5 text-left mb-2 d-flex" style='align-items: center;'> 
           <span> Select Head :: </span>&nbsp;<select class="form-control w-50" id="receipt_by_head">
                                <?php if(!empty($feesDetails)): ?>
                                
                                     <option value="">Select Head</option>
                                     <?php $__currentLoopData = $feesDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$fees->fees_group_id)->first();
                            ?>

                                    <option value="<?php echo e($feesGroup->id); ?>"><?php echo e($feesGroup->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>  
                            </select>
        </div>
    
        
        <div class="col-md-7 text-left mb-2 " style='align-items: center;'> 
         <form target='_blank'action="<?php echo e(url('printFeesInvoice')); ?>" method="post">
                 <?php echo csrf_field(); ?>
        <div class='d-flex'>
           
         <span>Invoice Print :: </span>&nbsp;  <select class="form-control w-50" name='fees_invoice_id' required>
                                <?php if(!empty($data['FeesDetailsInvoices'])): ?>
                                 
                                     <option value="">Select Invoice</option>
                                     <?php $__currentLoopData = $data['FeesDetailsInvoices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     
                                    <option value="<?php echo e($val->fees_details_id ?? ''); ?>"><?php echo e($val->invoice_no ?? ''); ?> [<?php echo e(date('d-M-Y', strtotime($val->created_at))); ?>]</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>  
                            </select>
                            &nbsp;<button type="submit" class="btn btn-primary" target="_blank" ><i class="fa fa-money"></i> <?php echo e(__('Print Invoice')); ?></button>
                   </div>
                   </form>
                      </div>  
        
       
       
    </div>
    <table class="table table-bordered small_td p-3 " id="trColor">
                    <thead class='bg-primary'>
                        <tr>
                            <th><?php echo e(__('common.Date')); ?></th>
                            <th><?php echo e(__('fees.Receipt No.')); ?></th>
                            <th><?php echo e(__('common.Amount')); ?></th>
                            <th><?php echo e(__('fees.Payment Mode')); ?></th>
                            <th>Transaction Id</th>
                            <th>Bank Name</th>
                            <th>Payment Date</th>
                            <th><?php echo e(__('Head Name')); ?></th>
                            <th><?php echo e(__('common.Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i=1
                        ?>
                        <?php $__currentLoopData = $data['stuFeeDet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php
                                $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$item['fees_group_id'])->first();
                            ?>
                        <tr class="receipt_group_id receipt_group_id_<?php echo e($item['fees_group_id'] ?? ''); ?>">
                          
                            <td><?php echo e(date('d-M-Y', strtotime($item->date))); ?></td>
                             <td><?php echo e($item['receipt_no'] ?? ''); ?></td>
                            <td>₹ <?php echo e($item['total_amount'] ?? ''); ?></td>
                            <!--<td><?php echo e($item['discount'] ?? ''); ?></td>-->
                            <td><?php echo e($item['PaymentMode']['name'] ?? ''); ?></td>
                            <td><?php echo e($item['transition_id'] ?? '-'); ?></td>
                            <td><?php echo e($item['bank_name'] ?? '-'); ?></td>
                            <td><?php echo e(date('d-M-Y', strtotime($item['date']))); ?></td>
                            <td>
                                
                                
                                <?php echo e($feesGroup->name ?? ''); ?></td>
                            <td><a href="<?php echo e(url('print_payement',$item->id)); ?>" target="blank" class="btn btn-success  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a></td>
    
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
    </div>
</div>

<!-- Loading screen modal -->
<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="w-100">
      <div class="modal-body text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only text-white">Collecting fees please wait...</span>
        </div>
        <p class="mt-2 text-white">Collecting fees please wait...</p>
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
// $('#discount,#amount,#discount_per').on('input',function(){
//     toastr.info();
//     calculateAmt($(this).attr('id'))
// });




// function calculateAmt(this_id){
    
//     var discount_val = parseFloat($('#discount').val());
//     var discount_per = parseFloat($('#discount_per').val());
//     var remain_amount = parseFloat($('#remain_amount').val());
//     var amount = parseFloat($('#amount').val());
//     var final_amount = 0;
//     var final_discount = 0;
//     if(discount_per > 100){
//         $('#discount_per').val('');
//     }
//     if(isNaN(discount_val)){discount_val = 0;}
//     if(isNaN(discount_per)){discount_per = 0;}
//     if(isNaN(amount)){amount = 0;}
    
  
//     if(this_id == 'discount_per'){
        
//         final_discount = amount * discount_per / 100;
//         final_amount = amount - amount * discount_per / 100;
//          $('#pay_amt').val(final_amount); 
//          $('#discount_amount').val(final_discount);
//         $('#discount').val('');
        
//     }else if(this_id == 'discount'){
        
//         final_amount = amount - discount_val;
//          $('#discount_amount').val(discount_val);
//         $('#discount_per').val('');
//          $('#pay_amt').val(final_amount); 
//     }
 
    
    
//     $('#final_discount').val(final_discount);
//     if(final_amount < 0){
//         $('#discount_amount').val(amount);
//         $('#discount').val(amount);
//         $('#pay_amt').val(0); 
//         toastr.error('Final Amount Cannot be Negative');
        
//     }
    
// }

$(document).ready(function() {
    
    $('#loadingModal').modal({backdrop: 'static', keyboard: false})  

$('.selected_head').trigger('change');
$('.removeprodtxtbx').eq(0).hide();

$(document).on('keyup','.change_amount', function() {
    
    var validate_amount = Number($(this).attr('data-validate_amount'));
    var amount = Number($(this).val());
    
    if(validate_amount<amount)
    {
        toastr.error("Amount can't be greater than pending amount" );
        $(this).val(validate_amount);
    }
    
});

 $('#receipt_by_head').change(function() {
    var selected_value = $(this).val();
    
    if(selected_value != '')
    {
          $('.receipt_group_id').hide();   
         $('.receipt_group_id_'+selected_value).show();   
    }
    else
    {
     
     $('.receipt_group_id').show();   
    }
    });
    

    
    
    $('#discount').blur(function() {
        discount_per = parseFloat($(this).val());
        amount = parseFloat($('#amount').val());
        
      if(discount_per > 0)
    {
        $('#discount_per').val(0);
           total = amount - discount_per;
        $('#pay_amt').val(total);
        $('#discount_amount').val(discount_per);
    }
     
    });
    $('#discount_per').blur(function() {
        amount = parseFloat($('#amount').val());
         discount_per = (amount*parseFloat($(this).val()))/100;
          if(discount_per > 0)
    {
         $('#discount').val(0);
         total = amount - discount_per;
        
        $('#pay_amt').val(total);
        $('#discount_amount').val(discount_per);
    }
        
    });

    $('#amount').change(function() {
        amount = parseFloat($(this).val());
        total_assign_amt = $('#total_assign_amt').html();
        remainingAmt = $('#remainingAmt').html();
  
        if(remainingAmt < amount){
            toastr.error('You Can not collect extra amount');
            $(this).val(remainingAmt);
        }else{
        $('#pay_amt').val(amount);
        }
         
    });
    
    $( "#submit_form" ).on( "submit", function( event ) {
 amount = parseFloat($('#amount').val());
 
 if(amount <=0)
 {
     toastr.error('Amount must be greater than zero');
  event.preventDefault();
 }
});

});

</script>
<style>
    .card{
        margin-bottom:0px;
        height:100%;
    }
    
    .colored_header{
        color:red;
    }
    
    .border_box{
        border: 1px solid black;
        padding:10px;
        margin-top: 10px;
    }
    
    .heading_text{
        font-size:18px;
        font-weight:600;
        color:#dc3545;
    }
    
    .padding_body{
        padding:10px;
    }
    
    .padding_table thead tr{
        background:rgb(102, 57, 181);
        color:white;
    }

    
    .padding_table th, .padding_table td{
        padding:5px;
        font-size:14px;
    }
    
    .absolute_row{
        position: absolute;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        bottom: 0;
    }
    .rotated-text {
       transform: rotate(-90deg); /* Rotate text 90 degrees clockwise */
        white-space: nowrap; /* Prevent text from wrapping */
     
     
}

    .tfoot_tr{
        background: skyblue;
        font-weight: 600;
    }
    .receipts {
       /* margin-top:-10px;*/
       /*transform: rotate(-5deg); */
       background-color:#49bf45;
       color:#fff;
       
       /* Rotate text 90 degrees clockwise */
        
     
     
}
</style>
          

            
           
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>


$('#payment_mode_id').on('change', function() {
    
    var payment_mode_id = $(this).val();
    if(payment_mode_id == 1){
        $('#transition_id_input').hide();
        $('#bank_name_input').hide();
        $('#bank_name').removeAttr('required');
        $('#bank_name').val('');
        $('#transition_id').removeAttr('required');
        $('#transition_id').val('');
    }else{
        $('#transition_id_input').show();
        $('#bank_name_input').show();
        $('#bank_name').attr('required',true);
        $('#bank_name').val('');
        $('#transition_id').attr('required',true);
        $('#transition_id').val('');
    }
    /*if(this.value == 9){
        
var total_amount=jQuery('#pay_amt').val();
    if(total_amount !=  0){
                  // console.log(result);
                   var options = {
                        "key": "<?php echo e(env('RAZORPAY_KEY')); ?>", 
                        "amount": total_amount*100, 
                       
                        "currency": "INR",
                        "name": "Rukmani Software",
                        "description": "Live Transaction",
                        "image": "https://www.rukmanisoftware.com/public/assets/img/header-logo.png",
                        "handler": function (response){
                         $("#transaction_id").val(response.razorpay_payment_id);  
                        }
                    };
                    
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    $("#payment_mode_id").val(1); 
    }else{
                toastr.error('not a valid amount');
                 $('.transaction_slip').addClass('d-none'); 
                $("#payment_mode_id").val(1);  

       
    }
}*/
        
});
</script>
<script>
$(document).ready(function() {
    var head_added_count =1;
      var val = [];
      var slip ='';
     var head_length = $('.selected_head option').length-1;
     
     
     function selectBox(){
         length = $('.selected_head').length;
      val = [];
     
     for(var i=0; i<length; i++)
     {
         val.push($('.selected_head').eq(i).val())
     }
    
     }
     
         $(document).on("change",".selected_head", function(){

    var selected_head = $(this).val();

  
  
    var key = $(this).attr('data-key1');
    var pending_amount = Number($('#pending_by_group_id_'+selected_head).attr('data-pending_amount'));
    
    if(pending_amount > 0)
    {
        $('#amount_'+key).val(pending_amount);
        $('#amount_'+key).attr('data-validate_amount',pending_amount);
    }
    else
    {
         toastr.options = {
"preventDuplicates": true,
"preventOpenDuplicates": true
};

        if(isNaN(pending_amount))
        {
        toastr.error('!!! Please Select Head !!!')
        }
        else
        {
             toastr.error('!!! No Amount to be taken !!!')
        }
          $('#amount_'+key).val(pending_amount);
         $('#amount_'+key).attr('data-validate_amount',pending_amount);
    }
   
   
     if (val.includes(selected_head) && selected_head != '') {
            toastr.error('This head is already selected.');
            $(this).val('');
         $('#amount_'+key).val(0);
         $('#amount_'+key).attr('data-validate_amount',0);
        }
         selectBox()
    });
    $(".addmoreprodtxtbx").click(function() {

           var headRowContent = $('#head_row').html();
           var $headRow = $(headRowContent);
            $headRow.find('select').val('');
            
           var old_select = document.querySelectorAll('select[name="selected_head[]"]');
           var old_slip = document.querySelectorAll('input[name="slip_no[]"]')[document.querySelectorAll('input[name="slip_no[]"]').length - 1].value;
        
            val.push(old_select[old_select.length - 1].value);
        if((head_added_count) < head_length)
        {
           $('#add_head_row').append('<div class="row m-2 head_row">' + headRowContent + '</div>');
             var newInput = $('#add_head_row').find('input[name="amount[]"]:last');
    var newId = 'amount_' + ($('#add_head_row').find('input[name="amount[]"]').length - 1);
    newInput.attr('id', newId);
    
    $('#add_head_row').find('input[name="slip_no[]"]:last').attr('value',parseInt(old_slip)+1)
    //  var newInput = $('#add_head_row').find('input[name="amount[]"]:last');
    // var newId = 'amount_' + ($('#add_head_row').find('input[name="amount[]"]').length - 1);
    // newInput.attr('id', newId);
    
    var selects = document.querySelectorAll('select[name="selected_head[]"]');
            var lastSelect = selects[selects.length - 1];
            lastSelect.setAttribute('data-key1', head_added_count);
          
          Array.from(lastSelect.options).forEach(function(option) {
                if (val.indexOf(option.value) > -1) {
                  //  option.remove();// Disable the option
                }
            });
            
       $('.selected_head').eq($('.selected_head').length-1).trigger('change')
     head_added_count++;
     disbledButton()
        }
        else
        {
            toastr.options = {
"preventDuplicates": true,
"preventOpenDuplicates": true
};
            toastr.error('No Head Left');
        }
            
            
        });
        
        $(document).on('click','.removeprodtxtbx', function() {
        // Find the parent element with class 'head_row' and remove it
       var  parent = $(this).closest('.head_row');
          var selectBoxValue = parent.find('select').val();
          
          
           if (selectBoxValue !== null) {
          
            val = val.filter(function(value) {
                return value !== selectBoxValue;
            });
           }
     $(this).closest('.head_row').remove();
        head_added_count--;
        disbledButton()
    });
    
    
    function disbledButton(){
        $('.removeprodtxtbx').show();
        $('.removeprodtxtbx').eq(0).hide();
        
    }
    
    
/*     $('#submit_form').submit(function(event) {
        event.preventDefault();
        
         if (selectedValues.includes(selectedValue)) {
            // Value is already selected, perform your error handling or action here
            alert('This value is already selected.');
            // Uncheck the clicked element
            $(this).prop('checked', false);
        } 
        
});*/
});






</script>



<script>
$(document).ready(function(){
    var BASEURL = "<?php echo e(url('/')); ?>";
  $("#myForm").submit(function(event){
      
    event.preventDefault();
$('#loadingModal').modal('show');
 var formData = $('#myForm').serialize(); 
    

    
   $.ajax({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: BASEURL + '/student_pay_submit',
        data: formData,
        success: function(data) {
            if(data.status == 'success')
            {
                $('#loadingModal').modal('hide');
                  toastr.success('Fee Collected Successfully');
                  showData(data.admission_id);
            }
            else
            {
                $('#loadingModal').modal('hide');
                toastr.error('Something Went Wrong');
            }
        }
    });
  });
});
</script>
<?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/fees/fees_collect/student_bill.blade.php ENDPATH**/ ?>