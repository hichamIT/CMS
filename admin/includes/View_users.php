<table class="table table-bordered table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </thead>
                                <tbody>
                                
                                 <?php 
                                 
                                   

                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_users)) {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        
                                   
                                        echo" <tr>
                                    <td>{$user_id}</td>
                                    <td>{$username}</td>
                                    <td>{$user_firstname}</td>
                                    <td>{$user_lastname}</td>
                                    <td>{$user_email}</td>
                                    <td>{$user_role}</td>
                                    <td><a href='users.php?admin={$user_id}'>Admin</a></td>
                                    <td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>
                                    <td><a href='users.php?source=update&u_id={$user_id}'>Edit</a></td>
                                    <td><a href='users.php?delete={$user_id}'>Delete</a></td>
                                    </tr>";
                                    }
                                    
                                    if(isset($_GET['delete'])){
                                        include "includes/delete_users.php";
                                    }
                                    if(isset($_GET['subscriber'])){
                                        $sub = $_GET['subscriber'];
                                        $query = "update users set user_role = 'subscriber' WHERE user_id = {$sub} ";
                                        $delet_query = mysqli_query($connection,$query);
                                        header("Location: users.php");
                                    }

                                if(isset($_GET['admin'])){
                                        $adm = $_GET['admin'];
                                        $query = "update users set user_role = 'admin' WHERE user_id = {$adm} ";
                                        $delet_query = mysqli_query($connection,$query);
                                        header("Location: users.php");
                                    }
                                 ?>
                                                                                                    
                               
                            
                                </tbody>
                            </table>