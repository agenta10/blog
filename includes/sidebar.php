<!-- Blog Sidebar Widegets Column -->
<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- search form -->
                    <!-- /.input-group -->
                </div>



                <!-- Blog Categories Well -->
                <div class="well">
                <?php 
                    $query="select * from categories ";
                    $select_categories=mysqli_query($connection,$query);
                ?>


                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php  
                            while($row1 = mysqli_fetch_assoc($select_categories))
                                {   $cat_title=$row1['cat_title'];
                                    echo "<li><a href=''>{$cat_title}</a></li>";
                                }
                            ?>
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
                </div>


                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>