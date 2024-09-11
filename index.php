<?php
require 'user.php';

$users =  get_Users();

include 'header.php';

?>

<body>
    <div class="container">
        <p class="my-5">
            <a class="btn btn-outline-success" href="create.php">Create A New User</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td> 
                        <!-- <?php if(isset($user['extension'])): ?>
                            <?php 
                                $imagePath = "uploads/{$user['id']}.{$user['picture_extension']}";
                                ?>
                            <img src="<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="User Picture" style="max-width: 200px;">                            
                            <?php endif?> -->
                            <?php if(isset($user['picture_extension'])): ?>
                                <?php 
                                    $imagePath = "uploads/{$user['id']}.{$user['picture_extension']}";
                                    // Ensure the image path is valid
                                    if (file_exists(__DIR__ . '/' . $imagePath)): 
                                ?>
                                    <img src="<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="User Picture" style="max-width: 70px;">

                                <?php endif; ?>
                            <?php endif; ?> 
                            <!-- mn chat gpt -->
                        </td>
                        <td> <?php echo $user['name'] ?></td>
                        <td> <?php echo $user['username'] ?></td>
                        <td> <?php echo $user['email'] ?></td>
                        <td> <?php echo $user['phone'] ?></td>
                        <td><a target="_blank" href=""><?php echo $user['website'] ?></a></td>
                        <td>
                            <a href="view.php?id=<?php echo $user['id'] ?>" class="btn button-sm btn-outline-primary">View</a>
                            <a href="update.php?id=<?php echo $user['id'] ?>" class="btn button-sm btn-outline-secondary">Update</a>
                            
                            <form method="post" style="display:inline;" action="delete.php">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']?>">
                                <button name="btn-delete" class="btn button-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </body>
</html>