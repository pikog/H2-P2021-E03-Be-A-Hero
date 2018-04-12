<?    
    include_once './src/utils.php';
    include_once './src/config.php';
    include_once './src/User.php';
    include_once './src/GeoPhoto.php';

    header('Content-type: application/json');

    if(!empty($_GET))
    {
        if(isset($_GET['user']) && isset($_GET['lat']) && isset($_GET['lon']))
        {
            $user = new User(intval($_GET['user']));
            $lat = floatval($_GET['lat']);
            $lon = floatval($_GET['lon']);

            if(!$user->checkCheat($lat, $lon))
            {
                $user->setLastGeolocation($lat, $lon);
            }

            $eventsNearby = eventsNearby($lat, $lon, $user->level, 20);
            $events = [];
            foreach ($eventsNearby as $event)
            {
                if($event->distance <= PARAM_MAX_DISTANCE)
                {
                    $event->canDo = 1;
                }
                else
                {
                    $event->canDo = 0;
                }

                $event->image = (new GeoPhoto($event->id))->getImage();

                $events[] = $event;
            }
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