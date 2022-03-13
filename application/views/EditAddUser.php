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
 
  <nav class="navbar navbar-dark bg-primary">
     <a href="<?=base_url('admin/users_list')?>"> <button class="navbar-toggler">
        User List
      </button> </a>
    </nav>
  </div>
  <div class="pos-f-t">
  <div class="container" style="background-color: #f4e5d8; border-radius: 25px ;">
    <div class="py-5 text-center">
    <h2>Registration Form </h2>
  </div>
  <div class="row">
    <div class="col-md-12">
     <form id="myform" action="<?=base_url('admin/user_edit') ?>" method="POST" enctype="multipart/form-data">
     <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" class="form-control" id="name"  name="name" value="<?=$user->name?>" placeholder="Enter Your Name" >
       <input type="hidden" class="form-control" id="id"  name="id" value="<?=$user->id?>" >
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email"  class="form-control" name="email" id="email" value="<?=$user->email?>" placeholder="Enter Your emial" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>  
     </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Mobile</label>
       <input type="number" name="phone" class="form-control" id="phone" value="<?=$user->mobile?>" required>
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Gender</label>
           <select class="custom-select d-block w-100" name="gender" id="gender" required>
            <option value="">Choose...</option>
            <option value="male" <?=("male"==$user->gender)?'selected':''?>>Male</option>
            <option value="female" <?=("female"==$user->gender)?'selected':''?>>Female</option>
            <option value="other" <?=("other"==$user->gender)?'selected':''?>>other</option>
          </select>
       </div>  
     </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Data Of Birth</label>
       <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="<?=$user->date_of_birth?>" required>
         </div>
       <div class="col-md-6 mb-3">
        <label for="exampleInputEmail1">Upload your Image</label>
        <a href="<?php echo base_url() ?>assets/img/<?php echo $user->image ?>" alt="" target="new"><i class="fa fa-file" aria-hidden="true"></i></a>
            <input name="image" class="form-control" placeholder="image" accept="image/*" type="file" >
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
                  <option value="<?=$value->id?>" <?=($value->id==$user->level_of_qualification)?'selected':''?>><?=$value->name?></option>
         <?php      }
          }   ?>
        </select>
        </div>
       <div class="col-md-6 mb-3">
         <label for="exampleInputEmail1">Qualification</label>
         <select class="form-control" id="qualification" name="qualification" required="">
         <?php if (!empty($qualification)) {
              foreach ($qualification as $value) { ?>
                  <option value="<?=$value->id?>" <?=($value->id==$user->qualification)?'selected':''?>><?=$value->name?></option>
         <?php      }
          }   ?>
        </select>
       </div>  
      </div>
      <div class="row">
      <div class="col-md-6 mb-3">
       <label for="exampleInputEmail1">Field of study</label>
          <select class="form-control" name="study" id="study">
          <option value="">select</option>
          <option value="Accounting" <?=("Accounting"==$user->study)?'selected':''?>>Accounting</option>
          <option value="Agriculture" <?=("Agriculture"==$user->study)?'selected':''?>>Agriculture</option>
          <option value="Architecture" <?=("Architecture"==$user->study)?'selected':''?>>Architecture</option>
          <option value="Built environment" <?=("Built environment"==$user->study)?'selected':''?>>Built environment</option>
          <option value="Business and management" <?=("Business and management"==$user->study)?'selected':''?>>Business and management</option>
          <option value="Communications"<?=("Communications"==$user->study)?'selected':''?>>Communications</option>
          <option value="Computing and information technology"<?=("Computing and information technology"==$user->study)?'selected':''?>>Computing and information technology</option>
          <option value="Creative arts"<?=("Creative arts"==$user->study)?'selected':''?>>Creative arts</option>
          <option value="Dentistry"<?=("Dentistry"==$user->study)?'selected':''?>>Dentistry</option>
          <option value="Economics"<?=("Economics"==$user->study)?'selected':''?>>Economics</option>
          <option value="Education and training"<?=("Education and training"==$user->study)?'selected':''?>>Education and training</option>
          <option value="Engineering and technology"<?=("Engineering and technology"==$user->study)?'selected':''?>>Engineering and technology</option>
          <option value="Environmental studies"<?=("Environmental studies"==$user->study)?'selected':''?>>Environmental studies</option>
          <option value="Health services and support"<?=("Health services and support"==$user->study)?'selected':''?>>Health services and support</option>
          <option value="Humanities and social sciences"<?=("Humanities and social sciences"==$user->study)?'selected':''?>>Humanities and social sciences</option>
          <option value="Languages"<?=("Languages"==$user->study)?'selected':''?>>Languages</option>
          <option value="Law"<?=("Law"==$user->study)?'selected':''?>>Law</option>
          <option value="Mathematics"<?=("Mathematics"==$user->study)?'selected':''?>>Mathematics</option>
          <option value="Medicine"<?=("Medicine"==$user->study)?'selected':''?>>Medicine</option>
          <option value="Nursing"<?=("Nursing"==$user->study)?'selected':''?>>Nursing</option>
          <option value="Para-legal studies"<?=("Para-legal studies"==$user->study)?'selected':''?>>Para-legal studies</option>
          <option value="Pharmacy"<?=("Pharmacy"==$user->study)?'selected':''?>>Pharmacy</option>
          <option value="Psychology"<?=("Psychology"==$user->study)?'selected':''?>>Psychology</option>
          <option value="Rehabilitation"<?=("Rehabilitation"==$user->study)?'selected':''?>>Rehabilitation</option>
          <option value="Sciences"<?=("Sciences"==$user->study)?'selected':''?>>Sciences</option>
          <option value="Social work"<?=("Social work"==$user->study)?'selected':''?>>Social work</option>
          <option value="Sport and leisure"<?=("Sport and leisure"==$user->study)?'selected':''?>>Sport and leisure</option>
          <option value="Surveying"<?=("Surveying"==$user->study)?'selected':''?>>Surveying</option>
          <option value="Tourism and hospitality"<?=("Tourism and hospitality"==$user->study)?'selected':''?>>Tourism and hospitality</option>
          <option value="Veterinary science"<?=("Veterinary science"==$user->study)?'selected':''?>>Veterinary science</option>
          </select>
        </div>
       <div class="col-md-6 mb-3">
         <label for="exampleInputEmail1">Course you are applying for</label>
          <input type="text" class="form-control" id="course" name="course" value="<?=$user->course?>" placeholder="" required>
       </div>  
      </div>
      <div class="row">
      <div class="col-md-12 ">
       <label for="exampleInputEmail1">More about yourself</label>
          <textarea name="comment" class="form-control"  placeholder="Describe yourself here..."><?=$user->comment?></textarea>
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
