<?
    include_once './src/View.php';
    include_once './src/utils.php';
    include_once './src/loginSystem.php';

    /**
     * Register page
     */

    /**
     * Redirect if a usrr is already connected
     */
    if(isset($user))
    {
        header('Location: ./');
        exit;
    }
    else
    {
        include_once './src/form/formRegister.php';

        /**
         * Pass POST value to the form handler
         */
        $messages = formRegister($_POST);

        if($messages['success'])
        {
            header('Location: ./');
            exit;
        }

        /**
         * Pass return value of the form and list of heroes
         */
        $data = [
            'messages' => $messages,
            'heroes' => getHeroes()
        ];
        echo new View('register', 'Register', $data);
    }

    
