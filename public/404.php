<?
    include_once './src/View.php';

    header('refresh:5;url=./');

    echo new View('404', 'Page not found');
