<?php include("includes/admin_header.php");?>
<?php include("includes/admin_navigation.php");?>
<?php 
                                 
                        if (isset($_SESSION['username'])) {
                                    $query = "SELECT * FROM users where username='{$_SESSION['username']}'";
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
                            }
                                    
                        if (isset($_POST['update']))
                 {
                            $userfirstname = $_POST['userfirstname'];
                            $userlastname = $_POST['userlastname'];
                            $userrole = $_POST['userrole'];
                            $username = $_POST['username'];
                            $userpassword = $_POST['userpassword'];
                            $useremail = $_POST['useremail'];

                        $query = "update users set
                                  username = '{$username}' ,
                                  user_firstname = '{$userfirstname}' ,
                                  user_lastname = '{$userlastname}',
                                  user_email = '{$useremail}' ,
                                  user_role = '{$userrole}' 
                                  WHERE username='{$_SESSION['username']}'  ";
                        $update_user = mysqli_query($connection,$query);

                        if (!$update_user) {
                            die("query failed".mysqli_error($connection));
                        }
                 } 

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Profile
                    <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
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
            <option value='subscriber'><?php echo $user_role;?></option>
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
        <input type="submit" name="update" class="btn btn-primary" value="Update Profile">
    </div>

</form>  
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include("includes/admin_footer.php");?>