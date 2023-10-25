<?php




if(isset($_POST["email"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $fp = fopen("./database/db.txt","a");
    fwrite($fp,"\nuser,{$username},{$email},{$password}");
    fclose($fp);
    header("Location: admin.php");

   

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add user </title>
</head>
<body>
 <div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <form action="" method="post">
                <label for=""> User Name</label >
                <input type="text" name="username" class="form-control">
                <label for="email"> Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <button type="submit" name="submit" class="btn btn-primary mt-5" >Add User</button>
            </form>
        </div>
    </div>
 </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>