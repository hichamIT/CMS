<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>

    <!-- Navigation -->
<?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <?php 
                if (isset($_GET['p_id'])) {
                    $postid = $_GET['p_id'];
                    $postauthor = $_GET['author'];
                }

                $query = "SELECT * FROM posts WHERE post_user = '{$postauthor}' ";
                $select_all_posts = mysqli_query($connection,$query);
                if (!$select_all_posts) {
                    die('query failed'.mysqli_error($connection));
                }

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
                    
            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?idpost=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                     All posts by <?php echo $post_user;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>   
                
            <?php } ?>

                <hr>

                 

                
            </div>


                <?php include("includes/sidebar.php");?>

<?php include("includes/footer.php");?>