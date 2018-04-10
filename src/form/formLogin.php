<?
    include_once './src/utils.php';

    function formLogin($post)
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
            
            //Test password
            if(empty($password))
            {
                $messages['errors']['password'] = 'Missing password';
            }

            // Success
            if(empty($messages['errors']))
            {
                $id = existUsername($username);
                if(isset($id))
                {
                    $user = new User($id);
                    if($user->checkPassword($password))
                    {
                        $user->login();
                        $messages['success'] = true;
                    }
                    else
                    {
                        $messages['errors']['username'] = 'Invalid username or password';
                        $messages['errors']['password'] = 'Invalid username or password';
                    }
                }
                else
                {
                    $messages['errors']['username'] = 'Invalid username or password';
                    $messages['errors']['password'] = 'Invalid username or password';
                }
            }
        }
        else
        {
            //Set empty value if no form sent
            $messages['values']['username'] = '';
        }

        return $messages;
    }