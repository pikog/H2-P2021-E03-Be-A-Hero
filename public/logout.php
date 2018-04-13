<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';

    /**
     * Logout page
     */

    /**
     * Destroy the session and redirect to homepage in 5seconds
     */

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
