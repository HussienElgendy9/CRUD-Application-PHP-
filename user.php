<?php

function get_Users(){
    return json_decode(file_get_contents("users.json"),true);
}

function get_users_by_id($id){
    $users = get_Users();
    foreach($users as $user){
        if($user["id"] == $id){
            return $user;
        }
    }
    // echo '<!DOCTYPE html>
    //       <html lang="en">
    //       <head>
    //           <meta charset="UTF-8">
    //           <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //           <title>Redirecting...</title>
    //       </head>
    //       <body>
    //           <script>
    //               alert("User Not Found");
    //               window.location.href = "index.php"; // Redirect to your desired page
    //           </script>
    //       </body>
    //       </html>';
    // exit;
    return null;
}
function updateUser($data, $id){
    $updateUser =[];
    $users = get_Users();
    foreach($users as $i => $user){
        if($user["id"] == $id){
            $users[$i] = $updateUser = array_merge($users[$i], $data);
        }
    }
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    return $updateUser;
}
function createUser(){
    $user = get_Users();

    $name = strips($_POST['name'] ?? '');
    $username = strips($_POST['username'] ?? '');
    $email = strips($_POST['email'] ?? '');
    $phone = strips($_POST['phone'] ?? '');
    $website = strips($_POST['website'] ?? '');
    $id = count($user)+1;
    $newUser= [
        'id' => $id,
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'phone' => $phone,
        'website' => $website
    ];
    $user[] = $newUser;

    file_put_contents('users.json',json_encode($user,JSON_PRETTY_PRINT),true);

}
function deleteUser($userid){
    $users = get_Users();
    $newUsers = [];
    foreach($users as $user){
    if($user['id'] != $userid){
        $newUsers[] = $user;

    }
    else{
        continue;
    }
}
    putJson($newUsers);

}
function putJson($arr){
    file_put_contents('users.json',json_encode($arr, JSON_PRETTY_PRINT));

}