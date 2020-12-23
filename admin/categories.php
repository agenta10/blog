<!-- header -->
<?php include "includes/admin_header.php" ?>
  <div id="wrapper">   
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author Name</small>
                        </h1>

                        <!-- add category -->
                        <div class="col-xs-6">
                        <?php    insert_category();?>

                        <!-- edit category -->
                        <?php 
                            if(isset($_GET['edit']))
                            {include "includes/update_categories.php" ;}
                        ?>
                        </div>

                        <!-- showing categories -->
                        <?php show_categories(); ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<!-- footer -->
<?php include "includes/admin_footer.php" ?>

