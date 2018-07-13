<table class="table table-bordered table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                </thead>
                                <tbody>
                                
                                 <?php 
                                 
                                   

                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_comments)) {
                                        $id = $row['comment_id'];
                                        $Author = $row['comment_author'];
                                        $email = $row['comment_email'];
                                        $content = $row['comment_content'];
                                        $status = $row['comment_status'];
                                        $date = $row['comment_date'];
                                        $id_post = $row['comment_post_id'];
                                        

                                        $query_post = "SELECT * FROM posts WHERE post_id = {$id_post} ";
                                           $select_all_posts = mysqli_query($connection,$query_post);
                                            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                            $title_post = $row['post_title'];
                                            $id_post_com = $row['post_id'];}

                                   
                                        echo" <tr>
                                    <td>{$id}</td>
                                    <td>{$Author}</td>
                                    <td>{$content}</td>
                                    <td>{$email}</td>
                                    <td>{$status}</td>
                                    <td><a href='../post.php?idpost={$id_post_com}'>{$title_post}</a></td>
                                    <td>{$date}</td>
                                    <td><a href='comments.php?approve={$id}'>Approve</a></td>
                                    <td><a href='comments.php?unapprove={$id}'>Unapprove</a></td>
                                    <td><a href='comments.php?delete={$id}'>Delete</a></td>
                                    </tr>";
                                    }
                                 
                                 if(isset($_GET['delete'])){
                                        include "includes/Delete_comments.php";
                                    }

                                if(isset($_GET['approve'])){
                                        $approve = $_GET['approve'];
                                        $query = "update comments set comment_status = 'approved' WHERE comment_id = {$approve} ";
                                        $delet_query = mysqli_query($connection,$query);
                                        header("Location: comments.php");
                                    }

                                if(isset($_GET['unapprove'])){
                                        $unapprove = $_GET['unapprove'];
                                        $query = "update comments set comment_status = 'unapproved' WHERE comment_id = {$unapprove} ";
                                        $delet_query = mysqli_query($connection,$query);
                                        header("Location: comments.php");
                                    }
                                 ?>
                                                                                                    
                               
                            
                                </tbody>
                            </table>