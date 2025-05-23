 
<?php $__env->startSection('content'); ?>
<?php
$getPermission = Helper::getPermission();
?> 
<div class="content-wrapper" >

   <section class="content pt-3">
      <div class="container-fluid">
          
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-sitemap"></i> &nbsp;<?php echo e(__('master.Master Management')); ?></h3>
                    <div class="card-tools">
                    </div>
            
                </div>               
            </div>
            </div> 
        </div> 
            
        <div class="row">
            
            
            <?php if(!empty(Helper::SidebarSubPerm(9))): ?>
                        <?php $__currentLoopData = Helper::SidebarSubPerm(9); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-6">
                            <a href="<?php echo e(url($sub_sidebar['url'] ?? '')); ?>" class="small-box-footer">
                                <div class="small-box bg-<?php echo e($sub_sidebar['bg_color'] ?? ''); ?>">
                                    <div class="inner">
                                        <h4 class="mobile_text_title"> <?php if(Session::get('locale') == 'hi'): ?><?php echo e($sub_sidebar['hindi_name'] ?? ''); ?> <?php else: ?> <?php echo e($sub_sidebar['name'] ?? ''); ?> <?php endif; ?> </h4>
                                        <p><?php echo e(__('common.Enter')); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo e($sub_sidebar['ican'] ?? ''); ?>"></i>
                                    </div>
                                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
                 
             
               
                <!--<div class="col-md-3 col-6">
                    <a href="<?php echo e(url('teacher_subject_add')); ?>" class="small-box-footer">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h4 class="mobile_text_title"><?php echo e(__('master.Subject Teachers')); ?></h4>

                                <p><?php echo e(__('common.Enter')); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                    </a>
                </div>-->
                
                
            <!--<?php if($getPermission->add == 1): ?>
            <div class="col-md-3 col-6">
                <a href="<?php echo e(url('recycle_bin/add')); ?>" class="small-box-footer">
                <div class="small-box bg-primary">
                <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('master.Recycle Bin')); ?></h4>

                    <p><?php echo e(__('common.Enter')); ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
            <?php endif; ?>-->
            

        </div>
            
            
        </div>
        
    </section>

</div>
       

<?php $__env->stopSection(); ?>
  

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/master/dashboard/dashboard.blade.php ENDPATH**/ ?>