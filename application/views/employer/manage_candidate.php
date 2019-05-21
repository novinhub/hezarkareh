<?php if($this->session->has_userdata('msg')){ $msg = $this->session->userdata('msg');?>
<div class="alert alert-<?php echo $msg[1]; ?> text-white alert-dismissible fade show text-center text-white m-3" role="alert">
  <?php echo $msg[0]; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="text-white" aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<div class="manage-candidate-container rtl ">
                  <table class="table">
                    <thead>
                      <tr >
                        <th class="mb-4"> کارجوهای درخواست داده </th>
                        <th class="mb-4">وضعیت</th>
                        <th class="action"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(empty($resume)){ ?>
                        <tr class="candidates-list text-center"><td colspan = "3">موردی یافت نشد</td></tr>
                        <?php }else{foreach($resume as $row){ ?> 
                      <tr class="candidates-list">
                        <td class="title">
                          <div class="thumb">
                            <img src="<?php echo base_url('upload/applicant/avatar/').$row->pic_name;?>" class="img-fluid" alt="">
                          </div>
                          <div class="body">
                            <h5><a class="mr-4" href="<?php echo base_url('resume/show/').$row->id."/".$this->uri->segment(3);?>"><?php echo $row->fullname;?></a></h5>
                            <div class="info">
                              <span class="designation"><a><i data-feather="check-square"></i> <?php echo $row->name;?></a></span>
                              <span class="location"><a><i data-feather="map-pin"></i><?php echo $row->state." ".$row->city; ?></a></span>
                            </div>
                          </div>
                        </td>
                        <td class="status"><i data-feather="check-circle"></i><?php echo $row->status_name;?></td>
                        <td></td>
                        <!-- <td class="action">
                          <a href="#" class="download"><i data-feather="download"></i></a>
                          <a href="#" class="inbox"><i data-feather="mail"></i></a>
                          <a href="#" class="remove"><i data-feather="trash-2"></i></a>
                        </td> -->
                      </tr>
                      <?php } }?>
                    </tbody>
                  </table>
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
                </div>