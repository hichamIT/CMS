<?php 
include("modal.php");
if (isset($_POST['checkboxarray'])) {
    foreach ($_POST['checkboxarray'] as $valueid) {
        $option =$_POST['bulkoption'];
        switch ($option) {
            case 'published':
                $query = "update posts set post_status = '{$option}' WHERE post_id = {$valueid} ";
                $update_query = mysqli_query($connection,$query);
                if (!$update_query) {
                            die("query failed".mysqli_error($connection));
                        }
                break;
            case 'draft':
                $query = "update posts set post_status = '{$option}' WHERE post_id = {$valueid} ";
                $update_query = mysqli_query($connection,$query);
                break;  
            case 'delete':
                $query = "DELETE FROM posts  WHERE post_id = {$valueid} ";
                $delete_query = mysqli_query($connection,$query);
                break;
            case 'clone':
                $query = "SELECT * FROM posts where post_id = {$valueid} ";
                                    $select_all_posts = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                        $Title = $row['post_title'];
                                        $Author = $row['post_autor'];
                                        $category = $row['post_category_id'];
                                        $status = $row['post_status'];
                                        $image = $row['post_image'];
                                        $tags = $row['post_tags'];
                                        $content = addslashes($row['post_content']);

                                    }
            $query = "insert into posts(post_category_id,post_title,post_autor,	post_date,post_image,post_content,post_tags,post_status) 
            values ({$category},'{$Title}','{$Author}', now() ,'{$image}','{$content}','{$tags}','{$status}')";
                   $add_posts = mysqli_query($connection,$query);

            if (!$add_posts) {
                die("query failed".mysqli_error($connection));
            }
               
            break;          
        }
    }
}


?>
<form action="" method="post">
<div class="col-xs-4"> 
    <select name="bulkoption" id="bulkcontaineroption"  class="form-control">
        <option value="">Select Option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
    </select>
</div>

<div class="col-xs-4"> 
    <input type="submit" value="Apply" name="submit" class="btn btn-success">
    <a href="posts.php?source=add" class="btn btn-primary">Add New</a>
 </div>

<table class="table table-bordered table-hover">

                                <thead>
                                    <th><input type="checkbox" name="" id="selectallbox"></th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>category</th>
                                    <th>status</th>
                                    <th>image</th>
                                    <th>tags</th>
                                    <th>comment</th>
                                    <th>date</th>
                                    <th>viewrs</th>
                                </thead>
                                <tbody>
                                
                                 <?php 
                                 
                                   

            $query = "SELECT posts.post_id,posts.post_title,posts.post_user,posts.post_autor,posts.post_category_id,posts.post_status,posts.post_image, ";
            $query.="posts.post_tags,posts.post_comment_count,posts.post_date,posts.count_view_post,categories.cat_id,categories.cat_title ";
            $query.="FROM posts ";
             $query.="LEFT join categories on posts.post_category_id = categories.cat_id  order by posts.post_id desc";

                                    $select_all_posts = mysqli_query($connection,$query);
                                    if (!$select_all_posts) {
                                        echo "query failed".mysqli_error($connection);
                                    }
                                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                        $id = $row['post_id'];
                                        $Title = $row['post_title'];
                                        $User = $row['post_user'];
                                        $Author = $row['post_autor'];
                                        $category = $row['post_category_id'];
                                        $status = $row['post_status'];
                                        $image = $row['post_image'];
                                        $tags = $row['post_tags'];
                                        $comment = $row['post_comment_count'];
                                        $date = $row['post_date'];
                                        $viewers = $row['count_view_post'];
                                        $title_cat = $row['cat_title'];


                                        $querycomments = "SELECT * FROM comments where comment_post_id = {$id}";
                                        $selcomments = mysqli_query($connection,$querycomments);
                                        $row = mysqli_fetch_array($selcomments);
                                        $commentid = $row['comment_id'];
                                        $cuntcomment = mysqli_num_rows($selcomments);      
                                        echo" <tr>
                                    <td><input type='checkbox' name='checkboxarray[]' class='checkboxes' value='{$id}'></td>
                                    <td>{$id}</td>
                                    <td>{$Title}</td>";

                                    if (!empty($User)) {
                                        echo "<td>{$User}</td>";
                                    }elseif (!empty($Author)) {
                                        echo "<td>{$Author}</td>";
                                    }
                                    
                                    /*<td><a onClick=\"javascript: return confirm('are you sure to delete');\"href='posts.php?delete={$id}'>Delete</a></td>*/

                                   echo "<td>{$title_cat}</td>
                                    <td>{$status}</td>
                                    <td><img src='../images/{$image}' alt='image' width='100'></td>
                                    <td>{$tags}</td>
                                    <td><a href='post_comments.php?id=$id'>{$cuntcomment}</a></td>
                                    <td>{$date}</td>
                                    <th><a href='./posts.php?reset={$id}'>{$viewers}</a></th>
                                    <td><a href='../post.php?idpost={$id}'>View Post</a></td>
                                    <td><a rel='{$id}' class='delete_link' href='javascript:void(0)'>Delete</a></td>
                                    <td><a href='posts.php?source=update&p_id={$id}'>Edit</a></td>
                                    </tr>";
                                    }
                                 
                                 if(isset($_GET['delete'])){
                                        include "includes/Delete_posts.php";
                                    }

                                if(isset($_GET['reset'])){
                                        $query = "update posts set count_view_post = 0 where post_id =".mysqli_real_escape_string($connection,$_GET['reset']." ");
                                        $update_posts = mysqli_query($connection,$query);
                                        header("Location: posts.php");
                                    }
                                 ?>
                                                                                                    
                               <script>
                               
                               $(document).ready(function(){
    
                                $(".delete_link").on('click',function(){

                                    var id  = $(this).attr('rel');
                                    
                                    var deleturl = "posts.php?delete="+ id +" ";

                                    $(".modal_delete").attr("href",deleturl);
                                    
                                    $("#myModal").modal("show");
                                });
    

                                });
                               
                               </script>
                            
                                </tbody>
                            </table>
</form>