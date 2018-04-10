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
        return !empty($result) ? $result->id : null;
    }

    /**
     * Search events nearby
     */
    function eventsNearby($lat, $lon, $level)
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare("SELECT id, lat, lon, reward, level_required, (6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lon) - radians($lon)) + sin( radians($lat)) * sin(radians(lat)))) AS distance FROM events HAVING distance < :max_distance AND level_required <= :level_required ORDER BY distance LIMIT 0, 20;");
        $req->bindValue(':max_distance', 20);
        $req->bindValue(':level_required', $level);
        $req->execute();
        $results = $req->fetchAll();

        return $results;
    }

    function calcXpToNext($level)
    {
        return 100 * pow(2, $level);
    }

    function getHeroes()
    {
        $result = [];
        $path = './assets/images/heroes/';
        foreach (scandir($path) as $file)
        {
            if(is_file($path . $file))
            {
                $result[] = (pathinfo($file))['filename'];
            }
        }
        return $result;
    }
