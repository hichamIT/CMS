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
                 if (isset($_POST['submit'])) {
                   $search = $_POST['search'];
 
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $select_Tags = mysqli_query($connection,$query);

                    if (!$select_Tags) {
                        die("query failed".mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($select_Tags);

                    if ($count == 0) {
                        echo '<h1>nothing to disply</h1>';
                    } else {
                        
                        while ($row = mysqli_fetch_assoc($select_Tags)) {
                    
                            $post_title = $row['post_title'];
                            $post_autor = $row['post_autor'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                    ?>
                
                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title;?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_autor;?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                    <hr>
                    <p><?php echo $post_content;?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                

                   
                
            <?php } } } ?>
                  <hr>
            </div> 
            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php");?>

<?php include("includes/footer.php");?>