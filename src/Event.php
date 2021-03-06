<?
    include_once './src/config.php';
    include_once './src/DB.php';

    /**
     * Event/Mission class
     */

    class Event
    {
        public $id;
        public $name;
        public $address;
        public $heading;
        public $type;
        public $lat;
        public $lon;
        public $description;
        public $level;
        public $reward;

        /**
         * Initialize and load an event
         */
        public function __construct($id)
        {
            $this->id = $id;
            $this->getInfo();   
        }

        /**
         * Get event information from database
         */
        private function getInfo()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('SELECT * FROM events WHERE id = :id');
            $req->bindValue(':id', $this->id);
            $req->execute();

            $result = $req->fetch();

            $this->name = $result->name;
            $this->address = $result->address;
            $this->heading = floatval($result->heading);
            $this->type = intval($result->type);
            $this->lat = floatval($result->lat);
            $this->lon = floatval($result->lon);
            $this->description = $result->description;
            $this->level = intval($result->level);
            $this->reward = intval($result->reward);
        }

        /**
         * Delete event form database
         */
        public function delete()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();
    
            $req = $pdo->prepare('DELETE FROM events WHERE id = :id');
            $req->bindValue(':id', $this->id);
            $req->execute();
        }
    }