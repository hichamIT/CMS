<?php 

if (isset($_POST['submit'])) {
    

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_user = $_POST['post_user'];
    $id_post_cat = $_POST['id_post_cat'];
    $post_status = $_POST['post_status'];


    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = addslashes($_POST['post_content']);
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp,"../images/$post_image");


    $query = "insert into posts(post_category_id,post_title,post_autor,post_user,post_date,post_image,post_content,post_tags,post_status) 
            values ({$id_post_cat},'{$post_title}','{$post_author}','{$post_user}', now() ,'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $add_posts = mysqli_query($connection,$query);

    if (!$add_posts) {
        die("query failed".mysqli_error($connection));
    }
    $p_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'><a href='../post.php?idpost={$p_id}'>View Post</a>
            OR<a href='posts.php'> Edit Posts</a></p>";
    
} 

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="cat_title">Id Category</label><br>
        <select name="id_post_cat" id="">
        
        <?php 
        
        $query = "SELECT * FROM categories";
        $select_all = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($select_all)) {
        $id = $row['cat_id'];
        $title = $row['cat_title'];
          echo  "<option value='$id'>{$title}</option>";
        }
        
        ?>
        </select>
        
    </div>

    <div class="form-group">
        <label for="cat_title">Post User</label><br>
        <select name="post_user" id="">
        
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
            <option value='draft'>Select Option</option>
            <option value='draft'>Draft</option>
            <option value='published'>Publish</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cat_title">Post Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>


    <div class="form-group">
        <label for="cat_title">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Content</label>
        <textarea name="post_content"  cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Add">
    </div>

</form>