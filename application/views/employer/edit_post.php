<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
	<?php echo $msg[0]; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>

</div>
<?php } ?>                
                <form action="<?php echo base_url('employer/edit_post/').$job->id;?>" method="post" class="dashboard-form job-post-form rtl">
                  <div class="dashboard-section basic-info-input">
                  <h4><i data-feather="user-check"></i>ویرایش آگهی </h4>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">عنوان شغل</label>
                      <div class="col-md-9">
                        <input type="text" value="<?php echo $job->title;?>" name="title" class="form-control" placeholder="عنوان شغل خود را بنوسید" required>
                      </div>
                    </div>
                    <div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> مکان : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="place_id" class="selectpicker " title='نام استان و شهر خود را وارد کنید ' data-live-search="true" required>
								<?php foreach($place as $rows){ ?>
								<option value="<?php echo $rows->id;?>" <?php if($rows->id == $job->place_id){echo "selected";}?> >
									<?php echo $rows->state." - ".$rows->city;?>
								</option>
								<?php } ?>
							</select>
				</div>
    </div>
    <div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> دسته بندی شغل  : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="field_id" class="selectpicker " title= 'حوزه فعالیت خود را وارد کنید' data-live-search="true" required>
								<?php foreach($field as $row){ ?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $job->field_id){echo "selected";}?> >
									<?php echo $row->name;?>
								</option>
								<?php } ?>
							</select>
				</div>
		</div>
                    <div class="row">
                      <label class="col-md-3 col-form-label">شرایط کار</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="assist_id" required>
                              <option selected disabled style="display:none;">نوع همکاری</option>
                                <?php foreach($assist as $a){ ?>
                                <option value="<?php echo $a->id;?>" <?php if($a->id == $job->assist_id){echo "selected";}?> ><?php echo $a->assist_name?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name='exp_id' required>
                              <option selected disabled style="display:none;"> سابقه کار</option>
                                <?php foreach($experience as $b){ ?>
                                <option value="<?php echo $b->id?>" <?php if($b->id == $job->exp_id){echo "selected";}?>><?php echo $b->exp_name?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="salary_id" required>
                              <option selected disabled style="display:none;">میزان حقوق</option>
                                <?php foreach($salary as $c){ ?>
                                <option value = '<?php echo $c->id;?>' <?php if($c->id == $job->salary_id){echo "selected";}?>><?php echo $c->salary_name;?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="proof_id" required>
                              <option selected disabled style="display:none;">مدرک تحصیلی</option>
                                <?php foreach($proof as $d){ ?>
                                <option value="<?php echo $d->id; ?>" <?php if($d->id == $job->proof_id){echo "selected";}?> ><?php echo $d->proof_name; ?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="sex_id" required>
                              <option selected disabled style="display:none;">جنسیت</option>
                                <?php foreach($sex as $e){?>
                                <option value="<?php echo $e->id; ?>" <?php if($e->id == $job->sex_id){echo "selected";}?> ><?php echo $e->sex_name; ?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="soldier_id" required>
                              <option selected disabled style="display:none;"> وضعیت سربازی</option>
                                <?php foreach($soldier as $f){?>
                                <option value="<?php echo $f->id; ?>" <?php if($f->id == $job->soldier_id){echo "selected";}?> ><?php echo $f->soldier_name; ?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">شرح موقعیت شغلی</label>
                      <div class="col-md-9">
                        <textarea type="text" name="explain" class="form-control" placeholder="در این قسمت موقعیت شغلی خود را به صورت کامل شرح دهید" required ><?php echo $job->explain;?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">مزایا</label>
                      <div class="col-md-9">
                        <textarea type="text" name="benefit" class="form-control" placeholder="در این قسمت مزایای که می توانید تامین کنید را بنویسید"><?php echo $job->benefit;?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button name="sub" class="button">ایجاد آگهی</button>
                      </div>
                    </div>
                  </div>
                </form>