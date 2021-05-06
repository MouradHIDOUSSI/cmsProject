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
                while ($row = mysqli_fetch_assoc($selectAllCategories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<tr>";
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
                    echo "<td> <a href='categories.php?update={$cat_id}'>Edit</a> </td>";
                    echo "</tr>";
                } ?>
                </tr>
            </tbody>
        </table>
    <?php
    }
?>

<?php
    //this function adds a category to DB
    function AddCategoryAdmin()
    {
        global $connection;
        if (isset($_POST['submit'])) {
            $cat_title =  $_POST['cat_title'];
            if ($cat_title == "" || empty($cat_title)) {
                echo "This Field Can't be empty";
            } else {
                $query = "insert into categories (cat_title) ";
                $query .= "Values ('$cat_title')";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Faild" . mysqli_error($connection));
                } else {
                    echo "Record created";
                }
            }
        }
    }
?>

<?php
    //this function deletes a category from DB
    function deleteCategoryAdmin()
    {
        global $connection;
        if (isset($_GET['delete'])) {
            $cat_id =  $_GET['delete'];
            $query = "delete from categories ";
            $query .= "where cat_id = {$cat_id}";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Query Faild: " . mysqli_error($connection));
            } else {
                echo "Record Deleted";
                header("location: categories.php");
            }
        }
    }
?>

<?php
    //this function deletes a category from DB
    function updateCategoryAdmin()
    {
        global $connection;
        if (isset($_GET['update'])) {
            $cat_id =  $_GET['update'];
            if (isset($_POST['submit'])){

            }
            $query = "delete from categories ";
            $query .= "where cat_id = {$cat_id}";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Query Faild: " . mysqli_error($connection));
            } else {
                echo "Record Deleted";
                header("location: categories.php");
            }
        }
    }
?>