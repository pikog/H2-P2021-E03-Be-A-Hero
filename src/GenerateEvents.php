<?
    include_once './src/DB.php';
    include_once './src/utils.php';

    /**
     * Class to regenerate events
     */

    class GenerateEvents
    {
        private $numberOfEvents;
        private $events;
        private $status;

        /**
         * Initialise with number of events to generate
         * @param int numberOfEvents number of events to generate
         */

        public function __construct($numberOfEvents)
        {
            $this->numberOfEvents = $numberOfEvents;
            $this->cleanEvents();
            $this->match();
            $this->insertEvents();
        }

        /**
         * Message to show when events are generated
         * @return string message to return
         */

        public function __tostring()
        {
            return $this->status ? "$this->numberOfEvents events generated" : "Error on generation";
        }

        /**
         * Delete all events from database
         */
        private function cleanEvents()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();

            $req = $pdo->prepare('DELETE FROM events');
            $req->execute();
            resetGeophoto();
        }

        /**
         * Find a random place in database
         * @param array $notIds ids of place that can't match
         * @return array array of places
         */
        private function findRandomPlace($notIds)
        {
            if(empty($notIds))
            {
                $excludeIdPart = '';
            }
            else
            {
                $excludeIdPart = 'WHERE id NOT IN (' . implode(',', $notIds) . ')';
            }

            $pdo = new DB();
            $pdo = $pdo->getInstance();

            $req = $pdo->prepare('SELECT * FROM places ' . $excludeIdPart . ' ORDER BY RAND() LIMIT 1');
            $req->execute();
            $result = $req->fetch();
            return $result;
        }

        /**
         * Find a random script in database
         * @param int $type type of script to match with place
         * @return array array of script
         */
        private function findRandomScript($type)
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();

            $req = $pdo->prepare('SELECT * FROM scripts WHERE type = :type ORDER BY RAND() LIMIT 1');
            $req->bindValue(':type', $type);
            $req->execute();
            $result = $req->fetch();
            return $result;
        }


        /**
         * Match a place with a script
         */
        private function match()
        {
            $events = [];

            $placeUsed = [];

            for($i = 0; $i < $this->numberOfEvents; $i++)
            {
                $events[$i]['place'] = $this->findRandomPlace($placeUsed);
                $placeUsed[] = intval($events[$i]['place']->id);
                $type = intval($events[$i]['place']->type);

                $events[$i]['script'] = $this->findRandomScript($type);
            }

            $this->events = $events;
        }

        /**
         * Insert all generated events in database
         */
        private function insertEvents()
        {
            $pdo = new DB();
            $pdo = $pdo->getInstance();

            $pdo->beginTransaction();
            $req = $pdo->prepare('INSERT INTO events (place, name, address, heading, type, lat, lon, description, level, reward) VALUES (:place, :name, :address, :heading, :type, :lat, :lon, :description, :level, :reward)');

            foreach ($this->events as $event)
            {
                $req->bindValue(':place', $event['place']->id);
                $req->bindValue(':name', $event['script']->name . ' ' . $event['place']->name);
                $req->bindValue(':address', $event['place']->address);
                $req->bindValue(':heading', $event['place']->heading);
                $req->bindValue(':type', $event['place']->type);
                $req->bindValue(':lat', $event['place']->lat);
                $req->bindValue(':lon', $event['place']->lon);
                $req->bindValue(':description', $event['script']->description);
                $req->bindValue(':level', $event['script']->level);
                $req->bindValue(':reward', $event['script']->reward);
                $req->execute();
            }
            $this->status = $pdo->commit();
        }
    }


