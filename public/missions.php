<?    
    include_once './src/View.php';
    include_once './src/utils.php';
    include_once './src/loginSystem.php';

    /**
     * Mission page
     */

    if(isset($user))
    {
        /**
         * pass user data to the view
         */
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