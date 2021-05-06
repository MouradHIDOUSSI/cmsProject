<?php include "includes/admin_functions.php"; ?>
<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        <!-- this is our category add form -->
                        <div class= "col-xs-6">
                            <?php
                                //this function will add a category to the DB
                                AddCategoryAdmin();
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Category Title:</label>
                                    <input class= "form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class= "btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>
                        <!-- this is our category table next to the form -->
                        <div class= "col-xs-6">
                            <?php
                                //this function shows all categories in the admin dashboard
                                showAllCategoriesAdmin();
                                deleteCategoryAdmin();
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>