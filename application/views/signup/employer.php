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
			<form class="box-login" action="<?php echo base_url('signup/employer');?>" method="post">
				<h3>ثبت نام کارفرما</h3>
				<div class="">
				    <input type="text" name="tel" title='شماره تلفن معتبر وارد کنید' data-toggle="tooltip" data-placement="bottom" maxlength="11" pattern="[0-9]{11}" placeholder="شماره همراه" required>
					<input type="text" name="username" placeholder="نام کاربری " required>
					<input type="password" name="password" placeholder="رمز عبور" required>
					<input type="submit" name="sub" value="ثبت نام">
				</div>
			</form>
		</div>
</div>