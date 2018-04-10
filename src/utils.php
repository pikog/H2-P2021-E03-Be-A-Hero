<? 
    include_once './src/DB.php';

    //Utils fonctions

    /**
     * Return true if email is valid
     */
    function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Return true if username is valid
     */
    function validUsername($username)
    {
        return ctype_alnum(str_replace(['_', '-'], '', $username));
    }

    /**
     * Return true if email already exist in database
     */
    function existEmail($email)
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $req->bindValue(':email', $email);
        $req->execute();

        return !empty($req->fetch());
    }

    /**
     * Test if an username exist in database
     * @param string username username to test
     * @return int id of user 
     */
    function existUsername($username)
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare('SELECT id FROM users WHERE username = :username');
        $req->bindValue(':username', $username);
        $req->execute();
        $result = $req->fetch();

        return isset($result) ? $result->id : null;
    }