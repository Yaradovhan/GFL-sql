<?php
set_time_limit(0);
// $user = "user6";
// $dB = "user6";
// $host = "localhost";
// $password = "user6";
$dbh = new PDO('pgsql:host=localhost;dbname=user6', 'user6', 'user6');
if ($dbh != false) {
    echo "Connect<br>";
} else die ("Cant connect to db");
$b = rand(1111, 9999);
$c = date("d.m.Y");

function generateName($length = 100)
{
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}

// function generateDescription($length = 500)
// {
//     $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
//     $numChars = strlen($chars);
//     $string = '';
//     for ($i = 0; $i < $length; $i++) {
//         $string .= substr($chars, rand(1, $numChars) - 1, 1);
//     }
//     return $string;
// }

// echo str_repeat(generateName(100), 5);

for ($i = 1; $i <= 1000000; $i++) {
    $name = generateName(100);
    // $desc = generateDescription(500);
    $desc = str_repeat(generateName(100), 5);
    $dbh->query("INSERT INTO test VALUES ('$i','$name','$desc')");
}
echo "Added";
