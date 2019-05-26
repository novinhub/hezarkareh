<div  class="bg-custom"></div>
<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
 <!-- <div class="row">
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

              <form action="<?php //echo base_url('login/applicant')?>" method="post">
              <div class="form-group">
                  <input type="text" title='شماره تلفن معتبر وارد کنید' name = "tel" data-toggle="tooltip" data-placement="bottom" maxlength="11" pattern="[0-9]{11}" name ='tel' placeholder="شماره همراه" class="form-control" required>
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
    </div> -->
    <div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/applicant');?>" method="post">
				<h3>ورود کارجو</h3>
				<div class="border-bottom-white">
					<input type="text" name="username" placeholder="نام کاربری " required>
					<input type="password" name="password" placeholder="رمز عبور" required>
					<input type="submit" name="sub" value="ورود به پنل">
				</div>
				<div class="row mt-3">
					<span class="col-7 "><a class="bg-white " href="<?php echo base_url('forget/applicant');?>">فراموشی رمز عبور</a></span>
					<span class="col-5 "><a class="bg-white " href="<?php echo base_url('signup/applicant');?>">ثبت نام</a></span>
				</div>
			</form>
		</div>

</div>
 