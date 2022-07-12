<?php 

    //authorization - Access control
    // check whether the user logged or not
    if(!isset($_SESSION['user'])) // if user session is not set
    {

        //user is not logged in
        // redirect to login page with message
        $_SESSION['no-login-message'] = "<div class ='error text-center'> Plase login to access Admin Panel. </div>";
        //redirect to the login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>