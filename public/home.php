<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';
    include_once './src/utils.php';

    if(isset($user))
    {
        $data = [
            'user' => get_object_vars($user),
            'xpToNext' => calcXpToNext($user->level),
            'numberEventsSuccess' => count($user->eventsSuccess)
        ];
        echo new View('home', 'Home', $data);
    }
    else
    {
        echo new View('intro', 'Introduction');
    }