<div class="breadcrumb-line breadcrumb-line-component mb-20">
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
    <li><a href="alpaca_basic.html">Alpaca</a></li>
    <li class="active">Basic examples</li>
  </ul>
</div>
<div class="panel panel-flat">
    <div class="panel-body">
    <legend class="text-semibold "><i class=" icon-users4 position-left"></i> آرشیو کارفرمایان</legend>

	<div class="datatable-header">
			<div class="row">
				<form action="<?php echo base_url('deal/archive'); ?>" method="get">

					<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group">
								<label>جستجو : </label>
								<input class="form-control" name="fullname" value="<?php echo $this->input->get('fullname');?>" type="search" onkeyup="search_cust(this)" placeholder="نام مشتری خود را جستجو کنید">

							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">از تاریخ :</label>
									<input type="text" class="form-control" name="start_date" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" value="<?php if($this->input->get('start_date')){echo $this->input->get('start_date');}else{echo $date;} ?>" placeholder="Jalali Created Date">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">تا تاریخ :</label>
									<input type="text" class="form-control" name="end_date" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" value="<?php if($this->input->get('end_date')){echo $this->input->get('end_date');}else{echo $date;} ?>" placeholder="Jalali Created Date">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>نوع معامله : </label>
								<select class="form-control" name="type" required>
									<option value="0" <?php if($this->input->get('type') == 0){echo 'selected';}?> >همه</option>
									<option value="1" <?php if($this->input->get('type') == 1){echo 'selected';}?> >خرید</option>
									<option value="2" <?php if($this->input->get('type') == 2){echo 'selected';}?> >فروش</option>
									
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>ارز معامله : </label>
								<select class="form-control" name="money_id" required>
								    <option value="0" <?php if($this->input->get('money_id') == 0){echo 'selected';}?>>همه</option>
										<?php foreach($unit as $units){ ?>
											<option  value="<?php echo $units->id;?>" <?php if($units->id == $this->input->get('money_id')){echo 'selected';}?> ><?php echo $units->name;?></option>
										<?php } ?>	
								</select>
							</div>
						</div>
						<div class="col-md-1">
							<button class="btn btn-success mt-25" type="submit" >اعمال فیلتر</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>

	<table class="table datatable-selection-single table-hover table-responsive-sm ">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>نام کارفرما</th>
				<th>تعداد آگهی ها</th>
				<th>تاریخ ثبت نام</th>
				<th>وضعیت</th>
				<th class="text-center">ابزارک</th>
			</tr>
		</thead>
		<tbody id="search_cust" tyle="display: none;">
			<tr></tr>
		</tbody>
		<tbody>
			<tr class="base_cust">
                <td>1</td>
                <td>علی شیرازی</td>
				<td>4</td>
				<td>1398/2/8</td>
				<td><a><span class="label label-success">فعال</span></a></td>
				<td class="text-center">
					<ul class="icons-list">
						<li data-toggle="tooltip" title="ویرایش " class="text-success"><a href="<?php echo base_url('employer/edit') ?>"><i class="icon-profile"></i></a>
						</li>
						<li data-toggle="tooltip" title="آگهی ها" class="text-primary"><a href="<?php echo base_url('employer/employer_jobs') ?>"><i class="icon-books"></i></a>
						</li>
					</ul>
				</td>
			</tr>
		
	
		</tbody>

	</table>


    </div>
</div>