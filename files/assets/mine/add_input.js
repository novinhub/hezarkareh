		// education
		$(document).ready(function(){
            var maxField = 3;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div class="row "><label class="col-md-3 col-form-label">تحصیلات:</label><div class="col-md-9"><div class="form-group"><input type="text" class="form-control" placeholder="رشته تحصیلی"></div><div class="form-group"><select class="form-control"><option selected disabled style="display:none;">مقطع:</option><option>دیپلم</option><option>کارشناسی</option><option>کارشناسی ارشد</option><option>دکترا</option></select></div><div class="form-group"><input type="text" class="form-control" placeholder="دانشگاه"></div><div class="form-group"><div class="row"><input type="text" class="form-control usage col-md-4" placeholder="تاریخ شروع"><input type="text" class="form-control usage col-md-4" placeholder="تاریخ پایان"><div class="row col-md-4"><label class="col-md-8 mt-4">تا همین لحظه</label><input class="col-md-1 " type="checkbox" style="margin-top:20px"></div></div></div><div class="form-group"><textarea class="form-control" placeholder="توضیحات"></textarea></div><button type="button" class="add-new-field remove_button bg-btn-custom">حذف تحصیلات</button></div></div>';
                
            var x = 1;
            
            $(addButton).click(function(){
                if(x < maxField){ 
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--; 
            });
        });	
        // education
        // job
        $(document).ready(function(){
            var maxField = 3;
            var addButton = $('.add_button2');
            var wrapper = $('.field_wrapper2');
            var fieldHTML = '<div class="row"><label class="col-md-3 col-form-label">پیشینه شغلی :</label><div class="col-md-9"><div class="form-group"><input type="text" class="form-control" placeholder="نام شرکت"></div><div class="form-group"><input type="text" class="form-control" placeholder="سطح ارشدیت"></div><div class="form-group"><input type="text" class="form-control" placeholder="گروه شغلی"></div><div class="form-group"><div class="row"><input type="text" class="form-control usage col-md-4" placeholder="تاریخ شروع"><input type="text" class="form-control usage col-md-4" placeholder="تاریخ پایان"><div class="row col-md-4"><label class="col-md-8 mt-4">تا همین لحظه</label><input class="col-md-1 " type="checkbox" style="margin-top:20px"></div></div></div><div class="form-group"><textarea class="form-control" placeholder="توضیحات"></textarea></div><button type="button" class="add-new-field remove_button2 bg-btn-custom">حذف شغل</button></div></div>';
                
            var x = 1;
            
            $(addButton).click(function(){
                if(x < maxField){ 
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });
            $(wrapper).on('click', '.remove_button2', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--; 
            });
        });
        // job
        //edit
        $(document).ready(function(){
            var maxField = 3;
            var addButton = $('.add_button3');
            var wrapper = $('.field_wrapper3');
            var fieldHTML = '<div class="row"><label class="col-md-3 col-form-label">مهارت ها</label><div class="col-md-9"><div class="form-group"><input type="text" class="form-control" placeholder="دانش و مهارت"></div><div class="form-group"><select class="form-control"><option>میزان تسلط : </option><option>خیلی کم </option><option>کم</option><option>متوسط</option><option>خوب</option><option>عالی</option></select><i class="fa fa-caret-down"></i></div><div class="form-group"><input type="number" class="form-control" placeholder="توضیحات"></div><button type="button" class="add-new-field remove_button3 bg-btn-custom">اضافه کردن مهارت</button></div></div>';
                
            var x = 1;
            
            $(addButton).click(function(){
                if(x < maxField){ 
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });
            $(wrapper).on('click', '.remove_button3', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--; 
            });
        });
        //edit