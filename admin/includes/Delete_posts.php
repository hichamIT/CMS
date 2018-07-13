<?php

         $post_delete = $_GET['delete'];
         $query = "DELETE FROM posts WHERE post_id = {$post_delete} ";
         $delet_query = mysqli_query($connection,$query);
        header("Location: posts.php");
                                
