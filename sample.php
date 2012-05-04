<?php
include 'fake_ar.php';

class User extends FakeActiveModel {
}


/*magic find*/
User::find_by_email('sample@example.com');

/* magic field */
$user = new User;
$user -> email = 'example@example.com';
puts($user -> email);

$user -> dog = "i have no dog";
puts($user -> dog);

?>
