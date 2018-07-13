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
                if (isset($_GET['idcategory'])) {
                    $id = $_GET['idcategory'];
                }

                /*$stm1 = mysqli_prepare($connection,"SELECT post_id,post_title,post_autor,post_date,post_image,post_content FROM posts WHERE post_category_id = ? and post_status = ? ");
                $published = 'published';
                mysqli_stmt_bind_param($stm1,'is',$id,$published);
                mysqli_stmt_execute($stm1);
                mysqli_stmt_bind_result($stm1,$post_id,$post_title,$post_autor,$post_date,$post_image,$post_content);
                */



                $query = "SELECT * FROM posts WHERE post_category_id = $id and post_status = 'published'";
                $select_all_posts = mysqli_query($connection,$query);

                if (mysqli_num_rows($select_all_posts) <1 ) {
                    echo "<h1 class='text-center'>NO POSTS AVAILABLE</h1>";
                }else{
               
                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_autor = $row['post_autor'];
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
                    by <a href="index.php"><?php echo $post_autor;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>   
                
            <?php }      
                }?>
                  <hr>
            </div> 
            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php");?>

<?php include("includes/footer.php");?>