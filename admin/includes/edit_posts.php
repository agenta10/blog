<?php 
	if(isset($_POST['edit_post']))
	{	$post_author=$_POST['author'];
		$post_id=$_GET['edit'];
    	$post_title=$_POST['title'];
    	$post_category_id=$_POST['post_category'];
    	$post_status=$_POST['post_status'];

    	$post_image= $_FILES['image']['name'];
    	$post_image_temp=$_FILES['image']['tmp_name'];

    	$post_content=$_POST['post_content'];
    	$post_tags=$_POST['post_tags'];
    	$post_comment_count=0;
    	$post_date=date('d-m-y');

    	move_uploaded_file($post_image_temp,"../images/{$post_image}");

    	$query="update posts SET ";
    	$query.="post_title='{$post_title}', ";
    	$query.="post_category_id={$post_category_id}, ";
    	$query.="post_date=now(), ";
    	$query.="post_author='{$post_author}', ";
    	$query.="post_status='{$post_status}', ";
    	$query.="post_tags='{$post_tags}', ";
    	$query.="post_content='{$post_content}', ";
    	$query.="post_image='{$post_image}' ";
    	$query.=" where post_id={$post_id}";


		$query_result=mysqli_query($connection,$query);
		if(!$query_result)
		{	echo mysqli_error($connection);
			die("Query_failed");
		}
		else
		{	header("location: posts.php");
		}
	}

 ?>
<?php 
if(isset($_GET['edit']))
{	$post_id=$_GET['edit'];
	$query="select * from posts where post_id={$post_id}";
    $select_posts=mysqli_query($connection,$query);
    while($row1 = mysqli_fetch_assoc($select_posts))
    {   $post_id=$row1['post_id'];
        $post_author=$row1['post_author'];
        $post_title=$row1['post_title'];
        $post_category_id=$row1['post_category_id'];
        $post_status=$row1['post_status'];
        $post_image=$row1['post_image'];
        $post_tags=$row1['post_tags'];
        $post_comment_count=$row1['post_comment_counts'];
        $post_date=$row1['post_date'];
        $post_content=$row1['post_content'];
    }
}

 ?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $post_title ?>">
	</div>
	<div class="form-group">
		<select name="post_category" id="" value="<?php echo $cat_title ?>">
			<?php 
				$query="select * from categories where cat_id={$post_category_id}";
			    $select_categories=mysqli_query($connection,$query);
    			while($row1 = mysqli_fetch_assoc($select_categories))
   				{   $cat_title=$row1['cat_title'];
   					$post_cat_id=$row1['cat_id'];
   					echo "<option value='{$post_cat_id}'>{$cat_title}</option>";  
    			}
 
				$query="select * from categories ";
			    $select_categories=mysqli_query($connection,$query);
    			while($row1 = mysqli_fetch_assoc($select_categories))
   				{   $cat_title=$row1['cat_title'];
   					$cat_id=$row1['cat_id'];
   					if($cat_id != $post_category_id)
   					{echo "<option value='{$cat_id}'>{$cat_title}</option>";}  
    			}
			 ?>
		</select>

	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $post_author ?>">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>">
	</div>

	<div class="form-group">
		<img width=70 src="../images/<?php echo $post_image ?>">
		<input type="file" name="image" value="<?php echo $post_image ?>">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" cols="30" rows="10" ><?php echo $post_content; ?>
		</textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_post" value="Publish">
	</div>
</form>