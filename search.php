<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
    <!-- Navigation -->
<?php  
if(isset($_POST['submit']))
{   
    $search=$_POST["search"];
    $query= "select * from posts where post_tags like '%$search%'";
    $search_query=mysqli_query($connection,$query);
    if(!$search_query)
    {   die("Quey failed".mysqli_error($connection));
    }
    $count=mysqli_num_rows($search_query);
    $heading="Relevant Posts";
    $type=$search;
    if(!$count)
    {   $heading="No Results";
        $type="";
    }
    //echo $count;
}
?>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    <?php echo $heading ?>
                    <small><?php echo $type ?></small>
                </h1>
    <?php 
    

    $query="select * from posts";
    $select_all_posts=$search_query;
    

    while($row1 = mysqli_fetch_assoc($select_all_posts))
    {   
        $post_title=$row1['post_title'];
        $post_author=$row1['post_author'];
        $post_date=$row1['post_date'];
        $post_content=$row1['post_content'];
        $post_image=$row1['post_image'];
        //echo "<li><a href=''>{$post_title}s";
        ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


    <?php  
    }
                
    ?>

                <!-- Second Blog Post -->
                

                <!-- Third Blog Post -->
               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php";?>