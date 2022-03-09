<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Interview</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style>
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #ec6142;
    color: #fff;
}
</style>
</head>
<body>

<div class="container">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Create user account</p>
	<p>
		
	</p>
	<p class="divider-text">
       
    </p>
	<form method="post" action="<?php echo base_url() ?>users/register_action " enctype='multipart/form-data' >
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 80px;">
		    <option selected="">+91</option>
		</select>
    	<input name="phone_number" class="form-control" placeholder="Phone number" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-image"></i> </span>
		</div>
		<input name="image" class="form-control" placeholder="image" type="file" required>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"><i class="fas fa-birthday-cake"></i> </span>
		</div>
        <input class="form-control" name="birth_date" placeholder="Date of Birth" type="date" required>
    </div>
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"><i class="fa fa-venus-mars"></i> </span>
		</div>
       
        <select class="form-control" name="gender" required>
            <option value="">--Please choose gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        
    </div>                                      
    <div class="form-group">
           <button type="reset" class="btn btn-danger btn-block"> Reset  </button>
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
     
    </div> <!-- form-group// -->      
    <!-- <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                  -->
</form>
</article>
</div> <!-- card.// -->

</div> 
</body>
</html>

