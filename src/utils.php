<? 
    include_once './src/DB.php';

    //Utils fonctions

    /**
     * Return true if username is valid
     */
    function validUsername($username)
    {
        return ctype_alnum(str_replace(['_', '-'], '', $username));
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
    function eventsNearby($lat, $lon, $level, $radius)
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare("SELECT id, name, address, heading, type, lat, lon, description, level, reward, (6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lon) - radians($lon)) + sin( radians($lat)) * sin(radians(lat)))) AS distance FROM events HAVING distance < :max_distance AND level <= :level ORDER BY distance LIMIT 0, 20;");
        $req->bindValue(':max_distance', $radius);
        $req->bindValue(':level', $level);
        $req->execute();
        $results = $req->fetchAll();

        return $results;
    }

    function distanceLatLon($lat1, $lon1, $lat2, $lon2) {
        $calc = (6371 * acos(cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon2) - deg2rad($lon1)) + sin( deg2rad($lat1)) * sin(deg2rad($lat2))));
        return $calc;
    }

    function calcXpToNext($level)
    {
        return 100*($level+1);
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

    function resetGeophoto()
    {
        $folder = 'cache/geophotos/';
        $basePath = './';

        $files = glob($basePath . $folder . '*');
        foreach($files as $file)
        {
            if(is_file($file))
            {
                unlink($file);
            }
        }
    }
