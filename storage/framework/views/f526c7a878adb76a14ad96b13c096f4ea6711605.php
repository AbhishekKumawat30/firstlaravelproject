 <!-- Assuming you have a main layout file -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="my-4">Fresh Start Records</h1>

        <!-- Display success message if available -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Table to display all Fresh Start records -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Roll Number</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Father's Contact Number</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freshStart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($freshStart->name); ?></td>
                        <td><?php echo e($freshStart->class); ?></td>
                        <td><?php echo e($freshStart->rollNumber); ?></td>
                        <td><?php echo e($freshStart->age); ?></td>
                        <td><?php echo e($freshStart->number); ?></td>
                        <td><?php echo e($freshStart->fatherName); ?></td>
                        <td><?php echo e($freshStart->motherName); ?></td>
                        <td><?php echo e($freshStart->fatherNumber); ?></td>
                        <td><?php echo e($freshStart->address); ?></td>
                        <td><?php echo e($freshStart->date); ?></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="<?php echo e(route('freshStart.edit', $freshStart->id)); ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Button -->
                            <form action="<?php echo e(route('freshStart.destroy', $freshStart->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?> <!-- Spoof the DELETE method -->
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="11" class="text-center">No Fresh Start records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Button to add a new Fresh Start record -->
        <a href="<?php echo e(route('freshStart.add')); ?>" class="btn btn-primary mt-3">Add New Fresh Start</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/freshStart/show.blade.php ENDPATH**/ ?>