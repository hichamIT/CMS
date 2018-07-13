<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php  include "includes/navigation.php"; ?>

    <?php 
    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        if (!empty($username) && !empty($email) && !empty($password)) {

            /*$query = "select randSalt from users";
            $select_salt_query = mysqli_query($connection,$query);
            if (!$select_salt_query) {
            die("query failed".mysqli_error($connection));
            }

            $row = mysqli_fetch_assoc($select_salt_query);
            $salt = $row['randSalt'];
            $password = crypt($password,$salt);*/

            $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

            $query = "insert into users(username,user_password,user_email,user_role) 
                      values ('{$username}','{$password}','{$email}','subscriber')";
            $add_users = mysqli_query($connection,$query);
            if (!$add_users) {
            die("query failed".mysqli_error($connection));
                  
            }
                $message='form ha been submited';
            } else {
                   $message = "Fields can not be empty";
            }
                 
            }else {
                    $message="";
            }
    
    
    ?>
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post"  autocomplete="off">
                        <h6 class="text-center"><?php  echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
