<?
    include_once './src/config.php';
    include_once './src/DB.php';
    include_once './src/utils.php';

    class Event
    {
        public $id;
        public $name;
        public $place;
        public $description;
        public $lat;
        public $lon;
        public $level;
        public $reward;
        public $type;
        public $heading;

        /**
         * Initialize an existing user with an username
         */
        public function __construct($id = null)
        {
            if(isset($id))
            {
                $this->id = $id;
                $this->getEventInfo();
            }      
        }

        /**
         * Get user information from database
         */
        private function getEventInfo()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('SELECT * FROM events WHERE id = :id');
            $req->bindValue(':id', $this->id);
            $req->execute();

            $result = $req->fetch();

            $this->name = $result->name;
            $this->place = $result->place;
            $this->description = $result->description;
            $this->lat = floatval($result->lat);
            $this->lon = floatval($result->lon);
            $this->level = intval($result->level_required);
            $this->reward = intval($result->reward);
            $this->type = intval($result->type);
            $this->heading = intval($result->heading);
        }
    }