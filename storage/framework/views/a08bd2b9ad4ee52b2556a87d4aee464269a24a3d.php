<?php
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);
//dd($data[0]['Admission']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Print </title>
    <style>
     
      body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 25px auto ;
   // border: 0.5px solid; 
   }
   
   .student_img {
   width: 80px; 
   height:100; 
   margin-top: 5%;
   margin-left:20%;
   padding-bottom: 10px;
       
   }
   
   .row{
       margin-right: 0px;
   }
   .img_background_fixed{
     position: relative;
   }
   
   .img_absolute{
       position: absolute;
       top: 85px;
       width: 100%;
       display: flex;
       align-items: center;
       justify-content: center;
       height: 100%;
       right: 0;
   }
   
   .backhround_img{
       opacity: 0.3;
       width: 34%;
   }

   table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .invoice-header {
            margin-bottom: 20px;
            text-align:'center'
        }

        .border_none{
            border: none;
        }
        
        .bg_color_heading td{
            background-color:#f2f2f2;
            font-weight:600;
        }
     
   </style>
</head>
<body class='page'>
<table style="border-bottom: 0px solid;width:100%;" >
			<tbody >
					<tr>
      <td class="border_none" rowspan='2' width='25%'>
          <img src="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$getSetting->left_logo); ?>" style="width: 150px;height: 69px;">
          </td>
      <td class="border_none"   width='50%' style="font-size:20px;text-align:center;"><!--<span><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span>--></td>
      <td class="border_none" width='25%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
	    
      <td class="border_none" width='50%'  style="text-align:center;">
       <span style="font-size:20px;text-align:center;"><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span>
      <p style="margin-bottom: -9px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p>
      <!--<p ><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?>  &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?></p>-->
    </td>
      <td class="border_none" width='25%'></td>
      </tr>

  </tbody>
  </table> 

  <table >
     
      	<tbody >
      <tr>
          <th>Name</th>
          <td><?php echo e($data[0]['Admission']['first_name'] ?? ''); ?> <?php echo e($data[0]['last_name'] ?? ''); ?></td>
          <th>Father's Name</th>
          <td><?php echo e($data[0]['Admission']['father_name'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td>
              <?php echo e($data[0]['Admission']['ClassTypes']['name'] ?? ''); ?>

         </td>
          <th>Mobile</th>
          <td><?php echo e($data[0]['Admission']['mobile'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th>Fee Month</th>
          <td><?php echo e(\Carbon\Carbon::parse($data[0]->date ?? '')->format('F')); ?></td>
          <td class="border_none"></td>
          <td class="border_none"></td>
          
      </tr>
       </tbody>
      
  </table>
  <table>
        <thead>
            <tr>
                <th>Receipt No.</th>
                <th>Head Name</th>
                <th>Date</th>
                <!--<th>Discount</th>-->
                <th>Amount</th>
              
            </tr>
        </thead>
        <tbody>
            
            <?php if(!empty($data)): ?>
            <?php
            $total_amount = 0;
            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['receipt_no'] ?? ''); ?></td>
                <td>
                <?php
                $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$item['fees_group_id'])->first();
                ?>
                
                <?php echo e($feesGroup->name ?? ''); ?>

                </td>
                <td><?php echo e(date('d-M-Y', strtotime($item['date'])) ?? ''); ?></td>
                <!--<td><?php echo e($item['discount'] ?? '-'); ?></td>-->
                <td>₹ <?php echo e($item['total_amount'] ?? ''); ?>

                <?php
                $total_amount += $item['total_amount'] ?? 0;
                ?>
                
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <!-- Add more rows for additional items -->
        </tbody>
        <?php
            $payment_name = DB::table('payment_modes')->whereNull('deleted_at')->where('id',$data[0]->payment_mode_id)->first();
        ?>
        <tfoot>
            
            
            
            
            
            
            <tr class="bg_color_heading">
                <td colspan="<?php echo e($data[0]->payment_mode_id != 1 ? '1' : '2'); ?>">Payment Mode</td>
                <?php if($data[0]->payment_mode_id != 1): ?>
                    <td colspan="1">Transaction Id</td>
                    <td colspan="1">Bank Name</td>
                <?php endif; ?>
                <td colspan="<?php echo e($data[0]->payment_mode_id != 1 ? '1' : '2'); ?>">Total Paid Amount</td>
            </tr>
            
            <tr>
                <td colspan="<?php echo e($data[0]->payment_mode_id != 1 ? '1' : '2'); ?>"><?php echo e($payment_name->name ?? ''); ?></td>
                <?php if($data[0]->payment_mode_id != 1): ?>
                    <td colspan="1"><?php echo e($data[0]->transition_id ?? ''); ?></td>
                    <td colspan="1"><?php echo e($data[0]->bank_name ?? '-'); ?></td>
                <?php endif; ?>
                <td colspan="<?php echo e($data[0]->payment_mode_id != 1 ? '1' : '2'); ?>" id="inNumber">₹ <?php echo e($total_amount); ?></td>
            </tr>
            <tr>
                <th colspan="1" style="text-align: left;">Amount In Words</th>
                
                <?php
                 $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total_amount);
                $words .= ' rupees';
                ?>
                <td colspan="3"><b id="inWords" style='text-transform: capitalize;'> : <?php echo e($words); ?></b></td>
            </tr>
        </tfoot>
    </table>




 



</body>
</html><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/master/printFilePanel/FeesManagement/template01.blade.php ENDPATH**/ ?>