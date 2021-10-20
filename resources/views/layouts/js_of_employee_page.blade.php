<script>

    $(".time").mask("00:00", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: 12
          }
       );



    </script>

    {{------------

    <div class="col-md-2 mb-3">
        <div class="btn-group-sm mb-1">
            <input type="hidden" class="border-0" name="phones[]" value="(012) 879-17557"  />
            <button type="button" class="btn btn-outline-info">(012) 879-17557</button>
            <button type="button" onclick="this.parentNode.remove()" class="btn btn-outline-danger">X</button>
        </div>
    </div>
        -----------}}

    <script>

        $('input[value=F]').on('change',function(){
            $('select[name=military_services_id]').attr('disabled',true)
        })

        $('input[value=M]').on('change',function(){
            $('select[name=military_services_id]').attr('disabled',false)
        })

    </script>





<script>

$('#codes').change(()=>{
    //alert($('#codes').val());


    let code = $('#codes').val();
    let endcode = '('+ code +')';

    $('input[name=phone]').mask(endcode+' 000 000 000 000');
    $('input[name=phone]').val(endcode);
    $('input[name=phone]').attr('disabled',false)



});


</script>





    <script>

    function GetCities(country_id){
            document.getElementById('city_id').textContent = '';



            $.get("{{url('cities')}}" + "/" + country_id,function (one,two){
                //console.log(JSON.parse(one.trim()));
                var cities = JSON.parse(one.trim());
                var select = document.getElementById('city_id');



                for(var i = 0 ; i< cities.length ; i++){
                    var option   =document.createElement('option');
                    option.value =cities[i]['id'];
                    option.text  =cities[i]['name_'+"{{app()->getLocale()}}"];
                    select.appendChild(option);
                }
            });
        }

        GetCities($("select[name='country_id']").val())

        function GetBranch(company_id){
            document.getElementById('branch_id').textContent = '';



            $.get("{{url('branchs')}}" + "/" + company_id,function (one,two){
                //console.log(JSON.parse(one.trim()));
                var branchs = JSON.parse(one.trim());
                var select = document.getElementById('branch_id');



                for(var i = 0 ; i< branchs.length ; i++){
                    var option   =document.createElement('option');
                    option.value =branchs[i]['id'];
                    option.text  =branchs[i]['name_branch_'+"{{app()->getLocale()}}"];
                    select.appendChild(option);
                }
            });
        }


        GetBranch($("select[name='company_id']").val())



    </script>



    <script>

    //levelJopId(1)



        function levelJopId(department_id,LevelId){




            $.get("{{url('levelJopId')}}" + "/" + department_id + "/" + LevelId ,function (one,two){
                //console.log(JSON.parse(one.trim())[0]);

                var Responsible_From_employee = JSON.parse(one.trim())[0];
                var Responsible_for_employee = JSON.parse(one.trim())[1];


                var select_From_employee = document.getElementById('select_From_employee');
                var select_for_employee = document.getElementById('select_for_employee');


               select_From_employee.textContent = '';
               for(var i = 0 ; i< Responsible_From_employee.length ; i++){
                    var option   =document.createElement('option');
                    option.value =Responsible_From_employee[i]['id'];
                    option.text  =Responsible_From_employee[i]['full_name_'+"{{app()->getLocale()}}"];
                    select_From_employee.appendChild(option);
                }







            });
        }



    levelJopId($("select[name='comapny_departments_id']").val(),$("select[name='jop_level_id']").val())



    $('#jop_level_id').change(()=>{
        levelJopId($("select[name='comapny_departments_id']").val(),$("select[name='jop_level_id']").val())
    })

    </script>



    {{-----------
    <div class="invalid-feedback">
    Please choose a username.
    </div>

        --------}}

    <script>

    function makeError(nameInput,errorInput,oldValue){
        let div = document.createElement('div');
        div.classList = 'invalid-feedback'
        div.textContent = errorInput

         $('[name='+nameInput+']').addClass("removeError is-invalid")
         $('[name='+nameInput+']').val(oldValue)

         $('[name='+nameInput+']').after(div)

    }
    </script>
