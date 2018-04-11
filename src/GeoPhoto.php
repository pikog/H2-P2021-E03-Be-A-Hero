<?
include_once './src/config.php';
include_once './src/DB.php';

class GeoPhoto
{

    private $id;
    private $heading;
    private $place;

    public function __construct($id)
    {
        $this->id = intval($id);
    }

    private function getInfo()
    {
        $pdo = new DB();
        $pdo = $pdo->getInstance();

        $req = $pdo->prepare('SELECT place, heading FROM events WHERE id = :id');
        $req->bindValue(':id', $this->id);
        $req->execute();

        $result = $req->fetch();
        $this->heading = intval($result->heading);
        $this->place = $result->place;
    }

    public function getImageFromAPI()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/streetview?location=' . urlencode($this->place) . '&fov=120&heading=' . $this->heading .'&size=400x200&key=' . API_GMAPS);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

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