<?php 
//$hashed_password = password_hash("zreonadmin", PASSWORD_DEFAULT);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    require_once '../config/connection.php';


    if(!$emailInfo = $user->checkEmail($username)) {
        $_SESSION['username'] = $username;
        $_SESSION['invalid_credentials'] = 
            '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Login Failed </strong> Invalid username or password.
            </div>';
        header("Location:../login.php");
    }else {
        $user_pass =  $emailInfo['password'];

        $verify = password_verify($password, $user_pass);

        if($verify == true) {

            $_SESSION['user_id'] = $emailInfo['id'];
            $_SESSION['user_type'] = $emailInfo['user_type'];
            $_SESSION['username'] = $emailInfo['username'];

            unset($_SESSION['invalid_credentials']);
            header("Location: ../admin/dashboard.php");
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['invalid_credentials'] = 
                '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Login Failed </strong> Invalid username or password.
                </div>';
            header("Location:../login.php");
        }
    }
}
