<?php 
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>SB Admin 2 - Login</title>

<!-- Custom fonts for this template--> 
<link href="<?php echo base_url();?>/public/admin_vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url();?>/public/admin_css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<!-- Nested Row within Card Body -->
<div class="row">
<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
<div class="col-lg-6">
<div class="p-5">
<div class="text-center">
<h1 class="h4 text-gray-900 mb-4">Welcome Back! </h1>
</div>

<form class="user" action="<?php echo base_url();?>/SigninController/phone_login" method="POST">

<div class="form-group">
<input type="text" class="form-control form-control-user"
id="phone" name="phone" aria-describedby="emailHelp"
placeholder="Enter Mobile Number">
</div>
<div class="form-group">
<input type="otp" class="form-control form-control-user" id="otp" name="otp" placeholder="Password">
<br>
<input type="buttion" id="get_otp" class="btn btn-primary btn-user btn-block" value="GET OTP">
</div>
<div class="form-group">
<div class="custom-control custom-checkbox small">
<input type="checkbox" class="custom-control-input" id="customCheck">
<label class="custom-control-label" for="customCheck">Remember
Me</label>
</div>
</div>
<input type="submit" class="btn btn-primary btn-user btn-block" value="Login">

<hr>
<a href="index.html" class="btn btn-google btn-user btn-block">
<i class="fab fa-google fa-fw"></i> Login with Google
</a>
<a href="index.html" class="btn btn-facebook btn-user btn-block">
<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
</a>
</form>
<hr>
<div class="text-center">
<a class="small" href="<?php echo base_url();?>/admin/"> Login With Email</a>
</div>

<div class="text-center">
<a class="small" href="<?php echo base_url();?>/admin/forgot_password">Forgot Password?</a>
</div>
<div class="text-center">
<a class="small" href="<?php echo base_url();?>/admin/register">Create an Account!</a>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

</div>



<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>/public/admin_vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/public/admin_vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>/public/admin_vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>/public/admin_js/sb-admin-2.min.js"></script>

<script>
$(document).ready(function(){
$("#otp").hide();
$("#get_otp").click(function(){
$("#get_otp").hide();
$("#otp").show();

var phone =$("#phone").val();

function generateOTP(limit) {

var digits = '0123456789';
let OTP = '';
for (let i = 0; i < limit; i++ ) {
OTP += digits[Math.floor(Math.random() * 10)];
}
return OTP;
}
var opt = generateOTP(6);

$.ajax({
method: "GET",
url: "<?=base_url();?>/admin/update_otp/"+phone+"/"+opt,
success: function(responseText)
{

if( responseText == 'valid'){

//alert("Registed Account");

var settings = {
"async": true,
"crossDomain": true,
"url": "https://www.fast2sms.com/dev/bulkV2?authorization=jYYQsYDfPHOjSRDEBnjWt5GMR6RQ7ScQLxIHmmK314O3fZRxGB4vRmeYtuhZ&message="+opt+"&language=english&route=v3&numbers="+phone,
"method": "GET"
}

$.ajax(settings).done(function (response) { 
console.log(response); 
});

}

else if(responseText == 'invalid'){

alert(" Not Registed Account");
location.reload();

}
}
});

});

});
</script>

</body>

</html>