<?php 

if (isset($_POST['submit'])) {
    

    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $userrole = $_POST['userrole'];
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    $useremail = $_POST['useremail'];

    $userpassword = password_hash($userpassword,PASSWORD_BCRYPT,array('cost'=>12));
    /*$post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    move_uploaded_file($post_image_temp,"../images/$post_image");
    */
    


    $query = "insert into users(username,user_password,user_firstname,user_lastname,user_email,user_role) 
            values ('{$username}','{$userpassword}','{$userfirstname}','{$userlastname}','{$useremail}','{$userrole}')";
    $add_users = mysqli_query($connection,$query);

    if (!$add_users) {
        die("query failed".mysqli_error($connection));
    }

    echo "User Created :"." "."<a href='users.php'>View Users</a>";
    
} 

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="cat_title">First Name</label>
        <input type="text" name="userfirstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="cat_title">Last Name</label>
        <input type="text" name="userlastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="cat_title">Role</label><br>
        <select name="userrole">
            <option value='subscriber'>Select Option</option>
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cat_title">User Name</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="cat_title">Password</label>
        <input type="password" name="userpassword" class="form-control">
    </div>

    <div class="form-group">
        <label for="cat_title">Email</label>
        <input type="text" name="useremail" class="form-control">
    </div>

    <!--<div class="form-group">
        <label for="cat_title">Post Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>-->

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Add User">
    </div>

</form>