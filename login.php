<?php
session_start();

if(!empty($_POST['password']) &&
!empty($_POST['submit']))
{
    echo "1";
    $password = '$2y$10$xsuntEwgUHkC5F6bSJ95K.If7sDbISUoNDnoo3YEt5hZbW4sKwFl.';
    if (password_verify($_POST['password'], $password)) {
        echo "2";
        $_SESSION['ADMIN'] = true;
        header('Location: /lista.php');
    }
    
}
else{
    print_r($_POST);
    $_SESSION['message'] = array(
        'type' => "fail",
        'text' => "Błędne dane"
    );
    header('Location: /admin.php');
}
echo "3";

$_SESSION['message'] = array(
    'type' => "fail",
    'text' => "Błędne dane"
);
header('Location: /admin.php');
?>