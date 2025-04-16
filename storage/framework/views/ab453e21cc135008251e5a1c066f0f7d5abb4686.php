<?php
$getstudents = Helper::getstudents();
$getgenders = Helper::getgender();
$classType = Helper::classType();
$getCountry = Helper::getCountry();
$bloodGroupType = Helper::bloodGroupType();
?>

<?php $__env->startSection('content'); ?>


<input type="hidden" id="session_id" value="<?php echo e(Session::get('role_id') ?? ''); ?>">
<input type="hidden" id="admission_id" value="<?php echo e($data->id ?? ''); ?>">
<div class="content-wrapper">


	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-edit"></i> &nbsp;<?php echo e(__('messages.Edit Students Admission')); ?> </h3>
							<div class="card-tools">
								<a href="<?php echo e(url('admissionView')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
								<a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
							</div>

						</div>
						<form id="quickForm" action="<?php echo e(url('admissionEdit')); ?>/<?php echo e($data['id']); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row m-4">
								<div class=" col-md-12 title mt-n3">
									<h5 class="text-danger"><?php echo e(__('messages.Personal Details')); ?>:-</h5>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Admission No.')); ?></label>
										<input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="Admission No" value="<?php echo e($data['admissionNo']); ?>" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Ledger No')); ?><span style=""></span></label>
										<input type="text" class="form-control " name="ledger_no" placeholder="<?php echo e(__('Ledger No')); ?>"  value="<?php echo e($data['ledger_no']); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.First Name')); ?><span style="color:red;">*</span></label>
										<input type="text" name="first_name" id="first_name" class="form-control invalid " value="<?php echo e($data['first_name'] ?? ''); ?>" placeholder="<?php echo e(__('common.First Name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="first_name_invalid" role="alert">
                                            <strong>The First Name field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Last Name')); ?></label>
										<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo e($data['last_name'] ?? ''); ?>" placeholder="<?php echo e(__('common.Last Name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
									</div>
								</div>
							
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Aadhaar No.')); ?></label>
										<input type="text" class="form-control" id="aadhaar" name="aadhaar" placeholder=" <?php echo e(__('common.Aadhaar No.')); ?>" value="<?php echo e($data['aadhaar'] ?? ''); ?>" maxlength="12" onkeypress="javascript:return isNumber(event)">
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Gender')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid" id="gender_id" name="gender_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getgenders)): ?>
											<?php $__currentLoopData = $getgenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(( $value->id == $data['gender_id'] ? 'selected' : '' )); ?>><?php echo e($value->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<span class="invalid-feedback" id="gender_id_invalid" role="alert">
                                            <strong>The gender field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Date Of  Birth')); ?><span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="dob" name="dob" placeholder=" Date Of  Birth" value="<?php echo e($data['dob'] ?? ''); ?>">
										<span class="invalid-feedback" id="dob_invalid" role="alert">
                                            <strong>The dob field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Mobile No.')); ?></label>
										<!--<input type="text" class="form-control " id="mobile" name="mobile" placeholder="<?php echo e(__('common.Mobile No.')); ?>" value="<?php echo e($data['mobile'] ?? ''); ?>"minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)">-->
						                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo e(__('common.Mobile No.')); ?>" value="<?php echo e($data['mobile'] ?? ''); ?>" maxlength="10">
                                            <div id="mobileValidationMessage" style="color: red; display: none; font-size:13px;">must be at least 10 characters</div>

									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.E-Mail')); ?></label>
										<input type="email" class="form-control " id="email" name="email" placeholder="<?php echo e(__('common.E-Mail')); ?>" value="<?php echo e($data['email'] ?? ''); ?>">
							          
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Fathers Name')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="father_name" name="father_name" placeholder="<?php echo e(__('common.Fathers Name')); ?>" value="<?php echo e($data['father_name'] ?? ''); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="father_name_invalid" role="alert">
                                            <strong>The Father's name field is required</strong>
                                        </span>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Mothers Name')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="mother_name" name="mother_name" placeholder="<?php echo e(__('common.Mothers Name')); ?>" value="<?php echo e($data['mother_name'] ?? ''); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="mother_name_invalid" role="alert">
                                            <strong>The Mother's name field is required</strong>
                                        </span>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Fathers Contact No')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="father_mobile" name="father_mobile" placeholder="<?php echo e(__('common.Fathers Contact No')); ?>" value="<?php echo e($data['father_mobile'] ?? ''); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
						                 <div id="fathermobileValidationMessage" style="color: red; display: none; font-size:13px;">must be at least 10 characters</div>

									<span class="invalid-feedback" id="father_mobile_invalid" role="alert">
                                         <strong>The Fathers's No is required</strong>
                                    </span>
									</div>
								</div>


								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Class')); ?><span style="color:red;">*</span></label>

										<select class="form-control invalid" id="class_type_id" name="class_type_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($classType)): ?>
											<?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($type->id ?? ''); ?>" data-orderBy="<?php echo e($type->orderBy ?? ''); ?>"  <?php echo e(( $type->id == $data['class_type_id'] ? 'selected' : '' )); ?> ><?php echo e($type->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<span class="invalid-feedback" id="class_type_id_invalid" role="alert">
                                            <strong>The Class field is required</strong>
                                        </span>
									</div>
								</div>
								
								<?php
								    $streamSubjects = Helper::getStreamSubjects($data->class_type_id ?? '');
								?>
								
								<div class="col-md-2" id="stream_subject_div" style="display:<?php echo e($data['stream_subject'] != "" ? 'block' : 'none'); ?>">
									<div class="form-group">
										<label>Stream Subject<span style="color:red;">*</span></label>

										<select class="form-control select2" multiple id="stream_subject" name="stream_subject[]">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($streamSubjects)): ?>
                                                <?php $__currentLoopData = $streamSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($subject->id ?? ''); ?>" <?php echo e(in_array($subject->id, explode(',', $data->stream_subject)) ? 'selected' : ''); ?>><?php echo e($subject->name ?? ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Admission Type')); ?></label>
										<select class="form-control" id="admission_type_id" name="admission_type_id">
											<!--<option value=""><?php echo e(__('common.Select')); ?></option>-->
											<option value="1" <?php echo e((1 == $data['admission_type_id'] ? 'selected' : '' )); ?>>Non RTE</option>
											<option value="2" <?php echo e((2 == $data['admission_type_id'] ? 'selected' : '' )); ?>>RTE</option>
										</select>
										
									</div>
								</div>
                                <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Date Of Admission')); ?></label>
										<input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo e($data['admission_date'] == '1970-01-01' ? '' : $data['admission_date'] ?? ''); ?>">
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Country')); ?></label>
										<select class="form-control" name="country" id="country_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getCountry)): ?>
											<?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($country->id ?? ''); ?>" <?php echo e(( $country->id == $data['country_id'] ? 'selected' : '' )); ?> <?php echo e(( $country->id == 101 ? 'selected' : '' )); ?>><?php echo e($country->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="State" class="required"><?php echo e(__('common.State')); ?></label>
										<select class="form-control stateId " id="state_id" name="state">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getState)): ?>
											<?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(( $state->id == $data['state_id'] ? 'selected' : '' )); ?> <?php echo e(( $state->id == 33 ? 'selected' : '' )); ?>><?php echo e($state->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>

									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="City"><?php echo e(__('common.City')); ?></label>
										<select class="form-control cityId " name="city" id="city_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getCity)): ?>
											<?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(( $cities->id == $data['city_id'] ? 'selected' : '' )); ?> <?php echo e(( $cities->id == 3378 ? 'selected' : '' )); ?>><?php echo e($cities->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('messages.Village/City')); ?></label>
										<input type="text" class="form-control" id="village_city" name="village_city" placeholder="<?php echo e(__('messages.Village/City')); ?>" value="<?php echo e($data['village_city'] ?? ''); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Students Address')); ?></label>
										<input type="text" class="form-control " id="address" name="address" placeholder="<?php echo e(__('student.Students Address')); ?>" value="<?php echo e($data['address'] ?? ''); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('messages.Pin Code')); ?></label>
										<input type="text" class="form-control" id="pincode" name="pincode" placeholder="<?php echo e(__('messages.Pin Code')); ?>" value="<?php echo e($data['pincode'] ?? ''); ?>" maxlength="6" onkeypress="javascript:return isNumber(event)">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('House')); ?></label>
										<input type="text" name="house" id="house" class="form-control" value="<?php echo e($data['house'] ?? ''); ?>" placeholder="<?php echo e(__('House')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Height')); ?></label>
										<input type="text" name="height" id="height" class="form-control" value="<?php echo e($data['height'] ?? ''); ?>" placeholder="<?php echo e(__('Height')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Weight')); ?></label>
										<input type="txt" name="weight" id="weight" class="form-control" value="<?php echo e($data['weight'] ?? ''); ?>" placeholder="<?php echo e(__('Weight')); ?>">
										
									</div>
								</div>
                                <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Blood Group')); ?></label>
										<select class="form-control" id="blood_group" name="blood_group">
											<option value=""><?php echo e(__('common.Select')); ?></option>
        										<?php if(!empty($bloodGroupType)): ?>
        											<?php $__currentLoopData = $bloodGroupType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        											<option value="<?php echo e($bloodtype->name ?? ''); ?>" <?php echo e(( $bloodtype->name == $data['blood_group'] ? 'selected' : '' )); ?>><?php echo e($bloodtype->name ?? ''); ?></option>
        											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        										<?php endif; ?>
										</select>
									
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Remark')); ?> </label>
										<input type="text" class="form-control" id="remark_1" name="remark_1" placeholder="<?php echo e(__('student.Remark')); ?> " value="<?php echo e($data['remark_1'] ?? ''); ?>">
									</div>
								</div>
								
							</div>
							<hr>
							<div class="row m-2">
								<div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('messages.Document Upload')); ?>:-</h5>
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('student.Student Photo')); ?></lable>
									<div class="input file form-control">
										<input type="file" class="" name="student_img" id="student_img" value="<?php echo e($data['image'] ?? ''); ?>"  accept="image/png, image/jpg, image/jpeg">
                                   
								    </div>
								</div>

								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$data['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'" width="60px" height="60px">
								</div>
								<div class="col-md-3">
									<lable><b><?php echo e(__('messages.Father Photo')); ?></b></lable>
									<div class="input file form-control <?php $__errorArgs = ['father_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="father_img" id="father_img" value="<?php echo e($data['father_img'] ?? ''); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_errors"></p>
										<?php $__errorArgs = ['father_img'];
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
								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'father_image/'.$data['father_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'" width="60px" height="60px">
								</div>
								<div class="col-md-3">
									<lable><b><?php echo e(__('messages.Mother Photo')); ?></b></lable>
									<div class="input file form-control <?php $__errorArgs = ['mother_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="mother_img" id="mother_img" value="<?php echo e($data['mother_img'] ?? ''); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_er"></p>
										<?php $__errorArgs = ['mother_img'];
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
								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'mother_image/'.$data['mother_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'" width="60px" height="60px">
								</div>
							</div>
							<hr>
							
							<div class="mesterClassAmt" class="row m-2"></div>
							<div class="col-md-12 text-center ">
							    <div >
								<button type="submit" class="btn btn-info" name='update'  value="update_n_next" ><?php echo e(__('Update & Next')); ?></button>
								<button type="submit" class="btn btn-primary"   id="is-invalid" ><?php echo e(__('messages.Update')); ?></button><br><br>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handler for form submission
    $('form').on('submit', function(event) {
        // Perform mobile input validation
        var mobileValue = $('#mobile').val();
        var mobileMinLength = 10;

        if (mobileValue.length < mobileMinLength) {
            $('#mobileValidationMessage').show();
            event.preventDefault();  
            $('html, body').animate({
            scrollTop: 0
        }, 800);
        } else {
            $('#mobileValidationMessage').hide();
        }

        // Perform father's mobile input validation
        var father_mobileInputValue = $('#father_mobile').val();
        var fatherMobileMinLength = 10;

        if (father_mobileInputValue.length < fatherMobileMinLength) {
            $('#fathermobileValidationMessage').show();
            event.preventDefault(); 
            $('html, body').animate({
            scrollTop: 0
        }, 800);
        } else {
            $('#fathermobileValidationMessage').hide();
        }
    });
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
      
        $('#student_img').change(function(e){
            $('#image_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_error').html("");
            }
        }else{
            $('#image_error').html("Image Size File");
            $(this).val('');
        }
        });
    });

    $(document).ready(function(){
        $('#father_img').change(function(e){
            $('#image_errors').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_errors').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_errors').html("");
            }
        }else{
            $('#image_errors').html("Image Size File");
            $(this).val('');
        }
        });
    });


    $(document).ready(function(){
        $('#mother_img').change(function(e){
            $('#image_er').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_er').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_er').html("");
            }
        }else{
            $('#image_er').html("Image Size File");
            $(this).val('');
        }
        });
    });
   
</script>
<style>
    #image_error{
        font-weight: bold;
    font-size: 14px;
    }
    #image_er{
        font-weight: bold;
    font-size: 14px;
    }
    #image_errors{
        font-weight: bold;
    font-size: 14px;
    }
</style>


<script>
    $(document).ready(function(){
        var baseUrl = "<?php echo e(url('/')); ?>";
        
        $('#class_type_id').change(function(){
            var class_type_id = parseInt($(this).val());
            var orderBy = parseInt($(this).find('option:selected').attr('data-orderBy'));
            
            if(orderBy > 10){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseUrl + '/getStreamSubjects',
                    data: {
                        class_type_id: class_type_id
                    },
                    success: function(data) {
                        var options = "";
                        $('#stream_subject').html("");
                            for(var i = 0; i < data.length; i++){
                                options += '<option value="'+ data[i].id +'">'+ data[i].name +'</option>';
                            }
                        $('#stream_subject').html(options);
                        $('#stream_subject_div').show();
                    }
                });
            }else{
                $('#stream_subject').html("");
                $('#stream_subject_div').hide();
            }
        });
    });
</script>

<script>

$(document).ready(function(){
 //   $('#class_type_id').val('');
    
    if($('#admission_type_id').val() == 1){
            $('.mesterClassAmt').removeClass('d-none');
            mesterData();
        }else{
            $('.mesterClassAmt').addClass('d-none');
        }
    $('#class_type_id').change(function(){
        if($('#admission_type_id').val() == 1){
            $('.mesterClassAmt').removeClass('d-none');
            mesterData();
        }else{
            $('.mesterClassAmt').addClass('d-none');
        }
    });
    
    $('#admission_type_id').change(function(){
      //      $('#class_type_id').val('');
      
            if($('#admission_type_id').val() == 1){
            $('.mesterClassAmt').removeClass('d-none');
            mesterData();
        }else{
            $('.mesterClassAmt').addClass('d-none');
        }veClass('d-none');
            mesterData();
    });
    
})
$(document).ready(function(){

    $('.feesAssignCheckbox').click(function(){
        assignCheck()
    })
    $('.discount,#great_discount').keyup(function(){
        assignCheck()
    })
    
    function assignCheck(){
        
        var thisamt = thisdisct = thisid = netamt = totalamt = totaldisct = payamt = greatdisct = finaldisct = 0;
        $('.feesAssignCheckbox').each(function(){
            
            if($(this).is(':checked')){

                thisid = $(this).data('id');
                thisamt = parseFloat($('#amount_' + thisid).val());
                thisdisct = parseFloat($('#discount_' + thisid).val());
                greatdisct = parseFloat($('#great_discount').val());
                
                if(isNaN(thisdisct)){thisdisct = 0;}
                if(isNaN(greatdisct)){greatdisct = 0;}
                totalamt = totalamt + thisamt;
                totaldisct = totaldisct + thisdisct;
                
                //toastr.warning(greatdisct);
                //toastr.info(thisdisct);
            }
        })  
                
        payamt = totalamt - totaldisct;
        $('#total_amount').val(totalamt);
        $('#net_discount').val(totaldisct);
        $('#pay_amt').val(payamt);

        if(greatdisct > 0){

            finaldisct = totaldisct + greatdisct;
            payamt = totalamt - finaldisct;
            $('#net_discount').val(finaldisct);
            $('#pay_amt').val(payamt);
        }
        
        if(totalamt > 0){
            if(totaldisct >= totalamt || finaldisct >= totalamt){
                toastr.error('Total discount should be lessthan Net amount');
            }
        }
    }
    
})

$(document).ready(function(){

    $('#class_type_id').change(function(){
        mesterData();
    });
    
    mesterData();
})
	var basurl = "<?php echo e(url('/')); ?>";
	function mesterData() {
	
		var class_type_id = $('#class_type_id :selected').val();
		var admission_id = $('#admission_id').val();
		if (class_type_id > 0) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: basurl + '/mesterClassAmt',
				data: {
					class_type_id: class_type_id, admission_id:admission_id
				},
				//dataType: 'json',
				success: function(data) {
                if(data != ""){
                     $('.mesterClassAmt').show();
                    	$('.mesterClassAmt').html(data);

            	    //var array = [];
            	        /*$.each( feesAssign, function(index,value){
            	            alert("ok");
            	        })*/
                    	//alert(JSON.stringify(feesAssign));

                }else{
                                $('.mesterClassAmt').hide();
                               // $('#class_type_id').val("");
                    			alert('please assign master fees *!');
                    			
                }

				}
			});
		} else {
			toastr.error('Please put a value in one column !');
		}
	};
</script>
<script>
	$(document).ready(function() {
		var session_id = $('#session_id').val();
		if (session_id != 1) {
			$("#aadhaar").attr('readonly', 'true');
		}
	});
</script>

<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

	})
	
	
$('#is-invalid').click(function(e){
    e.preventDefault();
    var all_filled_up = 2000;
    $('.invalid').each(function(){
        var this_type = $(this).attr('type');
        if(this_type == "file"){
          var this_value = $(this).prop("files")[0];
        }else{
          var this_value = $(this).val();
        }
        var this_id = $(this).attr('id');
        if(this_value == ''){
            $('#' + this_id + '_invalid').css('display','block');
            all_filled_up = all_filled_up + ' && ' + this_value;
        }else{
            $('#' + this_id + '_invalid').css('display','none');
        }
    })
    if(all_filled_up == 2000){
        var total_amt = $('#total_amount').val();
        if(total_amt == ""){
                 if($('#admission_type_id').val() == 1){
                toastr.error('First Assign Fees');
            }else{
                $('#quickForm').trigger('submit');
            }
        }else{
        $('#quickForm').trigger('submit');
        }
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eplanetacademy/public_html/erp/resources/views/students/admission/edit.blade.php ENDPATH**/ ?>