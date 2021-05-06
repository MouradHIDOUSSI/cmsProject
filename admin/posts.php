<?php include "includes/admin_functions.php"; ?>
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Heading -->
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>
                    <!-- Page table -->
                    <?php
                        if (isset($_GET['source']))
                        {
                            $source = $_GET['source'];
                        }
                        else
                        {
                            $source = '';
                        }
                        
                        switch ($source)
                        {
                            case "add_post";
                                include 'includes/add_post.php';
                                break;
                            default;
                                //this function shows all posts in admin dashboard
                                showAllPostsAdmin();
                        }
                    ?>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>