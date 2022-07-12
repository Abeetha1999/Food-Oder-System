<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
        
            //1. Get the ID of selected Admin
                $id=$_GET['id'];

            //2. Create SQL Query to get the detials
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                // 3. Excute the Query

                $res=mysqli_query($conn, $sql);

                // Check whether the query is executed or not

                if($res==TRUE)
                {
                    //check whether the data is avialable or not
                    $count=1;
                    if($count==1)
                    {
                        //Get the detials
                        //echo"Admin Avialable";
                        $row=mysqli_fetch_assoc($res);

                        $full_name =$row['full_name'];
                        $username =$row['username'];

                    }
                    else
                    {
                        //Redirect to MAnage admin page

                        echo"HI";
                    }
                    
                }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </td>
            </tr>

            <tr>
                <td>User Name: </td>
                <td>
                <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <!--<tr>
                <td>Password</td>
                <td>
                <input type="password" name="password" placeholder="Enter your Password">
                </td>
            </tr> -->

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="Submit" name="submit" value="Update Admin" class="btn-secondery">

                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php
//check whether the submit button is Clicked or not

if(isset($_POST['submit']))
{
    //echo"Button Clicked";
    // Get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $surname = $_POST['username'];

    //create sql query to update admin
    $sql ="UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$surname'
    WHERE id='$id'
    ";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check wheteher the query excuteed succsessfully or not
    if($res==TRUE)
    {
        //Query excuted and admin updated
        $_SESSION['update'] = "<div class= 'success'>Admin Updated Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //Faild to update admin
        $_SESSION['update'] = "<div class= 'error'>Faild to Update Admin.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }


}


?>


<?php include('partials/footer.php') ?> 