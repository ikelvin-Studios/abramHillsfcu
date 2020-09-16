<?php

 $title = "Recover"; ?>
<?php 


$deposits_table = "Login";
$page = 0;
$code = 0;
$topic = "Forgot Password?";
$caption = "Follow Steps To Recover Your Account .";
?>

<?php
// include('includes/connect.php');


/*                                                                                                                                                    include('../includes/check-login.php'); */

if(isset($_POST['send-code_submit'])){
 
}



function code_generate(){

    global $con;

    $generated_code = rand(100000,999999);

   $code_query = mysqli_query($con, "select * from verification_tb where `verify_code` = '$generated_code' and `status` = 'open'");

    if(mysqli_num_rows($code_query)>0){
        ref_generate();
    }
    else{
        return $generated_code;
    }
    
}


if(isset($_POST['verify-submit'])){
  // echo '<script>alert("ver has to be '.$code.'")</script>';
 
}


if(isset($_POST['recover-submit'])){

}



?>

<?php /* require('includes/header.php'); */

echo '<div class="container">
    	<div class="row">
    	<div class="col-lg-6 col-lg-offset-3">';
?>
</div></div></div><br/><br/>
<div class="form-gap"></div>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center"><?= $topic ?></h2>
                  <p> <?= $caption ?></p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="on" class="form" method="post" id="recover_form" action="recover.php">
    <?php if ($page == 0) { ?>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                          <input id="username" name="username" placeholder="username" class="form-control"  type="text" required="true">
                        </div>
                      </div>
                      <label>
                        Send verification code via
                      </label>

                      <div class="form-group">
                        
                          <select class="form-control" required="true" name="via" id="via" required="true">
                                                <option selected >Choose Method</option>
                                                <option value="via_sms" onclick="ver_sms()" >1. SMS</option>
                                                <option value="via_email" onclick="ver_email()">2. Email</option>
                                               
                                            </select>
                                            <div id="method_note"></div>

                    <script type="text/javascript">
                        function ver_sms() {
                            
                            document.getElementById('method_note').innerHTML = '<br/>A 6-digit Verification code will be sent to your mobile number associated with this account via SMS';

                        }
                        function ver_email() {
                            
                            document.getElementById('method_note').innerHTML = '<br/>A 6-digit Verification code will be sent to your email address associated with this account';

                        }
                    </script>
                        </div>
                      </div> 
                      <div class="form-group">
                        <input name="send-code_submit" class="btn btn-lg btn-primary btn-block" value="continue" type="submit">
                      </div></form><?php } ?>
                      <?php if ($page == 1) { ?>
                        <form id="register-form" role="form" autocomplete="off" class="form" method="post" id="recover_form" action="recover.php">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock color-blue"></i></span>
                          <input id="ver_code" name="ver_code" placeholder="6-digit code" class="form-control"  type="number">
                        </div>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value="<?= $token ?>">
                      <input type="hidden" class="hide" name="token_via" id="token_via" value="<?= $token_via ?>">
                      <div class="form-group">
                        <input name="verify-submit" class="btn btn-lg btn-primary btn-block" value="Verify Code" type="submit">
                      </div></form><?php } ?>
                      <?php if ($page == 2) { ?>

                        <form id="register-form" role="form" autocomplete="off" class="form" method="post" id="recover_form" action="recover.php">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock color-blue"></i></span>
                          <input id="password" name="password" placeholder="Password" class="form-control"  type="password">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock color-blue"></i></span>
                          <input id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control"  type="password">
                        </div>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value="<?= $token ?>">
                      <input type="hidden" class="hide" name="token_via" id="token_via" value="<?= $token_via ?>">
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="change Password" type="submit">
                      </div></form><?php } ?>
                      


                     
                      <?php if ($page == 3) { ?>
                        
                        <a class="btn btn-lg btn-primary btn-block" href="login.php "> Login Now </a>
                      </div><?php } ?>

                       
                   
    
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
<!--div class="container">
    	<div class="row">
    	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">   
						<div class="panel-body">
        	<h2 class="text-center"> Recover Account</h2>
            <p class="text-center">Follow these processes to recover account</p>
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
                                		<? /* = circle::fp_coutry_code(); */ ?>
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
							<?php /*
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

              }*/
							?>
                            <!--div class="form-group">
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
							<!-- button type="button" class="btn btn-danger btn-block" id="resetBtn">
							<i class="fa"> </i>Clear form</button-->
                            <!--/form>
            <hr>
            
            <p class="text-center text-gray">Already have account</p>
            <a href="login.php" class="btn btn-default btn-block">Sign In</a>
        </div>
        </div>
    </div>
	<br/>
	<br/>
	</div></div></div></div></div><div class="col-md-3">
				</div></div></div-->

<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a8b4ee6d7591465c707d01a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->
 <!--div class="modal fade" id="PrivillagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                 <!--/div> 
                                <!-- /.modal-dialog -->
                             <!--/div--> 
  <?php
include('includes/footer.php');
?>