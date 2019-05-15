<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<div class="rtl">
<div class="information mb-4">
<h4><i data-feather="user-plus"></i> اطلاعات شخصی </h4>
                      <ul>
                        <li ><span>نام و نام خانوادگی : </span><?php echo $resume->fullname;?></li>
                        <li><span> مکان : </span><?php echo $resume->state." - ".$resume->city; ?></li>
                        <li><span> حوزه فعالیت : </span> <?php echo $resume->field_name; ?></li>
                        <li><span> وضعیت شغلی : </span><?php echo $resume->status_name; ?></li>
                        <li><span> جنسیت : </span><?php echo $resume->sex_name; ?></li>
                        <li><span> وضعیت تاهل : </span> <?php echo $resume->marital_status;?> </li>
                        <li><span> سن : </span><?php echo $age; ?></li>
                        <?php if($resume->sex_id != 3){ ?> 
                        <li><span>وضعیت خدمت : </span><?php echo $resume->soldier_name;?></li>
                        <?php } ?>
                        <?php if($resume->email != ''){ ?>
                        <li><span> ایمیل : </span> <?php echo $resume->email; ?></li>
                        <?php } ?>
                      </ul>
                    </div>

                <div class="about-details details-section dashboard-section">
                  <h4><i data-feather="align-left"></i>درباره من</h4>
              <p><?php echo $resume->about; ?></p>
                </div>

                <?php if(!empty($study)){ ?>
                <div class="edication-background details-section dashboard-section">
                  <h4><i data-feather="book"></i>تحصیلات</h4>
                  <?php foreach($study as $row){?>
                  <div class="education-label">
                    <span class="study-year"><?php echo substr($row->start , 0 , 4)." تا "; if($row->still == 1){echo 'الان';}else{echo substr($row->end , 0 , 4); }?></span>
                    <h5><?php echo $row->major." - ".$row->proof_name;?></h5>
                    <span class="institute"><?php echo $row->institute;?></span>
                    <br>
                     <p><?php echo $row->explain ?></p>
                  </div>
                 <?php } ?>
                </div>
                <?php } ?>
                 <?php if(!empty($job)){?>
                <div class="experience dashboard-section details-section">
                  <h4><i data-feather="briefcase"></i>سوابق شغلی</h4>
                  <?php foreach($job as $rows){?>
                  <div class="experience-section">
                    <span class="service-year"><?php echo substr($rows->start , 0 , 4)." تا "; if($rows->still == 1){echo 'الان';}else{echo substr($rows->end , 0 , 4); }?></span>
                    <h5><?php echo $rows->position." - ".$rows->company;?></h5>
                    <p><?php echo $rows->explain; ?></p>
                  </div>
                  <?php } ?>
                </div>
                 <?php } ?>
                 <?php if(!empty($skill)){?>
                <div class="professonal-skill dashboard-section details-section">
                  <h4><i data-feather="feather"></i>توانایی ها</h4>
                  <div class="progress-group">
                    <?php foreach($skill as $skills){ ?>
                    <div class="progress-item">
                      <div class="progress-head">
                        <p class="progress-on"><?php echo $skills->name; ?></p>
                      </div>
                      <div class="progress-body">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skills->percent;?>" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                        </div>
                        <p class="progress-to"><?php echo $skills->percent;?>%</p>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                 <?php } ?>
                 <br>
                 <br>
                <!-- <div class="special-qualification dashboard-section details-section">
                  <h4><i data-feather="gift"></i>Special Qualification</h4>
                  <ul>
                    <li>5 years+ experience designing and building products.</li>
                    <li>Skilled at any Kind Design Tools.</li>
                    <li>Passion for people-centered design, solid intuition.</li>
                    <li>Hard Worker & Quick Lerner.</li>
                  </ul>
                </div> -->
                <!-- <div class="portfolio dashboard-section details-section">
                  <h4><i data-feather="gift"></i>Portfolio</h4>
                  <div class="portfolio-slider owl-carousel">
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-3.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-1.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-2.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-3.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                    <div class="portfolio-item">
                      <img src="images/portfolio/thumb-2.jpg" class="img-fluid" alt="">
                      <div class="overlay">
                        <a href="#"><i data-feather="eye"></i></a>
                        <a href="#"><i data-feather="link"></i></a>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="download-resume dashboard-section mt-4">
                  <a href="#">دانلود pdf<i data-feather="download"></i></a>
                </div>
              </div> -->
              
              <!-- <div class="skill-and-profile dashboard-section">
                  <div class="skill">
                    <label>Skills:</label>
                    <a href="#">Design</a>
                    <a href="#">Illustration</a>
                    <a href="#">iOS</a>
                  </div>
                  <div class="social-profile">
                    <label>Social:</label>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                  </div>
                </div> -->