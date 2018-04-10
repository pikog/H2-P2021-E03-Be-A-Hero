<?

// include './src/User.php';
// $user = new User();
// $user->create('bowser', 'luigi', 'Jean Yves', 'flash');
// $user->login();

include './src/utils.php';
echo '<pre>';
print_r(eventsNearby(48.844, 2.422, 20));
echo '</pre>';