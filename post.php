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
                if (isset($_GET['idpost'])) {
                    $id = $_GET['idpost'];
                }
               
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                     $query = "SELECT * FROM posts WHERE post_id = $id ";
                } else {
                     $query = "SELECT * FROM posts WHERE post_id = $id and post_status = 'published'";
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
                    $post_content = $row['post_content'];
                    $post_viewrs = $row['count_view_post'];

                    $query = "update posts set count_view_post = count_view_post + 1 where post_id = {$post_id}";
                    $update_posts = mysqli_query($connection,$query);
                    
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
                    by <a href="index.php"><?php echo $post_user;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="/cms/images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>   
                
            <?php } ?>

                <hr>

                 <!-- Blog Comments -->

                    <?php 
                    
                    if (isset($_POST['submit'])) {
                        $post_id = $_GET['idpost'];
                        $author = $_POST['comment_author'];
                        $email =  $_POST['comment_email'];
                        $content = $_POST['comment_content'];

                        if (!empty($author) && !empty($email) && !empty($content)) {
                           $query ="insert into comments(comment_post_id,comment_author,comment_email,comment_content,
                                comment_status,comment_date) 
                                values($post_id,'{$author}','{$email}','{$content}', 'unapproved', now() )";

                        $create_query = mysqli_query($connection,$query);
                        if (!$create_query) {
                            die('query failed'.mysqli_error($connection));
                        }

                        //$query = "update posts set post_comment_count = post_comment_count + 1 where post_id = {$post_id}";
                        //$update_posts = mysqli_query($connection,$query);
                        
                        } else {
                           echo "<script>alert('Field can not be empty')</script>";
                        }
                        

                        
                    } 
                }
                    ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                             <?php 
                                   $query = "SELECT * FROM comments where comment_post_id = {$post_id} 
                                             and comment_status = 'approved'
                                             order by comment_id desc";
                                    $select_all_comments = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_comments)) {
                                        $Author = $row['comment_author'];
                                        $content = $row['comment_content'];
                                        $date = $row['comment_date'];
                                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $Author; ?> 
                            <small><?php echo $date; ?> </small>
                        </h4>
                        <?php echo $content; ?> 

                    </div>
                </div>
                        <?php } ?>  
            </div>


                <?php include("includes/sidebar.php");?>

<?php include("includes/footer.php");?>