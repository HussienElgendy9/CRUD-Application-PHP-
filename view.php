<?php 
require __DIR__.'/user.php';

$userid = $_GET['id'];
$user = get_users_by_id($userid);

// if($userid != $user){
//     echo '<script>alert("Test Alert!");</script>';
//     exit;
// }


include 'header.php';
?>
<body>
   <div class="container">
    <div class="card">
            <div class="card-header">
                <h3>View User: <b><?php echo $user['name'] ?></b></h3>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $user['name']?></td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                        <td><?php echo $user['username']?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $user['email']?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo $user['phone']?></td>
                    </tr>
                    <tr>
                        <th>Webiste:</th>
                        <td><?php echo $user['website']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
    


</body>
</html>