                    <table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    			<th>Id</th>
                    			<th>Author</th>
                    			<th>Title</th>
                    			<th>Category</th>
                    			<th>Status</th>
                    			<th>Image</th>
                    			<th>Tags</th>
                    			<th>Commments</th>
                    			<th>Date</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                        <?php 
                            if(isset($_GET['delete']))
                            {   $post_id=$_GET['delete'];
                                $query="delete from posts where post_id={$post_id}";
                                $query_res=mysqli_query($connection,$query);
                                if(!$query_res)
                                {   die(mysqli_error($connection));
                                }
                            }
                          ?>
                    	 <?php 
                            $query="select * from posts ";
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
                                echo "<tr>";
                                echo "<td>{$post_id}</td>";
                                echo "<td>{$post_author}</td>";
                                echo "<td>{$post_title}</td>";
                                echo "<td>{$post_category_id}</td>";
                                echo "<td>{$post_status}</td>";
                                echo "<td><img width='100' class='img-responsive' src='../images/{$post_image}' alt='image'></td>";
                                echo "<td>{$post_tags}</td>";
                                echo "<td>{$post_comment_count}</td>";
                                echo "<td>{$post_date}</td>";
                                echo "<td><a href='posts.php?source=edit_posts&edit={$post_id}'>Edit</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    	</tbody>
                    </table>
