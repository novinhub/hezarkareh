<div  class="bg-custom"></div>
 <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-4">
 <div class="account-entry">
      <div class="" id="" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>ورود</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('login/applicant_log')?>" method="post">

                <div class="form-group">
                  <input type="text" name="username" placeholder="نام کابری" class="form-control" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="کلمه عبور" class="form-control" required>
                </div>
                <div class="more-option terms">
                </div>
                <button type="submit" name="sub" class="button primary-bg btn-block">ورود</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="account-entry">
      <div class="" id="" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>ثبت نام</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="<?php echo base_url('login/applicant')?>" method="post">
              <div class="form-group">
                  <input type="text" name = "tel" maxlength="11" pattern="[0-9]{11}" name ='tel' placeholder="شماره همراه" class="form-control" required>
                </div>
                <div class="form-group">
                  <input type="text" name = "username" placeholder="نام کاربری" class="form-control" required>
                </div>

                <div class="form-group">
                  <input type="password" name="password" placeholder="رمز عبور" class="form-control" required>
                </div>

                <button type="submit" name="sub" class="button primary-bg btn-block">ثبت نام</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

 