<div class="breadcrumb-line breadcrumb-line-component mb-20">
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
    <li><a href="alpaca_basic.html">Alpaca</a></li>
    <li class="active">Basic examples</li>
  </ul>
</div>
<div class="panel panel-flat">
    <div class="panel-body">
	<div class="row">
	<legend class="text-semibold col-md-9"><i class=" icon-users4 position-left"></i> آرشیو کارجویان</legend>
        <div class="form-group col-md-3 mt-20">
			<div calsl="row">
			<label class="col-md-2 mt-label">جستجو:</label>
			<div class="col-md-10">
			<input class="form-control" type="text">
			</div>
			</div>
        </div>
    </div>



	<table class="table datatable-selection-single table-hover table-responsive-lg ">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>نام کارجو</th>
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
				<td>1398/2/8</td>
				<td><a><span class="label label-success">فعال</span></a></td>
				<td class="text-center">
					<ul class="icons-list">
						<li data-toggle="tooltip" title="رزومه " class="text-success"><a href="<?php echo base_url('applicant/resume') ?>"><i class="icon-profile"></i></a>
						</li>
					</ul>
				</td>
			</tr>
		
	
		</tbody>

	</table>


    </div>
</div>