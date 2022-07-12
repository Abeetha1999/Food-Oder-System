<?php include('partials/menu.php'); ?>

    <!--main-Contain Section start -->
    <div class="main-Content">
         <div class="wrapper">
            <h1>Dashboard</h1>
            <br> <br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
            ?>

            <div class="col-4 text-center">
                <h1>5</h1>
                 Categories
                <br>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                 Categories
                <br>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                 Categories
                <br>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                 Categories
                <br>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
    <!--main-Contain Section End -->

<?php include('partials/footer.php') ?>   