
<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<form action="#" class="job-post-form rtl">
	<div class="basic-info-input">
		<div class="dashboard-section upload-profile-photo col-md-3 mb-5">
			<div class="update-photo">
				<img class="image" src="<?php echo base_url('upload/employer/avatar/').$this->session->userdata('pic_seeker') ;?>" alt="">
			</div>
			<div class="file-upload">
				<input type="file" name="co_pic" class="file-input">انتخاب عکس
			</div>
		</div>
		<div id="full-name" class="form-group row">
			<label class="col-md-3 col-form-label">نام و نام خانوادگی:</label>
			<div class="col-md-9">
				<input type="text" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
			</div>
		</div>
		<div id="information" class="row">
			<label class="col-md-3 col-form-label">درباره من:</label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option selected disabled style="display:none;">وضعیت تاهل : </option>
								<option>مجرد</option>
								<option>متاهل</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
      <div id="load-selected" class=" form-control  responsive">
							<select id="pemissions-list" name="place_id" class="selectpicker " title='نام استان و شهر خود را وارد کنید ' data-live-search="true" required>
								<?php foreach($place as $rows){ if($rows->id == $employer->place_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $rows->id;?>" <?php echo $select;?>>
									<?php echo $rows->state." - ".$rows->city;?>
								</option>
								<?php } ?>
							</select>
				</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option selected disabled style="display:none;"> وضعیت خدمت</option>
								<option>معافیت تحصیلی</option>
								<option>معاف</option>
								<option>اتمام خدمت</option>
								<option>مشمول</option>
								<option>نرفته</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option selected disabled style="display:none;">وضعیت شغلی</option>
								<option>شاغل</option>
								<option>بیکار</option>
								<option>شاغل و جویای کار</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="field_id" class="selectpicker " title= 'حوزه فعالیت خود را وارد کنید' data-live-search="true" required>
								<?php foreach($field as $row){ if($row->id == $employer->field_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $row->id;?>" <?php echo $select;?>>
									<?php echo $row->name;?>
								</option>
								<?php } ?>
							</select>
				</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="پست الکترونیکی">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option selected disabled style="display:none;">جنسیت</option>
								<option>مرد</option>
								<option>زن</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="date" class="form-control" placeholder="تاریخ تولد">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="education" class=" field_wrapper">
		<div class="row ">
			<label class="col-md-3 col-form-label">تحصیلات:</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="رشته تحصیلی">
				</div>
				<div class="form-group">
							<select class="form-control">
								<option selected disabled style="display:none;">مقطع:</option>
								<option>دیپلم</option>
								<option>کارشناسی</option>
								<option>کارشناسی ارشد</option>
								<option>دکترا</option>
							</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="دانشگاه">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" class="form-control usage col-md-4" placeholder="تاریخ شروع">
					<input type="text" class="form-control usage col-md-4" placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1 " type="checkbox" style="margin-top:20px">
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="توضیحات"></textarea>
				</div>
				<button type="button" class="add-new-field add_button">اضافه کردن تحصیلات</button>
			</div>
			</div>
		</div>
		<div id="experience" class="field_wrapper2">
			<div class="row">
			<label class="col-md-3 col-form-label">پیشینه شغلی :</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" class="form-control" placeholder="نام شرکت">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="سطح ارشدیت">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="گروه شغلی">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" class="form-control usage col-md-4" placeholder="تاریخ شروع">
					<input type="text" class="form-control usage col-md-4" placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1 " type="checkbox" style="margin-top:20px">
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="توضیحات"></textarea>
				</div>
				<button type="button" class="add-new-field add_button2">اضافه کردن شغل</button>
			</div>
		</div>
		</div>
		<div id="skill" class="field_wrapper3">
			<div class="row">
			<label class="col-md-3 col-form-label">مهارت ها</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" class="form-control" placeholder="دانش و مهارت">
				</div>
				<div class="form-group">
				<select class="form-control">
								<option>میزان تسلط : </option>
								<option>خیلی کم </option>
								<option>کم</option>
								<option>متوسط</option>
								<option>خوب</option>
								<option>عالی</option>
							</select>
							<i class="fa fa-caret-down"></i>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="توضیحات">
				</div>
				<button type="button" class="add-new-field add_button3">اضافه کردن مهارت</button>
			</div>
			</div>
		</div>
		<div class="row">

			<button class="button" type="submit">ارسال رزومه</button>
		</div>
	</div>
	
</form>

