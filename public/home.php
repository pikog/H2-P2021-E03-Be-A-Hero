<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';
    include_once './src/utils.php';

    /**
     * Home page
     * If a user is connect -> profil page
     * else -> Intro
     */

    if(isset($user))
    {
        $data = [
            'user' => get_object_vars($user),
            'xpToNext' => calcXpToNext($user->level)
        ];
        echo new View('home', 'Home', $data);
    }
    else
    {
        echo new View('intro', 'Introduction');
    }
