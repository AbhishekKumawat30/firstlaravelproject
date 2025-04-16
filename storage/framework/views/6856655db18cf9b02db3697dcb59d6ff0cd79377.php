 <!-- Assuming you have a main layout file -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="my-4">Edit Fresh Start Record</h1>

        <!-- Display error messages if validation fails -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Edit form to update FreshStart record -->
        <form action="<?php echo e(route('freshStart.edit', ['id' => $editData->id])); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Add CSRF token to prevent cross-site request forgery -->
            <?php echo method_field('POST'); ?> <!-- Override the form method to POST for update -->

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $editData->name)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="class">Class</label>
                <input type="text" id="class" name="class" value="<?php echo e(old('class', $editData->class)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="rollNumber">Roll Number</label>
                <input type="text" id="rollNumber" name="rollNumber" value="<?php echo e(old('rollNumber', $editData->rollNumber)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="<?php echo e(old('age', $editData->age)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="number">Contact Number</label>
                <input type="text" id="number" name="number" value="<?php echo e(old('number', $editData->number)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="fatherName">Father's Name</label>
                <input type="text" id="fatherName" name="fatherName" value="<?php echo e(old('fatherName', $editData->fatherName)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="motherName">Mother's Name</label>
                <input type="text" id="motherName" name="motherName" value="<?php echo e(old('motherName', $editData->motherName)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="fatherNumber">Father's Contact Number</label>
                <input type="text" id="fatherNumber" name="fatherNumber" value="<?php echo e(old('fatherNumber', $editData->fatherNumber)); ?>" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" required><?php echo e(old('address', $editData->address)); ?></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo e(old('date', $editData->date)); ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Record</button>
            <a href="<?php echo e(route('freshStart.show')); ?>" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rusoft_web\resources\views/freshStart/edit.blade.php ENDPATH**/ ?>