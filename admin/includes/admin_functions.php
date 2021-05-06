<?php

function showAllCategoriesAdmin()
{
?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $connection;
            $query = ("select * from categories");
            $selectAllCategories = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($selectAllCategories))
            {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
                echo "<td> <a href='categories.php?edit={$cat_id}'>Edit</a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
}


//this function adds a category to DB
function AddCategoryAdmin()
{
    global $connection;
    if (isset($_POST['submit']))
    {
        $cat_title =  $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title))
        {
            echo "This Field Can't be empty";
        }
        else
        {
            $query = "insert into categories (cat_title) ";
            $query .= "Values ('$cat_title')";
            $result = mysqli_query($connection, $query);

            if (!$result)
            {
                die("Query Faild" . mysqli_error($connection));
            }
            else
            {
                echo "Record created";
            }
        }
    }
}

//this function deletes a category from DB
function deleteCategoryAdmin()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $cat_id =  $_GET['delete'];
        $query = "delete from categories ";
        $query .= "where cat_id = {$cat_id}";
        $result = mysqli_query($connection, $query);
        if (!$result)
        {
            die("Query Faild: " . mysqli_error($connection));
        }
        else
        {
            echo "Record Deleted";
            header("location: categories.php");
        }
    }
}

//this function updates a category in admin dasboard
function updateCategoryAdmin()
{
    global $connection;
    if (isset($_GET['edit']))
    {
        $cat_id =  $_GET['edit'];
        $query = ("select * from categories where cat_id= $cat_id ");
        $selectAllCategoriesId = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($selectAllCategoriesId))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
    ?>
            <input value="<?php if (isset($cat_title)) echo $cat_title; ?>" class="form-control" type="text" name="cat_title">
    <?php
        }
    }


    if (isset($_POST['edit_cat']))
    {

        $cat_title =  $_POST['cat_title'];
        if ($cat_title == "" | empty($cat_title))
        {
            echo "This field can't ba emty";
        }
        else
        {
            $query = "update categories ";
            $query .= " set cat_title = '{$cat_title}' ";
            $query .= " where cat_id = '{$cat_id}' ";
            $result = mysqli_query($connection, $query);
            if (!$result)
            {
                die("Query Faild: " . mysqli_error($connection));
            }
            else
            {
                echo "Record Updated";
            }
        }
    }
}


//this function adds all posts to the posts.php page in admin dashboard
function showAllPostsAdmin()
{
    ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>CAT_ID</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>DATE</th>
                <th>IMAGE</th>
                <th>CONTENT</th>
                <th>TAGS</th>
                <th>COMM_Count</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $connection;
            $query = ("select * from posts");
            $selectAllPosts = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($selectAllPosts))
            {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];

                echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>$post_category_id</td>";
                echo "<td>$post_title</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_date</td>";
                echo "<td><img width = 150 src='../images/{$post_image}' alt='' ></td>";
                echo "<td>$post_content</td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comment_count</td>";
                echo "<td>$post_status</td>";
                echo "<td> <a href='./posts.php?delete={$post_id}'>Delete</a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<?php
}

function deletePostAdmin()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $post_id =  $_GET['delete'];
        $query = "delete from posts ";
        $query .= "where post_id = {$post_id}";
        $result = mysqli_query($connection, $query);
        if (!$result)
        {
            die("Query Faild: " . mysqli_error($connection));
        }
        else
        {
            echo "Post Deleted";
            //header("location: ./posts.php");
        }
    }
}
?>