<?

include './src/User.php';
$user = new User();
$user->create('bowser', 'luigi', 'Jean Yves', 'flash');
$user->login();