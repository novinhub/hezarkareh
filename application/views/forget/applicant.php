<div  class="bg-custom"></div>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/applicant');?>" method="post">
				<h4>فراموشی رمز عبور</h4>
				<div class="">
                    <input type="text" name="" placeholder="شماره تماس " required>
					<input type="submit" name="sub" value="دریافت کد ورود ">
				</div>
			</form>
		</div>
</div>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/applicant');?>" method="post">
				<h6>لطفاً کد ارسال شده به تلفن همراه خود را وارد کنید</h6>
				<div class="">
                    <input type="text" name="" placeholder="کد ارسالی " required>
					<input type="submit" name="sub" value="دریافت کلمه عبور جدید">
				</div>
			</form>
		</div>
</div>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/applicant');?>" method="post">
				<h6>رمز عبور خود را وارد کنید</h6>
				<div class="">
                <input type="password" name="password" placeholder="رمز عبور جدید" required>
                <input type="password" name="password" placeholder="تکرار رمز عبور جدید" required>
					<input type="submit" name="sub" value="ورود">
				</div>
			</form>
		</div>
</div>