<?
    include_once './src/View.php';
    include_once './src/utils.php';
    include_once './src/loginSystem.php';

    if(isset($user))
    {
        header('Location: ./');
        exit;
    }
    else
    {
        include_once './src/form/formRegister.php';

        $messages = formRegister($_POST);

        if($messages['success'])
        {
            header('Location: ./');
            exit;
        }

        $data = [
            'messages' => $messages,
            'heroes' => getHeroes()
        ];
        echo new View('register', 'Register', $data);
    }

    
