<?php 

include 'header.php';
require 'user.php';

$userid = $_GET['id'];
$user = get_users_by_id($userid);
function filesss($mime,$name,$userid,$user){
    if( ! in_array($_FILES[$name]['type'], $mime)){
        include "imageError.php";
        exit;
    }
    $filename = $_FILES[$name]["name"];
    $dotposition = strrpos($filename,".");
    $extension = substr($filename,$dotposition+1);

    $newFilename = $userid . '.' . $extension;
    $uploadDir = __DIR__."/uploads/";
    $destination = $uploadDir.$newFilename;
    
    if(!move_uploaded_file($_FILES[$name]["tmp_name"], $destination)){
        exit("Cant Move Uploaded File");
    }
    
    $user[$name."_extension"] = $extension;
    
    updateUser($user,$userid);
    header('Location:index.php');

}
// echo'<pre>';
//     print_r($_SERVER);
// echo '</pre>';
$mime_types = ["image/png","image/jpg","image/gif","image/jpeg"];
$mime_types2 = ["application/pdf",
                "application/vnd.openxmlformats-officedocument.presentationml.presentation",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = updateUser($_POST,$userid);
    filesss($mime_types,'picture',$userid,$user);
    filesss($mime_types2,'cv',$userid,$user);
    // updateUser($_POST, $userid);
    // echo'<pre>';
    // print_r($_POST);
    // echo '</pre>';
    header('Location:index.php');

}

?>

    <body>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <h3>User Update: <b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">

                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" value="<?php echo $user['name']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" value="<?php echo $user['username']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" value="<?php echo $user['email']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" value="<?php echo $user['phone']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input name="website" value="<?php echo $user['website']?>" class="form-control">
                </div>
                <div class="form-group my-2">
                    <label for="">Picture</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="">CV</label>
                    <input name="cv" type="file" class="form-control-file">
                </div>
                <button class="btn btn-success my-2">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </body>
</html>