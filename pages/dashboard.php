<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(isset($_SESSION['id'])){
}
else {
    echo '<script>alert("Access denied, Please Login First");window.location.assign("login.php")</script>';
}
?>

<?php require ('includes/header.php') ?>


<?php include('includes/sidebar.php') ?>
   

       

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Member Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include('includes/footer.php') ?>
</body>

</html>
