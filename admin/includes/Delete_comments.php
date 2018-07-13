<?php

         $comments_delete = $_GET['delete'];
         $query = "DELETE FROM comments WHERE comment_id = {$comments_delete} ";
        $delet_query = mysqli_query($connection,$query);
        header("Location: comments.php");
                                
