 <?php

 $title = "Security Questions"; ?>
<?php 

require('includes/head.php') ;
$deposits_table = "Login";
$page = 0;
$code = 0;
$topic = "Security Questions";
$caption = "Please you are required answer the following security questions.";
?>

<?php
// include('includes/connect.php');


/*                                                                                                                                                    include('../includes/check-login.php'); */

if(isset($_POST['send-code_submit'])){
  
  $topic = "Security Question";
  $caption = $sec_qn1."?";
 // $caption = "What is the name of your parternal father?";
  $page = 1;



}
  
  




// function code_generate(){

//     global $con;

//     $generated_code = rand(100000,999999);

//    $code_query = mysqli_query($con, "select * from verification_tb where `verify_code` = '$generated_code' and `status` = 'open'");

//     if(mysqli_num_rows($code_query)>0){
//         ref_generate();
//     }
//     else{
//         return $generated_code;
//     }
    
// }


if(isset($_POST['verify-submit'])){
  // echo '<script>alert("ver has to be '.$code.'")</script>';
  $answer = circle::fp_clear($_POST['answer1']);
  
  
  if($ans_qn1 == $answer){

  $topic = "Security Question";
  $caption = $sec_qn2."?"; 
  $page = 2;
  
    } else {
      $token_query = mysqli_query($con,"UPDATE `verification_tb` SET `status` = 'failed' WHERE `status` = 'open' AND `username`  = '$token'");
      if ($token_query) {
        echo '<script>alert("Wrong Answer")</script>';
      } 
     
    }
}


if(isset($_POST['recover-submit'])){
  // echo '<script>alert("ver has to be '.$code.'")</script>';
  
  $answer = circle::fp_clear($_POST['answer2']);

  if($ans_qn2 == $answer){

  $sec_check = "done";
  $_SESSION['check'] = $sec_check;
  // $chec = $_SESSION['check'];
  // echo '<script>alert("'.$_SESSION['check'].'")</script>';
        $topic = "You Are Done";
        $caption = "You can now visit banking area.";
        $page = 3;

  
  
    } else {
      
        echo '<script>alert("Wrong Answer")</script>';
      
     
    }

  
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
    
                    <form id="register-form" role="form" autocomplete="on" class="form" method="post" id="recover_form" action="check.php">
    <?php if ($page == 0) { ?>
                                            
                      </div> 
                      <div class="form-group">
                        <input name="send-code_submit" class="btn btn-lg btn-primary btn-block" value="Ready" type="submit">
                      </div></form><?php } ?>
                      <?php if ($page == 1) { ?>
                        <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">A</span>
                          <input id="ans1" name="answer1" placeholder="Answer" class="form-control"  type="text" required="true">
                        </div>
                      </div>
                      
                      </div> 
                      <div class="form-group">
                        <input name="verify-submit" class="btn btn-lg btn-primary btn-block" value="Next" type="submit">
                      </div></form><?php } ?>
                      <?php if ($page == 2) { ?>

                        <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">A</span>
                          <input id="ans2" name="answer2" placeholder="Answer" class="form-control"  type="text" required="true">
                        </div>
                      </div>
                      
                      </div> 
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Continue" type="submit">
                      </div></form><?php } ?>
                      


                     
                      <?php if ($page == 3) { ?>
                        
                        <a class="btn btn-lg btn-primary btn-block" href="../pages"> Banking Area </a>
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