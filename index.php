<?
/**
 * Router
 */
if(isset($_GET['q']))
{
    if($_GET['q'] == 'home')
    {
        $page = 'home';
    }
    else if($_GET['q'] == 'login')
    {
        $page = 'login';
    }
    else if($_GET['q'] == 'logout')
    {
        $page = 'logout';
    }
    else if($_GET['q'] == 'register')
    {
        $page = 'register';
    }
    else if($_GET['q'] == 'missions')
    {
        $page = 'missions';
    }
    else if($_GET['q'] == 'events')
    {
        $page = 'events';
    }
    else if($_GET['q'] == 'check-mission')
    {
        $page = 'check-mission';
    }
    else if($_GET['q'] == 'generate-events')
    {
        $page = 'generate-events';
    }
    else
    {
        $page = '404';
    }
}
else
{
    $page = 'home';
}

include './public/' . $page . '.php';