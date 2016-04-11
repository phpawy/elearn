<?php

$db_server = 'localhost';
$db_name = 'elearn';
$db_username = 'root';
$db_password = '';

ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
session_start();
$db = new mysqli($db_server, $db_username, $db_password, $db_name);
