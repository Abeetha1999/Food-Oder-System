<?php 
    //  Include the constants.php for SITEURL
    include('../config/constants.php');

    //1. Distroy the session
    session_destroy(); // unset $_SESSION['user']

    //2. rederict to the login page
    header('location:'.SITEURL.'admin/login.php');

?>