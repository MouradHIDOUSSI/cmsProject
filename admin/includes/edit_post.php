<?php
    if (isset($_GET['p_id']))
    {
        $post_id = $_GET['p_id'];
        $query = ("select * from posts where post_id = '{$post_id}' ");
        $selectAllPosts = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($selectAllPosts))
        {
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
        } 

        if (isset($_POST['edit_post']))
        {
            $post_category_id = $_POST['post_category'];
            $post_title = $_POST['post_title'];
            $post_author = $_POST['post_author'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_content = $_POST['post_content'];
            $post_tags = $_POST['post_tags'];
            $post_status = $_POST['post_status'];

            move_uploaded_file($post_image_temp, "../images/$post_image");

            if(empty($post_image)) {
        
                $query = "SELECT * FROM posts WHERE post_id = $post_id ";
                $select_image = mysqli_query($connection,$query);
                    
                while($row = mysqli_fetch_array($select_image)) {
                    
                   $post_image = $row['post_image'];
                
                }
            }

            $query = "update posts";
            $query .= " set post_category_id = '{$post_category_id}', ";
            $query .= " post_title = '{$post_title}', ";
            $query .= " post_date = now(), ";
            $query .= " post_author = '{$post_author}', ";
            $query .= " post_image = '{$post_image}', ";
            $query .= " post_content = '{$post_content}', ";
            $query .= " post_tags = '{$post_tags}', ";
            $query .= " post_status = '{$post_status}' ";
            $query .= " where post_id = '{$post_id}' ";
            $result = mysqli_query($connection, $query);

            if (!$result)
            {
                die("Query Faild: " . mysqli_error($connection));
            }
            else
            {
                echo "Post Updated";
                echo "<br>";
                print_r($_POST);
                echo "<br>";
                echo "<br>";
                print_r($query);
                
            }
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value='<?php echo $post_title; ?>' type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="cat_title">Category Title</label> <br>
        <select name="post_category" id="">
            <?php
                $query = ("select * from categories");
                $selectAllCategories = mysqli_query($connection, $query);
                if (!$selectAllCategories)
                {
                    die("Query Faild: " . mysqli_error($connection));
                }
                else
                {
                    echo "Record Updated";
                }
                while ($row = mysqli_fetch_assoc($selectAllCategories))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>$cat_title</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value='<?php echo $post_author; ?>' type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value='<?php echo $post_status; ?>' type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_status">Post Image</label><br>
        <img width= "150" src="../images/<?php echo $post_image; ?>" alt=""> 
        <br><br><input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value='<?php echo $post_tags; ?>' type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="EDIT POST">
    </div>

</form>