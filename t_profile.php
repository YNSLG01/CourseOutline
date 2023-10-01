<?php
include 'conn.php';
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once('import_header.php'); ?>
        <title>User Profile</title>

    </head>
    

    <body>
        <h1>User Profile</h1>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>image</label>
                <input type="img" name="img" class="form-control" accept="image/*" value=<?= $row['img'] ?>><br>
                <label>name</label>
                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>"><br>
                <label>surname</label>
                <input type="text" name="surname" class="form-control" value="<?= $row['surname'] ?>"><br>
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>"><br>
                <label>Tel</label>
                <input type="number" name="tel" class="form-control" value="<?= $row['tel'] ?>"><br>
               
                

                <a href="edit_profile.php" class="btn btn-warning" >Edit Profile</a>
        </div>
    </body>

    </html>
    <?php
 
    // User not found
    echo "User not found.";


// Close the database connection
$conn->close();
?>