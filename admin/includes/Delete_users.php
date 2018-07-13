<?php


        if(isset($_SESSION['role'])){
               
                if ($_SESSION['role'] == 'admin') {
                        
                        $post_delete = mysqli_real_escape_string($connection,$_GET['delete']);
                        $query = "DELETE FROM users WHERE user_id = {$user_id} ";
                        $delet_query = mysqli_query($connection,$query);
                        header("Location: users.php");
                }


        }
        
                                
