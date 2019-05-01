    <!-- Banner -->
    <div class="banner banner-1 banner-1-bg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="banner-content lefttbox text-center">
              <h1>58,246 کار </h1>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
              <a href="add-resume.html" class="button">قرار دادن رزومه</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->

    <!-- Search and Filter -->
    <div class="searchAndFilter-wrapper">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="searchAndFilter-block">
              <div class="searchAndFilter">
                <form action="#" class="search-form">
                  <input type="text" placeholder="کلمات کلیدی"> 
                  <select class="selectpicker" id="search-location">
                    <option value="" selected>مکان</option>
                    <option value="california">California</option>
                    <option value="las-vegas">Las Vegas</option>
                    <option value="new-work">New Work</option>
                    <option value="carolina">Carolina</option>
                    <option value="chicago">Chicago</option>
                    <option value="silicon-vally">Silicon Vally</option>
                    <option value="washington">Washington DC</option>
                    <option value="neveda">Neveda</option>
                  </select>
                  <select class="selectpicker text-right" id="search-category">
                    <option value="" selected>دسته بندی</option>
                    <option value="real-state">Real State</option>
                    <option value="vehicales">Vehicales</option>
                    <option value="electronics">Electronics</option>
                    <option value="beauty">Beauty</option>
                    <option value="furnitures">Furnitures</option>
                  </select>
                  <button class="button primary-bg mr-4">جستجوی کار<i class="fas fa-search"></i></button>
                </form>
                <!-- <div class="filter-categories">
                  <h4>دسته بندی های آگهی  </h4>
                  <ul>
                    <li><a href="#"><i ></i>حسابداری و فروش <span>(233)</span></a></li>
                    <li><a href="#"><i ></i>طراحی و گرافیک  <span>(46)</span></a></li>
                    <li><a href="#"><i ></i>مهندسی و فنی حرفه ای  <span>(156)</span></a></li>
                    <li><a href="#"><i ></i>Health Care <span>(98)</span></a></li>
                    <li><a href="#"><i ></i>Engineer & Architects <span>(188)</span></a></li>
                    <li><a href="#"><i ></i>Marketing & Sales <span>(124)</span></a></li>
                    <li><a href="#"><i ></i>Garments / Textile <span>(584)</span></a></li>
                    <li><a href="#"><i ></i>Customer Support <span>(233)</span></a></li>
                    <li><a href="#"><i ></i>Digital Media <span>(15)</span></a></li>
                    <li><a href="#"><i ></i>Telecommunication <span>(03)</span></a></li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search and Filter End -->

    <!-- Jobs -->
    <div class="section-padding-bottom alice-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <!-- <ul class="nav nav-tabs job-tab" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">Recent Job</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature" role="tab" aria-controls="feature" aria-selected="false">Feature Job</a>
              </li>
            </ul> -->
             <h4 class="text-center mb-4">آخرین پیشنهادات</h4>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                <?php if(empty($jobs)){?>
                <div class="row">
                <div class="col-lg-12 text-center text-xlarge">موردی یافت نشد</div>
                </div>
                <?php }else{ ?>
                <div class="row">
                  <?php foreach($jobs as $rows){?>
                  <div class="col-lg-6">
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="<?php echo base_url('jobs/detail/').$rows->id; ?>">
                          <img src="<?php echo base_url('upload/employer/avatar/').$rows->co_pic;?>" class="img-fluid" alt="<?php echo $rows->title; ?>">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4 class="mr-4"><a href="<?php echo base_url('jobs/detail/').$rows->id; ?>"><?php echo $rows->title; ?></a></h4>
                          <div class="info">
                            <span class="company"><i data-feather="briefcase"></i><?php echo $rows->co_name; ?></span>
                            <span class="office-location"><i data-feather="map-pin"></i><?php echo $rows->state." - ".$rows->city?></span>
                            <span class="job-type temporary"><i data-feather="clock"></i><?php echo $rows->assist_name?></span>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <?php } ?>
                </div>
                <?php } ?>
              </div>
              <div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-10.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">UI Designer</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-1.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">Designer Required</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-2.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">Project Manager</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-1.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">Designer Required</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-8.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">Restaurant Team Member - Crew </a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                            <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-9.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-listing.html">Nutrition Advisor</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-3.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">Land Development Marketer</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
                            <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-2.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">Project Manager</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-8.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">Restaurant Team Member - Crew </a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                            <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-9.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">Nutrition Advisor</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                            <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-10.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">UI Designer</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                            <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                    <div class="job-list half-grid">
                      <div class="thumb">
                        <a href="#">
                          <img src="<?php echo base_url('files/');?>images/job/company-logo-3.png" class="img-fluid" alt="">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="job-details.html">Land Development Marketer</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
                            <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                            <a href="#" class="button">Apply Now</a>
                            <a href="#" class="favourite"><i data-feather="heart"></i></a>
                          </div>
                          <p class="deadline">Deadline: Oct 31, 2018</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jobs End -->

    <!-- Top Companies -->
    <div class="section-padding-top padding-bottom-90 bg-white text-center ltr">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header">
              <h2>تست خودشناسی</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="company-carousel owl-carousel">
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-1.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">تست هوش هیجانی</a></h4>
                  <span>baron</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-2.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">پروفایل دیسک</a></h4>
                  <span>DISK</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-3.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">تست سبک انگیزشی</a></h4>
                  <span>DMSI</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-4.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">تست توانایی‌ها</a></h4>
                  <span>hartman</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-1.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">تست سبک حل تعارض</a></h4>
                  <span>TKI</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="#">
                    <img src="<?php echo base_url('files/');?>images/company/company-logo-1.png" class="img-fluid" alt="">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.html">تست شخصیت شناسی</a></h4>
                  <span>NEO FFI</span>
                  <a href="job-listing.html" class="button">شروع تست</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Companies End -->
    
    <!-- Fun Facts -->
    <div class="padding-top-90 padding-bottom-60 fact-bg">
      <div class="container">
        <div class="row fact-items">
          <div class="col-md-3 col-sm-6">
            <div class="fact">
              <div class="fact-icon">
                <i data-feather="briefcase"></i>
              </div>
              <p class="fact-number"><span class="count" data-form="0" data-to="103"></span></p>
              <p class="fact-name">پیشنهاد کار</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="fact">
              <div class="fact-icon">
                <i data-feather="users"></i>
              </div>
              <p class="fact-number"><span class="count" data-form="0" data-to="684"></span></p>
              <p class="fact-name">کارفرما</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="fact">
              <div class="fact-icon">
                <i data-feather="file-text"></i>
              </div>
              <p class="fact-number"><span class="count" data-form="0" data-to="1354"></span></p>
              <p class="fact-name">رزومه</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="fact">
              <div class="fact-icon">
                <i data-feather="award"></i>
              </div>
              <p class="fact-number"><span class="count" data-form="0" data-to="1620"></span></p>
              <p class="fact-name">کارجو</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fun Facts End -->

    <!-- Registration Box -->
    <div class="section-padding">
      <div class="container">
        <div class="row"> 
          <div class="col-lg-6">
            <div class="call-to-action-box employer-register">
              <div class="icon">
                <img src="<?php echo base_url('files/');?>images/register-box/2.png" alt="">
              </div>
              <span>آیا شما</span>
              <h3>کارفرما هستید؟</h3>
              <a href="#" data-toggle="modal" data-target="#modalemployer">ثبت نام کنید <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="call-to-action-box candidate-box">
              <div class="icon">
                <img src="<?php echo base_url('files/');?>images/register-box/1.png" alt="">
              </div>
              <span>آیا شما</span>
              <h3>کارجو هستید؟</h3>
              <a href="#" data-toggle="modal" data-target="#modalCandidate">ثبت نام کنید <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration Box End -->

    <!-- Modal Employer -->
    <div class="account-entry">
      <div class="modal fade" id="modalemployer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>ثبت نام</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="account-type">
                <a href="#" class="candidate-acc"><i data-feather="user"></i>کارجو</a>
                <a href="#" class="employer-acc active"><i data-feather="briefcase"></i>کارفرما</a>
              </div>
              <form action="#">
                <div class="form-group">
                  <input type="text" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control">
                </div>
                <div class="more-option terms">
                  <div class="form-check">
                  </div>
                </div>
                <button class="button primary-bg btn-block">ثبت نام</button>
              </form>
              <p class="mt-2">ثبت نام کرده اید؟ <a class="btn btn-primary" href="#">ورود</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
 <!--/ Modal Employer -->
 <!-- Modal Candidate -->
     <div class="account-entry">
      <div class="modal fade" id="modalCandidate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>ثبت نام</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="account-type">
                <a href="#" class="candidate-acc active"><i data-feather="user"></i>کارجو</a>
                <a href="#" class="employer-acc "><i data-feather="briefcase"></i>کارفرما</a>
              </div>
              <form action="#">
                <div class="form-group">
                  <input type="text" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control">
                </div>
                <div class="more-option terms">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck3">
                      I accept the <a href="#">terms & conditions</a>
                    </label>
                  </div>
                </div>
                <button class="button primary-bg btn-block">Register</button>
              </form>
              <p class="mt-2">ثبت نام کرده اید؟ <a class="btn btn-primary" href="#">ورود</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
 <!--/ Modal Employer -->
 