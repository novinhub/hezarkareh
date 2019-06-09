<div class="breadcrumb-line breadcrumb-line-component mb-20">
	<ul class="breadcrumb">
		<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a>
		</li>
		<li><a href="alpaca_basic.html">Alpaca</a>
		</li>
		<li class="active">Basic examples</li>
	</ul>
</div>
<div class="panel panel-flat">
	<div class="panel-body">
		<legend class="text-semibold "><i class=" icon-users4 position-left"></i> آگهی های کارفرما</legend>

		<div class="datatable-header">
			<div class="row">
				<form action="<?php echo base_url('deal/archive'); ?>" method="get">

					<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group">
								<label>جستجو : </label>
								<input class="form-control" type="search" placeholder="نام آگهی خود را جستجو کنید">

							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">از تاریخ :</label>
									<input type="text" class="form-control" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" placeholder="Jalali Created Date">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="j_created_date">تا تاریخ :</label>
									<input type="text" class="form-control" name="end_date" id="j_created_date" readonly data-mddatetimepicker="true" data-enabletimepicker="true" data-placement="bottom" placeholder="Jalali Created Date">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>مکان : </label>
								<select class="form-control" name="type" required>
									<option>همه</option>
									<option>خرید</option>
									<option>فروش</option>

								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>دسته بندی آگهی : </label>
								<select class="form-control" name="type" required>
									<option>همه</option>
									<option>خرید</option>
									<option>فروش</option>

								</select>
							</div>
						</div>
						<div class="col-md-1">
							<button class="btn btn-success mt-25" type="submit">اعمال فیلتر</button>
						</div>

					</div>
				</form>
			</div>
		</div>

		<table class="table datatable-selection-single table-hover table-responsive-sm ">
			<thead>
				<tr>
					<th>ردیف</th>
					<th>عنوان شغل</th>
					<th>مکان</th>
					<th>دسته بندی شغل</th>
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
					<td> <a href="<?php echo base_url('employer/detail_jobs') ?>">برنامه نویس وب</a>
					</td>
					<td>شیراز</td>
					<td>برنامه نویس</td>
					<td><a><span class="label label-success">فعال</span></a>
					</td>
					<td class="text-center">
						<ul class="icons-list">
							<li data-toggle="tooltip" title="ثبت آگهی " class="text-success"><a href=""><i class="icon-checkmark4"></i></a>
							</li>
							<li data-toggle="tooltip" title="ویرایش آگهی" class="text-primary"><a href="<?php echo base_url('employer/edit_jobs') ?>"><i class="icon-quill4"></i></a>
							</li>
						</ul>
					</td>
				</tr>


			</tbody>

		</table>


	</div>
</div>