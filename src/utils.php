<? 
    include_once './src/DB.php';

    /**
     * Utils functions
     */

    /**
     * Check if the username format is valid
     * @param string $username username
     * @return boolean true if the username format is correct
     */
    function validUsername($username)
    {
        return ctype_alnum(str_replace(['_', '-'], '', $username));
    }

    /**
     * Test if an username exist in database
     * @param string $username username to test
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
     * Search events near a player
     * @param float $lat latitude
     * @param float $lon longitude
     * @param int $level max level required
     * @param int $radius radius of the event around the player
     * @return array array of events
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


    /**
     * Calc distance between two coordinates
     * @param float $lat1 latitude group 1
     * @param float $lon1 longitude group 1
     * @param float $lat2 latitude group 2
     * @param float $lon2 longitude group 2
     * @return int distance in km
     */
    function distanceLatLon($lat1, $lon1, $lat2, $lon2) {
        $calc = (6371 * acos(cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon2) - deg2rad($lon1)) + sin( deg2rad($lat1)) * sin(deg2rad($lat2))));
        return $calc;
    }

    /**
     * Calc xp required to the next level
     * @param int $level level to calc
     * @return int xp required
     */
    function calcXpToNext($level)
    {
        return 100*($level+1);
    }


    /**
     * List all heroes availables
     * @return array array of heroes id
     */
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

    /**
     * Reset cache geophoto
     */
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
