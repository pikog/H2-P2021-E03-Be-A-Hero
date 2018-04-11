<?    
    include_once './src/View.php';
    include_once './src/utils.php';
    include_once './src/loginSystem.php';

    if(isset($user) || true)
    {
        if(isset($_POST['lat']) && isset($_POST['lon']))
        {
            $_SESSION['geolocation'] = [
                'lat' => floatval($_POST['lat']),
                'lon' => floatval($_POST['lon'])
            ];
        }
        if(isset($_SESSION['geolocation']))
        {
            $eventsNearby = eventsNearby($_SESSION['geolocation']['lat'], $_SESSION['geolocation']['lon'], $user->level, 20);
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

            $data = [
                'geolocation' => $_SESSION['geolocation'],
                'user' => get_object_vars($user),
                'events' => $events
            ];
            echo new View('missions', 'Missions', $data);
        }
        else 
        {
            echo new View('geolocation', 'Geolocation');
        }
    }
    else
    {

    }