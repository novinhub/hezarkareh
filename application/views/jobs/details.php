<div  class="bg-custom"></div>

<div class="alert alert-success2 text-white alert-dismissible fade show text-center text-white m-3" style="display:none;" id="alert_login" role="alert">
<p id="alert_p"></p>
	<button type="button" class="close" onclick="closeAlert()" id="close_alert">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="<?php echo base_url('upload/employer/avatar/').$job->co_pic;?>" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4><?php echo $job->title;?></h4>
                    <div class="info">
                      <span class="company"><i data-feather="briefcase"></i><?php echo $job->co_name;?></span>
                      <span class="office-location"><i data-feather="map-pin"></i><?php echo $job->state." - ".$job->city;?> </span>
                      <span class="job-type full-time"><i data-feather="clock"></i><?php  echo $job->assist_name; ?></span>
                    </div>
                  </div>
                </div>
                <?php if(!$this->session->has_userdata('e_login')){ ?>
                <div class="buttons">
                <?php if(!$this->session->has_userdata('a_login')){ ?>
                  <a class="save" onclick="checkLogin()"><i data-feather="heart"></i>نشان کردن </a>
                  <a class="apply" onclick="checkLogin()"  >فرستادن رزومه</a>
                <?php  }else{ ?>
                <a onclick ="bookmark(<?php echo $job->id;?>)" class="save <?php if($bookmark == 1){ ?>save_active<?php }?>"><i data-feather="heart"></i><span id="book_span"><?php if($bookmark == 1){echo 'حذف نشان';}else{echo 'نشان کردن';}?></span></a>
                <a onclick ="sent(<?php echo $job->id;?>)" class="apply" id='sent_status'><?php if($sent == 1){echo 'بازگشت رزومه';}else{echo 'ارسال رزومه';}?></a>
              <?php  } ?>
                </div>
                <?php } ?>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8 offset-xl-1">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>توضیحات شغل</h4>
<p><?php echo $job->explain; ?> </p>
                    </div>


                    <div class="other-benifit details-section">
                      <h4><i data-feather="gift"></i>مزایا</h4>
                      <?php if($job->benefit == ''){echo 'ثبت نشده است';}else{echo $job->benefit;};?>
                    </div>
                  </div>
                  <div class="col-xl-4  col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>خلاصه کار </h4>
                        <ul>
                          <li>نوع همکاری:<span><?php echo $job->assist_name;?></span></li>
                          <li>حوزه فعالیت : <span><?php echo $job->name;?></span></li>
                          <li> سابقه کار:<span><?php echo $job->exp_name;?></span></li>
                          <li>دستمزد :<span><?php echo $job->salary_name;?></span></li>
                          <li>مدرک تحصیلی :<span><?php echo $job->proof_name;?></span></li>
                          <li>وضعیت سربازی :<span><?php echo $job->soldier_name;?></span></li>
                          <li>جنسیت : <span><?php echo $job->sex_name;?></span></li>
                        </ul>
                      </div>
                      <div class="share-job-post">
                        <span class="share"><i class="fas fa-share-alt"></i>Share:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="add-more"><span class="ti-plus"></span></a>
                      </div>
                      <!-- <div class="buttons">
                        <a href="#" class="button print"><i data-feather="printer"></i>پرینت</a>
                        <a href="#" class="button report"><i data-feather="flag"></i>شکایات</a>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>معرفی شرکت</h4>
                    <ul>
                      <li><span>نام شرکت : </span><?php echo $job->co_name; ?></li>
                      <li><span> آدرس وب سایت : </span> <?php if($job->co_web == ''){echo 'ثبت نشده است';}else{echo "<a href=".$job->co_web." target='_blank'>".$job->co_web."</a>";}?> </li>
                      <li><span> درباره شرکت : </span></li>
                      <li><?php echo $job->ex;?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->
    <script>
    var alertInfo = document.getElementById('alert_login');
    var close_alert = document.getElementById('close_alert');
    var alert_p = document.getElementById('alert_p');
    var sent_status = document.getElementById('sent_status');
function checkLogin(){
    alertInfo.style.display = 'block';
    alert_p.innerHTML = '	ابتدا باید وارد حساب کاربری خود شوید . برای وارد شدن می توانید <a style="text-decoration: underline;" href="<?php echo base_url('login/applicant');?>">اینجا</a> کلیک کنید';
}
function closeAlert(){
  alertInfo.style.display = 'none';
}
var bookSpan = document.getElementById('book_span');
function bookmark(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var result = xhttp.responseText;
     if(result == 1){
       bookSpan.innerHTML = 'حذف نشان ';
       bookSpan.parentElement.style.color = "#ff8fa6";
       bookSpan.parentElement.style.borderColor = "#ff8fa6";
     }else{
      bookSpan.innerHTML = 'نشان کردن';
      bookSpan.parentElement.removeAttribute('style');
     }
    }
  };
  xhttp.open("post", "<?php echo base_url("jobs/bookmark/")?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('job_id='+id);
}

function sent(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var result = xhttp.responseText;
     if(result == 0){
      alertInfo.style.display = 'block';
      alert_p.innerHTML = ' ابتدا باید رزومه خود را بسازید . برای ایجاد روزمه <a style="text-decoration: underline;" href="<?php echo base_url('applicant/add_resume');?>">اینجا</a> کلیک کنید ';
     }else if(result == 1){
      sent_status.innerHTML = 'بازگشت رزومه';
     }else{
      sent_status.innerHTML = 'ارسال رزومه';
     }
    }
  };
  xhttp.open("post", "<?php echo base_url("jobs/sent/")?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('job_id='+id);
}
    </script>