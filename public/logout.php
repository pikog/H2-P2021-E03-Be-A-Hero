<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';

    if(isset($user))
    {
        unset($_SESSION['user']);
        header("Refresh: 5; url=./");
        echo new View('logout', 'Logout');
    }
    else
    {
        header('Location: ./');
        exit;
    }