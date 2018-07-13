<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>

    <!-- Navigation -->
<?php include("includes/navigation.php"); ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }else {
                    $page = "";
                }

                if ($page =="" || $page == 1) {
                    $page1 = 0;
                } else {
                    $page1 = ($page * 5) - 5;
                }
                



                

                 if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        $query1 = "SELECT * FROM posts";
                        $cunt = mysqli_query($connection,$query1);
                        $count = mysqli_num_rows($cunt);
                        $count = ceil($count / 5);

                     $query = "SELECT * FROM posts  LIMIT $page1,5";
                } else {
                        $query1 = "SELECT * FROM posts where post_status = 'published'";
                        $cunt = mysqli_query($connection,$query1);
                        $count = mysqli_num_rows($cunt);
                        $count = ceil($count / 5);
                        
                      $query = "SELECT * FROM posts where post_status = 'published' LIMIT $page1,5";
                }

                $select_all_posts = mysqli_query($connection,$query);
                $num = mysqli_num_rows($select_all_posts);
                 if (!$select_all_posts) {
                            die("query failed".mysqli_error($connection));
                        }

                if ($num < 1) {
                    echo "<h1 class='text-center'>NO POSTS AVAILABLE</h1>";
                }else {
                    

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
                    $post_status = $row['post_status'];

                        
                    
            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post/<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_user;?>&p_id=<?php echo $post_id;?>"><?php echo $post_user;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <a href="post.php?idpost=<?php echo $post_id;?>"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                <hr>
                <p><?php echo $post_content;?></p>   
                
            <?php   }?>
                  <hr>
                    <ul class='pager'>
                    <?php 
                    for ($i=1; $i <= $count; $i++) { 
                        if ($i==$page) {
                            echo "<li ><a href='index.php?page=$i' class='active_link'>{$i}</a></li>";
                        } else {
                            echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
                        }
                        
                        
                    }
                    }
                    ?>   
                    </ul>
            </div> 

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php");?>

<?php include("includes/footer.php");?>