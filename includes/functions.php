<?php
    function showAllPosts()
    {
        global $connection;
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $query = "select * from posts where post_tags LIKE '%$search%' ";
            $searchQuery = mysqli_query($connection, $query);

            if (!$searchQuery) {
                die("Query Failed" . mysqli_error($connection));
            }

            $count = mysqli_num_rows($searchQuery);
            if ($count == 0) {
                echo "No result";
            } else {
                echo "Some Result";
                while ($row = mysqli_fetch_assoc($searchQuery)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    //html goes here
    ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"> <?php echo $post_title; ?> </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="cmsproject">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
        <?php  }
            }
        }
    }

    /*function showAllCategoriesSidebar()
    {
        global $connection;
        $query = ("select * from categories");
        $selectAllCategoriesSidebar = mysqli_query($connection, $query);
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                <?php
        while ($row = mysqli_fetch_assoc($selectAllCategoriesSidebar)) {
            $cat_title = $row['cat_title'];
            echo "<li><a href='#'>{$cat_title}</a></li>";?>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    <?php 
        }
    }*/
?>