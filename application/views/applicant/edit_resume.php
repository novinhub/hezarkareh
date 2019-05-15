<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<form action="<?php echo base_url('applicant/edit_resume');?>" method="post" enctype="multipart/form-data" class="job-post-form rtl">
	<div class="basic-info-input">
		<div class="dashboard-section upload-profile-photo col-md-3 mb-5">
			<div class="update-photo">
				<img class="image" src="<?php echo base_url('upload/applicant/avatar/').$this->session->userdata('pic_seeker') ;?>" alt="">
			</div>
			<div class="file-upload">
				<input type="file" title=" عکس ارسالی باید کمتر از 2MB باشد و یکی از فورمت های  PNG|JPEG|GIF باشد" data-toggle="tooltip" data-placement="bottom" name="pic_name" class="file-input">انتخاب آواتار
			</div>
		</div>
		<div id="full-name" class="form-group row">
			<label class="col-md-3 col-form-label">نام و نام خانوادگی :</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="fullname" value="<?php echo $resume->fullname;?>" placeholder = "نام و نام خانوادگی خود را وارد کنید" required>
			</div>
		</div>
		<div id="information" class="row">
			<label class="col-md-3 col-form-label">درباره من :</label>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
      <div id="load-selected" class=" form-control  responsive">
							<select id="pemissions-list" name="place" class="selectpicker " title='نام استان و شهر خود را وارد کنید ' data-live-search="true" required>
								<?php foreach($place as $rows){ ?>
								<option value="<?php echo $rows->id;?>" <?php if($rows->id == $resume->place_id){echo "selected";} ?> >
									<?php echo $rows->state." - ".$rows->city;?>
								</option>
								<?php } ?>
							</select>
				           </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<div id="load-selected" class=" form-control responsive">
							<select id="pemissions-list" name="field" class="selectpicker " title= 'حوزه فعالیت خود را وارد کنید' data-live-search="true" required>
								<?php foreach($field as $row){ ?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $resume->field_id){echo "selected";} ?> >
									<?php echo $row->name;?>
								</option>
								<?php } ?>
							</select>
				</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="sex" required>
								<option selected disabled style="display:none;">جنسیت</option>
								<?php foreach($sex as $a){ ?>
								<option value="<?php echo $a->id;?>"<?php if($a->id == $resume->sex_id){echo "selected";} ?> ><?php echo $a->sex_name; ?></option>
								<?php } ?>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="marital" required>
								<option selected disabled style="display:none;">وضعیت تاهل </option>
								<?php foreach($marital as $b){ ?>
								<option value="<?php echo $b->id;?>" <?php if($b->id == $resume->marital_id){echo "selected"; }?> ><?php echo $b->marital_status; ?></option>
								<?php } ?>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="status" required>
								<option selected disabled style="display:none;">وضعیت شغلی</option>
								<?php foreach($status as $c){ ?>
								<option value="<?php echo $c->id; ?>" <?php if($c->id == $resume->status_id){echo "selected";}?> ><?php echo $c->status_name; ?></option>
								<?php } ?>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="soldier" required>
								<option selected disabled style="display:none;"> وضعیت خدمت</option>
								<?php foreach($soldier as $d){ ?>
									<option value="<?php echo $d->id; ?>" <?php if($d->id == $resume->soldier_id){echo "selected";}?> ><?php echo $d->soldier_name;?></option>
								<?php } ?>
							</select>
							<i class="fa fa-caret-down"></i>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<input readonly type="text" name='date_birth' value="<?php echo $resume->date_birth ;?>" class="form-control usage bg-white" placeholder="تاریخ تولد">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="email" title="لطفا ایمیل معتبر وارد کنید" value="<?php echo $resume->email; ?>" class="form-control" name='email' placeholder="پست الکترونیکی">
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php if(!empty($study)){ ?>
		<div id="education" class=" field_wrapper">
		<?php foreach($study as $key => $s){ ?>
		<div class="row ">
			<label class="col-md-3 col-form-label">تحصیلات:</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder=" رشته تحصیلی (گرایش) " name="major[]" value="<?php echo $s->major; ?>">
				</div>
				<div class="form-group">
							<select class="form-control" name='proof[]'>
								<option value="1" selected readonly style="display:none;">مقطع تحصیلی</option>
								<?php foreach($proof as $e){ ?>
                                 <option value="<?php echo $e->id; ?>" <?php if($s->proof_id == $e->id){echo 'selected';} ?> > <?php echo $e->proof_name; ?> </option>
								<?php } ?>
							</select>
				</div>
				<div class="form-group">
					<input type="text" name='institute[]' value="<?php echo $s->institute ;?>" class="form-control" placeholder="موسسه آموزشی">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" name="study_start[]" value="<?php echo $s->start; ?>" class="form-control usage col-md-4 bg-white" readonly placeholder="تاریخ شروع">
					<input type="text" name="study_end[]" value="<?php if($s->still != 1){echo $s->end;} ?>" class="form-control usage col-md-4 bg-white" readonly placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1" onclick="check_study(this)" <?php if($s->still == 1){echo 'checked';}?> type="checkbox" style="margin-top:20px">
					<input type='hidden' name="study_still[]" value='<?php echo $s->still; ?>'>
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="study_explain[]" placeholder="توضیحات"><?php echo $s->explain; ?></textarea>
				</div>
				<?php if($key != 0){ ?>
					<button type="button" class="add-new-field remove_button bg-btn-danger">حذف تحصیلات</button>
				<?php }else{ ?>
					<button type="button" class="add-new-field add_button">اضافه کردن تحصیلات</button>
				<?php } ?>
			</div>
			</div>
								<?php }  ?>
		</div>
								<?php }else{ ?>
		<div id="education" class=" field_wrapper">
		<div class="row ">
			<label class="col-md-3 col-form-label">تحصیلات:</label>
			<div class="col-md-9">
				<div class="form-group">
					<input type="text" class="form-control" placeholder=" رشته تحصیلی (گرایش) " name="major[]">
				</div>
				<div class="form-group">
							<select class="form-control" name='proof[]'>
								<option value="1" selected readonly style="display:none;">مقطع تحصیلی</option>
								<?php foreach($proof as $e){ ?>
                                 <option value="<?php echo $e->id; ?>"> <?php echo $e->proof_name; ?> </option>
								<?php } ?>
							</select>
				</div>
				<div class="form-group">
					<input type="text" name='institute[]' class="form-control" placeholder="موسسه آموزشی">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" name="study_start[]" class="form-control usage col-md-4 bg-white" readonly placeholder="تاریخ شروع">
					<input type="text" name="study_end[]" class="form-control usage col-md-4 bg-white" readonly placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1" onclick="check_study(this)" type="checkbox" style="margin-top:20px">
					<input type='hidden' name="study_still[]" value='0'>
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="study_explain[]" placeholder="توضیحات"></textarea>
				</div>
				<button type="button" class="add-new-field add_button">اضافه کردن تحصیلات</button>
			</div>
			</div>
		</div>
								<?php } if(!empty($job)){ ?>
		 <div id="experience" class="field_wrapper2">
		 <?php foreach($job as $key => $j){?>
			<div class="row">
			<label class="col-md-3 col-form-label">پیشینه شغلی :</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" name="company[]" class="form-control" value="<?php echo $j->company; ?>" placeholder="نام شرکت">
				</div>
				<div class="form-group">
					<input type="text" name="position[]" class="form-control" value="<?php echo $j->position; ?>" placeholder="سطح ارشدیت">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" name="job_start[]" value="<?php echo $j->start; ?>" readonly class="form-control bg-white usage col-md-4" placeholder="تاریخ شروع">
					<input type="text" name="job_end[]" value="<?php if($j->still != 1){echo $j->end;}?>" readonly class="form-control bg-white usage col-md-4" placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1" onclick="check_study(this)" <?php if($j->still == 1){echo 'checked';} ?> type="checkbox" style="margin-top:20px">
					<input type='hidden' name="job_still[]" value='<?php echo $j->still;?>'>
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="job_explain[]" placeholder="توضیحات"><?php echo $j->explain; ?></textarea>
				</div>
				<?php if($key != 0){ ?>
					<button type="button" class="add-new-field remove_button2 bg-btn-danger">حذف شغل</button>
				<?php }else{ ?>
					<button type="button" class="add-new-field add_button2">اضافه کردن شغل</button>
				<?php } ?>
			</div>
		</div>
		 <?php } ?>
		</div>
								<?php  }else{ ?>
		<div id="experience" class="field_wrapper2">
			<div class="row">
			<label class="col-md-3 col-form-label">پیشینه شغلی :</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" name="company[]" class="form-control" placeholder="نام شرکت">
				</div>
				<div class="form-group">
					<input type="text" name="position[]" class="form-control" placeholder="سطح ارشدیت">
				</div>
				<div class="form-group">
				<div class="row">
					<input type="text" name="job_start[]" readonly class="form-control bg-white usage col-md-4" placeholder="تاریخ شروع">
					<input type="text" name="job_end[]" readonly class="form-control bg-white usage col-md-4" placeholder="تاریخ پایان">
					<div class="row col-md-4">
					<label class="col-md-8 mt-4">تا همین لحظه</label>
					<input class="col-md-1" onclick="check_study(this)" type="checkbox" style="margin-top:20px">
					<input type='hidden' name="job_still[]" value='0'>
					</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="job_explain[]" placeholder="توضیحات"></textarea>
				</div>
				<button type="button" class="add-new-field add_button2">اضافه کردن شغل</button>
			</div>
		</div>
		</div>
								<?php } if(!empty($skill)){ $percent = array('خیلی کم'=>20 , 'کم'=> 40 , 'متوسط'=> 60 , 'خوب'=>80 , 'عالی'=>100); ?>
		<div id="skill" class="field_wrapper3">
		<?php foreach($skill as $key => $k){ ?>
			<div class="row">
			<label class="col-md-3 col-form-label">مهارت ها</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" name="skill[]" value="<?php echo $k->name; ?>" class="form-control" placeholder="دانش و مهارت">
				</div>
				<div class="form-group">
				<select class="form-control" name="percent[]">
								<option value="0" readonly selected style="display:none;">میزان تسلط : </option>
								<?php foreach($percent as $ke => $p){?>
								<option value="<?php echo $p;?>" <?php if($p == $k->percent){echo 'selected';} ?> ><?php echo $ke;?></option>
								<?php } ?>
							</select>
							<i class="fa fa-caret-down"></i>
				</div>
				<?php if($key != 0){ ?>
					<button type="button" class="add-new-field remove_button3 bg-btn-danger"> حذف مهارت</button>
				<?php }else{ ?>
					<button type="button" class="add-new-field add_button3">اضافه کردن مهارت</button>
				<?php }?>
			</div>
			</div>
								<?php } ?>
		</div>
								<?php } else{ ?>
									<div id="skill" class="field_wrapper3">
			<div class="row">
			<label class="col-md-3 col-form-label">مهارت ها</label>
			<div class="col-md-9">
			<div class="form-group">
					<input type="text" name="skill[]" class="form-control" placeholder="دانش و مهارت">
				</div>
				<div class="form-group">
				<select class="form-control" name="percent[]">
								<option value="0" readonly selected style="display:none;">میزان تسلط : </option>
								<option value="20">خیلی کم </option>
								<option value="40">کم</option>
								<option value="60">متوسط</option>
								<option value="80">خوب</option>
								<option value="100">عالی</option>
							</select>
							<i class="fa fa-caret-down"></i>
				</div>
				<button type="button" class="add-new-field add_button3">اضافه کردن مهارت</button>
			</div>
			</div>
		</div>
								<?php } ?>
		<br>
		<br>
		<div class="row">
		<label class="col-md-3 col-form-label">درباره من</label>
		<div class='col-md-9'>
		<div class="form-group">
		<textarea class="form-control" name="about" placeholder="درباره خود یک یا دو پارگراف بنویسید"><?php echo $resume->about; ?></textarea>
		</div>
		</div>
		</div>
		
		<div class="row">

			<button name='sub' class="button" type="submit">ارسال رزومه</button>
		</div> 
	</div>
	
</form>

