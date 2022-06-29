<?php
$user = 'web';
$pass = 'web';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=crc;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
return $dbh;
?>
