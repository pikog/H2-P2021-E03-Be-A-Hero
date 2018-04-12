<?
//Import config.ini
if(file_exists('./src/config.ini'))
{
    $ini = parse_ini_file('./src/config.ini', true);
}

//Database config
define('DB_HOST', isset($ini['DB']['HOST']) ? $ini['DB']['HOST'] : 'localhost');
define('DB_PORT', isset($ini['DB']['PORT']) ? $ini['DB']['PORT'] : '3306');
define('DB_NAME', isset($ini['DB']['NAME']) ? $ini['DB']['NAME'] : 'hetic_t2_be_a_hero');
define('DB_USER', isset($ini['DB']['USER']) ? $ini['DB']['USER'] : 'root');
define('DB_PASS', isset($ini['DB']['PASS']) ? $ini['DB']['PASS'] : '');

define('API_GMAPS', isset($ini['API']['MAPS']) ? $ini['API']['MAPS'] : '');

define('CACHE_GEOPHOTO', isset($ini['CACHE']['GEOPHOTO']) ? $ini['CACHE']['GEOPHOTO'] : 30);

define('PARAM_MAX_DISTANCE', isset($ini['PARAM']['MAX_DISTANCE']) ? $ini['PARAM']['MAX_DISTANCE'] : 200);
