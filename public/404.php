<?
    /**
     *  404 page controller
     */

    include_once './src/View.php';

    /**
     *  Redirection on home page in 5seconds
     */
    header('refresh:5;url=./');

    echo new View('404', 'Page not found');
