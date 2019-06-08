<div class="bg-custom"></div>
<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
	<?php echo $msg[0]; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>

</div>
<?php } ?>
<div class="row my-10">
		<div class="col-lg-8 d-none d-lg-block">
			<img  src="<?php echo base_url('files/');?>images/bg/login.jpg">
		</div>
		<div class="col-sm-12 col-lg-3">
			<form class="box-login" action="<?php echo base_url('login/employer');?>" method="post">
				<h3>ورود کارفرما</h3>
				<div class="border-bottom-white">
					<input type="text" name="username" placeholder="نام کاربری " required>
					<input type="password" name="password" placeholder="رمز عبور" required>
					<input type="submit" name="sub" value="ورود به پنل">
				</div>
				<div class="row mt-3">
					<span class="col-7 "><a class="bg-white " href="<?php echo base_url('forget/employer');?>">فراموشی رمز عبور</a></span>
					<span class="col-5 "><a class="bg-white " href="<?php echo base_url('signup/employer');?>">ثبت نام</a></span>
				</div>
			</form>
		</div>
</div>