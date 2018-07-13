<?php 

function insert_categories(){
    global $connection;
    if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    if ($cat_title == "" || empty($cat_title)) {
        echo "title should not be empty";
    } else {

        $stm1 = mysqli_prepare($connection,"INSERT INTO categories (cat_title) VALUE (?)");
        mysqli_stmt_bind_param($stm1,'s',$cat_title);
         mysqli_stmt_execute($stm1);
        //$query ="INSERT INTO categories (cat_title) VALUE ('{$cat_title}')";
        //$create_cat = mysqli_query($connection,$query);
        if (!$stm1) {
            die("insert failed".mysqli_error($connection));
        }    
        mysqli_stmt_close($stm1);                      
    }                               
}  
}


function view_categories(){
    global $connection;
     $query = "SELECT * FROM categories";
     $select_all = mysqli_query($connection,$query);
     while ($row = mysqli_fetch_assoc($select_all)) {
     $id = $row['cat_id'];
     $title = $row['cat_title'];
     echo" <tr>
    <td>{$id}</td>
    <td>{$title}</td>
    <td><a href='categories.php?delete={$id}'>Delete</a></td>
    <td><a href='categories.php?update={$id}'>Edit</a></td>
    </tr>";
    }
    
}


function delete_categories(){
    global $connection;
     if (isset($_GET['delete'])) {
         $cat_id = $_GET['delete'];
         $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
        $delet_query = mysqli_query($connection,$query);
        header("Location: categories.php");
                                }
}


function users_onligne(){

    if (isset($_GET['online'])) {
    
     global $connection;
     
        if (!$connection) {

            session_start();
            include("../includes/db.php");
            $session = session_id();
            $time = time();
            $time_out_second = 05;
            $time_out = $time - $time_out_second;

            $query = "select * from user_online where session = '$session'";
            $sendquery = mysqli_query($connection,$query);
            $count = mysqli_num_rows($sendquery);

            if ($count == null) {
                mysqli_query($connection,"insert into user_online(session , time) values ('$session','$time')");
            } else {
            mysqli_query($connection,"update user_online set time = '$time' where session = '$session'");
            }

            $user_online = mysqli_query($connection,"select * from user_online where time > '$time_out'");
            echo mysqli_num_rows($user_online);
        }
        
    }
}
users_onligne();

function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
}

function recordcount($table){
    global $connection;
     $query = "SELECT * FROM ".$table;
     $selectcunt = mysqli_query($connection,$query);
    
     return mysqli_num_rows($selectcunt);
}

function checkStatus($table,$column,$status){
    global $connection;
     $query = "SELECT * FROM $table where $column = '$status'";
     $selectstatus = mysqli_query($connection,$query);
    
     return mysqli_num_rows($selectstatus);

}


function is_admin($username = ''){
    global $connection;
     $query = "SELECT user_role FROM users where username = '$username'";
     $selectuser = mysqli_query($connection,$query);
     
     $row = mysqli_fetch_assoc($selectuser);
     
     if ($row['user_role'] == 'admin') {
         return true;
     } else {
         return false;
     }
     

}

function user_exist($username){
    global $connection;
     $query = "SELECT username FROM users where username = '$username'";
     $selectuser = mysqli_query($connection,$query);
 
     
     if (mysqli_num_rows($selectuser) > 0) {
         return true;
     } else {
         return false;
     }
     

}
