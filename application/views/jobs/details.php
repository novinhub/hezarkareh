<div  class="bg-custom"></div>

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
                <div class="buttons">
                  <a class="save" href="#"><i data-feather="heart"></i>ذخیره شغل</a>
                  <a class="apply" href="#">فرستادن رزومه</a>
                </div>
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
                    <!-- <div class="job-apply-buttons">
                      <a href="#" class="apply">فرستاk رزومه</a>
                      <a href="#" class="email"><i data-feather="mail"></i>فرستادن</a>
                    </div> -->
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
                      <div class="buttons">
                        <a href="#" class="button print"><i data-feather="printer"></i>پرینت</a>
                        <a href="#" class="button report"><i data-feather="flag"></i>شکایات</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>درباره شرکت</h4>
                    <ul>
                      <li><span>Company Name:</span> The Oreo Company Ltd.</li>
                      <li><span>Address:</span> Queens, NY 11375 USA</li>
                      <li><span>Website:</span> <a href="#">www.theoreoltd.com</a></li>
                      <li><span>Company Profile:</span></li>
                      <li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum looked up one of the more obscure Latin words, consectetur.</li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->