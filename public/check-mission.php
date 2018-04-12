<?    
    include_once './src/utils.php';
    include_once './src/config.php';
    include_once './src/User.php';
    include_once './src/Event.php';

    header('Content-type: application/json');

    if(!empty($_GET))
    {
        if(isset($_GET['user']) && isset($_GET['lat']) && isset($_GET['lon']) && isset($_GET['event']))
        {
            $user = new User(intval($_GET['user']));
            $lat = floatval($_GET['lat']);
            $lon = floatval($_GET['lon']);
            $eventId = intval($_GET['event']);
            
            if(!$user->checkCheat($lat, $lon))
            {
                $event = new Event($eventId);
                $distance = distanceLatLon($lat, $lon, $event->lat, $event->lon);
                if($distance <= PARAM_MAX_DISTANCE)
                {
                    $result = $user->validMission($event->reward);
                    $event->delete();
                    echo json_encode(array_merge(['ok' => 'good'], $result));
                }
                else
                {
                    echo json_encode(['error' => 'Too Far!']);
                }
            }
            else
            {
                echo json_encode(['error' => 'You cheating!']);
            }
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