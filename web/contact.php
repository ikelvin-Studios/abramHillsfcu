

<!DOCTYPE html>
<html lang="zxx">


	   <?php 
        $title = "Contact Us";
	   include('head.php');	
	   ?>
	<!-- /head -->


	<body>
    <!-- mian-content -->
    <div class="main-w3-pvt-header-sec" id="home">
 
        <!-- header -->
		 <?php 

	   include('header.php');	
	   ?>

        <!-- banner -->
       
        <!-- //slider -->
    </div>

    <!-- //banner -->
    <!-- banner bottom -->
    
    <!-- //mid-->
<br/><br/><br/><br/>
        <!-- /contact -->
        <section class="content-info py-5">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="title-w3ls mb-5">Contact Us</h3>
                <div class="title-desc text-center px-lg-5">
                    <p class="px-lg-5 sub-vj">We are more than happy to have your message, Email: <a href="mailto:info@abramhillsfcu.com"></a>  OR Fill the form Below and Recieve an email from Us.</p>
                </div>
            </div>
            <div class="contact-w3ls-form mt-5">
                <form action="#" class="w3-pvt-contact-fm" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="Name" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="Name" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="Email" placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Write Message</label>
                                <textarea class="form-control" name="Message" placeholder="" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group mx-auto mt-3">
                            <button type="submit" class="btn submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- footer -->
<?php include ('footer.php') ?>
</body>

</html>

