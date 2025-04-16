
<?php if(!empty($enquiry) && $enquiry->count() > 0): ?>
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
                <?php
                    $i = 1;
                ?>
                <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $enqStatus = $enquiryStatus->where('id', $enq->responce_status_id)->first();
                        $user = DB::table('users')->where('id', $enq->user_id)->whereNull('deleted_at')->get('name')->first();
                    ?>
                
                <tr>
                    <td>
                        <form action="<?php echo e(url('esh2/enquiry/list')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                        <button type="submit" name="searchEnquiryId" value="<?php echo e($enq->id ?? ''); ?>" class="btn btn btn-icon btn-info me-2 mb-2 btn-outline btn-outline-dashed btn-outline-primary pulse pulse-primary"><i class="ki-duotone ki-magnifier fs-1"><span class="path1"></span><span class="path2"></span></i><span class="pulse-ring"></span></button>
                        </form>
                    </td>
                    <td class="pt-0"><?php echo e($i++); ?></td>
                    <td class="pt-0 d-flex align-items-center"><div class="symbol symbol-circle symbol-50px overflow-hidden me-3"><a class="text-dark" target="blank" href="https://web.rusoft.in/esh2/enquiry/view/<?php echo e($enq->id ?? ''); ?>">
                        <?php if(!empty($enq->image)): ?>
                            <div class="symbol-label"><img src="<?php echo e(env('IMAGE_SHOW_PATH') . 'esh2/enquiry/' . $enq->image); ?>" alt="Enquiry Image" class="w-100" /></div>
                        <?php else: ?>
                            <div class="symbol-label fs-3 bg-light-danger text-danger"><?php echo e($enq->name[0] ?? ''); ?></div>
                        <?php endif; ?>
                        </a></div><div class="d-flex flex-column"><small><?php echo e($enq->name ?? ''); ?></small>
                        <?php if($enq->department_id == 1): ?>
                            <span class="badge badge-light-success">School</span>
                        <?php elseif($enq->department_id == 2): ?>
                            <span class="badge badge-light-info">Coaching</span>
                        <?php elseif($enq->department_id == 3): ?>
                            <span class="badge badge-light-warning">Library</span>
                        <?php elseif($enq->department_id == 4): ?>
                            <span class="badge badge-light-danger">Hostel</span>
                        <?php elseif($enq->department_id == 5): ?>
                            <span class="badge badge-light-primary">Website</span>
                        <?php elseif($enq->department_id == 6): ?>
                            <span class="badge badge-light-secondary">CRM</span>
                        <?php elseif($enq->department_id == 7): ?>
                            <span class="badge badge-light-dark">Custom</span>
                        <?php else: ?>
                        <?php endif; ?>
                        
                    </div></td>
                    <td class="pt-0"><small><a href="tel://<?php echo e($enq->mobile ?? ''); ?>"><?php echo e($enq->mobile ?? ''); ?></a> <br><a href="tel://<?php echo e($enq->mobile2 ?? ''); ?>"><?php echo e($enq->mobile2 ?? ''); ?></a> &nbsp; <a href="mailto:<?php echo e($enq->email ?? ''); ?>"><?php echo e($enq->email ?? ''); ?></a></small></td>
                    <td class="pt-0"><small><?php echo e($enq->address ?? ''); ?></small></td>
                    <td class="pt-0 text-gray-800"><small><?php echo e($enq->reminder_date ?? ''); ?><hr class="m-0"><span class="text-primary"><?php echo e($enq->message ?? ''); ?></span></small></td>
                    <td class="pt-0"><small><div class="badge badge-light-<?php echo e($enqStatus->color ?? ''); ?> fw-bold"><?php echo e($enqStatus->name ?? ''); ?></div><br><?php echo e($user->name ?? ''); ?> | <?php echo e(date('l d/m/Y h:i a', strtotime($enq->updated_at)) ?? ''); ?></small></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/rusoft/public_html/web.rusoft.in/resources/views/common/search.blade.php ENDPATH**/ ?>