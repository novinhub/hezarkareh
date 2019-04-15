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
                    <img src="<?php echo base_url('files/');?>dashboard/images/user.png" class="img-fluid circle img-thumbnail" alt="">
                  </div>
                  <div class="user-body mr-4">
                    <h5>علی شیرازی</h5>
                    <!-- <span></span> -->
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">رزومه</p>
                    </div>
                    <div class="progress-body">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                      </div>
                      <p class="progress-to left">70%</p>
                    </div>
                  </div>
                </div>
                <div class="dashboard-menu">
                  <ul>
                    <li class="active"><i class="fas fa-home"></i><a href="<?php echo base_url('candidates');?>">داشبورد</a></li>
                    <li><i class="fas fa-file-alt"></i><a href="<?php echo base_url('candidates/resume');?>">رزومه</a></li>
                    <li><i class="fas fa-edit"></i><a href="edit-resume.html">ساخت رزومه</a></li>
                    <li><i class="fas fa-heart"></i><a href="dashboard-bookmark.html">نشان شده ها</a></li>
                    <li><i class="fas fa-check-square"></i><a href="dashboard-applied.html">درخواست های استخدام</a></li>
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-power-off"></i><a href="#" data-toggle="modal" data-target="#modal-logoute">خارج شدن</a></li>
                    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">پاک کرده رزومه</a></li>
                  </ul>
                  <!--delet Modal -->
                  <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="trash-2"></i>پاک کردن رزومه</h4>
                          <p>آیا میخواهید رزوlه شما از لیست رزومه ها پاک شود؟</p>
                          
                          <div class="modal-footer d-block text-center">
                     <a class="btn btn-danger px-4 py-3 btn-custom" href="#">بله</a>
                     <button type="button" class="close btn bg-secondary px-4 py-3 text-light ml-4 mr-2 float-none" data-dismiss="modal">بستن </button>
                     </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Delet Modal -->
                  <!-- Logout Modal -->
                  <div class="modal fade modal-delete" id="modal-logoute" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="power"></i>خارج شدن</h4>
                          <p>آیا میخواهید خارج شوید؟</p>
                          
                          <div class="modal-footer d-block text-center">
                     <a class="btn btn-danger px-4 py-3 btn-custom" href="#">بله</a>
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
