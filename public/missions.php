<?    
    include_once './src/View.php';
    include_once './src/utils.php';
    include_once './src/loginSystem.php';

    if(isset($user))
    {

        $data = [
            'user' => get_object_vars($user)
        ];
        echo new View('missions', 'Missions', $data);
    }
    else
    {
        header('Location: ./');
        exit;
    }