<?php include("db.php"); 
    session_start();

if (isset($_POST['login'])) {
   
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);

$query = "select * from users where username = '{$username}'";
$select_user = mysqli_query($connection,$query);

if (!$select_user) {
    die("query failed".mysqli_error($connection));
}
while ($row = mysqli_fetch_array($select_user)) {
    $db_id = $row['user_id'];
    $db_username= $row['username'];
    $db_password= $row['user_password'];
    $db_firstname = $row['user_firstname'];
    $db_lastname = $row['user_lastname'];
    $db_role = $row['user_role'];
}
//$password = crypt($password,$db_password);
//$username == $db_username && $password == $db_password
if (password_verify($password,$db_password)) {

    $_SESSION['username'] = $db_username;
    $_SESSION['role'] = $db_role;
    $_SESSION['firstname'] = $db_firstname;
    $_SESSION['lastname'] = $db_lastname;

   header("Location: ../admin");

} else {

    header("Location: ../index.php");
}


}









?>