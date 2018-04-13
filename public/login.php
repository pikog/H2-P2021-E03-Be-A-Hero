<?
    include_once './src/View.php';
    include_once './src/loginSystem.php';

    /**
     * Login page
     */

    /**
     * if a user is connected -> redirection to home page
     */
    if(isset($user))
    {
        header('Location: ./');
        exit;
    }
    else
    {
        include_once './src/form/formLogin.php';

        /**
         * Send POST value to orm handler
         */
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