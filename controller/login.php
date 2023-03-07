<?php 
//$hashed_password = password_hash("zreonadmin", PASSWORD_DEFAULT);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    require_once '../config/connection.php';


    $result = $user->login($username, $password);

    if($result) {

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_type'] = $result['user_type'];
        $_SESSION['username'] = $result['username'];

        unset($_SESSION['invalid_credentials']);
        header("Location: ../admin/dashboard.php");


    }else {

        $_SESSION['username'] = $username;
        $_SESSION['invalid_credentials'] = 
            '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Login Failed </strong> Invalid username or password.
            </div>';
        header("Location:../login.php");
        
    }

}
