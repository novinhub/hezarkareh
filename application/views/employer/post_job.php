                <form action="#" class="dashboard-form job-post-form rtl">
                  <div class="dashboard-section basic-info-input">
                  <h4><i data-feather="user-check"></i>ایجاد شغل جدید</h4>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">عنوان شغل</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="عنوان شغل خود را بنوسید">
                      </div>
                    </div>
                    <div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> مکان : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="place_id" class="selectpicker " title="<?php if($employer->state == ''){echo 'نام استان و شهر خود را وارد کنید ';}?>" data-live-search="true" required>
								<?php foreach($place as $rows){ if($rows->id == $employer->place_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $rows->id;?>" <?php echo $select;?>>
									<?php echo $rows->state." - ".$rows->city;?>
								</option>
								<?php } ?>
							</select>
				</div>
    </div>
    <div class="form-group row">
			<label class="col-sm-3 col-form-label font-lg"> دسته بندی شغل  : </label>
      <div id="load-selected" class=" form-control col-sm-9 responsive">
							<select id="pemissions-list" name="field_id" class="selectpicker " title="<?php if($employer->name == ''){echo 'حوزه فعالیت خود را وارد کنید';}?>" data-live-search="true" required>
								<?php foreach($field as $row){ if($row->id == $employer->field_id){$select = "selected";}else{$select = '';} ?>
								<option value="<?php echo $row->id;?>" <?php echo $select;?>>
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
                              <select class="form-control" name="assist_id">
                                <?php foreach($assist as $a){?>
                                <option value="<?php echo $a->id;?>"><?php echo $a->assist_name?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <!-- حذف شود -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="محل کار">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name='exp_id'>
                                <?php foreach($experience as $b){ ?>
                                <option value="<?php echo $b->id?>"><?php echo $b->exp_name?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="salary_id">
                                <?php foreach($salary as $c){?>
                                <option value = '<?php echo $c->id;?>'><?php echo $c->salary_name;?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <!-- حذف شود -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="حقوق ماهیانه">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="proof_id">
                                <?php foreach($proof as $d){?>
                                <option value="<?php echo $d->id; ?>"><?php echo $d->proof_name; ?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="sex_id">
                                <?php foreach($sex as $e){?>
                                <option value="<?php echo $e->id; ?>"><?php echo $e->sex_name; ?></option>
                                <?php } ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="soldier_id">
                                <?php foreach($soldier as $f){?>
                                <option value="<?php echo $f->id; ?>"><?php echo $f->soldier_name; ?></option>
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
                        <textarea type="text" class="form-control" placeholder="عنوان شغل خود را بنوسید"></textarea>
                      </div>
                    </div>
                    <!-- حذف شود -->
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">تحصیلات</label>
                      <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="تخصیلات مورد نظر خود را بنوسید"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">مزایا</label>
                      <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="مزایا خود را بنوسید"></textarea>
                      </div>
                    </div>
                    <!-- کامل حذف شود -->
                    <div class="row">
                      <label class="col-md-3 col-form-label">درباره شرکت</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="نام شرکت">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="سایت شرکت">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" placeholder="توضیحات"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button">ایجاد شغل</button>
                      </div>
                    </div>
                  </div>
                </form>
