<?    
    include_once './src/utils.php';
    include_once './src/config.php';
    include_once './src/User.php';
    include_once './src/GeoPhoto.php';

    /**
     * Page called to get all events near the user
     */

    header('Content-type: application/json');

    if(!empty($_GET))
    {
        if(isset($_GET['user']) && isset($_GET['lat']) && isset($_GET['lon']))
        {
            $user = new User(intval($_GET['user']));
            $lat = floatval($_GET['lat']);
            $lon = floatval($_GET['lon']);

            /**
             * We check also if he don't cheat
             */
            if(!$user->checkCheat($lat, $lon))
            {
                /**
                 * If he don't cheat we update his position and timestamp in db
                 */
                $user->setLastGeolocation($lat, $lon);
            }

            /**
             * We get all events in a radiius of 20km
             */
            $eventsNearby = eventsNearby($lat, $lon, $user->level, 20);
            $events = [];
            foreach ($eventsNearby as $event)
            {
                /**
                 * We specify if each event can be do beacuse the player is near enough
                 */
                if($event->distance <= PARAM_MAX_DISTANCE)
                {
                    $event->canDo = 1;
                }
                else
                {
                    $event->canDo = 0;
                }

                /**
                 * We also get image (streetview) of all places
                 */
                $event->image = (new GeoPhoto($event->id))->getImage();

                $events[] = $event;
            }
            /**
             * array of events return in JSON
             */
            echo json_encode(['events' => $events]);
        }
        else
        {
            echo json_encode(['error' => 'No post data']);
        }
    }
    else
    {
        echo json_encode(['error' => 'No post data']);
    }