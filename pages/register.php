<?php

 $title = "Register"; ?>
<?php 

require('includes/head.php') ;
$deposits_table = "Register";
?>
<?php
// include('includes/connect.php');


/*                                                                                                                                                    include('../includes/check-login.php'); */

if(isset($_GET['ref'])){
  $ffid = $_GET['ref'];
  $refff = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$ffid'");
  
  if(mysqli_num_rows($refff) > 0){
    $reff = mysqli_fetch_array($refff);
  $_SESSION['ref'] = $reff['username'];
  
    }
}

?>

<?php /* require('includes/header.php'); */

echo '<div class="container">
    	<div class="row">
    	<div class="col-lg-6 col-lg-offset-3">';
if(isset($_POST['signup'])){
  $raw_phone =  circle::fp_clear($_POST['phone']);
  $raw_phone = ltrim($raw_phone, '0');

$uphone	= circle::fp_clear($_POST['code']).$raw_phone;
$fname = circle::fp_clear($_POST['firstNames']);
$lname = circle::fp_clear($_POST['lastNames']);
$uname = circle::fp_clear($_POST['userNames']);
$uemail = circle::fp_clear($_POST['email']);
$upass = circle::fp_hash($_POST['password']);
$rgd = date('Y/m/d');
$refname = circle::fp_clear($_POST['ref']);
if($refname !=""){
$reffn = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$refname'");
/*
$utoken = Ben::fp_generate_token();
$authoo = Ben::fp_generate_auth();
$uph = (time() + 100);*/

if(mysqli_num_rows($reffn) > 0){
  $refn = mysqli_fetch_array($reffn);
  $refname = $refn['username'];
   
}
else {
  $refname = 'none';
}
}

if(isset($_SESSION['ref'])){
	$refby = $_SESSION['ref'];
}
else if ($refname !=""){
	$refby = $refname;
}
else {
  $refby = 'ikelvin';
}
$ckemail = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$uemail'");
// $ckemail->bindParam(':email',$uemail);
// if($ckemail->execute()){
if(mysqli_num_rows($ckemail)> 0){
 $error .= '<li> Email Already Exists!   </li>';
}	
// }
$ckuname = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$uname'");
// $ckuname->bindParam(':uname',$uname);
// if($ckuname->execute()){
if(mysqli_num_rows($ckuname)> 0){
 $error .= '<li> UserName Already Exists!   </li>';
}	
// }
if(empty($fname) || empty($lname) || empty($uname) || empty($uphone) || empty($uemail)){
	$error .='<li>All Fields are Required!</li>';
}
if(mb_strlen($fname) > 15){
	$error .='<li>First Name Cannot be more than 15 Characters!</li>';
}
if(mb_strlen($uname) > 15){
	$error .='<li>UserName Cannot be more than 15 Characters!</li>';
}
if($_POST['password'] != $_POST['confirmPassword']){
 $error .='<li>Password do not Match!</li>';
}
if(mb_strlen($_POST['phone']) > 10 || mb_strlen($_POST['phone']) < 9){
	$error .='<li>Phone number Min. 9 Max. 10 Characters eg: 542165900 or 235678950 or 7067857458</li>';
}
if(empty($error)){
$reg = mysqli_query($con,"INSERT INTO `user` (email,username,firstname,surname,password,mobile,reg_date,referer) VALUES('$uemail','$uname','$fname','$lname','$upass','$uphone','$rgd','$refby')") or die(mysqli_error($con));
// // $reg->bindParam(':token',$utoken);
// // $reg->bindParam(':autho',$authoo);
// $reg->bindParam(':phone',$uphone);
// $reg->bindParam(':email',$uemail);
// $reg->bindParam(':fname',$fname);
// $reg->bindParam(':lname',$lname);
// $reg->bindParam(':pass',$upass);
// $reg->bindParam(':uname',$uname);
// $reg->bindParam(':reg',$rgd);
// // $reg->bindParam(':ph',$uph);
// $reg->bindParam(':ref',$refby);

if($reg){

  $createwallet = mysqli_query($con,"insert INTO `wallet` (wallet,cyclepoints) VALUES ('$uname','$ref_points')");


 //  // if($reg->execute()){
	// //Send Confirm Mail
	// $to = $uemail;
	// $from = "verify@".$set['slug'];
	// $subject = "Verify your Account on {$set['name']} a Place to Fund your Wallet!";
	// $message .= "Hello ".$fname." ".$lname.",\r\n";
	// $message .= "Welcome To  The Great Family where to Fund your wallet\r\n
 //   Your Registration Details Below:\r\n
 //   Username: ".$uname."\r\n
 //   Email: ".$uemail."\r\n
 //   PassWord: ".$_POST['password']."   \r\n
 //   /* 
 //   To Verify your Account Click Below Link or Copy To your Browser:\r\n
 //   /member/verify_email.php?token=".$utoken."&email=".$uemail."&username=".$uname."&utm_source=Mail&developer=ikelvinStudios_Inc\r\n
 //    */ .
 //   Contact Details: \r\n
 //   Mobile: ".$set['phone']."\r\n
 //   Email: ".$set['email']."\r\n
 //   Powered By:  Inc \r\n
 //   ".CopyR. ' '.date('Y')."  \r\n
 //   ".RitR. " ".circle::fp_name()." Concept\r\n";
 //   $header = "From: <".$from.">\r\n" .
 //   "Reply-To: " . $set['email'] . "\r\n";
  if($createwallet){
    $message = "Welcome to Ourcomunity, the one place invest and earn more. One thing you need to always remember is your username ( ".$uname." ). It`s your Identity, you need it to login and is your key to recovering your password.";

           $try_sms = reply::rp_sendsms($sms_source,$uphone,$message,$sms_type);
           if ($try_sms) {
            echo " ";
            } 
  echo '<div role="alert" class="alert alert-success fade in">
                              <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
                              <h4>Successfully Account Created!</h4>
                              <p>Account Created Successfully!</p>
                <!--p>Try check on your "<font color="red"><b>Spam</b></font>" folder on your Email if you can`t find the Email sent to you.</p>
                              <p-->
                                <a href="'.$site_base_url.'/pages/login.php?#create" class="btn btn-success">Continue to Login</a>
                              </p>
                            </div>';  
                            
   }
 //   if(circle::fp_sendmail($to,$subject,$message,$header)){
	// echo '<div role="alert" class="alert alert-success fade in">
 //                              <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span>
	// 						  <span class="sr-only">Close</span></button>
 //                              <h4>Successfully Account Created!</h4>
 //                              <p>Account Created and Verification Email have Been Sent to Your Email Address!</p>
	// 						  <p>Try check on your "<font color="red"><b>Spam</b></font>" folder on your Email if you can`t find the Email sent to you.</p>
 //                              <p>
 //                                <a href="/login.php?#create" class="btn btn-success">Continue to Login</a>
 //                              </p>
 //                            </div>';   
 //   }
   else{
	echo '<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
	<span class="sr-only">Close</span></button>
                              <strong>Well done!</strong> Account Created But Cannot create wallet </div>';   
   }
  //    else{
  // echo '<div class="alert alert-success alert-dismi      ssible" role="alert">
  // <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
  // <span class="sr-only">Close</span></button>
  //                             <strong>Well done!</strong> Account Created But Cannot Send Mail to Your E-mail </div>';   
  //  }
}
else {
	echo '<div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Oh snap!</strong> Fail to Create Account Try Latter! </div>';
}
}
}

?>
<?php
if(!empty($error)){
echo '<div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
							  <span class="sr-only">Close</span></button>
                              <strong>Oops Error Occurs!</strong><ol>'.$error.'</ol></div>';
}
?>
</div></div></div>
<div class="container">
    	<div class="row">
    	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">   
						<div class="panel-body">
        	<h2 class="text-center"> Registration</h2>
            <p class="text-center">Fill all Feild Before clicking SignUp</p>
            <hr class="clean">
        	<form  method="post" class="validator-form" action="#create">
                            
                            <div class="form-group">
                            	<div class="row">
                                	<div class="col-lg-6">
                                    	<label class="control-label ">First name</label>
                         <input type="text" class="form-control" name="firstNames" placeholder="First Name" value="" required/>
						 <i class="fa  panel-icon form-control-feedback"></i>
                                    </div>
                                    <div class="col-lg-6">
                                    	<label class="control-label ">Last name</label>
                                        <input type="text" class="form-control" name="lastNames" placeholder="Last Name" value="" required/>
                                    <i class="fa  panel-icon form-control-feedback"></i>
									</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label ">Username</label>
                                <input type="text" placeholder="UserName" class="form-control" name="userNames" value="" required/>
                            <i class="fa  panel-icon form-control-feedback"></i>
							</div>
    
                            <div class="form-group">
                                <label class="control-label">Email address</label>
                                <input type="email" placeholder="Email Adress" class="form-control" name="email" value="" required/>
                            <i class="fa  panel-icon form-control-feedback"></i>
							</div>
                            
                            <div class="form-group">
                            	<div class="row">
                                	<div class="col-lg-6">
                                    	<label class="control-label">Password</label>
                                		<input type="password" placeholder="Password" class="form-control" name="password" value="" />
                                    <i class="fa  panel-icon form-control-feedback"></i>
									</div>
                                    <div class="col-lg-6">
                                    	<label class="control-label">Confirm password</label>
                                        <input type="password" placeholder="Confirm Password" class="form-control" name="confirmPassword" value="" />
                                    <i class="fa  panel-icon form-control-feedback"></i>
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                                	<div class="col-lg-6">
                                    	<label class="control-label">Country</label>
										<select name="code" class="form-control">
                                		<?= circle::fp_coutry_code(); ?>
										</select>
                                    </div>
                                    <div class="col-lg-6">
                                    	<label class="control-label">Phone No</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone eg: 02401234567" value="" required/>
                                    <i class="fa  panel-icon form-control-feedback"></i>
									</div>
                                </div>
                            </div>
                            <!--div class="form-group">
 <label class="control-label form-grey" style="font-weight:bold;" id="captchaOperation"></label>
                                <input type="text" class="form-control" name="captcha" />
								<i class="fa fa-gear panel-icon form-control-feedback"></i>
                            </div-->
							<?php
							if(isset($_SESSION['ref'])){
							echo '<div class="form-group">
                                <label class="control-label">Referer</label>
                                <input type="text" class="form-control" name="ref" value="'.$_SESSION['ref'].'" readonly="readonly"/>
							</div>';
							} else {
                echo '<div class="form-group">
                                <label class="control-label">Referer`s ID</label>
                                <input type="text" class="form-control" name="ref" placeholder="Enter your referers username if you have any" value="'.$_SESSION['ref'].'" />
              </div>';

              }
							?>
                            <div class="form-group">
                                     <label class="cr-styled">
                                    <input type="checkbox" required>
                                    <i class="fa"></i> 
                                </label>
                                I have read and I agree with all <a class="" data-toggle="modal" data-target="#PrivillagesModal">
                                Terms &amp; Conditions</a>
                                </div>

                               
                           
                              
                            <hr class="dotted">
                            
                            <div class="form-group">
							
								<input type="submit" class="btn btn-primary btn-block" name="signup" value="Sign up"/>
                            </div>
							<!--button type="button" class="btn btn-danger btn-block" id="resetBtn">
							<i class="fa"> </i>Clear form</button-->
                            </form>
            <hr>
            
            <p class="text-center text-gray">Already have account</p>
            <a href="login.php" class="btn btn-default btn-block">Sign In</a>
        </div>
        </div>
    </div>
	<br/>
	<br/>
	</div></div></div></div></div><div class="col-md-3">
				</div></div></div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a8b4ee6d7591465c707d01a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
 <div class="modal fade" id="PrivillagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"><form action="#" method="GET">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Terms And Conditions</h4>
                                        </div>
                                        <div class="modal-body">
                                            Once you join we are a family, love one another? <?php/* echo $username; */?>
                                            <br/>                                           
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div> 
                                <!-- /.modal-dialog -->
                             </div> 
  <?php
include('includes/footer.php');
?>