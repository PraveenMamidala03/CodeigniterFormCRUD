<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?=base_url('assets/')?>css/bootstrap.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<title>Registration Form </title>
<style>
      .error{
          color: red;
      }
      </style>
</head>

<body class="bg-light" >  
  <div class="container" style="background-color: #f4e5d8; border-radius: 25px ;">
    <div class="py-5 text-center">
    <h2>Registration Form </h2>
  </div>
  <div class="row">
    <div class="col-md-12">
     <form id="myform" action="<?=base_url('users/register_action')?>" method="POST" enctype="multipart/form-data">
     <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Your Name" >
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email"  class="form-control" name="email" id="email" placeholder="Enter Your emial" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>  
     </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Mobile</label>
       <input type="number" name="phone" class="form-control" id="phone" required>
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Gender</label>
           <select class="custom-select d-block w-100" name="gender" id="gender" required>
            <option value="">Choose...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">other</option>
          </select>
       </div>  
     </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Data Of Birth</label>
       <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required>
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Upload your Image</label>
            <input name="image" class="form-control" placeholder="image" accept="image/*" type="file" required>
       </div>  
      </div>
       <h4 class="mb-3">Academic Information</h4>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Level of qualification</label>
         <select class="form-control" id="level_of_qualification" name="level_of_qualification" required="">
          <option value="">select</option>
          <?php if (!empty($level_of_qualification)) {
              foreach ($level_of_qualification as $value) { ?>
                  <option value="<?=$value->id?>"><?=$value->name?></option>
         <?php      }
          }   ?>
        </select>
        </div>
       <div class="col-md-6 mb-3">
         <label for="exampleInputEmail1">Qualification</label>
         <select class="form-control" id="qualification" name="qualification" required="">

    
        </select>
       </div>  
      </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Field of study</label>
          <select class="form-control" name="study" id="study">
          <option value="">select</option>
          <option value="Accounting">Accounting</option>
          <option value="Agriculture">Agriculture</option>
          <option value="Architecture">Architecture</option>
          <option value="Built environment">Built environment</option>
          <option value="Business and management">Business and management</option>
          <option value="Communications">Communications</option>
          <option value="Computing and information technology">Computing and information technology</option>
          <option value="Creative arts">Creative arts</option>
          <option value="Dentistry">Dentistry</option>
          <option value="Economics">Economics</option>
          <option value="Education and training">Education and training</option>
          <option value="Engineering and technology">Engineering and technology</option>
          <option value="Environmental studies">Environmental studies</option>
          <option value="Health services and support">Health services and support</option>
          <option value="Humanities and social sciences">Humanities and social sciences</option>
          <option value="Languages">Languages</option>
          <option value="Law">Law</option>
          <option value="Mathematics">Mathematics</option>
          <option value="Medicine">Medicine</option>
          <option value="Nursing">Nursing</option>
          <option value="Para-legal studies">Para-legal studies</option>
          <option value="Pharmacy">Pharmacy</option>
          <option value="Psychology">Psychology</option>
          <option value="Rehabilitation">Rehabilitation</option>
          <option value="Sciences">Sciences</option>
          <option value="Social work">Social work</option>
          <option value="Sport and leisure">Sport and leisure</option>
          <option value="Surveying">Surveying</option>
          <option value="Tourism and hospitality">Tourism and hospitality</option>
          <option value="Veterinary science">Veterinary science</option>
          </select>
        </div>
       <div class="col-md-6 mb-3">
         <label for="exampleInputEmail1">Course you are applying for</label>
          <input type="text" class="form-control" id="course" name="course" placeholder="" required>
       </div>  
      </div>
      <div class="row">
      <div class="col-md-12 ">
       <label for="exampleInputEmail1">More about yourself</label>
          <textarea name="comment" class="form-control" placeholder="Describe yourself here..."></textarea>
        </div> 
      </div>
  
  <hr class="mb-4">
    <button type="submit" class="btn btn-primary btn-lg btn-block"><i style="display:none;" class="fas fa-sync-alt fa-spin"></i>Submit</button>
    </form>
      </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020-2021 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
  <script >
  			$(document).ready(function () {
    
			    $('#myform').validate({ // initialize the plugin
                    
			        rules: {
			            name: {
                            required:true,
                            minlength:4,
			            },
                        email: {
					        required: true,
					        email: true
					      },
                        phone: {
                            required:true,
                            minlength:10,
                            maxlength:10,
                            digits:true
                        },
                        gender:{
                            required:true,
                        },
                        image : {
                            required:true,
                        },
                        dateofbirth:{
                            required:true,
                        },
                        level_of_qualification: {
                            required:true,
                        },
                        qualification:{
                            required :true,
                        },
                        study: {
                            required:true,
                        },
                        course:{
                            required :true,
                        }
                    },
                    messages: {
                            name:"Full name is required",
                            email: {
                                required: 	"Email is required",
                                email: 		"Please enter a valid e-mail",
                            },
                            phone:{
                                required: 	"Phone number is requied",
                                minlength: 	"Please enter 10 digit mobile number",
                                maxlength: 	"Please enter 10 digit mobile number",
                                digits: 	"Only numbers are allowed in this field"
                            },
                            gender:{
                                required: 	"Please choose Gender",
                            },
                            image:{
                                required: 	"Please Upload Your Image",
                            },
                            dateofbirth:{
                                required: 	"Please Select Date Of Birth",
                            },
                            level_of_qualification:{
                                required: 	"Please select level of qualification",
                            },
                            qualification:{
                                required: 	"Please select qualification",
                            },
                            study:{
                                required: 	"Please enter Study details",
                            },
                            course:{
                                required: 	"Please enter Course details",
                            },
			        },
                   
			        	submitHandler:function(form){
									var fdata = $("#myform");
                                    var fdata = new FormData($("#myform")[0]); 
									var action = $('#myform').attr('action');
									$.ajax({
										url:action,
										data:fdata,
                                        beforeSend: function(){ 
                                            $("#myform").find(".fa-sync-alt").show();
                                        },
                                        type:'post', 
                                        cache: false, 
                                        contentType: false, 
                                        processData: false, 
										success:function(res){	
                                            var j=JSON.parse(res);					
											if(j.status==1){
												alert('form submitted successfully');
												window.location=j.url;
											}else{
												alert('please try again');
											}
											
										}
									});
									
									return false;
								}
			    });
                $("#level_of_qualification").change(function(){
						var level_of_qualification =  parseInt($(this).val()); 
						var level_of_qualification = $("#level_of_qualification").val(); 
						if(level_of_qualification){
							$('#equipments-div').show();	
							$.ajax({
							'url':"<?=base_url('users/getQualification')?>",
							"data":{level_of_qualification:level_of_qualification},
							"type":"post",
							"success":function(res){
								var j = JSON.parse(res);
								if(j.equipments!=''){
									qualification = j.qualification;	
                                    console.log(qualification);		
                                    $('#qualification').html('');				
									$('#qualification').append(qualification);
								}
							}
						});	
						}
						
					});
			});
  </script>
</body>
</html>
