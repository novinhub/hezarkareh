<div  class="bg-custom"></div>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/applicant');?>" method="post">
				<h3>ثبت نام کارفرما</h3>
				<div class="">
                    <input type="text" name="" placeholder="شماره تماس " required>
					<input type="text" name="username" placeholder="نام کاربری " required>
					<input type="password" name="password" placeholder="رمز عبور" required>
					<input type="submit" name="sub" value="ثبت نام">
				</div>
			</form>
		</div>
</div>