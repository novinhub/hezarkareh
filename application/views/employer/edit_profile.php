<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
                <form action="#" class="dashboard-form rtl">

                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>پروفایل</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">نام و نام خانوادگی:</label>
                      <div class="col-sm-9">
                        <input type="text" name="fullname" value = "<?php echo $edit->fullname; ?>" class="form-control" placeholder="علی شیرازی">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">نام شرکت:</label>
                      <div class="col-sm-9">
                        <input type="text" name="co_name" value="<?php echo $edit->co_name; ?>" class="form-control" placeholder="نوین تک">
                      </div>
                    </div>
    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">آدرس وب سایت : <small class='text-primary'> (اختیاری) </small></label>
                      
                      <div class="col-sm-9">
                        <input type="text" name="co_web" value="<?php echo $edit->co_web;?>" class="form-control" placeholder="https://novin-network.com">
                      </div>
                    </div>


                    <div class="row">
      <form id="load-selected">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="input-group responsive">
                <select  id="pemissions-list" class="selectpicker "
                         title="<?php if($edit->state != ''){echo $edit->state;}else{echo 'نام استان و شهر خود را وارد کنید';}?>" data-live-search="true">
                  <option>cow</option>
                  <option >bull</option>
                  <option >ox</option>
                  <option>ASD</option>
                  <option >Bla</option>
                  <option>Ble</option>
                </select>
                <span class="input-group-btn">
                  <button type="submit" form="load-selected-permission" class="btn btn-default center">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
         </div>
      </form>
    </div>

    

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">شماره تماس:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="09...">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">آدرس:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="شیراز خیابان ...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">دسته بندی شغلی:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="طراحی">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">درباره ما</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="dashboard-section upload-profile-photo">
                    <div class="update-photo">
                      <img class="image" src="<?php echo base_url('files/');?>dashboard/images/company-logo.png" alt="">
                    </div>
                    <div class="file-upload">            
                      <input type="file" class="file-input">Change Avatar
                    </div>
                  </div>
                </form>
