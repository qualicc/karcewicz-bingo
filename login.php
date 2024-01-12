<?php
session_start();

if(!empty($_POST['password']) &&
!empty($_POST['submit']))
{
    $password = '$2y$10$UJ6HWtLKrpdU3fdhQDz5/.uqThytSd3HlSEX9MdjxBKa4zc7VNLy6';
    if (password_verify($_POST['password'], $password)) {
        $_SESSION['ADMIN'] = true;
        header('Location: lista.php');
    }
    
}
print_r($_POST);
$_SESSION['message'] = array(
    'type' => "fail",
    'text' => "Błędne dane"
);
header('Location: admin.php');
?>