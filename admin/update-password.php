<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/> <br/>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td>
                    <input type="password" name="current_Password" placeholder="Current password">
                </td>
            </tr>

            <tr>
                <td>New Password</td>
                <td>
                    <input type="password" name="new_Password" placeholder="new password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirm_Password" placeholder="Confirm password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="Submit" name="submit" value="Change Password" class="btn-secondery">
                </td>
                
            </tr>
        </table>
        </form>
    </div>
</div>

<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
         //echo "clicked";
        

        //1. get data from form
        $id=$_POST['id'];
        $current_password =md5($_POST['current_Password']);
        $new_password =md5($_POST['new_Password']);
        $confirm_password = md5($_POST['confirm_Password']);

        //2. check whether the user with current id and current password exist or not
        $sql = "SELECT* FROM tbl_admin WHERE id =$id AND password ='$current_password'" ;

        //Excute the query
        $res=mysqli_query($conn, $sql);
        

        if( $res == TRUE)
        {
            //Check whether data is avialable or not
            $count=mysqli_num_rows($res);
          
            if($count==1)
            {
               //User exsist and password can be changed
               //echo"User found";
               //Check whether the new password & confirm match or not
               if($new_password==$confirm_password)
               {
                //Update password
                //echo"Password Match";
                $sql2 = "UPDATE tbl_admin SET
                Password= '$new_password'
                WHERE id=$id";

                //Execute Query
                $res2 = mysqli_query($conn, $sql2);

                // Check whether the Query Executed or not
                if($res2==TRUE)
                {
                   //Display Succsess Message 
                   //Redirect to Manage Admin page with Succsess Message
                    $_SESSION['change-pwd'] = "<div class ='succsess'> password change succsessfully.</div>";
                    //Redirect the user
                    header('location:'.SITEURL. 'admin/manage-admin.php');
                }
                else
                {
                    //Display Error message
                    //Redirect to Manage Admin page with error Message
                    $_SESSION['change-pwd'] = "<div class ='reeors'> Faild to change Password.</div>";
                    //Redirect the user
                    header('location:'.SITEURL. 'admin/manage-admin.php');
                }


               }


               else
               {
                //Redirect to Manage Admin page with error Message
                $_SESSION['pwd-not-match'] = "<div class ='error'> password did not match.</div>";
                //Redirect the user
                header('location:'.SITEURL. 'admin/manage-admin.php');
               }



            }
            else
            {
                //user Does not exists Set message adn redirect
                $_SESSION['user-not-found'] = "<div class ='error'> User not found.</div>";
                //Redirect the user
                header('location:'.SITEURL. 'admin/manage-admin.php'); 
            }
        }

        //3. Check whether the new password and confirm passwrod match or not


    }

?>


<?php include('partials/footer.php'); ?>