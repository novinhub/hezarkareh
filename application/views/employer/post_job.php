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
                              <select class="form-control">
                                <option>دسته بندی را انتخاب کنید</option>
                                <option>طراحی</option>
                                <option>سلامتی</option>
                                <option>برنامه نویسی</option>
                                <option>مدیریت</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="محل کار">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control">
                                <option>نوع کار</option>
                                <option>نیمه وقت</option>
                                <option>تمام وقت</option>
                                <option>موقتی</option>                       
                                <option>فریلنس</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control">
                                <option>کارآموز</option>
                                <option>سابقه کار</option>
                                <option>کمتر از 1 سال</option>
                                <option>2 سال</option>
                                <option>3 سال</option>
                                <option>بیشتر از 4 سال</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="حقوق ماهیانه">
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
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">عنوان شغل</label>
                      <div class="col-md-9">
                        <textarea type="text" class="form-control" placeholder="عنوان شغل خود را بنوسید"></textarea>
                      </div>
                    </div>
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
