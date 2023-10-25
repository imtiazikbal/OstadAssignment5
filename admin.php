<?php
 session_start();
 if(!isset($_SESSION['email'])){
     header("Location: signin.php");
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title >Admin Dashboard</title>
    <style>
      a{
        text-decoration: none;
      }
      .add a{
        color: black;
      }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Admin DashBoard</h1>
            </div>
            <div class="col-md-3">
                <button class="btn btn-info add" ><a href="signup.php">Add User</a></button>
            </div>
 
        </div>
        <div class="row">
            <div class="col-md-12">
            <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
 
  <tbody>
  <?php
  define("DB", "./database/db.txt");
 $select_data_run = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($select_data_run as $row) {
$expData = explode(',', $row);
$Role = $expData[0];

 // Check if the role is "User"
if ($Role !== 'admin') {
    $id = $expData[4];
    $Nama = $expData[1];
    $Email = $expData[2];
                                                
     
    

    
  ?>
    <tr>
     
      <td><?=$Role; ?></td>
      <td><?=$Nama; ?></td>
      <td><?=$Email; ?></td>
      <td class="text-center">
          <form action="update.php" method="GET">
         <input type="text" value="<?php echo $id;?>" name="id" class="d-none"/>
         <button type="submit" class="editBtn btn btn-success btn-sm">
         Edit
         </button>
         </form>
</td> 
<td><a href="delete.php?id=<?=$id;?>" class="deleteBtn btn btn-danger btn-sm">Delete</a></td>
      
      
    </tr>
    <?php
}
}
?>
  </tbody>
</table>


                
            </div>
        </duiv>


        <div class="row">
            <div class="col-md-12">
            <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
 
  <tbody>
  <?php
  
  $select_data_run = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($select_data_run as $row) {
  $expData = explode(',', $row);
  $Role = $expData[0];
  
   // Check if the role is "User"
  if ($Role == 'admin') {
      $id = $expData[4];
      $Nama = $expData[1];
      $Email = $expData[2];
                                                  
       
      
  
      
    ?>
      <tr>
       
        <td><?=$Role; ?></td>
        <td><?=$Nama; ?></td>
        <td><?=$Email; ?></td>
        <td class="text-center">
            <form action="update.php" method="GET">
           <input type="text" value="<?php echo $id;?>" name="id" class="d-none"/>
           <button type="submit" class="editBtn btn btn-success btn-sm">
           Edit
           </button>
           </form>
  </td> 
 
        
      </tr>
      <?php
  }
  }
  ?>
    </tbody>
  </table>
  

                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2><a href="logout.php">Logout</a></h2>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>




     





