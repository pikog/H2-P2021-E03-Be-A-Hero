<?
    session_start();
    include_once './src/User.php';
    if(isset($_SESSION['user']))
    {
        $user = new User($_SESSION['user']);
    }