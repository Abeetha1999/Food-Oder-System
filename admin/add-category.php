<?php include('partials/menu.php');?>

    

    <!--main-Contain Section start -->
    <div class="main-Content">
         <div class="wrapper">
            <h1>Add Category</h1>
            <br /><br /><br/>

            
            <br><br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                { 
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

            ?>

            <!-- add category forms start hear -->

            <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>

                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>

                    <td colspan="2">
                        <input type="submit" name="submit" value="addd Category" class="btn-secondary">

                    </td>

                </tr>
            </table>
            </form>
            <!-- add category forms ends hear -->

            <?php 

            //check whether the submit button is Clicked or not
            if(isset($_POST['submit']))
            {
               

                //1. Get the value from category form
                $title = $_POST['title'];

                // for radio input, we need to check wether the button is selected or not
                if(isset($_POST['featured']))
                {
                    //Get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set the defult value
                    $featured ="No";

                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active= "No";
                }

                //Check whether the image is selected or not and set value for image name accoridingly
                    //print_r($_FILES['image']);

                   // die(); //Brake the code hear

                   if(isset($_FILES['image']['name']))
                   {
                    // Upload the image
                    // To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    // Auto rename our image
                    //Get the extension of our image (jpg, png, gif, etc) e.g. "Special.food1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the image
                    $image_name= "Food_Category_".rand(000,999).'.'.$ext; //e.g: Food_Category_834.jpg


                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    //Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not 
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==FALSE)
                    {
                        //set message
                        $_SESSION['upload'] = "<div class = 'error'> Faild to Upload Image. </div>";

                        //redirect to add category page
                        header('location:'>SITEURL. 'admin/add-category.php');

                        //stop the process
                        die();
                    }

                   }
                   else
                   {
                        // Don't upload image and set the image name value as blank
                        $image_name="fk";
                   }


                // 2. Create SQL Quary Insert Category into database
                $sql = "INSERT INTO tbl_category SET
                title = '$title',
                img_name = '$image_name',
                featured = '$featured' ,
                active = '$active'
                ";

                //3. Execute the Query and save in Database
                $res = mysqli_query($conn, $sql);

                //4. Check whether the query executed or not adn data added or not
                if($res==TRUE)
                {

                    // Query Executed and category added
                    $_SESSION['add'] = "<div class= 'succsess'>Category Added Succsessfully. </div>";

                    //redirect to Manage category page
                    header('location:'.SITEURL."admin/manage-category.php");
                }
                else
                {
                    //Faild to add Category
                    $_SESSION['add'] = "<div class= 'succsess'>Faild to Add Category. </div>";

                    //redirect to Manage category page
                    header('location:'.SITEURL."admin/add-category.php");
                }
                
            }

          



            ?>
        </div>
    </div>
    <!--main-Contain Section End -->
   
 <?php include('partials/footer.php'); ?>