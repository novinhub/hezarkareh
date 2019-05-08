<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
	<?php echo $msg[0]; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>

</div>
<?php } ?>
<form action="<?php echo base_url('employer/edit'); ?>" method="post" class="dashboard-form rtl" enctype="multipart/form-data">

	<div class="dashboard-section basic-info-input">
		<h4><i data-feather="user-check"></i>پروفایل</h4>
		<div class="dashboard-section upload-profile-photo col-md-3 mb-5">
		<div class="update-photo">
			<img class="image" src="<?php echo base_url('upload/employer/avatar/').$this->session->userdata('co_pic');?>" alt="">
		</div>
		<div class="file-upload">
			<input title=" عکس ارسالی باید کمتر از 2MB باشد و یکی از فورمت های  PNG|JPEG|GIF باشد" data-toggle="tooltip" data-placement="bottom"  type="file" name="co_pic" class="file-input ">انتخاب لوگو شرکت
    </div>
  </div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">نام و نام خانوادگی :</label>
			<div class="col-sm-9">
				<input type="text" name="fullname" value="<?php echo $edit->fullname; ?>" class="form-control" placeholder="علی شیرازی" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label">نام شرکت :</label>
			<div class="col-sm-9">
				<input type="text" name="co_name" value="<?php echo $edit->co_name; ?>" class="form-control" placeholder="نوین تک" required>
			</div>
		</div>
    <div class="form-group row">
    <label class="col-sm-3 col-form-label">آدرس وب سایت : <small class='text-primary'> (اختیاری) </small></label>
			<div class="col-sm-9">
				<input type="url" name="co_web" value="<?php echo $edit->co_web; ?>" class="form-control" placeholder="https://novin-network.com">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> مکان : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="place_id" class="selectpicker " title="<?php if($edit->state == ''){echo 'نام استان و شهر خود را وارد کنید ';}?>" data-live-search="true" required>
								<?php foreach($place as $rows){ if($rows->id == $edit->place_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $rows->id;?>" <?php echo $select;?>>
									<?php echo $rows->state." - ".$rows->city;?>
								</option>
								<?php } ?>
							</select>
				</div>
    </div>
    <div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> حوزه فعالیت : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="field_id" class="selectpicker " title="<?php if($edit->name == ''){echo 'حوزه فعالیت خود را وارد کنید';}?>" data-live-search="true" required>
								<?php foreach($field as $row){ if($row->id == $edit->field_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $row->id;?>" <?php echo $select;?>>
									<?php echo $row->name;?>
								</option>
								<?php } ?>
							</select>
				</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 col-form-label">اطلاعات تکمیلی</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="explain" required placeholder="لطفا یک یا دو خط در مورد شرکت خود توضیح دهید"><?php echo $edit->explain; ?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
	<button class="button" type="submit" name="sub">ثبت ویرایش</button>
	</div>
</form>



