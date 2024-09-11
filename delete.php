<?php

include 'header.php';
require 'user.php';

// $userid = $_GET['id'];
// $user = get_users_by_id($userid);
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
$userid = $_POST['user_id'];
deleteUser($userid);
header('Location:index.php');
// $userid = $_POST['id'] ?? null;
// if ($userid) {
//     deleteUser($userid);
//     header('Location: index.php');
//      // Ensure no further code is executed
// }

// $userid = $_POST['id'];
// deleteUser($userid);
// header('Location:index.php')
?>