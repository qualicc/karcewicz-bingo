<?php
session_start();
$location;
if(!empty($_POST['password']) &&
!empty($_POST['submit']))
{
    $password = '$2y$10$1MiZbemfWGX.a.qgGFMgEO2Kmea05KGVJ3z4q.d/cW8IrdsRgm1He';
    if (password_verify($_POST['password'], $password)) {
        $_SESSION['ADMIN'] = true;
        $location = "lista.php";
        unset($_SESSION['message']);
    }
    
}
else
{
    print_r($_POST);
    $_SESSION['message'] = array(
        'type' => "fail",
        'text' => "Błędne dane"
    );
    $location = "admin.php";
}

$_SESSION['message'] = array(
    'type' => "fail",
    'text' => "Błędne dane"
);
header('Location: /' . $location);
?>