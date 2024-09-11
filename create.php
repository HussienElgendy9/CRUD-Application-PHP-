<?php
require ("user.php");
include("header.php");

function strips($input) {
    return trim(htmlspecialchars(strip_tags($input)));
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    createUser();
    header('Location:index.php');
}
?>

<body>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Create User</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">

                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input name="website" value="" class="form-control">
                </div>
                <button class="btn btn-success my-2">Submit</button>
                <a href="index.php"class="btn button-sm btn-outline-secondary">Back</a>
            </form>
        </div>
    </div>
    </div>
    </body>
</html>