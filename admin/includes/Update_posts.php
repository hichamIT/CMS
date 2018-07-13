<?php 

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];    
} 

                                $query = "SELECT * FROM posts where post_id={$p_id}";
                                    $select_all_posts = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                        $id = $row['post_id'];
                                        $Title = $row['post_title'];
                                        $user = $row['post_user'];
                                        $category = $row['post_category_id'];
                                        $status = $row['post_status'];
                                        $image = $row['post_image'];
                                        $tags = $row['post_tags'];
                                        $content = $row['post_content'];
                                        
                                    }
                if (isset($_POST['update']))
                 {
                        $post_title = escape($_POST['post_title']);
                        $post_user = escape($_POST['post_user']);
                        $id_post_cat = escape($_POST['id_post_cat']);
                        $post_status = escape($_POST['post_status']);


                        $post_image = $_FILES['post_image']['name'];
                        $post_image_temp = $_FILES['post_image']['tmp_name'];

                        $post_tags = escape($_POST['post_tags']);
                        $post_content = addslashes($_POST['post_content']);
                        $post_date = date('d-m-y');
                        $post_comm_count = 4;

                        move_uploaded_file($post_image_temp,"../images/$post_image");

                        if(empty($post_image)){

                            $query = "SELECT post_image FROM posts where post_id={$p_id}";
                                    $select_all_posts = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                        $post_image = $row['post_image']; 
                                    }

                        }


                        $query = "update posts set
                                  post_category_id = '{$id_post_cat}' ,
                                  post_title = '{$post_title}' ,
                                  post_user = '{$post_user}' ,
                                  post_date = now() ,
                                  post_image = '{$post_image}' ,
                                  post_content = '{$post_content}' ,
                                  post_tags = '{$post_tags}' ,
                                  post_comment_count = '{$post_comm_count}' ,
                                  post_status = '{$post_status}' WHERE post_id={$p_id}  ";
                        $update_posts = mysqli_query($connection,$query);

                        if (!$update_posts) {
                            die("query failed".mysqli_error($connection));
                        }

                        echo "<p class='bg-success'><a href='../post.php?idpost={$p_id}'>View Post</a>
                              OR<a href='posts.php'> Edit Posts</a></p>";
                 } 




?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title">Post Title</label>
        <input type="text" name="post_title" class="form-control" value="<?php echo $Title;  ?>">
    </div>

    <div class="form-group">
        <label for="cat_title">Category</label><br>
        <select name="id_post_cat" id="">
        
        <?php 
        
        $query = "SELECT * FROM categories";
        $select_all = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($select_all)) {
        $id = $row['cat_id'];
        $title = $row['cat_title'];
        if ($id == $category) {
             echo  "<option selected value='$id'>{$title}</option>";
        } else {
             echo  "<option value='$id'>{$title}</option>";
        }
        
         
        }
        
        ?>
        </select>
        
    </div>

     <div class="form-group">
        <label for="cat_title">Post User</label><br>
        <select name="post_user" id="">
        <option value='<?php echo $user;?>'><?php echo $user;?></option>
        <?php 
        
        $query = "SELECT * FROM users";
        $select_all = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($select_all)) {
        $iduser = $row['user_id'];
        $username = $row['username'];
          echo  "<option value='$username'>{$username}</option>";
        }
        
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="cat_title">Post Status</label><br>
        <select name="post_status">
            <option value='<?php echo $status;?>'><?php echo $status;?></option>
            <?php 
            if ($status == 'draft') {
                echo "<option value='published'>Published</option>";
            } else {
                echo "<option value='draft'>Draft</option>";
            }
            ?>
        </select>  
    </div>

    <div class="form-group">
        <label for="cat_title">Post Image</label><br>
        <img src="../images/<?php echo $image;?>" alt="" width=100>
        <br>
        <input type="file" name="post_image" id="">
    </div>

    <div class="form-group">
        <label for="cat_title">Post Tags</label>
        <input type="text" name="post_tags" class="form-control" value="<?php echo $tags;  ?>">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Content</label>
        <textarea name="post_content"  cols="30" rows="10" class="form-control" ><?php echo str_replace('\r\n','<br/>',$content);?> </textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary" value="Update">
    </div>

</form>