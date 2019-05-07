<form action="#" class="job-post-form rtl">
	<div class="basic-info-input">
  <div class="dashboard-section upload-profile-photo col-md-3 mb-5">
			<div class="update-photo">
				<img class="image" src="<?php echo base_url('upload/employer/avatar/') ;?>default66.png" alt="">
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
								<option>وضعیت تاهل : </option>
								<option>مجرد</option>
								<option>متاهل</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="محل سکونت خود را وارد کنید ">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option>وضعیت خدمت</option>
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
								<option>وضعیت شغلی</option>
								<option>شاغل</option>
								<option>بیکار</option>
								<option>شاغل و جویای کار</option>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="شماره همراه">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="شماره تلفن">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control">
								<option>جنسیت</option>
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

		<div id="education" class="row">
			<label class="col-md-3 col-form-label">تحصیلات:</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="رشته تحصیلی">
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-md-3 col-form-label"></label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="گرایش">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="دانشگاه">
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="توضیخات"></textarea>
				</div>
				<!-- <a href="#" class="add-new-field">+ Add Education</a> -->
			</div>
		</div>
		<div id="experience" class="row">
			<label class="col-md-3 col-form-label">پیشینه شغلی :</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="نام شرکت">
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-md-3 col-form-label"></label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="سطح ارشدیت">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="گروه شغلی">
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="توضیحات"></textarea>
				</div>
				<!-- <a href="#" class="add-new-field">+ Add Experience</a> -->
			</div>
		</div>
		<div id="skill" class="row">
			<label class="col-md-3 col-form-label">مهارت ها</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="دانش و مهارت">
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-md-3 col-form-label"></label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="میزان تسلط">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="توضیحات">
				</div>
				<!-- <a href="#" class="add-new-field">+ Add Experience</a> -->
			</div>
    </div>
    <div class="row">

    <button class="button" type="submit">ارسال رزومه</button>
    </div>
    <div class="col-md-4">
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">از تاریخ :</label>
									<input type="text" class="form-control" name="start_date" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" value="" placeholder="Jalali Created Date">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">تا تاریخ :</label>
									<input type="text" class="form-control" name="end_date" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" value="" placeholder="Jalali Created Date">
								</div>
							</div>
						</div>
                    
	</div>
</form>