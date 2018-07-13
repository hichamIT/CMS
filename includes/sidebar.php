
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!--End form-->
                    <!-- /.input-group -->
                </div>
            
                <!-- login form -->
                <div class="well">
                  <?php 
                    
                   if (isset($_SESSION['role'])) {
                      echo " <h4>Logged in as {$_SESSION['username']}  </h4> ";
                      echo "<a href='includes/logout.php' class='btn btn-primary'>Logout</a>";
                   }else { ?>
                      <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" palceholder="Enter Your Username">
                    </div>
                     <div class="input-group">
                        <input name="password" type="password" class="form-control" palceholder="Enter Your Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">Submit</button>
                        </span>
                    </div>
                    </form><!--End form-->
                  <?php  }
                   ?>
                    
                    <!-- /.input-group -->
                </div>
                
                <?php 
                $query = "SELECT * FROM categories";
                $select_all = mysqli_query($connection,$query);
                ?>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php 
                                while ($row = mysqli_fetch_assoc($select_all)) {
                                    $title = $row['cat_title'];
                                    $id = $row['cat_id'];
                                    echo "<li><a href='category.php?idcategory=$id'>{$title}</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <?php include("widget.php");?>

