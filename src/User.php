<?
    include_once './src/config.php';
    include_once './src/DB.php';
    include_once './src/utils.php';

    class User
    {
        public $id;
        public $username;
        private $password;
        private $lastGeoloc;
        private $lastGeolocLat;
        private $lastGeolocLon;
        public $heroName;
        public $hero;
        public $level;
        public $xp;
        public $eventsSuccess;
        public $isAdmin;

        /**
         * Initialize an existing user with an username
         * @param int $id id of the user
         */
        public function __construct($id = null)
        {
            if(isset($id))
            {
                $this->id = $id;
                $this->getUserInfo();
            }      
        }

        /**
         * Create new user in database with username, password, email and firstNname
         * @param string $username username of the user
         * @param string $password password of the user
         * @param string $hero hero of the user
         * @param int $hero hero choose by the user
         */
        public function create($username, $password, $heroName, $hero)
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('INSERT INTO users (username, password, hero_name, hero) VALUES (:username, :password, :hero_name, :hero)');
            $req->bindValue(':username', $username);
            $req->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $req->bindValue(':hero_name', $heroName);
            $req->bindValue(':hero', $hero);
    
            $status = $req->execute();

            $this->id = $pdo->lastInsertId();

            return $status;
        }

        /**
         * Check if passwordToTry corresponding with the hash password save in database
         * @param string $passwordToTry password to try
         * @return boolean true if the password is good
         */
        public function checkPassword($passwordToTry)
        {
            return password_verify($passwordToTry, $this->password);
        }

        /**
         * Login user by creating his session
         */
        public function login()
        {
            session_start();
            $_SESSION['user'] = $this->id;
        }

        /**
         * Get user information from database
         */
        private function getUserInfo()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('SELECT * FROM users WHERE id = :id');
            $req->bindValue(':id', $this->id);
            $req->execute();

            $result = $req->fetch();

            $this->username = $result->username;
            $this->password = $result->password;
            $this->lastGeoloc = strtotime($result->last_geoloc);
            $this->lastGeolocLat = floatval($result->last_geoloc_lat);
            $this->lastGeolocLon = floatval($result->last_geoloc_lon);
            $this->heroName = $result->hero_name;
            $this->hero = intval($result->hero);
            $this->level = $result->level;
            $this->xp = $result->xp;
            $this->eventsSuccess = intval($result->events_success);
            $this->isAdmin = boolval($result->is_admin);
        }

        /**
         * Set last geolocation
         * @param float $lat latitude of the player
         * @param float $lon longitude of the player
         */
        public function setLastGeolocation($lat, $lon)
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('UPDATE users SET last_geoloc = NOW(), last_geoloc_lat = :lat, last_geoloc_lon = :lon WHERE id = :id');
            $req->bindValue(':lat', $lat);
            $req->bindValue(':lon', $lon);
            $req->bindValue(':id', $this->id);
            $req->execute();

            $result = $req->fetch();

            $this->lastGeoloc = time();
            $this->lastGeolocLat = $lat;
            $this->lastGeolocLon = $lon;
        }

        /**
         * Check if the play is cheating
         * @param float $lat latitude of the player
         * @param float $lon longitude of the player
         * @return boolean return true if the player cheat
         */
        public function checkCheat($lat, $lon)
        {
            $cheat = false;
            if($this->lastGeolocLat != 0 && $this->lastGeolocLon != 0)
            {
                $distance = distanceLatLon($lat, $lon, $this->lastGeolocLat, $this->lastGeolocLon);
                $time = (time() - $this->lastGeoloc) / 3600;
                $speed = $distance / $time;
                if($speed > 300)
                {
                    $cheat = true;
                }
            }
            return $cheat;
        }

        /**
         * Valid a mission
         * @param int xp when the mission is validated
         * @return boolean return true if the mission is validated
         */
        public function validMission($reward)
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();

            $oldLevel = $this->level;
            $this->addXp($reward);
            $levelUp = $this->level > $oldLevel;

            $req = $pdo->prepare('UPDATE users SET events_success = events_success + 1, level = :level, xp = :xp WHERE id = :id');
            $req->bindValue(':level', $this->level);
            $req->bindValue(':xp', $this->xp);
            $req->bindValue(':id', $this->id);
            $req->execute();

            $result = $req->fetch();

            return ['reward' => $reward, 'level' => $this->level, 'level_up' => $levelUp];
        }

        /**
         * Add xp to the user
         * @param int $xp xp to add
         */
        private function addXp($xp)
        {
            $this->xp += $xp;
            $xpToNext = calcXpToNext($this->level);
            while($this->xp > $xpToNext)
            {
                $this->xp -= $xpToNext;
                $this->level++;
                $xpToNext = calcXpToNext($this->level);
            }
        }
    }