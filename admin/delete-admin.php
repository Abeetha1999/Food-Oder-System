<?php 

//Include constants.php file here
include("../Config/constants.php");

// 1. Get the Id of admin to be deleted

$id = $_GET['id'];

// 2. Create SQL Queary to delete Admin

$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Excute the Query
$res = mysqli_query($conn, $sql);

//Check whether the query excuted successfully or not
if($res==TRUE)
{

    //Query excuted successfully and admin Deleted
    //echo "Admin Deleted";
    // create  session veriable to display message
    $_SESSION['delete']= "<div class='succsess'>Admin delete succsessfully</div>";
    //redirect to manage Admin page
    header('location:'.SITEURL.'admin/manage-admin.php');

}
else
{
    //Faild to delete Admin
    //echo "Faild to delete Admin";

    $_SESSION['delete']="<div class='error'>Faild to delete Admin.Try again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

// Redirect to manage admin page with message (seccess/error)

?>