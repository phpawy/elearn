<?php

require('db.php');

$username = $db->real_escape_string($_POST['username']);
$password = $db->real_escape_string($_POST['password']);
$password = md5($password);
$get_role = $db->query("SELECT * FROM `users_roles` WHERE `username` = '{$username}'");
$role = $get_role->fetch_array();
$role = $role['role'];

if ($role) {
    $get_login = $db->query("SELECT * FROM `{$role}` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    print $db->error;
    $login = $get_login->fetch_array();
    if (intval($login['id'])) {
        $_SESSION['id'] = $login['id'];
        header("Location: {$role}/index.php");
    } else {
        header("Location: index.php?error=1");
    }
} else {
    header("Location: index.php?error=1");
}
?>
