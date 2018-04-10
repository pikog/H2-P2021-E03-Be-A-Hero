<?
    include_once './src/utils.php';

    function formRegister($post)
    {
        $messages = array(
            'success' => false,
            'errors' => [],
            'values' => []
        );

        if(!empty($post))
        {

            // Retrieve form data
            $username = trim($post['username']);
            $password = trim($post['password']);
            $passwordRetype = trim($post['password-retype']);
            $heroName = trim($post['hero-name']);
            if(isset($post['hero']))
            {
                $hero = intval($post['hero']);
            }

            //Test username
            $messages['values']['username'] = $username;
            if(empty($username))
            {
                $messages['errors']['username'] = 'Missing username';
                $messages['values']['username'] = '';
            }
            else if(!validUsername($username))
            {
                $messages['errors']['username'] = 'Username format invalid';
            }
            else if(existUsername($username))
            {
                $messages['errors']['username'] = 'Username already exist';
            }
            
            //Test password
            if(empty($password))
            {
                $messages['errors']['password'] = 'Missing password';
            }
            else if($password != $passwordRetype)
            {
                $messages['errors']['password'] = 'Different password';
            }

            if(empty($passwordRetype))
            {
                $messages['errors']['password-retype'] = 'Missing password';
            }
            else if($password != $passwordRetype)
            {
                $messages['errors']['password-retype'] = 'Different password';
            }

            //Test hero name
            $messages['values']['hero-name'] = $heroName;
            if(empty($heroName))
            {
                $messages['errors']['hero-name'] = 'Missing hero name';
                $messages['values']['hero-name'] = '';
            }

            //Test hero
            $messages['values']['hero'] = $hero;
            if(empty($hero))
            {
                $messages['errors']['hero'] = 'Invalid hero';
                $messages['values']['hero'] = 0;
            }

            // Success
            if(empty($messages['errors']))
            {
                $user = new User();
                if($user->create($username, $password, $heroName, $hero))
                {
                    $user->login();
                    $messages['success'] = true;
                }
            }
        }
        else
        {
            //Set empty value if no form sent
            $messages['values']['username'] = '';
            $messages['values']['hero-name'] = '';
            $messages['values']['hero'] = 0;
        }

        return $messages;
    }