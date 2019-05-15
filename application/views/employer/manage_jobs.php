<h6 class="p-3 mb-3" >آگهی های من</h6>

                   <?php if(empty($jobs)){ ?>
                    <h5 class="text-center ">موردی یافت نشد</h5><hr>
                   <?php }else{ foreach($jobs as $rows){ ?>
                    <div class="job-list rtl">
                      <div class="thumb">
                        <a href="<?php echo base_url('jobs/detail/').$rows->id;?>">
                          <img src="<?php echo base_url('upload/employer/avatar/').$rows->co_pic;?>" class="img-fluid" alt="<?php echo $rows->title;?>">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a class="mr-4" href="<?php echo base_url('jobs/detail/').$rows->id;?>"><?php echo $rows->title;?></a></h4>
                          <div class="info">
                            
                            <span class="office-location"><i data-feather="map-pin"></i><?php echo $rows->state." - ".$rows->city;?></span>
                            <span class="job-type temporary"><i data-feather="clock"></i><?php echo $rows->assist_name;?></span>
                            <!-- <span class="badge bg-badge-danger">فوری</span> -->
                          </div>
                        </div>
                        <div class="more">
                          <div class="buttons">
                          <a href="#" class="button">تمدید آگهی</a>
                          
                          </div>
                        
                          <p class="deadline"> تاریخ انقضا :  <?php echo $rows->expire." ".$rows->expire_time; ?></p>
                        </div>
                      </div>
                    </div>
                   <?php } }?>
                

                   <!-- <div class="pagination-list text-center">
                  <nav class="navigation pagination">
                    <div class="nav-links">
                      <a class="prev page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                      <a class="page-numbers" href="#">1</a>
                      <span aria-current="page" class="page-numbers current">2</span>
                      <a class="page-numbers" href="#">3</a>
                      <a class="page-numbers" href="#">4</a>
                      <a class="next page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                    </div>
                  </nav>                
                </div> -->
