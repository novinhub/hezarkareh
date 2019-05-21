<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
	<?php echo $msg[0]; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>

</div>
<?php } ?>
<h6 class="p-3 mb-3" >آگهی های نشان شده</h6>

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
                          <span class="company"><i data-feather="briefcase"></i><?php echo $rows->co_name; ?></span>
                            <span class="office-location"><i data-feather="map-pin"></i><?php echo $rows->state." - ".$rows->city;?></span>
                            <span class="job-type temporary"><i data-feather="clock"></i><?php echo $rows->assist_name;?></span>
                
                          </div>
                        </div>
   
                      </div>
                    </div>
                   <?php } }?>
