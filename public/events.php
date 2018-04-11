<?    
    include_once './src/utils.php';
    include_once './src/User.php';

    header('Content-type: application/json');

    if(!empty($_POST))
    {
        if(isset($_POST['user']) && isset($_POST['lat']) && isset($_POST['lon']))
        {
            $user = new User(intval($_POST['user']));
            $lat = floatval($_POST['lat']);
            $lon = floatval($_POST['lon']);

            $eventsNearby = eventsNearby($lat, $lon, $user->level, 20);
            $events = [];
            foreach ($eventsNearby as $event)
            {
                if(!in_array($event->id, $user->eventsSuccess))
                {
                    if($event->distance < 1)
                    {
                        $event->canDo = 1;
                    }
                    else
                    {
                        $event->canDo = 0;
                    }
                    $events[] = $event;
                }
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