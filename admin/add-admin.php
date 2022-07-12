<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>

        

        <form action="" method="post">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="Full_name" placeholder="Enter your Name">
                </td>
            </tr>

            <tr>
                <td>User Name</td>
                <td>
                <input type="text" name="Username" placeholder="Your Unername">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                <input type="password" name="password" placeholder="Enter your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="Submit" name="submit" value="Add Admin" class="btn-secondery">

                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
// Process the value from form and save it to database
// Check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button Clicked
   // echo "Button Clicked";

   //1. get the data from form
    $full_name = $_POST['Full_name'];
    $Username = $_POST['Username'];
    $password = md5($_POST['password']);//password Encryption with md5

    //2. SQl Query to save data in to database
}   
$sql = "INSERT INTO tbl_admin SET
    Full_name= '$full_name',
    Username= '$Username',
    password= '$password'
    ";

   
// 3. Executing Query & saving data in to database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // 4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //Data Insert
        //echo "Data Insert";
        //Create seasson variable to display message
        $_SESSION['add'] = "Admin added Successfully";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Faild to insert Data
       // echo "Fail to Insert Data"
       //Create seasson variable to display message
       $_SESSION['add'] = "Faild to add Admin";
       //Redirect page to add admin
       header("location:".SITEURL.'admin/add-admin.php');
    }

?>