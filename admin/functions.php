<?php 
	function insert_category()
	{	 if(isset($_POST['submit']))
                        {   $cat_title=$_POST['cat_title'];
                        	global $connection;
                            $query="insert into categories(cat_title) value('{$cat_title}')";
                            $query_res=mysqli_query($connection,$query);
                            if(!$query_res)
                            {   echo die("Query Falied " . mysqli_error($connection));
                            }
                        }
                         ?>
                         <?php 
                        if(!isset($_GET['edit']))
                        {   ?>
                            <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="cat_title">Category Title</label>
                                <input type="text" class="form-control" name="cat_title" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            </form>
                            <?php  
                        }


	}
	function show_categories()
	{?>
						<div class="col-xs-4">
                        <table class="table table-bordered table"> 
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                     <?php 
                                        $query="select * from categories ";
                                        global $connection;
                                        $select_categories=mysqli_query($connection,$query);
                                        while($row1 = mysqli_fetch_assoc($select_categories))
                                        {   $cat_title=$row1['cat_title'];
                                            $cat_id=$row1['cat_id'];
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                            echo "</tr>";
                                        }
                                     ?>
                                     <?php 
                                     if(isset($_GET['delete']))
                                     {  $cat_id=$_GET['delete'];
                                        $query="delete from categories where cat_id={$cat_id}";
                                        $del_query=mysqli_query($connection,$query);
                                        header("Location: categories.php");      
                                     }
                                      ?>
                            </tbody>
                        </table>
                        </div>

	

	<?php
	}


 ?>