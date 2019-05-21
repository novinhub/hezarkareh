<div     class="bg-custom"></div>
<!-- sidbar -->
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col ltr">
            <div class="dashboard-container">
            <div class="dashboard-sidebar col-md-3 rtl">
                <div class="user-info">
                  <div class="thumb">
                    <img src="<?php echo base_url('upload/employer/avatar/').$this->session->userdata('co_pic');?>" class="img-fluid circle img-thumbnail" alt="">
                  </div>
                  <div class="user-body mr-4">
                    <h5><?php if($this->session->userdata('co_name') != ''){echo $this->session->userdata('co_name');}else{echo $this->session->userdata('username');} ?></h5>
                    <!-- <span></span> -->
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">پروفایل</p>
                    </div>
                    <div class="progress-body">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percent;?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                      </div>
                      <p class="progress-to left"><?php echo $percent."%";?></p>
                    </div>
                  </div>
                </div>
                <div class="dashboard-menu">
                  <ul>
                    <li class="<?php if($active == 'dashbord'){echo 'active';}?>"><i class="fas fa-home"></i><a href="<?php echo base_url('employer');?>">داشبورد</a></li>
                    <li class="<?php if($active == 'edit'){echo 'active';}?>" ><i class="fas fa-user"></i><a href="<?php echo base_url('employer/edit');?>">ویرایش پروفایل</a></li>
                    <li class="<?php if($active == 'post'){echo 'active';}?>"><i class="fas fa-plus-square"></i><a href="<?php echo base_url('employer/post');?>">ایجاد آگهی جدید</a></li>
                    <li class="<?php if($active == 'jobs'){echo 'active';}?>"><i class="fas fa-briefcase"></i><a href="<?php echo base_url('employer/jobs');?>">آگهی های من</a></li>
                    <!-- <li><i class="fas fa-users"></i><a href="<?php echo base_url('employer/manage_candidate');?>">کارجو های مرتبط</a></li> -->
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-power-off"></i><a href="" data-toggle="modal" data-target="#modal-logoute">خارج شدن</a></li>
                  </ul>
                  <!-- Logout Modal -->
                  <div class="modal fade modal-delete" id="modal-logoute" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="power"></i>خارج شدن</h4>
                          <p>آیا میخواهید خارج شوید؟</p>
                          
                          <div class="modal-footer d-block text-center">
                     <a class="btn btn-danger px-4 py-3 btn-custom" href="<?php echo base_url('employer/log_out'); ?>">بله</a>
                     <button type="button" class="close btn bg-secondary px-4 py-3 text-light ml-4 mr-2 float-none" data-dismiss="modal">بستن </button>
                     </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Logout Modal -->
                </div>
              </div>
              <div class="post-content-wrapper col-md-9">
