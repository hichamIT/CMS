<?php include("includes/admin_header.php");?>
<?php include("includes/admin_navigation.php");?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Page
                            <small>Autor</small>
                        </h1>

                        <div class="col-xs-6">
                         <?php  insert_categories(); ?>

                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add">
                                </div>
                            </form>

                            <?php 
                            
                            if (isset($_GET['update'])) {
                                $cat_id = $_GET['update'];
                                include "includes/update_categories.php";
                                 
                            }
                            ?>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Id Category</th>
                                    <th>Title Category</th>
                                </thead>
                                <tbody>
                                
                                 <?php view_categories() ?>
                                                                                                    
                                <?php delete_categories()  ?>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include("includes/admin_footer.php");?>