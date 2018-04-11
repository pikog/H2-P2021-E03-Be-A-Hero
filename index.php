<?
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
    else if($_GET['q'] == 'test')
    {
        $page = 'test';
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