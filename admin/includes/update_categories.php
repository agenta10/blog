<?php 
if(isset($_GET['edit']))    
{   $cat_id=$_GET['edit'];
    $query="select * from categories where cat_id={$cat_id}";
    $select_categories=mysqli_query($connection,$query);
    while($row1 = mysqli_fetch_assoc($select_categories))
    {   $cat_title=$row1['cat_title'];
    }
}
?>

<?php 
if(isset($_GET['edit']))
{   ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title">Update Category</label>
            <input value=" <?php echo $cat_title ?>" type="text" class="form-control" name="cat_title" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_category" value="Update">
        </div>
    </form>

<?php  
}
?>
<?php 
    if(isset($_POST['update_category']))
    {   $the_cat_title= $_POST['cat_title'];
        $query="update categories set cat_title= '{$the_cat_title}' where cat_id ={$cat_id}";
        $edit_query=mysqli_query($connection,$query);
        header("Location: categories.php");  
    }

 ?>