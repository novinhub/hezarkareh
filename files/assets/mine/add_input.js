        // job
        $(document).ready(function(){
            var x = 100;
            var maxField = 105;
            var addButton = $('.add_button2');
            var wrapper = $('.field_wrapper2');
                
            $(addButton).click(function(){
                if(x < maxField){ 
                    x++;
                    $(wrapper).append('<div class="row"><label class="col-md-3 col-form-label">پیشینه شغلی :</label><div class="col-md-9"><div class="form-group"><input type="text" class="form-control" name="company[]" placeholder="نام شرکت"></div><div class="form-group"><input type="text" class="form-control" name="position[]" placeholder="سطح ارشدیت"></div><div class="form-group"><div class="row"><input type="text" name="job_start[]" readonly class="form-control bg-white usage'+x+' col-md-4" placeholder="تاریخ شروع"><input type="text" name="job_end[]" readonly class="form-control bg-white usage'+x+' col-md-4" placeholder="تاریخ پایان"><div class="row col-md-4"><label class="col-md-8 mt-4">تا همین لحظه</label><input class="col-md-1" onclick="check_study(this)" type="checkbox" style="margin-top:20px"><input type="hidden" name="job_still[]" value="0"></div></div></div><div class="form-group"><textarea name="job_explain[]" class="form-control" placeholder="توضیحات"></textarea></div><button type="button" class="add-new-field remove_button2 bg-btn-danger">حذف شغل</button></div></div>');
                    $(".usage"+x).persianDatepicker();
                }
            });
            $(wrapper).on('click', '.remove_button2', function(e){
                e.preventDefault();
               $(this).parent('div').parent('div').remove();
                x--; 
            });
        });
        // job
        //Skill
        $(document).ready(function(){
            var maxField = 5;
            var addButton = $('.add_button3');
            var wrapper = $('.field_wrapper3');
            var fieldHTML = '<div class="row"><label class="col-md-3 col-form-label">مهارت ها</label><div class="col-md-9"><div class="form-group"><input type="text" name="skill[]" class="form-control" placeholder="دانش و مهارت"></div><div class="form-group"><select class="form-control" name="percent[]"><option value="0" selected readonly style="display:none;">میزان تسلط : </option><option value="20">خیلی کم </option><option value="40">کم</option><option value="60">متوسط</option><option value="80">خوب</option><option value="100">عالی</option></select><i class="fa fa-caret-down"></i></div><button type="button" class="add-new-field remove_button3 bg-btn-danger"> حذف مهارت</button></div></div>';
                
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
        //Skill
        function check_study(input){

            if(input.checked == true){
                input.nextElementSibling.value = '1';
            }else{
                input.nextElementSibling.value = '0';
            }
        }