<?php
//setcookie( "userName", 'John' );
//echo $_COOKIE['userName'];
//setcookie( "userName", "John", 1 );

$user = [
  'name' => 'John',
  'login' => 'root',
  'passwrod' => '1234',
];

$str = base64_encode(serialize($user));
setcookie('user', $str);

$user = unserialize(base64_decode($_COOKIE['user']));
print_r($user);