<?php

// Local connection
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'vgdb3';

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_password);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Webhost connection
// $db_host = 'localhost';
// $db_username = 'mennoep141';
// $db_password = 'ugozvtei';
// $db_name = 'mennoep141_vgdb3';

// $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_password);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>