<?php include('partials/menu.php'); ?>

<div class="main-containt">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /><br />

        <br><br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <br><br>

            <!-- Button to Add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-category.php " class="btn-primary">Add Category</a>

            <br /><br /><br />

            <table class="tbl-full" >
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>

                </tr>

                <?php 

                    // Query get all category from database
                    $sql = "SELECT * FROM tbl_category";

                    //Excute query
                    $res = mysqli_query($conn, $sql);

                    //Count rows
                    $count = mysqli_num_rows($res);

                    //Create serial number variable and assign value as 1
                    $sn=1;

                    //Chek whether we have data in database or not
                    if($count>0)
                    {

                        //we have data in database
                        //Get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $image_name = $row['title'];
                            $featured = $row['featured'];
                            $active = ['active'];

                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>

                                <td>
                                    <?php
                                        // Check whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
                                            <img scr="<?php echo SITEURL; ?>images/category/ <?php echo $image_name; ?>" >

                                            <?php
                                        }
                                        else
                                        {
                                            //Display the Message
                                            echo "<div class='error'>Image not Added. </div>";
                                        }

                                ?>
                                </td>
                                <td><?php echo $image_name; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="#" class="btn-secondery">Update Category</a>
                                    <a href="#" class="btn-denger">Delete Category</a>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //we don't have data in database
                        // we'll display the message inside the 
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">NO Category Added.</div></td>
                        </tr>

                        <?php

                    }
                
                ?>

              

              
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>  