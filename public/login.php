<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';

    if(isset($user))
    {
        header('Location: ./');
        exit;
    }
    else
    {
        include_once './src/form/formLogin.php';

        $messages = formLogin($_POST);
    
        if($messages['success'])
        {
            header('Location: ./');
            exit;
        }

        $data = [
            'messages' => $messages
        ];
        echo new View('login', 'Login', $data);
    }