<div  class="bg-custom"></div>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('signup/applicant');?>" method="post">
				<h3>ثبت نام کارجو</h3>
				<div class="">
				<input type="text" title='شماره تلفن معتبر وارد کنید' data-toggle="tooltip" data-placement="bottom" name="tel" maxlength="11" pattern="[0-9]{11}" placeholder="شماره همراه" class="form-control" required>
					<input type="text" name="username" placeholder="نام کاربری " required>
					<input type="password" name="password" placeholder="رمز عبور" required>
					<input type="submit" name="sub" value="ثبت نام">
				</div>
			</form>
		</div>
</div>