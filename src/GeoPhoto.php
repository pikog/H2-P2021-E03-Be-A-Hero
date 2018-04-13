<?
include_once './src/config.php';
include_once './src/DB.php';

/**
 * Get image of place from google street view
 */

class GeoPhoto
{

    private $id;
    private $heading;
    private $address;


    /**
     * initialize a new geophoto
     * @param int $id id of the event
     */
    public function __construct($id)
    {
        $this->id = intval($id);
    }

    /**
     * Get adress and heading of the view of an event
     */
    private function getInfo()
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare('SELECT address, heading FROM events WHERE id = :id');
        $req->bindValue(':id', $this->id);
        $req->execute();

        $result = $req->fetch();
        $this->heading = floatval($result->heading);
        $this->address = $result->address;
    }

    /**
     * Get image from google maps streetview
     * @param string image data of the streetview
     */
    public function getImageFromAPI()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/streetview?location=' . urlencode($this->address) . '&fov=120&heading=' . $this->heading .'&size=480x100&key=' . API_GMAPS);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    /**
     * Get path of the geophoto
     * Used cache or call api if image deprecated
     * @param string path of the image
     */
    public function getImage()
    {
        $folder = 'cache/geophotos/';
        $fileName = $this->id . '.jpg';
        $basePath = './';

        if(file_exists($basePath . $folder . $fileName))
        {
            if(time() - filemtime($basePath . $folder . $fileName) < CACHE_GEOPHOTO *60*60*24)
            {
                return $folder . $fileName;
            }
        }
        $this->getInfo();
        $image = $this->getImageFromAPI();

        file_put_contents($basePath . $folder . $fileName, $image);

        return $folder . $fileName;
    }
}