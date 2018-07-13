<?php 

            if (isset($_GET['u_id'])) {
                                $u_id = $_GET['u_id'];    
                                $query = "SELECT * FROM users where user_id={$u_id}";
                                    $select_all_users = mysqli_query($connection,$query);
                                    while ($row = mysqli_fetch_assoc($select_all_users)) {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_password = $row['user_password'];
           
                                    }
                if (isset($_POST['update']))
                 {
                            $userfirstname = $_POST['userfirstname'];
                            $userlastname = $_POST['userlastname'];
                            $userrole = $_POST['userrole'];
                            $username = $_POST['username'];
                            $userpassword = $_POST['userpassword'];
                            $useremail = $_POST['useremail'];

                            if (!empty($userpassword)) {
                                $querypass = "SELECT user_password  FROM users where user_id={$u_id}";
                                $selectpassword = mysqli_query($connection,$querypass);
                                $row = mysqli_fetch_array($selectpassword);
                                $db_password = $row["user_password"];

                                if ($db_password != $userpassword) {
                                    $hashpass = password_hash($userpassword,PASSWORD_BCRYPT,array('cost'=>12));
                                }

                                 $query = "update users set
                                  username = '{$username}' ,
                                  user_password = '{$hashpass}' ,
                                  user_firstname = '{$userfirstname}' ,
                                  user_lastname = '{$userlastname}',
                                  user_email = '{$useremail}' ,
                                  user_role = '{$userrole}' 
                                  WHERE user_id={$u_id}  ";
                                $update_user = mysqli_query($connection,$query);

                                    if (!$update_user) {
                                        die("query failed".mysqli_error($connection));
                                    }

                            }

                       
                 } 

             } else {
                header("Location: index.php");
             }



?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title">First Name</label>
        <input type="text" name="userfirstname" class="form-control" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="cat_title">Last Name</label>
        <input type="text" name="userlastname" class="form-control" value="<?php echo $user_lastname;?>">
    </div>

    <div class="form-group">
        <label for="cat_title">Role</label><br>
        <select name="userrole">
            <option value='<?php echo $user_role;?>'><?php echo $user_role;?></option>
            <?php 
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo "<option value='admin'>Admin</option>";
            }
            ?>
        </select>  
    </div>

    <div class="form-group">
        <label for="cat_title">User Name</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="cat_title">Password</label>
        <input type="password" name="userpassword" class="form-control" value="<?php echo $user_password; ?>">
    </div>

    <div class="form-group">
        <label for="cat_title">Email</label>
        <input type="text" name="useremail" class="form-control" value="<?php echo $user_email; ?>">
    </div>

    <!--<div class="form-group">
        <label for="cat_title">Post Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>-->

    <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary" value="Update User">
    </div>

</form>