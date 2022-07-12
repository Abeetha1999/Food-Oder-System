<?php include('partials/menu.php');?>
<html>

<head>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    

    <!--main-Contain Section start -->
    <div class="main-Content">
         <div class="wrapper">
            <h1>Manage Admin</h1>
            <br /><br /><br/>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // desplaying session message
                    unset ($_SESSION['add']); //removing session message
                }

                if(isset($_SESSION['Delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                If(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }

                If(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset ($_SESSION['user-not-found']);
                }
                
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset ($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset ($_SESSION['change-pwd']);
                }

            ?>
            <br><br>

            <!-- Button to Add Admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />

            <table style="width: 100%;" >
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>

                </tr>

                    
                <?php
                    //Query to get Admin
                    $sql ="SELECT * FROM tbl_admin";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //check whether the query excute or not
                    if($res==TRUE)
                    {
                        //count rows to check whether we have data or not 
                        $count = mysqli_num_rows($res); //function to get all the raws in database

                        $sn=1;
                        // check the num of rows
                        if($count>0)
                        {
                            // we have data in database
                            while($rows=mysqli_fetch_assoc($res))

                            // create a variable and assign the value
                            {
                                //using whaile loop to get all the data from database
                                //And while loop will run as long as we have data in database


                                //Get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //Display the values in our table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL ; ?>admin/update-password.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL ; ?>admin/update-admin.php?id=<?php echo $id; ?> "class="btn-secondery">Update Admin</a>
                                        <a href="<?php echo SITEURL ; ?>admin/delete-admin.php?id=<?php echo $id; ?> " class="btn-denger">Delete Admin</a>
                                    </td>
                                </tr>



                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data in database
                        }

                    }

                ?>

                
            </table>
            

        </div>
    </div>
    <!--main-Contain Section End -->
    </body>
</html>
 <?php include('partials/footer.php'); ?>