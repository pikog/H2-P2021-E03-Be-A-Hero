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
         */
        public function create($username, $password, $heroName, $hero)
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('INSERT INTO users (username, password, hero_name, hero, events_success) VALUES (:username, :password, :hero_name, :hero, :events_success)');
            $req->bindValue(':username', $username);
            $req->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $req->bindValue(':hero_name', $heroName);
            $req->bindValue(':hero', $hero);
            $req->bindValue(':events_success', '[]');
    
            $status = $req->execute();

            $this->id = $pdo->lastInsertId();

            return $status;
        }

        /**
         * Check if passwordToTry corresponding with the hash password save in database
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
            $this->eventsSuccess = $result->events_success;
            $this->isAdmin = boolval($result->is_admin);
        }

        /**
         * Update user information
         */
        public function updateUserInfo($data)
        {
            $columns = [];

            foreach($data as $key => $value) {

                if($key === 'cities' || $key === 'daily_alert_cities')
                {
                    $value = json_encode($value);
                }

                $columns[] = $key . ' = \'' . $value . '\'';
            }
            
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('UPDATE users SET '. implode(", ", $columns) .' WHERE username = :username');
            $req->bindValue(':username', $this->username);
            $req->execute();
            
            if(isset($data['first_name']))
            {
                $this->firstName = $data['first_name'];
            }
            if(isset($data['password_hash']))
            {
                $this->passwordHash = $data['password_hash'];
            }
            if(isset($data['email']))
            {
                $this->email = $data['email'];
            }
            if(isset($data['cities']))
            {
                $this->cities = $data['cities'];
            }
            if(isset($data['daily_alert']))
            {
                $this->dailyAlert = $data['daily_alert'];
            }
            if(isset($data['daily_alert_hour']))
            {
                $this->dailyAlertHour = $data['daily_alert_hour'];
            }
            if(isset($data['daily_alert_cities']))
            {
                $this->dailyAlertCities = $data['daily_alert_cities'];
            }
        }

        /**
         * Link a city with the user
         */
        public function addCity($cityId)
        {
            if(array_search($cityId, $this->cities) === false)
            {
                $this->cities[] = $cityId;
            }

            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('UPDATE users SET cities = :cities WHERE username = :username');
            $req->bindValue(':username', $this->username);
            $req->bindValue(':cities', json_encode($this->cities));
    
            $req->execute();
        }

        /**
         * Remove a city from this user
         */
        public function removeCity($cityId)
        {
            array_splice($this->cities, array_search($cityId, $this->cities), 1);
            array_splice($this->dailyAlertCities, array_search($cityId, $this->dailyAlertCities), 1);

            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('UPDATE users SET cities = :cities, daily_alert_cities = :daily_alert_cities WHERE username = :username');
            $req->bindValue(':username', $this->username);
            $req->bindValue(':cities', json_encode($this->cities));
            $req->bindValue(':daily_alert_cities', json_encode($this->dailyAlertCities));
            $req->execute();
        }

        public function haveThisCity($cityId)
        {
            return array_search($cityId, $this->cities) !== false;
        }
    }