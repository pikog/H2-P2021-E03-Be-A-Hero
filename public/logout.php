<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';

    if(isset($user))
    {
        session_destroy();
        header("Refresh: 5; url=./");
        echo new View('logout', 'Logout');
    }
    else
    {
        header('Location: ./');
        exit;
    }
